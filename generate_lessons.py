import os
import json
import re
from bs4 import BeautifulSoup

def extract_parameters(code, course_id):
    params = []
    if not code: return params
    
    if course_id == "kotlin":
        matches = re.findall(r'(val|var)\s+(\w+)\s*[:\w]*\s*=\s*([^ \n;]+)', code)
        for _, name, value in matches:
            if name in [p['id'] for p in params]: continue
            p_type = "STRING"
            clean_val = value.strip().strip('"')
            if clean_val.isdigit(): p_type = "INT"
            elif clean_val in ["true", "false"]: p_type = "BOOLEAN"
            params.append({
                "id": name,
                "name": name,
                "type": p_type,
                "defaultValue": clean_val
            })
    else: # Java
        matches = re.findall(r'(int|String|boolean|float|double)\s+(\w+)\s*=\s*([^;]+);', code)
        for p_type_raw, name, value in matches:
            if name in [p['id'] for p in params]: continue
            p_type = "STRING"
            clean_val = value.strip().strip('"')
            if p_type_raw in ["int", "float", "double"]: p_type = "INT"
            elif p_type_raw == "boolean": p_type = "BOOLEAN"
            params.append({
                "id": name,
                "name": name,
                "type": p_type,
                "defaultValue": clean_val
            })
    return params

def parse_file(path, course_id):
    try:
        with open(path, "r", encoding="utf-8") as f:
            soup = BeautifulSoup(f.read(), 'html.parser')
        
        h1 = soup.find('h1')
        title = h1.get_text(strip=True) if h1 else "Урок"

        main_div = soup.find('div', class_='item center menC')
        sections = []
        all_params = []
        
        if main_div:
            for child in main_div.children:
                if child.name in ['h2', 'h3', 'h4']:
                    sections.append({
                        "type": "HEADER",
                        "content": child.get_text(strip=True)
                    })
                elif child.name == 'p':
                    txt = child.get_text(strip=True)
                    if txt:
                        sections.append({
                            "type": "TEXT",
                            "content": txt
                        })
                elif child.name == 'pre':
                    code = child.get_text().strip()
                    if code:
                        sections.append({
                            "type": "CODE",
                            "content": code
                        })
                        # Собираем параметры из всех блоков кода
                        all_params.extend(extract_parameters(code, course_id))
                elif child.name == 'img':
                    src = child.get('src', '')
                    if src:
                        # Обработка путей картинок для Android assets
                        # Если путь начинается с ./pics/, убираем ./ и оставляем pics/
                        # Предполагаем, что картинки будут лежать в assets/pics/
                        clean_src = src.replace('./', '')
                        sections.append({
                            "type": "IMAGE",
                            "content": clean_src
                        })

        # Убираем дубликаты параметров
        unique_params = []
        seen_ids = set()
        for p in all_params:
            if p['id'] not in seen_ids:
                unique_params.append(p)
                seen_ids.add(p['id'])

        return {
            "id": os.path.basename(path).replace('.', '_'),
            "course": course_id,
            "title": title,
            "sections": sections,
            "parameters": unique_params
        }
    except Exception as e:
        print(f"Ошибка при парсинге {path}: {e}")
        return None

def main():
    courses = {"kotlin": "kotlin_lessons", "java": "java_lessons", "android": "android_lessons"}
    for course_id, folder in courses.items():
        if not os.path.exists(folder): continue
        lessons = []
        files = sorted([f for f in os.listdir(folder) if f.endswith(".php")], 
                      key=lambda x: [int(c) if c.isdigit() else c for c in re.split(r'(\d+)', x)])
        for f in files:
            res = parse_file(os.path.join(folder, f), course_id)
            if res: lessons.append(res)
        
        with open(f"app/src/main/assets/{course_id}_lessons.json", "w", encoding="utf-8") as out:
            json.dump(lessons, out, ensure_ascii=False, indent=2)
        print(f"Готово: {course_id} - {len(lessons)} уроков")

if __name__ == "__main__":
    main()

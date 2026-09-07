import os
import json
import requests
import time

def download_lessons(config_file, output_dir):
    if not os.path.exists(output_dir):
        os.makedirs(output_dir)
    
    with open(config_file, 'r', encoding='utf-8') as f:
        config = json.load(f)
    
    headers = {
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
    }
    
    for chapter in config.get('chapters', []):
        print(f"Downloading chapter: {chapter['title']}")
        for lesson in chapter.get('lessons', []):
            url = lesson['url']
            filename = url.split('/')[-1]
            filepath = os.path.join(output_dir, filename)
            
            if os.path.exists(filepath):
                print(f"  Skipping {filename} (already exists)")
                continue
                
            try:
                print(f"  Downloading {url}...")
                response = requests.get(url, headers=headers, timeout=10)
                response.raise_for_status()
                
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(response.text)
                
                # Small delay to be polite
                time.sleep(1)
            except Exception as e:
                print(f"  Error downloading {url}: {e}")

if __name__ == "__main__":
    # Download Kotlin
    download_lessons('metanit_kotlin.json', 'kotlin_lessons')
    # Download Android
    download_lessons('metanit_android.json', 'android_lessons')
    # Download Java (if not fully downloaded)
    download_lessons('metanit_java.json', 'java_lessons')

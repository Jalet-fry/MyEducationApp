import re
import json
from bs4 import BeautifulSoup

def parse_metanit_toc(html_content, language_name, base_url):
    """
    Парсит оглавление Metanit и возвращает JSON.
    """
    soup = BeautifulSoup(html_content, 'html.parser')

    # Определяем язык/технологию по заголовку
    title_tag = soup.find('h1')
    if title_tag:
        full_title = title_tag.get_text(strip=True)
        print(f"📖 Обнаружено: {full_title}")

    chapters = []
    chapter_counter = 1

    # Ищем в тегах <ol class="content"> — это основное оглавление
    content_list = soup.find('ol', class_='content')
    if not content_list:
        print("⚠️ Не найден тег <ol class='content'>, пробую другой способ...")
        content_list = soup.find('ul', id='browser')

    if content_list:
        # Проходим по главам (элементы <li> на первом уровне)
        for li in content_list.find_all('li', recursive=False):
            # Находим заголовок главы
            chapter_link = li.find('a', href=True)
            if not chapter_link:
                # Пропускаем элементы без ссылки (могут быть мобильные версии)
                continue

            chapter_title = chapter_link.get_text(strip=True)
            chapter_url = chapter_link['href']

            # Очищаем URL от префиксов
            if chapter_url.startswith('//metanit.com/'):
                chapter_url = chapter_url.replace('//metanit.com/', '')

            # Находим вложенные уроки
            sub_ol = li.find('ol', class_='subsubcontent')
            if not sub_ol:
                # Пробуем найти обычный <ul> (в древовидном меню)
                sub_ol = li.find('ul')

            lessons = []
            if sub_ol:
                for lesson_li in sub_ol.find_all('li'):
                    lesson_link = lesson_li.find('a', href=True)
                    if lesson_link:
                        lesson_title = lesson_link.get_text(strip=True)
                        lesson_url = lesson_link['href']

                        # Очищаем URL
                        if lesson_url.startswith('//metanit.com/'):
                            lesson_url = lesson_url.replace('//metanit.com/', '')

                        # Определяем полный URL
                        if lesson_url.startswith('http'):
                            full_url = lesson_url
                        elif lesson_url.startswith('/'):
                            full_url = "https://metanit.com" + lesson_url
                        else:
                            full_url = base_url + lesson_url

                        lessons.append({
                            "title": lesson_title,
                            "url": full_url
                        })

            if lessons:
                chapters.append({
                    "id": chapter_counter,
                    "title": chapter_title,
                    "lessons": lessons
                })
                chapter_counter += 1

    return {
        "language": language_name,
        "chapters": chapters,
        "total_lessons": sum(len(ch['lessons']) for ch in chapters)
    }

# ========== ИСПОЛЬЗОВАНИЕ ==========

# Скопируй сюда HTML любой страницы Metanit
html_java = """

<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Язык программирования Java</title>
<meta charset="utf-8" />
<meta name="description" content="Содержание онлайн-руководства по языку программирования Java">
<meta name="viewport" content="width=device-width">
<link href="https://metanit.com/style50.css?v=1" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
<header>
<div id="header">
<div id="logo">
<a class="logoTitle" href="/" title="На главную">METANIT.COM</a>
<div class="logoDefinition">Сайт о программировании</div> 
</div>

<div class="socbtns">
<ul>
<li><a title="Посмотреть меню" rel="nofollow" class="fa fa-lg fa-bars"></a></li>
<li><a href="https://metanit.com/donations.php" title="Помощь сайту" rel="nofollow" style="color: var(--fa-usd-color);" class="fa fa-lg fa-usd"></a></li>
<li><a href="https://vk.com/metanit" title="Группа в ВКонтакте" rel="nofollow" style="color: var(--fa-vk-color);" class="fa fa-lg fa-vk"></a></li>
<li><a href="//metanit.com/android.php" title="Приложения андроид" rel="nofollow" style="color: var(--fa-android-color);" class="fa fa-lg fa-android"></a></li>
<li><i id="toggle-theme" class="fa fa-lg fa-adjust"></i></li>
</ul>
</div>


<div id="magnifying-glass"></div>

<div class="menuButton" id="menuButton">
	<span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</div>
</div>

<div id="search" class="transp">
<form action="https://www.google.ru" id="cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-3716042175333627:1096498938" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" name="q" />
    <input type="submit" name="sa" value="Найти" />
  </div>
</form>
</div>

<div id="menu" class="menu">
<ul class="mainmenu">
    <li><a href="//metanit.com/common/">Программирование</a></li>
    <li><a href="//metanit.com/assembler/">Ассемблер</a></li>
   <li><a href="//metanit.com/sharp/">C#</a></li>
   <li><a href="//metanit.com/java/">Java</a></li>
   <li><a href="//metanit.com/web/">WEB</a></li>
   <li><a href="//metanit.com/python/">Python</a></li>
   <li><a href="//metanit.com/c/">C</a></li>
   <li><a href="//metanit.com/cpp/">C++</a></li>
   <li><a href="//metanit.com/sql/">SQL</a></li>
   <li><a href="//metanit.com/nosql/mongodb/">MongoDB</a></li>
   <li><a href="//metanit.com/go/">Go</a></li>
   <li><a href="//metanit.com/visualbasic/">VB.NET</a></li>
   <li><a href="//metanit.com/swift/tutorial/">Swift</a></li>
   <li><a href="//metanit.com/kotlin/">Kotlin</a></li>
   <li><a href="//metanit.com/dart/">Dart</a></li>
   <li><a href="//metanit.com/php/">PHP</a></li>
   <li><a href="//metanit.com/rust/">Rust</a></li>
   <li><a href="//metanit.com/os/">Linux</a></li>
   <li><a href="//metanit.com/f/">F#</a></li>
   <!--<li><a href="//metanit.com/lisp/tutorial/">Common Lisp</a></li>-->
   <li><a href="//metanit.com/hosting">Хостинг</a></li>
</ul>
</div>

</header>
<div class="outercontainer">
<div class="innercontainer">
 
   <div class="item center menC">
     <h1>Руководство по языку программирования Java</h1><div class="date">Последнее обновление: 22.12.2025</div>
	<div class="socBlock">
	<div class="share soctop">
	<ul>
	<li><a title="Поделиться в Вконтакте" rel="nofollow" class="fa fa-lg fa-vk"></a></li>
	<li><a title="Поделиться в Телеграм" rel="nofollow" class="fa fa-lg fa-telegram"></a></li>
	<li><a title="Поделиться в Одноклассниках" rel="nofollow" class="fa fa-lg fa-odnoklassniki"></a></li>
	
	</ul>
	</div>
	</div>

	<div style="margin-top:23px;margin-left:5px;">
		
		<style>
		#yandex_rtb_R-A-201190-1 { width: 100%; height: 250px; overflow:hidden;}
		@media(min-width: 760px) { #yandex_rtb_R-A-201190-1 { max-width: 728px; height: 90px;  } }
		@media(min-width: 900px) { #yandex_rtb_R-A-201190-1 { max-width: 468px; height: 90px;  } }
		@media(min-width: 1100px) { #yandex_rtb_R-A-201190-1{ max-width: 728px; height: 90px;} }
		@media(min-width: 1400px) { #yandex_rtb_R-A-201190-1 { max-width: 970px; height: 90px;} }
		</style>
		<div id="yandex_rtb_R-A-201190-1"></div>
	</div>

	<ol class="content" style="list-style-type:none;">
<li><p><a href="1.1.php">Глава 1. Введение в Java</a></p>
	<ol class="subsubcontent">
		<li><p><a href="1.1.php">Что такое Java</a></p></li>
		<li><p><a href="1.6.php">Установка JDK</a></p></li>
		<li><p><a href="1.2.php">Первая программа на Java</a></p></li>
		<li><p><a href="1.5.php">Первая программа в IntelliJ IDEA</a></p></li>
		<li><p><a href="1.3.php">Первая программа в NetBeans</a></p></li>
		<li><p><a href="1.4.php">Первая программа в Eclipse</a></p></li>
		<li><p><a href="1.7.php">JShell</a></p></li>
	</ol>
</li>
<li><p><a href="2.1.php">Глава 2. Основы программирования на Java</a></p>
	<ol class="subsubcontent">
		<li><p><a href="2.11.php">Структура программы</a></p></li>
		<li><p><a href="2.1.php">Переменные и константы</a></p></li>
		<li><p><a href="2.19.php">Литералы</a></p></li>
		<li><p><a href="2.12.php">Типы данных</a></p></li>
		<li><p><a href="2.9.php">Консольный ввод/вывод в Java</a></p></li>
		<li><p><a href="2.3.php">Арифметические операции</a></p></li>
		<li><p><a href="2.13.php">Поразрядные операции</a></p></li>
		<li><p><a href="2.14.php">Условные выражения</a></p></li>
		<li><p><a href="2.15.php">Операции присваивания и приоритет операций</a></p></li>
		<li><p><a href="2.2.php">Преобразования базовых типов данных</a></p></li>
		<li><p><a href="2.5.php">Условные конструкции</a></p></li>
		<li><p><a href="2.6.php">Циклы</a></p></li>
		<li><p><a href="2.4.php">Массивы</a></p></li>
		<li><p><a href="2.20.php">Конструкция и выражение switch</a></p></li>
	</ol>
</li>
<li><p><a href="3.1.php">Глава 3. Классы</a></p>
	<ol class="subsubcontent">
		<li><p><a href="3.1.php">Классы и объекты</a></p></li>
		<li><p><a href="2.7.php">Методы</a></p></li>
		<li><p><a href="2.16.php">Параметры методов</a></p></li>
		<li><p><a href="3.14.php">Объекты как параметры методов</a></p></li>
		<li><p><a href="2.17.php">Оператор return. Результат метода</a></p></li>
		<li><p><a href="2.18.php">Перегрузка методов</a></p></li>
		<li><p><a href="3.21.php">Конструкторы и инициализаторы</a></p></li>
		<li><p><a href="3.4.php">Статические компоненты класса и модификатор static</a></p></li>
		<li><p><a href="3.20.php">Область действия и время жизни переменных</a></p></li>
		<li><p><a href="2.8.php">Рекурсивные функции</a></p></li>
		<li><p><a href="3.2.php">Пакеты</a></p></li>
		<li><p><a href="3.3.php">Модификаторы доступа</a></p></li>
		<li><p><a href="3.19.php">Компактные файлы кода и метод main</a></p></li>
	</ol>
</li>
<li><p><a href="3.22.php">Глава 4. Объектно-ориентированное программирование</a></p>
	<ol class="subsubcontent">
		<li><p><a href="3.22.php">Инкапсуляция</a></p></li>
		<li><p><a href="3.5.php">Наследование</a></p></li>
		<li><p><a href="3.23.php">Запрет наследования и переопределения методов</a></p></li>
		<li><p><a href="3.24.php">Полиморфизм и динамическая диспетчеризация методов</a></p></li>
		<li><p><a href="3.9.php">Класс Object и его методы</a></p></li>
		<li><p><a href="3.6.php">Абстрактные классы</a></p></li>
		<li><p><a href="3.10.php">Иерархия наследования и преобразование типов</a></p></li>

		<li><p><a href="3.7.php">Интерфейсы</a></p></li>
		<li><p><a href="3.28.php">Интерфейсы и полиморфизм</a></p></li>
		<li><p><a href="3.29.php">Множественная реализация и наследование интерфейсов</a></p></li>
		<li><p><a href="3.16.php">Интерфейсы в механизме обратного вызова</a></p></li>
		<li><p><a href="3.8.php">Перечисления enum</a></p></li>
		<li><p><a href="3.11.php">Обобщения (Generics)</a></p></li>
		<li><p><a href="3.17.php">Ограничения обобщений</a></p></li>
		<li><p><a href="3.15.php">Наследование и обобщения</a></p></li>
		<li><p><a href="3.31.php">Type Erasure (Стирание типов)</a></p></li>
		<li><p><a href="3.32.php">Подстановочные знаки wildcards в обобщениях</a></p></li>
		<li><p><a href="3.13.php">Ссылочные типы и клонирование объектов</a></p></li>
		<li><p><a href="3.18.php">Классы Records</a></p></li>
		<li><p><a href="9.4.php">Функциональные интерфейсы и ссылки на методы</a></p></li>
		<li><p><a href="9.1.php">Лямбда-выражения</a></p></li>
		<li><p><a href="9.2.php">Лямбды как параметры и результаты методов</a></p></li>
		<li><p><a href="9.3.php">Встроенные функциональные интерфейсы</a></p></li>
		<li><p><a href="3.12.php">Внутренние и вложенные классы</a></p></li>
		<li><p><a href="3.30.php">Анонимные классы</a></p></li>
		
		<li><p><a href="3.25.php">Sealed-классы и интерфейсы</a></p></li>
		<li><p><a href="3.26.php">Pattern мatching. Паттерн типов</a></p></li>
		<li><p><a href="3.27.php">Pattern мatching. record-паттерн</a></p></li>
	</ol>
</li>
<li><p><a href="4.1.php">Глава 5. Обработка исключений</a></p>
	<ol class="subsubcontent">
		<li><p><a href="2.10.php">Обработка исключений и конструкция try...catch...finally</a></p></li>
		<li><p><a href="4.2.php">Классы исключений</a></p></li>
		<li><p><a href="4.1.php">Операторы throws и throw</a></p></li>
		<li><p><a href="4.3.php">Создание своих классов исключений</a></p></li>
		<li><p><a href="4.4.php">Assert</a></p></li>
	</ol>
</li>
<li><p><a href="5.1.php">Глава 6. Коллекции</a></p>
	<ol class="subsubcontent">
		<li><p><a href="5.1.php">Типы коллекций. Интерфейс Collection</a></p></li>
		<li><p><a href="5.2.php">Класс ArrayList и интерфейс List</a></p></li>
		<li><p><a href="5.6.php">Интерфейсы Comparable и Comporator. Сортировка</a></p></li>
		<li><p><a href="5.7.php">Очереди и стеки. Классы ArrayDeque и PriorityQueue</a></p></li>
		<li><p><a href="5.3.php">Связанный список LinkedList</a></p></li>
		<li><p><a href="5.4.php">Интерфейс Set и хеш-таблицы HashSet</a></p></li>
		<li><p><a href="5.5.php">Деревья TreeSet и интерфейсы SortedSet и NavigableSet</a></p></li>
		<li><p><a href="5.8.php">Словари. Интерфейс Map и класс HashMap</a></p></li>
		<li><p><a href="5.9.php">Интерфейсы SortedMap и NavigableMap. Класс TreeMap</a></p></li>
		<li><p><a href="5.10.php">Итераторы. Iterator и Iterable</a></p></li>
	</ol>
</li>
<li><p><a href="6.1.php">Глава 7. Потоки ввода-вывода. Работа с файлами</a></p>
	<ol class="subsubcontent">
		<li><p><a href="6.1.php">Потоки ввода-вывода</a></p></li>
		<li><p><a href="6.3.php">Чтение и запись файлов. FileInputStream и FileOutputStream</a></p></li>
		<li><p><a href="6.2.php">Закрытие потоков и конструкция try-с-ресурсами</a></p></li>
		<li><p><a href="6.4.php">Классы ByteArrayInputStream и ByteArrayOutputStream</a></p></li>
		<li><p><a href="6.5.php">Буферизованные потоки BufferedInputStream и BufferedOutputStream</a></p></li>
		<li><p><a href="6.6.php">Форматируемый вывод. PrintStream и PrintWriter</a></p></li>
		<li><p><a href="6.7.php">Классы DataOutputStream и DataInputStream</a></p></li>
		<li><p><a href="6.8.php">Чтение и запись текстовых файлов</a></p></li>
		<li><p><a href="6.9.php">Буферизация символьных потоков. BufferedReader и BufferedWriter</a></p></li>
		<li><p><a href="6.10.php">Сериализация объектов</a></p></li>
		<li><p><a href="6.11.php">Класс File. Работа с файлами и каталогами</a></p></li>
		<li><p><a href="6.12.php">Работа с ZIP-архивами</a></p></li>
		<li><p><a href="6.13.php">Класс Console</a></p></li>
	</ol>
</li>
<li><p><a href="7.1.php">Глава 8. Работа со строками</a></p>
	<ol class="subsubcontent">
		<li><p><a href="7.1.php">Введение в строки. Класс String</a></p></li>
		<li><p><a href="7.2.php">Основные операции со строками</a></p></li>
		<li><p><a href="7.3.php">StringBuffer и StringBuilder</a></p></li>
		<li><p><a href="7.4.php">Регулярные выражения</a></p></li>
	</ol>
</li>
<li><p><a href="8.1.php">Глава 9. Многопоточное программирование</a></p>
	<ol class="subsubcontent">
		<li><p><a href="8.1.php">Многопоточное программирование и класс Thread</a></p></li>
		<li><p><a href="8.2.php">Создание и выполнение потоков</a></p></li>
		<li><p><a href="8.11.php">Управление потоками</a></p></li>
		<li><p><a href="8.4.php">Завершение и прерывание потока</a></p></li>
		<li><p><a href="8.12.php">Виртуальные потоки</a></p></li>
		<li><p><a href="8.3.php">Синхронизация потоков. Оператор synchronized</a></p></li>
		<li><p><a href="8.5.php">Взаимодействие потоков. Методы wait и notify</a></p></li>
		<li><p><a href="8.6.php">Семафоры</a></p></li>
		<li><p><a href="8.7.php">Обмен между потоками. Класс Exchanger</a></p></li>
		<li><p><a href="8.8.php">Класс Phaser</a></p></li>
		<li><p><a href="8.9.php">Блокировки. ReentrantLock</a></p></li>
		<li><p><a href="8.10.php">Условия в блокировках</a></p></li>
		<li><p><a href="8.16.php">Переменные volatile</a></p></li>
		<li><p><a href="8.17.php">Атомарность и Atomics. Потокобезопасность без блокировок</a></p></li>
	</ol>
</li>

<li><p><a href="8.1.php">Глава 10. Асинхронность</a></p>
	<ol class="subsubcontent">
		<li><p><a href="8.13.php">Асинхронные задачи FutureTask. Callable и Future</a></p></li>
		<li><p><a href="8.14.php">Executor - исполнитель задач</a></p></li>
		<li><p><a href="8.15.php">Координация выполнения асинхронных задач</a></p></li>
		<li><p><a href="8.18.php">CompletableFuture и промисы. Обработка результата асинхронных задач</a></p></li>
		<li><p><a href="8.19.php">CompletableFuture, обработка ошибок и завершения асинхронных задач</a></p></li>
	</ol>
</li>

<li><p><a href="10.1.php">Глава 11. Stream API</a></p>
	<ol class="subsubcontent">
		<li><p><a href="10.1.php">Введение в Stream API</a></p></li>
		<li><p><a href="10.2.php">Создание потока данных</a></p></li>
		<li><p><a href="10.3.php">Фильтрация, перебор элементов и отображение</a></p></li>
		<li><p><a href="10.8.php">Сортировка</a></p></li>
		<li><p><a href="10.13.php">Получение подпотока и объединение потоков</a></p></li>
		<li><p><a href="10.4.php">Методы skip и limit</a></p></li>
		<li><p><a href="10.11.php">Операции сведения</a></p></li>
		<li><p><a href="10.5.php">Метод reduce</a></p></li>
		<li><p><a href="10.12.php">Тип Optional</a></p></li>
		<li><p><a href="10.6.php">Метод collect</a></p></li>
		<li><p><a href="10.7.php">Группировка</a></p></li>
		<li><p><a href="10.9.php">Параллельные потоки</a></p></li>
		<li><p><a href="10.10.php">Параллельные операции над массивами</a></p></li>
	</ol>
</li>
<li><p><a href="11.1.php">Глава 12. Модульность</a></p>
	<ol class="subsubcontent">
		<li><p><a href="11.1.php">Создание модуля</a></p></li>
		<li><p><a href="11.2.php">Зависимые модули</a></p></li>
		<li><p><a href="11.3.php">Взаимодействие между модулями. Экспорт и импорт</a></p></li>
	</ol>
</li>
<li><p><a href="12.1.php">Глава 13. Дополнительные классы</a></p>
	<ol class="subsubcontent">
		<li><p><a href="12.1.php">Математические вычисления и класс Math</a></p></li>
		<li><p><a href="12.2.php">Большие числа BigInteger и BigDecimal</a></p></li>
		<li><p><a href="12.3.php">Работа с датами. LocalDate</a></p></li>
		<li><p><a href="12.4.php">Процессы. Process и ProcessBuilder</a></p></li>
	</ol>
</li>
<li><p><a href="13.1.php">Глава 14. JAR-файлы и подключение библиотек и классов</a></p>
	<ol class="subsubcontent">
		<li><p><a href="13.1.php">Файлы JAR, их создание и выполнение</a></p></li>
		<li><p><a href="13.2.php">Создание и подключение библиотеки JAR</a></p></li>
		<li><p><a href="13.4.php">Модульный jar-файл</a></p></li>
		<li><p><a href="13.3.php">Установка пути к классам Java</a></p></li>
	</ol>
</li>

<li><p><a href="14.1.php">Глава 15. Рефлексия</a></p>
	<ol class="subsubcontent">
		<li><p><a href="14.1.php">Введение в рефлексию. Класс Class</a></p></li>
		<li><p><a href="14.2.php">Исследование типов</a></p></li>
		<li><p><a href="14.3.php">Поля класса и класс Field</a></p></li>
		<li><p><a href="14.4.php">Модификаторы доступа и класс Modifier</a></p></li>
		<li><p><a href="14.5.php">Класс Constructor и cоздание объектов</a></p></li>
		<li><p><a href="14.6.php">Методы и класс Method</a></p></li>
		<li><p><a href="14.7.php">Proxy (Прокси)</a></p></li>
	</ol>
</li>

<li><p><a href="15.1.php">Глава 16. Аннотации</a></p>
	<ol class="subsubcontent">
		<li><p><a href="15.1.php">Введение в аннотации. Встроенные аннотации</a></p></li>
		<li><p><a href="15.2.php">Создание и применение аннотаций</a></p></li>
		<li><p><a href="15.3.php">Обработка аннотаций во время выполнения</a></p></li>
	</ol>
</li>


<li><p><a href="16.1.php">Глава 17. Взаимодействие с нативным кодом</a></p>
	<ol class="subsubcontent">
		<li><p><a href="16.1.php">Java Native Interface (JNI)</a></p></li>
		<li><p><a href="16.2.php">Foreign Functions и Memory API</a></p></li>
		<li><p><a href="16.3.php">Арена и сегменты памяти MemorySegment</a></p></li>
		<li><p><a href="16.4.php">Компоновка памяти MemoryLayout и работа MemorySegment</a></p></li>
		<li><p><a href="16.5.php">Сложные данные и MemoryLayout</a></p></li>
		<li><p><a href="16.6.php">Поиск и вызов внешних функций</a></p></li>
		<li><p><a href="16.7.php">Нативные функции обратного вызова</a></p></li>
	</ol>
</li>
</ol>
	

	<div style="margin-top:25px;">
<style>
	#yandex_rtb_R-A-201190-3{ width: 100%; height: 300px;overflow:hidden; }
	
	@media(min-width: 760px) { #yandex_rtb_R-A-201190-3{ max-width: 728px;  } }
	@media(min-width: 900px) { #yandex_rtb_R-A-201190-3{ max-width: 336px; } }
	@media(min-width: 1100px) { #yandex_rtb_R-A-201190-3{ max-width: 728px; } }
	@media(min-width: 1400px) { #yandex_rtb_R-A-201190-3{ max-width: 970px;} }
	</style>
	<div id="yandex_rtb_R-A-201190-3"></div>
	</div>

	
	<div class="socBlock">
	<div class="share soctop">
	<ul>
	<li><a title="Поделиться в Вконтакте" rel="nofollow" class="fa fa-lg fa-vk"></a></li>
	<li><a title="Поделиться в Телеграм" rel="nofollow" class="fa fa-lg fa-telegram"></a></li>
	<li><a title="Поделиться в Одноклассниках" rel="nofollow" class="fa fa-lg fa-odnoklassniki"></a></li>
	
	</ul>
	</div>
	</div>
  </div>

	<div class="item left">
     <ul id="browser" class="filetree"> 
	<li class="closed"><span class="folder">Глава 1. Введение в Java</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/1.1.php">Что такое Java</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/1.6.php">Установка JDK</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/1.2.php">Первая программа на Java</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/1.5.php">Первая программа в IntelliJ IDEA</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/1.3.php">Первая программа в NetBeans</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/1.4.php">Первая программа в Eclipse</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/1.7.php">JShell</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 2. Основы программирования на Java</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.11.php">Структура программы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.1.php">Переменные и константы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.19.php">Литералы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.12.php">Типы данных</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.9.php">Консольный ввод/вывод в Java</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.3.php">Арифметические операции</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.13.php">Поразрядные операции</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.14.php">Условные выражения</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.15.php">Операции присваивания и приоритет операций</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.2.php">Преобразования базовых типов данных</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.5.php">Условные конструкции</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.6.php">Циклы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.4.php">Массивы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.20.php">Конструкция и выражение switch</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 3. Классы</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.1.php">Классы и объекты</a></span></li>


			<li><span class="file"><a href="//metanit.com/java/tutorial/2.7.php">Методы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.16.php">Параметры методов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.14.php">Объекты как параметры методов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.17.php">Оператор return. Результат метода</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.18.php">Перегрузка методов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.21.php">Конструкторы и инициализаторы</a></span></li>


			<li><span class="file"><a href="//metanit.com/java/tutorial/3.4.php">Статические компоненты класса и модификатор static</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.20.php">Область действия и время жизни переменных</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.8.php">Рекурсивные функции</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.2.php">Пакеты</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.3.php">Модификаторы доступа</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.19.php">Компактные файлы кода и метод main</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 4. Объектно-ориентированное программирование</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.22.php">Инкапсуляция</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.5.php">Наследование</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.23.php">Запрет наследования и переопределения методов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.24.php">Полиморфизм и динамическая диспетчеризация методов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.9.php">Класс Object и его методы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.6.php">Абстрактные классы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.10.php">Иерархия наследования и преобразование типов</a></span></li>

			<li><span class="file"><a href="//metanit.com/java/tutorial/3.7.php">Интерфейсы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.28.php">Интерфейсы и полиморфизм</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.29.php">Множественная реализация и наследование интерфейсов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.16.php">Интерфейсы в механизме обратного вызова</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.8.php">Перечисления enum</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.11.php">Обобщения (Generics)</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.17.php">Ограничения обобщений</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.15.php">Наследование и обобщения</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.31.php">Type Erasure (Стирание типов)</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.32.php">Подстановочные знаки wildcards в обобщениях</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.13.php">Ссылочные типы и клонирование объектов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.18.php">Классы Records</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/9.4.php">Функциональные интерфейсы и ссылки на методы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/9.1.php">Лямбда-выражения</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/9.2.php">Лямбды как параметры и результаты методов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/9.3.php">Встроенные функциональные интерфейсы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.12.php">Внутренние и вложенные классы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.30.php">Анонимные классы</a></span></li>


			<li><span class="file"><a href="//metanit.com/java/tutorial/3.25.php">Sealed-классы и интерфейсы</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.26.php">Pattern мatching. Паттерн типов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/3.27.php">Pattern мatching. record-паттерн</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 5. Обработка исключений</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/2.10.php">Обработка исключений и конструкция try...catch...finally</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/4.2.php">Классы исключений</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/4.1.php">Операторы throws и throw</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/4.3.php">Создание своих классов исключений</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/4.4.php">Assert</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 6. Коллекции</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/5.1.php">Типы коллекций. Интерфейс Collection</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/5.2.php">Класс ArrayList и интерфейс List</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/5.6.php">Интерфейсы Comparable и Comporator. Сортировка</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/5.7.php">Очереди и стеки. Классы ArrayDeque и PriorityQueue</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/5.3.php">Связанный список LinkedList</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/5.4.php">Интерфейс Set и хеш-таблицы HashSet</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/5.5.php">Деревья TreeSet и интерфейсы SortedSet и NavigableSet</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/5.8.php">Словари. Интерфейс Map и класс HashMap</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/5.9.php">Интерфейсы SortedMap и NavigableMap. Класс TreeMap</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/5.10.php">Итераторы. Iterator и Iterable</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 7. Потоки ввода-вывода. Работа с файлами</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.1.php">Потоки ввода-вывода</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.3.php">Чтение и запись файлов. FileInputStream и FileOutputStream</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.2.php">Закрытие потоков и конструкция try-с-ресурсами</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.4.php">Классы ByteArrayInputStream и ByteArrayOutputStream</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.5.php">Буферизованные потоки BufferedInputStream и BufferedOutputStream</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.6.php">Форматируемый вывод. PrintStream и PrintWriter</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.7.php">Классы DataOutputStream и DataInputStream</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.8.php">Чтение и запись текстовых файлов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.9.php">Буферизация символьных потоков. BufferedReader и BufferedWriter</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.10.php">Сериализация объектов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.11.php">Класс File. Работа с файлами и каталогами</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.12.php">Работа с ZIP-архивами</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/6.13.php">Класс Console</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 8. Работа со строками</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/7.1.php">Введение в строки. Класс String</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/7.2.php">Основные операции со строками</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/7.3.php">StringBuffer и StringBuilder</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/7.4.php">Регулярные выражения</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 9. Многопоточное программирование</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.1.php">Многопоточное программирование и класс Thread</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.2.php">Создание и выполнение потоков</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.11.php">Управление потоками</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.4.php">Завершение и прерывание потока</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.12.php">Виртуальные потоки</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.3.php">Синхронизация потоков. Оператор synchronized</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.5.php">Взаимодействие потоков. Методы wait и notify</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.6.php">Семафоры</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.7.php">Обмен между потоками. Класс Exchanger</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.8.php">Класс Phaser</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.9.php">Блокировки. ReentrantLock</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.10.php">Условия в блокировках</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.16.php">Переменные volatile</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.17.php">Атомарность и Atomics. Потокобезопасность без блокировок</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 10. Асинхронность</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.13.php">Асинхронные задачи FutureTask. Callable и Future</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.14.php">Executor - исполнитель задач</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.15.php">Координация выполнения асинхронных задач</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.18.php">CompletableFuture и промисы. Обработка результата асинхронных задач</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/8.19.php">CompletableFuture, обработка ошибок и завершения асинхронных задач</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 11. Stream API</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.1.php">Введение в Stream API</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.2.php">Создание потока данных</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.3.php">Фильтрация, перебор элементов и отображение</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.8.php">Сортировка</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.13.php">Получение подпотока и объединение потоков</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.4.php">Методы skip и limit</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.11.php">Операции сведения</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.5.php">Метод reduce</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.12.php">Тип Optional</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.6.php">Метод collect</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.7.php">Группировка</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.9.php">Параллельные потоки</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/10.10.php">Параллельные операции над массивами</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 12. Модульность</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/11.1.php">Создание модуля</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/11.2.php">Зависимые модули</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/11.3.php">Взаимодействие между модулями. Экспорт и импорт</a></span></li>
		</ul>
	</li>
	</li>
	<li class="closed"><span class="folder">Глава 13. Дополнительные классы</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/12.1.php">Математические вычисления и класс Math</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/12.2.php">Большие числа BigInteger и BigDecimal</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/12.3.php">Работа с датами. LocalDate</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/12.4.php">Процессы. Process и ProcessBuilder</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 14. JAR-файлы и подключение библиотек и классов</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/13.1.php">Файлы JAR, их создание и выполнение</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/13.2.php">Создание и подключение библиотеки JAR</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/13.4.php">Модульный jar-файл</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/13.3.php">Установка пути к классам Java</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 15. Рефлексия</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/14.1.php">Введение в рефлексию. Класс Class</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/14.2.php">Исследование типов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/14.3.php">Поля класса и класс Field</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/14.4.php">Модификаторы доступа и класс Modifier</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/14.5.php">Класс Constructor и cоздание объектов</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/14.6.php">Методы и класс Method</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/14.7.php">Proxy (Прокси)</a></span></li>
		</ul>
	</li>
	<li class="closed"><span class="folder">Глава 16. Аннотации</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/15.1.php">Введение в аннотации. Встроенные аннотации</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/15.2.php">Создание и применение аннотаций</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/15.3.php">Обработка аннотаций во время выполнения</a></span></li>
		</ul>
	</li>


	<li class="closed"><span class="folder">Глава 17. Взаимодействие с нативным кодом</span>
		<ul>
			<li><span class="file"><a href="//metanit.com/java/tutorial/16.1.php">Java Native Interface (JNI)</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/16.2.php">Foreign Functions и Memory API</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/16.3.php">Арена и сегменты памяти MemorySegment</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/16.4.php">Компоновка памяти MemoryLayout и работа с MemorySegment</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/16.5.php">Сложные данные и MemoryLayout</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/16.6.php">Поиск и вызов внешних функций</a></span></li>
			<li><span class="file"><a href="//metanit.com/java/tutorial/16.7.php">Нативные функции обратного вызова</a></span></li>
		</ul>
	</li>
</ul>   </div>
</div>

  <div class="item right">
<div class="help" style="border: 0px;">
    
	<div class="help-item">
		<div class="help-item-name"><a href="//metanit.com/settings.php">Настройки</a></div>
	 </div>
</div>
			<div class="help">

      <div class="help-header">Помощь сайту</div>

       <div class="help-item">
		<div class="help-item-name"><a href="https://yoomoney.ru/to/410011174743222" rel="nofollow">Помощь сайту</a></div>
	 </div>
       
      <div class="help-item">
		<div class="help-item-name">Юмани:</div>
		<div class="help-item-req">410011174743222</div>
	 </div>

		<div class="help-item">
			<div class="help-item-name">Номер карты:</div>
			<div class="help-item-req">4048415020898850</div>
		</div>

      </div>

	<style>
	#yandex_rtb_R-A-201190-7 { width: 100%; height: 300px;  margin-top:10px;}
	@media(min-width: 500px) { #yandex_rtb_R-A-201190-7{ width: 336px;} }
	@media(min-width: 900px) { #yandex_rtb_R-A-201190-7 { width: 160px; height: 600px; position: sticky; top: 10px;} }
	@media(min-width: 1300px) { #yandex_rtb_R-A-201190-7 { width: 300px; height: 600px; } }
	</style>
	<div id="yandex_rtb_R-A-201190-7"></div>




  </div>
</div>

<div id="footer" style="padding-bottom:85px;">

<div class="bootomLinks">
<a href="https://vk.com/metanit" title="Присоединиться к группе вконтакте" rel="nofollow">
Вконтакте</a>|
<a href="https://metanit.com/donations.php" rel="nofollow">Донаты/Помощь сайту</a>
</div>
<p>Contacts: metanit22@mail.ru</p>
<p>Copyright &copy; Евгений Попов, metanit.com, 2026. Все права защищены.</p>


</div>

</div>

<script>window.yaContextCb=window.yaContextCb||[]</script>
<script src="https://yandex.ru/ads/system/context.js" async></script>

<script>window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-201190-1',
    blockId: 'R-A-201190-1'
  })
});
window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-201190-3',
    blockId: 'R-A-201190-3'
  })
});
window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-201190-7',
    blockId: 'R-A-201190-7'
  })
});
if(document.getElementById("yandex_rtb_R-A-201190-8")){
window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-201190-8',
    blockId: 'R-A-201190-8'
  })
});
}
if(document.getElementById("yandex_rtb_R-A-201190-9")){
window.yaContextCb.push(() => {
    Ya.Context.AdvManager.render({
        "blockId": "R-A-201190-9",
        "renderTo": "yandex_rtb_R-A-201190-9"
    })
});
}</script>


<script src='https://metanit.com/js/syntax16.js'></script>
<script>
SyntaxHighlighter.all();
document.addEventListener('copy', (ev) => {
const et = event.target;if(et.type==="textarea"){ev.clipboardData.setData('text/plain',et.value.substring(et.selectionStart,et.selectionEnd).replace(/\u00A0/g, " "));ev.preventDefault();}
});
console.log("Copyright © Евгений Попов, metani" + "t.com, 2026. Все права защищены.");
</script>
<script>

window.yaContextCb.push(() => {
      if (Ya.Context.AdvManager.getPlatform() === 'desktop') {
        Ya.Context.AdvManager.render({
			"blockId": "R-A-201190-11",
			"type": "floorAd",
			"platform": "desktop"
		});
      } else {
        Ya.Context.AdvManager.render({
			"blockId": "R-A-201190-12",
			"type": "floorAd",
			"platform": "touch"
		});
      }
  });


document.querySelector(".fa-bars").addEventListener("click", ()=>{ 
		const tree = document.querySelector(".item.left");
		const display = tree.style.display;
		if(display=="block") tree.style.display = "none";
		else tree.style.display = "block";
});

const menuButton = document.getElementById("menuButton");
document.getElementById("menuButton").addEventListener("click", ()=>{ 
		menuButton.classList.toggle("menu-opened");
		document.querySelector(".mainmenu").classList.toggle("open");
});


document.getElementById("magnifying-glass").addEventListener("click", ()=> 
	document.getElementById("search").classList.toggle("transp")
);

document.getElementById("toggle-theme").addEventListener("click", ()=>{
		if(document.documentElement.hasAttribute("theme")){
			document.documentElement.removeAttribute("theme");
			document.cookie="theme=1;expires=Mon, 19 Feb 2001 12:00:00 UTC;path=/;";
		}
		else{
			document.documentElement.setAttribute("theme", "dark");
			var expire = new Date();
			expire.setHours(expire.getHours() + 7);
			document.cookie="theme=1;expires=" + expire.toUTCString() + ";path=/;";
		}
	});




document.querySelectorAll(".share .fa-vk").forEach(e => e.addEventListener("click", ()=> window.open("http://vk.com/share.php?url=" + window.location.href,"Поделиться в ВКОНТАКТЕ")));
document.querySelectorAll(".share .fa-telegram").forEach(e => e.addEventListener("click", ()=> window.open("tg://msg_url/url=" + window.location.href,"Поделиться в Telegram")));
document.querySelectorAll(".share .fa-odnoklassniki").forEach(e => e.addEventListener("click", ()=>window.open("https://connect.ok.ru/offer?url=" + window.location.href,"Поделиться в Одноклассниках")));

const folders = document.getElementsByClassName("closed");
for (let i = 0; i < folders.length; i++) {
  folders[i].addEventListener("click", function() {

    this.classList.toggle("closed");
    this.classList.toggle("opened");
  });
}

const activeItem = document.querySelector(".file a[href='//metanit.com" + location.pathname + "']");
if(activeItem){
activeItem.classList.add("aMItem");
activeItem.parentElement.classList.add("aMItem");
const activeFolder = activeItem.closest("li.closed");
activeFolder.classList.toggle("closed");
activeFolder.classList.toggle("opened");
activeFolder.querySelector(".folder")?.classList.add("aMItem");
}

const props = ["--main-font-size", "--main-font-family", "--menc-bg-color", "--container-bg-color", "--menu-bg-color", "--code-font-size", "--code-font-family", "--code-bgcolor", "--code-max-height"];
for(let i = 0; i < props.length; i++){
    
	const propValue = localStorage.getItem(props[i]);
	if(propValue!==null)document.documentElement.style.setProperty(props[i], propValue);
}
</script>


<script async defer type="text/javascript" src="https://www.google.ru/coop/cse/brand?form=cse-search-box&amp;lang=ru"></script>
</body>
</html>
"""
html_kotlin = """

<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Kotlin | Руководство</title>
<meta charset="utf-8" />
<meta name="description" content="Руководство по созданию приложений на языке программирования Kotlin">
<meta name="viewport" content="width=device-width">
<link href="https://metanit.com/style50.css?v=1" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
<header>
<div id="header">
<div id="logo">
<a class="logoTitle" href="/" title="На главную">METANIT.COM</a>
<div class="logoDefinition">Сайт о программировании</div> 
</div>

<div class="socbtns">
<ul>
<li><a title="Посмотреть меню" rel="nofollow" class="fa fa-lg fa-bars"></a></li>
<li><a href="https://metanit.com/donations.php" title="Помощь сайту" rel="nofollow" style="color: var(--fa-usd-color);" class="fa fa-lg fa-usd"></a></li>
<li><a href="https://vk.com/metanit" title="Группа в ВКонтакте" rel="nofollow" style="color: var(--fa-vk-color);" class="fa fa-lg fa-vk"></a></li>
<li><a href="//metanit.com/android.php" title="Приложения андроид" rel="nofollow" style="color: var(--fa-android-color);" class="fa fa-lg fa-android"></a></li>
<li><i id="toggle-theme" class="fa fa-lg fa-adjust"></i></li>
</ul>
</div>


<div id="magnifying-glass"></div>

<div class="menuButton" id="menuButton">
	<span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</div>
</div>

<div id="search" class="transp">
<form action="https://www.google.ru" id="cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-3716042175333627:1096498938" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" name="q" />
    <input type="submit" name="sa" value="Найти" />
  </div>
</form>
</div>

<div id="menu" class="menu">
<ul class="mainmenu">
    <li><a href="//metanit.com/common/">Программирование</a></li>
    <li><a href="//metanit.com/assembler/">Ассемблер</a></li>
   <li><a href="//metanit.com/sharp/">C#</a></li>
   <li><a href="//metanit.com/java/">Java</a></li>
   <li><a href="//metanit.com/web/">WEB</a></li>
   <li><a href="//metanit.com/python/">Python</a></li>
   <li><a href="//metanit.com/c/">C</a></li>
   <li><a href="//metanit.com/cpp/">C++</a></li>
   <li><a href="//metanit.com/sql/">SQL</a></li>
   <li><a href="//metanit.com/nosql/mongodb/">MongoDB</a></li>
   <li><a href="//metanit.com/go/">Go</a></li>
   <li><a href="//metanit.com/visualbasic/">VB.NET</a></li>
   <li><a href="//metanit.com/swift/tutorial/">Swift</a></li>
   <li><a href="//metanit.com/kotlin/">Kotlin</a></li>
   <li><a href="//metanit.com/dart/">Dart</a></li>
   <li><a href="//metanit.com/php/">PHP</a></li>
   <li><a href="//metanit.com/rust/">Rust</a></li>
   <li><a href="//metanit.com/os/">Linux</a></li>
   <li><a href="//metanit.com/f/">F#</a></li>
   <!--<li><a href="//metanit.com/lisp/tutorial/">Common Lisp</a></li>-->
   <li><a href="//metanit.com/hosting">Хостинг</a></li>
</ul>
</div>

</header>
<div class="outercontainer">
<div class="innercontainer">
 
   <div class="item center menC">
     <h1>Руководство по языку Kotlin</h1><div class="date">Последнее обновление: 27.06.2025</div>
	<div class="socBlock">
	<div class="share soctop">
	<ul>
	<li><a title="Поделиться в Вконтакте" rel="nofollow" class="fa fa-lg fa-vk"></a></li>
	<li><a title="Поделиться в Телеграм" rel="nofollow" class="fa fa-lg fa-telegram"></a></li>
	<li><a title="Поделиться в Одноклассниках" rel="nofollow" class="fa fa-lg fa-odnoklassniki"></a></li>
	
	</ul>
	</div>
	</div>

	<div style="margin-top:23px;margin-left:5px;">
		
		<style>
		#yandex_rtb_R-A-201190-1 { width: 100%; height: 250px; overflow:hidden;}
		@media(min-width: 760px) { #yandex_rtb_R-A-201190-1 { max-width: 728px; height: 90px;  } }
		@media(min-width: 900px) { #yandex_rtb_R-A-201190-1 { max-width: 468px; height: 90px;  } }
		@media(min-width: 1100px) { #yandex_rtb_R-A-201190-1{ max-width: 728px; height: 90px;} }
		@media(min-width: 1400px) { #yandex_rtb_R-A-201190-1 { max-width: 970px; height: 90px;} }
		</style>
		<div id="yandex_rtb_R-A-201190-1"></div>
	</div>

	<ol class="content" style="list-style-type:none;">
<li><p><i class="fa fa-lg fa-android"></i><a href="https://www.rustore.ru/catalog/app/com.metanit.kotlin_tutorial" rel="nofollow">мобильная версия руководства</a> (RuStore)</p></li>
<li><p><i class="fa fa-lg fa-android"></i><a href="https://play.google.com/store/apps/details?id=com.metanit.kotlin_tutorial" rel="nofollow">мобильная версия руководства</a> (Google Play)</p></li>

<li><p><a href="1.1.php">Глава 1. Введение в язык Kotlin</a></p>
		<ol class="subsubcontent">
			<li><p><a href="1.1.php">Что такое Kotlin. Первая программа</a></p></li>
			<li><p><a href="1.2.php">Первая программа в IntelliJ IDEA</a></p></li>
		</ol>
	</li>
	<li><p><a href="2.1.php">Глава 2. Основы языка Kotlin</a></p>
		<ol class="subsubcontent">
			<li><p><a href="2.9.php">Структура программы</a></p></li>
			<li><p><a href="2.1.php">Переменные</a></p></li>
			<li><p><a href="2.2.php">Типы данных</a></p></li>
			<li><p><a href="2.10.php">Консольный ввод и вывод</a></p></li>
			<li><p><a href="2.4.php">Операции с числами</a></p></li>
			<li><p><a href="2.5.php">Условные выражения</a></p></li>
			<li><p><a href="2.6.php">Условная конструкция if...else</a></p></li>
			<li><p><a href="2.11.php">Конструкция when</a></p></li>
			<li><p><a href="2.7.php">Циклы</a></p></li>
			<li><p><a href="2.8.php">Диапазоны</a></p></li>
			<li><p><a href="2.3.php">Ведение в массивы</a></p></li>
		</ol>
	</li>
	<li><p><a href="3.1.php">Глава 3. Функциональное программирование</a></p>
		<ol class="subsubcontent">
			<li><p><a href="3.1.php">Функции и их параметры</a></p></li>
			<li><p><a href="3.2.php">Переменное количество параметров. Vararg</a></p></li>
			<li><p><a href="3.3.php">Возвращение результата. Оператор return</a></p></li>
			<li><p><a href="3.4.php">Однострочные и локальные функции</a></p></li>
			<li><p><a href="3.5.php">Перегрузка функций</a></p></li>
			<li><p><a href="3.9.php">Тип функции</a></p></li>
			<li><p><a href="3.7.php">Функции высокого порядка</a></p></li>
			<li><p><a href="3.8.php">Анонимные функции</a></p></li>
			<li><p><a href="3.6.php">Лямбда-выражения</a></p></li>
			<li><p><a href="3.10.php">Замыкания</a></p></li>
		</ol>
	</li>
	<li><p><a href="4.1.php">Глава 4. Объектно-ориентированное программирование</a></p>
		<ol class="subsubcontent">
			<li><p><a href="4.1.php">Классы и объекты</a></p></li>
			<li><p><a href="4.3.php">Конструкторы</a></p></li>
			<li><p><a href="4.5.php">Пакеты и импорт</a></p></li>
			<li><p><a href="4.9.php">Наследование</a></p></li>
			<li><p><a href="4.6.php">Модификаторы видимости</a></p></li>
			<li><p><a href="4.2.php">Геттеры и сеттеры</a></p></li>
			<li><p><a href="4.10.php">Переопределение методов и свойств</a></p></li>
			<li><p><a href="4.11.php">Абстрактные классы и методы</a></p></li>
			<li><p><a href="4.8.php">Интерфейсы</a></p></li>
			<li><p><a href="4.7.php">Вложенные и внутренние классы и интерфейсы</a></p></li>
			<li><p><a href="4.12.php">Data-классы</a></p></li>
			<li><p><a href="4.13.php">Перечисления enums</a></p></li>
			<li><p><a href="4.4.php">Делегирование</a></p></li>
			<li><p><a href="4.14.php">Анонимные классы и объекты</a></p></li>
			<li><p><a href="4.15.php">Companion-объекты</a></p></li>
		</ol>
	</li>
	<li><p><a href="6.1.php">Глава 5. Обобщения</a></p>
		<ol class="subsubcontent">
			<li><p><a href="6.1.php">Обобщенные классы и функции</a></p></li>
			<li><p><a href="6.2.php">Ограничения обобщений</a></p></li>
			<li><p><a href="6.3.php">Вариантность, ковариантность и контравариантность</a></p></li>
		</ol>
	</li>
	<li><p><a href="5.1.php">Глава 6. Дополнительные возможности ООП</a></p>
		<ol class="subsubcontent">
			<li><p><a href="5.2.php">Обработка исключений</a></p></li>
			<li><p><a href="5.1.php">Null и nullable-типы</a></p></li>
			<li><p><a href="5.3.php">Преобразование типов</a></p></li>
			<li><p><a href="5.5.php">Функции расширения</a></p></li>
			<li><p><a href="5.9.php">Функции расширения с получателем</a></p></li>
			<li><p><a href="5.8.php">Перегрузка операторов</a></p></li>
			<li><p><a href="5.6.php">Делегированные свойства</a></p></li>
			<li><p><a href="5.7.php">Scope-функции</a></p></li>
			<li><p><a href="5.4.php">Инфиксная нотация</a></p></li>
		</ol>
	</li>
	<li><p><a href="7.1.php">Глава 7. Коллекции и последовательности</a></p>
		<ol class="subsubcontent">
			<li><p><a href="7.1.php">Изменяемые и неизменяемые коллекции</a></p></li>
			<li><p><a href="7.2.php">List</a></p></li>
			<li><p><a href="7.3.php">Set</a></p></li>
			<li><p><a href="7.4.php">Map</a></p></li>
			<li><p><a href="7.5.php">Последовательности</a></p></li>
			<li><p><a href="7.16.php">Массивы</a></p></li>
			<li><p><a href="7.6.php">Отличие последовательности от коллекций Iterable</a></p></li>
			<li><p><a href="7.7.php">Фильтрация</a></p></li>
			<li><p><a href="7.8.php">Проверка элементов</a></p></li>
			<li><p><a href="7.9.php">Трансформации</a></p></li>
			<li><p><a href="7.10.php">Группировка</a></p></li>
			<li><p><a href="7.11.php">Сортировка</a></p></li>
			<li><p><a href="7.12.php">Агрегатные операции</a></p></li>
			<li><p><a href="7.13.php">Сложение, вычитание и объединение коллекций</a></p></li>
			<li><p><a href="7.14.php">Получение части элементов</a></p></li>
			<li><p><a href="7.15.php">Получение отдельных элементов</a></p></li>
		</ol>
	</li>
	<li><p><a href="8.1.php">Глава 8. Корутины</a></p>
		<ol class="subsubcontent">
			<li><p><a href="8.1.php">Введение в корутины</a></p></li>
			<li><p><a href="8.2.php">Область корутины</a></p></li>
			<li><p><a href="8.3.php">launch и Job</a></p></li>
			<li><p><a href="8.4.php">Async, await и Deferred</a></p></li>
			<li><p><a href="8.7.php">Диспетчер корутины</a></p></li>
			<li><p><a href="8.5.php">Отмена выполнения корутин</a></p></li>
			<li><p><a href="8.6.php">Каналы</a></p></li>
		</ol>
	</li>
	<li><p><a href="9.1.php">Глава 9. Асинхронные потоки</a></p>
		<ol class="subsubcontent">
			<li><p><a href="9.1.php">Введение в асинхронные потоки</a></p></li>
			<li><p><a href="9.2.php">Создание асинхронного потока</a></p></li>
			<li><p><a href="9.3.php">Операции с потоками</a></p></li>
			<li><p><a href="9.4.php">Функции count, take и drop. Количество элементов в потоке</a></p></li>
			<li><p><a href="9.5.php">Функции first, last, single</a></p></li>
			<li><p><a href="9.6.php">Преобразование данных. Функции map и transform</a></p></li>
			<li><p><a href="9.7.php">Фильтрация данных</a></p></li>
			<li><p><a href="9.8.php">Сведение данных. Функции reduce и fold</a></p></li>
			<li><p><a href="9.9.php">Объединение потоков</a></p></li>
		</ol>
	</li>
</ol>
	

	<div style="margin-top:25px;">
<style>
	#yandex_rtb_R-A-201190-3{ width: 100%; height: 300px;overflow:hidden; }
	
	@media(min-width: 760px) { #yandex_rtb_R-A-201190-3{ max-width: 728px;  } }
	@media(min-width: 900px) { #yandex_rtb_R-A-201190-3{ max-width: 336px; } }
	@media(min-width: 1100px) { #yandex_rtb_R-A-201190-3{ max-width: 728px; } }
	@media(min-width: 1400px) { #yandex_rtb_R-A-201190-3{ max-width: 970px;} }
	</style>
	<div id="yandex_rtb_R-A-201190-3"></div>
	</div>

	
	<div class="socBlock">
	<div class="share soctop">
	<ul>
	<li><a title="Поделиться в Вконтакте" rel="nofollow" class="fa fa-lg fa-vk"></a></li>
	<li><a title="Поделиться в Телеграм" rel="nofollow" class="fa fa-lg fa-telegram"></a></li>
	<li><a title="Поделиться в Одноклассниках" rel="nofollow" class="fa fa-lg fa-odnoklassniki"></a></li>
	
	</ul>
	</div>
	</div>
  </div>

	<div class="item left">
     <ul id="browser" class="filetree"> 
<li class="closed"><span class="folder">Глава 1. Введение в язык Kotlin</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/1.1.php">Что такое Kotlin. Первая программа</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/1.2.php">Первая программа в IntelliJ IDEA</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 2. Основы языка Kotlin</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/2.9.php">Структура программы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/2.1.php">Переменные</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/2.2.php">Типы данных</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/2.10.php">Консольный ввод и вывод</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/2.4.php">Операции с числами</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/2.5.php">Условные выражения</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/2.6.php">Условная конструкция if...else</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/2.11.php">Конструкция when</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/2.7.php">Циклы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/2.8.php">Диапазоны</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/2.3.php">Ведение в массивы</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 3. Функциональное программирование</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/3.1.php">Функции и их параметры</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/3.2.php">Переменное количество параметров. Vararg</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/3.3.php">Возвращение результата. Оператор return</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/3.4.php">Однострочные и локальные функции</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/3.5.php">Перегрузка функций</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/3.9.php">Тип функции</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/3.7.php">Функции высокого порядка</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/3.8.php">Анонимные функции</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/3.6.php">Лямбда-выражения</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/3.10.php">Замыкания</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 4. Объектно-ориентированное программирование</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.1.php">Классы и объекты</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.3.php">Конструкторы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.5.php">Пакеты и импорт</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.9.php">Наследование</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.10.php">Переопределение методов и свойств</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.6.php">Модификаторы видимости</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.2.php">Геттеры и сеттеры</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.11.php">Абстрактные классы и методы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.8.php">Интерфейсы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.7.php">Вложенные и внутренние классы и интерфейсы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.12.php">Data-классы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.13.php">Перечисления enums</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.4.php">Делегирование</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.14.php">Анонимные классы и объекты</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/4.15.php">Companion-объекты</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 5. Обобщения</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/6.1.php">Обобщенные классы и функции</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/6.2.php">Ограничения обобщений</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/6.3.php">Вариантность, ковариантность и контравариантность</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 6. Дополнительные возможности ООП</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/5.2.php">Обработка исключений</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/5.1.php">Null и nullable-типы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/5.3.php">Преобразование типов</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/5.5.php">Функции расширения</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/5.9.php">Функции расширения с получателем</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/5.8.php">Перегрузка операторов</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/5.6.php">Делегированные свойства</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/5.7.php">Scope-функции</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/5.4.php">Инфиксная нотация</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 7. Коллекции и последовательности</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.1.php">Изменяемые и неизменяемые коллекции</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.2.php">List</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.3.php">Set</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.4.php">Map</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.5.php">Последовательности</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.16.php">Массивы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.6.php">Отличие последовательности от коллекций Iterable</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.7.php">Фильтрация</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.8.php">Проверка элементов</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.9.php">Трансформации</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.10.php">Группировка</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.11.php">Сортировка</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.12.php">Агрегатные операции</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.13.php">Сложение, вычитание и объединение коллекций</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.14.php">Получение части элементов</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/7.15.php">Получение отдельных элементов</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 8. Корутины</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/8.1.php">Введение в корутины</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/8.2.php">Область корутины</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/8.3.php">launch и Job</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/8.4.php">Async, await и Deferred</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/8.7.php">Диспетчер корутины</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/8.5.php">Отмена выполнения корутин</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/8.6.php">Каналы</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 9. Асинхронные потоки</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/9.1.php">Введение в асинхронные потоки</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/9.2.php">Создание асинхронного потока</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/9.3.php">Операции с потоками</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/9.4.php">Функции count, take и drop. Количество элементов в потоке</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/9.5.php">Функции first, last, single</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/9.6.php">Преобразование данных. Функции map и transform</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/9.7.php">Фильтрация данных</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/9.8.php">Сведение данных. Функции reduce и fold</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/tutorial/9.9.php">Объединение потоков</a></span></li>
	</ul>
</li>
</ul>   </div>
</div>

  <div class="item right">
<div class="help" style="border: 0px;">
    
	<div class="help-item">
		<div class="help-item-name"><a href="//metanit.com/settings.php">Настройки</a></div>
	 </div>
</div>
			<div class="help">

      <div class="help-header">Помощь сайту</div>

       <div class="help-item">
		<div class="help-item-name"><a href="https://yoomoney.ru/to/410011174743222" rel="nofollow">Помощь сайту</a></div>
	 </div>
       
      <div class="help-item">
		<div class="help-item-name">Юмани:</div>
		<div class="help-item-req">410011174743222</div>
	 </div>

		<div class="help-item">
			<div class="help-item-name">Номер карты:</div>
			<div class="help-item-req">4048415020898850</div>
		</div>

      </div>

	<style>
	#yandex_rtb_R-A-201190-7 { width: 100%; height: 300px;  margin-top:10px;}
	@media(min-width: 500px) { #yandex_rtb_R-A-201190-7{ width: 336px;} }
	@media(min-width: 900px) { #yandex_rtb_R-A-201190-7 { width: 160px; height: 600px; position: sticky; top: 10px;} }
	@media(min-width: 1300px) { #yandex_rtb_R-A-201190-7 { width: 300px; height: 600px; } }
	</style>
	<div id="yandex_rtb_R-A-201190-7"></div>




  </div>
</div>

<div id="footer" style="padding-bottom:85px;">

<div class="bootomLinks">
<a href="https://vk.com/metanit" title="Присоединиться к группе вконтакте" rel="nofollow">
Вконтакте</a>|
<a href="https://metanit.com/donations.php" rel="nofollow">Донаты/Помощь сайту</a>
</div>
<p>Contacts: metanit22@mail.ru</p>
<p>Copyright &copy; Евгений Попов, metanit.com, 2026. Все права защищены.</p>


</div>

</div>

<script>window.yaContextCb=window.yaContextCb||[]</script>
<script src="https://yandex.ru/ads/system/context.js" async></script>

<script>window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-201190-1',
    blockId: 'R-A-201190-1'
  })
});
window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-201190-3',
    blockId: 'R-A-201190-3'
  })
});
window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-201190-7',
    blockId: 'R-A-201190-7'
  })
});
if(document.getElementById("yandex_rtb_R-A-201190-8")){
window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-201190-8',
    blockId: 'R-A-201190-8'
  })
});
}
if(document.getElementById("yandex_rtb_R-A-201190-9")){
window.yaContextCb.push(() => {
    Ya.Context.AdvManager.render({
        "blockId": "R-A-201190-9",
        "renderTo": "yandex_rtb_R-A-201190-9"
    })
});
}</script>


<script src='https://metanit.com/js/syntax16.js'></script>
<script>
SyntaxHighlighter.all();
document.addEventListener('copy', (ev) => {
const et = event.target;if(et.type==="textarea"){ev.clipboardData.setData('text/plain',et.value.substring(et.selectionStart,et.selectionEnd).replace(/\u00A0/g, " "));ev.preventDefault();}
});
console.log("Copyright © Евгений Попов, metani" + "t.com, 2026. Все права защищены.");
</script>
<script>

window.yaContextCb.push(() => {
      if (Ya.Context.AdvManager.getPlatform() === 'desktop') {
        Ya.Context.AdvManager.render({
			"blockId": "R-A-201190-11",
			"type": "floorAd",
			"platform": "desktop"
		});
      } else {
        Ya.Context.AdvManager.render({
			"blockId": "R-A-201190-12",
			"type": "floorAd",
			"platform": "touch"
		});
      }
  });


document.querySelector(".fa-bars").addEventListener("click", ()=>{ 
		const tree = document.querySelector(".item.left");
		const display = tree.style.display;
		if(display=="block") tree.style.display = "none";
		else tree.style.display = "block";
});

const menuButton = document.getElementById("menuButton");
document.getElementById("menuButton").addEventListener("click", ()=>{ 
		menuButton.classList.toggle("menu-opened");
		document.querySelector(".mainmenu").classList.toggle("open");
});


document.getElementById("magnifying-glass").addEventListener("click", ()=> 
	document.getElementById("search").classList.toggle("transp")
);

document.getElementById("toggle-theme").addEventListener("click", ()=>{
		if(document.documentElement.hasAttribute("theme")){
			document.documentElement.removeAttribute("theme");
			document.cookie="theme=1;expires=Mon, 19 Feb 2001 12:00:00 UTC;path=/;";
		}
		else{
			document.documentElement.setAttribute("theme", "dark");
			var expire = new Date();
			expire.setHours(expire.getHours() + 7);
			document.cookie="theme=1;expires=" + expire.toUTCString() + ";path=/;";
		}
	});




document.querySelectorAll(".share .fa-vk").forEach(e => e.addEventListener("click", ()=> window.open("http://vk.com/share.php?url=" + window.location.href,"Поделиться в ВКОНТАКТЕ")));
document.querySelectorAll(".share .fa-telegram").forEach(e => e.addEventListener("click", ()=> window.open("tg://msg_url/url=" + window.location.href,"Поделиться в Telegram")));
document.querySelectorAll(".share .fa-odnoklassniki").forEach(e => e.addEventListener("click", ()=>window.open("https://connect.ok.ru/offer?url=" + window.location.href,"Поделиться в Одноклассниках")));

const folders = document.getElementsByClassName("closed");
for (let i = 0; i < folders.length; i++) {
  folders[i].addEventListener("click", function() {

    this.classList.toggle("closed");
    this.classList.toggle("opened");
  });
}

const activeItem = document.querySelector(".file a[href='//metanit.com" + location.pathname + "']");
if(activeItem){
activeItem.classList.add("aMItem");
activeItem.parentElement.classList.add("aMItem");
const activeFolder = activeItem.closest("li.closed");
activeFolder.classList.toggle("closed");
activeFolder.classList.toggle("opened");
activeFolder.querySelector(".folder")?.classList.add("aMItem");
}

const props = ["--main-font-size", "--main-font-family", "--menc-bg-color", "--container-bg-color", "--menu-bg-color", "--code-font-size", "--code-font-family", "--code-bgcolor", "--code-max-height"];
for(let i = 0; i < props.length; i++){
    
	const propValue = localStorage.getItem(props[i]);
	if(propValue!==null)document.documentElement.style.setProperty(props[i], propValue);
}
</script>


<script async defer type="text/javascript" src="https://www.google.ru/coop/cse/brand?form=cse-search-box&amp;lang=ru"></script>
</body>
</html>
"""
html_android = """

<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Kotlin и Android | Руководство</title>
<meta charset="utf-8" />
<meta name="description" content="Руководство созданию приложений под Android с помощью языка программирования Kotlin и тулкита Jetpack Compose">
<meta name="viewport" content="width=device-width">
<link href="https://metanit.com/style50.css?v=1" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
<header>
<div id="header">
<div id="logo">
<a class="logoTitle" href="/" title="На главную">METANIT.COM</a>
<div class="logoDefinition">Сайт о программировании</div> 
</div>

<div class="socbtns">
<ul>
<li><a title="Посмотреть меню" rel="nofollow" class="fa fa-lg fa-bars"></a></li>
<li><a href="https://metanit.com/donations.php" title="Помощь сайту" rel="nofollow" style="color: var(--fa-usd-color);" class="fa fa-lg fa-usd"></a></li>
<li><a href="https://vk.com/metanit" title="Группа в ВКонтакте" rel="nofollow" style="color: var(--fa-vk-color);" class="fa fa-lg fa-vk"></a></li>
<li><a href="//metanit.com/android.php" title="Приложения андроид" rel="nofollow" style="color: var(--fa-android-color);" class="fa fa-lg fa-android"></a></li>
<li><i id="toggle-theme" class="fa fa-lg fa-adjust"></i></li>
</ul>
</div>


<div id="magnifying-glass"></div>

<div class="menuButton" id="menuButton">
	<span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</div>
</div>

<div id="search" class="transp">
<form action="https://www.google.ru" id="cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-3716042175333627:1096498938" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" name="q" />
    <input type="submit" name="sa" value="Найти" />
  </div>
</form>
</div>

<div id="menu" class="menu">
<ul class="mainmenu">
    <li><a href="//metanit.com/common/">Программирование</a></li>
    <li><a href="//metanit.com/assembler/">Ассемблер</a></li>
   <li><a href="//metanit.com/sharp/">C#</a></li>
   <li><a href="//metanit.com/java/">Java</a></li>
   <li><a href="//metanit.com/web/">WEB</a></li>
   <li><a href="//metanit.com/python/">Python</a></li>
   <li><a href="//metanit.com/c/">C</a></li>
   <li><a href="//metanit.com/cpp/">C++</a></li>
   <li><a href="//metanit.com/sql/">SQL</a></li>
   <li><a href="//metanit.com/nosql/mongodb/">MongoDB</a></li>
   <li><a href="//metanit.com/go/">Go</a></li>
   <li><a href="//metanit.com/visualbasic/">VB.NET</a></li>
   <li><a href="//metanit.com/swift/tutorial/">Swift</a></li>
   <li><a href="//metanit.com/kotlin/">Kotlin</a></li>
   <li><a href="//metanit.com/dart/">Dart</a></li>
   <li><a href="//metanit.com/php/">PHP</a></li>
   <li><a href="//metanit.com/rust/">Rust</a></li>
   <li><a href="//metanit.com/os/">Linux</a></li>
   <li><a href="//metanit.com/f/">F#</a></li>
   <!--<li><a href="//metanit.com/lisp/tutorial/">Common Lisp</a></li>-->
   <li><a href="//metanit.com/hosting">Хостинг</a></li>
</ul>
</div>

</header>
<div class="outercontainer">
<div class="innercontainer">
 
   <div class="item center menC">
     <h1>Руководство созданию приложений под Android с помощью Kotlin и Jetpack Compose</h1><div class="date">Последнее обновление: 31.08.2025</div>
	<div class="socBlock">
	<div class="share soctop">
	<ul>
	<li><a title="Поделиться в Вконтакте" rel="nofollow" class="fa fa-lg fa-vk"></a></li>
	<li><a title="Поделиться в Телеграм" rel="nofollow" class="fa fa-lg fa-telegram"></a></li>
	<li><a title="Поделиться в Одноклассниках" rel="nofollow" class="fa fa-lg fa-odnoklassniki"></a></li>
	
	</ul>
	</div>
	</div>

	<div style="margin-top:23px;margin-left:5px;">
		
		<style>
		#yandex_rtb_R-A-201190-1 { width: 100%; height: 250px; overflow:hidden;}
		@media(min-width: 760px) { #yandex_rtb_R-A-201190-1 { max-width: 728px; height: 90px;  } }
		@media(min-width: 900px) { #yandex_rtb_R-A-201190-1 { max-width: 468px; height: 90px;  } }
		@media(min-width: 1100px) { #yandex_rtb_R-A-201190-1{ max-width: 728px; height: 90px;} }
		@media(min-width: 1400px) { #yandex_rtb_R-A-201190-1 { max-width: 970px; height: 90px;} }
		</style>
		<div id="yandex_rtb_R-A-201190-1"></div>
	</div>

	<ol class="content" style="list-style-type:none;">
<li><p><i class="fa fa-lg fa-android"></i><a href="https://www.rustore.ru/catalog/app/com.metanit.android" rel="nofollow">Полная мобильная версия руководства</a> (RuStore)</p></li>
<li><p><a href="1.1.php">Глава 1. Введение в Jetpack Compose</a></p>
		<ol class="subsubcontent">
			<li><p><a href="1.1.php">Что такое Jetpack Compose</a></p></li>
			<li><p><a href="1.4.php">Установка Android Studio</a></p></li>
			<li><p><a href="1.2.php">Первый проект на Jetpack Compose</a></p></li>
			<li><p><a href="1.3.php">Создание визуального интерфейса</a></p></li>
			<li><p><a href="1.5.php">Создание компонентов Composable</a></p></li>
			<li><p><a href="5.1.php">Взаимодействие с кодом Kotlin</a></p></li>
			<li><p><a href="1.6.php">Gradle</a></p></li>
			<li><p><a href="1.7.php">Добавление зависимостей</a></p></li>
			<li><p><a href="1.8.php">Файл манифеста AndroidManifest.xml</a></p></li>
		</ol>
	</li>
<li><p><a href="3.1.php">Глава 2. Модификаторы и визуальный интерфейс</a></p>
		<ol class="subsubcontent">
			<li><p><a href="3.1.php">Что такое модификаторы</a></p></li>
			<li><p><a href="3.2.php">Установка цвета</a></p></li>
			<li><p><a href="3.3.php">Установка размеров</a></p></li>
			<li><p><a href="3.4.php">Установка отступов и смещения</a></p></li>
			<li><p><a href="3.5.php">Создание прокрутки</a></p></li>
			<li><p><a href="3.7.php">Создание границы. Модификатор border</a></p></li>
			<li><p><a href="3.8.php">Модификатор clip. Создание фрагмента компонента</a></p></li>
			<li><p><a href="3.9.php">Создание тени и модификатор shadow</a></p></li>
			<li><p><a href="3.6.php">Обработка нажатий</a></p></li>
			<li><p><a href="3.10.php">Переопределение и объединение модификаторов</a></p></li>
		</ol>
	</li>
	
	<li><p><a href="2.1.php">Глава 3. Контейнеры компоновки</a></p>
		<ol class="subsubcontent">
			<li><p><a href="2.1.php">Box</a></p></li>
			<li><p><a href="2.2.php">Column</a></p></li>
			<li><p><a href="2.3.php">Row</a></p></li>
			<li><p><a href="2.4.php">Композиции контейнеров</a></p></li>
			<li><p><a href="2.5.php">Surface</a></p></li>
			<li><p><a href="2.6.php">Списки LazyColumn и LazyRow</a></p></li>
			<li><p><a href="2.7.php">Грид</a></p></li>
			<li><p><a href="2.12.php">LazyVerticalStaggeredGrid и LazyHorizontalStaggeredGrid</a></p></li>
			<li><p><a href="2.8.php">FlowRow и FlowColumn</a></p></li>
			<li><p><a href="2.9.php">IntrinsicSize</a></p></li>
			<li><p><a href="2.10.php">Программная прокрутка</a></p></li>
			<li><p><a href="2.11.php">Прикрепленные заголовки</a></p></li>
			<li><p><a href="2.13.php">Модификатор aspectRatio</a></p></li>
			<li><p><a href="2.14.php">Интерфейс Edge-to-edge, enableEdgeToEdge и WindowInsets</a></p></li>
		</ol>
	</li>
	<li><p><a href="5.1.php">Глава 4. Состояние компонентов</a></p>
		<ol class="subsubcontent">
			<li><p><a href="5.2.php">Введение в состояние компонентов</a></p></li>
			<li><p><a href="5.3.php">Однонаправленный поток данных</a></p></li>
			<li><p><a href="5.4.php">CompositionLocal</a></p></li>
			<li><p><a href="5.5.php">Производное состояние</a></p></li>
		</ol>
	</li>
	<li><p><a href="4.1.php">Глава 5. Визуальные компоненты</a></p>
		<ol class="subsubcontent">
			<li><p><a href="4.1.php">Text</a></p></li>
			<li><p><a href="4.19.php">Аннотированные строки</a></p></li>
			<li><p><a href="4.2.php">Кнопка Button</a></p></li>
			<li><p><a href="4.3.php">Ввод текста, TextField и OutlinedTextField</a></p></li>
			<li><p><a href="4.7.php">Модификатор Modifier.toggleable</a></p></li>
			<li><p><a href="4.4.php">Checkbox</a></p></li>
			<li><p><a href="4.6.php">Выбираемый компонент и модификатор selectable</a></p></li>
			<li><p><a href="4.5.php">RadioButton</a></p></li>
			<li><p><a href="4.8.php">Иконки и компоненты IconButton и IconToggleButton</a></p></li>
			<li><p><a href="4.9.php">FloatingActionButton и ExtendedFloatingActionButton</a></p></li>
			<li><p><a href="4.10.php">Панели приложения TopAppBar и BottomAppBar</a></p></li>
			<li><p><a href="4.11.php">Scaffold</a></p></li>
			<li><p><a href="4.12.php">Всплывающие сообщения и Snackbar</a></p></li>
			<li><p><a href="4.13.php">Выдвижная панель ModalNavigationDrawer</a></p></li>
			<li><p><a href="4.14.php">Slider</a></p></li>
			<li><p><a href="4.15.php">Переключатель Switch</a></p></li>
			<li><p><a href="4.16.php">Диалоговые окна AlertDialog</a></p></li>
			<li><p><a href="4.17.php">Меню DropdownMenu</a></p></li>
			<li><p><a href="4.18.php">Индикаторы прогресса</a></p></li>
			<li><p><a href="4.20.php">AndroidView</a></p></li>
		</ol>
	</li>
	
	<li><p><a href="7.1.php">Глава 6. Ресурсы в Jetpack Compose</a></p>
		<ol class="subsubcontent">
			<li><p><a href="7.1.php">Ресурсы строк</a></p></li>
			<li><p><a href="7.2.php">Ресурсы dimension</a></p></li>
			<li><p><a href="7.3.php">Ресурсы Color</a></p></li>
		</ol>
	</li>
	
	<li><p><a href="6.1.php">Глава 7. Работа с изображениями</a></p>
		<ol class="subsubcontent">
			<li><p><a href="6.1.php">Компонент Image</a></p></li>
			<li><p><a href="6.2.php">Ресурсы изображений и ImageBitmap</a></p></li>
			<li><p><a href="6.3.php">Векторная графика и ImageVector</a></p></li>
		</ol>
	</li>
	<li><p><a href="8.1.php">Глава 8. Кастомные контейнеры компоновки</a></p>
		<ol class="subsubcontent">
			<li><p><a href="8.1.php">Создание модификаторов компоновки</a></p></li>
			<li><p><a href="8.2.php">Создание контейнеров компоновки</a></p></li>
		</ol>
	</li>
	<li><p><a href="9.1.php">Глава 9. ConstraintLayout</a></p>
		<ol class="subsubcontent">
			<li><p><a href="9.1.php">Подключение ConstraintLayout</a></p></li>
			<li><p><a href="9.2.php">Установка ограничений в ConstraintLayout</a></p></li>
			<li><p><a href="9.3.php">Создание цепочек компонентов</a></p></li>
            <li><p><a href="9.4.php">Направляющие линии guildeline</a></p></li>
			<li><p><a href="9.5.php">Барьеры</a></p></li>
			<li><p><a href="9.6.php">Наборы ограничений ConstraintSet</a></p></li>
		</ol>
	</li>
	<li><p><a href="10.1.php">Глава 10. Корутины и асинхронность</a></p>
		<ol class="subsubcontent">
			<li><p><a href="10.1.php">Введение в корутины</a></p></li>
			<li><p><a href="10.2.php">LaunchedEffect</a></p></li>
			<li><p><a href="10.3.php">Потоки Flow</a></p></li>
			<li><p><a href="10.4.php">StateFlow</a></p></li>
			<li><p><a href="10.5.php">SharedState</a></p></li>
		</ol>
	</li>
	<li><p><a href="12.1.php">Глава 11. Пагинация</a></p>
		<ol class="subsubcontent">
			<li><p><a href="12.1.php">Введение в пагинацию</a></p></li>
			<li><p><a href="12.2.php">Пример пагинации. Навигационные кнопки</a></p></li>
		</ol>
	</li>
	<li><p><a href="13.1.php">Глава 12. Анимация</a></p>
		<ol class="subsubcontent">
			<li><p><a href="13.1.php">Анимация Dp. animateDpAsState</a></p></li>
			<li><p><a href="13.2.php">Функция tween. Время и сглаживание анимации</a></p></li>
			<li><p><a href="13.3.php">Функция repeatable и повторение анимации</a></p></li>
            <li><p><a href="13.4.php">Функция spring и эффект отскока</a></p></li>
			<li><p><a href="13.5.php">Функция keyframes и анимация по ключевым кадрам</a></p></li>
			<li><p><a href="13.6.php">Анимация цвета. animateColorAsState</a></p></li>
			<li><p><a href="13.7.php">Анимация числовых значений и animateFloatAsState</a></p></li>
			<li><p><a href="13.8.php">Объединение анимаций</a></p></li>
			<li><p><a href="13.9.php">AnimatedVisibility. Управление видимостью компонента</a></p></li>
			<li><p><a href="13.10.php">Настройка анимации в AnimatedVisibility</a></p></li>
			<li><p><a href="13.11.php">Модификатор animateEnterExit()</a></p></li>
			<li><p><a href="13.12.php">Crossfade</a></p></li>
		</ol>
	</li>
	<li><p><a href="14.1.php">Глава 13. Рисование. Canvas</a></p>
		<ol class="subsubcontent">
			<li><p><a href="14.1.php">Компонент Canvas и DrawScope</a></p></li>
			<li><p><a href="14.2.php">Отрисовка линий</a></p></li>
			<li><p><a href="14.3.php">Отрисовка прямоугольников</a></p></li>
            <li><p><a href="14.4.php">Отрисовка кругов и овалов</a></p></li>
			<li><p><a href="14.5.php">Отрисовка дуги</a></p></li>
			<li><p><a href="14.6.php">Рисование геометрических путей</a></p></li>
			<li><p><a href="14.7.php">Отрисовка точек</a></p></li>
			<li><p><a href="14.8.php">Вывод текста</a></p></li>
			<li><p><a href="14.9.php">Отрисовка изображений</a></p></li>
			<li><p><a href="14.10.php">Трансформации</a></p></li>
			<li><p><a href="14.11.php">Создание градиента</a></p></li>
		</ol>
	</li>
	<li><p><a href="15.1.php">Глава 14. ViewModel</a></p>
		<ol class="subsubcontent">
			<li><p><a href="15.1.php">Хранение состояния во ViewModel и взаимодействие с интерфейсом</a></p></li>
			<li><p><a href="15.2.php">LiveData</a></p></li>
			<li><p><a href="15.3.php">Пример приложения с VieModel</a></p></li>
			<li><p><a href="15.4.php">AndroidViewModel</a></p></li>
		</ol>
	</li>
	<li><p><a href="16.1.php">Глава 15. Работа с базой данных</a></p>
		<ol class="subsubcontent">
			<li><p><a href="16.1.php">SQLite и Room</a></p></li>
			<li><p><a href="16.2.php">Основные элементы Room</a></p></li>
			<li><p><a href="16.3.php">Пример работы с SQLite и Room</a></p></li>
		</ol>
	</li>
	<li><p><a href="17.1.php">Глава 16. Навигация</a></p>
		<ol class="subsubcontent">
			<li><p><a href="17.1.php">Введение в навигацию</a></p></li>
			<li><p><a href="17.2.php">Пример навигации</a></p></li>
			<li><p><a href="17.3.php">Параметры навигации</a></p></li>
			<li><p><a href="17.4.php">Панель навигации</a></p></li>
		</ol>
	</li>
	<li><p><a href="18.1.php">Глава 17. Обработка жестов</a></p>
		<ol class="subsubcontent">
			<li><p><a href="18.1.php">Жесты нажатия</a></p></li>
			<li><p><a href="18.2.php">Петаскивание</a></p></li>
			<li><p><a href="18.3.php">Перетаскивание с помощью PointerInputScope</a></p></li>
			<li><p><a href="18.4.php">Перетаскивание по опорным точкам</a></p></li>
			<li><p><a href="18.5.php">Прокрутка</a></p></li>
			<li><p><a href="18.6.php">Масштабирование, вращение и перемещение</a></p></li>
		</ol>
	</li>
	<li><p><a href="19.1.php">Глава 18. Activity</a></p>
		<ol class="subsubcontent">
			<li><p><a href="19.1.php">Activity и жизненный цикл приложения</a></p></li>
			<li><p><a href="19.2.php">Управление жизненным циклом Activity в компонентах Compose</a></p></li>
			<li><p><a href="19.3.php">Введение в Intent. Запуск Activity</a></p></li>
			<li><p><a href="19.4.php">Передача данных между Activity</a></p></li>
		</ol>
	</li>
	<li><p><a href="11.1.php">Глава 19. Дополнительные статьи</a></p>
		<ol class="subsubcontent">
			<li><p><a href="11.1.php">Кнопка прокрутки</a></p></li>
			<li><p><a href="11.2.php">Темы. Material Design</a></p></li>
			<li><p><a href="11.3.php">Биометрическая аутентификация</a></p></li>
			<li><p><a href="11.4.php">Настройки SharedPreferences</a></p></li>
			<li><p><a href="11.5.php">Сетевые запросы</a></p></li>
			<li><p><a href="11.6.php">Локализация приложений</a></p></li>
		</ol>
	</li>
</ol>
	

	<div style="margin-top:25px;">
<style>
	#yandex_rtb_R-A-201190-3{ width: 100%; height: 300px;overflow:hidden; }
	
	@media(min-width: 760px) { #yandex_rtb_R-A-201190-3{ max-width: 728px;  } }
	@media(min-width: 900px) { #yandex_rtb_R-A-201190-3{ max-width: 336px; } }
	@media(min-width: 1100px) { #yandex_rtb_R-A-201190-3{ max-width: 728px; } }
	@media(min-width: 1400px) { #yandex_rtb_R-A-201190-3{ max-width: 970px;} }
	</style>
	<div id="yandex_rtb_R-A-201190-3"></div>
	</div>

	
	<div class="socBlock">
	<div class="share soctop">
	<ul>
	<li><a title="Поделиться в Вконтакте" rel="nofollow" class="fa fa-lg fa-vk"></a></li>
	<li><a title="Поделиться в Телеграм" rel="nofollow" class="fa fa-lg fa-telegram"></a></li>
	<li><a title="Поделиться в Одноклассниках" rel="nofollow" class="fa fa-lg fa-odnoklassniki"></a></li>
	
	</ul>
	</div>
	</div>
  </div>

	<div class="item left">
     <ul id="browser" class="filetree"> 
<li class="closed"><span class="folder">Глава 1. Введение в jetpack</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.1.php">Что такое Jetpack Compose</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.4.php">Установка Android Studio</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.2.php">Первый проект на Jetpack Compose</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.3.php">Создание визуального интерфейса</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.5.php">Создание компонентов Composable</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/5.1.php">Взаимодействие с кодом Kotlin</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.6.php">Gradle</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.7.php">Добавление зависимостей</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.8.php">Файл манифеста AndroidManifest.xml</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 2. Модификаторы и визуальный интерфейс</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.1.php">Что такое модификаторы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.2.php">Установка цвета</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.3.php">Установка размеров</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.4.php">Установка отступов и смещения</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.5.php">Создание прокрутки</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.7.php">Создание границы. Модификатор border</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.8.php">Модификатор clip. Создание фрагмента компонента</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.9.php">Создание тени и модификатор shadow</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.6.php">Обработка нажатий</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.10.php">Переопределение и объединение модификаторов</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 3. Контейнеры компоновки</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.1.php">Box</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.2.php">Column</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.3.php">Row</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.4.php">Композиции контейнеров</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.5.php">Surface</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.6.php">Списки LazyColumn и LazyRow</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.7.php">Грид</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.12.php">LazyVerticalStaggeredGrid и LazyHorizontalStaggeredGrid</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.8.php">FlowRow и FlowColumn</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.9.php">IntrinsicSize</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.10.php">Программная прокрутка</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.11.php">Прикрепленные заголовки</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.13.php">Модификатор aspectRatio</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.14.php">Интерфейс Edge-to-edge, enableEdgeToEdge и WindowInsets</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 4. Состояние компонентов</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/5.2.php">Введение в состояние компонентов</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/5.3.php">Однонаправленный поток данных</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/5.4.php">CompositionLocal</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/5.5.php">Производное состояние</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 5. Визуальные компоненты</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.1.php">Text</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.19.php">Аннотированные строки</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.2.php">Кнопка Button</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.3.php">Ввод текста, TextField и OutlinedTextField</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.7.php">Модификатор Modifier.toggleable</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.4.php">Checkbox</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.6.php">Выбираемый компонент и модификатор selectable</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.5.php">RadioButton</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.8.php">Иконки и компоненты IconButton и IconToggleButton</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.9.php">FloatingActionButton и ExtendedFloatingActionButton</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.10.php">Панели приложения TopAppBar и BottomAppBar</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.11.php">Scaffold</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.12.php">Всплывающие сообщения и Snackbar</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.13.php">Выдвижная панель ModalNavigationDrawer</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.14.php">Slider</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.15.php">Переключатель Switch</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.16.php">Диалоговые окна AlertDialog</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.17.php">Меню DropdownMenu</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.18.php">Индикаторы прогресса</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.20.php">AndroidView</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 6. Ресурсы в Jetpack Compose</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/7.1.php">Ресурсы строк</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/7.2.php">Ресурсы dimension</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/7.3.php">Ресурсы Color</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 7. Работа с изображениями</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/6.1.php">Компонент Image</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/6.2.php">Ресурсы изображений и ImageBitmap</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/6.3.php">Векторная графика и ImageVector</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 8. Кастомные контейнеры компоновки</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/8.1.php">Создание модификаторов компоновки</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/8.2.php">Создание контейнеров компоновки</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 9. ConstraintLayout</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/9.1.php">Подключение ConstraintLayout</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/9.2.php">Установка ограничений в ConstraintLayout</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/9.3.php">Создание цепочек компонентов</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/9.4.php">Направляющие линии guildeline</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/9.5.php">Барьеры</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/9.6.php">Наборы ограничений ConstraintSet</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 10. Корутины и асинхронность</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/10.1.php">Введение в корутины</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/10.2.php">LaunchedEffect</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/10.3.php">Потоки Flow</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/10.4.php">StateFlow</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/10.5.php">SharedState</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 11. Пагинация</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/12.1.php">Введение в пагинацию</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/12.2.php">Пример пагинации. Навигационные кнопки</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 12. Анимация</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.1.php">Анимация Dp. animateDpAsState</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.2.php">Функция tween. Время и сглаживание анимации</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.3.php">Функция repeatable и повторение анимации</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.4.php">Функция spring и эффект отскока</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.5.php">Функция keyframes и анимация по ключевым кадрам</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.6.php">Анимация цвета. animateColorAsState</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.7.php">Анимация числовых значений и animateFloatAsState</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.8.php">Объединение анимаций</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.9.php">AnimatedVisibility. Управление видимостью компонента</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.10.php">Настройка анимации в AnimatedVisibility</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.11.php">Модификатор animateEnterExit()</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.12.php">Crossfade</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 13. Рисование. Canvas</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.1.php">Компонент Canvas и DrawScope</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.2.php">Отрисовка линий</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.3.php">Отрисовка прямоугольников</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.4.php">Отрисовка кругов и овалов</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.5.php">Отрисовка дуги</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.6.php">Рисование геометрических путей</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.7.php">Отрисовка точек</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.8.php">Вывод текста</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.9.php">Отрисовка изображений</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.10.php">Трансформации</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.11.php">Создание градиента</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 14. ViewModel</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/15.1.php">Хранение состояния во ViewModel и взаимодействие с интерфейсом</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/15.2.php">LiveData</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/15.3.php">Пример приложения с VieModel</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/15.4.php">AndroidViewModel</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 15. Работа с базой данных</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/16.1.php">SQLite и Room</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/16.2.php">Основные элементы Room</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/16.3.php">Пример работы с SQLite и Room</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 16. Навигация</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/17.1.php">Введение в навигацию</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/17.2.php">Пример навигации</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/17.3.php">Параметры навигации</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/17.4.php">Панель навигации</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 17. Обработка жестов</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/18.1.php">Жесты нажатия</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/18.2.php">Петаскивание</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/18.3.php">Перетаскивание с помощью PointerInputScope</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/18.4.php">Перетаскивание по опорным точкам</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/18.5.php">Прокрутка</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/18.6.php">Масштабирование, вращение и перемещение</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 18. Activity</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/19.1.php">Activity и жизненный цикл приложения</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/19.2.php">Управление жизненным циклом Activity в компонентах Compose</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/19.3.php">Введение в Intent. Запуск Activity</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/19.4.php">Передача данных между Activity</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 19. Дополнительные статьи</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/11.1.php">Кнопка прокрутки</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/11.2.php">Темы. Material Design</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/11.3.php">Биометрическая аутентификация</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/11.4.php">Настройки SharedPreferences</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/11.5.php">Сетевые запросы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/11.6.php">Локализация приложений</a></span></li>
	</ul>
</li>
</ul>   </div>
</div>

  <div class="item right">
<div class="help" style="border: 0px;">
    
	<div class="help-item">
		<div class="help-item-name"><a href="//metanit.com/settings.php">Настройки</a></div>
	 </div>
</div>
			<div class="help">

      <div class="help-header">Помощь сайту</div>

       <div class="help-item">
		<div class="help-item-name"><a href="https://yoomoney.ru/to/410011174743222" rel="nofollow">Помощь сайту</a></div>
	 </div>
       
      <div class="help-item">
		<div class="help-item-name">Юмани:</div>
		<div class="help-item-req">410011174743222</div>
	 </div>

		<div class="help-item">
			<div class="help-item-name">Номер карты:</div>
			<div class="help-item-req">4048415020898850</div>
		</div>

      </div>

	<style>
	#yandex_rtb_R-A-201190-7 { width: 100%; height: 300px;  margin-top:10px;}
	@media(min-width: 500px) { #yandex_rtb_R-A-201190-7{ width: 336px;} }
	@media(min-width: 900px) { #yandex_rtb_R-A-201190-7 { width: 160px; height: 600px; position: sticky; top: 10px;} }
	@media(min-width: 1300px) { #yandex_rtb_R-A-201190-7 { width: 300px; height: 600px; } }
	</style>
	<div id="yandex_rtb_R-A-201190-7"></div>




  </div>
</div>

<div id="footer" style="padding-bottom:85px;">

<div class="bootomLinks">
<a href="https://vk.com/metanit" title="Присоединиться к группе вконтакте" rel="nofollow">
Вконтакте</a>|
<a href="https://metanit.com/donations.php" rel="nofollow">Донаты/Помощь сайту</a>
</div>
<p>Contacts: metanit22@mail.ru</p>
<p>Copyright &copy; Евгений Попов, metanit.com, 2026. Все права защищены.</p>


</div>

</div>

<script>window.yaContextCb=window.yaContextCb||[]</script>
<script src="https://yandex.ru/ads/system/context.js" async></script>

<script>window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-201190-1',
    blockId: 'R-A-201190-1'
  })
});
window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-201190-3',
    blockId: 'R-A-201190-3'
  })
});
window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-201190-7',
    blockId: 'R-A-201190-7'
  })
});
if(document.getElementById("yandex_rtb_R-A-201190-8")){
window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-201190-8',
    blockId: 'R-A-201190-8'
  })
});
}
if(document.getElementById("yandex_rtb_R-A-201190-9")){
window.yaContextCb.push(() => {
    Ya.Context.AdvManager.render({
        "blockId": "R-A-201190-9",
        "renderTo": "yandex_rtb_R-A-201190-9"
    })
});
}</script>


<script src='https://metanit.com/js/syntax16.js'></script>
<script>
SyntaxHighlighter.all();
document.addEventListener('copy', (ev) => {
const et = event.target;if(et.type==="textarea"){ev.clipboardData.setData('text/plain',et.value.substring(et.selectionStart,et.selectionEnd).replace(/\u00A0/g, " "));ev.preventDefault();}
});
console.log("Copyright © Евгений Попов, metani" + "t.com, 2026. Все права защищены.");
</script>
<script>

window.yaContextCb.push(() => {
      if (Ya.Context.AdvManager.getPlatform() === 'desktop') {
        Ya.Context.AdvManager.render({
			"blockId": "R-A-201190-11",
			"type": "floorAd",
			"platform": "desktop"
		});
      } else {
        Ya.Context.AdvManager.render({
			"blockId": "R-A-201190-12",
			"type": "floorAd",
			"platform": "touch"
		});
      }
  });


document.querySelector(".fa-bars").addEventListener("click", ()=>{ 
		const tree = document.querySelector(".item.left");
		const display = tree.style.display;
		if(display=="block") tree.style.display = "none";
		else tree.style.display = "block";
});

const menuButton = document.getElementById("menuButton");
document.getElementById("menuButton").addEventListener("click", ()=>{ 
		menuButton.classList.toggle("menu-opened");
		document.querySelector(".mainmenu").classList.toggle("open");
});


document.getElementById("magnifying-glass").addEventListener("click", ()=> 
	document.getElementById("search").classList.toggle("transp")
);

document.getElementById("toggle-theme").addEventListener("click", ()=>{
		if(document.documentElement.hasAttribute("theme")){
			document.documentElement.removeAttribute("theme");
			document.cookie="theme=1;expires=Mon, 19 Feb 2001 12:00:00 UTC;path=/;";
		}
		else{
			document.documentElement.setAttribute("theme", "dark");
			var expire = new Date();
			expire.setHours(expire.getHours() + 7);
			document.cookie="theme=1;expires=" + expire.toUTCString() + ";path=/;";
		}
	});




document.querySelectorAll(".share .fa-vk").forEach(e => e.addEventListener("click", ()=> window.open("http://vk.com/share.php?url=" + window.location.href,"Поделиться в ВКОНТАКТЕ")));
document.querySelectorAll(".share .fa-telegram").forEach(e => e.addEventListener("click", ()=> window.open("tg://msg_url/url=" + window.location.href,"Поделиться в Telegram")));
document.querySelectorAll(".share .fa-odnoklassniki").forEach(e => e.addEventListener("click", ()=>window.open("https://connect.ok.ru/offer?url=" + window.location.href,"Поделиться в Одноклассниках")));

const folders = document.getElementsByClassName("closed");
for (let i = 0; i < folders.length; i++) {
  folders[i].addEventListener("click", function() {

    this.classList.toggle("closed");
    this.classList.toggle("opened");
  });
}

const activeItem = document.querySelector(".file a[href='//metanit.com" + location.pathname + "']");
if(activeItem){
activeItem.classList.add("aMItem");
activeItem.parentElement.classList.add("aMItem");
const activeFolder = activeItem.closest("li.closed");
activeFolder.classList.toggle("closed");
activeFolder.classList.toggle("opened");
activeFolder.querySelector(".folder")?.classList.add("aMItem");
}

const props = ["--main-font-size", "--main-font-family", "--menc-bg-color", "--container-bg-color", "--menu-bg-color", "--code-font-size", "--code-font-family", "--code-bgcolor", "--code-max-height"];
for(let i = 0; i < props.length; i++){
    
	const propValue = localStorage.getItem(props[i]);
	if(propValue!==null)document.documentElement.style.setProperty(props[i], propValue);
}
</script>


<script async defer type="text/javascript" src="https://www.google.ru/coop/cse/brand?form=cse-search-box&amp;lang=ru"></script>
</body>
</html>
"""

# Парсим
result_java = parse_metanit_toc(html_java, "Java", "https://metanit.com/java/tutorial/")
result_kotlin = parse_metanit_toc(html_kotlin, "Kotlin", "https://metanit.com/kotlin/tutorial/")
result_android = parse_metanit_toc(html_android, "Android (Jetpack Compose)", "https://metanit.com/kotlin/jetpack/")

# Сохраняем в JSON
with open("metanit_java.json", "w", encoding="utf-8") as f:
    json.dump(result_java, f, ensure_ascii=False, indent=2)
print(f"✅ Сохранён: metanit_java.json (глав: {len(result_java['chapters'])}, уроков: {result_java['total_lessons']})")

with open("metanit_kotlin.json", "w", encoding="utf-8") as f:
    json.dump(result_kotlin, f, ensure_ascii=False, indent=2)
print(f"✅ Сохранён: metanit_kotlin.json (глав: {len(result_kotlin['chapters'])}, уроков: {result_kotlin['total_lessons']})")

with open("metanit_android.json", "w", encoding="utf-8") as f:
    json.dump(result_android, f, ensure_ascii=False, indent=2)
print(f"✅ Сохранён: metanit_android.json (глав: {len(result_android['chapters'])}, уроков: {result_android['total_lessons']})")

print("\n🎉 Готово! JSON-файлы созданы.")
<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Kotlin | Функции расширения с получателем</title>
<meta charset="utf-8" />
<meta name="description" content="Функции расширения с получателем (extension function with receiver) в языке программирования Kotlin, DSL">
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
     <h1>Функции расширения с получателем</h1><div class="date">Последнее обновление: 27.06.2025</div>
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

	
<p>В Kotlin кроме собственно функций расширения применяются такие конструкции как <b>extension function with receiver</b> или <span class="b">функции расширения с получателем</span>. Приведу пример 
объявления такой функции:</p>
<pre class="brush:kt;">fun some_func(block: T.() -&gt; Unit)</pre>
<p>Разберем это определение. Эта функция принимает параметр block, который представляет тип <code>T.() -&gt; Unit</code>. Это синтаксис для <span class="b">функции расширения с получателем</span> 
(extension function with receiver). Рассмотрим его по частям:</p>
<ul>
<li><p><code>T</code>: <span class="b">тип получателя</span>. Это означает, что функция <code>block</code> будет выполняться как если бы она была методом экземпляра типа <code>T</code>. Внутри лямбда-выражения <code>block</code> ключевое слово <code>this</code> будет ссылаться на экземпляр типа <code>T</code>.</p></li>
<li><p><code>()</code>: указывает, что функция <code>block</code> не принимает никаких аргументов</p></li>
<li><p><code>-&gt; Unit</code>: указывает, что функция <code>block</code> не возвращает никакого значения.</p></li>
</ul>
<p>Таким образом, <code>T.() -&gt; Unit</code> описывает тип функции, которая:</p>
<ul>
<li><p>Выполняется в контексте объекта типа <code>T</code></p></li>
<li><p>Не принимает никаких аргументов</p></li>
<li><p>Не возвращает никакого значения</p></li>
</ul>
<p>Этот паттерн очень часто используется в Kotlin для создания <span class="b">DSL</span> (предметно-ориентированных языков) или для реализации <span class="b">строителей (builders)</span>. 
Он позволяет писать код, который выглядит очень читабельно и декларативно.</p>

<p>Например, у нас есть класс <code>Person</code>:</p>
<pre class="brush:kt;">
class Person{
    var name: String = ""
    var age: Int = 0
    var company: String =""

    fun display(){
        print("Name: $name  Age: $age  Company: $company")
    }
}
</pre>

<p>Мы могли бы определить функцию для конфигурации объекта:</p>
<pre class="brush:kt;">
class Person{
    var name: String = ""
    var age: Int = 0
    var company: String =""

    fun display(){
        print("Name: $name  Age: $age  Company: $company")
    }
}

// Здесь Person является получателем. Внутри блока конфигурации
// this будет ссылаться на экземпляр Person.
fun Person.configure(block: Person.() -&gt; Unit): Person {
    // Выполняем переданный блок конфигурации на текущем экземпляре Person (this)
    block()
    // Возвращаем настроенный экземпляр Person для цепочки вызовов
    return this
}

fun main() {
    val person1 = Person().configure {
        // Внутри этого блока this ссылается на person1
        name = "Tom" // То же самое, что и this.name = "Tom"
        age = 41
        company = "MyCorp"
    }

    person1.display() // Name: Tom  Age: 41  Company: MyCorp
}
</pre>
<p>Разберем определение функции <code>Person.configure</code>:</p>
<ul>
<li><p><code>fun Person.configure</code>: Это объявление функции расширения для класса Person. Это означает, что теперь у любого объекта Person будет доступен метод configure.</p></li>
<li><p><code>block: Person.() -&gt; Unit</code>: Это тип параметра block. Он определяет лямбда-функцию</p></li>
<li><p><code>Person.()</code>: Указывает, что эта лямбда является функцией расширения с получателем Person. Это значит, что внутри тела этой лямбды ({ ... }) можно напрямую обращаться к свойствам и методам объекта Person (например, name, age, display()) без необходимости префикса this.</p></li>
<li><p><code>-&gt; Unit</code>: Обозначает, что эта лямбда не возвращает никакого значения.</p></li>
</ul>
<p>Функция configure возвращает экземпляр Person (сам себя), что позволяет создавать цепочки вызовов. 
Внутри функции configure мы просто вызываем переданный блок block. Поскольку block — это функция расширения для Person, она будет выполнена в контексте текущего экземпляра Person (который является this в функции configure).
</p>
<p>Можно также использовать для настройки уже существующего объекта:</p>
<pre class="brush:kt;">
val person2 = Person()
person2.name = "Alice"

person2.configure {
    // Здесь this ссылается на person2
    age = 25
    company = "GlobalContest"
}
</pre>
<p>При наличие аналогичных методов, которые возвращают объект того же типа, можно вызывать функции по цепочке:</p>
<pre class="brush:kt;">
fun main() {
    val person1 = Person()

    person1.configure {
        name = "Tom"
    }.configure {   // вызываем цепочку функций, где настраиваем объект
        age = 41
    }.configure {
        company = "MyCorp"
    }

    person1.display() // Name: Tom  Age: 41  Company: MyCorp
}
</pre>

<div style="margin-top:23px;margin-left:5px;">
<style>
#yandex_rtb_R-A-201190-9 { width: 100%; height: 250px; overflow:hidden;}
@media(min-width: 760px) { #yandex_rtb_R-A-201190-9 { max-width: 728px; height: 90px;  } }
@media(min-width: 900px) { #yandex_rtb_R-A-201190-9 { max-width: 468px; height: 90px;  } }
@media(min-width: 1100px) { #yandex_rtb_R-A-201190-9{ max-width: 728px; height: 90px;} }
@media(min-width: 1400px) { #yandex_rtb_R-A-201190-9 { max-width: 970px; height: 90px;} }
</style>
<!-- Yandex.RTB R-A-201190-9 -->
<div id="yandex_rtb_R-A-201190-9"></div>
</div>

<p>Рассмотрим на более показательном примере - построении HTML, который наглядно показывает, как лямбды с получателем позволяют создавать вложенные, декларативные структуры. 
Допустим, что мы хотим создать простой HTML-документ. Без лямбд с получателем это было бы громоздко. Но с ними мы можем "строить" HTML, как будто пишем его непосредственно в коде.</p>
<p>Сначала, давайте создадим очень упрощенные классы для представления HTML-тегов:</p>

<pre class="brush:kt;">
// Базовый класс для всех HTML-элементов
abstract class HtmlElement(val tagName: String) {
    val children = mutableListOf&lt;HtmlElement&gt;()
    var text: String = ""

    // Метод для добавления дочерних элементов
    fun &lt;T : HtmlElement&gt; doInit(element: T, init: T.() -&gt; Unit) {
        element.init() // Выполняем лямбду-получатель для настройки дочернего элемента
        children.add(element)
    }

    // Метод для рендеринга HTML
    open fun render(indent: String = "", level: Int = 0): String {
        val currentIndent = indent.repeat(level)
        val childIndent = indent.repeat(level + 1)
        val childrenHtml = children.joinToString("") { it.render(indent, level + 1) }

        return buildString {
            append("$currentIndent&lt;$tagName&gt;")
            if (text.isNotEmpty()) {
                append(text)
            }
            if (childrenHtml.isNotEmpty()) {
                append("\n")
                append(childrenHtml)
                append("\n$currentIndent")
            }
            append("&lt;/$tagName&gt;\n")
        }
    }
}

// Классы для конкретных HTML-тегов
class Html : HtmlElement("html") {
    fun head(init: Head.() -&gt; Unit) = doInit(Head(), init)
    fun body(init: Body.() -&gt; Unit) = doInit(Body(), init)
}

class Head : HtmlElement("head") {
    fun title(init: Title.() -&gt; Unit) = doInit(Title(), init)
}

class Title : HtmlElement("title")

class Body : HtmlElement("body") {
    fun h1(init: H1.() -&gt; Unit) = doInit(H1(), init)
    fun p(init: P.() -&gt; Unit) = doInit(P(), init)
}

class H1 : HtmlElement("h1")
class P : HtmlElement("p")

// **********************************************
// Функция расширения с получателем для создания HTML
fun html(init: Html.() -&gt; Unit): Html {
    val html = Html()
    html.init() // Вызываем лямбду-получатель для настройки корневого элемента Html
    return html
}
</pre>
<p>А теперь самое интересное — как мы используем эти функции расширения с получателем для создания HTML:</p>
<pre class="brush:kt;">
fun main() {
    val myHtmlDocument = html { // html {} - это вызов функции расширения с получателем.
                               // Внутри этого блока this - это объект Html.
        head { // head {} - это вызов метода head на объекте Html.
               // head сам принимает лямбду-получатель, где this - это объект Head.
            title { // Здесь this - это объект Title.
                text = "Моя первая страница на Kotlin DSL"
            }
        }
        body { // body {} - вызов метода body на Html. this - это Body.
            h1 { // h1 {} - вызов метода h1 на Body. this - это H1.
                text = "Добро пожаловать в Ktor HTML DSL!"
            }
            p { // p {} - вызов метода p на Body. this - это P.
                text = "Это демонстрация функций расширения с получателем."
            }
            p {
                text = "Они позволяют создавать очень выразительные и читабельные DSL."
            }
        }
    }

    println(myHtmlDocument.render(indent = "  "))
}
</pre>
<p>Основные моменты примера:</p>
<ul>
<li><p><span class="b">Декларативность</span>: код выглядит как фактическая структура HTML. Нет явных вызовов <code>new Html()</code>, <code>html.add(head)</code>, <code>head.add(title)</code>. Мы просто "декларируем", какой должна быть структура.</p></li>
<li><p><span class="b">Вложенность и Контекст</span>: каждая вложенная лямбда (<code>head { ... }</code>, <code>body { ... }</code> ) предоставляет свой собственный <span class="b">контекст (получатель)</span>. Внутри <code>head { ... }</code> мы работаем с объектом <code>Head</code>, поэтому можно вызвать <code>title { ... }</code>. 
Внутри <code>body { ... }</code> мы работаем с <code>Body</code>, поэтому можно вызвать <code>h1 { ... }</code> или <code>p { ... }</code>. Компилятор Kotlin следит за этим, предоставляя вам автодополнение и типобезопасность.</p></li>
<li><p><span class="b">Исключительная читабельность</span>: по сравнению с традиционным подходом, где мы бы вручную создавали объекты и добавляли их в списки, этот подход значительно более читабелен и интуитивен.</p></li>
<li><p><span class="b">Устранение "boilerplate" кода</span>: множество повторяющихся вызовов <code>.add()</code> или присвоений убираются, поскольку все действия происходят внутри контекста получателя.</p></li>
</ul>
<p>Вывод программы:</p>
<pre class="browser">
&lt;html&gt;
  &lt;head&gt;
    &lt;title&gt;Моя первая страница на Kotlin DSL&lt;/title&gt;
&lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;Добро пожаловать в Ktor HTML DSL!&lt;/h1&gt;
    &lt;p&gt;Это демонстрация функций расширения с получателем.&lt;/p&gt;
    &lt;p&gt;Они позволяют создавать очень выразительные и читабельные DSL.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;
</pre>
	

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

	<div class="nav"><p><a href="./5.5.php">Назад</a><a href="./">Содержание</a><a href="./5.8.php">Вперед</a></p></div>
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
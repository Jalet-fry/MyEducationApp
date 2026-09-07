<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Kotlin | Типы данных</title>
<meta charset="utf-8" />
<meta name="description" content="Типы данных на языке программирования Kotlin, числа, строки, символы, int, double, float, long, type inference, выведение типа">
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
     <h2>Типы данных</h2><div class="date">Последнее обновление: 02.03.2024</div>
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

	<p>В Kotlin все компоненты программы, в том числе переменные, представляют объекты, которые имеют определенный тип данных. 
Тип данных определяет, какой размер памяти может занимать объект данного типа и какие операции с ним можно производить. В Kotlin есть несколько базовых типов данных: числа, символы, строки, логический тип и массивы.</p>
<h3>Целочисленные типы</h3>
<ul>
<li><p><span class="b">Byte</span>: хранит целое число от -128 до 127 и занимает 1 байт</p></li>
<li><p><span class="b">Short</span>: хранит целое число от -32 768 до 32 767 и занимает 2 байта</p></li>
<li><p><span class="b">Int</span>: хранит целое число от -2 147 483 648 (-2<sup>31</sup>) до 2 147 483 647 (2<sup>31</sup> - 1) и занимает 4 байта</p></li>
<li><p><span class="b">Long</span>: хранит целое число от –9 223 372 036 854 775 808 (-2<sup>63</sup>) до 9 223 372 036 854 775 807 (2<sup>63</sup>-1) и занимает 8 байт</p></li>
</ul>
<p>В последней версии Kotlin также добавлена поддержка для целочисленных типов без знака:</p>
<ul>
<li><p><span class="b">UByte</span>: хранит целое число от 0 до 255 и занимает 1 байт</p></li>
<li><p><span class="b">UShort</span>: хранит целое число от 0 до 65 535 и занимает 2 байта</p></li>
<li><p><span class="b">UInt</span>: хранит целое число от 0 до 2<sup>32</sup> - 1 и занимает 4 байта</p></li>
<li><p><span class="b">ULong</span>: хранит целое число от 0 до 2<sup>64</sup>-1 и занимает 8 байт</p></li>
</ul>
<p>Объекты целочисленных типов хранят целые числа:</p>
<pre class="brush:kt;">
fun main(){

    val a: Byte = -10
    val b: Short = 45
    val c: Int = -250
    val d: Long = 30000
    println(a) // -10
    println(b) // 45
    println(c) // -250
    println(d) // 30000
}
</pre>
<p>По умолчанию все числовые литералы расцениваются как значения типа <span class="b">Int</span>. При присвоении числовых литералов переменным 
других типов данных происходит неявное преобразование. Например:</p>
<pre class="brush:kt;">
fun main(){

    val a: Byte = 127  // 127 - значение типа Int преобразуетсяв тип Byte
    println(a) // 127
}
</pre>
<p>Здесь числовой литерал, который по умолчанию представляет тип Int, преобразуется к типу Byte. И в данном случае все нормально, так как 127 укладывается в диапазон значений типа Byte. 
Но возьмем другой пример:</p>
<pre class="brush:kt;">
fun main(){

    val a: Byte = 128  // Ошибка
    println(a) // 
}
</pre>
<p>Здесь при присвоении числа 128 переменной типа Byte мы получим ошибку, поскольку число 128 вне диапазона значений для типа Byte.</p>
<p>Kotlin также поддерживает литералы типа Long - такие числовые литералы имеют суффикс <span class="b">L</span>:</p>
<pre class="brush:kt;">
fun main(){

    val a: Long = 22    // 22 - Int, преобразование из Int в Long
    println(a) // 22
    val b: Long = 22L   // 22L - Long, преобразование не нужно
    println(b) // 22
}
</pre>
<p>Для передачи значений объектам, которые представляют беззнаковые целочисленные типы данных, после числа указывается суффикс <span class="b">U</span>:</p>
<pre class="brush:kt;">
fun main(){

    val a: UByte = 10U
    val b: UShort = 45U
    val c: UInt = 250U
    val d: ULong = 30000U
    println(a) // 10
    println(b) // 45
    println(c) // 250
    println(d) // 30000
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

<p>Кроме чисел в десятичной системе мы можем определять числа в двоичной и шестнадцатеричной системах.</p>
<p>Шестнадцатеричная запись числа начинается с <span class="b">0x</span>, затем идет набор символов от 0 до F, которые представляют число:</p>
<pre class="brush:kt;">
val num: Int = 0x0A1    // 161
println(num) // 161
</pre>
<p>Двоичная запись числа предваряется символами <span class="b">0b</span>, после которых идет последовательность из нулей и единиц:</p>
<pre class="brush:kt;">
val a: Int = 0b0101    // 5
val b: Int = 0b1011     // 11
println(a)      // 5
println(b)      // 11 
</pre>
<p>Для упрощения работы с большими числами отдельные разряды чисел можно разделять с помощью прочерка:</p>
<pre class="brush:kt;">
fun main(){

    var million = 1_000_000
    var number = 1234_5678_9012_3456
    println(million)    // 1000000
    println(number)     // 1234567890123456
}
</pre>
<h3>Числа с плавающей точкой</h3>
<p>Кроме целочисленных типов в Kotlin есть два типа для чисел с плавающей точкой, которые позволяют хранить дробные числа:</p>
<ul>
<li><p><span class="b">Float</span>: хранит число с плавающей точкой от -3.4*10<sup>38</sup> до 3.4*10<sup>38</sup> и занимает 4 байта</p></li>
<li><p><span class="b">Double</span>: хранит число с плавающей точкой от <code>±5.0*10<sup>-324</sup></code> до <code>±1.7*10<sup>308</sup></code> и 
занимает 8 байта.</p></li>
</ul>
<p>В качестве разделителя целой и дробной части применяется точка:</p>
<pre class="brush:kt;">
val height: Double = 1.78
val pi: Float = 3.14F
println(height)      // 1.78
println(pi)      	// 3.14
</pre>
<p>Чтобы присвоить число объекту типа <code>Float</code> после числа указывается суффикс <code>f</code> или <code>F</code>.</p>
<p>Также тип <code>Double</code> поддерживает экспоненциальную запись:</p>
<pre class="brush:kt;">
val d: Double = 23e3
println(d)      // 23 000

val g: Double = 23e-3
println(g)      // 0.023
</pre>
<h3>Логический тип Boolean</h3>
<p>Тип <span class="b">Boolean</span> может хранить одно из двух значений: <span class="b">true</span> (истина) или <span class="b">false</span> (ложь).</p>
<pre class="brush:kt;">
val a: Boolean = true
val b: Boolean = false
</pre>
<h3>Символы</h3>
<p>Символьные данные представлены типом <span class="b">Char</span>. Он представляет отдельный символ, который заключается в одинарные кавычки.</p>
<pre class="brush:kt;">
val a: Char = 'A'
val b: Char = 'B'
val c: Char = 'T'
</pre>
<p>Также тип Char может представлять специальные последовательности, которые интерпретируются особым образом:</p>
<ul>
<li><p><code>\t</code>: табуляция</p></li>
<li><p><code>\n</code>: перевод строки</p></li>
<li><p><code>\r</code>: возврат каретки</p></li>
<li><p><code>\'</code>: одинарная кавычка</p></li>
<li><p><code>\"</code>: двойная кавычка</p></li>
<li><p><code>\\</code>: обратный слеш</p></li>
</ul>
<h3>Строки</h3>
<p>Строки представлены типом <span class="b">String</span>. Строка представляет последовательность символов, заключенную в двойные кавычки, либо в тройные двойные кавычки.</p>
<pre class="brush:kt;">
fun main() {
    
    val name: String = "Eugene"

    println(name)
}
</pre>
<p>Строка может содержать специальные символы или эскейп-последовательности. Например, если необходимо вставить в текст перевод на другую строку, 
можно использовать эскейп-последовательность \n:</p>
<pre class="brush:kt;">
val text: String = "SALT II was a series of talks between United States \n and Soviet negotiators from 1972 to 1979"
</pre>
<p>Для большего удобства при создании многострочного текста можно использовать тройные двойные кавычки:</p>
<pre class="brush:kt;">
fun main() {

    val text: String = """
						SALT II was a series of talks between United States
						and Soviet negotiators from 1972 to 1979.
						It was a continuation of the SALT I talks.
					"""
    println(text)
}
</pre>
<h4>Шаблоны строк</h4>
<p>Шаблоны строк (string templates) представляют удобный способ вставки в строку различных значений, в частности, 
значений переменных. Так, с помощью знака доллара $ мы можем вводить в строку значения различных переменных:</p>
<pre class="brush:kt;">
fun main() {

    val firstName = "Tom"
    val lastName = "Smith"
    val welcome = "Hello, $firstName $lastName"
    println(welcome)	// Hello, Tom Smith
}
</pre>
<p>В данном случае вместо $firstName и $lastName будут вставляться значения этих переменных. При этом переменные необязательно должны представлять строковый тип:</p>
<pre class="brush:kt;">
val name = "Tom"
val age = 22
val userInfo = "Your name: $name  Your age: $age"
</pre>

<h3>Выведение типа</h3>
<p>Kotlin позволяет выводить тип переменной на основании данных, которыми переменная инициализируется. Поэтому при инициализации переменной тип 
можно опустить:</p>
<pre class="brush:kt;">val age = 5</pre>
<p>В данном случае компилятор увидит, что переменной присваивается значение типа Int, поэтому переменная age будет представлять тип Int.</p>
<p>Соответственно если мы присваиваем переменной строку, то такая переменная будет иметь тип String.</p>
<pre class="brush:kt;">val name = "Tom"</pre>
<p>Любые целые числа, воспринимаются как данные типа <span class="b">Int</span>.</p>
<p>Если же мы хотим явно указать, что число представляет значение типа Long, то следует использовать суффикс L:</p>
<pre class="brush:kt;">val sum = 45L</pre>
<p>Если надо указать, что объект представляет беззнаковый тип, то применяется суффикс <span class="b">u</span> или <span class="b">U</span>:</p>
<pre class="brush:kt;">val sum = 45U</pre>
<p>Аналогично все числа с плавающей точкой (которые содержат точку в качестве разделителя целой и дробной части) рассматриваются как 
числа типа Double:</p>
<pre class="brush:kt;">val height = 1.78</pre>
<p>Если мы хотим указать, что данные будут представлять тип Float, то необходимо использовать суффикс <span class="b">f</span> или <span class="b">F</span>:</p>
<pre class="brush:kt;">val height = 1.78F</pre>
<p>Однако нельзя сначала объявить переменную без указания типа, а потом где-то в программе присвоить ей какое-то значение:</p>
<pre class="brush:kt;">
val age		// Ошибка, переменная не инициализирована
age = 5 
</pre>



<h3>Статическая типизация</h3>
<p>Тип данных ограничивает набор значений, которые мы можем присвоить переменной. Например, мы не можем присвоить переменной типа Double строку:</p>
<pre class="brush:kt;">val height: Double = "1.78"</pre>
<p>И после того, как тип переменной установлен, он не может быть изменен:</p>
<pre class="brush:kt;">
fun main() {

    var height: String = "1.78"
    height = 1.81       // !Ошибка - переменная height хранит только строки
    println(height)
}
</pre>
<p>Кроме того, мы не можем переменной одного типа напрямую присвоить значение переменной другого типа. Например:</p>
<pre class="brush:kt;">
fun main(){

    var longN: Long = 2
    var intN: Int = 4
    longN = intN   // ! Ошибка
    println(longN)
}
</pre>
<p>Здесь переменной типа Long мы пытаемся присвоить значение типа Int. В итоге мы получим ошибку. Казалось бы, значение переменной типа Int - число 4 вполне 
укладывается в диапазон значений типа Long. Более того саму переменную типа Long - nLong мы инициализируем значением типа Int. Тем не менее это разные типы, 
и мы получим ошибку.</p>
<p>В реальности мы можем решить эту проблему: Kotlin предоставляет нам ряд встроенных функций для преобразования данных к определенному типу: 
<ul>
<li><p><span class="b">toByte</span></p></li>
<li><p><span class="b">toShort</span></p></li>
<li><p><span class="b">toInt</span></p></li>
<li><p><span class="b">toLong</span></p></li>
<li><p><span class="b">toFloat</span></p></li>
<li><p><span class="b">toDouble</span></p></li>
<li><p><span class="b">toChar</span></p></li>
</ul>
<p>Так, мы можем изменить пример выше, применив функцию <span class="b">toLong</span>:</p>
<pre class="brush:kt;">
fun main(){

    var longN: Long = 2
    var intN: Int = 4
    longN = intN.toLong()   // Ошибки нет
    println(longN)
}
</pre>
<p>Далее мы более подробно разберем тему преобразований.</p>
<h3>Тип Any</h3>
<p>В Kotlin также есть тип <span class="b">Any</span>, который позволяет присвоить переменной данного типа 
любое значение:</p>
<pre class="brush:kt;">
fun main() {

    var name: Any = "Tom"
    println(name)   // Tom
    name = 6758
    println(name)   // 6758
}
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

	<div class="nav"><p><a href="./2.1.php">Назад</a><a href="./">Содержание</a><a href="./2.10.php">Вперед</a></p></div>
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
<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Kotlin | Интерфейсы</title>
<meta charset="utf-8" />
<meta name="description" content="Интерфейсы в языке программирования Kotlin, определение и применение интерфейсов, правила реализации свойств и функций, абстрактные методы">
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
     <h2>Интерфейсы</h2><div class="date">Последнее обновление: 03.03.2024</div>
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

	<p><span class="b">Интерфейсы</span> представляют контракт - набор функциональности, который должен реализовать класс. 
Интерфейсы могут содержать объявления свойств и функций, а также могут содержать их реализацию по умолчанию. Интерфейсы позволяют реализовать в программе концепцию <b>полиморфизма</b> и решить проблему 
<b>множественного наследования</b>, поскольку класс может унаследовать только один класс, зато интерфейсов он может реализовать множество.</p>
<p>Для определения интерфейса применяется ключевое слово <span class="b">interface</span>:</p>
<pre class="brush:kt;">
interface название_интерфейса{
    // определения функций и свойств
}
</pre>
<p>Для применения интерфейса после имени класса через двоеточие (как при наследовании) указывается имя применяемого интерфейса:</p>
<pre class="brush:kt;">
interface Movable{}
class Car : Movable {}
</pre>
<p>В данном случае класс Car <span class="b">применяет</span> или <span class="b">реализует</span> интерфейс Movable.</p>
<p>Интерфейс может определять функции без реализации. Например:</p>
<pre class="brush:kt;">
interface Movable{
    fun move()      // определение функции без реализации
}
</pre>
<p>Например, в данном случае интерфейс Movable представляет функционал транспортного средства и определяет одну функцию без реализации - функцию 
<code>move()</code>, которая условно предназначена для передвижения транспортного средства.</p>
<p>Таким образом, у нас еть интерфейс Movable, которое представляет непонятно какое транспортное средство, и есть функция move, которая предназначена для перемещения транспортного средства, 
но как именно это перемещение осуществляется - неизвестно.</p>
<p>Стоит отметить, что мы не можем напрямую создать объект интерфейса, так как интерфейс не поддерживает конструкторы и просто представляет шаблон, которому класс должен соответствовать.</p>

<p>Определим два класса, которые применяют этот интерфейс:</p>
<pre class="brush:kt;">
// класс машины
class Car : Movable{
    override fun move(){
        println("Едем на машине")
    }
}
// класс самолета
class Aircraft : Movable{
    override fun move(){
        println("Летим на самолете")
    }
}
</pre>
<p>Здесь определены классы Car и Aircraft, которые условно представляют машину и самолет. При применении интерфейса класс должен 
реализовать все его абстрактные методы и свойства. При реализации функций и свойств перед ними ставится ключевое слово <span class="b">override</span>.</p>
<p>Так, класс <code>Car</code> применяет интерфейс <code>Movable</code>. Так как интерфейс содержит абстрактный метод <code>move()</code>, то 
класс <code>Car</code> обязательно должен его реализовать. То же самое касается класса Aircraft.</p>
<p>Далее мы можем вызвать реализованный метод move как любую другую функцию класса:</p>
<pre class="brush:kt;">
fun main() {
    val car = Car()
    val aircraft = Aircraft()
    car.move()
    aircraft.move()
}
</pre>
<p>Консольный вывод программы:</p>
<pre class="sh">
Едем на машине
Летим на самолете
</pre>
<p>И реализация интерфейса также означает, что мы можем рассматривать объекты классом Car и Aircraft как объекты Movable. И тут в дело вступает полиморфизм:</p>
<pre class="brush:kt;">
fun main() {
    val car = Car()
    val aircraft = Aircraft()
    travel(car)         // Едем на машине
    travel(aircraft)    // Летим на самолете
}

fun travel(obj: Movable) = obj.move()

interface Movable{
    fun move()
}
class Car : Movable{
    override fun move(){
        println("Едем на машине")
    }
}
class Aircraft : Movable{
    override fun move(){
        println("Летим на самолете")
    }
}
</pre>
<p>В данном случае функция travel (условная функция путешествия на транспорте) в качестве параметра получает объект Movable. Это может быть машина, и самолет, и любой другой объект, класс 
которого реализует интерфейс Movable</p>
<p>Также стоит отметить, что мы можем напрямую определить объекты типа интерфейса, но для их создания будут применяться конструкторы классов, которые реализуют интерфейс:</p>
<pre class="brush:kt;">
val car : Movable = Car()
val aircraft : Movable = Aircraft()
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

<h3>Множественная реализация интерфейсов</h3>
<p>Мы не можем наследовать один класс от нескольких классов, зато класс может реализовать множество интерфейсов. Например, у нас есть два интерфейса:</p>
<pre class="brush:kt;">
interface Worker{
    fun work()
}
interface Student{
    fun study()
}
</pre>
<p>Интерфейс Worker представляет работающего, а интерфейс Student - учащегося. А что если нам надо определить сущность работающего студента? В этом случае мы можем реализовать в классе оба этих интерфейса:</p>
<pre class="brush:kt;">
fun main() {
    val tom = WorkingStudent("Tom")
    work(tom)   // Tom работает
    study(tom)  // Tom учится
}
fun work(worker:Worker) = worker.work()
fun study(student:Student) = student.study()

interface Worker{
    fun work()
}
interface Student{
    fun study()
}
class WorkingStudent(val name:String) : Worker, Student{
    override fun work() = println("$name работает")
    override fun study() = println("$name учится")
}
</pre>
<p>Класс WorkingStudent реализует оба интерфейса - Worker и Student. Все реализуемые интерфейсы передаются после двоеточия через запятую.</p>

<h3>Реализация методов по умолчанию.</h3>
<p>Интерфейс может также определять реализацию по умолчанию для своих методов. В свою очередь, класс, который реализует этот интерфейс, может принять эти методы как есть, а может и 
переопределить их. Например:</p>
<pre class="brush:kt;">
fun main() {
    val car = Car()
    val aircraft = Aircraft()

    car.move()  // Едем на машине
    car.stop()  // Останавливаемся...

    aircraft.move() // Летим на самолете
    aircraft.stop() // Приземляемся...
}
interface Movable{
    fun move()      // определение функции без реализации
    fun stop() {     // определение функции с реализацией по умолчанию
        println("Останавливаемся...")
    }
}
class Car : Movable{
    override fun move(){
        println("Едем на машине")
    }
}
class Aircraft : Movable{
    override fun move(){
        println("Летим на самолете")
    }
    override fun stop() = println("Приземляемся...")
}
</pre>
<p>Здесь в интерфейсе Movable для функции stop определена реализация по умолчанию. Класс Car не изменяет ее. А класс Aircraft переопределяет эту функцию.</p>


<h3>Реализация свойств</h3>
<p>Интерфейс может определять свойства - таким свойствам в интерфейсе им не присваиваются значения. Класс же, который реализует интерфейс, также обязан реализовать эти свойства. Например:</p>
<pre class="brush:kt;">
fun main() {
    val car = Car()
    val aircraft = Aircraft()

    car.move()          // Едем на машине со скоростью 60 км/ч
    aircraft.move()     // Летим на самолете со скоростью 600 км/ч
}
interface Movable{
    var speed: Int  // объявление свойства
    fun move()      // определение функции без реализации
}
class Car : Movable{
    override var speed = 60
    override fun move() {
        println("Едем на машине со скоростью $speed км/ч")
    }
}
class Aircraft : Movable{
    override var speed = 600
    override fun move(){
        println("Летим на самолете со скоростью $speed км/ч")
    }
}
</pre>
<p>В данном случае в интерфейсе Movable определено свойство <code>speed</code>. Здесь реализация свойства в классах заключается в установке для него начального значения.</p>
<h4>Установка свойств через конструктор</h4>
<p>Стоит отметить, что реализуемые свойства интерфейса могут устанавливаться через конструктор. Иногда это единственное место, где можно получить значения для свойств. 
Например:</p>
<pre class="brush:kt;">
fun main() {
    val tesla: Car = Car("Tesla", "2345SDG")
    println(tesla.model)    // Tesla
    println(tesla.number)   // 2345SDG

    tesla.move()    // Едем на машине со скоростью 60 км/ч
}
interface Movable{
    var speed: Int  // объявление свойства
    val model: String
    val number: String
    fun move()      // определение функции без реализации
}
// в первичном конструкторе реализуем свойства интерфейса
class Car(override val model: String, override var number: String) : Movable{
    override var speed = 60
    override fun move() {
        println("Едем на машине со скоростью $speed км/ч")
    }
}
</pre>
<p>Здесь интерфейс Movable также определяет свойства model (модель) и number (номер транспортного средства). Но эти характеристики различаются для каждой конкретной машины, 
соответственно их предпочтительнее устанавливать в конструкторе. В примере выше они устанавливаются в первичном конструкторе класса Car.</p>
<h3>Правила переопределения</h3>
<p>В Kotlin мы можем одновременно реализовать интерфейсы, которые определяют функцию с одним и тем же именем. То же самое касается ситуации, когда 
класс одновременно реализует интерфейс и наследует класс, которые имеют одноименную функцию. В программировании подобная проблема известна как <b>diamond problem</b> или проблема "ромба"/"ромбовидного наследования". 
В этом случае класс, реализующий интерфейсы, может определить одну функцию для всех реализаций:</p>
<pre class="brush:kt;">
fun main() {
    val player = MediaPlayer()
    player.play()   // Play audio and video
}
interface  VideoPlayable {
    fun play()
}
interface AudioPlayable {
    fun play()
}

class MediaPlayer : VideoPlayable, AudioPlayable {
    // Функция play для обоих интерфейсов
    override fun play() = println("Play audio and video")
}
</pre>
<p>Здесь интерфейсы VideoPlayable и  AudioPlayable определяют функцию play. В этом случае класс MediaPlayer, который применяет 
оба интерфейса, обязательно должен определить функцию с тем же именем, то есть play.</p>
<h3>Вызов реализации из интерфейса</h3>
<p>Иногда может быть необходимо использовать функцию из интерфейса с реализацией по умолчанию, но при этом добавить к ней еще какой-то функционал. В этом случае нет 
смысла дублировать в классе реализацию по умолчанию. И мы можем обратиться к реализации из интерфейса с помощью конструкции <code>super&lt;интерфейс&gt;.имя_функции</code>:</p>
<pre class="brush:kt;">
fun main() {
    val player = MediaPlayer()
    player.play() 
}
interface  VideoPlayable {
    fun play() = println("Play video")
}
interface AudioPlayable {
    fun play() = println("Play audio")
}

class MediaPlayer : VideoPlayable, AudioPlayable {
    // Функцию play обязательно надо переопределить
    override fun play() {
        println("Start playing")
        super&lt;VideoPlayable&gt;.play() // вызываем VideoPlayable.play()
        super&lt;AudioPlayable&gt;.play() // вызываем AudioPlayable.play()
    }
}
</pre>
<p>В данном случае интерфейсы VideoPlayable и AudioPlayable определяют для функции play реализацию по умолчанию, а в классе MediaPlayer вызывается эта реализация.</p>

	

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

	<div class="nav"><p><a href="./4.11.php">Назад</a><a href="./">Содержание</a><a href="./4.7.php">Вперед</a></p></div>
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
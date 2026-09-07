<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Java | Обобщения (Generics)</title>
<meta charset="utf-8" />
<meta name="description" content="Обобщения (Generics) в языке программирования Java, универсальный парамер T, обобщенные универсальные методы и конструкторы">
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
     <h1>Обобщения (Generics)</h1><div class="date">Последнее обновление: 08.10.2025</div>
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

	<p><span class="b">Обобщения</span> или <b>generics</b> (обобщенные типы и методы) позволяют нам уйти от жесткого определения используемых типов и определять классы/интерфейсы и методы, 
которые не привязаны к определенным типам. Благодаря обобщениям возможно написание кода, который можно повторно использовать для различных типов.</p>
<p>Чтобы разобраться в особенности данного явления, сначала посмотрим на проблему, которая могла возникнуть до появления обобщенных типов. Посмотрим на примере. Допустим, мы определяем класс для хранения данных пользователя:</p>

<pre class="brush:java;">
class Person {

    private int id;
    private String name;

    int getId(){ return id; }
    String getName(){ return name; }

    Person(int id, String name)
    {
        this.id = id; 
        this.name = name;
    }
}
</pre>
<p>Класс Person определяет два поля: id - уникальный идентификатор пользователя и name - имя пользователя. Причем здесь идентификатор пользователя задан как числовое значение, то есть это будут значения 1, 2, 3, 4 и так далее.</p>
<p>Однако также нередко для идентификатора используются и строковые значения. И у числовых, и у строковых значений есть свои плюсы и минусы. 
И на момент написания класса мы можем точно не знать, что лучше выбрать для хранения идентификатора - строки или числа. Либо, возможно, этот класс будет использоваться другими разработчиками, 
которые могут иметь свое мнение по данной проблеме, например, они могут для представления идентификатора создать специальный класс.</p>
<p>И на первый взгляд, чтобы выйти из подобной ситуации, можно определить поле id как поле типа <b>Object</b>. Так как тип <code>Object</code> является 
универсальным типом, от которого наследуется все типы, соответственно в подобном поле мы можем сохранить и строки, и числа:</p>
<pre class="brush:java;">
class Person {

    private Object id;      // универсальный идентификатор - и числа, и строки
    private String name;

    Object getId(){ return id; }
    String getName(){ return name; }

    Person(Object id, String name)
    {
        this.id = id; 
        this.name = name;
    }
}
</pre>

<p>Далее в программе мы можем использовать этот класс, передавая в его конструктор для id и числа, и строки:</p>
<pre class="brush:java;">
class Program {

    public static void main(String[] args){
        
        var tom = new Person(546, "Tom");
        tom.print();	// Person. Id: 546;  Name: Tom


        var bob = new Person("zpio9", "Bob");
        bob.print();	// Person. Id: zpio9;  Name: Bob
    } 
}

class Person {

    private Object id;      // универсальный идентификатор - и числа, и строки
    private String name;

    Object getId(){ return id; }
    String getName(){ return name; }

    Person(Object id, String name)
    {
        this.id = id; 
        this.name = name;
    }
}
</pre>
<p>Все вроде замечательно работает, но такое решение является не очень оптимальным. Дело в том, что в данном случае мы сталкиваемся с преобразованиями.</p>
<p>Так, при передаче в конструктор значения типа <code>int</code>, происходит упаковка этого значения в тип <code>Integer</code> с последующим преобразованием в тип <code>Object</code> 
(int -&gt; Integer -&gt; Object):</p>
<pre class="brush:java;">
var tom = new Person(546, "Tom");	// преобразование значения int в тип Integer и Object
</pre>
<p>В случае со строкой также имеется восходящее преобразование (String -&gt; Object), но оно менее критично:</p>
<pre class="brush:java;">var bob = new Person("zpio9", "Bob");</pre>

<p>Но если восходящее преобразование происходит автоматически, то чтобы обратно получить данные в переменную типов int или String, нам необходимо явным образом выполнить преобразование типов (нисходящее преобразование):</p>
<pre class="brush:java;">
int tomId = (int)tom.getId();		// Object -&gt; int
String bobId = (String) bob.getId();		// Object -&gt; String
</pre>
<p>Другая проблема, с которой мы здесь можем столкнуться, - это проблема безопасности типов. Так, мы получим ошибку во время выполнения программы, если 
напишем следующим образом:</p>
<pre class="brush:java;">
class Program {

    public static void main(String[] args) {
        
        var tom = new Person(546, "Tom");
        String tomId = (String)tom.getId();  // !Ошибка  - Исключение java.lang.ClassCastException
        System.out.printf("tom id: %s\n", tomId);
    } 
}
</pre>
<p>Мы можем не знать, какой именно объект представляет id, и при попытке получить число в данном случае мы столкнемся с исключением <code>java.lang.ClassCastException</code>. 
Причем с исключением мы столкнемся на этапе выполнения программы, то есть на этапе компиляции мы никак не сможем отследить эту проблему.</p>
<p>Проблема может показаться искуственной, так как в данном случае мы видим, что в конструктор передается число, поэтому мы вряд ли будем пытаться преобразовывать его в строку. Однако в процессе 
разработки мы можем не знать, какой именно тип представляет значение в id, и при попытке получить значение в нужном нам типе мы можем столкнуться с исключением <code>java.lang.ClassCastException</code>.</p>


<p>Писать для каждого отдельного типа свою версию класса Person тоже не является хорошим решением, так как в этом случае мы вынуждены повторяться.</p>
<p>Для решения этих проблем в язык Java была добавлена поддержка <span class="b">обобщений</span> - обобщенных типов и методов, которые также часто называют универсальными типами и методами, а по английский <b>generics</b>. 
Обобщения позволяют указать конкретный тип, который будет использоваться. Поэтому определим класс Person как обощенный:</p>
<pre class="brush:java;">
class Person&lt;T&gt; {

    private T id;  
    private String name;

    T getId(){ return id; }
    String getName(){ return name; }

    Person(T id, String name)
    {
        this.id = id; 
        this.name = name;
    }
}
</pre>
<p>Угловые скобки в описании <code>class Person&lt;T&gt;</code> указывают, что класс является обобщенным,  а тип T, заключенный в угловые 
скобки, будет использоваться этим классом. Необязательно использовать именно букву T, это может быть и любая другая буква или набор символов. 
Причем сейчас на этапе написания кода нам неизвестно, что это будет за тип, это может быть любой тип. Поэтому параметр <span class="b">T</span> в угловых скобках 
еще называется <span class="b">универсальным параметром</span>, так как вместо него можно подставить любой тип.</p>

<p>Метод <code>getId()</code> возвращает значение переменной id, но так как данная переменная представляет тип T, то данный метод также возвращает объект типа T: <code>T getId()</code>.</p>
<p>Например, вместо параметра T можно использовать объект Integer, то есть число, представляющее номер пользователя. Это также может быть объект String, либо любой другой тип (класс или 
даже интерфейс):</p> 
<pre class="brush:java;">
class Program {

    public static void main(String[] args){
        
        Person&lt;Integer&gt; tom = new Person&lt;Integer&gt;(546, "Tom");   // преобразование типов не нужно
        Person&lt;String&gt; bob = new Person&lt;String&gt;("abc123", "Bob"); // преобразование типов не нужно
        
        Integer tomId = tom.getId();      // преобразование типов не нужно
        String bobId = bob.getId();  // преобразование типов не нужно
        
        System.out.println(tomId);   // 546
        System.out.println(bobId);   // abc123
    } 
}

class Person&lt;T&gt; {

    private T id;  
    private String name;

    T getId(){ return id; }
    String getName(){ return name; }

    Person(T id, String name)
    {
        this.id = id; 
        this.name = name;
    }
}
</pre>
<p>При определении переменной даннного класса и создании объекта после имени класса в угловых скобках нужно указать, какой именно тип будет использоваться 
вместо универсального параметра. Например, первый объект будет использовать тип <code>Integer</code>, то есть вместо <code>T</code> будет подставляться <code>Integer</code>:</p>
<pre class="brush:java;">Person&lt;Integer&gt; tom = new Person&lt;Integer&gt;(546, "Tom"); </pre>
<p>И в данном случае фактически мы будем работать с классом</p>
<pre class="brush:java;">
class Person {

    private Integer id;  
    private String name;

    Integer getId(){ return id; }
    String getName(){ return name; }

    Person(Integer id, String name)
    {
        this.id = id; 
        this.name = name;
    }
}
</pre>

<p>При этом надо учитывать, что они работают только с объектами, но не работают с примитивными типами. 
То есть мы можем написать <code>Person&lt;Integer&gt;</code>, но не можем использовать тип int или double, например, <code>Person&lt;int&gt;</code>. 
Вместо примитивных типов надо использовать классы-обертки: Integer вместо int, Double вместо double и т.д.</p>

<p>А второй объект использует тип <code>String</code>:</p>
<pre class="brush:java;">Person&lt;String&gt; bob = new Person&lt;String&gt;("abc123", "Bob");</pre>


<p>При попытке передать для параметра id значение другого типа мы получим ошибку компиляции:</p>
<pre class="brush:java;">
Person&lt;Integer&gt; tom = new Person&lt;Integer&gt;("546", "Tom");  // ошибка компиляции
</pre>
<p>А при получении значения через <code>getId()</code> нам больше не потребуется операция приведения типов:</p>
<pre class="brush:java;">Integer tomId = tom.getId();      // преобразование типов не нужно</pre>
<p>Тем самым мы избежим проблем с типобезопасностью и необходимости выполнять преобразования типов. Если же и возникнет проблема с преобразованиями, то компилятор выявит эти проблемы уже на этапе компиляции. 
Соответственно мы не получим падающую программу. Таким образом, используя обобщенный вариант класса, мы снижаем время на выполнение и 
количество потенциальных ошибок.</p>


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

<h3>Универсальный параметр как обобщенный тип</h3>
<p>При этом универсальный параметр также может представлять обобщенный тип:</p>
<pre class="brush:java;">
// класс компании
class Company&lt;P&gt;{

    private P ceo;  // президент компании
    P getCEO(){ return ceo; }

    Company(P ceo){

        this.ceo = ceo;
    }
}

class Person&lt;T&gt; {

    private T id;  
    private String name;

    T getId(){ return id; }
    String getName(){ return name; }

    Person(T id, String name)
    {
        this.id = id; 
        this.name = name;
    }
}
</pre>
<p>Здесь класс компании определяет поле ceo, которое хранит президента компании. И мы можем передать для этого свойства значение типа Person, типизированного каким-нибудь типом:</p>
<pre class="brush:java;">
class Program {

    public static void main(String[] args){
        
        Person&lt;Integer&gt; tom = new Person&lt;Integer&gt;(546, "Tom");
        Company&lt;Person&lt;Integer&gt;&gt; melkosoft=  new Company&lt;Person&lt;Integer&gt;&gt;(tom);
        
        var ceo = melkosoft.getCEO();
        System.out.println(ceo.getId());  // 546
        System.out.println(ceo.getName());  // Tom
    } 
}
</pre>

<h3>Использование нескольких универсальных параметров</h3>
<p>Обобщения могут использовать несколько универсальных параметров одновременно, которые могут представлять одинаковые или различные типы:</p>
<pre class="brush:java;">


class Person&lt;T, K&gt; {

    private T id;  
    private K password;  
    private String name;

    T getId(){ return id; }
    K getPassword(){ return password; }
    String getName(){ return name; }

    Person(T id, String name, K pass)
    {
        this.id = id; 
        this.name = name;
        this.password = pass;
    }
}
</pre>
<p>Здесь класс Person использует два универсальных параметра: один параметр для идентификатора id, другой параметр - для поля, которое представляет пароль (посколько пароль может существовать в различных формах - текстовый, голосовой и т.д.). Применим данный класс:</p>
<pre class="brush:c#;">
class Program {

    public static void main(String[] args){
        
        Person&lt;Integer, String&gt; tom = new Person&lt;Integer, String&gt;(546, "Tom", "qwerty12345");
        System.out.println(tom.getId());  // 546
        System.out.println(tom.getPassword());  // qwerty12345
    } 
}
</pre>
<p>Здесь объект Person типизируется типами <code>Integer</code> и <code>String</code>. То есть в качестве универсального параметра <code>T</code> используется 
тип <code>Integer</code>, а для параметра <code>K</code> - тип <code>String</code>.</p>

<h3>Обобщенные интерфейсы</h3>
<p>Интерфейсы, как и классы, также могут быть обобщенными. Например:</p>
<pre class="brush:java;">
public class Program{
     
	public static void main(String[] args) {
         
		Accountable&lt;String&gt; acc1 = new Account("1235rwr", 5000);
		Account acc2 = new Account("2373", 4300);
		System.out.println(acc1.getId());
		System.out.println(acc2.getId());
	}
}
interface Accountable&lt;T&gt;{
	T getId();
	int getSum();
	void setSum(int sum);
}
class Account implements Accountable&lt;String&gt;{
	
    private String id;
	private int sum;
	
	Account(String id, int sum){
		this.id = id;
		this.sum = sum;
	}
	
    public String getId() { return id; }
	public int getSum() { return sum; }
	public void setSum(int sum) { this.sum = sum; }
}
</pre>
<p>В данном случае интерфейс Accountable представляет базовый функционал для банковского счета и объявляет методы для возвращения идентификатора и получения/установки суммы счета. А класс Account реализует его.</p>
<p>При реализации подобного интерфейса есть две стратегии. В данном случае реализована первая стратегия, когда при реализации для 
универсального параметра интерфейса задается конкретный тип, как например, в данном случае это тип String. Тогда класс, реализующий интерфейс, жестко привязан к этому типу.</p>
<p>Вторая стратегия представляет определение обобщенного класса, который также использует тот же универсальный параметр:</p>
<pre class="brush:java;">
public class Program{
     
	public static void main(String[] args) {
         
		Account&lt;String&gt; acc1 = new Account&lt;String&gt;("1235rwr", 5000);
		Account&lt;String&gt; acc2 = new Account&lt;String&gt;("2373", 4300);
		System.out.println(acc1.getId());
		System.out.println(acc2.getId());
	}
}
interface Accountable&lt;T&gt;{
	T getId();
	int getSum();
	void setSum(int sum);
}
class Account&lt;T&gt; implements Accountable&lt;T&gt;{
	
    private T id;
	private int sum;
	
	Account(T id, int sum){
		this.id = id;
		this.sum = sum;
	}
	
    public T getId() { return id; }
	public int getSum() { return sum; }
	public void setSum(int sum) { this.sum = sum; }
}
</pre>
<h3>Обобщенные методы</h3>
<p>Кроме обобщенных типов можно также создавать обобщенные методы, которые точно также будут использовать универсальные параметры. Например:</p>
<pre class="brush:java;">
public class Program{
     
	public static void main(String[] args) {
         
		Printer printer = new Printer();
		String[] people = {"Tom", "Alice", "Sam", "Kate", "Bob", "Helen"};
		Integer[] numbers = {23, 4, 5, 2, 13, 456, 4};
		printer.&lt;String&gt;print(people);
		printer.&lt;Integer&gt;print(numbers);
	}
}

class Printer{
	
	public &lt;T&gt; void print(T[] items){
		for(T item: items){
			System.out.println(item);
		}
	}
}
</pre>
<p>Особенностью обобщенного метода является использование универсального параметра в объявлении метода после всех модификаторов и перед 
типом возвращаемого значения.</p>
<pre class="brush:java;">public &lt;T&gt; void print(T[] items)</pre>
<p>Затем внутри метода все значения типа T будут представлять данный универсальный параметр.</p>
<p>При вызове подобного метода перед его именем в угловых скобках указывается, какой тип будет передаваться на место универсального параметра:</p>
<pre class="brush:java;">
printer.&lt;String&gt;print(people);
printer.&lt;Integer&gt;print(numbers);
</pre> 

<p>Однако в этом случае (как и в большинстве случаев) при вызове метода также можно опустить параметр типа (&lt;String&gt; / &lt;Integer&gt;). У компилятора достаточно информации, 
чтобы определить нужный вам метод. Он сопоставляет тип аргументов с обобщенным типом <code>T</code> и делает вывод, что <code>T</code> в первом случае должен быть <code>String</code>  и во втором - 
<code>Integer</code>. То есть, можно просто вызвать</p>
<pre class="brush:java;">
Printer printer = new Printer();
String[] people = {"Tom", "Alice", "Sam", "Kate", "Bob", "Helen"};
Integer[] numbers = {23, 4, 5, 2, 13, 456, 4};
printer.print(people);
printer.print(numbers);
</pre> 
<h3>Обобщенные конструкторы</h3>
<p>Конструкторы как и методы также могут быть обобщенными. В этом случае перед конструктором также указываются в угловых скобках универсальные 
параметры:</p>
<pre class="brush:java;">
public class Program{
     
	public static void main(String[] args) {
         
		Person acc1 = new Person("cid2373", 5000);
		Person acc2 = new Person(53757, 4000);
		System.out.println(acc1.getId());
		System.out.println(acc2.getId());
	}
}

class Person{
	
    private String id;
	private int sum;
	
	&lt;T&gt;Person(T id, int sum){
		this.id = id.toString();
		this.sum = sum;
	}
	
    public String getId() { return id; }
	public int getSum() { return sum; }
	public void setSum(int sum) { this.sum = sum; }
}
</pre>
<p>В данном случае конструктор принимает параметр id, который представляет тип T. В конструкторе его значение превращается в строку и сохраняется в локальную переменную.</p>
	

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

	<div class="nav"><p><a href="./3.8.php">Назад</a><a href="./">Содержание</a><a href="./3.17.php">Вперед</a></p></div>
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
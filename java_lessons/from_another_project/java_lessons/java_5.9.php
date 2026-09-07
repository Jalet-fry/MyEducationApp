<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Java | Интерфейсы SortedMap и NavigableMap. Класс TreeMap</title>
<meta charset="utf-8" />
<meta name="description" content="Класс TreeMap в языке программирования Java, древовидные коллекции, интерфейсы SortedMap и NavigableMap, сортировка объектов в дереве">
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
     <h1>Интерфейсы SortedMap и NavigableMap. Класс TreeMap</h1><div class="date">Последнее обновление: 13.10.2025</div>
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

	<p>Интерфейс <code>Map</code>, который применяется в языке Java для создания словарей, не предусматривает никаких возможностей для сортировки. Но Java также предоставляет ряд 
дополнительных интерфейсов: <b>SortedMap</b> и <b>NavigableMap</b></p>
<h3>SortedMap</h3>
<p>Интерфейс <span class="b">SortedMap</span> расширяет <code>Map</code> и позволяет обеспечить полное упорядочение своих ключей. По умолчанию элементы упорядочиваются в соответствии с естественным порядком  
ключей (по возрастанию) или с помощью компаратора. Этот порядок, например, отражается при переборе коллекции.</p>
<p><b>SortedMap</b> добавляет ряд методов:</p>
<ul>
<li><p><code>K firstKey()</code>: возвращает ключ первого элемента коллекции</p></li>
<li><p><code>K lastKey()</code>: возвращает ключ последнего элемента коллекции</p></li>
<li><p><code>SortedMap&lt;K, V&gt; headMap(K end)</code>: возвращает объект <code>SortedMap</code>, который содержит все элементы оригинального SortedMap вплоть до элемента с ключом end</p></li>
<li><p><code>SortedMap&lt;K, V&gt; tailMap(K start)</code>: возвращает объект <code>SortedMap</code>, который содержит все элементы оригинального SortedMap, начиная с 
элемента с ключом start</p></li>
<li><p><code>SortedMap&lt;K, V&gt; subMap(K start, K end)</code>: возвращает объект <code>SortedMap</code>, которые содержит все элементы оригинального 
SortedMap вплоть от элемента с ключом start до элемента с ключом end</p></li>
</ul>
<h3>NavigableMap</h3>
<p>Интерфейс <span class="b">NavigableMap</span> расширяет интерфейс <code>SortedMap</code> и обеспечивает возможность получения элементов коллекции относительно других элементов (условно говоря, навигацию). 
Его основные методы:</p>
<ul>
<li><p><code>Map.Entry&lt;K, V&gt; ceilingEntry(K key)</code>: возвращает элемент с наименьшим ключом k, который больше или равен ключу key 
(k &gt;=key). Если такого ключа нет, то возвращается null.</p></li>
<li><p><code>Map.Entry&lt;K, V&gt; floorEntry(K key)</code>: возвращает элемент с наибольшим ключом k, который меньше или равен ключу key (k &lt;=key). 
Если такого ключа нет, то возвращается null.</p></li>
<li><p><code>Map.Entry&lt;K, V&gt; higherEntry(K key)</code>: возвращает элемент с наименьшим ключом k, который больше ключа key (k &gt;key). 
Если такого ключа нет, то возвращается null.</p></li>
<li><p><code>Map.Entry&lt;K, V&gt; lowerEntry(K key)</code>: возвращает элемент с наибольшим ключом k, который меньше ключа key (k &lt;key). 
Если такого ключа нет, то возвращается null.</p></li>
<li><p><code>Map.Entry&lt;K, V&gt; firstEntry()</code>: возвращает первый элемент коллекции</p></li>
<li><p><code>Map.Entry&lt;K, V&gt; lastEntry()</code>: возвращает последний элемент коллекции</p></li>

<li><p><code>Map.Entry&lt;K, V&gt; pollFirstEntry()</code>: возвращает и одновременно удаляет первый элемент из коллекции</p></li>
<li><p><code>Map.Entry&lt;K, V&gt; pollLastEntry()</code>: возвращает и одновременно удаляет последний элемент из коллекции</p></li>

<li><p><code>K ceilingKey(K key)</code>: возвращает наименьший ключ k, который больше или равен ключу key (k &gt;=key). Если такого ключа нет, то возвращается null.</p></li>
<li><p><code>K floorKey(K key)</code>: возвращает наибольший ключ k, который меньше или равен ключу key (k &lt;=key). Если такого ключа нет, то возвращается null.</p></li>
<li><p><code>K lowerKey(K key)</code>: возвращает наибольший ключ k, который меньше ключа key (k &lt;key). Если такого ключа нет, то возвращается null.</p></li>
<li><p><code>K higherKey(K key)</code>: возвращает наименьший ключ k, который больше ключа key (k &gt;key). Если такого ключа нет, то возвращается null.</p></li>

<li><p><code>NavigableSet&lt;K&gt; descendingKeySet()</code>: возвращает объект NavigableSet, который содержит все ключи коллекции в обратном порядке</p></li>
<li><p><code>NavigableMap&lt;K, V&gt; descendingMap()</code>: возвращает коллекцию NavigableMap, которое содержит все элементы в обратном порядке</p></li>
<li><p><code>NavigableSet&lt;K&gt; navigableKeySet()</code>: возвращает объект NavigableSet, который содержит все ключи коллекции</p></li>

<li><p><code>NavigableMap&lt;K, V&gt; headMap(K upperBound, boolean incl)</code>: возвращает коллекцию NavigableMap, которое содержит все 
элементы оригинальной коллекции <code>NavigableMap</code> вплоть от элемента с ключом upperBound. Параметр incl при значении true указывает, что элемент с ключом upperBound также включается в выходной набор.</p></li>
<li><p><code>NavigableMap&lt;K, V&gt; tailMap(K lowerBound, boolean incl)</code>: возвращает коллекцию NavigableMap, которое содержит все 
элементы оригинальной коллекции <code>NavigableMap</code>, начиная с элемента с ключом lowerBound. Параметр incl при значении true указывает, что элемент с ключом lowerBound также включается в выходной набор.</p></li>
<li><p><code>NavigableMap&lt;K, V&gt; subMap(K lowerBound, boolean lowIncl, K upperBound, boolean highIncl)</code>: возвращает коллекцию 
NavigableMap, которое содержит все 
элементы оригинальной коллекции <code>NavigableMap</code> от элемента с ключом lowerBound до элемента с ключом upperBound. Параметры lowIncl и highIncl 
при значении true включают в выходной набор элементы с ключами lowerBound и upperBound соответственно.</p></li>
</ul>
<h3>TreeMap</h3>
<p>Встроенной реализацией выше упомянутых интерфейсов является класс <span class="b">TreeMap&lt;K, V&gt;</span>. Он представляет коллекцию в виде дерева, где все элементы отсортированы. 
Этот класс наследуется от класса <code>AbstractMap</code> и реализует интерфейс <code>NavigableMap</code>, а следовательно, также и 
интерфейсы <code>SortedMap</code> и <code>Map</code>. Поэтому для управления элементами в дереве можно использовать методы интерфейса <code>Map</code>. Но в отличие от коллекции <code>HashMap</code> в <b>TreeMap</b> все объекты автоматически сортируются по возрастанию их ключей. 
<p>Класс TreeMap имеет следующие конструкторы:</p>
<ul>
<li><p><code>TreeMap()</code>: создает пустое коллекцию в виде дерева</p></li>
<li><p><code>TreeMap(Map&lt;? extends K, ? extends V&gt; map)</code>: создает дерево, в которое добавляет все элементы из коллекции map</p></li>
<li><p><code>TreeMap(SortedMap&lt;K, ? extends V&gt; smap)</code>: создает дерево, в которое добавляет все элементы из коллекции smap</p></li>
<li><p><code>TreeMap(Comparator&lt;? super K&gt; comparator)</code>: создает пустое дерево, где все добавляемые элементы впоследствии будут 
отсортированы компаратором.</p></li>
</ul>
<p>Элементы дерева должны реализовать интерфейс <code>Comparable()</code> для сортировки, либо необходимо предоставлять компаратор через последнюю версию конструктора. При этом порядок, 
поддерживаемый в <code>TreeMap</code>, (независимо от того, предоставлен ли явный компаратор), должен быть согласован с <code>equals()</code>, чтобы эта сортированная 
коллекция правильно реализовала интерфейс <code>Map</code>. Примеры создания дерева:</p>
<pre class="brush:java;">
import java.util.Map;
import java.util.TreeMap;
 
public class Program{
      
    public static void main(String[] args) {
          
        // пустое дерево
        var treeMap = new TreeMap&lt;String,String&gt;();
        System.out.println(treeMap);     // {}

        // дерево на основе другого словаря
        var dict = new TreeMap&lt;String,String&gt;(
                                Map.ofEntries( 
                                    Map.entry("+79876543210", "Tom"),
                                    Map.entry("+79666543210", "Bob"),
                                    Map.entry("+79176543210", "Sam"),
                                    Map.entry("+79276543210", "Alice")
                                ));
        System.out.println(dict);  // {blue=синий, green=зеленый, red=красный, yellow=желтый}
    }
}
</pre>
<p>Обратите внимание на вывод второго дерева-словаря - dict:</p>
<pre class="sh">{blue=синий, green=зеленый, red=красный, yellow=желтый}</pre>
<p>Вне зависимости в каком порядке объекты были добавлены в дерево, они упорядочиваются по возрастанию. Так, в данном случае у нас переменная dict представляет условный словарь, а <code>TreeMap</code> позволяет 
упорядочить данные словаря по возрастанию.</p>

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

<p>Добавление элементов:</p>
<pre class="brush:java;">
import java.util.Map;
import java.util.TreeMap;
 
public class Program{
      
    public static void main(String[] args) {
          
        // пустое дерево
        var dict = new TreeMap&lt;String,String&gt;();
 
        // добавляем в него элементы
        dict.put("red", "красный");
        dict.put("green", "зеленый");
        dict.put("blue", "синий");
        System.out.println(dict);   // {blue=синий, green=зеленый, red=красный}
 
        // добавляем другой словарь с данными
        var map = Map.ofEntries( 
                Map.entry("yellow", "желтый"),
                Map.entry("black", "черный") 
        );
        dict.putAll(map);

        System.out.println(dict);   // {black=черный, blue=синий, green=зеленый, red=красный, yellow=желтый}
    }
}
</pre>

<p>Получение элементов:</p>
<pre class="brush:java;">
import java.util.Map;
import java.util.Set;
import java.util.Collection;
import java.util.TreeMap;
 
public class Program{
      
    public static void main(String[] args) {
          
        // пустой словарь
        var dict = new TreeMap&lt;String,String&gt;(
            Map.ofEntries( 
                Map.entry("red", "красный"),
                Map.entry("green", "зеленый"),
                Map.entry("yellow", "желтый"),
                Map.entry("blue", "синий"),
                Map.entry("black", "черный") 
            )
        );

        // перебор элементов
       for(var word : dict.entrySet()){
         
           System.out.printf("%s: %s \n", word.getKey(), word.getValue());
       }

        // получим объект по ключу "red"
        String red = dict.get("red");
        System.out.println("`red` переводится как `" + red + "`");  // `red` переводится как `красный`

        // получим весь набор ключей
        Set&lt;String&gt; keys = dict.keySet();
        System.out.println(keys);       // [black, blue, green, red, yellow]

        // получить набор всех значений
        Collection&lt;String&gt; values = dict.values();
        System.out.println(values);     // [черный, синий, зеленый, красный, желтый]
            
        // получаем все объекты, которые стоят начиная с объекта с ключом "green"
        Map&lt;String, String&gt; afterGreen = dict.tailMap("green");
        System.out.println(afterGreen);     // {green=зеленый, red=красный, yellow=желтый}
            
        // получаем все объекты, которые стоят до объекта с ключом "green"
        Map&lt;String, String&gt; beforeGreen = dict.headMap("green");
        System.out.println(beforeGreen);    // {black=черный, blue=синий}
         
        // получим последний элемент дерева
        Map.Entry&lt;String, String&gt; lastItem = dict.lastEntry();
        System.out.println(lastItem);   // yellow=желтый
    }
}
</pre>

<p>Изменение и удаление элементов:</p>
<pre class="brush:java;">
import java.util.Map;
import java.util.TreeMap;
 
public class Program{
      
    public static void main(String[] args) {
          
        // пустой словарь
        var dict = new TreeMap&lt;String,String&gt;(
            Map.ofEntries( 
                Map.entry("red", "красный"),
                Map.entry("green", "зеленый"),
                Map.entry("yellow", "желтый"),
                Map.entry("blue", "синий"),
                Map.entry("black", "черный") 
            )
        );

        // меняем по ключу "red" значение на "червонный"
        dict.replace("red", "червонный");
        System.out.println(dict);   // {black=черный, blue=синий, green=зеленый, red=червонный, yellow=желтый}
 
        // меняем по ключу "red" значение на "алый", только если значение "красный"
        dict.replace("red", "алый", "красный");
 
        // удаляем yellow
        dict.remove("yellow");
        System.out.println(dict);   // {black=черный, blue=синий, green=зеленый, red=червонный}


        // получаем с удалением первый элемент
        Map.Entry&lt;String, String&gt; firstWord = dict.pollFirstEntry();
        System.out.println(firstWord);      // black=черный

        // получаем с удалением последний элемент
        Map.Entry&lt;String, String&gt; lastWord = dict.pollLastEntry();
        System.out.println(lastWord);       // red=червонный
 
        // удаляем все элементы
        dict.clear();
        System.out.println(dict);   // {}
    }
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

	<div class="nav"><p><a href="./5.8.php">Назад</a><a href="./">Содержание</a><a href="./5.10.php">Вперед</a></p></div>
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
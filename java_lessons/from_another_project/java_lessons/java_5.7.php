<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Java | Очереди и стеки. Классы ArrayDeque и PriorityQueue</title>
<meta charset="utf-8" />
<meta name="description" content="Очереди и стеки в языке программирования Java, классы ArrayDeque и PriorityQueue, интерфейсы Queue и Deque и их методы, структуры данных на основе механизма FIFO и LIFO">
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
     <h1>Очереди и стеки. Классы ArrayDeque и PriorityQueue</h1><div class="date">Последнее обновление: 12.10.2025</div>
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

	<p><span class="b">Очереди</span> представляют структуру данных, работающую по принципу <b>FIFO</b> (first in - first out). То есть чем раньше был добавлен элемент 
в коллекцию, тем раньше он из нее удаляется. Это стандартная модель однонаправленной очереди. Однако бывают и двунаправленные - то есть такие, 
в которых мы можем добавить элемент не только в начала, но и в конец. И соответственно удалить элемент не только из конца, но и из начала.</p>
<p>Особенностью классов очередей является то, что они реализуют специальные интерфейсы <span class="b">Queue</span> или <span class="b">Deque</span>.</p>
<h3>Интерфейс Queue</h3>
<p>Обобщенный интерфейс <code>Queue&lt;E&gt;</code> расширяет базовый интерфейс <code>Collection</code> и определяет поведение класса в качестве однонаправленной 
очереди. Свою функциональность он раскрывает через следующие методы:</p>
<ul>
<li><p><span class="b">E element()</span>: возвращает, но не удаляет, элемент из начала очереди. Если очередь пуста, генерирует исключение 
<code>NoSuchElementException</code></p></li>
<li><p><span class="b">boolean offer(E obj)</span>: добавляет элемент obj в конец очереди. Если элемент удачно добавлен, возвращает true, иначе - false</p></li>
<li><p><span class="b">E peek()</span>: возвращает без удаления элемент из начала очереди. Если очередь пуста, возвращает значение <code>null</code></p></li>
<li><p><span class="b">E poll()</span>: возвращает с удалением элемент из начала очереди. Если очередь пуста, возвращает значение <code>null</code></p></li>
<li><p><span class="b">E remove()</span>: возвращает с удалением элемент из начала очереди. Если очередь пуста, генерирует исключение 
<code>NoSuchElementException</code></p></li>
</ul>
<p>Таким образом, у всех классов, которые реализуют данный интерфейс, будет метод <code>offer</code> для добавления в очередь, метод <code>poll</code> 
для извлечения элемента из головы очереди, и методы <code>peek</code> и <code>element</code>, позволяющие просто получить элемент из головы очереди.</p>
<p>Таким образом, у <code>Queue</code> есть несколько методов, которые позволяют добавлять, удалять и получать данные, но эти методы различаются в зависимости от того, генерируют они исключение или возвращают специальное значение - 
результат успешности операции. Краткая сводка по методам <code>Queue</code></p>

<table class="tab">
 <tr class="tabhead>
   <td></td>
   <td><p>Генерирует исключение</p></td>
   <td><p>Возвращает значение</p></td>
 </tr>
 <tr>
   <td><p>Вставка</p></td>
   <td><p><code>add(e)</code></p></td>
   <td><p><code>offer(e)</code></p></td>
 </tr>
 <tr>
   <td><p>Удаление</p></td>
   <td><p><code>remove()</code></p></td>
   <td><p><code>poll()</code></p></td>
 </tr>
 <tr>
   <td><p>Получение</p></td>
   <td><p><code>element()</code></p></td>
   <td><p><code>peek()</code></p></td>
 </tr>
</table>

<h3>Интерфейс Deque</h3>
<p>Интерфейс <b>Deque</b> (сокращение от "double ended queue") расширяет вышеописанный интерфейс <code>Queue</code> и определяет поведение <span class="b">двунаправленной очереди</span>, которая работает как обычная однонаправленная 
очередь, либо как <span class="b">стек</span>, действующий по принципу LIFO (последний вошел - первый вышел).</p>
<p>Интерфейс <code>Deque</code> определяет следующие методы:</p>
<ul>
<li><p><span class="b">void addFirst(E obj)</span>: добавляет элемент в начало очереди (унаследован от интерфейса <code>SequencedCollection&lt;E&gt;</code>)</p></li>
<li><p><span class="b">void addLast(E obj)</span>: добавляет элемент obj в конец очереди (унаследован от интерфейса <code>SequencedCollection&lt;E&gt;</code>)</p></li>
<li><p><span class="b">E getFirst()</span>: возвращает без удаления элемент из головы очереди. Если очередь пуста, генерирует исключение 
<code>NoSuchElementException</code> (унаследован от интерфейса <code>SequencedCollection&lt;E&gt;</code>)</p></li>
<li><p><span class="b">E getLast()</span>: возвращает без удаления последний элемент очереди. Если очередь пуста, генерирует исключение 
<code>NoSuchElementException</code> (унаследован от интерфейса <code>SequencedCollection&lt;E&gt;</code>)</p></li>
<li><p><span class="b">boolean offerFirst(E obj)</span>: добавляет элемент obj в самое начало очереди. Если элемент удачно добавлен, возвращает true, иначе - false</p></li>
<li><p><span class="b">boolean offerLast(E obj)</span>: добавляет элемент obj в конец очереди. Если элемент удачно добавлен, возвращает true, иначе - false</p></li>
<li><p><span class="b">E peekFirst()</span>: возвращает без удаления элемент из начала очереди. Если очередь пуста, возвращает значение <code>null</code></p></li>
<li><p><span class="b">E peekLast()</span>: возвращает без удаления последний элемент очереди. Если очередь пуста, возвращает значение <code>null</code></p></li>
<li><p><span class="b">E pollFirst()</span>: возвращает с удалением элемент из начала очереди. Если очередь пуста, возвращает значение <code>null</code></p></li>
<li><p><span class="b">E pollLast()</span>: возвращает с удалением последний элемент очереди. Если очередь пуста, возвращает значение <code>null</code></p></li>
<li><p><span class="b">E pop()</span>: возвращает с удалением элемент из начала очереди. Если очередь пуста, генерирует исключение 
<code>NoSuchElementException</code></p></li>
<li><p><span class="b">void push(E element)</span>: добавляет элемент в самое начало очереди</p></li>
<li><p><span class="b">E removeFirst()</span>: возвращает с удалением элемент из начала очереди. Если очередь пуста, генерирует исключение 
<code>NoSuchElementException</code> (унаследован от интерфейса <code>SequencedCollection&lt;E&gt;</code>)</p></li>
<li><p><span class="b">E removeLast()</span>: возвращает с удалением элемент из конца очереди. Если очередь пуста, генерирует исключение 
<code>NoSuchElementException</code>< (унаследован от интерфейса <code>SequencedCollection&lt;E&gt;</code>)/p></li>
<li><p><span class="b">boolean removeFirstOccurrence(Object obj)</span>: удаляет первый встреченный элемент obj из очереди. Если удаление произшло, то возвращает true, иначе возвращает false.</code></p></li>
<li><p><span class="b">boolean removeLastOccurrence(Object obj)</span>: удаляет последний встреченный элемент obj из очереди. Если удаление произшло, то возвращает true, иначе возвращает false.</code></p></li>
</ul>
<p>Таким образом, наличие методов <code>pop</code> и <code>push</code> позволяет классам, реализующим этот элемент, действовать в качестве стека. 
В тоже время имеющийся функционал также позволяет создавать двунаправленные очереди, что делает классы, применяющие данный интерфейс, 
довольно гибкими.</p>
<p>И также, как и <code>Queue</code>, <b>Deque</b> имеет пары методов для разных операций, которые либо генерируют исключение при неудаче операции, либо возвращают некоторое значение:</p>
<table class="tab">
 <tr class="tabhead">
   <td rowspan="2"></p></td>
   <td colspan="2">Первый элемент (Head)</p></td>
   <td colspan="2">Последний элемент (Tail)</p></td>
 </tr>
 <tr>
   <td><p>Генерация исключение</p></td>
   <td><p>Возвращение значения</p></td>
   <td><p>Генерация исключение</p></td>
   <td><p>Возвращение значения</p></td>
 </tr>
 <tr>
   <td><p>Вставка</p></td>
   <td><p><code>addFirst(e)</code></a></p></td>
   <td><p><code>offerFirst(e)</code></a></p></td>
   <td><p><code>addLast(e)</code></a></p></td>
   <td><p><code>offerLast(e)</code></a></p></td>
 </tr>
 <tr>
   <td><p>Удаление</p></td>
   <td><p><code>removeFirst()</code></a></p></td>
   <td><p><code>pollFirst()</code></a></p></td>
   <td><p><code>removeLast()</code></a></p></td>
   <td><p><code>pollLast()</code></a></p></td>
 </tr>
 <tr>
   <td><p>Получение</p></td>
   <td><p><code>getFirst()</code></a></p></td>
   <td><p><code>peekFirst()</code></a></p></td>
   <td><p><code>getLast()</code></a></p></td>
   <td><p><code>peekLast()</code></a></p></td>
 </tr>
</table>


<p>Сравнение методов <code>Queue</code> и <code>Deque</code>:</p>
<table class="tab">
 <tr class="tabhead">
   <td><p>Метод  <code>Queue</code></p></td>
   <td><p>Метод <code>Deque</code></p></td>
 </tr>
 <tr>
   <td><p><code>add(e)</code></a></p></td>
   <td><p><code>addLast(e)</code></a></p></td>
 </tr>
 <tr>
   <td><p><code>offer(e)</code></a></p></td>
   <td><p><code>offerLast(e)</code></a></p></td>
 </tr>
 <tr>
   <td><p><code>remove()</code></a></p></td>
   <td><p><code>removeFirst()</code></a></p></td>
 </tr>
 <tr>
   <td><p><code>poll()</code></a></p></td>
   <td><p><code>pollFirst()</code></a></p></td>
 </tr>
 <tr>
   <td><p><code>element()</code></a></p></td>
   <td><p><code>getFirst()</code></a></p></td>
 </tr>
 <tr>
   <td><p><code>peek()</code></a></p></td>
   <td><p><code>peekFirst()</code></a></p></td>
 </tr>
</table>

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

<h3>Класс ArrayDeque</h3>
<p>В Java очереди представлены рядом классов. Одни из низ - класс <span class="b">ArrayDeque&lt;E&gt;</span>. 
Этот класс представляют обобщенную двунаправленную очередь, наследуя функционал от класса <code>AbstractCollection</code> и применяя интерфейс 
<code>Deque</code>.</p>
<p>В классе ArrayDeque определены следующие конструкторы:</p>
<ul>
<li><p><code>ArrayDeque()</code>: создает пустую очередь</p></li>
<li><p><code>ArrayDeque(Collection&lt;? extends E&gt; col)</code>: создает очередь, наполненную элементами из коллекции col</p></li>
<li><p><code>ArrayDeque(int capacity)</code>: создает очередь с начальной емкостью capacity. Если мы явно не указываем начальную емкость, то 
емкость по умолчанию будет равна 16</p></li>
</ul>
<p>Добавление в <code>ArrayDeque</code>:</p>
<pre class="brush:java;">
import java.util.ArrayDeque;
 
public class Program{
      
    public static void main(String[] args) {
          
        ArrayDeque&lt;String&gt; people = new ArrayDeque&lt;String&gt;();
        System.out.println(people);      // []
          
        // добавим ряд элементов
        people.add("Tom");              // [Tom]
        people.add("Bob");              // [Tom, Bob]
        // добавляем элемент в самое начало
        people.push("Sam");             // [Sam, Tom, Bob]
        // добавляем элемент в самое начало
        people.addFirst("Alice");       // [Alice, Sam, Tom, Bob]
        // добавляем элемент в конец коллекции
        people.addLast("Kate");         // [Alice, Sam, Tom, Bob, Kate]

        // добавляем элемент в самое начало
        people.offerFirst("Alex");       // [Alex, Alice, Sam, Tom, Bob]
        // добавляем элемент в конец коллекции
        people.offerLast("Bill");         // [Alex, Alice, Sam, Tom, Bob, Kate, Bill]
        // добавляем элемент в конец коллекции
        people.offer("Tim");            // [Alex, Alice, Sam, Tom, Bob, Kate, Bill, Tim]

        // выводим все
        System.out.println(people);      // [Alex, Alice, Sam, Tom, Bob, Kate, Bill, Tim]
    }
}
</pre>


<p>Удаление элементов из <code>ArrayDeque</code>:</p>
<pre class="brush:java;">
import java.util.ArrayDeque;
import java.util.Collections;
 
public class Program{
      
    public static void main(String[] args) {
          
        ArrayDeque&lt;String&gt; people = new ArrayDeque&lt;String&gt;();
        // добавляем ряд объектов
        Collections.addAll(people, new String[]{ "Alex", "Alice", "Sam", "Tom", "Bob", "Kate", "Bill", "Tim"});
        System.out.println(people);      // [Alex, Alice, Sam, Tom, Bob, Kate, Bill, Tim]

        // удаляем элемент из начала
        var person = people.poll();
        System.out.println(person);      // Alex

        // удаляем элемент из начала в [Alice, Sam, Tom, Bob, Kate, Bill, Tim]
        person = people.poll();
        System.out.println(person);      // Alice

        // удаляем элемент из конца в [Sam, Tom, Bob, Kate, Bill, Tim]
        person = people.pollLast();
        System.out.println(person);      // Tim

        // удаляем элемент из начала  в [Sam, Tom, Bob, Kate, Bill]
        person = people.remove();
        System.out.println(person);      // Sam

        // удаляем элемент из начала в [Tom, Bob, Kate, Bill]
        person = people.removeFirst();
        System.out.println(person);      // Tom

        // удаляем элемент из конца в [Bob, Kate, Bill]
        person = people.removeLast();
        System.out.println(person);      // Bill

        // удаление произвольного элемента из [Bob, Kate]
        boolean removed = people.remove("Kate");
        System.out.println("Kate is removed: " + removed);  // Kate is removed: true
        // удаление произвольного элемента из [Bob]
        removed = people.remove("Charl");
        System.out.println("Charl is removed: " + removed);  // Charl is removed: false

        
        // выводим оставшиеся
        System.out.println(people);      // [Bob]

        people.clear();
        // удаляем оставшиеся
        System.out.println(people);      // [Bob]
    }
}
</pre>

<p>Получение элементов из очереди:</p>
<pre class="brush:java;">
import java.util.ArrayDeque;
import java.util.Collections;
 
public class Program{
      
    public static void main(String[] args) {
          
        ArrayDeque&lt;String&gt; people = new ArrayDeque&lt;String&gt;();
        // добавляем ряд объектов
        Collections.addAll(people, new String[]{"Tom", "Bob", "Sam"});

        // получаем элемент из начала
        var first = people.element();
        System.out.println(first);      // Tom

        first = people.peek();
        System.out.println(first);      // Tom

        first = people.peekFirst();
        System.out.println(first);      // Tom

        first = people.getFirst();
        System.out.println(first);      // Tom


        // получаем элемент из конца
        var last = people.getLast();
        System.out.println(last);      // Sam

        last = people.peekLast();
        System.out.println(last);      // Sam

        // проверка наличия
        boolean available = people.contains("Tom");
        System.out.println("Tom is avalable: " + available);      // true
        available = people.contains("Alex");
        System.out.println("Alex is avalable: " + available);      // false



        // перебор без извлечения
        for(var p : people){
          
            System.out.println(p);
        }

        // перебор коллекции с извлечением      
        while(people.peek() != null){
            // извлечение c начала
            System.out.println(people.pop());
        }
    }
}
</pre>

<h3>Очереди приоритетов PriorityQueue</h3>
<p>Очередь приоритетов, представленная в языке Java классом <b>PriorityQueue</b>, извлекает элементы в отсортированном порядке. То есть, при каждом получении или удалении элемента с начала очереди 
мы будем получать условно говоря "наименьший элемент". Однако очередь приоритетов не сортирует все свои элементы. При итерации по элементам они не обязательно будут отсортированы. 
Очередь приоритетов использует структуру данных под названием <span class="b">куча</span>. Куча — это самоорганизующееся двоичное дерево, в котором операции добавления и удаления перемещают наименьший 
элемент в корень, не тратя время на сортировку всех элементов.</p>
<p>Часто очередь приоритетов используется для планирования заданий. Каждое задание имеет приоритет. Задания добавляются в случайном порядке. Всякий раз, когда удаётся запустить новое задание, задание с наивысшим приоритетом удаляется из очереди.</p>
<p>Поскольку при работе очереди приоритетов применяется сортировка, то <b>PriorityQueue</b> может содержать либо элементы класса, который реализет интерфейс <b>Comparable</b>, либо через конструктор 
при создании очереди приоритетов надо передать объект <b>Comparator</b>, который определяет логику сортировки. Конструкторы класса <code>PriortyQueue</code>:</p>
<ul>
<li><p><code>PriorityQueue()</code>: создает очередь PriorityQueue с начальной вместимостью по умолчанию (11), элементы которой упорядочены в соответствии с их естественным порядком</p></li>
<li><p><code>PriorityQueue(int initialCapacity)</code>: создает очередь PriorityQueue с указанной начальной вместимостью, элементы которой упорядочены в соответствии с их естественным порядком</p></li>
<li><p><code>PriorityQueue(int initialCapacity, Comparator&lt;? super E&gt; comparator)</code>: создает очередь PriorityQueue с указанной начальной вместимостью, элементы которой упорядочены в соответствии с указанным компаратором</p></li>
<li><p><code>PriorityQueue(Collection&lt;? extends E&gt; c)</code>: создает очередь PriorityQueue, которая содержит элементы изуказанной коллекции</p></li>
<li><p><code>PriorityQueue(Comparator&lt;? super E&gt; comparator)</code>: создает очередь PriorityQueue с начальной вместимостью по умолчанию, элементы которой упорядочены в соответствии с указанным компаратором</p></li>
<li><p><code>PriorityQueue(PriorityQueue&lt;? extends E&gt; c)</code>: создает PriorityQueue, которая содержит элементы из другой PriorityQueue</p></li>
<li><p><code>PriorityQueue(SortedSet&lt;? extends E&gt; c)</code>: создает PriorityQueue, которая содержит элементы из SortedSet</p></li>
</ul>
<p><code>PriorityQueue</code> реализует интерфейсы <code>Collection&lt;E&gt;</code> и <code>Queue&lt;E&gt;</code> и соответственно методы этих интерфейсов. Применение <code>PriorityQueue</code>:</p>
<pre class="brush:java;">
import java.util.PriorityQueue;
 
public class Program{
      
    public static void main(String[] args) {
          
        var people = new PriorityQueue&lt;String&gt;();
        // добавляем ряд объектов
        people.add("Tom");
        people.add("Bob");
        people.add("Sam");

        System.out.println(people);      // [Bob, Tom, Sam]

        var numbers = new PriorityQueue&lt;Integer&gt;();
        // добавляем ряд объектов
        numbers.add(3);
        numbers.add(1);
        numbers.add(5);
        numbers.add(4);

        System.out.println(numbers);      // [1, 3, 5, 4]
    }
}
</pre>
<p>Здесь определены две очереди приоритетов - для строк и чисел. И в обоих случаях "наименьший" элемент располагается в самом начале. Хотя в целом коллекция не сортируется.</p>

	

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

	<div class="nav"><p><a href="./5.6.php">Назад</a><a href="./">Содержание</a><a href="./5.3.php">Вперед</a></p></div>
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
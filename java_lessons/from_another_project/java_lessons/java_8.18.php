<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Java | CompletableFuture и промисы. Обработка результата асинхронных задач</title>
<meta charset="utf-8" />
<meta name="description" content="Обработка результата асинхронных задач с помощью обратных вызовов в языке программирования Java, класс CompletableFuture и реализация промисов (promise), построение цепочки вызовов и методы thenAccept, thenApply">
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
     <h1>CompletableFuture и промисы. Обработка результата асинхронных задач</h1><div class="date">Последнее обновление: 29.10.2025</div>
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

	
<p>Объект Future, который представляет асинхронную задачу, позволяет получить результат задачи с помощью метода <code>get()</code>, который приведет 
к блокировки текущего потока до тех пор, пока результат асинхронной задачи не станет доступен. Класс <b>CompletableFuture</b>, который реализует интерфейс Future, 
предоставляет альтернативный механизм для получения результата. <b>CompletableFuture</b> использует функцию обратного вызова, которая вызвается с результатом асинхронной задачи, когда он станет доступен. 
Можно сказать, что <b>CompletableFuture</b> - это <code>Future</code>, который может быть явно завершен (с установкой его значения и статуса)</p>
<p>Кроме того, <b>CompletableFuture</b> реализует интерфейс <code>CompletionStage</code>, который представляет этап асинхронного вычисления и выполняет действие или вычисляет значение после 
завершения другого этапа. Можно сказать, что <b>CompletableFuture</b> позволяет реализовать нечто похожее на промисы (promise) в некоторых языках программирования (как, например, в JavaScript)</p>


<h3>Создание CompletableFuture</h3>
<p>Для непосредственного создания объекта <b>CompletableFuture</b> можно использовать конструктор без параметров:</p>
<pre class="brush:java;">CompletableFuture<Integer> future = new CompletableFuture<Integer>();</pre>
<p>Класс <code>CompletableFuture&lt;T&gt;</code> является обобщенным и типизируется типом результата. Так, в коде выше предполагается, что результатом асинхронной задачи будет значение типа <code>Integer</code>.</p>
<p>После создания объекта с помощью конструктора его можно настроить на выполнение какой-либо задачи. Однако класс <code>CompletableFuture</code> также представляет ряд методов, которые позволяют создать объект 
данного класса с уже добавленной асинхронной задачей, которую следует выполнить. Например, это статический метод <code>CompletableFuture&lt;U&gt;.supplyAsync()</code>:</p>
<pre class="brush:java;">
static &lt;U&gt; CompletableFuture&lt;U&gt; supplyAsync(Supplier&lt;U&gt; supplier)
static &lt;U&gt; CompletableFuture&lt;U&gt; supplyAsync(Supplier&lt;U&gt; supplier, Executor executor)
</pre>
<p>Этот метод имеет две версии. Обе версии в качестве результата возвращает новый объект <code>CompletableFuture</code>. И обе этих версии в качестве первого параметра принимают 
объект <code>Supplier<T></code>, который и представляет выполняемое действие. Данный интерфейс является функциональным и имеет один метод <code>get()</code>, который возвращает некоторое значение</p>
<pre class="brush:java;">
interface Supplier&lt;T&gt;{
    T get();
}
</pre>
<p>Результат метода <code>get()</code> затем передается в обратный вызов - асинхронную задачу, которая и обрабатывает данный результат и которая устанавливается с помощью дополнительных методов.</p>

<p>Различие между этими обеими версиями состоит лишь в том, как именно выполняется асинхронная задача. Во второй версии вторым параметром передается объект <code>Executor</code>, который и выполняет задачу. 
Для первой же версии асинхронная задача выполняется с помощью потока из пула <code>ForkJoinPool</code> (<code>ForkJoinPool</code> представляет специализированный пул потоков, разработанный для параллельного программирования). То есть при выполнении задач 
вы можете положиться на ForkJoinPool, либо для большего контроля предоставить свой объект Executor, который выполнит задачу.</p>
<p>Рассмотрим на простейшем примере вычисления факториала:</p>
<pre class="brush:java;">
int number = 5;  // исходное число для вычисления факториала

CompletableFuture&lt;Integer&gt; future = CompletableFuture.supplyAsync(() -&gt; {
 
    // если число меньше 1, генерируем исключение
    if(number &lt; 1) throw new RuntimeException("Number must be greater than 0");

    int n = 1;
    int result = 1;
    while(n &lt;= number) result *= n++; 
    return result;  // возвращаем результат задачи
});
</pre>
<p>В данном случае в метод <code>CompletableFuture.supplyAsync()</code> неявно передается объект Supplier в виде лямбда-выражения. Это лямбда-выражение берет внешнюю переменную number и вычисляет ее факториал и возвращает результат - это и будет результат метода 
<code>get()</code>. Конечно, можно было бы и явным образом определить объект <code>Supplier</code>:</p>
<pre class="brush:java;">
int number = 5;  // исходное число для вычисления факториала

Supplier&lt;Integer&gt; task = () -&gt; {
 
    // если число меньше 1, генерируем исключение
    if(number &lt; 1) throw new RuntimeException("Number must be greater than 0");

    int n = 1;
    int result = 1;
    while(n &lt;= number) result *= n++;
    return result;  // возвращаем результат задачи
};
CompletableFuture&lt;Integer&gt; future = CompletableFuture.supplyAsync(task);
</pre>
<p>Обратите внимание, что функция, которая представляет интерфейс <code>Supplier</code>, <span class="b">не может</span> генерировать проверяемое исключение (checked excetion). Поэтому в примере выше для генерации исключения 
при передаче некорректного числа используется тип <code>RuntimeException</code>.</p>
<h3>Добавление обратного вызова</h3>
<p>После создания <code>CompletableFuture</code> и установки выполняемой задачи нам надо добавить обратный вызов, который будет вызываться при завершении <code>CompletableFuture</code>. Для этого в классе 
определен большой набор методов. Приведу лишь некоторые:</p>
<ul>
<li><p><code>CompletableFuture&lt;Void&gt; thenAccept(Consumer&lt;? super T&gt; action)</code></p><p>Применяет функцию к результату и возвращает <code>void</code>.</p></li>
<li><p><code>&lt;U&gt; CompletableFuture&lt;U&gt; thenApply(Function&lt;? super T, ? extends U&gt; fn)</code></p><p>Применяет функцию к результату.</p></li>
<li><p><code>CompletableFuture&lt;Void&gt; thenRun(Runnable action)</code></p><p>Выполняет Runnable с результатом типа <code>void</code>.</p></li>
<li><p><code>&lt;U&gt; CompletableFuture&lt;U&gt; thenCompose(Function&lt;? super T, ? extends CompletionStage&lt;U&gt;&gt; fn)</code></p><p>Вызывает функцию для результата и выполняет возвращаемый объект Future.</p></li>
</ul>
<p>Например, используем метод <code>thenAccept()</code>, который принимает объект интерфейса <b>Consumer</b>. Этот интерфейс имеет метод <code>accept()</code>, который принимает некоторое значение:</p>
<pre class="brush:java;">void accept(T t)</pre>
<p>Таким образом, обратный вызов должен представлять функцию, которая принимает значение произвольного типа, а в качестве возвращаемого типа испольует <code>void</code></p>
<p>Рассмотрим на примере факториала:</p>
<pre class="brush:java;">
import java.util.concurrent.*;
import java.util.function.Supplier;
 
class Program{
 
    public static void main(String[] args) throws Exception{
          
        System.out.println("Main thread started...");
 
        int number = 5;  // исходное число для вычисления факториала
       
        // определяем задачу, которая вычисляет факториал
        Supplier&lt;Integer&gt; task = () -&gt; {

            if(number &lt; 1) throw new RuntimeException("Number must be greater than 0");
            int n = 1;
            int result = 1;
            while(n &lt;= number) {

                result *= n++;
            }
            return result;  // возвращаем результат задачи
        };
 
        CompletableFuture&lt;Integer&gt; future = CompletableFuture.supplyAsync(task);

        // передаем в thenAccept обратный вызов
        future.thenAccept(result -&gt; System.out.printf("factorial of %d is %d\n", number, result));

        // future.thenAccept - не блокирует основной поток 
        // и одновременно мы можем выполнять в основном потоке некоторую работу 
        System.out.println("Main thread works...");
 
        Thread.sleep(2000);

        System.out.println("Main thread finished...");
    }
}
</pre>
<p>Рассмотрим на передачу обратного вызова:</p>
<pre class="brush:java;">future.thenAccept(result -&gt; System.out.printf("factorial of %d is %d\n", number, result));</pre>
<p>Здесь в метод передается лямбда-выражение, в котором параметр result представляет результ асинхронной задачи - результат вычисления факториала. Тело лямбда-выражения же представляет вывод результата вычисления.</p>
<p>Если суммировать все по этапам, то программа будет выполняться следующим образом:</p>

<li><p><code>System.out.println("Main thread started...")</code></p><p> Основной поток (main) запускается и выводит это сообщение.</p></li>
<li><p><code>CompletableFuture<Integer> future = CompletableFuture.supplyAsync(task);</code></p><p>Передает ранее определенную задачу <code>task</code> (вычисление факториала) в общий пул потоков (по умолчанию <code>ForkJoinPool.commonPool()</code>). Эта задача начинает выполняться параллельно в другом потоке.</p></li>
<li><p><code>future.thenAcceptAsync(result -&gt; System.out.printf("factorial of %d is %d\n", number, result))</code></p><p>Регистрирует обратный вызов (колбэк). Этот колбэк не выполняется немедленно. 
Он ждет, пока задача <code>task</code> не завершится и не возвратит неокторый результат.</p></li>
<li><p><code>System.out.println("Main thread works...")</code></p><p> Основной поток <span class="b">не ждет</span> завершения задачи <code>task</code>, а немедленно продолжает работу (в данном случае для 
имитации работы выводим сообщение)</p></li>
<li><p><span class="b">Выполнение задачи</span></p><p> В это время (<code>main</code> либо печатает "Main thread works...", либо уже спит) параллельный поток очень быстро вычисляет факториал 5 (это 120). Это занимает доли миллисекунды.</p></li>
<li><p><span class="b">Выполнение колбэка</span></p><p> Сразу после завершения задачи <code>task</code> запускается  зарегистрированный с помощью функции <code>thenAccept</code> обратный вызов 
(обычно в том же потоке из пула) и выводит: <code>factorial of 5 is 120</code>.</p></li>
<li><p><code>Thread.sleep(2000);</code></p><p> Основной поток "спит" 2000 мс. К этому моменту колбэк почти наверняка уже отработал и вывел результат.</p></li>
<li><p><code>System.out.println("Main thread finished...")</code></p><p> Через 2 секунды основной поток просыпается и выводит сообщение, после чего программа завершается.</p></li>

<p>Наиболее вероятный порядок вывода будет таким:</p>

<pre class="sh">
Main thread started...
Main thread works...
factorial of 5 is 120
Main thread finished...
</pre>
<p>Таким образом, можно обрабатывать результат, как только он станет доступен, не блокируя основой поток.</p>
<p>Но в данном случае стоит отметить, что, поскольку потоки, используемые <code>CompletableFuture</code> по умолчанию (из пула <b>ForkJoinPool.commonPool()</b>), являются 
<span class="b">потоками-демонами</span> (daemon threads) - по сути фоновыми потоками, то JVM (Виртуальная машина Java) не ждет, пока они завершатся. 
JVM работает до тех пор, пока жив хотя бы один поток, который не является "демоном" . В программе выше единственный поток, который не является демоном - это поток метода main. 
Поэтому если убрать <code>Thread.sleep</code>, то поток main очень быстро выполнит методы <code>supplyAsync()</code> и <code>thenAccept()</code>, напечатает "Main thread works..." и 
"Main thread finished..." и немедленно завершится.</p>
<p>Как только main завершается, JVM видит, что активных потоков-не-демонов не осталось, и принудительно завершает всю программу. И в этом случае асинхронная задача task и ее колбэк в <code>thenAccept()</code> 
просто не успевают выполниться до завершения основного потока. Поэтому именно <code>Thread.sleep(2000)</code> в коде выше "удерживает" основной поток живым, давая асинхронной задаче достаточно времени, 
чтобы выполниться и напечатать результат.</p>
<p>Вместо использования задержек мы могли бы явным образом определить объект <b>Executor</b>, который будет выполнять задачи. Например:</p>
<pre class="brush:java;">
import java.util.concurrent.*;
import java.util.function.Supplier;
 
class Program{
 
    public static void main(String[] args) throws Exception{
          
        System.out.println("Main thread started...");
 
        int number = 5;  // исходное число для вычисления факториала
       
        // определяем задачу, которая вычисляет факториал
        Supplier&lt;Integer&gt; task = () -&gt; {

            if(number &lt; 1) throw new RuntimeException("Number must be greater than 0");
            int n = 1;
            int result = 1;
            while(n &lt;= number)  result *= n++; 

            // имитируем долгую работу
            try {Thread.sleep(2000);}
            catch(InterruptedException _){}

            return result;  // возвращаем результат задачи
        };

        // определяем объект Executor, который будет выполнять задачу
        ExecutorService executor = Executors.newCachedThreadPool();
        CompletableFuture&lt;Integer&gt; future = CompletableFuture.supplyAsync(task, executor);
        future.thenAccept(result -&gt; System.out.printf("factorial of %d is %d\n", number, result));

        // future.thenAccept - не блокирует основной поток 
        // и одновременно мы можем выполнять в основном потоке некоторую работу 
        System.out.println("Main thread works...");
        System.out.println("Main thread finished...");
        // закрываем исполнителя
        executor.close();  
    }
}
</pre>
<p>В принципе здесь выполняются те же самые действия, только теперь я убрал задержку для основного потока и добавил аналогичную задержку в задачу по вычислению факториала, чтобы эта задача завершалась после всех действий в основном потоке метода main.</p>
<p>И также добавлено создание объекта Executor, который передается в метод <code>supplyAsync()</code>:</p>
<pre class="brush:java;">
ExecutorService executor = Executors.newCachedThreadPool();
CompletableFuture&lt;Integer&gt; future = CompletableFuture.supplyAsync(task, executor);
</pre>
<p>В данном случае создаваемый объект Executor будет использовать один из платформенных потоков из пула. Причем далее этот Executor будет выполнять как задачу по вычислению факториала, так и коллбек, который выводит результат на консоль.</p>
<p>В итоге мы скорее всего получим следующий консольный вывод:</p>
<pre class="sh">
Main thread started...
Main thread works...
Main thread finished...
factorial of 5 is 120
</pre>
<p>Поскольку в асинхронной задаче действует 2-секундная задержка, то скорее всего асинхронная задача факториала будет выполнена после вывода на консоль строки "Main thread finished..." в методе main.</p>

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

<h3>Создание цепочки обратных вызовов</h3>
<p>Аналогичным образом мы можем применять и другие методы <code>CompletedFuture</code> для добавления обратных вызовов для обработки результатов. Более того мы можем обрабатывать результаты других обратных вызовов. 
Например, возьмем метод <b>thenApply()</b>:</p>
<pre class="brush:java;">&lt;U&gt; CompletableFuture&lt;U&gt; thenApply(Function&lt;? super T, ? extends R&gt; fn)</pre>
<p>Параметром метода является объект интерфейса <b>Function</b> - по сути это некоторая функция, которая принимает объект типа <code>T</code> и возвращает объект типа <code>R</code>, 
то есть преобразует результат типа <code>T</code> в объект типа <code>R</code>. Либо если быть точнее функция обратного вызова должна соответствовать методу <code>apply()</code> интерфейса Function:</p>
<pre class="brush:java;">R apply(T t)</pre>
<p>Допустим, после вычисления факториала нам надо увеличить его в 2 раза:</p>
<pre class="brush:java;">
import java.util.concurrent.*;
import java.util.function.Supplier;
import java.util.function.Function;
import java.util.function.Consumer;
 
class Program{
 
    public static void main(String[] args) throws Exception{
          
        System.out.println("Main thread started...");
 
        int number = 5;  // исходное число для вычисления факториала
       
        // определяем задачу, которая вычисляет факториал
        Supplier&lt;Integer&gt; factorialTask = () -&gt; {

            if(number &lt; 1) throw new RuntimeException("Number must be greater than 0");
            int n = 1;
            int result = 1;
            while(n &lt;= number)  result *= n++; 
            return result; 
        };
        // определяем задачу, которая увеличивает в два раза
        Function&lt;Integer, Integer&gt; doubleTask = result -&gt;  result * 2;
        // определяем задачу, которая выводит на консоль конечный результат
        Consumer&lt;Integer&gt; printTask = result -&gt; System.out.printf("Final result: %d\n", result);

        // определяем объект Executor, который будет выполнять задачи
        ExecutorService executor = Executors.newCachedThreadPool();
        // определяем коллбеки
        CompletableFuture
                .supplyAsync(factorialTask, executor)
                .thenApply(doubleTask)
                .thenAccept(printTask);

        System.out.println("Main thread works...");
        System.out.println("Main thread finished...");
        
        executor.close();  // закрываем исполнителя
    }
}
</pre>
<p>Ключевой момент программы - это, конечно, определение цепочки выполняемых задач:</p>
<pre class="brush:java;">
CompletableFuture
    .supplyAsync(factorialTask, executor)
    .thenApply(doubleTask)
    .thenAccept(printTask);
</pre>
<p>Рассмотрим поэтапно:</p>
<ol>
<li><p><code>supplyAsync(factorialTask, executor)</code></p>
<p>Определяет асинхронную задачу, которая выполняется  - это задача factorialTask, которая вычисляет факториала. Эта задача представляет тип <code>Supplier&lt;Integer&gt;</code> и поэтому возвращает значение типа <code>Integer</code></p>
</li>

<li><p><code>thenApply(doubleTask)</code></p>
<p>Применяет к результату предыдущей задачи (в нашем случае это вычисление факториала) функцию doubleTask. Эта задача представляет тип <code>Function&lt;Integer, Integer&gt;</code>. То есть функция 
получает значение типа <code>Integer</code> (факториал числа - результат задачи factorialTask) и возвращает также значение типа <code>Integer</code> - удвоенное значение факториала.</p>
</li>

<li><p><code>thenAccept(printTask)</code></p>
<p>Применяет к результату предыдущей задачи (в нашем случае это результат задачи doubleTask) функцию printTask, которая представляет тип <code>Consumer&lt;Integer&gt;</code>. Эта задача 
получает значение типа <code>Integer</code> (результат задачи doubleTask) и ничего не возвращает (фактически возвращает <code>void</code>) и просто выводит результат на консоль.</p></li>
</ol>
<p>Консольный вывод программы:</p>
<pre class="sh">
Main thread started...
Main thread works...
Main thread finished...
Final result: 240
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

	<div class="nav"><p><a href="./8.15.php">Назад</a><a href="./">Содержание</a><a href="./8.19.php">Вперед</a></p></div>
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
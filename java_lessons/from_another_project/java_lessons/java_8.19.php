<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Java | CompletableFuture, обработка ошибок и завершения асинхронных задач</title>
<meta charset="utf-8" />
<meta name="description" content="Обработка ошибок и завершения асинхронных задач в языке программирования Java, класс CompletableFuture и его методы whenComplete, exceptionally и exceptionallyCompose, исключение CompletionException">
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
     <h1>CompletableFuture, обработка ошибок и завершения асинхронных задач</h1><div class="date">Последнее обновление: 29.10.2025</div>
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

	<h3>Обработка ошибок</h3>
<p>В прошлой статье был рассмотрен такой пример для работы с асинхронностью в языке Java, как тип <b>CompletableFuture</b>, который позволяет устанавливать коллбеки для обработки результатов асинхронной задачи. Однако что, если при вычислениях возникнет ошибка? Например, у нас есть следующая задача по вычислению 
факториала, где, если передаваемое число меньше 1, то генерируется ошибка:</p>
<pre class="brush:java;">
Supplier&lt;Integer&gt; factorialTask = () -&gt; {

    // при некорректных данных генерируем ошибку
    if(number &lt; 1) throw new RuntimeException("Number must be greater than 0");
    int n = 1;
    int result = 1;
    while(n &lt;= number)  result *= n++; 
    return result; 
};
</pre>
<p>Как мы можем обработать эту ошибку? Для обработки ошибок в API класса <code>CompletedFuture</code> определен ряд методов. Рассмотрим ряд из них:</p>
<pre class="brush:java;">
CompletableFuture&lt;T&gt; exceptionally(Function&lt;Throwable, ? extends T&gt; fn)
CompletableFuture&lt;T&gt; exceptionallyCompose(Function&lt;Throwable, ? extends CompletionStage&lt;T&gt;&gt; fn)
</pre>
<p>Эти методы позволяют установить обратный вызов, который выполняется при возникновении ошибки на предыдущем этапе:</p>
<ul>
<li><p><span class="b">exceptionally()</span>: вычисляет результат на основе ошибки, если она возникла на предыдущем этапе. То есть фактически обратный вызов производит переход <code>Throwable -&gt; T</code></p></li>
<li><p><span class="b">exceptionallyCompose()</span>: вызывает функцию для исключения, если она возникла на предыдущем этапе, и выполняет возвращенный результат - объект <code>CompletableFuture</code>. 
То есть фактически обратный вызов производит переход <code>Throwable -&gt; CompletableFuture&lt;T&gt;</code></p></li>
</ul>
<p>Рассмотрим на примере вычисления факториала:</p>
<pre class="brush:java;">
import java.util.concurrent.*;
import java.util.function.Supplier;
import java.util.function.Function;
import java.util.function.Consumer;
 
class Program{
 
    public static void main(String[] args) throws Exception{
          
        System.out.println("Main thread started...");
 
        int number = -5;  // исходное число для вычисления факториала
       
        // определяем задачу, которая вычисляет факториал
        Supplier&lt;Integer&gt; factorialTask = () -&gt; {

            if(number &lt; 1) throw new RuntimeException("Number must be greater than 0");
            int n = 1;
            int result = 1;
            while(n &lt;= number)  result *= n++; 
            return result; 
        };
        // задача для вывода финального результата
        Consumer&lt;Integer&gt; printTask = result -&gt; System.out.printf("Final result: %d\n", result);

        // задача для обработки ошибки
        Function&lt;Throwable, Integer&gt; printException = ex -&gt; { 
            System.out.println(ex.getMessage());    
            throw new RuntimeException(ex.getMessage());
        };

        // определяем объект Executor, который будет выполнять задачи
        ExecutorService executor = Executors.newCachedThreadPool();
        CompletableFuture
                .supplyAsync(factorialTask, executor)
                .exceptionally(printException)
                .thenAccept(printTask);

        System.out.println("Main thread works...");
        System.out.println("Main thread finished...");
        
        executor.close();  // закрываем исполнителя
    }
}
</pre>
<p>Рассмотрим ключевые моменты. Прежде всего основная задача, которая выполняется с помощь <code>CompletedFuture</code> - это задача вычисления факториала factorialTask. Эта задача возвращает целое число (значение <code>Integer</code>)</code></p>
<p>Для выполнения задачи и вызова коллбеков, обрабатывающих ее результат, определяем следующий код:</p>
<pre class="brush:java;">
CompletableFuture
    .supplyAsync(factorialTask, executor)
    .exceptionally(printException)
    .thenAccept(printTask);
</pre>
<ul>
<li><p><code>supplyAsync(factorialTask, executor)</code></p>
<p>Устанавливаем выполняемую асинхронную задачу и объект Executor, который выполняет эту задачу.</p>
<p>Если передачаемое для вычисления факториала число некорректно, то генерируем исключение</p>
<pre class="brush:java;">if(number &lt; 1) throw new RuntimeException("Number must be greater than 0");</pre>
</li>
<li><p><code>exceptionally(printException)</code></p>
<p>Для обработки исключения определяем задачу printException, которая просто выводит информацию об исключении на консоль:</p>
<pre class="brush:java;">
Function&lt;Throwable, Integer&gt; printException = ex -&gt; { 
    System.out.println(ex.getMessage());    
    throw new RuntimeException(ex.getMessage());
};
</pre>
<p>Здесь стоит отметить, что поскольку задача факториала возвращает значение типа Integer, то и эта задача должна возвращать значение типа Integer. Однако в данном случае мы ничего не возвращаем и просто повторно генерируем исключение 
(причем непроверяемое исключение). Повторная генерация исключения позволит избежать выполнения следующего колбека, для которого требуется результат вычисления факториала.</p></li>
<li><p><code>thenAccept(printTask)</code></p>
<p>Задача printTask принимает результат - результат вычисления факториала и просто выводит его на консоль</p>
</li>
</ul>
<p>В программе входное число является отрицательным:</p>
<pre class="brush:java;">int number = -5;</pre>
<p>Соответственно при выполнении мы столкнемся с ошибкой и получим консольный вывод наподобие следующего:</p>
<pre class="sh">
Main thread started...
java.lang.RuntimeException: Number must be greater than 0
Main thread works...
Main thread finished...
</pre>
<p>И тут надо обратить внимание, что последний коллбек - printTask не выполняется, а выполнение основного потока не прерывается, хотя мы повторно генерируем исключение при его обработке.</p>
<p>Если же входное число было бы больше 0:</p>
<pre class="brush:java;">int number = 5;</pre>
<p>то мы увидим результат работы коллбека из вызова <code>thenAccept(printTask)</code>, а коллбек из вызова <code>exceptionally(printException)</code> не будет выполняться:</p>
<pre class="sh">
Main thread started...
Final result: 120
Main thread works...
Main thread finished...
</pre>

<p>Естественно это не единственно возможная схема обработки ошибок. Например, в примере выше мы генерировали повторно исключение. Но мы могли бы и сгенерировать результат, если переданное значение генерировало ошибку:</p>
<pre class="brush:java;">
import java.util.concurrent.*;
import java.util.function.Supplier;
import java.util.function.Function;
import java.util.function.Consumer;
 
class Program{
 
    public static void main(String[] args) throws Exception{
 
        int age = -5;
       
        // определяем задачу, которая вычисляет факториал
        Supplier&lt;Integer&gt; validateAge = () -&gt; {

            if(age &gt; 110 || age &lt; 1) throw new RuntimeException("Age is invalid");
            return age; 
        };
        // задача для вывода финального результата
        Consumer&lt;Integer&gt; printAge = result -&gt; System.out.printf("Final age: %d\n", result);

        // задача для обработки ошибки
        Function&lt;Throwable, Integer&gt; printException = ex -&gt; { 
            System.out.println(ex.getMessage());    
            return 18;  // возвращаем некоторое значение по умолчанию
        };

        // определяем объект Executor, который будет выполнять задачи
        ExecutorService executor = Executors.newCachedThreadPool();
        CompletableFuture
                .supplyAsync(validateAge, executor)
                .exceptionally(printException)
                .thenAccept(printAge);

        // закрываем исполнителя
        executor.close();  
    }
}
</pre>
<p>Здесь мы сначала проверяем возраст - значение переменной age в задаче validateAge: если оно не входит в неготорый диапазон, генерируем исключение:</p>
<pre class="brush:java;">
Supplier&lt;Integer&gt; validateAge = () -&gt; {

    if(age &gt; 110 || age &lt; 1) throw new RuntimeException("Age is invalid");
    return age; 
};
</pre>
<p>Если генерируется исключение, то вызывается задача printException:</p>
<pre class="brush:java;">
Function&lt;Throwable, Integer&gt; printException = ex -&gt; { 
    System.out.println(ex.getMessage());    
    return 18;  // возвращаем некоторое значение по умолчанию
};
</pre>
<p>Здесь также выводим сообщение об ошибке, но при этом возвращаем некоторое значение по умолчанию.</p>
<p>Таким образом при определении следующей цепочки:</p>
<pre class="brush:java;">
CompletableFuture
    .supplyAsync(validateAge, executor)
    .exceptionally(printException)
    .thenAccept(printAge);
</pre>
<p>Если в validateAge возникает исключение, оно передается в задачу printException, которая генерирует конечный результат. И этот результа передается в задачу printAge. То есть в данном случае последний коллбек - printAge 
выполняется в любом случае, даже если возникает ошибка. Консольный вывод в данном случае</p>
<pre class="sh">
java.lang.RuntimeException: Age is invalid
Final age: 18
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


<h4>CompletionException</h4>
<p>Исключение, которое генерируется в задачах <code>CompletedFuture</code> представляет тип <b>CompletionException</b>, которое наследуется от <code>RuntimeException</code> и фактически является оборткой над исключением. 
Таким образом, когда мы генерируем исключение</p>
<pre class="brush:java;">
if(age &gt; 110 || age &lt; 1) throw new RuntimeException("Age is invalid");
</pre>
<p>В реальности в задачу для обработки исключения из вызова <code>exceptionally()</code> передается не сгенерированное исключения <code>RuntimeException</code>, а обертка над ним в виде объекта <b>CompletionException</b>. 
Поэтому в сообщении об исключении мы видим изначальный тип исключения - "java.lang.RuntimeException: Age is invalid". Чтобы обратиться к этому внутреннему исключению, мы можем использовать метод 
<code>getCause()</code>, который определен в интерфейсе Throwble:</p>
<pre class="brush:java;">
Function&lt;Throwable, Integer&gt; printException = ex -&gt; { 
    System.out.println(ex.getCause().getMessage());    
    return 18;  // возвращаем некоторое значение по умолчанию
};
</pre>
<p>Соответственно теперь при выводе на консоль не будет указываться тип исключения:</p>
<pre class="sh">
Age is invalid
Final age: 18
</pre>
<h3>Завершение CompletedFuture</h3>
<p>Асинхронные задачи объекта <b>CompletableFuture</b> могут завершиться двумя способами: с результатом или с неперехваченным исключением. Для обработки обоих случаев можно использовать метод 
<b>whenComplete()</b>:</p>
<pre class="brush:java;">
CompletableFuture&lt;T&gt; whenComplete(BiConsumer&lt;? super T, ? super Throwable&gt; action)
</pre>
<p>В качестве параметра этот метод принимает действие, которое соответствует методу <code>accept()</code> функционального интерфейса <b>BiConsumer&lt;T,U&gt;</b>:</p>
<pre class="brush:java;">void accept(T t, U u)</pre>
<p>То есть действие ничего не возвращает и принимает два параметра, причем второй параметр должен представлять объект <code>Throwable</code>. В случае с <code>CompletableFuture</code> 
первый параметр будет представлять результат асинхронной задачи, а второй параметр - исключение, если оно возвникло в процессе выполнения асинхронной задачи.</p>
<p>Если результат был успешно вычислен, а исключения не возникло, то второй параметр равен <code>null</code>. Если же наоборот - при выполнении задачи возникло исключение, то первый параметр равен 
<code>null</code></p>
<p>Общая схема работы коллбека, который передается в данный метод, выглядит следующим образом:</p>
<pre class="brush:java;">
f.whenComplete((result, error) -&gt; {

      if (error == null){  // если исключения нет
      
         обрабатывает результат result;
      }
      else {    // если возникло исключение

         обрабатываем ошибку error;
      }
});
</pre>
<p>Рассмотрим на примере вычисления факториала:</p>
<pre class="brush:java;">
import java.util.concurrent.*;
import java.util.function.Supplier;
import java.util.function.BiConsumer;
 
class Program{
 
    public static void main(String[] args) throws Exception{
          
        System.out.println("Main thread started...");
 
        // определяем объект Executor, который будет выполнять задачи
        ExecutorService executor = Executors.newCachedThreadPool();
        work(executor, 5);
        work(executor, -5);
       
        
        System.out.println("Main thread finished...");

        executor.close(); 
    }

    static void work(Executor executor, int number){
        // определяем задачу, которая вычисляет факториал
        Supplier&lt;Integer&gt; factorialTask = () -&gt; {

            if(number &lt; 1) throw new RuntimeException("Number must be greater than 0. Invalid number: " + number);
            int n = 1;
            int result = 1;
            while(n &lt;= number)  result *= n++;
            return result; 
        };

        BiConsumer&lt;Integer, Throwable&gt; completedTask = (result, ex) -&gt; {

            if (ex == null)  // если нет исключения
                System.out.printf("factorial of %d is %d\n", number, result);
            else     // если возникло исключение
                System.out.println(ex.getCause().getMessage());
        };

        CompletableFuture
            .supplyAsync(factorialTask, executor)
            .whenComplete(completedTask);
    }
}
</pre>
<p>Основные действия здесь выполняются в методе <code>work()</code>, который принимает число для вычисления факториала и объект <code>Executor</code> для выполнения задач.</p>
<p>Сначала определяем собственно задачу для вычисления факториала:</p>
<pre class="brush:java;">
Supplier&lt;Integer&gt; factorialTask = () -&gt; {

    if(number &lt; 1) throw new RuntimeException("Number must be greater than 0. Invalid number: " + number);
    int n = 1;
    int result = 1;
    while(n &lt;= number)  result *= n++;
    return result; 
};
</pre>
<p>Если переданное число здесь меньше 1, то генерируем исключение.</p>
<p>Для обработки завершения задачи (вне зависимости успешного или неудачного) определяем отдельную задачу типа <code>BiConsumer</code>:</p>
<pre class="brush:java;">
BiConsumer&lt;Integer, Throwable&gt; completedTask = (result, ex) -&gt; {

    if (ex == null)  // если нет исключения
        System.out.printf("factorial of %d is %d\n", number, result);
    else     // если возникло исключение
         System.out.println(ex.getCause().getMessage());
};
</pre>
<p>Поскольку результат вычисления факториала представляет тип <code>Integer</code>, то параметры задачи представляют типы <code>Integer</code> и <code>Throwable</code>. В целях демонстрации задача просто 
выводит результат или сообщение об ошибке на консоль.</p>
<p>В конце делаем цепочку вызовов, в которые передаем выше определенные коллбеки:</p>
<pre class="brush:java;">
CompletableFuture
    .supplyAsync(factorialTask, executor)
    .whenComplete(completedTask);
</pre>
<p>В методе <code>main()</code> вызываем метод <code>work()</code>, передавая в него для тестирования корркетные и некорректные значения:</p>
<pre class="brush:java;">
ExecutorService executor = Executors.newCachedThreadPool();

work(executor, 5);
work(executor, -5);
</pre>
<p>В итоге мы получим консольный вывод типа следующего (порядок вывода сообщение не детерминирован):</p>
<pre class="sh">
Main thread started...
factorial of 5 is 120
Main thread finished...
Number must be greater than 0. Invalid number: -5
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

	<div class="nav"><p><a href="./8.18.php">Назад</a><a href="./">Содержание</a><a href="./10.1.php">Вперед</a></p></div>
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
<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Java | Процессы. Process и ProcessBuilder</title>
<meta charset="utf-8" />
<meta name="description" content="Управление процессами в языке программирования Java, классы Process и ProcessBuilder, создание, настройка, запуск и завершение процессов, направление вывода процессов на консоль и в файл, запуск произвольных программ">
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
     <h1>Процессы. Process и ProcessBuilder</h1> <div class="date">Последнее обновление: 29.10.2025</div>
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

	
<p>Иногда в рамках одной программы на языке Java требуется выполнить другую, произвольную программу. И стандартная библиотека языка Java предоставляет для этой цели класс <b>Process</b>.  
Класс <b>Process</b> выполняет команду в отдельном процессе операционной системы  и позволяет взаимодействовать с его стандартными потоками ввода, вывода и ошибок. В частности, этот класс обеспечивает управление процессами и предоставляет методы для передачи данных в процесс и, наоборот, получения данных из процесса, а также ожидания завершения процесса, 
проверки статуса процесса и его завершения.</p>
<h3>Создание процесса</h3>
<p>Для создания и настройки объекта <code>Process</code> применяется класс <b>ProcessBuilder</b>. Этот класс имеет два похожих конструктора</p>
<pre class="brush:java;">
ProcessBuilder(String... command)
ProcessBuilder(List&lt;String&gt; command)
</pre>
<p>Оба этих конструктора принимают путь к запускаемой программе и набор ее аргументов в виде строк. Например:</p>
<pre class="brush:java;">var builder = new ProcessBuilder("java", "--version");</pre>
<p>Первый аргумент - "java" представляет имя приложения, которае будет запускаться в процессе. Второй параметр - "--version" - аргумент, который передается приложению. То есть в данном случае будем запускать 
команду "java --version", пытаясь получить текущую версию Java.</p>

<h3>Запуск процесса</h3>
<p>Для запуска процесса в классе <code>ProcessBuilder</code> определен метод <b>start()</b></p>
<pre class="brush:java;">Process start()</pre>
<p>Этот метод возвращает объект запущенного процесса. Например:</p>
<pre class="brush:java;">
class Program{
 
    public static void main(String[] args) throws Exception{
          
        var builder = new ProcessBuilder("java", "--version");
        Process javac = builder.start();
    }
}
</pre>
<p>Однако после компиляции и запуска программы мы ничего не увидим. Для этого нам надо дополнительно выполнить некоторую настройку.</p>

<h3>Настройка создания процесса</h3>
<p>С помощью ряда методов <b>ProcessBuilder</b> можно настроить создание и выполнение процесса. Все эти методы возвращают объект <code>ProcessBuilder</code>:</p>
<ul>
<li><p><code>ProcessBuilder command(String... command) / command(List<String> command)</code>: устанавливает запускаемую программу и аргументы для ее запускав.</p></li>
<li><p><code>ProcessBuilder directory(File directory)</code>: устанавливает рабочий каталог для построителя процессов.</p></li>
<li><p><code>ProcessBuilder inheritIO()</code>: устанавливает источник ввода и назначение вывода подпроцесса такими же, как у текущего процесса Java.</p></li>
<li><p><code>ProcessBuilder redirectError(File file)</code>: устанавливает файл для вывода ошибок.</p></li>
<li><p><code>ProcessBuilder redirectError(ProcessBuilder.Redirect destination)</code>: устанавливает стандартный вывод ошибок.</p></li>
<li><p><code>ProcessBuilder redirectInput(File file)</code>: устанавливает файл в качестве стандартного источника ввода.</p></li>
<li><p><code>ProcessBuilder redirectInput(ProcessBuilder.Redirect source)</code>: устанавливает источник стандартного ввода.</p></li>
<li><p><code>ProcessBuilder redirectOutput(File file)</code>: устанавливает файл в качестве стандартного вывода.</p></li>
<li><p><code>ProcessBuilder redirectOutput(ProcessBuilder.Redirect destination)</code>: устанавливает место вывода.</p></li></ul>
<li><p><code>ProcessBuilder redirectErrorStream(boolean redirectErrorStream)</code>: устанавливает свойство redirectErrorStream - если оно равно <code>true</code>, то стандартный вывод и вывод ошибок производятся в одно место.</p></li>
</ul>

<p>Здесь надо отметить следующие важные аспекты:</p>
<ul>
<li><p><span class="b">Вывод</span>: куда будет идти вывод запускаемого процесса. Задается методом <code>redirectOutput()</code></p></li>
<li><p><span class="b">Ввод</span>: откуда будет идти ввод данных для запускаемого процесса. Задается методом <code>redirectInput()</code></p></li>
<li><p><span class="b">Вывод ошибок</span>: куда будет идти вывод ошибок процесса. Задается методом <code>redirectError()</code> и <code>redirectErrorStream()</code></p></li>
</ul>

<p>Мы также можем получить устанавливаемые параметры с помощью одноименных методов:</p>
<ul>
<li><p><code>List&lt;String>&gt; command()</code></p><p>Возвращает запускаемую программу и аргументы для ее запуска.</p></li>
<li><p><code>File directory()</code></p><p>Возвращает рабочий каталог для построителя процессов.</p></li>
<li><p><code>boolean redirectErrorStream()</code>: Указывает, объединяет ли этот построитель процессов стандартный вывод ошибок и стандартный вывод.</p></li>
<li><p><code>ProcessBuilder.Redirect redirectError()</code>: Возвращает стандартный приёмник ошибок этого построителя процессов.</p></li>
<li><p><code>ProcessBuilder.Redirect redirectInput()</code>: Возвращает стандартный источник ввода.</p></li>
<li><p><code>ProcessBuilder.Redirect redirectOutput()</code>: Возвращает стандартный вывод.</p></li>
</ul>
<p>Можете указать, что потоки ввода, вывода и ошибок нового процесса должны совпадать с потоками JVM. Если пользователь запускает JVM в консоли, любой пользовательский ввод перенаправляется в процесс, 
а вывод процесса отображается в консоли. Для этого применяется метод <b>inheritIO()</b>. Например, наша основная программа запускается в консоли, и мы хотим, чтобы запускаемый процесс также 
выводил данные на консоль:</p>
<pre class="brush:java;">
class Program{
 
    public static void main(String[] args) throws Exception{
          
        var builder = new ProcessBuilder("java", "--version");
        Process javac = builder
                            .inheritIO()    // запускаемый процесс наследует параметры ввода/вывода текущего процесса
                            .start();       // запускаем процесс
    }
}
</pre>
<p>В итоге при запуске мы увидим версию Java - по сути вывод запущенного подпроцесса:</p>
<pre class="sh">
eugene@Eugene:/workspace/java/hello$ javac Program.java && java Program
java 25 2025-09-16 LTS
Java(TM) SE Runtime Environment (build 25+37-LTS-3491)
Java HotSpot(TM) 64-Bit Server VM (build 25+37-LTS-3491, mixed mode, sharing)
</pre>
<p>Также можно по отдельности направить потоки подпроцесса на текущие процессы JVM. Для этого используется константа <span class="b">ProcessBuilder.Redirect.INHERIT</span></p>
<pre class="brush:java;">
class Program{
 
    public static void main(String[] args) throws Exception{
          
        var builder = new ProcessBuilder("java", "--version");
        builder
            .redirectOutput(ProcessBuilder.Redirect.INHERIT)
            .start();
    }
}
</pre>
<p>Еще один распространенный способ вывода - вывод в файл. Для этого в метод <code>redirectOutput()</code> передается объект <span class="b">File</span>:</p>
<pre class="brush:java;">
import java.nio.file.Path;

class Program{
 
    public static void main(String[] args) throws Exception{
          
        var builder = new ProcessBuilder("java", "--version");
        builder
            .redirectOutput(Path.of("output.txt").toFile())
            .start();
    }
}
</pre>
<p>Здесь для создания пути применяется встроенный интерфейс <code>java.nio.file.Path</code>. С помощью статического метода <code>Path.of()</code> определяем путь к файлу. В данном случае будет использоваться 
файл "output.txt" из текущего каталога (если такого файла нет, то он создается). А метод <code>.toFile()</code> преобразует путь <code>Path</code> в объект <code>File</code>. В итоге вывод команды 
"java --version" будет записан в файл "output.txt"</p>
<p>Нередо потоки вывода и ошибок пишут свои данные в один поток. Чтобы объединить потоки вывода и ошибок можно выполнить вызов</p>
<pre class="brush:java;">builder.redirectErrorStream(true);</pre>
<h4>Рабочий каталог</h4>
<p>У каждого процесса есть рабочий каталог (working directory), который используется для вычисления относительных имен каталогов. По умолчанию рабочий каталог процесса совпадает с рабочим каталогом 
виртуальной машины - обычно это каталог текущей программы на Java. С помощью метода <code>directory()</code> можно получить данный каталог в виде объекта <span class="b">File</span>:</p>
<pre class="brush:java;">
var builder = new ProcessBuilder("java", "--version");
System.out.println(builder.directory());  // null - текущий каталог
</pre>
<p>Если метод возвращает <code>null</code>, то в качестве рабочего каталога установлен каталог текуй программы на Java.</p>
<p>Но также можно изменить рабочий каталог с помощью одноименного метода <code>directory()</code>, который принимает объенкт File.</p>
<p>Например, создадим в текущей папке программы новый каталог с именем "test". А в этом каталоге определим файл с именем "Main.java" и следующим содержимым:</p>
<pre class="brush:java;">
class Main{
 
    public static void main(String[] args) throws Exception{
          
        System.out.println("Hello METANIT.COM");
    }
}
</pre>
<p>То есть файл Main.java из папки "test" содержит простейшую программу на Java. И допустим, мы хотим, чтобы наша программа запускала на выполнение этот файл. Для этого определеим следующую программу:</p>
<pre class="brush:java;">
import java.nio.file.Path;

class Program{
 
    public static void main(String[] args) throws Exception{
          
        var builder = new ProcessBuilder("java", "Main.java");
        builder
            .directory(Path.of("test").toFile())                // устанавливаем рабочий каталог на подкаталог "test"
            .redirectOutput(ProcessBuilder.Redirect.INHERIT)    // устанавливаем вывод на консоль
            .redirectErrorStream(true)                          // вывод ошибок также идет на консоль
            .start();
    }
}
</pre>
<p>То есть фактически наша программу будет запускать команду <code>"java Main.java"</code>. И поскольку мы установили в качестве рабочего каталога подпадку "test", то процесс сможет найти файл "Main.java". 
Запустим данную программу, и в отдельном подпроцессе будет выполняться команда <code>java Main.java</code>:</p>
<pre class="sh">
eugene@Eugene:/workspace/java$ java Program.java
Hello METANIT.COM
eugene@Eugene:/workspace/java$ 
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


<h2>Управление процессами</h2>
<p>Класс <span class="b">Process</span> предоставляет ряд методов для управления процессом:</p>

<ul>
<li><p><code>abstract InputStream getErrorStream()</code></p><p>Возвращает входной поток, подключенный к потоку ошибок процесса.</p></li>
<li><p><code>abstract InputStream getInputStream()</code></p><p>Возвращает поток ввода, подключенный к обычному выводу процесса.</p></li>
<li><p><code>abstract OutputStream getOutputStream()</code></p><p>Возвращает поток вывода, подключенный к обычному вводу процесса.</p></li>

<li><p><code>final BufferedReader errorReader()</code></p><p>Возвращает объект BufferedReader, подключенный к стандартному потоку ошибок процесса.</p></li>
<li><p><code>final BufferedReader inputReader()</code></p><p>Возвращает объект BufferedReader, подключенный к стандартному выводу процесса.</p></li>
<li><p><code>final BufferedWriter outputWriter()</code></p><p>Возвращает объект BufferedWriter, подключенный к обычному входу процесса, используя собственную кодировку.</p></li>

<li><p><code>Stream&lt;ProcessHandle&gt; children()</code></p><p>Возвращает поток прямых дочерних процессов процесса.</p></li>
<li><p><code>Stream&lt;ProcessHandle&gt; descendants()</code></p><p>Возвращает поток потомков процесса.</p></li>

<li><p><code>abstract void destroy()</code></p><p>Завершает процесс.</p></li>
<li><p><code>Process destroyForcibly()</code></p><p>Принудительно завершает процесс.</p></li>

<li><p><code>boolean isAlive()</code></p><p>Проверяет, активен ли запущенный процесс.</p></li>
<li><p><code>long pid()</code></p><p>Возвращает идентификатор запущенного процесса.</p></li>
<li><p><code>ProcessHandle toHandle()</code></p><p>Возвращает объект ProcessHandle для процесса.</p></li>

<li><p><code>CompletableFuture<Process> onExit()</code></p><p>Возвращает объект CompletableFuture<Process> для завершения процесса.</p></li>
<li><p><code>boolean supportsNormalTermination()</code></p><p>Возвращает true, если метод destroy() завершает процесс нормально. Возвращает false, если метод destroy завершает процесс принудительно и немедленно.</p></li>

<li><p><code>abstract int waitFor()</code></p><p>При необходимости заставляет текущий поток ожидать завершения запущенного процесса. Модификации метода позволяют передать период ожидания до завершения процесса</p>
<p><code>boolean waitFor(long timeout, TimeUnit unit)</code></p><p><code>boolean waitFor(Duration duration)</code></p>
</li>
</ul>
<h3>Получение потоков ввода-вывода процесса</h3>
<p>Ряд методов позволяют получить потоки ввода-вывода процесса:</p>

<ul>
<li><p><code>abstract InputStream getErrorStream()</code></p><p>Возвращает входной поток, подключенный к потоку ошибок процесса.</p></li>
<li><p><code>abstract InputStream getInputStream()</code></p><p>Возвращает поток ввода, подключенный к обычному выводу процесса.</p></li>
<li><p><code>abstract OutputStream getOutputStream()</code></p><p>Возвращает поток вывода, подключенный к обычному вводу процесса.</p></li>
<li><p><code>final BufferedReader errorReader()</code></p><p>Возвращает объект BufferedReader, подключенный к стандартному потоку ошибок процесса.</p></li>
<li><p><code>final BufferedReader inputReader()</code></p><p>Возвращает объект BufferedReader, подключенный к стандартному выводу процесса.</p></li>
<li><p><code>final BufferedWriter outputWriter()</code></p><p>Возвращает объект BufferedWriter, подключенный к обычному входу процесса, используя собственную кодировку.</p></li>
</ul>
<p>Конечно, мы можем в целом перенаправить поток вывода или ошибок в заданное место (например, в файл или на консоль). Однако потоки ввода-вывода позволяют вручную настроить взаимодействие с потоком. Например:</p>
<pre class="brush:java;">
import java.util.Scanner;

class Program{
 
    public static void main(String[] args) throws Exception{
          
        var builder = new ProcessBuilder("java", "--version");
        Process process = builder.start();
        try (var in = new Scanner(process.getInputStream()))
        {
            int i = 0;
            // проходим по каждой строке из потока
            while (in.hasNextLine()){
                // при выводе на консоль добавляем перед строкой ее номер
                System.out.println(++i + ". " + in.nextLine());
            }
        }
    }
}
</pre>
<p>В данном случае запускаем команду <code>"java --version"</code>, которая выводит версию Java. Но этот вывод может включать в себя несколько строк. И в данном случае мы вручную обрабатываем кажду строку из входного потока, 
добавляя к строке вначале ее номер. В итоге мы получим консольный вывод на подобие следующего:</p>
<pre class="sh">
1. java 25 2025-09-16 LTS
2. Java(TM) SE Runtime Environment (build 25+37-LTS-3491)
3. Java HotSpot(TM) 64-Bit Server VM (build 25+37-LTS-3491, mixed mode, sharing)
</pre>
<p>Аналогично можно было бы получить поток ввода с помощью другого метода:</p>
<pre class="brush:java;">
class Program{
 
    public static void main(String[] args) throws Exception{
          
        var builder = new ProcessBuilder("java", "--version");
        Process process = builder.start();
        try (var in = process.inputReader();)
        {
            int i = 0;
            String s;
            // считываем построчно
            while ((s = in.readLine())!=null){
                System.out.println(++i + ". " + s);
            }
        }
    }
}
</pre>
<p>Стоит отметить, что буферное пространство для потоков процессов ограничено. Поэтому не следует перегружать входные данные, а выходные следует считывать быстро.</p>
<h3>Завершение процесса</h3>
<h4>destroy и destroyForcibly</h4>
<p>Для завершения процесса применяются методы <b>destroy()</b> либо <b>destroyForcibly()</b>.</p>
<pre class="brush:java;">
process.destroy();
// или
process.destroyForcibly();
</pre>
<p>Разница между ними зависит от платформы. В UNIX-подобных системах (например, в Linux) метод destroy()
 завершает процесс с помощью сигнала <b>SIGTERM</b>, а <b>destroyForcibly()</b> - с помощью сигнала <b>SIGKILL</b>. (Метод <b>supportsNormalTermination()</b> возвращает <code>true</code>, 
если метод <b>destroy()</b> может завершить процесс нормально.)</p>
<p>Уничтожение процесса подает операционной системе сигнал о необходимости его завершения. Операционная система должна очистить и освободить ресурсы этого процесса.
 Обычно файловые дескрипторы и дескрипторы закрываются. При их закрытии все соединения с другими процессами разрываются.</p>

<h4>Ожидание завершения процесса и waitFor</h4>
<p>Чтобы дождаться завершения процесса, можно вызвать метод <code>waitFor()</code>:</p>
<pre class="brush:java;">int result = process.waitFor();</pre>
<p>Этот метод возвращает числовой код завершения процесса (по соглашению, 0 в случае успешного завершения или ненулевой код ошибки).</p>
<p>Однако этот метод неограничен по времени. Чтобы ограничить время ожидания, можно применить другую версию метода, которая принимает временной интервал:</p>
<pre class="brush:java;">
long delay = 10; // период ожидания
if (process.waitFor(delay, TimeUnit.SECONDS)){

    int result = process.exitValue();
}
else{

    process.destroyForcibly();
}
</pre>
<p>Здесь вызов <code>process.waitFor()</code> возвращает <code>true</code>, если время ожидания процесса не истекло. В этом случае с помощью метода <code>exitValue()</code> 
получаем статусный код завершения.</p>
<h4>Асинхронное уведомление о завершении процесса и onExit()</h4>
<p>С помощью метода <b>onExit()</b> можно получить асинхронное уведомление о завершении процесса. Этот метод возвращает объект <code>CompletableFuture&lt;Process&gt;</code>, 
который можно использовать для планирования любого действия по завершении процесса:</p>
<pre class="brush:java;">
class Program{
 
    public static void main(String[] args) throws Exception{
          
        var builder = new ProcessBuilder("java", "--version");
        Process process = builder.redirectOutput(ProcessBuilder.Redirect.INHERIT).start();
        process.onExit().thenAccept(p -&gt; System.out.println("Процесс завершился с кодом: " + p.exitValue()));
        Thread.sleep(500); // задержка, что успел отработать
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

	<div class="nav"><p><a href="./12.3.php">Назад</a><a href="./">Содержание</a><a href="./13.1.php">Вперед</a></p></div>
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
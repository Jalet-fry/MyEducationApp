<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Java | Поразрядные операции</title>
<meta charset="utf-8" />
<meta name="description" content="Поразрядные операции в языке программирования Java, поразрядное сложение и умножение, инверсия, сдвиг разрядов вправо и влево">
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
     <h2>Поразрядные операции</h2><div class="date">Последнее обновление: 16.09.2025</div>
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

	<p>Поразрядные операции выполняются над отдельными разрядами или битами чисел. В данных операциях в качестве операндов могут выступать только целые числа.</p>
<p>Каждое число имеет определенное двоичное представление. Например, число 4 в двоичной системе 100, а число 5 - 101 и так далее.</p>
<p>К примеру, возьмем следующие переменные:</p>
<pre class="brush:java;">
byte b = 7;		// 0000 0111
short s = 7;	// 0000 0000 0000 0111
</pre>
<p>Тип byte занимает 1 байт или 8 бит, соответственно представлен 8 разрядами. Поэтому значение переменной b в двоичном коде будет 
равно <code>00000111</code>. Тип short занимает в памяти 2 байта или 16 бит, поэтому число данного типа будет представлено 
16 разрядами. И в данном случае переменная s в двоичной системе будет иметь значение <code>0000 0000 0000 0111</code>.</p>
<p>Для упрощения понимания мы можем использовать двоичную запись чисел. Например:</p>
<pre class="brush:java;">
class Program{

    public static void main(String[] args) {  

        byte b = 0b0000_0111;               // 7
        short s = 0b0000_0000_0000_0111;	// 7
        System.out.println("byte b = " + b);        // byte b = 7
        System.out.println("short s = " + s);       // short s = 7
    }
}
</pre>
<p>Для записи чисел со знаком в Java применяется <span class="b">дополнительный код</span> (two's complement), при котором 
старший разряд является знаковым. Если его значение равно 0, то число положительное, и его двоичное представление не отличается 
от представления беззнакового числа. Например, 0000 0001 в десятичной системе 1.</p>
<img src="./pics/twoscomplement.png" alt="Двоичное представление чисел в Java" />
<p>Если старший разряд равен 1, то мы имеем дело с отрицательным числом. Например, 1111 1111 в десятичной системе представляет -1. 
Соответственно, 1111 0011 представляет -13.</p>
<p>Рассмотрим следующий пример:</p>
<pre class="brush:java;">
class Program{

    public static void main(String[] args) {  

        int num = 0b1111_1111_1111_1111_1111_1111_1111_1110;               // -2

        System.out.println("num = " + num);        // num = -2
    }
}
</pre>
<p>Здесь переменная num представляет значение <code>0b1111_1111_1111_1111_1111_1111_1111_1110</code> - все единицы, кроме последнего нуля (формальное первого нуля), что представляет -2. 
Но получим из него положительное число - 2. Сначала инвертируем число - 
все единицы сделаем нулями, а все нули - единицами:</p>
<pre class="brush:java;">
// ~ - операция инверсии
~ 0b1111_1111_1111_1111_1111_1111_1111_1110
= 
  0b0000_0000_0000_0000_0000_0000_0000_0001
</pre>
<p>И далее прибавляем 1:</p>
<pre class="brush:java;">
0b0000_0000_0000_0000_0000_0000_0000_0001
+                                       
                                        1
=
0b0000_0000_0000_0000_0000_0000_0000_0010
</pre>
<p>Число 10<sub>2</sub> в десятичной системе равно 2.</p>
<h3>Логические операции</h3>
<p>Логические операции над числами представляют поразрядные операции. В данном случае числа рассматриваются в двоичном представлении, например, 2 в двоичной системе 
равно 10 и имеет два разряда, число 7 - 111 и имеет три разряда.</p>
<ul>
<li><p><code>&amp; (логическое умножение)</code></p><p>Умножение производится поразрядно, и если у обоих операндов значения разрядов равно 1, 
то операция возвращает 1, иначе возвращается число 0. Например:</p>
<pre class="brush:java;">
 int a1 = 2; //010
 int b1 = 5;//101
 System.out.println(a1&amp;b1); // результат 0
            
int a2 = 4; //100
int b2 = 5; //101
System.out.println(a2 &amp; b2); // результат 4
</pre>
<p>В первом случае у нас два числа 2 и 5. 2 в двоичном виде представляет число 010, а 5 - 101. Поразрядное умножение чисел (0*1, 1*0, 0*1) дает результат 000.</p>
<p>Во втором случае у нас вместо двойки число 4, у которого в первом разряде 1, так же как и у числа 5, поэтому здесь результатом операции 
(1*1, 0*0, 0 *1) = 100 будет число 4 в десятичном формате.</p></li>
<li><p><code>|</code> (логическое сложение)</p><p>Данная операция также производится по двоичным разрядам, но теперь возвращается единица, 
если хотя бы у одного числа в данном разряде имеется единица (операция "логическое ИЛИ"). Например:</p>
<pre class="brush:java;">
int a1 = 2; //010
int b1 = 5;//101
System.out.println(a1|b1); // результат 7 - 111
int a2 = 4; //100
int b2 = 5;//101
System.out.println(a2 | b2); // результат 5 - 101
</pre></li>
<li><p><code>^</code> (логическое исключающее ИЛИ)</p><p>Также эту операцию называют XOR, нередко ее применяют для простого шифрования:</p>
<pre class="brush:java;">
int number = 45; // 1001 Значение, которое надо зашифровать - в двоичной форме 101101
int key = 102; //Ключ шифрования - в двоичной системе 1100110
int encrypt = number ^ key; //Результатом будет число 1001011 или 75
System.out.println("Зашифрованное число: " +encrypt);

int decrypt = encrypt ^ key; // Результатом будет исходное число 45
System.out.println("Расшифрованное число: " + decrypt);
</pre>
<p>Здесь также производятся поразрядные операции. Если у нас значения текущего разряда у обоих чисел разные, то возвращается 1, иначе возвращается 0. 
Например, результатом выражения 9^5 будет число 12. А чтобы расшифровать число, мы применяем обратную операцию к результату.</p></li>
<li><p><code>~</code> (логическое отрицание или инверсия)</p><p>Поразрядная операция, которая инвертирует все разряды числа: если значение разряда равно 1, 
то оно становится равным нулю, и наоборот.</p>
<pre class="brush:java;">
byte a = 12;                 // 0000 1100     
System.out.println(~a);		//  1111 0011   или -13
</pre></li>
</ul>
<h3>Операции сдвига</h3>
<p>Операции сдвига также производятся над разрядами чисел. Сдвиг может происходить вправо и влево.</p>
<ul>
<li><p><code>a&lt;&lt;b</code> - сдвигает число a влево на b разрядов. Например, выражение <code>4&lt;&lt;1</code> сдвигает число 4 (которое в двоичном 
представлении 100) на один разряд влево, в результате получается число 1000 или число 8 в десятичном представлении.</p></li>
<li><p><code>a&gt;&gt;b</code> - смещает число a вправо на b разрядов. Например, <code>16&gt;&gt;1</code> сдвигает число 16 
(которое в двоичной системе 10000) на один разряд вправо, то есть в итоге получается 1000 или число 8 в десятичном представлении.</p></li>
<li><p><code>a&gt;&gt;&gt;b</code> - в отличие от предыдущих типов сдвигов данная операция представляет беззнаковый сдвиг - сдвигает число a вправо на b разрядов. 
Например, выражение <code>-8&gt;&gt;&gt;2</code> будет равно 1073741822.</p></li>
</ul>
<p>Таким образом, если исходное число, которое надо сдвинуть в ту или другую сторону, делится на два, то фактически получается умножение или деление на два. 
Поэтому подобную операцию можно использовать вместо непосредственного умножения или деления на два, так как операция сдвига на аппаратном уровне менее дорогостоящая операция 
в отличие от операции деления или умножения.</p>
<p>Таким образом, если исходное число, которое надо сдвинуть в ту или другую строну, делится на два, то фактически получается умножение или деление на два. 
Поэтому подобную операцию можно использовать вместо непосредственного умножения или деления на два. Например:</p>
<pre class="brush:java;">
class Program{

    public static void main(String[] args) {  

        int a = 16; // в двоичной форме 10000
        int b = 2; // в двоичной форме 00010
        int c = a &lt;&lt; b; // Сдвиг числа 10000 влево на 2 разряда, равно 1000000 или 64 в десятичной системе
        
        System.out.println("с: " + c);    // 64
        
        int d = a &gt;&gt; b; // Сдвиг числа 10000 вправо на 2 разряда, равно 100 или 4 в десятичной системе
        System.out.println("d: " + d);     // 4
    }
}
</pre>
<p>При этом числа, которые участвую в операциях, необязательно должны быть кратны 2:</p>
<pre class="brush:java;">
class Program{

    public static void main(String[] args) {  

        int a = 22; // в двоичной форме 10110
        int b = 2; // в двоичной форме
        int c = a &lt;&lt; b; // Сдвиг числа 10110 влево на 2 разряда, равно 1011000 или 88 в десятичной системе

        System.out.println("с: " + c);    // 88

        int d = a &gt;&gt; b; // Сдвиг числа 10110 вправо на 2 разряда, равно 101 или 5 в десятичной системе
        System.out.println("d: " + d);     // 5
    }
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


<h3>Пример практического применения операций</h3>
<p>Многие недооценивают поразрядные операции, не понимают, для чего они нужны. Тем не менее они могут помочь в решении ряда задач. Прежде всего они позволяют нам манипулировать 
данными на уровне отдельных битов. Один из примеров. У нас есть три числа, которые находятся в диапазоне от 0 до 3:</p>
<pre class="brush:java;">
int value1 = 3;  // 0b0000_0011
int value2 = 2;  // 0b0000_0010
int value3 = 1;  // 0b0000_0001
</pre>
<p>Мы знаем, что значения этих чисел не будут больше 3, и нам нужно эти данные максимально сжать. Мы можем три числа сохранить в одно число. И в этом нам помогут поразрядные операции.</p>
<pre class="brush:java;">
class Program{

    public static void main(String[] args) {  

        int value1 = 3;  // 0b0000_0011
        int value2 = 2;  // 0b0000_0010
        int value3 = 1;  // 0b0000_0001
        int result = 0b0000_0000;
        // сохраняем в result значения из value1
        result = result | value1; // 0b0000_0011
        // сдвигаем разряды в result на 2 разряда влево
        result = result &lt;&lt; 2;   // 0b0000_1100
        // сохраняем в result значения из value2
        result = result | value2;  // 0b0000_1110
        // сдвигаем разряды в result на 2 разряда влево
        result = result &lt;&lt; 2;   // 0b0011_1000
        // сохраняем в result значения из value3
        result = result | value3;  // 0b0011_1001

        System.out.println(result);  // 57
    }
}
</pre>
<p>Разберем этот код. Сначала определяем все сохраняемые числа value1, value2, value3. Для хранения результата определена переменная result, которая по умолчанию равна 0. Для большей наглядности 
ей присвоено значение в бинарном формате:</p>
<pre class="brush:java;">int result = 0b0000_0000;</pre>
<p>Сохраняем первое число в result:</p>
<pre class="brush:java;">
result = result | value1; // 0b0000_0011
</pre>
<p>Здесь мы имеем дело с логической операцией поразрядного сложения - если один из соответствующих разрядов равен 1, то результирующий разряд тоже будет равен 1. То есть фактически</p>
<pre class="brush:java;">
0b0000_0000
+
0b0000_0011
=
0b0000_0011
</pre>
<p>Итак, первое число сохранили в result. Мы будем сохранять числа по порядку. То есть сначала в result будет идти первое число, затем второе и далее третье. Поэтому сдвигаем число result на два разряда влево (наши числа занимают в памяти не более двух разрядов):</p>
<pre class="brush:java;">
result = result &lt;&lt; 2;   // 0b0000_1100
</pre>
<p>То есть фактически</p>
<pre class="brush:java;">
0b0000_0011 &lt;&lt; 2 =
0b0000_1100
</pre>
<p>Далее повторяем логическую операцию сложения, сохраняем второе число:</p>
<pre class="brush:java;">result = result | value2;  // 0b0000_1110</pre>
<p>что эквивалентно</p>
<pre class="brush:java;">
0b0000_1100
+
0b0000_0010
=
0b0000_1110
</pre>
<p>Далее повторяем сдвиг на два разряда влево и сохраняем третье число. В итоге мы получим в двоичном представлении число <code>0b0011_1001</code>. В десятично системе это число равно 57. 
Но это не имеет значения, потому что нам важны конкретные биты числа. Стоит отметить, что мы сохранили в одно число три числа, и в переменной result еще есть сводобное место. 
Причем в реальности не важно, сколько именно битов надо сохранить. В данном случае для примера сохраняем лишь два бита.</p>
<p>Для восстановления данных прибегнем к обратному порядку:</p>
<pre class="brush:java;">
class Program{

    public static void main(String[] args) {  

        int result = 0b0011_1001;
        // обратное получение данных
        int newValue3 = result & 0b000_0011;
        // сдвигаем данные на 2 разряда вправо
        result = result &gt;&gt; 2;
        int newValue2 = result & 0b000_0011;
        // сдвигаем данные на 2 разряда вправо
        result = result &gt;&gt; 2;
        int newValue1 = result & 0b000_0011;
        System.out.println(newValue1);    // 3
        System.out.println(newValue2);   // 2
        System.out.println(newValue3);   // 1
    }
}
</pre>
<p>Получаем числа в порядке, обратном тому, в котором они были сохранены. Поскольку мы знаем, что каждое сохраненное число занимает лишь два разряда, то по сути нам надо получить 
лишь последние два бита. Для этого применяем битовую маску <code>0b000_0011</code> и операцию логического умножения, которая возвращает 1, если каждый из двух соответствующих разрядов равен 1. 
То есть операция </p>
<pre class="brush:java;">int newValue3 = result & 0b000_0011;</pre>
<p>эквивалентна</p>
<pre class="brush:java;">
0b0011_1001
*
0b0000_0011
=
0b0000_0001
</pre>
<p>Таким образом, последнее число равно 0b0000_0001 или 1 в десятичной системе</p>
<p>Стоит отметить, что если мы точно знаем структуру данных, то мы легко можем составить битовую маску, чтобы получить нужно число:</p>
<pre class="brush:java;">
result = 0b0011_1001;
int recreatedValue1 = (result & 0b0011_0000) &gt;&gt; 4;
System.out.println(recreatedValue1);
</pre>
<p>Здесь получаем первое число, которое, как мы знаем, занимает в числе биты 4 и 5. Для этого применяем умножение на битовую маску 0b0011_0000. И затем сдвигаем число на 4 разряда вправо.</p>
<pre class="brush:java;">
0b0011_1001
*
0b0011_0000
=
0b0011_0000
&gt;&gt; 4
=
0b0000_0011
</pre>
<p>Аналогично, если мы точно знаем структуру, по которой сохраняются данные, то мы могли бы сохранить данные сразу в нужное место в числе result:</p>
<pre class="brush:java;">
class Program{

    public static void main(String[] args) {  

        int value1 = 3;  // 0b0000_0011
        int value2 = 2;  // 0b0000_0010
        int value3 = 1;  // 0b0000_0001
        int result = 0b0000_0000;
        // сохраняем в result значения из value1
        result = result | (value1 &lt;&lt; 4);
        // сохраняем в result значения из value2
        result = result | (value2 &lt;&lt; 2);
        // сохраняем в result значения из value3
        result = result | value3;  // 0b0011_1001

        System.out.println(result);  // 57
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

	<div class="nav"><p><a href="./2.3.php">Назад</a><a href="./">Содержание</a><a href="./2.14.php">Вперед</a></p></div>
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
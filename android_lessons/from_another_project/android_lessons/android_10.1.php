<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Kotlin и Android | Введение в корутины</title>
<meta charset="utf-8" />
<meta name="description" content="Корутины и асинхронность в Jetpack Compose на языке программирования Kotlin в Android, область корутины coroutineScope и функция rememberCoroutineScope, изменение состояния компонентов в корутинах">
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
     <h1>Корутины и асинхронность</h1><h2>Введение в корутины</h2><div class="date">Последнее обновление: 08.04.2024</div>
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

	
<p>При первом запуске приложения Android среда выполнения создает один поток, в котором по умолчанию будут выполняться все компоненты приложения. Этот поток обычно называют основным потоком. 
Основная роль основного потока — обработка пользовательского интерфейса, его событий и взаимодействие с элементами интерфейса. Любые дополнительные компоненты, запускаемые в приложении, 
по умолчанию также будут выполняться в основном потоке.</p>
<p>Любой код внутри приложения, который выполняет какую-нибудь трудоемкую задачу с использованием основного потока, приведет к тому, что все приложение заблокируется до тех пор, пока задача не 
будет завершена. То есть грубо говоря приложение зависает. Это далеко нелучшая ситуация, которая отрицательно влияет на впечателение пользователя от взаимодействия с приложением. 
И чтобы избавиться от подобных ситуаций мы можем использовать в приложении <b>корутины</b>. Более подробно про корутины можно посмотреть на этом же сайте metanit.com в основном руководстве по языку Kotlin в главе 
<a href="https://metanit.com/kotlin/tutorial/8.1.php" rel="nofollow">Корутины</a>. В данной же статье мы вкратце затронем все основные моменты, связанные с корутинами.</p>
<p><b>Корутины</b> представляют блоки кода, которые выполняются асинхронно и не блокируют поток, из которого они запускаются. Корутины не эквивалентны потокам, хотя и используют их. 
Проблема с потоками заключается в том, что они представляют собой ограниченный ресурс и являются дорогостоящими с точки зрения возможностей процессора и накладных расходов системы. 
В фоновом режиме выполняется большой объем работы по созданию, планированию и уничтожению потока. Хотя современные процессоры могут выполнять большое количество потоков, 
фактическое количество потоков, которые могут выполняться параллельно в любой момент времени, ограничено количеством ядер процессора (хотя новые процессоры имеют 8 или более ядер, 
большинство устройств Android содержат процессоры с 4 ядрами). А когда требуется больше потоков, чем имеется ядер в процессоре, система должна выполнить планирование потоков, 
чтобы решить, как выполнение этих потоков будет распределяться между доступными ядрами.</p>
<p>Чтобы избежать подобных накладных расходов, вместо того, чтобы запускать новый поток для каждой 
корутины и затем уничтожать его при выходе из корутины, Kotlin поддерживает пул активных потоков и управляет тем, как корутины назначаются этим потокам. 
Когда активная корутина приостанавливается, она сохраняется средой выполнения Kotlin, и вместо нее начинает работу другая корутина. Когда корутина возобновляет свою работу, она просто 
восстанавливается в существующем незанятом потоке из пула и продолжает выполнение до тех пор, пока не завершится или не будет приостановлена. 
При таком подходе ограниченное количество потоков эффективно используется для выполнения асинхронных задач с возможностью выполнения большого количества одновременных задач без 
ухудшения производительности, которое могло бы произойти при использовании стандартной многопоточности.</p>
<p>Все корутины должны выполняться в определенной области (<b>scope</b>), что позволяет управлять ими как группами, а не как отдельными корутинами. Назначив для некоторой 
области группу корутин, эту группу можно массово отменить, когда ее корутины больше не нужны.</p>
<p>Kotlin и Android предоставляют некоторые встроенные области корутин (scope), а также возможность создавать собственные области корутин с помощью класса <b>CoroutineScope</b>. 
Основные встроенные области корутин:</p>
<ul>
<li><p><span class="b">GlobalScope</span>: используется для запуска корутин верхнего уровня, которые привязаны ко всему жизненному циклу приложения. 
Поскольку корутины в этой области могут продолжать работать, когда в этом нет необходимости (например, когда объект Activity завершает свою работу), 
использование этой области не рекомендуется для использования в приложениях Android.</p></li>
<li><p><span class="b">ViewModelScope</span>: применяется при использовании компонента ViewModel архитектуры Jetpack. Корутины, запущенные в этой области из объекта ViewModel, 
автоматически завершаются системой при уничтожении соответствующего объекта ViewModel.</p></li>
<li><p><span class="b">LifecycleScope</span>: создается для каждого компонента с жизненным циклом и удаляется, когда  уничтожается соответствующий компонент.</p></li>
</ul>
<p>Самый простой способ определить область действия корутин внутри компонента состоит в вызове функции <span class="b">rememberCoroutineScope()</span></p>
<pre class="brush:kt;">val coroutineScope = rememberCoroutineScope()</pre>
<p>Объект coroutineScope определяет область действия корутин. Он объявляет диспетчер, который будет использоваться для запуска корутин, а также применяется для включения корутин в область видимости. Все запущенные в этой 
области корутины можно завершить с помощью вызова метода <code>cancel()</code>:</p>
<pre class="brush:kt;">coroutineScope.cancel()</pre>
<p>Для определения корутин применяется особый тип функций Kotlin - suspend-функции. Подобные функции объявляются с помощью ключевого слова <span class="b">suspend</span>, которое указывает 
Kotlin, что функцию можно приостановить и возобновить позже, что позволяет выполнять длительные вычисления без блокировки основного потока. Например:</p>
<pre class="brush:kt;">
suspend fun doWork() {

     // Здесь выполняем длительную задачу

}
</pre>
<h3>Диспетчеры корутин</h3>
<p>Диспетчер отвечает за назначение корутин определенным потокам, а также за приостановку и возобновление работы корутины в течение ее жизненного цикла. Kotlin поддерживает потоки для различных типов асинхронной активности, и при запуске корутины можно указать конкретного диспетчера из следующих вариантов:</p>
<ul>
<li><p><span class="b">Dispatchers.Main</span>: запускает корутину в основном потоке и подходит для корутин, которым надо взаимодействовать с пользовательским интерфейсом, а 
также в качестве универсального варианта для выполнения легких задач.</p></li>
<li><p><span class="b">Dispatchers.IO</span>: рекомендуется для корутин, которые выполняют операции ввода-вывода - операции с сетью, диском или базой данных.</p></li>
<li><p><span class="b">Dispatchers.Default</span>: предназначен для задач, которые требуют интенсивного использования процессора, таких как сортировка данных или выполнение сложных вычислений.</p></li>
</ul>
<p>Например, следующий код запускает корутину с помощью диспетчера ввода-вывода:</p>
<pre class="brush:kt;">
coroutineScope.launch(Dispatchers.IO) {

    // выполнение операций с сетью, базой данных или файлами

}
</pre>
<h3>Строители корутин</h3>
<p>Строители корутин (coroutine builders) создают и запускают корутины. Kotlin предоставляет следующие типы строителей корутин:</p>
<ul>
<li><p><span class="b">launch</span>: запускает корутину, не блокируя текущий поток, и не возвращает результат вызывающей стороне. Вызывается из suspend-функции и применяется когда не требуются результаты корутины</p></li>
<li><p><span class="b">async</span>: запускает корутину и позволяет вызывающей стороне дождаться результата с помощью функции <code>await()</code>, не блокируя текущий поток. 
Применяется для параллельного запуска нескольких корутин. Вызывается только из другой suspend-функции.</p></li>
<li><p><span class="b">withContext</span>: позволяет запускать корутину в контексте, отличном от того, который используется родительской корутиной</p></li>
<li><p><span class="b">coroutineScope</span>: подходит для ситуаций, когда suspend-функция запускает несколько корутин, которые будут выполняться параллельно, и когда некоторые действия 
должны выполняться только тогда, когда все корутины завершаются. Если эти корутины запускаются с помощью построителя coroutineScope, вызывающая функция не завершится до тех пор, 
пока не завершатся все дочерние корутины. При использовании coroutineScope сбой в любой из корутин приведет к отмене всех остальных корутин.</p></li>
<li><p><span class="b">supervisorScope</span>: аналогичен coroutineScope за исключением того, что сбой в одном дочернем элементе не приводит к отмене других корутин.</p></li>
<li><p><span class="b">runBlocking</span>: запускает корутину и блокирует текущий поток до тех пор, пока корутина не завершится. Обычно это противоположно тому, что требуется от корутин, но полезно для тестирования кода и интеграции устаревшего кода и библиотек.</p></li>
</ul>

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

<h3>Job</h3>
<p>Каждый вызов построителя корутин возвращает объект <span class="b">Job</span>, который можно использовать для отслеживания и управления жизненным циклом соответствующей корутины. 
Последующие вызовы построителя корутины из уже запущенной корутины создают новые объекты <code>Job</code>, которые станут дочерними элементами родительского объекта <code>Job</code>, 
образуя дерево отношений родитель-потомок. А отмена родительского объекта <code>Job</code> рекурсивно отменит все его дочерние элементы <code>Job</code>. 
Однако отмена дочернего элемента не отменяет родителя.</p>
<p>Тип <span class="b">Job</span> обладает рдядом полезных свойств и методов. Свойства <code>isActive</code>, <code>isCompleted</code> и <code>isCancelled</code> связанного объекта Job позволяют 
определить статус корутины. Метод <code>cancel()</code> завершает объект Job и все дочерние корутины, а вызов метода <code>cancelChildren()</code> завершит только все дочерние корутины. 
Метод join() можно вызвать для приостановки корутины до тех пор, пока не будут выполнены все дочерние объекты <code>Job</code>. Чтобы выполнить объект Job и завершить его после 
всех дочерних заданий, вызывается метод <code>cancelAndJoin()</code>.</p>
<h3>Вызов корутин к Compose</h3>
<p>Рассмотрим пример применения корутин:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.Button
import androidx.compose.material3.Text
import androidx.compose.ui.unit.sp
import androidx.compose.ui.Modifier
import androidx.compose.ui.unit.dp
import androidx.compose.runtime.rememberCoroutineScope
import kotlinx.coroutines.delay
import kotlinx.coroutines.launch

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent{
            val coroutineScope = rememberCoroutineScope()
            Column(Modifier.padding(5.dp).fillMaxSize()) {
                Button(onClick = {
                    coroutineScope.launch {
                        doWork()
                    }
                }) {
                    Text("Click", fontSize = 28.sp)
                }
            }
        }
    }
}
suspend fun doWork() {
    println("doWork starts")
    delay(5000) // симулируем долгую работу с помощью задержки в 5 секунд
    println("doWork ends")
}
</pre>
<p>Здесь определена suspend-функция doWork, которая просто выводит на консоль пару сообщений. Для симуляции долговременной работы в ней вызывается функция 
<code>delay()</code>, которая устанавливает задержку в 5 секунд. Но в реальности это могло бы быть обращение к локальным файлам, к базе данных, сетевые запросы или какие-нибудь долговременные вычисления.</p>
<p>Для вызова этой функции создается область корутины:</p>
<pre class="brush:kt;">val coroutineScope = rememberCoroutineScope()</pre>
<p>В компоненте Button определяем код обработчика нажатия - в нем запускается корутина:</p>
<pre class="brush:kt;">
Button(onClick = {
    coroutineScope.launch {
        doWork()
    }
})
</pre>
<p>Для создания корутины здесь применяется построитель <code>coroutineScope.launch</code>, и в области корутины вызывается функция doWork.</p>
<p>Запустим приложение и нажмем на кнопку, и в окне <span class="b">Logcat</span> внизу Android Studio мы сможем увидеть сообщения из функции doWork:</p>
<img src="./pics/10.1.png" alt="Корутины и асинхронность в Jetpack Compose и Kotlin на Android" />
<p>Аналогичным образом можно обращаться из корутин к состоянию компонентов и таким образом воздействовать на компоненты:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.Button
import androidx.compose.material3.Text
import androidx.compose.ui.unit.sp
import androidx.compose.ui.Modifier
import androidx.compose.ui.unit.dp
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.rememberCoroutineScope
import kotlinx.coroutines.delay
import kotlinx.coroutines.launch

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent{
            val coroutineScope = rememberCoroutineScope()
            val enabled = remember{mutableStateOf(true)}
            val count = remember{mutableStateOf(0)}
            Column(Modifier.padding(5.dp).fillMaxSize()) {
                Text("Count: ${count.value}", Modifier.padding(start = 4.dp), fontSize = 28.sp)
                Button(onClick = {
                    coroutineScope.launch {
                        enabled.value = false
                        for(n in 1..5){
                            count.value = n
                            delay(1000)
                        }
                        enabled.value = true
                    }
                }, enabled = enabled.value) {
                    Text("Start", fontSize = 28.sp)
                }
            }
        }
    }
}
</pre>
<p>Здесь при нажати на кнопку корутина изменяет значения переменных состояния enabled и count. В данном случае при нажатии на кнопку делаем кнопку недоступной для нажатия, покак не завершит работу корутина. 
Для этого переключаем значение переменной enabled, которая привязана к одноименному параметру кнопки Button. В корутине в цикле увеличиваем значение count до 5 и затем завершаем корутину, делая кнопку внось активной. 
А для вывода текущего значения count определен компонент Text.</p>
<img src="./pics/10.2.png" alt="Корутины и пользовательский интерфейс в Jetpack Compose и Kotlin на Android" />

	

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

	<div class="nav"><p><a href="./9.6.php">Назад</a><a href="./">Содержание</a><a href="./10.2.php">Вперед</a></p></div>
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
<li class="closed"><span class="folder">Глава 1. Введение в jetpack</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.1.php">Что такое Jetpack Compose</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.4.php">Установка Android Studio</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.2.php">Первый проект на Jetpack Compose</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.3.php">Создание визуального интерфейса</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.5.php">Создание компонентов Composable</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/5.1.php">Взаимодействие с кодом Kotlin</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.6.php">Gradle</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.7.php">Добавление зависимостей</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/1.8.php">Файл манифеста AndroidManifest.xml</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 2. Модификаторы и визуальный интерфейс</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.1.php">Что такое модификаторы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.2.php">Установка цвета</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.3.php">Установка размеров</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.4.php">Установка отступов и смещения</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.5.php">Создание прокрутки</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.7.php">Создание границы. Модификатор border</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.8.php">Модификатор clip. Создание фрагмента компонента</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.9.php">Создание тени и модификатор shadow</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.6.php">Обработка нажатий</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/3.10.php">Переопределение и объединение модификаторов</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 3. Контейнеры компоновки</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.1.php">Box</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.2.php">Column</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.3.php">Row</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.4.php">Композиции контейнеров</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.5.php">Surface</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.6.php">Списки LazyColumn и LazyRow</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.7.php">Грид</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.12.php">LazyVerticalStaggeredGrid и LazyHorizontalStaggeredGrid</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.8.php">FlowRow и FlowColumn</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.9.php">IntrinsicSize</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.10.php">Программная прокрутка</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.11.php">Прикрепленные заголовки</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.13.php">Модификатор aspectRatio</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/2.14.php">Интерфейс Edge-to-edge, enableEdgeToEdge и WindowInsets</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 4. Состояние компонентов</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/5.2.php">Введение в состояние компонентов</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/5.3.php">Однонаправленный поток данных</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/5.4.php">CompositionLocal</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/5.5.php">Производное состояние</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 5. Визуальные компоненты</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.1.php">Text</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.19.php">Аннотированные строки</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.2.php">Кнопка Button</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.3.php">Ввод текста, TextField и OutlinedTextField</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.7.php">Модификатор Modifier.toggleable</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.4.php">Checkbox</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.6.php">Выбираемый компонент и модификатор selectable</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.5.php">RadioButton</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.8.php">Иконки и компоненты IconButton и IconToggleButton</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.9.php">FloatingActionButton и ExtendedFloatingActionButton</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.10.php">Панели приложения TopAppBar и BottomAppBar</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.11.php">Scaffold</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.12.php">Всплывающие сообщения и Snackbar</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.13.php">Выдвижная панель ModalNavigationDrawer</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.14.php">Slider</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.15.php">Переключатель Switch</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.16.php">Диалоговые окна AlertDialog</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.17.php">Меню DropdownMenu</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.18.php">Индикаторы прогресса</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/4.20.php">AndroidView</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 6. Ресурсы в Jetpack Compose</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/7.1.php">Ресурсы строк</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/7.2.php">Ресурсы dimension</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/7.3.php">Ресурсы Color</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 7. Работа с изображениями</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/6.1.php">Компонент Image</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/6.2.php">Ресурсы изображений и ImageBitmap</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/6.3.php">Векторная графика и ImageVector</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 8. Кастомные контейнеры компоновки</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/8.1.php">Создание модификаторов компоновки</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/8.2.php">Создание контейнеров компоновки</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 9. ConstraintLayout</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/9.1.php">Подключение ConstraintLayout</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/9.2.php">Установка ограничений в ConstraintLayout</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/9.3.php">Создание цепочек компонентов</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/9.4.php">Направляющие линии guildeline</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/9.5.php">Барьеры</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/9.6.php">Наборы ограничений ConstraintSet</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 10. Корутины и асинхронность</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/10.1.php">Введение в корутины</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/10.2.php">LaunchedEffect</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/10.3.php">Потоки Flow</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/10.4.php">StateFlow</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/10.5.php">SharedState</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 11. Пагинация</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/12.1.php">Введение в пагинацию</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/12.2.php">Пример пагинации. Навигационные кнопки</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 12. Анимация</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.1.php">Анимация Dp. animateDpAsState</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.2.php">Функция tween. Время и сглаживание анимации</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.3.php">Функция repeatable и повторение анимации</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.4.php">Функция spring и эффект отскока</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.5.php">Функция keyframes и анимация по ключевым кадрам</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.6.php">Анимация цвета. animateColorAsState</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.7.php">Анимация числовых значений и animateFloatAsState</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.8.php">Объединение анимаций</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.9.php">AnimatedVisibility. Управление видимостью компонента</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.10.php">Настройка анимации в AnimatedVisibility</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.11.php">Модификатор animateEnterExit()</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/13.12.php">Crossfade</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 13. Рисование. Canvas</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.1.php">Компонент Canvas и DrawScope</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.2.php">Отрисовка линий</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.3.php">Отрисовка прямоугольников</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.4.php">Отрисовка кругов и овалов</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.5.php">Отрисовка дуги</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.6.php">Рисование геометрических путей</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.7.php">Отрисовка точек</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.8.php">Вывод текста</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.9.php">Отрисовка изображений</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.10.php">Трансформации</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/14.11.php">Создание градиента</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 14. ViewModel</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/15.1.php">Хранение состояния во ViewModel и взаимодействие с интерфейсом</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/15.2.php">LiveData</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/15.3.php">Пример приложения с VieModel</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/15.4.php">AndroidViewModel</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 15. Работа с базой данных</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/16.1.php">SQLite и Room</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/16.2.php">Основные элементы Room</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/16.3.php">Пример работы с SQLite и Room</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 16. Навигация</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/17.1.php">Введение в навигацию</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/17.2.php">Пример навигации</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/17.3.php">Параметры навигации</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/17.4.php">Панель навигации</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 17. Обработка жестов</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/18.1.php">Жесты нажатия</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/18.2.php">Петаскивание</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/18.3.php">Перетаскивание с помощью PointerInputScope</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/18.4.php">Перетаскивание по опорным точкам</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/18.5.php">Прокрутка</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/18.6.php">Масштабирование, вращение и перемещение</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 18. Activity</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/19.1.php">Activity и жизненный цикл приложения</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/19.2.php">Управление жизненным циклом Activity в компонентах Compose</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/19.3.php">Введение в Intent. Запуск Activity</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/19.4.php">Передача данных между Activity</a></span></li>
	</ul>
</li>
<li class="closed"><span class="folder">Глава 19. Дополнительные статьи</span>
	<ul>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/11.1.php">Кнопка прокрутки</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/11.2.php">Темы. Material Design</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/11.3.php">Биометрическая аутентификация</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/11.4.php">Настройки SharedPreferences</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/11.5.php">Сетевые запросы</a></span></li>
		<li><span class="file"><a href="//metanit.com/kotlin/jetpack/11.6.php">Локализация приложений</a></span></li>
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
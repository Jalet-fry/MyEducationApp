<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Kotlin и Android | Управление жизненным циклом Activity в компонентах Compose</title>
<meta charset="utf-8" />
<meta name="description" content="Жизненный цикл Activity и его влияние на компоненты Compose на Jetpack Compose на языке программирования Kotlin в Android, роль метода setContent, LifecycleOwner, LocallifeCycleowner, LaunchedEffect и DisposableEffect">
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
     <h1>Управление жизненным циклом Activity в компонентах Compose</h1><div class="date">Последнее обновление: 30.05.2025</div>
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

	
<p>Жизненный цикл <code>Activity</code> напрямую влияет на то, как ведут себя ваши Composable-функции, как они управляют своим состоянием и когда они входят или выходят из композиции. 
Рассмотрим, как жизненный цикл Activity влияет на состояние и перерисовку Composable-функций:</p>
<ul>
<li><p><span class="b">Композиция и рекомпозиция</span>: Composable-функции входят в композицию ("рисуются" на экране), когда <code>Activity</code> достигает состояния, в котором интерфейс должен быть виден (обычно после <code>onCreate</code> и <code>onStart</code>, когда <code>setContent</code> был вызван). 
Рекомпозиция (перерисовка) Composable-функций происходит в ответ на изменение их состояния (<code>State&lt;T&gt;</code>). Жизненный цикл <code>Activity</code> сам по себе не вызывает 
рекомпозицию без изменения состояния, но события жизненного цикла могут вызывать изменения состояния, которые, в свою очередь, приведут к рекомпозиции.</p></li>
<li><p><span class="b">Сохранение состояния</span> при пересоздании <code>Activity</code>:</p>
<ul>
<li><p>При изменениях конфигурации (например, поворот экрана) <code>Activity</code> по умолчанию уничтожается и создается заново. Если состояние Composable-функций не сохранено должным образом, 
оно будет потеряно.</p></li>
<li><p><code>remember</code>: Сохраняет состояние во время рекомпозиции, но не переживает пересоздание <code>Activity</code>.</p></li>
<li><p><code>rememberSaveable</code>: Сохраняет состояние не только во время рекомпозиции, но и при пересоздании <code>Activity</code> (и даже при "смерти" процесса). Функция 
использует механизм <code>SavedStateHandle</code>, аналогичный тому, что используется для <code>ViewModel</code>.</p></li>
<li><p><code>ViewModel</code>: Является предпочтительным способом хранения состояния интерфейса, так как <code>ViewModel</code> переживает изменения конфигурации <code>Activity</code>. 
Composable-функции могут наблюдать за состоянием в <code>ViewModel</code> и обновляться соответствующим образом.</p></li>
</ul>
</li>
<li><p><span class="b">Эффекты и ресурсы</span>: Ресурсы, такие как слушатели, анимации или подписки, управляемые из Composable-функций, должны корректно обрабатываться в соответствии с 
жизненным циклом. Например, слушатель геолокации должен быть зарегистрирован, когда интерфейс виден и активен, и отменен, когда интерфейс уходит с экрана, чтобы избежать утечек ресурсов и лишнего расхода батареи.</p></li>
</ul>


<p>Связь композиции компонентов Composable и жизненного цикла Activity выглядит следующим образом:</p>
<ul>
<li><p><span class="b">Вход в композицию</span>: Composable-функция входит в композицию, когда она вызывается в рамках другой Composable-функции, которая уже является частью композиции, начиная с корневого вызова в <code>setContent { }</code>. 
Обычно это происходит, когда <code>Activity</code> становится видимой (<code>onStart</code>/<code>onResume</code>).</p></li>
<li><p><span class="b">Выход из композиции</span>: Composable-функция выходит из композиции, когда:</p>
<ol>
<li><p><span class="b">Условное отображение</span>: Если Composable-функция отображается на основе условия (например, <code>if (shouldShow) { MyComposable() }</code>), и это условие становится 
<code>false</code>, то <code>MyComposable</code> удаляется из дерева композиции.</p></li>
<li><p><span class="b">Навигация (в Navigation Compose)</span>: При переходе на другой экран текущий экран (или его часть) может быть удален из композиции.</p></li>
<li><p><span class="b">Завершение  Activity</span>: Когда <code>Activity</code> проходит через <code>onStop()</code> и <code>onDestroy()</code>, 
все ее Composable-функции удаляются из композиции.</p></li>
<li><p><span class="b">Пересоздание  Activity</span>: При изменении конфигурации <code>Activity</code> уничтожается, и все ее Composable-функции выходят из композиции перед тем, как новая <code>Activity</code> создаст их заново.</p></li>
</ol>
</li></ul>
<p>Понимание этих моментов позволяет правильно управлять ресурсами, избегать утечек и обеспечивать корректное поведение интерфейса на протяжении всего жизненного цикла <code>Activity</code>.</p>


<h3>Управление жизненным циклом в Jetpack Compose</h3>
<p>Есть несколько способов управления жизненным циклом в Jetpack Compose:</p>
<ul>
<li><p>Компоненты, которые могут отслеживать различные события жизненного цикла. Jetpack Compose предоставляет ряд компонентов, которые могут отслеживать события жизненного цикла, как <b>LaunchedEffect</b> и <b>DisposableEffect</b>. 
Эти компоненты позволяют выполнять побочные эффекты (отсюда и суффикс <code>Effect</code> в названии) в жизненном цикле, что означает, что побочные эффекты будут очищены, когда композиция больше не требуется.</p></li>
<li><p>Компонент LocallifeCycleowner</p></li>
<li><p>ViewModel (Рассматривалась в ранее в главе <a href="https://metanit.com/kotlin/jetpack/15.1.php">View Model</a>, поэтому здесь не буду повторяться)</p></li>
</ul>
<h3>LaunchedEffect</h3>
<p><b>LaunchedEffect</b> в принципе уже рассматривался в соответстветствующей статье - <a href="https://metanit.com/kotlin/jetpack/10.2.php">LaunchedEffect</a>. Этот эффект срабатываеь при первом создании компонента и при изменениях 
жизненного цикла (например, когда возобновляется работа Activity). Этот комопнент представляет идеальное место для запуска каких-то долгосрочных задач, 
гарантируя при этом, что компонент продолжит реагировать и не заблокирует пользовательский интерфейс. Простейший пример:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.LaunchedEffect
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Modifier
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import kotlinx.coroutines.delay

class MainActivity : ComponentActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            MyApp()
        }
    }
}
@Composable
fun MyApp() {
    var count by remember{mutableStateOf(0)}
    LaunchedEffect(key1 = Unit) {
        while (true) {
            delay(1000)
            count++
        }
    }
    Text("Count: ${count}", Modifier.padding(start = 10.dp), fontSize = 28.sp)
}
</pre>
<p>Здесь создаем компонент <code>LaunchedEffect</code>. В качестве параметров <code>LaunchedEffect</code> принимает значения ключей. Причем необходимо указать как минимум один такой параметр. 
Пока значения любого из этих параметров остаются неизменными, LaunchedEffect будет продолжать выполнение одного и того же действия в течение несколько рекомпозиций родительского компонента. 
Однако если значение параметра изменится, LaunchedEffect перезапустит действие. Например:</p>
<pre class="brush:kt;">
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.Button
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.LaunchedEffect
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Modifier
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import kotlinx.coroutines.delay

class MainActivity : ComponentActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            MyApp()
        }
    }
}
@Composable
fun MyApp() {
    var count by remember{mutableStateOf(0)}
    var step by remember{mutableStateOf(1)}

    LaunchedEffect(step) {
        println("LaunchedEffect starts")
        while (true) {
            delay(1000)
            count += step
        }
    }
    Column {
        Text("Count: ${count}", Modifier.padding(start = 10.dp), fontSize = 28.sp)
        Button(onClick = {step = -step}) { Text("Reverse", Modifier.padding(start = 10.dp), fontSize = 28.sp)}
    }
}
</pre>
<p>В данном случае у нас то же самое действие - в цикле изменяем счетчик count на значение step. Только теперь выполнение LaunchedEffect зависит от этого step. С помощью кнопки мы можем 
изменить значение step на противоположное, что приведет к повторному запуску компонента LaunchedEffect.</p>

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

<h3>LifecycleOwner</h3>
<p>Класс <b>ComponentActivity</b> (базовый класс <code>Activity</code> при использовании Compose) реализует интерфейс <b>LifecycleOwner</b>. Это позволяет Composable-функциям наблюдать за 
событиями жизненного цикла <code>Activity</code>. Для этого Jetpack Compose предоставляет свойство <span class="b">LocalLifecycleOwner.current</span>. 
К текущему объекту <code>LifecycleOwner</code> (обычно это <code>Activity</code> или <code>Fragment</code>) можно получить доступ внутри любого компонента Composable, который определен в рамках этого объекта:</p>
<pre class="brush:kt;">val lifecycleOwner = LocalLifecycleOwner.current</pre>
<p>Рассмотрим применение на примере:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.unit.sp
import androidx.lifecycle.Lifecycle
import androidx.lifecycle.LifecycleEventObserver
import androidx.lifecycle.compose.LocalLifecycleOwner

class MainActivity : ComponentActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            MyApp()
        }
    }
}
// вспомогательная функция для логгирования
fun printCallback(callback:String){
    println("MainActivity: ${callback}")
}
@Composable
fun MyApp() {
    // получаем объект LifecycleOwner
    val lifecycleOwner = LocalLifecycleOwner.current

    // определяем LifecycleEventObserver для отслеживания событий жизненного цикла
    val observer = LifecycleEventObserver { source, event -&gt;
        when (event) {
            Lifecycle.Event.ON_CREATE -&gt; {
                printCallback("onCreate")
            }
            Lifecycle.Event.ON_START -&gt; {
                printCallback("onStart")
            }
            Lifecycle.Event.ON_RESUME -&gt; {
                printCallback("onResume")
            }
            Lifecycle.Event.ON_PAUSE -&gt; {
                printCallback("onPause")
            }
            Lifecycle.Event.ON_STOP -&gt; {
                printCallback("onStop")
            }
            Lifecycle.Event.ON_DESTROY -&gt; {
                printCallback("onDestroy")
            }
            Lifecycle.Event.ON_ANY -&gt; printCallback("Undefined")
        }
    }
    // Добавляем наблюдателя к жизненному циклу
    lifecycleOwner.lifecycle.addObserver(observer)
    Text("Hello METANIT.COM", fontSize = 22.sp)
}
</pre>
<p>В компоненте MyApp сначала получаем текущий <code>LifeCycleowner</code> (фактически MyActivity):</p>
<pre class="brush:kt;">val lifecycleOwner = LocalLifecycleOwner.current</pre>
<p>Далее для отслеживания событий жизненного цикла определяем объект интерфейса <span class="b">LifecycleEventObserver</span>:</p>
<pre class="brush:kt;">
 val observer = LifecycleEventObserver { source, event -&gt;
</pre>
<p>Этот интерфейс определяет метод </p>
<pre class="brush:kt;">
onStateChanged(
    @NonNull LifecycleOwner source,
    @NonNull Lifecycle.Event event
)
</pre>
<p>В качестве параметра <code>source</code> передается отслеживаемый объект LifecycleOwner. А второй параметр - <code>event</code> представляет возникшее событие жизненного цикла, которое описывается типом 
<code>Lifecycle.Event</code>. Чтобы определить тип события в Lifecycle.Event определен ряд констант типа <code>Lifecycle.Event.ON_CREATE</code>, и с помощью условной конструкции 
мы можем сопоставить переданное событие с этими константами и выполнить определенное действие:</p>
<pre class="brush:kt;">
when (event) {
    Lifecycle.Event.ON_CREATE -&gt; {
        printCallback("onCreate")
    }
    Lifecycle.Event.ON_START -&gt; {
        printCallback("onStart")
    }

..............
</pre>
<p>В данном случае просто логгируем данные на консоль Logcat.</p>
<p>Последний шаг - добавление слушателя событий для текущего LifecycleOwner:</p>
<pre class="brush:kt;">lifecycleOwner.lifecycle.addObserver(observer)</pre>
<p>И если мы запустим приложение, то в консоли Logcat мы можем увидеть лог событий жизненного цикла:</p>
<img src="./pics/122.png" alt="отладка приложений на Kotlin и Android" />
<p>Но здесь стоит отметить пару нюансов. Не стоит полагаться на подобную обработку события <code>Lifecycle.Event.ON_DESTROY</code>, так как композиция компонентов Compose разрушается <span class="b">до</span> 
отправки соответствующего сигнала. Хотя обработку уничтожения Activity при повороте в принципе таким образом можно отследить, как видно из лога.</p>
<p>Другой важный нюанс - слушателя событий необходимо <span class="b">удалять</span>. В примере выше он никак не удаляется, что соответственно может привести к утечкам памяти.</p>
<p>LifecycleOwner (обычно это Activity или Fragment) хранит ссылку на всех своих зарегистрированных слугателей событий.
Если MyApp уходит из композиции (например, при переходе на другой экран, или MyApp отображалась по условию, которое стало false), но Activity продолжает жить, observer все еще будет зарегистрирован в 
lifecycleOwner.lifecycle.
Если observer (или лямбда-выражение, которое он использует) неявно захватывает ссылки на MyApp или другие объекты, которые должны были быть освобождены сборщиком мусора, эти объекты не будут освобождены, потому что lifecycleOwner все еще "держит" observer. Это классическая утечка памяти.</p>
<p>Даже если утечки памяти минимальны в простом случае, observer будет продолжать получать события жизненного цикла и вызывать printCallback даже тогда, когда компонент 
MyApp уже не виден или неактуален. Это может привести к выполнению ненужной логики, потенциальным ошибкам (если логика внутри observer пытается взаимодействовать с элементами интерфейса, которых уже нет) и 
неожиданному поведению, если несколько экземпляров observer реагируют на одни и те же события.</p>
<p>Кроме того, компоненты Composable могут рекомпоноваться (перерисовываться) много раз. В текущем коде observer создается заново при каждой рекомпозиции MyApp.
Это означает, что при каждой рекомпозиции MyApp будет вызываться <code>lifecycleOwner.lifecycle.addObserver(observer)</code> с новым экземпляром observer.
В результате  будет зарегистрировано несколько слугателей событий, и каждый из них будет реагировать на события жизненного цикла. printCallback будет вызываться многократно для каждого события.
 Это почти наверняка не то поведение, которое ожидаетcя.</p>
<p>И для удаления слушателя нам поможет другой тип эффектов - <b>DisposableEffect</b></p>

<h3>DisposableEffect</h3>
<p><span class="b">DisposableEffect</span> представляет один из ключевых API для управления побочными эффектами в Compose, которые требуют очистки при выходе Composable-функции из композиции или 
при изменении ключей эффекта. Он идеально подходит для регистрации и отмены слушателей или других ресурсов, привязанных к жизненному циклу.</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.DisposableEffect
import androidx.compose.ui.unit.sp
import androidx.lifecycle.Lifecycle
import androidx.lifecycle.LifecycleEventObserver
import androidx.lifecycle.compose.LocalLifecycleOwner

class MainActivity : ComponentActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            MyApp()
        }
    }
}
// вспомогательная функция для логгирования
fun printCallback(callback:String){
    println("MainActivity: ${callback}")
}
@Composable
fun MyApp() {
    // получаем объект LifecycleOwner
    val lifecycleOwner = LocalLifecycleOwner.current
    DisposableEffect(lifecycleOwner) {
        // определяем LifecycleEventObserver для отслеживания событий жизненного цикла
        val observer = LifecycleEventObserver { source, event -&gt;
            when (event) {
                Lifecycle.Event.ON_CREATE -&gt; {
                    printCallback("onCreate")
                }

                Lifecycle.Event.ON_START -&gt; {
                    printCallback("onStart")
                }

                Lifecycle.Event.ON_RESUME -&gt; {
                    printCallback("onResume")
                }

                Lifecycle.Event.ON_PAUSE -&gt; {
                    printCallback("onPause")
                }

                Lifecycle.Event.ON_STOP -&gt; {
                    printCallback("onStop")
                }

                else -&gt; {}
            }
        }
        // Добавляем наблюдателя к жизненному циклу
        lifecycleOwner.lifecycle.addObserver(observer)
        // Блок onDispose вызывается, когда Composable уходит из композиции
        // или когда ключ (в данном случае lifecycleOwner) изменяется.
        // отписываемся от слушателя.
        onDispose {
            printCallback("Disposing observer")
            lifecycleOwner.lifecycle.removeObserver(observer)
        }
    }
    Text("Hello METANIT.COM", fontSize = 22.sp)
}

</pre>
<p>В этом примере <code>DisposableEffect</code> используется для добавления <code>LifecycleEventObserver</code>. Когда <code>MyApp</code> уходит из композиции 
(например, <code>Activity</code> уничтожается или пользователь переходит на другой экран в рамках Navigation Compose), блок <code>onDispose</code>
 гарантированно вызовется, удаляя наблюдателя и предотвращая утечки памяти.</p>
<pre class="brush:kt;">
onDispose {
    printCallback("Disposing observer")
    lifecycleOwner.lifecycle.removeObserver(observer)
}
</pre>
<p>В качестве оптимизации мы можем обернуть создание observer в <code>remember</code>:</p>
<pre class="brush:kt;">
@Composable
fun MyApp() {
    // получаем объект LifecycleOwner
    val lifecycleOwner = LocalLifecycleOwner.current
    val observer = remember(lifecycleOwner) {
        LifecycleEventObserver { source, event -&gt;
            when (event) {
                Lifecycle.Event.ON_CREATE -&gt; {
                    printCallback("onCreate")
                }
                Lifecycle.Event.ON_START -&gt; {
                    printCallback("onStart")
                }
                Lifecycle.Event.ON_RESUME -&gt; {
                    printCallback("onResume")
                }
                else -&gt; {}
            }
        }
    }

    DisposableEffect(lifecycleOwner, observer) {
        // Добавляем наблюдателя к жизненному циклу
        lifecycleOwner.lifecycle.addObserver(observer)
        // отписываемся от слушателя.
        onDispose {
            printCallback("Disposing observer")
            lifecycleOwner.lifecycle.removeObserver(observer)
        }
    }
    Text("Hello METANIT.COM", fontSize = 22.sp)
}
</pre>
<p>Это гарантирует, что экземпляр observer будет создан только один раз для данного lifecycleOwner. Если MyApp рекомпонуется, но lifecycleOwner остается тем же, 
будет использован тот же самый экземпляр observer, что предотвращает создание и добавление множества разных слушателей.</p>
<p>Кроме того, lifecycleOwner и observer передаются как ключи в DisposableEffect. Это означает, что эффект (добавление слушателя) будет запущен, когда MyApp впервые войдет в композицию, и будет перезапущен, если lifecycleOwner или observer изменятся (хотя observer здесь стабилен благодаря remember).</p>


<h3>LifecycleEffects</h3>
<p>Существует также тип <b>LifecycleEffects</b>, который позволяет запускать блок при возникновении определенного события <code>Lifecycle.Event</code>:</p>
<pre class="brush:kt;">
import androidx.lifecycle.compose.LifecycleEventEffect
...................

fun MyApp() {

    // прослушиваем событие onStart
    LifecycleEventEffect(Lifecycle.Event.ON_START) {
        printCallback("Lifecycle.Event.ON_START")
    }
    
    Text("Hello METANIT.COM", fontSize = 22.sp)
}
</pre>
<p>В дополнение к <code>LifecycleEventEffect</code> также можно использовать <b>LifecycleStartEffect</b> и <b>LifecycleResumeEffect</b>. Эти API привязаны к определенным событиям. 
Они также предлагают дополнительный блок в своем основном блоке, который помогает очистить любой код, который событие могло запустить.</p>
<p><b>LifecycleStartEffect</b> похож на <code>LifecycleEventEffect</code>, но он запускается только на событиях <code>Lifecycle.Event.ON_START</code>. Он также принимает ключи, которые работают как другие 
ключи Compose. Когда ключ меняется, он запускает блок для повторного запуска.</p>
<p>Когда происходит событие <code>Lifecycle.Event.ON_STOP</code> или эффект выходит из композиции, он выполняет блок <span class="b">onStopOrDispose</span>. Это позволяет очистить любую работу, 
которая была частью начального блока.</p>
<pre class="brush:kt;">
fun MyApp() {

    // прослушиваем событие onStart
    LifecycleStartEffect {
        printCallback("Lifecycle.Event.ON_START")

        onStopOrDispose {
            printCallback("onStopOrDispose")
        }
    }
    
    Text("Hello METANIT.COM", fontSize = 22.sp)
}
</pre>
<p><b>LifecycleResumeEffect</b> работает так же, как <code>LifecycleStartedEffect</code>, но вместо этого он выполняется на событии <code>Lifecycle.Event.ON_RESUME</code>. Он также предоставляет блок 
<code>onPauseOrDispose</code>, который выполняет очистку:</p>
<pre class="brush:kt;">
fun MyApp() {

    // прослушиваем событие onResume
    LifecycleResumeEffect {
        printCallback("Lifecycle.Event.ON_RESUME")

        onPauseOrDispose {
            printCallback("onPauseOrDispose")
        }
    }
    
    Text("Hello METANIT.COM", fontSize = 22.sp)
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

	<div class="nav"><p><a href="./19.1.php">Назад</a><a href="./">Содержание</a><a href="./19.3.php">Вперед</a></p></div>
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
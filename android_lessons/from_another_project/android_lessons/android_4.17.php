<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Kotlin и Android | Меню DropdownMenu</title>
<meta charset="utf-8" />
<meta name="description" content="Меню DropdownMenu и его параметры в Jetpack Compose на языке программирования Kotlin в Android, DropdownMenuItem и обработка нажатия пунктов меню">
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
     <h2>Меню DropdownMenu</h2><div class="date">Последнее обновление: 02.04.2024</div>
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

	<p>Компонент <span class="b">DropdownMenu</span> позволяет компактным образом разместить ряд вариантов для выбора пользователем - некий аналог контекстного меню. DropdownMenu немного похож на всплывающее окно - он 
может быть отображаться, а может быть скрыт. DropdownMenu сам по себе не занимает места в разметке и отображается поверх остального контента. 
Обычно DropdownMenu размещается в контейнере Box, хотя это необязательное требование.</p>
<p>Функция компонента принимает следующие параметры:</p>
<pre class="brush:kt;">
@Composable
fun DropdownMenu(
    expanded: Boolean,
    onDismissRequest: () -&gt; Unit,
    modifier: Modifier = Modifier,
    offset: DpOffset = DpOffset(0.dp, 0.dp),
    scrollState: ScrollState = rememberScrollState(),
    properties: PopupProperties = PopupProperties(focusable = true),
    shape: Shape = MenuDefaults.shape,
    containerColor: Color = MenuDefaults.containerColor,
    tonalElevation: Dp = MenuDefaults.TonalElevation,
    shadowElevation: Dp = MenuDefaults.ShadowElevation,
    border: BorderStroke? = null,
    content: @Composable ColumnScope.() -&gt; Unit
): Unit
</pre>
<p>Параметры функции компонента:</p>
<ul>
<li><p><code>expanded</code>: значение типа <code>Boolean</code>, которое устанавливает, будет ли меню отображаться (значение <code>true</code>) или будет скрыто (значение <code>false</code>)</p></li> 	
<li><p><code>onDismissRequest</code>: представляет функцию-обработчик типа <code>() -&gt; Unit</code>, которая вызывается, когда пользователь нажимает на область вне меню для его закрытия</p></li> 	
<li><p><code>modifier</code>: представляет объект <span class="b">Modifier</span>, который определяет модификаторы кнопки</p></li>  	
<li><p><code>offset</code>: объект типа <span class="b">DpOffset</span>, который определяет смещения позиции меню относительно положения по умолчанию. 
По умолчанию равно <code>DpOffset(0.dp, 0.dp)</code></p></li> 	
<li><p><code>scrollState</code>: значение типа <span class="b">ScrollState</span>, которое применяется для настройки вертикальной прокрутки элементов.</p></li> 	
<li><p><code>properties</code>: объект типа <span class="b">PopupProperties</span>, который задает дополнительные свойства меню. 
По умолчанию равно <code>PopupProperties(focusable = true)</code></p></li>
<li><p><code>shape</code>: форма меню в виде объекта <span class="b">Shape</span>.</p></li> 	
<li><p><code>containerColor</code>: цвет контейнера.</p></li> 	
<li><p><code>tonalElevation</code>: эффект анимации при нажатии на элемент меню.</p></li> 	
<li><p><code>shadowElevation</code>: высота тени.</p></li> 	
<li><p><code>border</code>: параметры границы в виде объекта <span class="b">BorderStroke</span>.</p></li> 	
<li><p><code>content</code>: содержимое меню в виде столбца компонентов. Обычно представляет набор компонентов типа <span class="b">DropdownMenuItem</span>.</p></li> 	
</ul>
<p>Определим простейшее меню DropdownMenu:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.padding
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.MoreVert
import androidx.compose.material3.Divider
import androidx.compose.material3.DropdownMenu
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.Text
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Modifier
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            var expanded by remember { mutableStateOf(false) }

            Box {
                IconButton(onClick = { expanded = true }) {
                    Icon(Icons.Default.MoreVert, contentDescription = "Показать меню")
                }
                DropdownMenu(
                    expanded = expanded,
                    onDismissRequest = { expanded = false }
                ) {
                    Text("Скопировать", fontSize=18.sp, modifier = Modifier.padding(10.dp))
                    Text("Вставить", fontSize=18.sp, modifier = Modifier.padding(10.dp))
                    Divider()
                    Text("Настройки", fontSize=18.sp, modifier = Modifier.padding(10.dp))
                }
            }
        }
    }
}
</pre>
<p>Здесь для управления отображением меню определена переменная <code>expanded</code>, и ее значение привязано к параметру <code>expanded</code> компонента DropdownMenu. 
При нажатии на кнопку IconButton эта переменная получает значение <code>true</code>, и меню отображается на экране.</p>
<img src="./pics/4.57.png" alt="DropdownMenu в Jetpack Compose и Kotlin в Android" />
<p>Само меню состоит из трех компонентов Text. Между предпоследним и последним компонентами располагается элемент <code>Divider</code>, который просто для красоты разделяет пункты меню горизонтальной линией.</p>
<p>При нажатии пользователем на область вне меню, срабатывает функция параметра <code>onDismissRequest</code> компонента DropdownMenu. В этой функции переменная <code>expanded</code> 
получает значение <code>false</code>, и меню скрывается.</p>

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

<h3>DropdownMenuItem</h3>
<p>Обычно элементы меню DropdownMenu предоставляют компонент <span class="b">DropdownMenuItem</span>:</p>
<pre class="brush:kt;">
@Composable
fun DropdownMenuItem(
    text: @Composable () -&gt; Unit,
    onClick: () -&gt; Unit,
    modifier: Modifier = Modifier,
    leadingIcon: (@Composable () -&gt; Unit)? = null,
    trailingIcon: (@Composable () -&gt; Unit)? = null,
    enabled: Boolean = true,
    colors: MenuItemColors = MenuDefaults.itemColors(),
    contentPadding: PaddingValues = MenuDefaults.DropdownMenuItemContentPadding,
    interactionSource: MutableInteractionSource? = null
): Unit
</pre>
<p>Параметры функции компонента:</p>
<ul>
<li><p><code>text</code>: устанавливает содержимое компонента </p></li> 
<li><p><code>onClick</code>: представляет функцию-обработчик нажатия меню</p></li> 	
<li><p><code>modifier</code>: предствляет объект <span class="b">Modifier</span>, который определяет модификаторы компонента</p></li>  	
<li><p><code>leadingIcon</code>: иконча, которая отображается в начале компонента</p></li>  	
<li><p><code>trailingIcon</code>: иконча, которая отображается в конце компонента</p></li>  	
<li><p><code>enabled</code>: значение типа <code>Boolean</code> устанавливает, доступен ли компонент для нажатия (значение <code>true</code>) 
или нет (значение <code>false</code>)</p></li> 	
<li><p><code>colors</code>: цветовые настройки меню</p></li> 
<li><p><code>contentPadding</code>: объект типа <span class="b">PaddingValues</span>, который устанавливает отступы между границами компонента и его содержимым. По умолчанию равно <code>MenuDefaults.DropdownMenuItemContentPadding</code></p></li> 	
<li><p><code>interactionSource</code>: представляет объект типа <span class="b">MutableInteractionSource</span>, который устанавливает поток взаимодействий для кнопки. Значение по умолчанию - <code>remember { MutableInteractionSource() }</code></p></li> 	
</ul>
<p>Используем в качестве пунктов меню DropdownMenuItem:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.Box
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.MoreVert
import androidx.compose.material3.Divider
import androidx.compose.material3.DropdownMenu
import androidx.compose.material3.DropdownMenuItem
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.Text

import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            var expanded by remember { mutableStateOf(false) }

            Box {
                IconButton(onClick = { expanded = true }) {
                    Icon(Icons.Default.MoreVert, contentDescription = "Показать меню")
                }
                DropdownMenu(
                    expanded = expanded,
                    onDismissRequest = { expanded = false }
                ) {
                    DropdownMenuItem(
                        onClick = { },
                        text = { Text("Скопировать") }
                    )
                    DropdownMenuItem(
                        onClick = { },
                        text = {Text("Вставить")}
                    )
                    Divider()
                    DropdownMenuItem(
                        onClick = { },
                        text = {Text("Настройки")}
                    )
                }
            }
        }
    }
}
</pre>
<h3>Обработка выбора пунктов меню</h3>
<p>Если пункт меню представлен компонентом DropdownMenuItem, то мы можем определить обработку выбора пункта с помощью параметра <code>onClick</code>:</p>
<pre class="brush:kt;">
ackage com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Row
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.MoreVert
import androidx.compose.material3.Divider
import androidx.compose.material3.DropdownMenu
import androidx.compose.material3.DropdownMenuItem
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.Text

import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.unit.sp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            var expanded by remember { mutableStateOf(false) }
            var selectedOption by remember { mutableStateOf("") }
            Box {
                Row {
                    IconButton(onClick = { expanded = true }) {
                        Icon(Icons.Default.MoreVert, contentDescription = "Показать меню")
                    }
                    Text("Выбран пункт: $selectedOption", fontSize = 28.sp)
                }
                DropdownMenu(
                    expanded = expanded,
                    onDismissRequest = { expanded = false }
                ) {
                    DropdownMenuItem(
                        onClick = { selectedOption = "Copy" },
                        text = { Text("Скопировать") }
                    )
                    DropdownMenuItem(
                        onClick = { selectedOption = "Paste" },
                        text = { Text("Вставить") }
                    )
                    Divider()
                    DropdownMenuItem(
                        onClick = { selectedOption = "Settings" },
                        text = { Text("Настройки") }
                    )
                }
            }
        }
    }
}
</pre>
<p>Здесь по нажатию на любой пункт меню в обработчике нажатия передаем переменной <code>selectedOption</code> соответствующее значение.</p>
<h3>Определение позиции</h3>
<p>Если нас не устраивает начальная позиция DropdownMenu, то мы можем ее сместить с помощью параметра <code>offset</code>. Он представляет объект 
<code>DpOffset</code>, который имеет два свойства: x (смещение по горизонтали) и y (смещение по вертикали). Оба свойства принимают значения в единицах <span class="b">dp</span>:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.Box
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.MoreVert
import androidx.compose.material3.Divider
import androidx.compose.material3.DropdownMenu
import androidx.compose.material3.DropdownMenuItem
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.Text

import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.unit.DpOffset
import androidx.compose.ui.unit.dp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            var expanded by remember { mutableStateOf(false) }
            var selectedOption by remember { mutableStateOf("") }
            Box {
                IconButton(onClick = { expanded = true }) {
                    Icon(Icons.Default.MoreVert, contentDescription = "Показать меню")
                }
                DropdownMenu(
                    expanded = expanded,
                    onDismissRequest = { expanded = false },
                    offset = DpOffset(x = 20.dp, y = 10.dp)
                ) {
                    DropdownMenuItem(
                        onClick = {},
                        text = { Text("Скопировать") }
                    )
                    DropdownMenuItem(
                        onClick = {  },
                        text = { Text("Вставить") }
                    )
                    Divider()
                    DropdownMenuItem(
                        onClick = { },
                        text = { Text("Настройки") }
                    )
                }
            }
        }
    }
}
</pre>
<p>В данном случае строка</p>
<pre class="brush:kt;">offset = DpOffset(x = 20.dp, y = 10.dp)</pre>
<p>Позволяет задать смещение меню на 20 пикселей вправо и на 10 пикселей вниз</p>
	

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

	<div class="nav"><p><a href="./4.16.php">Назад</a><a href="./">Содержание</a><a href="./4.18.php">Вперед</a></p></div>
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
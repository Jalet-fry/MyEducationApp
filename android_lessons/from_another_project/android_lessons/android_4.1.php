<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Kotlin и Android | Text</title>
<meta charset="utf-8" />
<meta name="description" content="Компонент Text и его параметры в Jetpack Compose на языке программирования Kotlin, стилизация текста, высота и цвет шрифта, TextStyle, TextAlign, TextDecoration">
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
     <h1>Визуальные компоненты</h1><h2>Text</h2><div class="date">Последнее обновление: 31.03.2024</div>
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

	<p>Неотъемлемой частью визуального интерфейса является текст. Для отображения текста Jetpack Compose предоставляет ряд встроенных компонентов. 
Прежде всего это компонент <span class="b">Text</span>, который имеет следующее определение:</p>
<pre class="brush:kt;">
@Composable
fun Text(
    text: String,
    modifier: Modifier = Modifier,
    color: Color = Color.Unspecified,
    fontSize: TextUnit = TextUnit.Unspecified,
    fontStyle: FontStyle? = null,
    fontWeight: FontWeight? = null,
    fontFamily: FontFamily? = null,
    letterSpacing: TextUnit = TextUnit.Unspecified,
    textDecoration: TextDecoration? = null,
    textAlign: TextAlign? = null,
    lineHeight: TextUnit = TextUnit.Unspecified,
    overflow: TextOverflow = TextOverflow.Clip,
    softWrap: Boolean = true,
    maxLines: Int = Int.MAX_VALUE,
    minLines: Int = 1,
    onTextLayout: ((TextLayoutResult) -&gt; Unit)? = null,
    style: TextStyle = LocalTextStyle.current
): Unit
</pre>
<p>Параметры компонента:</p>
<ul>
<li><p><code>text</code>: объект String, который представляет выводимый текст</p></li> 	
<li><p><code>modifier</code>: объект <span class="b">Modifier</span>, который представляет применяемые к компоненту модификаторы</p></li>
<li><p><code>color</code>: объект <span class="b">Color</span>, который представляет цвет текста. По умолчанию имеет значение 
<code>Color.Unspecified</code></p></li>
<li><p><code>fontSize</code>: объект <span class="b">TextUnit</span>, который представляет размер шрифта. По умолчанию равен 
<code>TextUnit.Unspecified</code></p></li>
<li><p><code>fontStyle</code>: объект <span class="b">FontStyle?</span>, который представляет стиль шрифта. 
По умолчанию равен <code>null</code></p></li>
<li><p><code>fontWeight</code>: объект <span class="b">FontWeight?</span>, который представляет толщину шрифта. 
По умолчанию равен <code>null</code> </p></li>
<li><p><code>fontFamily</code>: объект <span class="b">FontFamily?</span>, который представляет тип шрифта. По умолчанию равен <code>null</code></p>
</li>
<li><p><code>letterSpacing</code>: объект <span class="b">TextUnit</span>, который представляет отступы между символами. 
По умолчанию равен <code>TextUnit.Unspecified</code></p></li>
<li><p><code>textDecoration</code>: объект <span class="b">TextDecoration?</span>, который представляет тип декораций (например, подчеркивание), 
применяемых к тексту. По умолчанию равен <code>null</code></p></li>
<li><p><code>textAlign</code>: объект <span class="b">TextAlign?</span>, который представляет выравнивание текста. По умолчанию равен <code>null</code></p></li>
<li><p><code>lineHeight</code>: объект <span class="b">TextUnit</span>, который представляет высоту строки текста. По умолчанию равен <code>TextUnit.Unspecified</code></p></li>
<li><p><code>overflow</code>: объект <span class="b">TextOverflow</span>, который определяет поведение текста при его выходе за границы контейнера. 
По умолчанию равен <code>TextOverflow.Clip</code></p></li>
<li><p><code>softWrap</code>: объект <span class="b">Boolean</span>, который определяет, должен ли текст переносится при завершении строки. 
При значении <code>false</code> текст не переносится, как будто строка имеет бесконечную длину. По умолчанию равен <code>true</code></p></li>
<li><p><code>maxLines</code>: объект <span class="b">Int</span>, который представляет максимальное количество строк. 
Если текст превысил установленное количество строк, то он усекается в соответствии с параметрами <code>overflow</code> и <code>softWrap</code>. 
По умолчанию равен <code>Int.MAX_VALUE</code></p></li>
<li><p><code>minLines</code>: минимальное количество строк</p></li>
<li><p><code>onTextLayout</code>: объект <span class="b">(TextLayoutResult) -&gt; Unit</span>, который представляет функцию, выполняемую при определении 
компоновки текста.</p></li>
<li><p><code>style</code>: объект <span class="b">TextStyle</span>, который представляет стиль текста. Значение по умолчанию - 
<code>LocalTextStyle.current</code></p></li>
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

<h3>Размер шрифта</h3>
<p>Размер шрифта определяется параметром <code>fontSize</code>. В качестве параметру может передаваться значение типов Int, Double и Float, после которых указывается тип единиц. Это могут быть 
масштабируемые пиксели (единицы <span class="b">sp</span>, например, <code>22.sp</code>), либо это может быть относительный размер шрифта 
в единицах <span class="b">em</span> (например, <code>18.em</code>). Значение <code>TextUnit.Unspecified</code> указывает, что высота шрифта наследуется от настроек родительного компонента</p>
<p>Простейшее применение компонента:/p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.material3.Text
import androidx.compose.foundation.layout.Column
import androidx.compose.ui.unit.em
import androidx.compose.ui.unit.sp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            Column {
				Text("Hello Jetpack Compose!", fontSize=25.sp)
				Text("Hello Jetpack Compose!", fontSize=6.em)
			}
        }
    }
}
</pre>
<h3>Цвет шрифта</h3>
<p>За определение цвета шрифта отвечает параметр <span class="b">color</span>, который представляет объект <span class="b">Color</span>, 
ранее рассмотренный в статье <a href="./3.2.php">Установка цвета</a>.</p>
<pre class="brush:kt;">
import androidx.compose.ui.graphics.Color
//..........
Column {
	Text("Hello Jetpack Compose!",  fontSize=22.sp, color=Color.Red)
	Text("Hello Jetpack Compose!",  fontSize=22.sp, 
		color= Color(red = 0x44, green = 0x55, blue = 0x88, alpha = 0xFF))
}
</pre>
<h3>Стиль шрифта</h3>
<p>Стиль шрифта определяется параметром <span class="b">fontStyle</span>, который представляет класс <span class="b">FontStyle?</span>. 
Для определения этот класс предоставляет два встроенных значения:</p>
<ul>
<li><p><code>FontStyle.Italic</code> (наклоннный шрифт)</p></li>
<li><p><code>FontStyle.Normal</code> (стандартный шрифт)</p></li>
</ul>
<pre class="brush:kt;">
import androidx.compose.ui.text.font.FontStyle
//..........
Text("Hello Jetpack Compose!",  fontSize=22.sp, fontStyle = FontStyle.Italic)
Text("Hello Jetpack Compose!",  fontSize=22.sp, fontStyle = FontStyle.Normal)
</pre>
<h3>Толщина шрифта</h3>
<p>Толщина шрифта задается параметром <span class="b">fontWeight</span>, который представляет класс <span class="b">FontWeight</span>.</p>
<p>Есть два способа установки толщины шрифта. Прежде всего можно использовать конструктор этого класса, в который передается числовое значение от 1 до 1000. 
Чем больше значение, тем толще будет шрифт:</p>
<pre class="brush:kt;">FontWeight(600)</pre>
<p>Второй способ заключается в применении встроенных значений:</p>
<ul>
<li><p><code>FontWeight.Black</code> (Эквивалентно значению <code>W900</code>)</p></li>
<li><p><code>FontWeight.Bold</code> (Эквивалентно значению <code>W700</code>)</p></li>
<li><p><code>FontWeight.ExtraBold</code> (Эквивалентно значению <code>W800</code>)</p></li>
<li><p><code>FontWeight.ExtraLight</code> (Эквивалентно значению <code>W200</code>)</p></li>
<li><p><code>FontWeight.Light</code> (Эквивалентно значению <code>W300</code>)</p></li>
<li><p><code>FontWeight.Medium</code> (Эквивалентно значению <code>W500</code>)</p></li>
<li><p><code>FontWeight.Normal</code> (Эквивалентно <code>W400</code> - значение по умолчанию)</p></li>
<li><p><code>FontWeight.SemiBold</code> (Эквивалентно значению <code>W600</code>)</p></li>
<li><p><code>FontWeight.Thin</code> (Эквивалентно значению <code>W100</code>
</ul>
<p>Так, следующие  определения компонента Text будут аналогичны:</p>
<pre class="brush:kt;">
import androidx.compose.ui.text.font.FontWeight
//..........
Text("Hello Jetpack Compose!",  fontSize=22.sp, fontWeight= FontWeight.Bold)
Text("Hello Jetpack Compose!",  fontSize=22.sp, fontWeight= FontWeight.W700)
Text("Hello Jetpack Compose!",  fontSize=22.sp, fontWeight= FontWeight(700))
</pre>
<h3>Тип шрифта</h3>
<p>Тип или семейство шрифта определяется параметром <span class="b">fontFamily</span>, который представляет объект <span class="b">FontFamily?</span></p>
<p>Для определения шрифта FontFamily предоставляет ряд встроенных констант:</p>
<ul>
<li><p><code>FontFamily.Cursive</code> (курсивный, рукописный шрифт)</p></li>
<li><p><code>FontFamily.Monospace</code></p></li>
<li><p><code>FontFamily.Serif</code></p></li>
<li><p><code>FontFamily.SansSerif</code></p></li>
<li><p><code>FontFamily.Default</code> (шрифт по умолчанию на текущей платформе)</p></li>
<li><p><code>FontFamily.SansSerif</code></p></li>
</ul>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.Column
import androidx.compose.material3.Text
import androidx.compose.ui.text.font.FontFamily
import androidx.compose.ui.unit.sp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            Column {
                Text("Hello METANIT.COM", fontSize=28.sp, fontFamily= FontFamily.Cursive)
                Text("Hello METANIT.COM", fontSize=28.sp, fontFamily=FontFamily.Monospace)
                Text("Hello METANIT.COM", fontSize=28.sp, fontFamily=FontFamily.SansSerif)
                Text("Hello METANIT.COM", fontSize=28.sp, fontFamily=FontFamily.Serif)
                Text("Hello METANIT.COM", fontSize=28.sp, fontFamily=FontFamily.Default)
            }
        }
    }
}
</pre>
<img src="./pics/4.1.png" alt="FontFamily in Text in Jetpack Compose and Kotlin" />
<h3>Расстояния между символами</h3>
<p>Параметр <span class="b">letterSpacing</span> задает расстояние между символами и представляет класс <span class="b">TextUnit</span>. В данном случае 
мы можем установить расстояние, так как и размер шрифта, с помощью единиц <span class="b">sp</span> или <span class="b">em</span>:</p>
<pre class="brush:kt;">
Text("Hello Jetpack Compose!",  fontSize=22.sp, letterSpacing= 1.3.sp)
Text("Hello Jetpack Compose!",  fontSize=22.sp, letterSpacing= 0.3.em)
</pre>
<h3>Декорации текста</h3>
<p>Параметр <span class="b">textDecoration</span> позволять задать декорации для текста. Данный параметр принимает объект класса <span class="b">TextDecoration</span>, 
который предоставляет несколько встроенных значений:</p>
<ul>
<li><p><code>TextDecoration.LineThrough</code> (зачеркивает текст)</p></li>
<li><p><code>TextDecoration.Underline</code> (подчеркивает текст)</p></li>
<li><p><code>TextDecoration.None</code> (отсутствие декораций)</p></li>
</ul>
<pre class="brush:kt;">
import androidx.compose.ui.text.style.TextDecoration
//...........
Column {
    Text("Hello Jetpack Compose!",  fontSize=28.sp, textDecoration = TextDecoration.LineThrough)
    Text("Hello Jetpack Compose!",  fontSize=28.sp, textDecoration = TextDecoration.Underline)
    Text("Hello Jetpack Compose!",  fontSize=28.sp, textDecoration = TextDecoration.None)
}      
</pre>
<img src="./pics/4.61.png" alt="TextDecoration и компонент Text в Jetpack Compose и Kotlin" />
<h3>Выравнивание текста</h3>
<p>Параметр <span class="b">textAlign</span> управляет выравниванием текста и представляет объект класса <span class="b">TextAlign</span>. 
В качестве значения этому параметру можно передать значение одного из свойств класса TextAlign:</p>
<ul>
<li><p><code>TextAlign.Center</code>: выравнивание текста по центру контейнера</p></li>
<li><p><code>TextAlign.Justify</code>: текст равномерно растягивается по всей ширине контейнера</p></li>
<li><p><code>TextAlign.End</code>: выравнивание текста по конечному краю контейнера (в зависимости от ориентации текста это может быть левый или правый край)</p></li>
<li><p><code>TextAlign.Start</code>: выравнивание текста по началу контейнера (в зависимости от ориентации текста это может быть левый или правый край)</p></li>
<li><p><code>TextAlign.Left</code>: выравнивание текста по левому краю контейнера</p></li>
<li><p><code>TextAlign.Right</code>: выравнивание текста по правому краю контейнера</p></li>
</ul>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.material3.Text
import androidx.compose.ui.unit.sp
import androidx.compose.ui.Modifier
import androidx.compose.ui.text.style.TextAlign

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            Column {
                Text("Center", modifier = Modifier.fillMaxWidth(1f) , fontSize=28.sp, textAlign = TextAlign.Center)
                Text("Justify", modifier = Modifier.fillMaxWidth(1f), fontSize=28.sp, textAlign = TextAlign.Justify)
                Text("Left", modifier = Modifier.fillMaxWidth(1f), fontSize=28.sp, textAlign = TextAlign.Left)
                Text("Right", modifier = Modifier.fillMaxWidth(1f), fontSize=28.sp, textAlign = TextAlign.Right)
                Text("Start", modifier = Modifier.fillMaxWidth(1f), fontSize=28.sp, textAlign = TextAlign.Start)
                Text("End", modifier = Modifier.fillMaxWidth(1f), fontSize=28.sp, textAlign = TextAlign.End)
            }
        }
    }
}
</pre>
<img src="./pics/4.2.png" alt="Выравнивание текста и TextAlign в Text в Jetpack Compose и Kotlin в Android" />

<h3>Усечение текста</h3>
<p>Параметр <span class="b">overflow</span> управляет тем, как будет обрабатываться текст при его выходе за границы контейнера. 
Этот параметр принимает значение класса <span class="b">TextOverflow</span>. В качестве значения параметру можно передать значение одного из 
свойств данного класса:</p>
<ul>
<li><p><code>TextOverflow.Clip</code>: выходящий за границы контейнера текст усекается</p></li>
<li><p><code>TextOverflow.Ellipsis</code>: текст усекается, а в конце текста добавляется многоточие</p></li>
<li><p><code>TextOverflow.Visible</code>: весь текст может отображаться</p></li>
</ul>
<h3>Перенос текста</h3>
<p>Параметр <span class="b">softWrap</span> управляет переносом текста. Если он равен <code>true</code>, то текст переносится. 
Если <code>false</code>, то нет.</p>
<h3>Стиль текста</h3>
<p>Параметр <span class="b">style</span> управляет стилем текста. Он предоставляет класс <span class="b">TextStyle </span>, который по сути объединяет 
ряд вышеупомянутых и несколько дополнительных параметров в одну сущность. Он несколько конструкторов с кучей параметров, например, один из них:</p>
<pre class="brush:kt;">
TextStyle(
    color: Color,
    fontSize: TextUnit,
    fontWeight: FontWeight?,
    fontStyle: FontStyle?,
    fontSynthesis: FontSynthesis?,
    fontFamily: FontFamily?,
    fontFeatureSettings: String?,
    letterSpacing: TextUnit,
    baselineShift: BaselineShift?,
    textGeometricTransform: TextGeometricTransform?,
    localeList: LocaleList?,
    background: Color,
    textDecoration: TextDecoration?,
    shadow: Shadow?,
    drawStyle: DrawStyle?,
    textAlign: TextAlign,
    textDirection: TextDirection,
    lineHeight: TextUnit,
    textIndent: TextIndent?,
    platformStyle: PlatformTextStyle?,
    lineHeightStyle: LineHeightStyle?,
    lineBreak: LineBreak,
    hyphens: Hyphens,
    textMotion: TextMotion?
)
</pre>
<p>Основные параметры конструктора в принципе дублируют стандартные свойства компонента Text:</p>
<ul>
<li><p><code>color</code>: объект <span class="b">Color</span>, который представляет цвет текста. По умолчанию имеет значение 
<code>Color.Unspecified</code></p></li>
<li><p><code>background</code>: объект <span class="b">Color</span>, который фоновый цвет компонента. По умолчанию имеет значение 
<code>Color.Unspecified</code></p></li>
<li><p><code>fontSize</code>: объект <span class="b">TextUnit</span>, который представляет размер шрифта. По умолчанию равен 
<code>TextUnit.Unspecified</code></p></li>
<li><p><code>fontStyle</code>: объект <span class="b">FontStyle?</span>, который представляет стиль шрифта. 
По умолчанию равен <code>null</code></p></li>
<li><p><code>fontWeight</code>: объект <span class="b">FontWeight?</span>, который представляет толщину шрифта. 
По умолчанию равен <code>null</code> </p></li>
<li><p><code>fontFamily</code>: объект <span class="b">FontFamily?</span>, который представляет тип шрифта. По умолчанию равен <code>null</code></p></li>
<li><p><code>fontFeatureSettings</code>: объект <span class="b">String?</span>, который определяет, как будут применяться настройки толщины шрифта 
и его наклон (то есть значения параметров fontWeight и fontStyle), если используемый шрифт не поддерживает выделение жирным и (или) наклон. По умолчанию равен <code>null</code></p></li>
<li><p><code>letterSpacing</code>: объект <span class="b">TextUnit</span>, который представляет отступы между символами. 
По умолчанию равен <code>TextUnit.Unspecified</code></p></li>

<li><p><code>baselineShift</code>: объект <span class="b">BaselineShift?</span>, который определяет, насколько текст будет сдвигаться относительно базовой линии (baseline). 
По умолчанию равен <code>null</code></p></li>
<li><p><code>textGeometricTransform</code>: представляет применяемые к тексту геометрические трансформации в виде объекта <span class="b">TextGeometricTransform?</span>. 
По умолчанию равен <code>null</code></p></li>
<li><p><code>localeList</code>: объект <span class="b">LocaleList?</span>, который представляет список со специфичными для егиона символами. 
По умолчанию равен <code>null</code></p></li>
<li><p><code>textDecoration</code>: объект <span class="b">TextDecoration?</span>, который представляет тип декораций (например, подчеркивание), 
применяемых к тексту. По умолчанию равен <code>null</code></p></li>
<li><p><code>textAlign</code>: объект <span class="b">TextAlign?</span>, который представляет выравнивание текста. По умолчанию равен <code>null</code></p></li>
<li><p><code>textDirection</code>: объект <span class="b">TextDirection?</span>, который представляет направление текста. По умолчанию равен <code>null</code></p></li>
<li><p><code>lineHeight</code>: объект <span class="b">TextUnit</span>, который представляет высоту строки текста. По умолчанию равен <code>TextUnit.Unspecified</code></p></li>
<li><p><code>shadow</code>: объект <span class="b">Shadow?</span>, который определяет применяемый к тексту эффект тени. 
По умолчанию равен <code>null</code></p></li>
<li><p><code>textIndent</code>: объект <span class="b">TextIndent?</span>, который представляет отступ от начала текста. 
По умолчанию равен <code>null</code></p></li>
</ul>
<p>Поскольку большая часть этих параметров применяется непосредственно в функции компонента Text, рассмотрим некоторые параметры, которые 
отстуствуют в функции компонента Text.</p>
<h4>Геометрические трансформации</h4>
<p>Параметр <code>TextGeometricTransform</code> задает геометрические трансформации текста с помощью объекта <span class="b">TextGeometricTransform</span>:</p>
<pre class="brush:kt;">TextGeometricTransform(scaleX: Float = 1.0f, skewX: Float = 0f)</pre>
<p>Первый параметр - <code>scaleX</code> указывает на увеличение текста. Если значение меньше 1.0f, то текст сжимается, если больше - то увеличивается.</p>
<p>Второй параметр - <code>skewX</code> указывает на сдвиг текста. Например, точка с координатами (x, y), будет трансформирована в точку 
(x + y * skewX, y). Значение по умолчанию - 0.0f. Например:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.Column
import androidx.compose.material3.Text
import androidx.compose.ui.unit.sp
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.text.style.TextGeometricTransform

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            val content = "Все мы сейчас желаем кушать, потому что утомились"
            val textSize = 25.sp
            Column {
                Text(
                    content,
                    fontSize = textSize,
                    style = TextStyle(textGeometricTransform = TextGeometricTransform(0.5f))
                )
                Text(
                    content,
                    fontSize = textSize,
                    style = TextStyle(textGeometricTransform = TextGeometricTransform(1.5f))
                )
            }
        }
    }
}
</pre>
<img src="./pics/4.4.png" alt="Масштабирование текста и TextGeometricTransform в Text в Jetpack Compose и Kotlin в Android" />

<h4>Создание тени для текста</h4>
<p>Параметр <code>shadow</code> задает затенение текста с помощью объекта <span class="b">Shadow</span>:</p>
<pre class="brush:kt;">Shadow(color: Color, offset: Offset, blurRadius: Float)</pre>
<p>Первый параметр - <code>color</code> устанавливает цвет тени.</p>
<p>Второй параметр - <code>offset</code> смещение тени в виде объекта <span class="b">Offset</span>.</p>
<p>Третий параметр - <code>blurRadius</code> задает радиус размытия.</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.material3.Text
import androidx.compose.ui.unit.sp
import androidx.compose.ui.geometry.Offset
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.graphics.Shadow
import androidx.compose.ui.text.TextStyle

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            Text(text = "Hello Metanit.com",
                fontSize = 30.sp,
                style = TextStyle(shadow = Shadow(Color.LightGray , Offset(10.0f, 16.5f), 1.0f)))
        }
    }
}
</pre>
<img src="./pics/4.5.png" alt="Тень текста и Shadow в Text в Jetpack Compose и Kotlin в Android" />
<h4>Направление текста</h4>
<p>Параметр <code>textDirection</code> устанавливает направление текста и может принимать следующие значения:</p>
<ul>
<li><p><code>TextDirection.Content</code>: направление текста зависит от первого направляющего символа в соответствии с алгоритмом Unicode Bidirectional Algorithm</p></li>
<li><p><code>TextDirection.ContentOrLtr</code>: направление текста зависит от первого направляющего символа в соответствии с алгоритмом Unicode Bidirectional Algorithm, либо представляет направление слева направо</p></li>
<li><p><code>TextDirection.ContentOrRtl</code>: направление текста зависит от первого направляющего символа в соответствии с алгоритмом Unicode Bidirectional Algorithm, либо представляет направление справа налево</p></li>
<li><p><code>TextDirection.Ltr</code>: текс направлен слева направо</p></li>
<li><p><code>TextDirection.Rtl</code>: текст направлен справо налево</p></li>
</ul>
<p>Например:</p>
<pre class="brush:kt;">
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.text.style.TextDirection
//............
Text(
	"Все мы сейчас желаем кушать, потому что утомились",
	fontSize=22.sp,
	style = TextStyle(textDirection = TextDirection.Rtl)
)
</pre>
<h4>TextIndent</h4>
<p>Параметр <code>textIndent</code> позволяет установить отступ от первого символа в тексте и от остального текста. Этот параметр представляет класс <span class="b">TextIndent</span>, 
конструктор которого принимает два значения. Первое значение указывает на отступ от первого символа. Второе значение применяется, если текст многострочный и устанавливает 
отступ от остальных символов на второй и последующих строках. Для установки отступа применяются единицы <code>sp</code>. Например:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.material3.Text
import androidx.compose.ui.unit.sp
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.text.style.TextIndent

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            Text(
                text = "Все мы сейчас желаем кушать, потому что утомились и уже четвертый час",
                fontSize = 22.sp,
                style = TextStyle(textIndent = TextIndent(50.sp, 25.sp))
            )
        }
    }
}
</pre>
<img src="./pics/4.3.png" alt="Отступ от текста и TextIndent в Text в Jetpack Compose и Kotlin в Android" />

	

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

	<div class="nav"><p><a href="./5.5.php">Назад</a><a href="./">Содержание</a><a href="./4.19.php">Вперед</a></p></div>
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
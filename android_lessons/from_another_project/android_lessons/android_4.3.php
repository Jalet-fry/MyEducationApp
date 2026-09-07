<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Kotlin и Android | Ввод текста, TextField и OutlinedTextField</title>
<meta charset="utf-8" />
<meta name="description" content="Ввод текста, компоненты TextField и OutlinedTextField и их параметры в Jetpack Compose на языке программирования Kotlin, обработка ввода текста, настройка цвета, клавиатуры и текста ">
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
     <h2>Ввод текста, TextField и OutlinedTextField</h2><div class="date">Последнее обновление: 02.04.2024</div>
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

	<p>Для ввода текста в приложении предназначен компонент <span class="b">TextField</span>. Он имеет несколько версий, возьмем одну из них:</p>
<pre class="brush:kt;">
@Composable
fun TextField(
    value: String,
    onValueChange: (String) -&gt; Unit,
    modifier: Modifier = Modifier,
    enabled: Boolean = true,
    readOnly: Boolean = false,
    textStyle: TextStyle = LocalTextStyle.current,
    label: (@Composable () -&gt; Unit)? = null,
    placeholder: (@Composable () -&gt; Unit)? = null,
    leadingIcon: (@Composable () -&gt; Unit)? = null,
    trailingIcon: (@Composable () -&gt; Unit)? = null,
    prefix: (@Composable () -&gt; Unit)? = null,
    suffix: (@Composable () -&gt; Unit)? = null,
    supportingText: (@Composable () -&gt; Unit)? = null,
    isError: Boolean = false,
    visualTransformation: VisualTransformation = VisualTransformation.None,
    keyboardOptions: KeyboardOptions = KeyboardOptions.Default,
    keyboardActions: KeyboardActions = KeyboardActions.Default,
    singleLine: Boolean = false,
    maxLines: Int = if (singleLine) 1 else Int.MAX_VALUE,
    minLines: Int = 1,
    interactionSource: MutableInteractionSource? = null,
    shape: Shape = TextFieldDefaults.shape,
    colors: TextFieldColors = TextFieldDefaults.colors()
): Unit
</pre>
<p>Основные параметры компонента:</p>
<ul>
<li><p><code>value</code>: представляет введенное в текстовое поле значение в виде строки, то есть объекта <span class="b">String</span></p></li>
<li><p><code>onValueChange</code>: функция обработки изменения введенного значения. Представляет функцию типа <span class="b">(String) -&gt; Unit</code></p></li>	
<li><p><code>modifier</code>: объект типа <span class="b">Modifier</span>, который задает модификаторы компонента</p></li>	
<li><p><code>enabled</code>: устанавливает, будет ли поле доступно для ввода. Представляет значение типа <span class="b">Boolean</span>. По умолчанию равно <code>true</code>, то есть поле доступно для ввода</p></li> 	
<li><p><code>readOnly</code>: устанавливает, будет ли поле доступно только для чтения. Представляет значение типа <span class="b">Boolean</span>. По 
умолчанию равно <code>false</code>, то есть поле доступно не только для чтения, но для изменения значения</p></li> 	
<li><p><code>textStyle</code>: объект типа <span class="b">TextStyle</span>, который устанавливает стиль текста. Значение по умолчанию - <code>LocalTextStyle.current</code></p></li> 
<li><p><code>label</code>: устанавливает дополнительную метку, которая отображается внутри поля. Для установки метки применяется функция типа 
<span class="b">() -&gt; Unit</span>. Значение по умолчанию - <code>null</code></p></li>
<li><p><code>placeholder</code>: плейсхолдер - временный текст, который отображается внутри поля. Для установки этого текста применяется функция типа 
<span class="b">() -&gt; Unit</span>. Значение по умолчанию - <code>null</code></p></li>
<li><p><code>leadingIcon</code>: устанавливает иконку, которая отображается перед текстом. Для установки применяется функция типа 
<span class="b">() -&gt; Unit</span>. Значение по умолчанию - <code>null</code></p></li>	
<li><p><code>trailingIcon</code>: устанавливает иконку, которая отображается после текста. Для установки применяется функция типа 
<span class="b">() -&gt; Unit</span>. Значение по умолчанию - <code>null</code></p></li>
<li><p><code>isError</code>: указывает, является ли текущее введенное в поле значение некорректным. Представляет значение типа <span class="b">Boolean</span>. По 
умолчанию равно <code>false</code>, то есть введенное значение корректно. Если равно <code>true</code>, то для поля 
устанавливаютс соответствующие индикаторы - метка, иконка, выделение цветом, которые поддчеркивают, что введенное значение некорректно.</p></li>
<li><p><code>visualTransformation</code>: объект типа <span class="b">VisualTransformation</span>, который задает визуальные трансформации для вводимого текста. Значение по умолчанию - <code>VisualTransformation.None </code></p></li>	
<li><p><code>keyboardOptions</code>: объект <span class="b">KeyboardOptions</span>, который задает параметры клавиатуры (например, ее тип). 
Значение по умолчанию - <code>KeyboardOptions.Default</code></p></li>
<li><p><code>keyboardActions</code>: <span class="b">KeyboardActions</span>, который задает набор функций, которые вызываются в ответ на некоторые действия пользователя. 
Значение по умолчанию - <code>KeyboardActions()</code></p></li>
<li><p><code>singleLine</code>: устанавливает, будет ли текст однострочным. По умолчанию равно <code>false</code>, то есть поле будет многосточным</p></li>
<li><p><code>maxLines</code>: задает максимальное количество строк в поле. По умолчанию равно <code>Int.MAX_VALUE</code></p></li>
<li><p><code>minLines</code>: задает минимальное количество строк в поле. По умолчанию равно 1</p></li>
<li><p><code>interactionSource</code>: объект <span class="b">MutableInteractionSource</span>, который задает поток взаимодействий для поля ввода. 
Значение по умолчанию - <code>remember { MutableInteractionSource() }</code></p></li>	
<li><p><code>shape</code>: представляет объект <span class="b">Shape</span>, который задает форму для поля ввода. 
Значение по умолчанию - <code>MaterialTheme.shapes.small.copy(bottomEnd = ZeroCornerSize, bottomStart = ZeroCornerSize)</code></p></li>		
<li><p><code>colors</code>: объект <span class="b">TextFieldColors</span>, который задает цвета для поля ввода. 
Значение по умолчанию - <code>TextFieldDefaults.textFieldColors()</code></p></li>	
</ul>
<p>Определение простейшего поля ввода:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.material3.TextField

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            TextField(value = "Hello Work", onValueChange = {})
        }
    }
}
</pre>
<p>При создании поля необходимо задать как минимум два параметра - текущее значение (параметр value) и функцию обработки ввода текста (параметр onValueChange).</p>
<img src="./pics/4.12.png" alt="Поле ввода текста TextField в Jetpack Compose и Kotlin в Android" />

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

<h3>Обработка ввода текста</h3>
<p>Параметр <code>onValueChange</code> принимает функцию обработки ввода текста. Она в качестве параметра получает введенный текст в виде объекта <span class="b">String</span>:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.Column
import androidx.compose.material3.Text
import androidx.compose.material3.TextField
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.unit.sp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            val message = remember{mutableStateOf("")}

            Column {
                Text(message.value, fontSize = 28.sp)
                TextField(
                    value = message.value,
                    textStyle = TextStyle(fontSize=25.sp),
                    onValueChange = {newText -&gt; message.value = newText}
                )
            }
        }
    }
}
</pre>
<p>В данном случае мы определяем переменную <code>message</code>, которая будет хранить введенный текст. 
Однако это не просто строка. Она будет представлять объект типа <span class="b">MutableState&lt;String&gt;</span>, который создается функцией 
<span class="b">mutableStateOf()</span>. В дальнейшем мы подробнее разберем объект MutableState 
и функцию mutableStateOf, а пока достуточно знать, что в эту функцию передается собственно хранимое значение, которое затем можно получить 
с помощью свойства <code>value</code> объекта <code>MutableState&lt;T&gt;</code>. А функция <span class="b">remember</span> позволяет сохранить это значение.</p>
<p>В коде с помощью свойства <code>value</code> мы привязываем значение переменной к свойству text компонента Text и свойству value компонента TextField:</p>
<pre class="brush:kt;">
Text(message.value, fontSize = 28.sp)
TextField( value = message.value,
</pre>
<p>А в функции обработки ввода текста передаем в переменную введенный текст:</p>
<pre class="brush:kt;">onValueChange = {newText -&gt; message.value = newText}</pre>
<p>В данном случае функция задается с помощью лямбда-выражения, где параметр <code>newText</code> представляет введенный текст.</p>
<p>В итоге при ввода текста в поле изменится значение в переменной message и соответственно изменится текст компонента Text.</p>
<img src="./pics/4.13.png" alt="TextField и обработка ввода текста с помощью onValueChange в Jetpack Compose и Kotlin в Android" />
<h3>Тип клавиатуры</h3>
<p>В зависимости от задач приложения может потребоваться вводить разную информацию - когда буквы, когда числа и т.д. Для упрощения ввода 
Jetpack Compose предоставляет тип <span class="b">KeyboardType</span>, который позволяет настроить тип клавиатуры с помощью своих свойств:</p>
<ul>
<li><p><code>KeyboardType.Ascii</code>: предоставляет ввод символов ASCII</p></li>
<li><p><code>KeyboardType.Email</code>: для ввода электронного адреса</p></li>
<li><p><code>KeyboardType.Number</code>: для ввода цифр</p></li>
<li><p><code>KeyboardType.NumberPassword</code>: для ввода пароля из цифр</p></li>
<li><p><code>KeyboardType.Password</code>: для ввода пароля</p></li>
<li><p><code>KeyboardType.Phone</code>: для ввода номера телефона</p></li>
<li><p><code>KeyboardType.Text</code>: предоставляет стандартную клавиатуру</p></li>
<li><p><code>KeyboardType.Uri</code>: предоставляет клавиатуру для ввода URI</p></li>
</ul>
<p>С помощью параметра <code>keyboardOptions</code>, который представляет класс <span class="b">KeyboardOptions</span>, можно задать тип клавиатуры. 
Например, применим клавиатуру для ввода номера телефона:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.text.KeyboardOptions
import androidx.compose.material3.TextField
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.text.input.KeyboardType
import androidx.compose.ui.unit.sp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            val phone = remember{mutableStateOf("")}

            TextField(
                phone.value,
                {phone.value = it},
                textStyle = TextStyle(fontSize =  28.sp),
                keyboardOptions = KeyboardOptions(keyboardType = KeyboardType.Phone)
            )
        }
    }
}
</pre>
<img src="./pics/4.14.png" alt="Тип клавиатуры для поля ввода текста TextField и тип KeyboardType в Jetpack Compose и Kotlin в Android" />
<h3>Установка иконок</h3>
<p>Параметр <code>leadingIcon</code> задает иконку перед текстом, а параметр <code>trailingIcon</code> - иконку после текста. В качестве значения оба параметра 
принимают функцию типа <code>() -&gt; Unit</code>. Определим иконки для поля ввода:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.Check
import androidx.compose.material.icons.filled.Info
import androidx.compose.material3.Icon
import androidx.compose.material3.TextField
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.unit.sp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            val message = remember{mutableStateOf("")}

            TextField(
                message.value,
                {message.value = it},
                textStyle = TextStyle(fontSize =  28.sp),
                leadingIcon = { Icon(Icons.Filled.Check, contentDescription = "Проверено") },
                trailingIcon = { Icon(Icons.Filled.Info, contentDescription = "Дополнительная информация") }
            )
        }
    }
}
</pre>
<p>Для определения иконок применяется встроенный тип <code>androidx.compose.material.Icon</code>, в функцию которого передается значок иконки. 
В данном случае применяются встроенные иконки <code>Icons.Filled.Check</code> и <code>Icons.Filled.Info</code>. Второй параметр - contentDescription позволяет 
указать к иконке описание.</p>
<img src="./pics/4.15.png" alt="Иконки для поля ввода текста TextField и тип KeyboardType в Jetpack Compose и Kotlin в Android" />
<h3>Плейсхолдер</h3>
<p>Параметр <code>placeholder</code> устанавливает плейсхолдер или заменитель текста, отображаемый в поле ввода, в виде другого компонента:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.material3.Text
import androidx.compose.material3.TextField
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.unit.sp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            val message = remember{mutableStateOf("")}
            TextField(
                message.value,
                {message.value = it},
                textStyle = TextStyle(fontSize =  28.sp),
                placeholder = { Text("Hello Work!") }
            )
        }
    }
}
</pre>
<h3>Установка цветовой палитры поля ввода</h3>
<p>Параметр <code>colors</code>, который представляет объект интерфейса <span class="b">TextFieldColors</span>, задает цвета для поля ввода. По умолчанию он принимает компонент 
<code>TextFieldDefaults.textFieldColors()</code>/<code>TextFieldDefaults.colors()</code>, который устанавливает цвета для самых различных состояний:</p>
<ul>
<li><p><code>focusedTextColor</code>: цвет, используемый для ввода текста этого текстового поля при фокусировке.</p></li>
<li><p><code>unfocusedTextColor</code>: цвет, используемый для ввода текста этого текстового поля, когда он не сфокусирован</p></li>
<li><p><code>disabledTextColor</code>: цвет, используемый для ввода текста этого текстового поля, когда он отключен.</p></li>
<li><p><code>errorTextColor</code>: цвет, используемый для ввода текста этого текстового поля в состоянии ошибки.</p></li>
<li><p><code>focusedContainerColor</code>: цвет контейнера текстового поля в фокусе.</p></li>
<li><p><code>unfocusedContainerColor</code>: цвет контейнера текстового поля, когда он не сфокусирован.</p></li>
<li><p><code>disabledContainerColor</code>: цвет контейнера текстового поля, когда он отключен.</p></li>
<li><p><code>errorContainerColor</code>: цвет контейнера текстового поля в состоянии ошибки.</p></li>
<li><p><code>cursorColor</code>: цвет курсора текстового поля</p></li>
<li><p><code>errorCursorColor</code>: цвет курсора текстового поля в состоянии ошибки.</p></li>
<li><p><code>selectionColors</code>: цвета, используемые при выборе входного текста этого текстового поля.</p></li>
<li><p><code>focusedIndicatorColor</code>: цвет индикатора текстового поля при фокусировке.</p></li>
<li><p><code>unfocusedIndicatorColor</code>: цвет индикатора текстового поля, когда оно не сфокусировано.</p></li>
<li><p><code>disabledIndicatorColor</code>: цвет индикатора текстового поля, когда он отключен.</p></li>
<li><p><code>errorIndicatorColor</code>: цвет индикатора текстового поля в состоянии ошибки.</p></li>
<li><p><code>focusedLeadingIconColor</code>: цвет ведущего значка текстового поля в фокусе.</p></li>
<li><p><code>unfocusedLeadingIconColor</code>: цвет ведущего значка текстового поля, когда он не сфокусирован.</p></li>
<li><p><code>disabledLeadingIconColor</code>: цвет ведущего значка текстового поля, когда он отключен.</p></li>
<li><p><code>errorLeadingIconColor</code>: цвет ведущего значка текстового поля в состоянии ошибки.</p></li>
<li><p><code>focusedTrailingIconColor</code>: цвет конечного значка текстового поля в фокусе.</p></li>
<li><p><code>unfocusedTrailingIconColor</code>: цвет конечного значка текстового поля, когда он не в фокусе.</p></li>
<li><p><code>disabledTrailingIconColor</code>: цвет конечного значка текстового поля, когда он отключен.</p></li>
<li><p><code>errorTrailingIconColor</code>: цвет конечного значка текстового поля в состоянии ошибки.</p></li>
<li><p><code>focusedLabelColor</code>: цвет метки текстового поля при фокусировке.</p></li>
<li><p><code>unfocusedLabelColor</code>: цвет метки текстового поля, когда оно не сфокусировано.</p></li>
<li><p><code>disabledLabelColor</code>: цвет метки текстового поля, когда он отключен.</p></li>
<li><p><code>errorLabelColor</code>: цвет метки текстового поля в состоянии ошибки.</p></li>
<li><p><code>focusedPlaceholderColor</code>: цвет заполнителя текстового поля в фокусе.</p></li>
<li><p><code>unfocusedPlaceholderColor</code>: цвет заполнителя текстового поля, когда он не сфокусирован.</p></li>
<li><p><code>disabledPlaceholderColor</code>: цвет заполнителя текстового поля, когда он отключен.</p></li>
<li><p><code>errorPlaceholderColor</code>: цвет заполнителя текстового поля в состоянии ошибки.</p></li>
<li><p><code>focusedSupportingTextColor</code>: вспомогательный цвет текста текстового поля при фокусе.</p></li>
<li><p><code>unfocusedSupportingTextColor</code>: вспомогательный цвет текста текстового поля, когда он не сфокусирован</p></li>
<li><p><code>disabledSupportingTextColor</code>: вспомогательный цвет текста текстового поля, когда он отключен.</p></li>
<li><p><code>errorSupportingTextColor</code>: вспомогательный цвет текста текстового поля в состоянии ошибки.</p></li>
<li><p><code>focusedPrefixColor</code>: цвет префикса текстового поля в фокусе.</p></li>
<li><p><code>unfocusedPrefixColor</code>: цвет префикса текстового поля, когда оно не сфокусировано.</p></li>
<li><p><code>disabledPrefixColor</code>: цвет префикса текстового поля, когда он отключен.</p></li>
<li><p><code>errorPrefixColor</code>: цвет префикса текстового поля в состоянии ошибки.</p></li>
<li><p><code>focusedSuffixColor</code>: цвет суффикса текстового поля в фокусе.</p></li>
<li><p><code>unfocusedSuffixColor</code>: цвет суффикса текстового поля, когда оно не сфокусировано.</p></li>
<li><p><code>disabledSuffixColor</code>: цвет суффикса текстового поля, когда он отключен.</p></li>
<li><p><code>errorSuffixColor</code>: цвет суффикса текстового поля в состоянии ошибки.</p></li>
</ul>

<p>Мы можем использовать этот компонент для настройки цветовой гаммы поля ввода:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.material3.TextField
import androidx.compose.material3.TextFieldDefaults
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.unit.sp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            val message = remember{mutableStateOf("Hello")}
            TextField(
                message.value,
                {message.value = it},
                textStyle = TextStyle(fontSize =  28.sp),
                colors = TextFieldDefaults.colors(
                    unfocusedContainerColor = Color(0xffeeeeee),
                    unfocusedTextColor = Color(0xff888888),
                    focusedContainerColor = Color.White,
                    focusedTextColor = Color(0xff222222),
                )
            )
        }
    }
}
</pre>
<p>В данном случае для текста и фона устанавливаются разные цвета в зависимости от того, получило текстовое поле фокус или нет:</p>
<img src="./pics/4.16.png" alt="Настройка цветов для поля ввода текста TextField и тип TextFieldDefaults в Jetpack Compose и Kotlin в Android" />
<h3>OutlinedTextField</h3>
<p>Компонент <span class="b">OutlinedTextField</span> во многом похож на <code>TextField</code> за тем исключением, что он добавляет границу вокуг поля ввода. Простейшее определение компонента OutlinedTextField:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.material3.OutlinedTextField
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.unit.sp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            val message = remember{mutableStateOf("Hello")}
            OutlinedTextField(
                message.value,
                {message.value = it},
                textStyle = TextStyle(fontSize =  30.sp)
            )
        }
    }
}
</pre>
<img src="./pics/4.17.png" alt="Поле ввода текста OutlinedTextField в Jetpack Compose и Kotlin в Android" />
<p>В функции компонента OutlinedTextField мы видим, что в отличие от TextField, меняется стандартное значение для последнего параметра - <code>colors</code>, который устанавливает цвета. 
Теперь он по умолчанию равен компоненту <code>TextFieldDefaults.outlinedTextFieldColors()</code>. Фактически здесь мы можем установить те же самые цвета за тем исключением, что мы также можем настроить текст границы 
с помощью таких параметов как <code>focusedBorderColor</code>, <code>unfocusedBorderColor</code>, <code>disabledBorderColor</code> 
и <code>errorBorderColor</code>, который позволяют установить цвет границы для различных состояний поля ввода. Например:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.material3.OutlinedTextField
import androidx.compose.material3.OutlinedTextFieldDefaults
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.unit.sp

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            val message = remember{mutableStateOf("Hello")}
            OutlinedTextField(
                message.value,
                {message.value = it},
                textStyle = TextStyle(fontSize =  30.sp),
                colors = OutlinedTextFieldDefaults.colors(
                    focusedBorderColor= Color(0xff16a085), // цвет при получении фокуса
                    unfocusedBorderColor = Color(0xffcccccc)  // цвет при отсутствии фокуса
                )
            )
        }
    }
}
</pre>
<img src="./pics/4.62.png" alt="Настройка цветов текста в OutlinedTextField в Jetpack Compose и Kotlin в Android" />
	

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

	<div class="nav"><p><a href="./4.2.php">Назад</a><a href="./">Содержание</a><a href="./4.7.php">Вперед</a></p></div>
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
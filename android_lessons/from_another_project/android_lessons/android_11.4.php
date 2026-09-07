<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Kotlin и Android | Настройки SharedPreferences</title>
<meta charset="utf-8" />
<meta name="description" content="Настройки SharedPreferences в мобильном приложении Android на Jetpack Compose на языке программирования Kotlin, метод getSharedPreferences, сохранение и получение настроек, класс SharedPreferences.Editor">
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
     <h1>Настройки SharedPreferences</h1><div class="date">Последнее обновление: 28.05.2025</div>
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

	
<p>Нередко приложению требуется сохранять небольшие кусочки данных для дальнейшего использования, например, данные о пользователе, настройки конфигурации и т.д. Для этого в Android существует концепция <b>SharedPreferences</b>. 
Настройки <b>SharedPreferences</b> представляют простой способ хранения небольших объемов данных в формате ключ-значение на Android. Для работы с <code>SharedPreferences</code> в 
Jetpack Compose нам понадобится контекст. В компонентах Compose его можно получить с помощью свойства <span class="b">LocalContext.current</span>:</p>
<pre class="brush:kt;">
val context = LocalContext.current
val sharedPreferences = context.getSharedPreferences("app_prefs", Context.MODE_PRIVATE)
</pre>
<p>Для работы с разделяемыми настройками у контекста имеется метод <b>getSharedPreferences()</b>:</p>
<span class="b">getSharedPreferences()</span>:</p>
<pre class="brush:java;">
import android.content.SharedPreferences;

..............................................

val context = LocalContext.current
val sharedPreferences = context.getSharedPreferences("app_prefs", MODE_PRIVATE)
</pre>
<p>Первый параметр метода указывает на название настроек. В данном случае название - "app_prefs". Если настроек с подобным названием нет, 
то они создаются при вызове данного метода. Второй параметр указывает на режим доступа. В данном случае режим описан константой <code>MODE_PRIVATE</code></p>
<p>Настройки представляют собой группу пар ключ-значение, которые используются приложением. В качестве значений могут выступать данные следующих типов: Boolean, Float, Integer, Long, String, набор строк. 
Класс <code>android.content.SharedPreferences</code> предоставляет ряд методов для управления настройками:</p>
<ul>
<li><p><code>contains(String key)</code>: возвращает true, если в настройках сохранено значение с ключом key</p></li>
<li><p><code>getAll()</code>: возвращает все сохраненные в настройках значения</p></li>
<li><p><code>getBoolean (String key, boolean defValue)</code>: возвращает из настроек значение типа Boolean, которое имеет ключ key. 
Если элемента с таким ключом не окажется, то возвращается значение defValue, передаваемое вторым параметром</p></li>
<li><p><code>getFloat(String key, float defValue)</code>: возвращает значение типа float с ключом key. 
Если элемента с таким ключом не окажется, то возвращается значение defValue</p></li>
<li><p><code>getInt(String key, int defValue)</code>: возвращает значение типа int с ключом key</p></li>
<li><p><code>getLong(String key, long defValue)</code>: возвращает значение типа long с ключом key</p></li>
<li><p><code>getString(String key, String defValue)</code>: возвращает строковое значение с ключом key</p></li>
<li><p><code>getStringSet(String key, Set&lt;String&gt; defValues)</code>: возвращает массив строк с ключом key</p></li>
<li><p><code>edit()</code>: возвращает объект <code>SharedPreferences.Editor</code>, который используется для редактирования настроек</p></li>
</ul>
<p>Для управления настройками используется объект класса <span class="b">SharedPreferences.Editor</span>, возвращаемый метод <code>edit()</code>. 
Он определяет следующие методы:</p>
<ul>
<li><p><code>clear()</code>: удаляет все настройки</p></li>
<li><p><code>remove(String key)</code>: удаляет из настроек значение с ключом key</p></li>
<li><p><code>putBoolean(String key, boolean value)</code>: добавляет в настройки значение типа boolean с ключом key</p></li>
<li><p><code>putFloat(String key, float value)</code>: добавляет в настройки значение типа float с ключом key</p></li>
<li><p><code>putInt(String key, int value)</code>: добавляет в настройки значение int с ключом key</p></li>
<li><p><code>putLong(String key, long value)</code>: добавляет в настройки значение типа long с ключом key</p></li>
<li><p><code>putString(String key, String value)</code>: добавляет в настройки строку с ключом key</p></li>
<li><p><code>putStringSet(String key, Set&lt;String&gt; values)</code>: добавляет в настройки строковый массив</p></li>
<li><p><code>commit()</code>: подтверждает все изменения в настройках</p></li>
<li><p><code>apply()</code>: также, как и метод commit(), подтверждает все изменения в настройках, однако измененный объект SharedPreferences вначале 
сохраняется во временной памяти, и лишь затем в результате асинхронной операции записывается на мобильное устройство</p></li>
</ul>
<p>Стоит отметить, что расширения Kotlin предоставляют удобную разновидность метода <code>edit</code>:</p>
<pre class="brush:kt;">
public inline fun SharedPreferences.edit(
    commit: Boolean = false,
    action: SharedPreferences.Editor.() -&gt; Unit
): Unit
</pre>
<p>Этот метод автоматически применяет методы <code>apply()</code> или <code>commit()</code>. По умолчанию применяется <code>apply()</code>, но если первому параметру передать значение 
<code>true()</code>, то будет применяться <code>commit()</code>. 
Обычно рекомендуется <code>apply()</code> вместо <code>commit()</code>, так как <code>apply()</code> работает асинхронно и не блокирует UI-поток.</p>
<p>В качестве второго параметра передается действие сохранения в настройках конкретного значения с помощью методов <code>put</code>.</p>

<p>Рассмотрим пример сохранения и получения настроек в приложении. Определим следующий пользовательский интерфейс:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.enableEdgeToEdge
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.systemBarsPadding
import androidx.compose.material3.Button
import androidx.compose.material3.OutlinedTextField
import androidx.compose.material3.OutlinedTextFieldDefaults
import androidx.compose.material3.Text
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.core.content.edit

class MainActivity : ComponentActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()

        setContent {
            // получаем настройки
            val sharedPreferences = LocalContext.current.getSharedPreferences("app_prefs", MODE_PRIVATE)

            // получение настройки "user_name"
            fun getName(): String {
                return sharedPreferences.getString("user_name", "Undefined")!!
            }
            // сохранение настройки "user_name"
            fun saveName(userName: String){
                sharedPreferences.edit { putString("user_name", userName) }
            }
            // для редактирования в текстовом поле
            var userName by remember{mutableStateOf(getName())}

            // для вывода в текстовую метку
            var savedUserName by remember{mutableStateOf("")}

            Column(
                Modifier.fillMaxSize().systemBarsPadding()
            ){
                OutlinedTextField(
                    value = userName,
                    modifier = Modifier.fillMaxWidth().padding(5.dp),
                    textStyle = TextStyle(fontSize = 19.sp),
                    colors = OutlinedTextFieldDefaults.colors(
                        unfocusedContainerColor = Color(0xffeeeeee),
                        focusedContainerColor = Color.White,
                    ),
                    onValueChange = {newText -&gt; userName = newText}
                )
                Button(onClick = {saveName(userName)}) { Text("Save Name", fontSize = 18.sp)}

                Spacer(Modifier.padding(16.dp))

                Text(savedUserName, fontSize = 18.sp)
                Button(onClick = {savedUserName = getName()}) { Text("Get Name", fontSize = 18.sp)}
            }
        }
    }
}
</pre>
<p>Вкратце разберем основные моменты. Сначала получаем настройки, которые сопоставляются с именем "app_prefs":</p>
<pre class="brush:kt;">val sharedPreferences = LocalContext.current.getSharedPreferences("app_prefs", MODE_PRIVATE)</pre>
<p>Далее для более удобной рабоыт с настройками определяем две функции. Во-первых, функцию получения настройки "user_name":</p>
<pre class="brush:kt;">
// получение настройки "user_name"
fun getName(): String {
    return sharedPreferences.getString("user_name", "Undefined")!!
}
</pre>
<p>Название настроек произвольное, в нашем случае это "user_name" (имя пользователя). По умолчанию оно не задано или может быть не установлено, поэтому в качестве значения по умолчанию 
возвращаем строку "Undefined". Обратите внимание на два восклицательных знака в конце - <span class="b">!!</span>. Метод <code>getString()</code> возвращает значение типа 
<code>String?</code> (которое допускает <code>null</code>). Но поскольку у нас в любом случае будет возвращена строка, то указываем, что возвращаться будет именно <code>String</code></p>
<p>Функция сохранения настройки - saveName принимает новое значение и сохраняет его в настройках:</p>
<pre class="brush:kt;">
fun saveName(userName: String){
    sharedPreferences.edit { putString("user_name", userName) }
}
</pre>
<p>Затем определяем две переменных состояния компонентов:</p>
<pre class="brush:kt;">
// для редактирования в текстовом поле
var userName by remember{mutableStateOf(getName())}

// для вывода в текстовую метку
var savedUserName by remember{mutableStateOf("")}
</pre>
<p>Причем первая переменная по умолчанию получает значение настройки "user_name" (при первом запуске приложения - значение по умолчанию "Undefined").</p>
<p>Далее в интерфейсе в текстовом поле определяем привязку к первой переменной, а по нажатию на кнопку сохранения записываем измененное значение в настройках:</p>
<pre class="brush:kt;">
OutlinedTextField(
    value = userName,
    ..........................
    onValueChange = {newText -&gt; userName = newText}
)
Button(onClick = {saveName(userName)}) { Text("Save Name", fontSize = 18.sp)}
</pre>
<p>Для проверки настройки определена текстовая метка <code>Text</code>, которая выводит значение второй переменной состояния:</p>
<pre class="brush:kt;">
Text(savedUserName, fontSize = 18.sp)
Button(onClick = {savedUserName = getName()}) { Text("Get Name", fontSize = 18.sp)}
</pre>
<p>А по нажатию на кнопку получаем во вторую переменную сохраненное в настройках значение.</p>


<p>При запуске приложения в текстовое поле будет загружено значение по умолчанию - строка "Undefined", так как изначально настройка "user_name" не установлена.</p>
<img src="./pics/21.2.png" alt="получение настроек SharedPreferences в Kotlin Jetpack Compose в Android" />
<p>И если мы нажмем на кнопку получения 
этой настройки, то в текстовую метку также будет загружен текст "Undefined".</p>
<img src="./pics/21.3.png" alt="сохранение настроек SharedPreferences в Kotlin Jetpack Compose в Android" />

<p>Однако введем в текстовое поле какое-нибудь имя и нажмем на кнопку сохранения. Это приведет к тому, что настройки будут сохранены.</p>
<img src="./pics/21.4.png" alt="настройки SharedPreferences в Kotlin Jetpack Compose в Android" />
<p>И если после этого мы нажмем на кнопку получения этой настройки, то в текстовую метку также будет загружено новое сохраненное значение</p>
<img src="./pics/21.5.png" alt="работа с настройками SharedPreferences в Kotlin Jetpack Compose в Android" />

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

<h3>Реактивное обновление UI</h3>
<p>При работе с разделяемыми настройками частой проблемой, с которой сталкиваются разработчики, является обновление компонентов интерфейса, которые привязаны к данным, полученным из настроек. 
Продемонстрирую проблему на следующем примере:</p>
<pre cols="brush:kt;">
package com.example.helloapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.enableEdgeToEdge
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.systemBarsPadding
import androidx.compose.material3.Button
import androidx.compose.material3.OutlinedTextField
import androidx.compose.material3.OutlinedTextFieldDefaults
import androidx.compose.material3.Text
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.core.content.edit

class MainActivity : ComponentActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()

        setContent {
            // получаем настройки
            val sharedPreferences = LocalContext.current.getSharedPreferences("app_prefs", MODE_PRIVATE)

            // получение настройки "user_name"
            fun getName(): String {
                return sharedPreferences.getString("user_name", "Undefined")!!
            }

            // для вывода в текстовой метке
            var userName = remember{getName()}
            // для редактирования в текстовом поле
            var userNameForEdit by remember{mutableStateOf(getName())}

            // сохранение настройки "user_name"
            fun saveName(newUserName: String){
                if(userName != newUserName) {
                    userName = newUserName
                    sharedPreferences.edit { putString("user_name", newUserName) }
                }
            }

            Column(
                Modifier.fillMaxSize()
            ){
                OutlinedTextField(
                    value = userNameForEdit,
                    textStyle = TextStyle(fontSize = 19.sp),
                    colors = OutlinedTextFieldDefaults.colors(
                        unfocusedContainerColor = Color(0xffeeeeee),
                        focusedContainerColor = Color.White,
                    ),
                    onValueChange = {newText -&gt; userNameForEdit = newText}
                )
                Button(onClick = {saveName(userNameForEdit)}) { Text("Save Name", fontSize = 18.sp)}

                Spacer(Modifier.padding(16.dp))

                Text(userName, fontSize = 18.sp)
            }
        }
    }
}
</pre>
<p>Здесь текстовое поле ввода привязано к переменной состояния userNameForEdit, значение для которой по умолчанию берем из настроек.</p>
<pre class="brush:kt;">var userNameForEdit by remember{mutableStateOf(getName())}</pre>
<p>Для изменения настроек при нажатии на кнопку вызываем функцию saveName:</p>
<pre class="brush:kt;">Button(onClick = {saveName(userNameForEdit)}) { Text("Save Name", fontSize = 18.sp)}</pre>
<p>В функции saveName, если введенно новое значение, изменяем переменную userName, которая выводится в текстовой метке, и сохраняем новое значение в настройках</p>
<pre class="brush:kt;">
fun saveName(newUserName: String){
    if(userName != newUserName) {
        userName = newUserName
        sharedPreferences.edit { putString("user_name", newUserName) }
    }
}
</pre>
<p>Я специально поставил здесь изменение переменной userName, которая также должна брать данные из настроек. Но если мы введем новое значение в текстовое поле и нажмем на кнопку сохранения, текст в текстовой метке, 
который привязан к userName, не изменится.</p>
<img src="./pics/21.6.png" alt="Обновление настроек SharedPreferences в Jetpack Compose Android Kotlin" />
<p>Чтобы UI автоматически обновлялся при изменении <code>SharedPreferences</code>, можно использовать <span class="b">Flow</span>:</p>
<pre class="brush:kt;">
package com.example.helloapp

import android.content.SharedPreferences
import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.enableEdgeToEdge
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.systemBarsPadding
import androidx.compose.material3.Button
import androidx.compose.material3.OutlinedTextField
import androidx.compose.material3.OutlinedTextFieldDefaults
import androidx.compose.material3.Text
import androidx.compose.runtime.collectAsState
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.core.content.edit
import kotlinx.coroutines.channels.awaitClose
import kotlinx.coroutines.flow.Flow
import kotlinx.coroutines.flow.callbackFlow

class MainActivity : ComponentActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()

        setContent {
            // получаем настройки
            val sharedPreferences = LocalContext.current.getSharedPreferences("app_prefs", MODE_PRIVATE)

            // получение настройки "user_name"
            fun getName(): String {
                return sharedPreferences.getString("user_name", "Undefined")!!
            }

            fun getNameFlow(): Flow&lt;String&gt; {
                return callbackFlow {
                    val listener = SharedPreferences.OnSharedPreferenceChangeListener { _, changedKey -&gt;
                        trySend(getName())
                    }

                    sharedPreferences.registerOnSharedPreferenceChangeListener(listener)
                    send(getName())

                    awaitClose {
                        sharedPreferences.unregisterOnSharedPreferenceChangeListener(listener)
                    }
                }
            }

            //var userName = remember{getName()}
            val userName by getNameFlow()
                .collectAsState(initial = getName())
            // для редактирования в текстовом поле
            var userNameForEdit by remember{mutableStateOf(getName())}

            // сохранение настройки "user_name"
            fun saveName(newUserName: String){
                if(userName != newUserName) {
                    sharedPreferences.edit { putString("user_name", newUserName) }
                }
            }

            Column(
                Modifier.fillMaxSize().systemBarsPadding()
            ){
                OutlinedTextField(
                    value = userNameForEdit,
                    modifier = Modifier.fillMaxWidth().padding(5.dp),
                    textStyle = TextStyle(fontSize = 19.sp),
                    colors = OutlinedTextFieldDefaults.colors(
                        unfocusedContainerColor = Color(0xffeeeeee),
                        focusedContainerColor = Color.White,
                    ),
                    onValueChange = {newText -> userNameForEdit = newText}
                )
                Button(onClick = {saveName(userNameForEdit)}, Modifier.padding(5.dp),) { Text("Save Name", fontSize = 18.sp)}

                Spacer(Modifier.padding(16.dp))

                Text(userName, Modifier.fillMaxWidth().padding(5.dp), fontSize = 18.sp)
            }
        }
    }
}
</pre>
<p>Для получения настроек здесь определена дополнительная функция getNameFlow(). Эта функция возвращает <code>Flow&lt;String&gt;</code>, который позволяет реактивно отслеживать изменения user_name.</p>
<pre class="brush:kt;">
fun getNameFlow(): Flow&lt;String&gt; {
   return callbackFlow {
        val listener = SharedPreferences.OnSharedPreferenceChangeListener { _, changedKey -&gt;
            trySend(getName())
        }

        sharedPreferences.registerOnSharedPreferenceChangeListener(listener)
        send(getName())

        awaitClose {
            sharedPreferences.unregisterOnSharedPreferenceChangeListener(listener)
        }
    }
}
</pre>
<p><span class="b">callbackFlow</span> создаёт Flow, который может отправлять значения вручную.</p>
<p>Слушатель <code>OnSharedPreferenceChangeListener</code> прослушивает изменения в <code>SharedPreferences</code>. При срабатывании отправляет новое значение через вызов <code>trySend(getName())</code>.</p>
<p>А вызов <code>send(getName())</code> отправляет текущее значение сразу при подписке.</p>
<p>В конце <span class="b">awaitClose</span> отменяет подписку на изменения при завершении Flow.</p>
<p>Использование Flow:</p>
<pre class="brush:kt;">
val userName by getNameFlow()
    .collectAsState(initial = getName())
</pre>
<p>Здесь <code>getNameFlow()</code> преобразуется в <code>State&lt;String&gt;</code>, который можно использовать в Compose.</p>
<p>Метод <b>collectAsState</b> подписывается на Flow и автоматически обновляет UI при изменении значения.</p>
<p>Параметр <code>initial = getName()</code> устанавливает начальное значение (синхронно загружается из SharedPreferences).</p>
<p>И, таким образом, при нажатии на кнопку сохранения автоматически будет изменяться текст на текстовой метке, который представляет значение переменной userName.</p>

	

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

	<div class="nav"><p><a href="./11.3.php">Назад</a><a href="./">Содержание</a><a href="./11.5.php">Вперед</a></p></div>
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
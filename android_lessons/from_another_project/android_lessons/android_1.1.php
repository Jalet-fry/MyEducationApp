<!DOCTYPE html>
<html  lang="ru">
<head>
<title>Kotlin и Android | Введение в Jetpack Compose</title>
<meta charset="utf-8" />
<meta name="description" content="Что такое Jetpack Compose,  его основные особенности, создание приложений под Android, декларативный подход, роль языка программирования Kotlin, установка Android Studio">
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
     <h1>Введение в Jetpack Compose</h1><h2>Android и Jetpack Compose</h2><div class="date">Последнее обновление: 07.03.2025</div>
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

	
<p>ОС Android в настоящее время является одной из наиболее распространенных операционных систем и определенно лидирующей на рынке смартфонов. Так, на начало 2024 года ее доля на смартфонах 
оценивается в более чем 70%. А это миллиарды устройств. И кроме смартфонов, данная система присутствует на планшетах, телевизорах, смарт-часах и ряде других устройств.</p>

<p>ОС Андроид была создана разработчиком Энди Рубином (Andy Rubin) в качестве операционной системы для мобильных телефонов и поначалу развивалась в 
рамках компании Android Inc. Но в 2005 году Google покупает Android Inc. и начинает развивать операционную систему с новой силой. Android постоянно 
эволюционирует, и вместе с операционной системой эволюционируют средства и инструменты для разработки. На момент написания данной статьи последней версией является Android 15.0, которая вышла в сентябре 2024 года:</p>
<table class="tab">
	<tr class="tabhead"><td><p>Версия</p></td><td><p>Кодовое имя</p></td><td><p>Дата выпуска</p></td><td><p>Уровень API</p></td></tr>
	<tr><td><p>15.0</p></td><td><p>Vanilla Ice Cream</p></td><td><p>3 сентября 2024</p></td><td><p>34</p></td></tr>
	<tr><td><p>14.0</p></td><td><p>14</p></td><td><p>4 сентября 2023</p></td><td><p>34</p></td></tr>
	<tr><td><p>13.0</p></td><td><p>13</p></td><td><p>15 августа 2022</p></td><td><p>33</p></td></tr>
	<tr><td><p>12L</p></td><td><p>12L</p></td><td><p>март 2022</p></td><td><p>32</p></td></tr>
	<tr><td><p>12.0</p></td><td><p>12</p></td><td><p>4 октября 2021</p></td><td><p>31</p></td></tr>
	<tr><td><p>11.0</p></td><td><p>11</p></td><td><p>8 сентября 2020</p></td><td><p>30</p></td></tr>
	<tr><td><p>10.0</p></td><td><p>10</p></td><td><p>3 сентября 2019</p></td><td><p>29</p></td></tr>
	<tr><td><p>9.0</p></td><td><p>Pie</p></td><td><p>6 августа 2018</p></td><td><p>28</p></td></tr>
	<tr><td><p>8.1</p></td><td><p>Oreo</p></td><td><p>5 декабря 2017</p></td><td><p>27</p></td></tr>
	<tr><td><p>8.0</p></td><td><p>Oreo</p></td><td><p>21 августа 2017</p></td><td><p>26</p></td></tr>
	<tr><td><p>7.1</p></td><td><p>Nougat</p></td><td><p>4 октября 2016</p></td><td><p>25</p></td></tr>
	<tr><td><p>7.0</p></td><td><p>Nougat</p></td><td><p>22 августа 2016</p></td><td><p>24</p></td></tr>
	<tr><td><p>6.0</p></td><td><p>Marshmallow</p></td><td><p>5 октября 2015</p></td><td><p>23</p></td></tr>
	<tr><td><p>5.1</p></td><td><p>Lollipop</p></td><td><p>9 марта 2015</p></td><td><p>22</p></td></tr>
	<tr><td><p>5.0</p></td><td><p>Lollipop</p></td><td><p>3 ноября 2014</p></td><td><p>21</p></td></tr>
	<tr><td><p>4.4</p></td><td><p>KitKat</p></td><td><p>31 октября 2013</p></td><td><p>19</p></td></tr>
	<tr><td><p>4.3</p></td><td><p>Jelly Bean</p></td><td><p>24 июля 2013</p></td><td><p>18</p></td></tr>
	<tr><td><p>4.2</p></td><td><p>Jelly Bean</p></td><td><p>13 ноября 2012</p></td><td><p>17</p></td></tr>
	<tr><td><p>4.1</p></td><td><p>Jelly Bean</p></td><td><p>9 июля 2012</p></td><td><p>16</p></td></tr>
	<tr><td><p>4.0</p></td><td><p>Ice Cream Sandwich</p></td><td><p>16 декабря 2011</p></td><td><p>15</p></td></tr>
	<tr><td><p>2.3</p></td><td><p>Gingerbread</p></td><td><p>6 декабря 2010</p></td><td><p>10</p></td></tr>
</table>
<p>И в связи со столь широким распространнением системы большое значение получает создание приложений под эту систему. Для разработки под Android использовалось и продолжает использоваться большое количество различных инструментов. Иначально 
ключевым языком для создания приложений являлся язык Java. Однако в последствии основным языком стал Kotlin. И в данном руководстве мы как раз и будем рассматривать разработку приложений под 
Android на языке Kotlin с помощью такого инструмента как <span class="b">Jetpack Compose</span>.</p>

<h3>Что такое Jetpack Compose</h3>
<p><span class="b">Jetpack Compose</span> представляет современный тулкит от компании Google для создания приложений под ОС Android на языке программирования Kotlin. 
Jetpack Compose упрощает написание и обновление визуального интерфейса приложения, предоставляя 
декларативный подход.</p>
<p>Операционной системе Android более 10 лет. За этот период API и библиотеки для создания приложений под эту ОС много раз обновлялись, дополнялись, одни API устаревали, другие, наоборот, добавлялись в 
арсенал разработчиков. Но в этоге подобное развитие привело к усложнению платформы. Чтобы упростить разработку, сделать ее более быстрой, простой, упростить поддержку 
компания Google в мае 2019 года анонсировала новый тулкит - <span class="b">Jetpack Compose</span>. В августе 2020 вышла первая альфа-версия тулкита. 
А 28 июля 2021 года вышла первая стабильная версия - <span class="b">Jetpack Compose 1.0</span>, которая является текущей на момент написания данной статьи и 
которая применяется далее в дальнейших статьях данного руководства. Также постоянно выходят подверсии. Например, текущей подверсией на момент написания данной статьи является <span class="b">1.6.2</span> (вышла в январе 2024 г.).</p>
<p>Jetpack совместим с существующим набором библиотек Android, которые можно использовать в стандартных проектах на Java и Kotlin для написания приложений под Android. 
Отличительной же чертой Jetpack Compose является то, что он предлагает кардинально другой подход к созданию приложений под Android.</p>
<p>Прежде всего, Jetpack Compose предлагает использовать язык Kotlin и все его преимущества. Соответственно для работы с тулкитом необходимо иметь базовые знания данного языка. 
Для этого можно обратиться к <a href="https://metanit.com/kotlin/tutorial">руководству по языку Kotlin</a> на этом сайте.</p>
<p>Jetpack уменьшает объем кода, что упрощает управление кода, его поддержку и дальнейшее развитие.</p>
<p>Jetpack Compose предлагает декларативный API, который является более интуитивным.</p>
<p>Jetpack Compose ориентирован на данные (<span class="b">data-driven</span>-подход). В частности, Compose применяет концепцию состояния (state). Данные сохраняются как состояние, 
что гарантирует, что при любые изменения в данных автоматически отразяться на изменении пользовательского интерфейса. Соответственно не потребуется определять какой-то дополнительный код, 
который бы отслеживал наличие изменений.  Любой компонент интерфейса, который обращается к состоянию, подписывается на все изменения этого состояния. И когда состояние изменяется, 
подписанный компонент пересоздается, чтобы отразить изменения в состоянии. Данный процесс еще называется рекомпозиция.</p>
<p>При этом Jetpack Compose совместим с уже имеющимся кодом. Например, можно вызывать код Jetpack Compose из традиционного приложения на Android. 
Большинство стандартных библиотек под Android также работают с Jetpack Compose.</p>
<p>Ключевой концепцией тулкита Jetpack Compose является <span class="b">composable</span>-функция (функция, которая имеет аннотацию <span class="b">@Composable</span>). 
Такие функции представляют некоторые части визуального интерфейса, из которых строится приложение. Это упрощает построение и обновление сложных интерфейсов, тестирование 
и поддержку самих компонентов.</p>
<p>Для создания приложений с Jetpack Compose нам потребуется специальный комплект инструментов <b>Android SDK</b>и такая среда разработки как <b>Android Studio</b>, которая создана специально для разработки под ОС Android и установщик которой можно 
загрузить с официального сайта: <a href="https://developer.android.com/studio" rel="nofollow">https://developer.android.com/studio</a>. Android Studio предоставляет богатый инструментарий для 
создания, отладки и тестирования приложений на Jetpack Compose, предоставляет возможность предпросмотра приложения без запуска на устройстве. Далее мы подробно рассмотрим процесс установки Android Studio на различные операционные системы.</p>
<p>И естественно для тестирования приложений потребуется устройство с ОС Android. Хотя Android Studio позволяет установить и использовать эмулятор устройства, но подобные эмуляторы довольно ресурсоемки (учитывая, 
что сама Android Studio также потребует большин аппаратных ресурсов). Кроме того, ни один эмулятор полноценно не заменит реальное устройство. Поэтому я бы рекомендовал использовать смарфтон или планшет для тестирования приложений.</p>

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

<h3>Архитектура Android</h3>
<p>Архитектуру патформы можно представить следюущим образом:</p>
<img src="./pics/1.16.png" alt="Архитектура Android" style="width:700px;" />
<p>В основе платформы Android лежит ядро Linux. Например, среда выполнения Android Runtime (ART) зависит от ядра Linux при выполнении ключевых функциональностей, как например, управление потоками 
или низкоуровневое управление памятью. Использование Linux упрощает для разработчиков устройств создание драйверов, поскольку Linux - известная платформа.</p>
<p>Hardware abstraction layer (HAL) предоставляет стандартные интерфейсы, которые упрощают для вышележащих слоев (Java API) обращение к оборудованию. HAL состоит из многочисленных 
модулей библиотек, которые реализуют интерйес для работы с определенным аппаратным компонентом, например, с камерой или Bluetooth. Когда API фреймворка обращается к аппаратному компоненту устройства, 
Android загружает библиотечный модуль для этого устройства.</p>
<p>Android Runtime (ART) выполняет приложение Android.
Когда создается приложение Android, то оно обычно компилируется в промежуточный формат байт-кода Dalvik Executable (DEX) - формат байткода, который разработан специально для Android и который потребляет минимальное количество памяти. 
Когда приложение впоследствии загружается на устройство, среда выполнения Android Runtime использует процесс, называемый AOT-компиляцией, для преобразования байт-кода в формате DEX в машинные инструкции, 
которые понятны процессору устройства. Этот формат известен как формат ELF.  При каждом последующем запуске приложения запускается исполняемая версия ELF, что приводит к повышению производительности приложения и увеличению времени автономной работы.</p>
<p>Также Android содержит некотрый набор библиотек выполнения, которые предоставляют функциональность для выполнения кода на Java и Kotlin.</p>
<p>Основные библиотеки Android Runtime основаны на Java и предоставляют основные API-интерфейсы для разработчиков, пишущих приложения для Android. 
Однако важно отметить, что эти библиотеки не выполняют большую часть реальной работы и, по сути, являются Java-обертками для набора библиотек на основе C/C++. 
Например, при вызове библиотеки android.opengl для рисования 3D-графики на дисплее устройства библиотека в конечном итоге обращается к библиотеке OpenGL ES C++, которая, в свою очередь, 
работает с базовым ядром Linux для выполнения задач рисования. Android включает библиотеки C/C++ для выполнения широкого и разнообразного спектра функций, включая рисование 
2D- и 3D-графики, SSL, управление базами данных SQLite, воспроизведение аудио и видео, рендеринг растровых и векторных шрифтов, подсистему отображения и управление графическими слоями 
и реализация стандартной системной библиотеки C (libc).</p>
<p>На практике типичный разработчик приложений Android будет получать доступ к этим библиотекам исключительно через API-интерфейсы на основе Java. 
Если необходим прямой доступ к этим библиотекам, этого можно добиться с помощью Android Native Development Kit (NDK), целью которого является прямой вызов функциональности на C/C++.</p>
<p>Весь набор функций ОС Android доступен через API, написанные на языке Java. Эти API образуют строительные блоки, необходимые для создания приложений Android, 
упрощая повторное использование основных системных компонентов и сервисов. Ключевые сервисы и компоненты:</p>
<ul>
<li><p><span class="b">Activity Manager</span>: управляет жизненным циклом приложения и стеком навигации.</p></li>
<li><p><span class="b">Content Providers</span>: позволяют приложениям публиковать данные и обмениваться ими с другими приложениями.</p></li>
<li><p><span class="b">Resource Manager</span>: обеспечивает доступ к встроенным ресурсам, не связанным с кодом, таким как строки, настройки цвета и макеты пользовательского интерфейса</p></li>
<li><p><span class="b">Notifications Manager</span>: позволяет приложениям отображать пользователю оповещения и уведомления</p></li>
<li><p><span class="b">View System</span>: расширяемый набор представлений, используемый для создания графического интерфейса</p></li>
<li><p><span class="b">Package Manager</span>: система, с помощью которой приложения могут получать информацию о других приложениях, установленных в данный момент на устройстве</p></li>
<li><p><span class="b">Telephony Manager</span>: предоставляет приложению информацию о телефонных услугах, доступных на устройстве, например статус и информацию об абоненте.</p></li>
<li><p><span class="b">Location Manager</span>: обеспечивает доступ к службам определения местоположения, позволяя приложению получать обновления об изменениях местоположения.</p></li>
</ul>
<p>На вершине стека платформы Android находятся приложения. К ним относятся как системные приложения, поставляемые с конкретной реализацией Android (например, веб-браузер и 
приложения электронной почты), так и сторонние приложения, установленные пользователем после покупки устройства.</p>
<h3>Компоненты сборки приложения Android</h3>
<img src="./pics/gradle1.png" alt="Инструменты сборки Gradle в Android Studio" style="width:800px;" />
<p>Сборка Android предполагает следующие три компонента:</p>
<ul>
<li><p>Исходный код Kotlin или Java и используемые ресурсы. Исходный код зависит от библиотек (включая библиотеки Kotlin и среды выполнения Java) и Android SDK и требует соответствующего компилятора Kotlin или Java.</p></li>
<li><p>Библиотеки и прочие зависимости, которые использует исходный код приложения</p></li>
<li><p>Инструменты сборки - это компиляторы, плагины и SDK, которые преобразуют исходный код в приложение или библиотеку. При сборке приложения Android применяются следующие инструменты:</p>
<ul>
<li><p><b>Gradle</b></p>
<p>Для компиляции приложений под Android обычно применяется система сборки Gradle. Gradle считывает файлы с исходным кодом и другие файлы проекта и генерирует приложение или библиотеку.</p>
</li>
<li><p><b>Плагины Gradle</b></p>
<p>Плагины Gradle расширяют функциональность Gradle, определяя новые задачи и конфигурацию. Применение плагина к сборке позволяет задействовать определенные возможности сборки, которые 
можно настроить в ваших сборки. Для сборок Android наиболее важным плагином Gradle является плагин <b>Android Gradle</b> (AGP).</p></li>

<li><p><b>Компиляторы</b></p>
<p>Компилятор Kotlin или Java преобразует исходный код в исполняемый байт-код. Компилятор Kotlin предоставляет API плагина, который позволяет выполнять внешний анализ и генерацию кода с помощью компилятора, получая доступ к проанализированной структуре кода.</p></li>

<li><p><b>Плагины компилятора</b>
<p>
Плагины компилятора выполняют анализ и генерацию кода, пока компилятор Kotlin анализирует исходный код, и устанавливаются при применении их плагины Gradle к сборке.</p></p>

<li><p><b>Android SDK</b></p>
<p>
Android SDK содержит API платформы Android и Java для определенной версии Android, а также соответствующие инструменты. Эти инструменты помогают управлять SDK, 
создавать приложения, взаимодействовать с устройствами Android и эмуляторами. Каждая версия Android SDK предоставляет определенные API Java, к которым может получить доступ исходный код.</p>
</li>

<li><p><b>JDK</b></p>
<p>Набор инструментов для разработки на Java, который содержит библиотеки и исполняемые файлы для компиляции исходного кода Java и запуска приложений Java. 
В сборке Android задействовано несколько JDK.</p></li>
</ul>
</li>
</ul>

	

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

	<div class="nav"><p><a href="./">Содержание</a><a href="./1.4.php">Вперед</a></p></div>
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
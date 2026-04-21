package vitos.example.myeducationapp.logic.android

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

fun registerAndroidBasics() {
    val course = "android"

    // 1.1. Архитектура и Жизненный цикл Android
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "android_1.1"
        override val courseId = course
        override val title = "Архитектура и Жизненный цикл Android"
        override val description = "Как устроена система и основные состояния экрана приложения."
        override val sections = listOf(
            LessonSection(SectionType.TEXT, "Android — это открытая мобильная операционная система на базе ядра Linux. Её архитектура состоит из уровней: Linux Kernel, HAL, ART (Runtime), Framework и Applications."),
            LessonSection(SectionType.SUBHEADER, "Жизненный цикл Activity"),
            LessonSection(SectionType.IMAGE, "https://developer.android.com/guide/components/images/activity_lifecycle.png", "Схема жизненного цикла Activity"),
            LessonSection(SectionType.TEXT, "Activity — это базовый компонент Android, представляющий один экран. Она проходит через набор состояний:"),
            LessonSection(SectionType.TEXT, "• onCreate(): вызывается при создании.\n• onStart(): становится видимым для пользователя.\n• onResume(): доступно для взаимодействия.\n• onPause(): частично перекрыто другим экраном.\n• onStop(): полностью скрыто.\n• onDestroy(): окончательное уничтожение ресурса.")
        )
        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            println("Симуляция жизненного цикла:")
            println("onCreate() -> onStart() -> onResume()")
            println("Приложение запущено и готово к работе.")
        }
    })

    // 1.2. Современный UI: Основы Jetpack Compose
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "android_1.2"
        override val courseId = course
        override val title = "Современный UI: Основы Jetpack Compose"
        override val description = "Декларативный подход к созданию интерфейсов на Kotlin."
        override val sections = listOf(
            LessonSection(SectionType.TEXT, "Jetpack Compose — это современный инструментарий для создания нативного UI в Android. Вместо XML-разметки мы используем только код на Kotlin."),
            LessonSection(SectionType.SUBHEADER, "Компонуемые функции"),
            LessonSection(SectionType.TEXT, "Любой элемент интерфейса — это функция, помеченная аннотацией @Composable."),
            LessonSection(SectionType.CODE, """
                @Composable
                fun UserProfile(name: String) {
                    Column(modifier = Modifier.padding(16.dp)) {
                        Text(text = "Пользователь: ${'$'}{name}")
                        Button(onClick = { /* действие */ }) {
                            Text("Подписаться")
                        }
                    }
                }
            """.trimIndent(), tag = "compose_example"),
            LessonSection(SectionType.SUBHEADER, "Основные компоненты"),
            LessonSection(SectionType.TEXT, "• Box: накладывает элементы друг на друга.\n• Column: располагает элементы вертикально.\n• Row: располагает элементы горизонтально."),
            LessonSection(SectionType.TEXT, "Вся эта обучалка написана на Compose!")
        )
        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            if (tag == "compose_example") {
                println("Рендеринг компонента UserProfile...")
                println("Компонент успешно отрисован.")
            } else {
                println("Jetpack Compose — это будущее Android разработки.")
            }
        }
    })
}

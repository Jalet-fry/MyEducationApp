package vitos.example.myeducationapp.logic.kotlin.functions

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

fun registerFunctions() {
    val course = "kotlin"

    // 1. Основы функций
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "3.1"
        override val courseId = course
        override val title = "Функции: Параметры и возвращаемые значения"
        override val description = "Объявление функций, именованные и дефолтные аргументы."
        override val parameters = listOf(
            Parameter("p1", "Число 1", ParameterType.INT, "10"),
            Parameter("p2", "Число 2", ParameterType.INT, "20")
        )
        override val sections = listOf(
            LessonSection(SectionType.CODE, """
                fun sum(a: Int, b: Int): Int = a + b
                println("Сумма: " + sum({{p1}}, {{p2}}))
            """.trimIndent())
        )
        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val a = params.getInt("p1")
            val b = params.getInt("p2")
            println("Результат выполнения функции sum: ${a + b}")
        }
    })

    // 2. Лямбды и функции высшего порядка
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "3.2"
        override val courseId = course
        override val title = "Лямбда-выражения"
        override val description = "Анонимные функции и передача логики как параметра."
        override val parameters = listOf(
            Parameter("name", "Имя", ParameterType.STRING, "Kotlin")
        )
        override val sections = listOf(
            LessonSection(SectionType.CODE, """
                val greet = { n: String -> "Привет, ${'$'}n!" }
                println(greet("{{name}}"))
            """.trimIndent())
        )
        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val name = params.getString("name")
            println("Привет, $name!")
        }
    })
}

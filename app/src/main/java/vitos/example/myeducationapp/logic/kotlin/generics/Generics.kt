package vitos.example.myeducationapp.logic.kotlin.generics

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

fun registerGenerics() {
    val course = "kotlin"

    // 6.1. Обобщения (Generics)
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "6.1"
        override val courseId = course
        override val title = "Обобщения (Generics)"
        override val description = "Создание универсальных классов и функций."
        override val parameters = listOf(
            Parameter("item", "Данные", ParameterType.STRING, "Hello World")
        )
        override val sections = listOf(
            LessonSection(SectionType.CODE, """
                class Box<T>(val value: T)
                val box = Box("{{item}}")
                println("В коробке: " + box.value)
            """.trimIndent())
        )
        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val item = params.getString("item")
            println("Результат: Box хранит значение: $item")
        }
    })
}

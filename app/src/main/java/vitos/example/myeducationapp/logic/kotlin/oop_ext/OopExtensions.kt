package vitos.example.myeducationapp.logic.kotlin.oop_ext

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

fun registerOopExtensions() {
    val course = "kotlin"

    // 5.1. Extension-функции
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "5.1"
        override val courseId = course
        override val title = "Функции-расширения"
        override val description = "Добавление новой функциональности существующим классам."
        override val parameters = listOf(
            Parameter("text", "Исходный текст", ParameterType.STRING, "hello")
        )
        override val sections = listOf(
            LessonSection(SectionType.CODE, """
                fun String.shout() = this.uppercase() + "!!!"
                println("{{text}}".shout())
            """.trimIndent())
        )
        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val text = params.getString("text")
            println("Результат расширения: ${text.uppercase()}!!!")
        }
    })
}

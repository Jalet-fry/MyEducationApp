package vitos.example.myeducationapp.logic.kotlin.generics

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

/**
 * Урок 8: Дженерики. Вариантность и Reified.
 */
fun registerGenerics() {
    val course = "kotlin"

    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "8.1"
        override val courseId = course
        override val title = "Generics и Вариантность"
        override val description = "Параметризация типов, ключевые слова 'in' и 'out'."
        override val isAutoExecute = true

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "Generic классы"),
            LessonSection(SectionType.TEXT, """
                Дженерики позволяют создавать классы и функции, которые работают с разными типами данных, сохраняя типобезопасность.
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                class Box<T>(val item: T)
                
                val intBox = Box(10)
                val strBox = Box("Hello")
            """.trimIndent(), tag = "generics_basic"),

            LessonSection(SectionType.HEADER, "Вариантность (out / in)"),
            LessonSection(SectionType.TEXT, """
                • `out T` (Ковариантность) — позволяет использовать подтип вместо базового типа (только для чтения).
                • `in T` (Контравариантность) — позволяет использовать базовый тип вместо подтипа (только для записи).
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                interface Producer<out T> {
                    fun produce(): T
                }
                
                interface Consumer<in T> {
                    fun consume(item: T)
                }
            """.trimIndent(), tag = "variance_logic")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            println("--- Log: Generics ---")
            class Box<T>(val item: T)
            val b = Box("Test")
            println("Box содержит: ${b.item}")
            
            println("\n--- Log: Variance ---")
            println("out T (Producer) гарантирует, что мы только отдаем T.")
            println("in T (Consumer) гарантирует, что мы только принимаем T.")
        }
    })
}

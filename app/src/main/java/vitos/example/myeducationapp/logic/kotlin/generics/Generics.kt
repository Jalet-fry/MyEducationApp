package vitos.example.myeducationapp.logic.kotlin.generics

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

fun registerGenerics() {
    val course = "kotlin"

    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "8.1" // Соответствует главе 8 в новом плане
        override val courseId = course
        override val title = "Обобщения (Generics) Deep Dive"
        override val description = "Универсальные типы, ограничения и вариантивность (in/out)"
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("numericVal", "Число для Box", ParameterType.INT, "42"),
            Parameter("stringVal", "Строка для Box", ParameterType.STRING, "Kotlin")
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "1. Обобщенные классы"),
            LessonSection(SectionType.TEXT, "Generics позволяют типам быть параметрами. Это обеспечивает типобезопасность без дублирования кода."),
            LessonSection(SectionType.CODE, """
                class Box<T>(val value: T)
                val intBox = Box({{numericVal}})
                val strBox = Box("{{stringVal}}")
                println("IntBox: ${'$'}{intBox.value}, StrBox: ${'$'}{strBox.value}")
            """.trimIndent(), tag = "basic"),

            LessonSection(SectionType.HEADER, "2. Ограничения типов (Constraints)"),
            LessonSection(SectionType.TEXT, "Вы можете ограничить тип T, чтобы он наследовался от определенного класса или интерфейса (например, Number)."),
            LessonSection(SectionType.CODE, """
                fun <T : Number> sum(a: T, b: T): Double {
                    return a.toDouble() + b.toDouble()
                }
                println("Сумма: " + sum({{numericVal}}, 10.5))
            """.trimIndent(), tag = "constraints"),

            LessonSection(SectionType.HEADER, "3. Вариантность (out / in)"),
            LessonSection(SectionType.TEXT, "out T (ковариантность) позволяет только возвращать T. in T (контравариантность) позволяет только принимать T."),
            LessonSection(SectionType.CODE, """
                interface Producer<out T> { fun produce(): T }
                interface Consumer<in T> { fun consume(item: T) }
                
                println("out T: позволяет использовать подклассы там, где ожидается суперкласс.")
                println("in T: наоборот, позволяет использовать суперклассы там, где ожидается подкласс.")
            """.trimIndent(), tag = "variance")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val n = params.getInt("numericVal")
            val s = params.getString("stringVal")

            when (tag) {
                "basic" -> {
                    println("Создано два объекта Box:")
                    println("Box<Int> со значением $n")
                    println("Box<String> со значением $s")
                }
                "constraints" -> {
                    val result = n + 10.5
                    println("T ограничен типом Number.")
                    println("Результат sum($n, 10.5) = $result")
                }
                "variance" -> {
                    println("Пример out: List<out T> в Kotlin.")
                    println("Пример in: Comparable<in T>.")
                    println("Это позволяет безопасно работать с иерархией типов в коллекциях.")
                }
            }
        }
    })
}

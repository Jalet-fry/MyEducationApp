package vitos.example.myeducationapp.logic.kotlin.functions

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

fun registerFunctions() {
    val course = "kotlin"

    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "3.1"
        override val courseId = course
        override val title = "Функции и Функциональное программирование"
        override val description = "От базовых функций до лямбд и замыканий"
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("valX", "Число X", ParameterType.INT, "10"),
            Parameter("valY", "Число Y", ParameterType.INT, "5"),
            Parameter("operation", "Операция (лямбда)", ParameterType.STRING, "{ a, b -> a + b }"),
            Parameter("prefix", "Префикс вывода", ParameterType.STRING, "Результат:")
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "1. Основы и Vararg"),
            LessonSection(SectionType.TEXT, "Функции определяются через fun. Параметры по умолчанию позволяют не передавать значения, а vararg — принимать любое количество аргументов."),
            LessonSection(SectionType.CODE, """
                fun printAll(vararg numbers: Int, prefix: String = "Log:") {
                    for (n in numbers) println("${'$'}prefix ${'$'}n")
                }
                printAll({{valX}}, {{valY}}, 100, prefix = "{{prefix}}")
            """.trimIndent(), tag = "basics"),

            LessonSection(SectionType.HEADER, "2. Лямбды и Тип функции"),
            LessonSection(SectionType.TEXT, "Лямбда — это анонимная функция, которую можно передавать как переменную. Тип функции записывается как (Int, Int) -> Int."),
            LessonSection(SectionType.CODE, """
                val action: (Int, Int) -> Int = {{operation}}
                val res = action({{valX}}, {{valY}})
                println("{{prefix}} ${'$'}res")
            """.trimIndent(), tag = "lambdas"),

            LessonSection(SectionType.HEADER, "3. Функции высшего порядка"),
            LessonSection(SectionType.TEXT, "Это функции, которые принимают другие функции в качестве параметров или возвращают их."),
            LessonSection(SectionType.CODE, """
                fun calculate(a: Int, b: Int, op: (Int, Int) -> Int): Int {
                    return op(a, b)
                }
                val finalResult = calculate({{valX}}, {{valY}}, {{operation}})
                println("Высший порядок: ${'$'}finalResult")
            """.trimIndent(), tag = "higher_order"),

            LessonSection(SectionType.HEADER, "4. Замыкания (Closures)"),
            LessonSection(SectionType.TEXT, "Функция может захватывать переменные из своей внешней области видимости."),
            LessonSection(SectionType.CODE, """
                var counter = 0
                val inc = { 
                    counter += {{valX}}
                    println("Counter: ${'$'}counter")
                }
                inc(); inc()
            """.trimIndent(), tag = "closures")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val x = params.getInt("valX")
            val y = params.getInt("valY")
            val pref = params.getString("prefix")
            val opStr = params.getString("operation")

            when (tag) {
                "basics" -> {
                    println("$pref $x")
                    println("$pref $y")
                    println("$pref 100")
                }
                "lambdas", "higher_order" -> {
                    // Имитируем выполнение лямбды. 
                    // В реальном приложении здесь был бы интерпретатор, 
                    // но мы имитируем логику на основе строки для обучения.
                    val result = when {
                        opStr.contains("+") -> x + y
                        opStr.contains("-") -> x - y
                        opStr.contains("*") -> x * y
                        opStr.contains("/") -> if (y != 0) x / y else 0
                        else -> x + y
                    }
                    println("$pref $result")
                }
                "closures" -> {
                    var counter = 0
                    counter += x
                    println("Итерация 1: $counter")
                    counter += x
                    println("Итерация 2: $counter")
                    println("Переменная 'counter' была захвачена лямбдой.")
                }
            }
        }
    })
}

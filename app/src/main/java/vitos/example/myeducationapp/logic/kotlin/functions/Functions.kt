package vitos.example.myeducationapp.logic.kotlin.functions

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

/**
 * Урок 2: Функции в Kotlin. Лямбды, Extension-функции и Inlining.
 */
fun registerFunctions() {
    val course = "kotlin"

    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "2.1"
        override val courseId = course
        override val title = "Функции: Extension и Infix"
        override val description = "Как расширять классы без наследования и создавать читаемый DSL."
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("prefix", "Префикс строки", ParameterType.STRING, "KT"),
            Parameter("number", "Число для проверки", ParameterType.INT, "10")
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "Extension Functions (Функции расширения)"),
            LessonSection(SectionType.TEXT, """
                Котлин позволяет добавлять новые функции в существующие классы (даже в `String` или `Int`) без изменения их исходного кода.
                Это делается через синтаксис `T.functionName`.
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                // Добавляем метод в класс String
                fun String.withPrefix(p: String) = "${'$'}p: ${'$'}this"
                
                val myStr = "Hello"
                println(myStr.withPrefix("{{prefix}}"))
            """.trimIndent(), tag = "extension_logic"),

            LessonSection(SectionType.HEADER, "Infix Functions"),
            LessonSection(SectionType.TEXT, """
                Функции с одним параметром можно пометить ключевым словом `infix`. 
                Это позволяет вызывать их без точек и скобок, что делает код похожим на естественный язык.
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                infix fun Int.add(x: Int) = this + x
                
                val result = 10 add 20 // Красиво!
                println("Результат 10 add 20: ${'$'}result")
            """.trimIndent(), tag = "infix_logic")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            when (tag) {
                "extension_logic" -> {
                    val prefix = params.getString("prefix")
                    println("--- Результат выполнения ---")
                    println("Строка \"Hello\".withPrefix(\"$prefix\")")
                    println("Итог: ${"Hello".withPrefixLocal(prefix)}")
                }
                "infix_logic" -> {
                    val a = 10
                    val b = 20
                    println("--- Инфиксный вызов ---")
                    println("$a addLocal $b = ${a addLocal b}")
                }
            }
        }
    })

    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "2.2"
        override val courseId = course
        override val title = "Inline функции и Лямбды"
        override val description = "Оптимизация производительности: inline, noinline, crossinline."
        override val isAutoExecute = true

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "Почему важен inline?"),
            LessonSection(SectionType.TEXT, """
                При использовании лямбд в обычном режиме Котлин создает объекты (анонимные классы), что нагружает память.
                `inline` говорит компилятору вставить код функции и лямбды прямо в место вызова.
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                inline fun calculate(a: Int, b: Int, operation: (Int, Int) -> Int): Int {
                    return operation(a, b)
                }
                
                val res = calculate(5, 5) { x, y -> x * y }
                println("Результат: ${'$'}res")
            """.trimIndent(), tag = "inline_logic")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            println("--- Log: Inline оптимизация ---")
            println("В рантайме мы не видим разницы, но на уровне байт-кода")
            println("объект лямбды не создается. Это критично для циклов.")
            
            val r = localCalc(5, 5) { x, y -> x * y }
            println("Выполнено: 5 * 5 = $r")
        }
    })
}

// Выносим из execute, так как локальные inline и расширения имеют ограничения
private fun String.withPrefixLocal(p: String) = "$p: $this"
private infix fun Int.addLocal(x: Int) = this + x
private inline fun localCalc(a: Int, b: Int, op: (Int, Int) -> Int) = op(a, b)

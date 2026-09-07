package vitos.example.myeducationapp.logic.kotlin.basics

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

/**
 * Урок 1: Основы Kotlin. Переменные, Типы и Null Safety.
 */
fun registerBasics() {
    val course = "kotlin"

    // --- 1.1 ПЕРЕМЕННЫЕ И ТИПЫ ДАННЫХ ---
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "1.1"
        override val courseId = course
        override val title = "Переменные и Null Safety"
        override val description = "Глубокое погружение в типы, иммутабельность и безопасность работы с null."
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("userName", "Имя (может быть пустым)", ParameterType.STRING, "Tom"),
            Parameter("userAge", "Возраст", ParameterType.INT, "25", 0f, 150f),
            Parameter("allowNull", "Разрешить null?", ParameterType.BOOLEAN, "false")
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "val vs var и Type Inference"),
            LessonSection(SectionType.TEXT, """
                В Kotlin два ключевых слова для объявления:
                • **val** — immutable (только для чтения, аналог final).
                • **var** — mutable (можно менять).
                
                **Type Inference:** Котлин сам понимает тип, если значение присвоено сразу.
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                val name = "{{userName}}" // String
                var age = {{userAge}}    // Int
                
                // age = "30" // Ошибка компиляции: несоответствие типов
                age += 1    // var менять можно
            """.trimIndent(), tag = "vars_logic"),

            LessonSection(SectionType.HEADER, "Null Safety: Революция в Kotlin"),
            LessonSection(SectionType.TEXT, """
                Котлин разделяет типы на **Nullable** (могут быть null) и **Non-Nullable** (не могут).
                Это исключает NullPointerException в рантайме.
                
                Операторы:
                • `?.` — безопасный вызов (Safe Call).
                • `?:` — оператор Элвиса (Elvis Operator).
                • `!!` — утверждение не-null (Not-null assertion, опасно!).
                • `as?` — безопасное приведение типов.
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                val input: String? = if ({{allowNull}}) null else "{{userName}}"
                
                // 1. Safe call
                val length = input?.length 
                println("Длина через ?.: ${'$'}length")
                
                // 2. Elvis operator
                val displayName = input ?: "Анонимный пользователь"
                println("Имя: ${'$'}displayName")
                
                // 3. Smart Cast
                if (input != null) {
                    // Здесь input автоматически стал String (не String?)
                    println("В верхнем регистре: ${'$'}{input.uppercase()}")
                }
            """.trimIndent(), tag = "null_safety_logic")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            when (tag) {
                "vars_logic" -> {
                    val name = params.getString("userName")
                    var age = params.getInt("userAge")
                    println("--- Log: Работа с переменными ---")
                    println("val name: String = \"$name\"")
                    println("var age: Int = $age")
                    age += 1
                    println("После age += 1, возраст: $age")
                }
                "null_safety_logic" -> {
                    val allowNull = params.getBool("allowNull")
                    val rawName = params.getString("userName")
                    
                    // РЕАЛЬНАЯ ЛОГИКА NULL SAFETY
                    val input: String? = if (allowNull) null else rawName
                    
                    println("--- Log: Реальное выполнение Null Safety ---")
                    println("Входные данные: ${if (input == null) "null" else "\"$input\""}")
                    
                    // Safe call
                    val length = input?.length
                    println("Результат input?.length: ${length ?: "null"}")
                    
                    // Elvis
                    val displayName = input ?: "Анонимный пользователь"
                    println("Результат input ?: \"Анонимный пользователь\": $displayName")
                    
                    // Smart Cast
                    if (input != null) {
                        println("Smart Cast сработал! input.uppercase(): ${input.uppercase()}")
                    } else {
                        println("Smart Cast не сработал, так как input == null")
                    }
                }
            }
        }
    })

    // --- 1.2 УПРАВЛЕНИЕ ПОТОКОМ КАК ВЫРАЖЕНИЯ ---
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "1.2"
        override val courseId = course
        override val title = "Управляющие конструкции"
        override val description = "if, when и try-catch как выражения. Диапазоны (Ranges)."
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("score", "Баллы (0-100)", ParameterType.INT, "85", 0f, 100f),
            Parameter("dayNumber", "День недели (1-10)", ParameterType.INT, "1", 1f, 10f)
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "if и when — это выражения"),
            LessonSection(SectionType.TEXT, """
                В Kotlin `if` и `when` возвращают значение. Это позволяет писать более лаконичный код.
                `when` — мощная замена `switch`, которая может проверять диапазоны и типы.
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                val score = {{score}}
                
                // if как выражение
                val result = if (score >= 50) "Pass" else "Fail"
                
                // when как выражение
                val grade = when(score) {
                    in 90..100 -> "A"
                    in 70..89  -> "B"
                    in 50..69  -> "C"
                    else       -> "F"
                }
                println("Score: ${'$'}score, Result: ${'$'}result, Grade: ${'$'}grade")
            """.trimIndent(), tag = "control_flow_logic"),

            LessonSection(SectionType.HEADER, "Циклы и Диапазоны (Ranges)"),
            LessonSection(SectionType.TEXT, """
                Kotlin предоставляет удобные способы итерации:
                • `1..5` — диапазон [1, 5].
                • `1 until 5` — диапазон [1, 5) (без 5).
                • `step` — шаг итерации.
                • `downTo` — обратный отсчет.
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                println("Простой диапазон (1..5):")
                for (i in 1..5) print("${'$'}i ")
                
                println("\nС шагом 2:")
                for (i in 1..10 step 2) print("${'$'}i ")
            """.trimIndent(), tag = "ranges_logic")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, print ->
            when (tag) {
                "control_flow_logic" -> {
                    val score = params.getInt("score")
                    
                    val result = if (score >= 50) "Pass" else "Fail"
                    val grade = when(score) {
                        in 90..100 -> "A"
                        in 70..89  -> "B"
                        in 50..69  -> "C"
                        else       -> "F"
                    }
                    println("--- Выполнение логики ---")
                    println("Результат проверки score=$score:")
                    println("result = $result")
                    println("grade = $grade")
                }
                "ranges_logic" -> {
                    println("--- Итерация по диапазонам ---")
                    print("1..5: ")
                    for (i in 1..5) print("$i ")
                    println()
                    print("1 until 5: ")
                    for (i in 1 until 5) print("$i ")
                    println()
                    print("10 downTo 1 step 3: ")
                    for (i in 10 downTo 1 step 3) print("$i ")
                }
            }
        }
    })
}

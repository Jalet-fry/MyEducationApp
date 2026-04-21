package vitos.example.myeducationapp.logic.kotlin.basics

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

fun registerBasics() {
    val course = "kotlin"

    // --- ГЛАВА 1-2: ВВЕДЕНИЕ И ПЕРЕМЕННЫЕ ---
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "2.1"
        override val courseId = course
        override val title = "1. Переменные и типы данных"
        override val description = "Объявление переменных (val/var), базовые типы и операции"
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("userName", "Имя (String)", ParameterType.STRING, "Tom"),
            Parameter("userAge", "Возраст (Int)", ParameterType.INT, "25"),
            Parameter("valA", "Число A", ParameterType.INT, "10"),
            Parameter("valB", "Число B", ParameterType.INT, "5")
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "Переменные: val и var"),
            LessonSection(SectionType.TEXT, "Для хранения данных в Kotlin применяются переменные. val — это константа (только для чтения), var — изменяемая переменная."),
            LessonSection(SectionType.CODE, """
                val name: String = {{userName}}
                var age: Int = {{userAge}}
                println("Имя: ${'$'}name, Возраст: ${'$'}age")
            """.trimIndent(), tag = "vars"),

            LessonSection(SectionType.HEADER, "Типы данных и операции"),
            LessonSection(SectionType.TEXT, "Kotlin имеет набор встроенных типов: Int, Double, Boolean, String и др. Арифметические операции: +, -, *, /, %."),
            LessonSection(SectionType.CODE, """
                val a = {{valA}}
                val b = {{valB}}
                println("${'$'}a + ${'$'}b = ${'$'}{a + b}")
                println("${'$'}a / ${'$'}b = ${'$'}{a.toDouble() / b}")
            """.trimIndent(), tag = "math")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            when (tag) {
                "vars" -> {
                    val name = params.getString("userName")
                    val age = params.getInt("userAge")
                    println("Результат: Имя: $name, Возраст: $age")
                }
                "math" -> {
                    val a = params.getInt("valA")
                    val b = params.getInt("valB")
                    println("$a + $b = ${a + b}")
                    if (b != 0) println("$a / $b = ${a.toDouble() / b}")
                    else println("Ошибка: деление на ноль")
                }
            }
        }
    })

    // --- ГЛАВА 2: УСЛОВНЫЕ КОНСТРУКЦИИ ---
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "2.2"
        override val courseId = course
        override val title = "2. Управляющие конструкции"
        override val description = "Условные выражения, конструкции if...else и when"
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("score", "Баллы (0-100)", ParameterType.INT, "75"),
            Parameter("day", "День недели (1-7)", ParameterType.INT, "1")
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "Конструкция if...else"),
            LessonSection(SectionType.TEXT, "if проверяет условие и направляет выполнение программы."),
            LessonSection(SectionType.CODE, """
                val score = {{score}}
                val result = if (score >= 50) "Сдал" else "Не сдал"
                println("Результат теста: ${'$'}result")
            """.trimIndent(), tag = "if_else"),

            LessonSection(SectionType.HEADER, "Конструкция when"),
            LessonSection(SectionType.TEXT, "when — это мощная замена switch."),
            LessonSection(SectionType.CODE, """
                val day = {{day}}
                val message = when(day) {
                    in 1..5 -> "Будний день"
                    6, 7 -> "Выходной"
                    else -> "Неверный день"
                }
                println(message)
            """.trimIndent(), tag = "when_logic")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            when (tag) {
                "if_else" -> {
                    val score = params.getInt("score")
                    println("Результат теста: ${if (score >= 50) "Сдал" else "Не сдал"}")
                }
                "when_logic" -> {
                    val day = params.getInt("day")
                    val msg = when(day) {
                        in 1..5 -> "Будний день"
                        6, 7 -> "Выходной"
                        else -> "Неверный день"
                    }
                    println("День $day: $msg")
                }
            }
        }
    })

    // --- ГЛАВА 2: ЦИКЛЫ, ДИАПАЗОНЫ И МАССИВЫ ---
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "2.3"
        override val courseId = course
        override val title = "3. Циклы, диапазоны и массивы"
        override val description = "Перебор данных с помощью for, while и работа с массивами"
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("count", "Количество повторов", ParameterType.INT, "5"),
            Parameter("step", "Шаг цикла", ParameterType.INT, "1"),
            Parameter("names", "Массив имен", ParameterType.ARRAY_STRING, "Tom, Alice, Bob")
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "Циклы и диапазоны"),
            LessonSection(SectionType.CODE, """
                val n = {{count}}
                val s = {{step}}
                for (i in 1..n step s) {
                    print("${'$'}i ")
                }
            """.trimIndent(), tag = "loops"),

            LessonSection(SectionType.HEADER, "Массивы (Array)"),
            LessonSection(SectionType.CODE, """
                val people = arrayOf({{names}})
                println("Первый человек: ${'$'}{people[0]}")
                println("Всего имен: ${'$'}{people.size}")
            """.trimIndent(), tag = "arrays")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, print ->
            when (tag) {
                "loops" -> {
                    val n = params.getInt("count")
                    val s = params.getInt("step").coerceAtLeast(1)
                    for (i in 1..n step s) {
                        print("$i ")
                    }
                }
                "arrays" -> {
                    val names = params["names"] as? List<*> ?: emptyList<String>()
                    if (names.isNotEmpty()) {
                        println("Первый человек: ${names[0]}")
                        println("Всего имен: ${names.size}")
                        println("Список: ${names.joinToString(", ")}")
                    } else {
                        println("Массив пуст")
                    }
                }
            }
        }
    })
}

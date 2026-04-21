package vitos.example.myeducationapp.logic.kotlin.collections

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

fun registerCollections() {
    val course = "kotlin"

    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "7.1"
        override val courseId = course
        override val title = "Работа с коллекциями"
        override val description = "Списки, множества, мапы и операции трансформации данных"
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("rawItems", "Элементы (через запятую)", ParameterType.ARRAY_STRING, "Tom, Alice, Bob, Alex, Sam"),
            Parameter("filterLen", "Мин. длина имени", ParameterType.INT, "3"),
            Parameter("search", "Поиск подстроки", ParameterType.STRING, "A")
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "1. Списки (List) и Множества (Set)"),
            LessonSection(SectionType.CODE, """
                val items = listOf({{rawItems}})
                val unique = items.toSet()
                println("Всего: ${'$'}{items.size}, Уникальных: ${'$'}{unique.size}")
            """.trimIndent(), tag = "base"),

            LessonSection(SectionType.HEADER, "2. Фильтрация и Поиск"),
            LessonSection(SectionType.CODE, """
                val items = listOf({{rawItems}})
                val filtered = items.filter { it.length >= {{filterLen}} }
                val searchResult = items.find { it.contains({{search}}, ignoreCase = true) }
                println("Длина >= {{filterLen}}: ${'$'}filtered")
            """.trimIndent(), tag = "filter"),

            LessonSection(SectionType.HEADER, "3. Трансформация и Группировка"),
            LessonSection(SectionType.CODE, """
                val items = listOf({{rawItems}})
                val upper = items.map { it.uppercase() }
                val grouped = items.groupBy { it.first() }
                println("Группировка по букве: ${'$'}grouped")
            """.trimIndent(), tag = "transform")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val items = params["rawItems"] as? List<*> ?: emptyList<String>()
            
            when (tag) {
                "base" -> {
                    val unique = items.toSet()
                    println("Список: $items")
                    println("Множество (Set): $unique")
                    println("Размер: ${items.size} (всего) / ${unique.size} (уникальных)")
                }
                "filter" -> {
                    val len = params.getInt("filterLen")
                    val search = params.getString("search")
                    val filtered = items.filter { (it as? String)?.length ?: 0 >= len }
                    val found = items.find { (it as? String)?.contains(search, ignoreCase = true) == true }
                    println("Отфильтровано (длина >= $len): $filtered")
                    println("Результат поиска '$search': ${found ?: "не найдено"}")
                }
                "transform" -> {
                    val upper = items.map { it.toString().uppercase() }
                    val grouped = items.groupBy { it.toString().first() }
                    println("Трансформация (map): $upper")
                    println("Группировка (groupBy): $grouped")
                }
            }
        }
    })
}

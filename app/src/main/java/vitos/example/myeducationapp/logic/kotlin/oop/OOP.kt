package vitos.example.myeducationapp.logic.kotlin.oop

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

/**
 * Урок 3: ООП в Котлине. Конструкторы, Свойства и Наследование.
 */
fun registerOOP() {
    val course = "kotlin"

    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "3.1"
        override val courseId = course
        override val title = "Классы и Конструкторы"
        override val description = "Primary/Secondary конструкторы, блоки init и кастомные геттеры."
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("name", "Имя персонажа", ParameterType.STRING, "Geralt"),
            Parameter("level", "Уровень", ParameterType.INT, "1", 1f, 100f)
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "Конструкторы и Свойства"),
            LessonSection(SectionType.TEXT, """
                В Котлине свойства (fields) объявляются прямо в заголовке класса (Primary constructor).
                Блок `init` выполняется при создании объекта.
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                class Hero(val name: String, var level: Int) {
                    val isStrong: Boolean
                        get() = level > 50 // Кастомный геттер
                        
                    init {
                        println("Герой ${'$'}name создан!")
                    }
                }
                
                val hero = Hero("{{name}}", {{level}})
                println("Сильный? ${'$'}{hero.isStrong}")
            """.trimIndent(), tag = "class_logic")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val name = params.getString("name")
            val level = params.getInt("level")
            
            println("--- Создание объекта ---")
            class Hero(val n: String, var l: Int) {
                val isStrong get() = l > 50
                init { println("Init: Герой $n (ур. $l) инициализирован.") }
            }
            
            val h = Hero(name, level)
            println("Результат геттера isStrong: ${h.isStrong}")
        }
    })

    registerAdvancedClasses()
}

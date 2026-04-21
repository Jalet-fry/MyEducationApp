package vitos.example.myeducationapp.logic.kotlin.oop

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

fun registerOOP() {
    val course = "kotlin"

    // 4.1. Классы и конструкторы
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "4.1"
        override val courseId = course
        override val title = "Классы и объекты"
        override val description = "Создание классов, свойства и инициализация объектов."
        override val parameters = listOf(
            Parameter("name", "Имя питомца", ParameterType.STRING, "Рекс")
        )
        override val sections = listOf(
            LessonSection(SectionType.CODE, """
                class Dog(val name: String) {
                    fun bark() = "Гав! Меня зовут ${'$'}name"
                }
                val myDog = Dog("{{name}}")
                println(myDog.bark())
            """.trimIndent())
        )
        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val name = params.getString("name")
            println("Собака говорит: Гав! Меня зовут $name")
        }
    })

    // 4.2. Наследование
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "4.2"
        override val courseId = course
        override val title = "Наследование и Полиморфизм"
        override val description = "Ключевое слово open, переопределение методов."
        override val parameters = listOf(
            Parameter("type", "Тип животного", ParameterType.STRING, "Кот")
        )
        override val sections = listOf(
            LessonSection(SectionType.CODE, """
                open class Animal(val type: String) {
                    open fun sound() = "Звук..."
                }
                class Cat : Animal("Кот") {
                    override fun sound() = "Мяу!"
                }
                println("{{type}} издает звук...")
            """.trimIndent())
        )
        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val type = params.getString("type")
            val sound = if (type.lowercase() == "кот") "Мяу!" else "Звук..."
            println("$type издает звук: $sound")
        }
    })
}

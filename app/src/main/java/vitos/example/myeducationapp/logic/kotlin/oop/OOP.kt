package vitos.example.myeducationapp.logic.kotlin.oop

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

fun registerOOP() {
    val course = "kotlin"

    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "4.1"
        override val courseId = course
        override val title = "Объектно-Ориентированное Программирование"
        override val description = "Классы, наследование, интерфейсы и Null Safety"
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("heroName", "Имя героя", ParameterType.STRING, "Aragon"),
            Parameter("heroClass", "Класс (Warrior/Mage)", ParameterType.STRING, "Warrior"),
            Parameter("health", "Здоровье", ParameterType.INT, "100"),
            Parameter("isNullable", "Разрешить Null?", ParameterType.BOOLEAN, "false")
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "1. Классы и Свойства"),
            LessonSection(SectionType.TEXT, "Класс — это чертеж объекта. В Kotlin свойства (val/var) автоматически создают геттеры и сеттеры."),
            LessonSection(SectionType.CODE, """
                class Hero(val name: String, var hp: Int) {
                    fun info() = "Герой: ${'$'}name, HP: ${'$'}hp"
                }
                val myHero = Hero("{{heroName}}", {{health}})
                println(myHero.info())
            """.trimIndent(), tag = "base_class"),

            LessonSection(SectionType.HEADER, "2. Наследование и Полиморфизм"),
            LessonSection(SectionType.TEXT, "По умолчанию классы закрыты (final). Чтобы наследоваться, используйте open. Полиморфизм позволяет вызывать переопределенные методы."),
            LessonSection(SectionType.CODE, """
                open class Character(val name: String) {
                    open fun attack() = "Атакует!"
                }
                class Mage(name: String) : Character(name) {
                    override fun attack() = "Кастует заклинание!"
                }
                val unit: Character = if ("{{heroClass}}" == "Mage") Mage("{{heroName}}") else Character("{{heroName}}")
                println("${'$'}{unit.name}: ${'$'}{unit.attack()}")
            """.trimIndent(), tag = "inheritance"),

            LessonSection(SectionType.HEADER, "3. Null Safety (Безопасность)"),
            LessonSection(SectionType.TEXT, "Kotlin разделяет типы на nullable (String?) и non-null (String). Это предотвращает NullPointerException."),
            LessonSection(SectionType.CODE, """
                val name: String? = if ({{isNullable}}) null else "{{heroName}}"
                // Оператор Safe Call (?.) и Elvis (?:)
                val length = name?.length ?: -1
                println("Имя: ${'$'}name, Длина: ${'$'}length")
            """.trimIndent(), tag = "null_safety"),

            LessonSection(SectionType.HEADER, "4. Исключения (Exceptions)"),
            LessonSection(SectionType.TEXT, "Используйте try-catch для обработки ошибок. В Kotlin throw — это выражение."),
            LessonSection(SectionType.CODE, """
                try {
                    val res = 100 / if ({{health}} > 0) {{health}} else throw Exception("HP is zero!")
                    println("Статус: OK (coeff: ${'$'}res)")
                } catch (e: Exception) {
                    println("Ошибка: ${'$'}{e.message}")
                }
            """.trimIndent(), tag = "exceptions")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val name = params.getString("heroName")
            val hp = params.getInt("health")
            val hClass = params.getString("heroClass")
            val isNull = params.getBool("isNullable")

            when (tag) {
                "base_class" -> {
                    println("Объект Hero создан: name=$name, hp=$hp")
                    println("Результат info(): Герой: $name, HP: $hp")
                }
                "inheritance" -> {
                    val attackType = if (hClass.equals("Mage", true)) "Кастует заклинание! (Mage)" 
                                   else "Атакует мечом! (Warrior)"
                    println("$name: $attackType")
                }
                "null_safety" -> {
                    val n: String? = if (isNull) null else name
                    println("Значение переменной: $n")
                    println("Безопасный вызов (?.length): ${n?.length ?: "NULL"}")
                    println("Элвис (?: -1): ${n?.length ?: -1}")
                }
                "exceptions" -> {
                    if (hp <= 0) {
                        println("Ошибка: HP is zero!")
                    } else {
                        println("Статус: OK (coeff: ${100 / hp})")
                    }
                }
            }
        }
    })
}

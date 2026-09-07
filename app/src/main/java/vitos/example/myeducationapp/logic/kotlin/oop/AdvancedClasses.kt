package vitos.example.myeducationapp.logic.kotlin.oop

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

// Выносим sealed классы и другие объявления на уровень файла, 
// так как они не могут быть локальными в методе execute
private data class LocalUser(val name: String, val age: Int)

private sealed class UIState {
    object Loading : UIState()
    data class Success(val msg: String) : UIState()
    data class Error(val code: Int) : UIState()
}

/**
 * Урок 4: Продвинутые классы. Data, Sealed и Делегирование.
 */
fun registerAdvancedClasses() {
    val course = "kotlin"

    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "4.1"
        override val courseId = course
        override val title = "Data и Sealed классы"
        override val description = "Моделирование данных и иерархии состояний."
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("userName", "Имя для User", ParameterType.STRING, "Alice"),
            Parameter("userAge", "Возраст для User", ParameterType.INT, "22"),
            Parameter("state", "Состояние (1-Success, 2-Error, 3-Loading)", ParameterType.INT, "1", 1f, 3f)
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "Data Classes"),
            LessonSection(SectionType.TEXT, """
                `data class` автоматически генерирует:
                • `toString()` (красивый вывод)
                • `equals()` / `hashCode()` (сравнение по содержимому)
                • `copy()` (создание копии с изменением полей)
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                data class User(val name: String, val age: Int)
                
                val u1 = User("{{userName}}", {{userAge}})
                val u2 = u1.copy(age = u1.age + 1)
                
                println("u1: ${'$'}u1")
                println("u2 (на год старше): ${'$'}u2")
                println("Они равны? ${'$'}{u1 == u2}")
            """.trimIndent(), tag = "data_logic"),

            LessonSection(SectionType.HEADER, "Sealed Classes & Interfaces"),
            LessonSection(SectionType.TEXT, """
                Используются для ограничения иерархии. Компилятор "знает" все подклассы, что делает `when` безопасным (не нужен `else`).
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                sealed class UIState {
                    object Loading : UIState()
                    data class Success(val msg: String) : UIState()
                    data class Error(val code: Int) : UIState()
                }
                
                val state: UIState = UIState.Success("Данные {{userName}}")
                val text = when(state) {
                    is UIState.Loading -> "Загрузка..."
                    is UIState.Success -> "Успех: ${'$'}{state.msg}"
                    is UIState.Error -> "Ошибка ${'$'}{state.code}"
                }
            """.trimIndent(), tag = "sealed_logic")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            when (tag) {
                "data_logic" -> {
                    val name = params.getString("userName")
                    val age = params.getInt("userAge")
                    val u1 = LocalUser(name, age)
                    val u2 = u1.copy(age = age + 1)
                    println("--- Log: Data Class ---")
                    println("u1.toString(): $u1")
                    println("u2.toString(): $u2")
                    println("u1 == u2: ${u1 == u2}")
                }
                "sealed_logic" -> {
                    val stateCode = params.getInt("state")
                    val state: UIState = when(stateCode) {
                        1 -> UIState.Success("Данные получены")
                        2 -> UIState.Error(404)
                        else -> UIState.Loading
                    }
                    println("--- Log: Sealed Class ---")
                    val out = when(state) {
                        is UIState.Loading -> "Loading..."
                        is UIState.Success -> "Success: ${state.msg}"
                        is UIState.Error -> "Error: ${state.code}"
                    }
                    println("Текущий стейт: $out")
                }
            }
        }
    })

    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "4.2"
        override val courseId = course
        override val title = "Делегирование (Delegation)"
        override val description = "Использование 'by' для свойств и классов. Lazy и Observable."
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("inputValue", "Значение для Observable", ParameterType.STRING, "Start")
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "Property Delegation"),
            LessonSection(SectionType.TEXT, """
                Котлин позволяет делегировать логику геттера/сеттера другому объекту через `by`.
                • `lazy` — вычисляется только при первом обращении.
                • `Delegates.observable` — следит за изменениями значения.
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                val slowValue: String by lazy {
                    println("Вычисляю...")
                    "Я ленивый"
                }
                
                var watchedValue: String by Delegates.observable("Start") { _, old, new ->
                    println("Смена: ${'$'}old -> ${'$'}new")
                }
            """.trimIndent(), tag = "delegation_logic")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            println("--- Log: Lazy Delegation ---")
            val slowValue: String by lazy { 
                println("[Lazy] Вычисляю значение...")
                "Результат" 
            }
            println("Первый вызов:")
            println("Value = $slowValue")
            println("Второй вызов (уже без 'Вычисляю'):")
            println("Value = $slowValue")
            
            println("\n--- Log: Observable ---")
            val newVal = params.getString("inputValue")
            var watchedValue: String by kotlin.properties.Delegates.observable("Base") { prop, old, new ->
                println("Свойство '${prop.name}' изменилось: $old -> $new")
            }
            watchedValue = newVal
        }
    })
}

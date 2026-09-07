package vitos.example.myeducationapp.logic.kotlin.coroutines

import kotlinx.coroutines.*
import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

/**
 * Урок 6: Корутины. Асинхронность и Диспетчеры.
 */
object Coroutines {
    fun register() {
        val course = "kotlin"

        LessonRegistry.register(object : LessonBackend {
            override var lessonId = "6.1"
            override val courseId = course
            override val title = "Основы Корутин"
            override val description = "Launch, Async, Suspend функции и Диспетчеры."
            override val isAutoExecute = false // Корутины лучше запускать по кнопке

            override val parameters = listOf(
                Parameter("delayMs", "Задержка (мс)", ParameterType.INT, "500", 100f, 3000f)
            )

            override val sections = listOf(
                LessonSection(SectionType.HEADER, "Что такое Coroutines?"),
                LessonSection(SectionType.TEXT, """
                    Корутины — это "легковесные потоки". Они позволяют писать асинхронный код так же просто, как синхронный.
                    Ключевые понятия:
                    • `suspend` — функция, которая может приостановить выполнение, не блокируя поток.
                    • `Dispatcher.Main` — для UI.
                    • `Dispatcher.IO` — для сети и диска.
                    • `Dispatcher.Default` — для вычислений.
                """.trimIndent()),
                LessonSection(SectionType.CODE, """
                    suspend fun fetchData() {
                        delay({{delayMs}}) // Приостановка
                        println("Данные получены!")
                    }
                    
                    scope.launch(Dispatchers.IO) {
                        fetchData()
                    }
                """.trimIndent(), tag = "coroutines_logic")
            )

            override suspend fun execute(
                params: Map<String, Any>,
                sectionIndex: Int,
                tag: String?,
                onUpdate: (String) -> Unit
            ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
                val delayTime = params.getInt("delayMs").toLong()
                
                println("--- Запуск корутины ---")
                println("Текущий поток: ${Thread.currentThread().name}")
                
                // Используем withContext для демонстрации смены потока
                val result = withContext(Dispatchers.Default) {
                    println("[Default] Выполняем работу в потоке: ${Thread.currentThread().name}")
                    delay(delayTime)
                    "Данные загружены за ${delayTime}мс"
                }
                
                println("[Main/Result] Результат: $result")
                println("Текущий поток вернулся к: ${Thread.currentThread().name}")
            }
        })
    }
}

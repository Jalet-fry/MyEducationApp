package vitos.example.myeducationapp.logic.kotlin.flows

import kotlinx.coroutines.*
import kotlinx.coroutines.flow.*
import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

/**
 * Урок 7: Flows. Потоки данных.
 */
object Flows {
    fun register() {
        val course = "kotlin"

        LessonRegistry.register(object : LessonBackend {
            override var lessonId = "7.1"
            override val courseId = course
            override val title = "Kotlin Flow"
            override val description = "Холодные потоки данных, операторы преобразования и сбор данных."
            override val isAutoExecute = false

            override val parameters = listOf(
                Parameter("limit", "Количество чисел", ParameterType.INT, "3", 1f, 10f)
            )

            override val sections = listOf(
                LessonSection(SectionType.HEADER, "Flow — Холодные потоки"),
                LessonSection(SectionType.TEXT, """
                    `Flow` похож на последовательности (`Sequence`), но для асинхронных данных.
                    Он не начинает работу, пока кто-то не вызовет `collect`.
                """.trimIndent()),
                LessonSection(SectionType.CODE, """
                    fun simpleFlow() = flow {
                        for (i in 1..{{limit}}) {
                            delay(500)
                            emit(i)
                        }
                    }
                    
                    simpleFlow().collect { value ->
                        println(value)
                    }
                """.trimIndent(), tag = "flow_logic")
            )

            override suspend fun execute(
                params: Map<String, Any>,
                sectionIndex: Int,
                tag: String?,
                onUpdate: (String) -> Unit
            ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
                val limit = params.getInt("limit")
                
                println("--- Запуск Flow ---")
                
                val myFlow = flow {
                    for (i in 1..limit) {
                        delay(300)
                        println("Emit: $i")
                        emit(i)
                    }
                }
                
                println("Сбор данных (collect):")
                myFlow
                    .map { it * 10 }
                    .collect { value ->
                        println("Получено значение: $value")
                    }
                
                println("Готово!")
            }
        })
    }
}

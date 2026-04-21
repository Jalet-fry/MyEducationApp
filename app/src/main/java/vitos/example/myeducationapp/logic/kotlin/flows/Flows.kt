package vitos.example.myeducationapp.logic.kotlin.flows

import kotlinx.coroutines.delay
import kotlinx.coroutines.flow.asFlow
import kotlinx.coroutines.flow.onEach
import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

object Flows {
    fun register() {
        val course = "kotlin"

        LessonRegistry.register(object : LessonBackend {
            override var lessonId = "9.1"
            override val courseId = course
            override val title = "Основы Kotlin Flow"
            override val description = "Холодные потоки данных, обработка последовательностей."
            override val isAutoExecute = false

            override val parameters = listOf(
                Parameter("count", "Кол-во чисел", ParameterType.INT, "5"),
                Parameter("delay", "Задержка (мс)", ParameterType.INT, "300")
            )

            override val sections = listOf(
                LessonSection(SectionType.TEXT, "Flow — это поток данных, который может выдавать значения асинхронно."),
                LessonSection(SectionType.CODE, """
                    (1..{{count}}).asFlow()
                        .onEach { delay({{delay}}) }
                        .collect { println(it) }
                """.trimIndent(), tag = "ticker")
            )

            override suspend fun execute(
                params: Map<String, Any>,
                sectionIndex: Int,
                tag: String?,
                onUpdate: (String) -> Unit
            ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
                val count = params.getInt("count")
                val d = params.getInt("delay").toLong()

                println("--- ЗАПУСК FLOW ---")
                (1..count).asFlow()
                    .onEach { delay(d) }
                    .collect { 
                        println("Получено значение: $it")
                    }
                println("--- ПОТОК ЗАВЕРШЕН ---")
            }
        })
    }
}

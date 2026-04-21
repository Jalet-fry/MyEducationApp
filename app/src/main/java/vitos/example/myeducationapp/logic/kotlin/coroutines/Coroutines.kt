package vitos.example.myeducationapp.logic.kotlin.coroutines

import kotlinx.coroutines.delay
import kotlinx.coroutines.launch
import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

object Coroutines {
    fun register() {
        val course = "kotlin"

        LessonRegistry.register(object : LessonBackend {
            override var lessonId = "8.1"
            override val courseId = course
            override val title = "Основы корутин и задержки"
            override val description = "Почувствуйте асинхронность: запуск задач с паузами"
            
            // Здесь авто-выполнение лучше выключить, чтобы юзер осознанно жал "Старт"
            override val isAutoExecute = false 

            override val parameters = listOf(
                Parameter("timeA", "Задержка задачи А (мс)", ParameterType.INT, "1000"),
                Parameter("timeB", "Задержка задачи Б (мс)", ParameterType.INT, "500")
            )

            override val sections = listOf(
                LessonSection(SectionType.HEADER, "Параллельное выполнение"),
                LessonSection(SectionType.TEXT, "Корутины позволяют выполнять задачи параллельно. В этом примере задача Б завершится быстрее, чем А, если её задержка меньше."),
                LessonSection(SectionType.CODE, """
                    // Имитация двух задач
                    launch {
                        delay({{timeA}})
                        println("Задача А выполнена через {{timeA}}мс")
                    }
                    launch {
                        delay({{timeB}})
                        println("Задача Б выполнена через {{timeB}}мс")
                    }
                    println("Задачи запущены...")
                """.trimIndent(), tag = "race")
            )

            override suspend fun execute(
                params: Map<String, Any>, 
                sectionIndex: Int, 
                tag: String?, 
                onUpdate: (String) -> Unit
            ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
                val a = params.getInt("timeA").toLong()
                val b = params.getInt("timeB").toLong()

                println("--- СТАРТ ---")
                
                // Используем coroutineScope для параллельности внутри runSafe
                kotlinx.coroutines.coroutineScope {
                    launch {
                        delay(a)
                        println("✅ Задача А завершена ($a мс)")
                    }
                    launch {
                        delay(b)
                        println("🚀 Задача Б завершена ($b мс)")
                    }
                }
                
                println("--- ВСЁ ГОТОВО ---")
            }
        })
    }
}

package vitos.example.myeducationapp.logic.kotlin.collections

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

/**
 * Урок 5: Коллекции и Последовательности.
 */
fun registerCollections() {
    val course = "kotlin"

    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "5.1"
        override val courseId = course
        override val title = "Коллекции и Sequences"
        override val description = "List, Map, Set и разница между немедленными и ленивыми (Sequences) вычислениями."
        override val isAutoExecute = true

        override val parameters = listOf(
            Parameter("itemsCount", "Количество элементов", ParameterType.INT, "5", 1f, 1000f)
        )

        override val sections = listOf(
            LessonSection(SectionType.HEADER, "Iterable vs Sequence"),
            LessonSection(SectionType.TEXT, """
                • **Iterable** (List, Set): Каждая операция (`map`, `filter`) создает промежуточную коллекцию.
                • **Sequence**: "Ленивые" вычисления. Операции выполняются только тогда, когда запрошен результат (терминальная операция, например `toList`).
                
                Sequences эффективнее на больших объемах данных.
            """.trimIndent()),
            LessonSection(SectionType.CODE, """
                val list = (1..{{itemsCount}}).toList()
                
                // Iterable (Eager)
                val resList = list.filter { it % 2 == 0 }.map { it * 2 }
                
                // Sequence (Lazy)
                val resSeq = list.asSequence()
                    .filter { it % 2 == 0 }
                    .map { it * 2 }
                    .toList()
            """.trimIndent(), tag = "collections_logic")
        )

        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val count = params.getInt("itemsCount")
            val list = (1..count).toList()
            
            println("--- Log: Iterable (Eager) ---")
            var filterCalls = 0
            val res = list.filter { filterCalls++; it % 2 == 0 }.map { it * 2 }
            println("Элементов в итоге: ${res.size}")
            println("Вызовов фильтра: $filterCalls (прошли по всем сразу)")
            
            println("\n--- Log: Sequence (Lazy) ---")
            var seqCalls = 0
            val seqRes = list.asSequence()
                .filter { seqCalls++; it % 2 == 0 }
                .map { it * 2 }
                .take(2) // Возьмем только первые два
                .toList()
            
            println("Взяли только первые 2 элемента: $seqRes")
            println("Вызовов фильтра: $seqCalls (Sequence остановился, как только нашел нужные 2)")
        }
    })
}

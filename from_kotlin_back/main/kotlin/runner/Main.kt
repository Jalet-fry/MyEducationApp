package runner

import lessons.*
import kotlinx.coroutines.*

/**
 * Главный загрузчик уроков.
 * Улучшенная версия с поддержкой команд 'ls', 'help' и повтором последнего действия.
 */

typealias LessonFunc = suspend () -> Unit

fun main() {
    runBlocking {
        val lessonRegistry = mapOf<String, LessonFunc>(
            "1_1" to { main1_1() }, "1_2" to { main1_2() },
            "2_1" to { main2_1() }, "2_2" to { main2_2() }, "2_3" to { main2_3() }, "2_4" to { main2_4() },
            "2_5" to { main2_5() }, "2_6" to { main2_6() }, "2_7" to { main2_7() }, "2_8" to { main2_8() },
            "2_9" to { main2_9() }, "2_10" to { main2_10() }, "2_11" to { main2_11() },
            "3_1" to { main3_1() }, "3_2" to { main3_2() }, "3_3" to { main3_3() }, "3_4" to { main3_4() },
            "3_5" to { main3_5() }, "3_6" to { main3_6() }, "3_7" to { main3_7() }, "3_8" to { main3_8() },
            "3_9" to { main3_9() }, "3_10" to { main3_10() },
            "4_1" to { main4_1() }, "4_2" to { main4_2() }, "4_3" to { main4_3() }, "4_4" to { main4_4() },
            "4_5" to { main4_5() }, "4_6" to { main4_6() }, "4_7" to { main4_7() }, "4_8" to { main4_8() },
            "4_9" to { main4_9() }, "4_10" to { main4_10() }, "4_11" to { main4_11() }, "4_12" to { main4_12() },
            "4_13" to { main4_13() }, "4_14" to { main4_14() }, "4_15" to { main4_15() }, "4_16" to { main4_16() },
            "5_1" to { main5_1() }, "5_2" to { main5_2() }, "5_3" to { main5_3() }, "5_4" to { main5_4() },
            "5_5" to { main5_5() }, "5_6" to { main5_6() }, "5_7" to { main5_7() }, "5_8" to { main5_8() },
            "5_9" to { main5_9() }, "5_10" to { main5_10() },
            "6_1" to { main6_1() }, "6_2" to { main6_2() }, "6_3" to { main6_3() },
            "7_1" to { main7_1() }, "7_2" to { main7_2() }, "7_3" to { main7_3() }, "7_4" to { main7_4() },
            "7_5" to { main7_5() }, "7_6" to { main7_6() }, "7_7" to { main7_7() }, "7_8" to { main7_8() },
            "7_9" to { main7_9() }, "7_10" to { main7_10() }, "7_11" to { main7_11() }, "7_12" to { main7_12() },
            "7_13" to { main7_13() }, "7_14" to { main7_14() }, "7_15" to { main7_15() }, "7_16" to { main7_16() }, "7_17" to { main7_17() },
            "8_1" to { main8_1() }, "8_2" to { main8_2() }, "8_3" to { main8_3() }, "8_4" to { main8_4() },
            "8_5" to { main8_5() }, "8_6" to { main8_6() }, "8_7" to { main8_7() },
            "9_1" to { main9_1() }, "9_2" to { main9_2() }, "9_3" to { main9_3() }, "9_4" to { main9_4() },
            "9_5" to { main9_5() }, "9_6" to { main9_6() }, "9_7" to { main9_7() }, "9_8" to { main9_8() },
            "9_9" to { main9_9() }
        )

        var lastLessonKey: String? = null

        fun printHelp() {
            println("\n=== HELP ===")
            println("  'ls'       - List all available lessons")
            println("  'all'      - Run all lessons in sequence")
            println("  'X.Y'      - Run specific lesson (e.g., 2.10, 8.4)")
            println("  [Enter]    - Repeat last lesson ($lastLessonKey)")
            println("  'help'     - Show this help message")
            println("  'exit'     - Exit the runner")
        }

        fun listLessons() {
            println("\n=== AVAILABLE LESSONS ===")
            val sortedKeys = lessonRegistry.keys.sortedBy { key ->
                val parts = key.split("_").map { it.toInt() }
                parts[0] * 100 + parts[1]
            }
            
            var currentChapter = -1
            for (key in sortedKeys) {
                val chapter = key.split("_")[0].toInt()
                if (chapter != currentChapter) {
                    if (currentChapter != -1) println()
                    print("Chapter $chapter: ")
                    currentChapter = chapter
                }
                print("${key.replace("_", ".")} ")
            }
            println("\n")
        }

        println("=== Kotlin Lessons Runner ===")
        println("Type 'help' for instructions or 'ls' to see all lessons.")

        while (true) {
            val prompt = if (lastLessonKey != null) "[${lastLessonKey.replace("_", ".")}] > " else "> "
            print(prompt)
            
            val rawInput = readlnOrNull()?.trim()?.lowercase() ?: "exit"
            
            if (rawInput == "exit") break
            if (rawInput == "help") { printHelp(); continue }
            if (rawInput == "ls") { listLessons(); continue }

            val input = if (rawInput.isEmpty()) {
                if (lastLessonKey != null) {
                    println("Repeating last lesson: ${lastLessonKey.replace("_", ".")}")
                    lastLessonKey
                } else {
                    printHelp()
                    continue
                }
            } else rawInput

            if (input == "all") {
                println("\n>>> STARTING GLOBAL RUN <<<\n")
                val sortedKeys = lessonRegistry.keys.sortedBy { key ->
                    val parts = key.split("_").map { it.toInt() }
                    parts[0] * 100 + parts[1]
                }
                for (key in sortedKeys) {
                    runLessonWrapper(key, lessonRegistry[key]!!)
                }
                println("\n>>> GLOBAL RUN COMPLETED <<<\n")
                continue
            }

            val normalizedKey = input.replace(".", "_")
            val func = lessonRegistry[normalizedKey]
            if (func != null) {
                lastLessonKey = normalizedKey
                runLessonWrapper(normalizedKey, func)
            } else {
                println("Lesson not found: $input. Type 'ls' for a list.")
            }
        }
    }
}

/**
 * Обертка для красивого вывода в консоль
 */
suspend fun runLessonWrapper(name: String, func: LessonFunc) {
    val title = " LESSON ${name.replace("_", ".")} "
    val border = "=".repeat(15)
    println("\n$border$title$border")
    try {
        func()
    } catch (e: Exception) {
        println("\n!!! Runtime error in $name: ${e.message}")
    }
    println("=".repeat(30 + title.length) + "\n")
    delay(300)
}

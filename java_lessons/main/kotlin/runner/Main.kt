package runner

import lessons.*
import kotlinx.coroutines.*

/**
 * Runner на Kotlin, который запускает уроки на Java
 */

typealias LessonFunc = () -> Unit

fun main() {
    runBlocking {
        val lessonRegistry = mapOf<String, LessonFunc>(
            "1_1" to { Lesson1_1.run() }
            // Сюда будешь добавлять новые Java-классы: "1_2" to { Lesson1_2.run() }
        )

        println("=== Java Lessons Runner (via Kotlin) ===")
        println("Type lesson ID (e.g., 1.1) or 'exit'")

        while (true) {
            print("> ")
            val input = readlnOrNull()?.trim() ?: "exit"
            if (input == "exit") break
            
            val normalizedKey = input.replace(".", "_")
            val func = lessonRegistry[normalizedKey]
            
            if (func != null) {
                println("\n--- Running Java Lesson $input ---")
                func()
                println("-------------------------------\n")
            } else {
                println("Lesson not found: $input")
            }
        }
    }
}

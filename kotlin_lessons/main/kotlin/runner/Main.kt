package runner

import lessons.*
import kotlinx.coroutines.*

typealias LessonFunc = suspend () -> Unit

fun main() {
    runBlocking {
        val lessonRegistry = mapOf<String, LessonFunc>(
            "1_1" to { main1_1() }
        )

        println("=== Kotlin Lessons Runner ===")
        while (true) {
            print("> ")
            val input = readlnOrNull()?.trim() ?: "exit"
            if (input == "exit") break
            val normalizedKey = input.replace(".", "_")
            val func = lessonRegistry[normalizedKey]
            if (func != null) {
                func()
            } else {
                println("Lesson not found: $input")
            }
        }
    }
}

suspend fun main1_1() {
    println("Hello from Kotlin Lesson 1.1")
}

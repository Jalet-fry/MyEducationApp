package lessons

import java.io.File

/**
 * Дополнительные возможности: runCatching, use, lazy
 */
fun main5_10() {
    // 1. runCatching - современная замена try-catch
    println("--- Task 1: runCatching ---")
    val result = runCatching {
        val a = 10
        val b = 0
        val x = a / b
        x
    }
    
    if (result.isSuccess) {
        println("Result: ${result.getOrNull()}")
    } else {
        println("Failed: ${result.exceptionOrNull()?.message}")
    }

    // 2. .use { } - аналог try-with-resources (авто-закрытие)
    println("\n--- Task 2: .use ---")
    val file = File("test.txt")
    file.writeText("Hello Kotlin!")
    
    file.inputStream().use { stream ->
        val content = stream.bufferedReader().readLine()
        println("File content: $content")
    }
    file.delete() // Убираем за собой

    // 3. lazy - инициализация только при первом обращении
    println("\n--- Task 3: lazy initialization ---")
    val heavyObject: String by lazy {
        println("Computing heavy object...")
        "Very Heavy Data"
    }
    
    println("Before first access")
    println("First access: $heavyObject")
    println("Second access: $heavyObject")
}

package lessons

import kotlinx.coroutines.*
import kotlinx.coroutines.flow.*

/**
 * Сведение данных. Функции reduce и fold
 */
fun main9_8() = runBlocking {

    // 1. Функция reduce
    println("--- Task 1: reduce ---")
    val numberFlow = listOf(1, 2, 3, 4, 5).asFlow()
    val sum = numberFlow.reduce { a, b -> a + b }
    println("Sum (reduce): $sum")

    val namesFlow = listOf("Tom", "Bob", "Kate", "Sam", "Alice").asFlow()
    val combinedNames = namesFlow.reduce { a, b -> "$a $b" }
    println("Names (reduce): $combinedNames")

    // 2. Функция fold
    println("\n--- Task 2: fold ---")
    val foldedNames = namesFlow.fold("Users:") { acc, name -> "$acc $name" }
    println("Names (fold): $foldedNames")
    
    val product = numberFlow.fold(1) { acc, n -> acc * n }
    println("Product (fold): $product")

    println("End of main9_8")
}

package lessons

import kotlinx.coroutines.*
import kotlinx.coroutines.flow.*

/**
 * Функции count, take и drop. Количество элементов в потоке
 */
fun main9_4() = runBlocking {

    val userFlow = listOf("Tom", "Bob", "Kate", "Sam", "Alice").asFlow()

    // 1. Функция count
    println("--- Task 1: count ---")
    println("Total count: ${userFlow.count()}")
    
    val countLongNames = userFlow.count { username -> username.length > 3 }
    println("Count with length > 3: $countLongNames")

    // 2. Функция take
    println("\n--- Task 2: take(3) ---")
    userFlow.take(3).collect { user -> println(user) }

    // 3. Функция drop
    println("\n--- Task 3: drop(3) ---")
    userFlow.drop(3).collect { user -> println(user) }
    
    println("End of main9_4")
}

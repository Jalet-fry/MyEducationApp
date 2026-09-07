package lessons

import kotlinx.coroutines.*
import kotlinx.coroutines.flow.*

/**
 * Функции first, last, single
 */
fun main9_5() = runBlocking {

    val userFlow = listOf("Tom", "Bob", "Kate", "Sam", "Alice").asFlow()

    // 1. first/firstOrNull
    println("--- Task 1: first ---")
    println("First: ${userFlow.first()}")
    println("First with length > 3: ${userFlow.first { name -> name.length > 3 }}") // Kate
    
    val emptyFlow = emptyFlow<String>()
    println("FirstOrNull (empty): ${emptyFlow.firstOrNull()}")
    println("FirstOrNull (no match): ${userFlow.firstOrNull { it.length > 10 }}")

    // 2. last/lastOrNull
    println("\n--- Task 2: last ---")
    println("Last: ${userFlow.last()}")
    // last() в Flow может не принимать предикат в старых версиях, но в новых обычно принимает. 
    // В статье написано, что может принимать.
    println("LastOrNull: ${userFlow.lastOrNull()}")

    // 3. single/singleOrNull
    println("\n--- Task 3: single ---")
    val singleFlow = flowOf("OnlyOne")
    try {
        println("Single: ${singleFlow.single()}")
    } catch (e: Exception) {
        println("Exception from single(): ${e.message}")
    }

    val multiFlow = flowOf("One", "Two")
    println("SingleOrNull (multi): ${multiFlow.singleOrNull()}") // null
    println("SingleOrNull (empty): ${emptyFlow.singleOrNull()}") // null

    println("End of main9_5")
}

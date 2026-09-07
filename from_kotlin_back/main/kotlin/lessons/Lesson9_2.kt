package lessons

import kotlinx.coroutines.*
import kotlinx.coroutines.flow.*

/**
 * Создание асинхронного потока
 */
fun main9_2() = runBlocking {

    // 1. Построитель flow { ... }
    println("--- Task 1: flow builder ---")
    val userFlow = flow {
        val usersList = listOf("Tom", "Bob", "Sam")
        for (item in usersList) {
            emit(item)
        }
    }
    userFlow.collect { user -> println("User from userFlow: $user") }

    // 2. flowOf(...)
    println("\n--- Task 2: flowOf ---")
    val numberFlow: Flow<Int> = flowOf(1, 2, 3, 5, 8)
    numberFlow.collect { n -> println("Number from flowOf: $n") }

    val namesFlow = flowOf("Tom", "Sam", "Bob")
    namesFlow.collect { name -> println("Name from flowOf: $name") }

    // 3. asFlow()
    println("\n--- Task 3: asFlow ---")
    // из диапазона
    val rangeFlow: Flow<Int> = (1..5).asFlow()
    rangeFlow.collect { n -> println("Number from range.asFlow: $n") }

    // из коллекции
    val listFlow = listOf("Alice", "Kate", "Ann").asFlow()
    listFlow.collect { name -> println("Name from list.asFlow: $name") }
}

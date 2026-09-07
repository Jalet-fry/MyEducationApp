package lessons

import kotlinx.coroutines.*
import kotlinx.coroutines.flow.*

/**
 * Преобразование данных. Функции map и transform
 */
fun main9_6() = runBlocking {

    // 1. Функция map
    println("--- Task 1: map basic ---")
    val peopleFlow = listOf(
        Person9_6("Tom", 37),
        Person9_6("Sam", 41),
        Person9_6("Bob", 21)
    ).asFlow()

    peopleFlow.map { person -> person.name }
        .collect { personName -> println("Mapped name: $personName") }

    println("\n--- Task 2: map to anonymous object ---")
    val peopleFlow2 = listOf(
        Person9_6("Tom", 37),
        Person9_6("Bill", 5),
        Person9_6("Sam", 14),
        Person9_6("Bob", 21),
    ).asFlow()

    peopleFlow2.map { person ->
        object {
            val name = person.name
            val isAdult = person.age > 17
        }
    }.collect { user -> println("name: ${user.name}   adult:  ${user.isAdult} ") }

    // 2. Функция transform
    println("\n--- Task 3: transform (filter + map) ---")
    peopleFlow2.transform { person ->
        if (person.age > 17) {
            emit(person.name)
        }
    }.collect { personName -> println("Transformed (adult): $personName") }

    println("\n--- Task 4: transform (multiple emits) ---")
    val numbersFlow = listOf(2, 3, 4).asFlow()
    numbersFlow.transform { n ->
        emit(n)
        emit(n * n)
    }.collect { n -> println("Value/Square: $n") }
}

data class Person9_6(val name: String, val age: Int)

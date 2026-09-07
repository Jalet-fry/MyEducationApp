package lessons

import kotlinx.coroutines.*
import kotlinx.coroutines.flow.*

/**
 * Фильтрация данных (Flow)
 */
fun main9_7() = runBlocking {

    val peopleFlow = listOf(
        Person9_7("Tom", 37),
        Person9_7("Alice", 32),
        Person9_7("Bill", 5),
        Person9_7("Sam", 14),
        Person9_7("Bob", 25),
    ).asFlow()

    // 1. Функция filter
    println("--- Task 1: filter (age > 17) ---")
    peopleFlow.filter { person -> person.age > 17 }
        .collect { person -> println("name: ${person.name}   age:  ${person.age} ") }

    // 2. Функция takeWhile
    println("\n--- Task 2: takeWhile (age > 17) ---")
    peopleFlow.takeWhile { person -> person.age > 17 }
        .collect { person -> println("name: ${person.name}   age:  ${person.age} ") }

    // 3. Функция dropWhile
    println("\n--- Task 3: dropWhile (age > 17) ---")
    peopleFlow.dropWhile { person -> person.age > 17 }
        .collect { person -> println("name: ${person.name}   age:  ${person.age} ") }
        
    println("End of main9_7")
}

data class Person9_7(val name: String, val age: Int)

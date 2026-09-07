package lessons

import kotlinx.coroutines.*
import kotlinx.coroutines.flow.*

/**
 * Объединение потоков
 */
fun main9_9() = runBlocking {

    // 1. Оператор zip
    println("--- Task 1: zip basic ---")
    val english = listOf("red", "yellow", "blue").asFlow()
    val russian = listOf("красный", "желтый", "синий").asFlow()
    
    english.zip(russian) { a, b -> "$a: $b" }
        .collect { word -> println("Zipped: $word") }

    println("\n--- Task 2: zip to custom type ---")
    val names = listOf("Tom", "Bob", "Sam").asFlow()
    val ages = listOf(37, 41, 25).asFlow()
    
    names.zip(ages) { name, age -> Person9_9(name, age) }
        .collect { person -> println("Name: ${person.name}   Age: ${person.age}") }

    // 2. Оператор combine (примерное поведение)
    println("\n--- Task 3: combine (reacts to latest from both) ---")
    val flow1 = flow {
        emit("A")
        delay(100L)
        emit("B")
    }
    val flow2 = flow {
        emit(1)
        delay(50L)
        emit(2)
        delay(100L)
        emit(3)
    }
    
    flow1.combine(flow2) { f1, f2 -> "$f1$f2" }
        .collect { result -> println("Combined: $result") }
}

data class Person9_9(val name: String, val age: Int)

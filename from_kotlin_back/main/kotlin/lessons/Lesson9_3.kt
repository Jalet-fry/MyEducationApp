package lessons

import kotlinx.coroutines.*
import kotlinx.coroutines.flow.*

/**
 * Операции с потоками
 */
fun main9_3() = runBlocking {

    val numbers = (1..5).asFlow()

    // 1. Терминальные операции
    println("--- Task 1: Terminal operators ---")
    println("Count: ${numbers.count()}")
    println("First: ${numbers.first()}")
    println("Last: ${numbers.last()}")
    println("List: ${numbers.toList()}")
    println("Reduce (sum): ${numbers.reduce { a, b -> a + b }}")
    println("Fold (start with 100): ${numbers.fold(100) { acc, n -> acc + n }}")

    // 2. Промежуточные операции
    println("\n--- Task 2: Intermediate operators ---")
    
    println("Filter (even) and Map (square):")
    numbers
        .filter { it % 2 == 0 }
        .map { it * it }
        .collect { println(it) }

    println("Take 2:")
    numbers.take(2).collect { println(it) }

    println("Drop 3:")
    numbers.drop(3).collect { println(it) }

    // 3. onEach (выполнение действия для каждого элемента без изменения потока)
    println("\n--- Task 3: onEach ---")
    numbers
        .onEach { println("Logging: $it") }
        .collect()

    // 4. transform (более гибкая версия map)
    println("\n--- Task 4: transform ---")
    numbers.transform { n ->
        emit("Value: $n")
        emit("Square: ${n * n}")
    }.collect { println(it) }
}

package lessons

import kotlinx.coroutines.*
import kotlinx.coroutines.flow.*

/**
 * Введение в асинхронные потоки (Flow)
 */
fun main9_1() = runBlocking {

    // 1. Сравнение со списком (загрузка сразу)
    println("--- Task 1: List (sync-like loading) ---")
    launch {
        getUsersList9_1().forEach { user -> println("List user: $user") }
    }

    delay(1500L) // Разделяем вывод

    // 2. Использование Flow (потоковая загрузка)
    println("\n--- Task 2: Flow (asynchronous loading) ---")
    getUsersFlow9_1().collect { user -> println("Flow user: $user") }

    println("\n--- Task 3: Flow with numbers ---")
    getNumbersFlow9_1().collect { number -> println("Number squared: $number") }

    println("\n--- Task 4: Flow is lazy (Cold Flow) ---")
    val numberFlow = getNumbersFlow9_1() // поток создан, но не запущен
    println("numberFlow variable created")
    delay(500L)
    println("launching collect function...")
    numberFlow.collect { number -> println("Collected: $number") }
}

suspend fun getUsersList9_1(): List<String> {
    delay(1000L) // имитация долгой загрузки
    return listOf("Tom", "Bob", "Sam")
}

fun getUsersFlow9_1(): Flow<String> = flow {
    val database = listOf("Tom", "Bob", "Sam")
    for (item in database) {
        delay(400L) // имитация работы
        println("Emitting $item")
        emit(item) // отправляем значение в поток
    }
}

fun getNumbersFlow9_1(): Flow<Int> = flow {
    println("Flow started")
    for (item in 1..5) {
        emit(item * item)
    }
}

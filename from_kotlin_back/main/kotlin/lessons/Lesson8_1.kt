package lessons

import kotlinx.coroutines.*

suspend fun main8_1() = coroutineScope {
    // Запуск корутины
    launch {
        for (i in 0..5) {
            delay(400L)
            println("Coroutine 1: $i")
        }
    }

    // Еще одна корутина
    launch {
        for (i in 0..5) {
            delay(200L)
            println("Coroutine 2: $i")
        }
    }

    println("Hello Coroutines (Main part)")
    
    // Вызов suspend функции
    doWork8_1()
}

suspend fun doWork8_1() {
    println("Starting work...")
    delay(1000L)
    println("Work done!")
}

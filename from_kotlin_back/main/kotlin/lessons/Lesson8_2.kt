package lessons

import kotlinx.coroutines.*

/**
 * Область корутины
 */
fun main8_2() = runBlocking {
    // 1. Использование coroutineScope
    doWork8_2()
    println("Hello Coroutines")

    println("\n----------------\n")

    // 2. Запуск нескольких корутин
    val scopeJob = launch {
        coroutineScope {
            launch {
                for (i in 0..5) {
                    delay(400L)
                    println("Coro 1: $i")
                }
            }
            launch {
                for (i in 6..10) {
                    delay(400L)
                    println("Coro 2: $i")
                }
            }
            println("Inside coroutineScope: Hello Coroutines")
        }
    }
    scopeJob.join()

    println("\n----------------\n")

    // 3. Вложенные корутины
    launch {
        println("Outer coroutine")
        launch {
            println("Inner coroutine")
            delay(400L)
        }
    }.join()

    println("End of Main")
}

suspend fun doWork8_2() = coroutineScope {
    launch {
        for (i in 0..5) {
            println("doWork: $i")
            delay(400L)
        }
    }
}

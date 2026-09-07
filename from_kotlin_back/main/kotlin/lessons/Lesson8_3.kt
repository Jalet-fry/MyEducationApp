package lessons

import kotlinx.coroutines.*

/**
 * launch и Job
 */
fun main8_3() = runBlocking {

    // 1. Простой запуск и ожидание через join
    println("--- Task 1: join ---")
    val job1 = launch {
        for (i in 1..5) {
            println("Job 1: $i")
            delay(400L)
        }
    }

    println("Start waiting for Job 1")
    job1.join() // ожидаем завершения корутины
    println("End waiting for Job 1")

    println("\n--- Task 2: Default parallel execution ---")
    // Без join выполняются параллельно с основным блоком (насколько позволяет runBlocking)
    launch {
        for (i in 1..5) {
            println("Parallel Job: $i")
            delay(200L)
        }
    }
    println("Start of Main block")
    println("End of Main block")
    // runBlocking будет ждать завершения всех дочерних корутин автоматически

    delay(1500L) // Дадим время выполниться

    println("\n--- Task 3: Lazy start ---")
    // 2. Отложенное выполнение
    val lazyJob = launch(start = CoroutineStart.LAZY) {
        delay(200L)
        println("Lazy Coroutine has started")
    }

    println("Delaying before starting lazy job...")
    delay(1000L)
    println("Starting lazy job now")
    lazyJob.start() // запускаем корутину
    lazyJob.join()
    println("Other actions in main method after lazy job")
}

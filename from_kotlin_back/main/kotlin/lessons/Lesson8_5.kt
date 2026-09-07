package lessons

import kotlinx.coroutines.*

/**
 * Отмена выполнения корутин
 */
fun main8_5() = runBlocking {

    // 1. Отмена через cancel() и join()
    println("--- Task 1: cancel and join ---")
    val downloader1 = launch {
        println("Начинаем загрузку файлов (1)")
        for (i in 1..5) {
            println("Загружен файл $i")
            delay(500L)
        }
    }
    delay(800L)
    println("Надоело ждать. Прерву-ка я загрузку (1)...")
    downloader1.cancel()    // отменяем корутину
    downloader1.join()      // ожидаем завершения
    println("Загрузка 1 завершена/прервана")

    println("\n--- Task 2: cancelAndJoin ---")
    // 2. cancelAndJoin
    val downloader2 = launch {
        println("Начинаем загрузку файлов (2)")
        for (i in 1..5) {
            println("Загружен файл $i")
            delay(500L)
        }
    }
    delay(800L)
    println("Прерываю загрузку (2) через cancelAndJoin...")
    downloader2.cancelAndJoin()
    println("Загрузка 2 завершена/прервана")

    println("\n--- Task 3: Handling CancellationException ---")
    // 3. Обработка CancellationException
    val downloader3 = launch {
        try {
            println("Начинаем загрузку файлов (3)")
            for (i in 1..5) {
                println("Загружен файл $i")
                delay(500L)
            }
        } catch (e: CancellationException) {
            println("Загрузка файлов (3) была отменена программно")
        } finally {
            println("Блок finally: ресурсы очищены")
        }
    }
    delay(800L)
    downloader3.cancelAndJoin()

    println("\n--- Task 4: Canceling async ---")
    // 4. Отмена async
    val deferredMessage = async {
        delay(1000L)
        "Hello from async"
    }
    delay(500L)
    println("Canceling async task...")
    deferredMessage.cancelAndJoin()
    
    try {
        println("Result: ${deferredMessage.await()}")
    } catch (e: CancellationException) {
        println("Caught CancellationException from await()")
    }

    println("Работа программы 8_5 завершена")
}

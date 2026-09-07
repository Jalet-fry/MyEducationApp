package lessons

import kotlinx.coroutines.*

/**
 * Async, await и Deferred
 */
fun main8_4() = runBlocking {

    // 1. async без получения результата (выполняется параллельно)
    println("--- Task 1: async basic ---")
    async { printHello8_4() }
    println("Program has finished (main block)")

    delay(1000L) // Ждем завершения async корутины для наглядности

    // 2. Получение результата через await
    println("\n--- Task 2: await result ---")
    val deferredMessage: Deferred<String> = async { getMessage8_4() }
    println("waiting for message...")
    val message = deferredMessage.await()
    println("message received: $message")

    // 3. Параллельное выполнение нескольких async
    println("\n--- Task 3: parallel async ---")
    val timeStart = System.currentTimeMillis()
    val numDeferred1 = async { sum8_4(1, 2) }
    val numDeferred2 = async { sum8_4(3, 4) }
    val numDeferred3 = async { sum8_4(5, 6) }
    
    val num1 = numDeferred1.await()
    val num2 = numDeferred2.await()
    val num3 = numDeferred3.await()
    val timeEnd = System.currentTimeMillis()

    println("number1: $num1  number2: $num2  number3: $num3")
    println("Total time: ${timeEnd - timeStart} ms") // Должно быть около 500-600мс, а не 1500

    // 4. Отложенный запуск (Lazy)
    println("\n--- Task 4: Lazy async ---")
    val lazySum = async(start = CoroutineStart.LAZY) { sum8_4(10, 20) }

    delay(1000L)
    println("Actions after the coroutine creation (Lazy)")
    // Метод await() сам запустит корутину, если она еще не запущена
    println("sum from await: ${lazySum.await()}")

    // 5. Использование start() для Lazy
    println("\n--- Task 5: Lazy async with start() ---")
    val lazySumWithStart = async(start = CoroutineStart.LAZY) { sum8_4(100, 200) }
    delay(500L)
    lazySumWithStart.start() // Явный запуск
    println("sum from await after start: ${lazySumWithStart.await()}")
}

suspend fun printHello8_4() {
    delay(500L)
    println("Hello work from async!")
}

suspend fun getMessage8_4(): String {
    delay(500L)
    return "Hello from Deferred"
}

suspend fun sum8_4(a: Int, b: Int): Int {
    delay(500L)
    println("Coroutine sum8_4($a, $b) started")
    return a + b
}

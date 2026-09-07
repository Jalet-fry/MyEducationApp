@file:OptIn(ExperimentalCoroutinesApi::class, DelicateCoroutinesApi::class)
package lessons

import kotlinx.coroutines.*

/**
 * Диспетчер корутины
 */
fun main8_7() = runBlocking {

    // 1. Диспетчер по умолчанию (Default)
    println("--- Task 1: Default Dispatcher ---")
    launch {
        println("Default Dispatcher: Thread: ${Thread.currentThread().name}")
    }

    // 2. Явное указание Dispatchers.Default
    launch(Dispatchers.Default) {
        println("Explicit Default Dispatcher: Thread: ${Thread.currentThread().name}")
    }

    // 3. Dispatchers.Unconfined (выполняется в текущем потоке до первой паузы)
    println("\n--- Task 2: Unconfined Dispatcher ---")
    launch(Dispatchers.Unconfined) {
        println("Unconfined (before delay): Thread: ${Thread.currentThread().name}")
        delay(500L)
        println("Unconfined (after delay): Thread: ${Thread.currentThread().name}")
    }

    // 4. newSingleThreadContext (свой поток)
    // Примечание: в реальных проектах нужно закрывать контекст (close)
    println("\n--- Task 3: Custom Single Thread ---")
    @OptIn(DelicateCoroutinesApi::class, ExperimentalCoroutinesApi::class)
    val customContext = newSingleThreadContext("MyCustomThread")
    launch(customContext) {
        println("Custom Context: Thread: ${Thread.currentThread().name}")
        customContext.close()
    }

    println("Main block Thread: ${Thread.currentThread().name}")
}

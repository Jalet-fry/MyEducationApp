@file:OptIn(ExperimentalCoroutinesApi::class)
package lessons

import kotlinx.coroutines.*
import kotlinx.coroutines.channels.*

/**
 * Каналы
 */
fun main8_6() = runBlocking {

    // 1. Базовое использование Channel
    println("--- Task 1: Channel basic ---")
    val channel1 = Channel<Int>()
    launch {
        for (n in 1..5) {
            channel1.send(n)
        }
    }
    
    repeat(5) {
        val number = channel1.receive()
        println("Received from channel1: $number")
    }

    println("\n--- Task 2: Channel strings ---")
    // 2. Отправка строк
    val channel2 = Channel<String>()
    launch {
        val users = listOf("Tom", "Bob", "Sam")
        for (user in users) {
            println("Sending $user")
            channel2.send(user)
        }
    }

    repeat(3) {
        val user = channel2.receive()
        println("Received from channel2: $user")
    }

    println("\n--- Task 3: Closing channel ---")
    // 3. Закрытие канала
    val channel3 = Channel<String>()
    launch {
        val users = listOf("Tom", "Bob", "Sam")
        for (user in users) {
            channel3.send(user)
        }
        channel3.close()  // Закрытие канала
    }

    for (user in channel3) { // Получаем данные из канала через итератор
        println("Received from closed channel3: $user")
    }

    println("\n--- Task 4: Producer-Consumer pattern ---")
    // 4. Паттерн producer-consumer
    val usersChannel = getUsers8_6()
    usersChannel.consumeEach { user -> println("Consumed: $user") }

    println("End of main8_6")
}

// Вспомогательная функция для паттерна producer
@OptIn(ExperimentalCoroutinesApi::class)
fun CoroutineScope.getUsers8_6(): ReceiveChannel<String> = produce {
    val users = listOf("Alice", "Kate", "Ann")
    for (user in users) {
        send(user)
    }
}

package lessons

fun main5_8() {
    val c1 = Counter5_8(10)
    val c2 = Counter5_8(20)
    
    // 1. Арифметические операторы (plus, minus, times, ...)
    val c3 = c1 + c2
    println("c1 + c2 = ${c3.value}")
    
    // 2. Унарные операторы (unaryMinus, not, ...)
    val c4 = -c1
    println("-c1 = ${c4.value}")
    
    // 3. Операторы сравнения (compareTo, equals)
    println("c1 < c2: ${c1 < c2}")
    println("c1 == c2: ${c1 == c2}")
    
    // 4. Оператор invoke (объект как функция)
    val messenger = MessengerInvoke("Hello")
    messenger("World") // Вызывает invoke
}

class Counter5_8(val value: Int) {
    // Перегрузка '+'
    operator fun plus(other: Counter5_8): Counter5_8 {
        return Counter5_8(this.value + other.value)
    }

    // Перегрузка унарного '-'
    operator fun unaryMinus(): Counter5_8 {
        return Counter5_8(-value)
    }

    // Перегрузка '>' '<' '>=' '<='
    operator fun compareTo(other: Counter5_8): Int {
        return this.value - other.value
    }
}

class MessengerInvoke(val prefix: String) {
    // Перегрузка оператора вызова ()
    operator fun invoke(message: String) {
        println("$prefix, $message!")
    }
}

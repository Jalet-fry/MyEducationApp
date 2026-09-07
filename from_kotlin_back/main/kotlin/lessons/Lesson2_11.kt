package lessons

fun main2_11() {
    val isEnabled = true
    
    // Простой when
    when (isEnabled) {
        false -> println("isEnabled off")
        true -> println("isEnabled on")
    }
    
    // when с else
    val a = 30
    when (a) {
        10 -> println("a = 10")
        20 -> println("a = 20")
        else -> println("Undefined value")
    }
    
    // Блоки кода
    var x = 10
    when (x) {
        10 -> {
            println("x is 10")
            x *= 2
        }
        else -> println("Other")
    }
    
    // Сравнение с набором значений и диапазоном
    when (x) {
        10, 20 -> println("x is 10 or 20")
        in 21..30 -> println("x is between 21 and 30")
        !in 1..9 -> println("x is not between 1 and 9")
        else -> println("Unknown")
    }
    
    // when как выражение
    val day = 2
    val dayName = when (day) {
        1 -> "Monday"
        2 -> "Tuesday"
        else -> "Unknown"
    }
    println("Day: $dayName")
    
    // when без аргумента (как if-else if)
    val b = 6
    when {
        b > 10 -> println("b > 10")
        x > 10 -> println("x > 10")
        else -> println("None")
    }
}

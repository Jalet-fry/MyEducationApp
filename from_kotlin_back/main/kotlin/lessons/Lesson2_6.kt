package lessons

fun main2_6() {
    val a = 10
    
    // Обычный if
    if (a == 10) {
        println("a равно 10")
    }
    
    // if...else
    if (a > 10) {
        println("a > 10")
    } else {
        println("a <= 10")
    }
    
    // else if
    if (a == 10) {
        println("a is 10")
    } else if (a == 9) {
        println("a is 9")
    } else {
        println("a is something else")
    }
    
    // if как выражение (возврат значения)
    val b = 20
    val max = if (a > b) a else b
    println("Max is $max")
    
    // Блоки кода в if-выражении
    val result = if (a < b) {
        println("a is smaller")
        a // возвращаемое значение
    } else {
        println("b is smaller or equal")
        b
    }
    println("Result: $result")
}

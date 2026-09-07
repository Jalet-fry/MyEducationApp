package lessons

fun main3_9() {
    // Переменная-функция (без параметров)
    val message: () -> Unit = ::hello3_9
    message() // Вызывает hello()
    
    // Переменная-функция (с параметрами)
    var operation: (Int, Int) -> Int = ::sum3_9
    println("3 + 5 = ${operation(3, 5)}")
    
    // Смена ссылки на другую функцию того же типа
    operation = ::subtract3_9
    println("14 - 5 = ${operation(14, 5)}")
}

fun hello3_9() {
    println("Hello Kotlin Type")
}

fun sum3_9(a: Int, b: Int): Int = a + b

fun subtract3_9(a: Int, b: Int): Int = a - b

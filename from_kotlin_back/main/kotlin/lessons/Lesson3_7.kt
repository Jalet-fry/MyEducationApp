package lessons

fun main3_7() {
    // Функция как параметр
    displayMessage(::morning)
    displayMessage(::evening)
    
    // Функция, принимающая числа и операцию
    println("Action Result (Sum):")
    action(5, 3, ::sumValues)
    
    println("Action Result (Multiply):")
    action(5, 3, ::multiplyValues)
    
    // Возвращение функции из функции
    val selected = selectAction(1) // Возвращает функцию sumValues
    println("Selected action(10, 5) = ${selected(10, 5)}")
}

fun displayMessage(mes: () -> Unit) {
    mes()
}

fun morning() = println("Good Morning")
fun evening() = println("Good Evening")

fun action(n1: Int, n2: Int, op: (Int, Int) -> Int) {
    val result = op(n1, n2)
    println("Result: $result")
}

fun sumValues(a: Int, b: Int): Int = a + b
fun multiplyValues(a: Int, b: Int): Int = a * b
fun subtractValues(a: Int, b: Int): Int = a - b

fun selectAction(key: Int): (Int, Int) -> Int {
    return when (key) {
        1 -> ::sumValues
        2 -> ::subtractValues
        else -> { a, b -> 0 } // лямбда для примера (будет в след. уроках)
    }
}

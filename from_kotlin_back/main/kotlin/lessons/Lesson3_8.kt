package lessons

fun main3_8() {
    // Анонимная функция без параметров
    val message = fun() {
        println("Hello from anonymous function")
    }
    message()
    
    // Анонимная функция с параметрами и возвратом
    val sum = fun(x: Int, y: Int): Int {
        return x + y
    }
    println("Sum (fun): ${sum(5, 4)}")
    
    // Анонимная функция как аргумент
    doOperation(10, 5, fun(x, y) = x * y)
    
    // Возврат анонимной функции
    val action = selectAnonAction(1)
    println("Action result: ${action(10, 2)}")
}

fun doOperation(x: Int, y: Int, op: (Int, Int) -> Int) {
    println("Operation result: ${op(x, y)}")
}

fun selectAnonAction(key: Int): (Int, Int) -> Int {
    return when (key) {
        1 -> fun(x: Int, y: Int): Int = x + y
        2 -> fun(x: Int, y: Int): Int = x - y
        else -> fun(x: Int, y: Int): Int = 0
    }
}

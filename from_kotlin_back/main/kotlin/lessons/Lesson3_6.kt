package lessons

fun main3_6() {
    // Простейшая лямбда
    val hello = { println("Hello Kotlin Lambda") }
    hello()
    
    // Лямбда с параметрами
    val sum = { x: Int, y: Int -> x + y }
    println("Sum (2, 3) = ${sum(2, 3)}")
    
    // Многострочная лямбда (возвращает результат последней строки)
    val complexAction = { x: Int, y: Int ->
        val res = x * y
        println("Calculating $x * $y...")
        res // Возвращаемое значение
    }
    println("Result: ${complexAction(4, 5)}")
    
    // Передача лямбды в функцию
    doCalc(10, 20, { a, b -> a + b })
    
    // Trailing lambda (если лямбда - последний аргумент)
    doCalc(10, 20) { a, b -> a * b }
    
    // Неиспользуемые параметры (_)
    val constantResult: (Int, Int) -> Int = { _, _ -> 42 }
    println("Constant: ${constantResult(1, 2)}")
}

fun doCalc(x: Int, y: Int, op: (Int, Int) -> Int) {
    println("Calculation result: ${op(x, y)}")
}

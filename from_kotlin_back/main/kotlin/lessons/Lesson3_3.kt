package lessons

fun main3_3() {
    // Получение результата функции
    val result = sum3_3(10, 20)
    println("10 + 20 = $result")
    
    // Функция Unit (неявно)
    sayHello3_3()
    
    // Использование return для выхода
    checkAge3_3(-5)
    checkAge3_3(25)
}

// Функция с возвращаемым значением Int
fun sum3_3(a: Int, b: Int): Int {
    return a + b
}

// Функция с возвращаемым типом Unit (аналог void)
fun sayHello3_3(): Unit {
    println("Hello!")
}

// return для прерывания выполнения
fun checkAge3_3(age: Int) {
    if (age < 0 || age > 120) {
        println("Invalid age!")
        return // выходим из функции
    }
    println("Age $age is valid.")
}

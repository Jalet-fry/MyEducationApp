package lessons

fun main3_5() {
    // Вызовы перегруженных функций
    println("Sum (Int): ${sum3_5(10, 20)}")
    println("Sum (Double): ${sum3_5(10.5, 20.5)}")
    println("Sum (3 Ints): ${sum3_5(1, 2, 3)}")
    println("Sum (Int + Double): ${sum3_5(10, 5.5)}")
}

// Перегрузка по типу параметров
fun sum3_5(a: Int, b: Int): Int {
    return a + b
}

fun sum3_5(a: Double, b: Double): Double {
    return a + b
}

// Перегрузка по количеству параметров
fun sum3_5(a: Int, b: Int, c: Int): Int {
    return a + b + c
}

// Перегрузка по порядку/комбинации типов
fun sum3_5(a: Int, b: Double): Double {
    return a + b
}

fun sum3_5(a: Double, b: Int): Double {
    return a + b
}

/*
    Ошибка: Перегрузка не может отличаться только типом возвращаемого значения!
    fun sum(a: Int, b: Int): String { return "Result" } // Будет конфликт с первой функцией
*/

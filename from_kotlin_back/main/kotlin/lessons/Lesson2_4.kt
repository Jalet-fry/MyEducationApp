package lessons

fun main2_4() {
    val x = 11
    val y = 5
    
    // Арифметические операции
    println("x + y = ${x + y}")
    println("x - y = ${x - y}")
    println("x * y = ${x * y}")
    println("x / y = ${x / y}") // Целочисленное деление: 2
    println("x % y = ${x % y}") // Остаток: 1
    
    // Деление с плавающей точкой
    val x2 = 11.0
    val y2 = 5.0
    println("x2 / y2 = ${x2 / y2}") // 2.2
    
    // Инкремент и декремент
    var a = 5
    println("++a = ${++a}") // 6
    println("a++ = ${a++}") // 6 (потом станет 7)
    println("a = $a") // 7
    
    // Поразрядные операции
    println("3 shl 2 = ${3 shl 2}") // 12
    println("12 shr 2 = ${12 shr 2}") // 3
    println("5 and 6 = ${5 and 6}") // 4
    println("5 or 6 = ${5 or 6}") // 7
    println("5 xor 6 = ${5 xor 6}") // 3
    println("11.inv() = ${11.inv()}") // -12
}

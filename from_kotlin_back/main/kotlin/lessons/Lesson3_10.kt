package lessons

/**
 * Замыкания
 */
fun main3_10() {
    // 1. Простейшее замыкание
    println("--- Task 1: simple closure ---")
    val fn = outer3_10()
    fn() // 6
    fn() // 7
    fn() // 8

    // 2. Использование анонимной функции для замыкания
    println("\n--- Task 2: anonymous closure ---")
    val fnAnon = outerAnon3_10()
    fnAnon() // 6
    fnAnon() // 7

    // 3. Замыкание с параметрами
    println("\n--- Task 3: closure with params ---")
    val multiplyBy5 = multiply3_10(5)
    println("5 * 6 = ${multiplyBy5(6)}") // 30
    println("5 * 5 = ${multiplyBy5(5)}") // 25

    // 4. Прямой вызов
    println("\n--- Task 4: direct call ---")
    println("multiply(5)(6) = ${multiply3_10(5)(6)}")
}

fun outer3_10(): () -> Unit {
    var n = 5
    fun inner() {
        n++
        println("n = $n")
    }
    return ::inner
}

fun outerAnon3_10(): () -> Unit {
    var n = 5
    return {
        n++
        println("anon n = $n")
    }
}

fun multiply3_10(n: Int): (Int) -> Int {
    return { m: Int -> n * m }
}

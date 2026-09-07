package lessons

fun main2_8() {
    // Создание диапазона (включая границы)
    val range1 = 1..5 // 1, 2, 3, 4, 5
    println("Range 1..5: ${range1.joinToString()}")

    // Диапазон символов
    val charRange = 'a'..'d'
    println("Char range a..d: ${charRange.joinToString()}")

    // downTo (обратный порядок)
    println("5 downTo 1:")
    for (i in 5 downTo 1) print("$i ")
    println()

    // step (шаг)
    println("1..10 step 2:")
    for (i in 1..10 step 2) print("$i ")
    println()

    // until (исключая верхнюю границу)
    println("1 until 5:")
    for (i in 1 until 5) print("$i ")
    println()

    // Проверка вхождения (in / !in)
    val x = 3
    println("Is $x in 1..5? ${x in 1..5}")
    println("Is 10 !in 1..5? ${10 !in 1..5}")
}

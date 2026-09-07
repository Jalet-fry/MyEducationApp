package lessons

fun main2_7() {
    // Цикл for по диапазону
    println("for 1..9:")
    for (n in 1..9) {
        print("${n * n} ")
    }
    println("\n")

    // Вложенные циклы (Таблица умножения)
    println("Multiplication table:")
    for (i in 1..5) {
        for (j in 1..5) {
            print("${i * j}\t")
        }
        println()
    }
    println()

    // Цикл while
    println("while loop:")
    var i = 3
    while (i > 0) {
        println("i = $i")
        i--
    }
    println()

    // Цикл do..while
    println("do..while loop:")
    var j = -1
    do {
        println("j = $j")
        j--
    } while (j > 0)
    println()

    // break и continue
    println("continue if n == 3:")
    for (n in 1..5) {
        if (n == 3) continue
        print("$n ")
    }
    println("\n")

    println("break if n == 3:")
    for (n in 1..5) {
        if (n == 3) break
        print("$n ")
    }
    println("\n")

    // Метки для break
    println("Labeled break (exit outer loop):")
    outerloop@ for (x in 1..3) {
        for (y in 1..3) {
            if (y == 2) break@outerloop
            println("x=$x, y=$y")
        }
    }
}

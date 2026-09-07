package lessons

fun main5_5() {
    val hello = "hello world"
    
    // Вызов функции расширения для String
    println("Count 'l' in '$hello': ${hello.wordCount5_5('l')}")
    
    // Вызов функции расширения для Int
    val n = 4
    println("$n squared is ${n.square5_5()}")
    
    // Можно вызывать прямо на литералах
    println("10 squared is ${10.square5_5()}")
}

// Extension function для String
fun String.wordCount5_5(c: Char): Int {
    var count = 0
    for (n in this) { // this ссылается на саму строку
        if (n == c) count++
    }
    return count
}

// Extension function для Int
fun Int.square5_5(): Int {
    return this * this // this ссылается на число
}

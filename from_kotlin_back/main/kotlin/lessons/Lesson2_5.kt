package lessons

fun main2_5() {
    val a = 11
    val b = 12
    
    // Операции отношения
    println("a > b: ${a > b}")
    println("a < b: ${a < b}")
    println("a == b: ${a == b}")
    println("a != b: ${a != b}")
    
    // Логические операции
    val t = true
    val f = false
    println("t and f: ${t and f}")
    println("t or f: ${t or f}")
    println("t xor f: ${t xor f}")
    println("!t: ${!t}")
    
    // Оператор in
    println("5 in 1..6: ${5 in 1..6}")
    println("8 !in 1..6: ${8 !in 1..6}")
}

package lessons

fun main3_4() {
    // Однострочная функция
    val res1 = square(5)
    println("Square of 5: $res1")
    
    // Локальная функция
    compareAge(20, 23)
    compareAge(-3, 20)
}

// Single-expression function
fun square(x: Int): Int = x * x

// Функция с локальной функцией внутри
fun compareAge(age1: Int, age2: Int) {
    
    // Локальная однострочная функция
    fun ageIsValid(age: Int) = age in 1..110

    if (!ageIsValid(age1) || !ageIsValid(age2)) {
        println("Invalid age provided: $age1 or $age2")
        return
    }

    when {
        age1 == age2 -> println("Ages are equal")
        age1 > age2 -> println("First person is older")
        age1 < age2 -> println("Second person is older")
    }
}

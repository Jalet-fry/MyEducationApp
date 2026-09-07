package lessons

fun main5_2() {
    // try-catch
    try {
        val n1 = 2
        val n2 = 0
        val result = n1 / n2
        println(result)
    } catch (e: Exception) {
        println("Exception caught: ${e.message}")
    } finally {
        println("Finally block executed")
    }

    // Информация об исключении
    try {
        val nums = arrayOf(1, 2, 3)
        println(nums[5])
    } catch (e: ArrayIndexOutOfBoundsException) {
        println("Specific catch: Array index out of bounds")
    } catch (e: Exception) {
        println("General catch: ${e.message}")
    }

    // Оператор throw
    try {
        checkAge5_2(-10)
    } catch (e: Exception) {
        println("Manual exception: ${e.message}")
    }

    // try как выражение
    val age = try {
        checkAge5_2(25)
    } catch (e: Exception) {
        18
    }
    println("Age from try expression: $age")
}

fun checkAge5_2(age: Int): Int {
    if (age < 1 || age > 110) {
        throw Exception("Invalid age: $age")
    }
    return age
}

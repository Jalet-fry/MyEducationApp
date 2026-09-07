package lessons

fun main3_1() {
    hello3_1()
    showMessage3_1("Hello Kotlin")
    displayUser3_1("Tom", 23)
    
    // Необязательные параметры
    displayUserWithDefaults3_1("Alice", 21)
    displayUserWithDefaults3_1("Kate")
    
    // Именованные аргументы
    displayUserWithDefaults3_1("Bob", position = "Manager", age = 28)
    
    // Изменение параметров (через объект)
    val nums = intArrayOf(4, 5, 6)
    doubleFirstElement3_1(nums)
    println("First element after double: ${nums[0]}")
}

fun hello3_1() {
    println("Hello")
}

fun showMessage3_1(message: String) {
    println(message)
}

fun displayUser3_1(name: String, age: Int) {
    println("Name: $name   Age: $age")
}

fun displayUserWithDefaults3_1(name: String, age: Int = 18, position: String = "unemployed") {
    println("Name: $name   Age: $age  Position: $position")
}

fun doubleFirstElement3_1(numbers: IntArray) {
    numbers[0] = numbers[0] * 2
}

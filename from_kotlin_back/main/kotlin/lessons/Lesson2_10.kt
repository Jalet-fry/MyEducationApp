package lessons

fun main2_10() {
    // Вывод в консоль
    print("Hello ") // Без новой строки
    println("Kotlin") // С новой строкой
    
    // Ввод из консоли
    println("Enter your name:")
    val name = readLine() // Возвращает String?
    
    println("Enter your age:")
    val ageInput = readLine()
    val age = ageInput?.toIntOrNull() ?: 0 // Безопасное приведение к числу
    
    println("User Info: Name = $name, Age = $age")
}

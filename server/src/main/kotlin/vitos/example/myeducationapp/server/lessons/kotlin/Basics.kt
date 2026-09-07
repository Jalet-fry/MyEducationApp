package vitos.example.myeducationapp.server.lessons.kotlin

/**
 * Реальный код уроков (Бэкенд).
 * Как в твоем примере from_kotlin_back.
 */

fun lesson1_1() {
    println("Hello METANIT.COM from Backend!")
}

fun lesson2_1(params: Map<String, String>) {
    val name = params["userName"] ?: "Guest"
    val age = params["userAge"]?.toIntOrNull() ?: 20
    
    println("--- Выполнение кода на бэкенде ---")
    println("Привет, $name!")
    println("Твой возраст: $age")
    
    if (age >= 18) {
        println("Доступ разрешен.")
    } else {
        println("Доступ ограничен.")
    }
}

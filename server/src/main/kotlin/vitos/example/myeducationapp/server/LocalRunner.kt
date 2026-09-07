package vitos.example.myeducationapp.server

import vitos.example.myeducationapp.server.lessons.kotlin.*

/**
 * Запускалка для ноута (CLI).
 * Аналог того, что у тебя в from_kotlin_back/runner/Main.kt
 */
fun main() {
    println("=== MyEducationApp Local Runner ===")
    println("Доступные уроки: 1.1, 2.1")
    
    while (true) {
        print("\nВведите ID урока (или 'exit'): ")
        val input = readlnOrNull() ?: "exit"
        if (input == "exit") break
        
        when (input) {
            "1.1" -> lesson1_1()
            "2.1" -> {
                println("Введите параметры для 2.1 (имя и возраст через пробел):")
                val p = readlnOrNull()?.split(" ") ?: listOf("Guest", "25")
                lesson2_1(mapOf("userName" to (p.getOrNull(0) ?: "Guest"), "userAge" to (p.getOrNull(1) ?: "25")))
            }
            else -> println("Урок $input не найден.")
        }
    }
}

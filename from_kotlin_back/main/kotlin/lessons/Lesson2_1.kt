package lessons

const val maxAge = 120  // константа

fun main2_1() {
    // Переменные
    var age: Int
    age = 23
    println(age)

    // Инициализация
    var age2: Int = 23
    println(age2)

    // val - только для чтения
    val name: String = "Tom"
    // name = "Bob" // Ошибка

    // var - изменяемая
    var age3 = 23
    age3 = 56
    println(age3)

    // Использование константы
    println(maxAge)
}

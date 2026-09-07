package lessons

fun main4_11() {
    // val figure = Figure() // Ошибка: нельзя создать объект абстрактного класса
    
    val rect = Rectangle4_11(10f, 20f)
    println("Rectangle Area: ${rect.area()}")
    println("Rectangle Perimeter: ${rect.perimeter()}")
    
    val person = Person4_11("Slim Shady")
    person.hello()
}

// 1. Абстрактный класс (шаблон)
abstract class Figure4_11 {
    // Абстрактные методы (без реализации)
    abstract fun perimeter(): Float
    abstract fun area(): Float
}

class Rectangle4_11(val width: Float, val height: Float) : Figure4_11() {
    override fun perimeter() = (width + height) * 2
    override fun area() = width * height
}

// 2. Абстрактный класс со свойствами
abstract class Human4_11(val name: String) {
    abstract var age: Int
    abstract fun hello()
}

class Person4_11(name: String) : Human4_11(name) {
    override var age: Int = 1 // Обязательная реализация свойства
    
    override fun hello() {
        println("My name is $name")
    }
}

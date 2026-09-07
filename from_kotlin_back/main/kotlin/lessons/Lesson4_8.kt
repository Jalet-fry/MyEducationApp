package lessons

fun main4_8() {
    val car = CarImplementation("Tesla", "S3")
    val aircraft = AircraftImplementation()
    
    // Полиморфизм: работаем через интерфейс Movable
    travel(car)
    travel(aircraft)
    
    // Множественная реализация
    val student = WorkingStudent("Alex")
    student.work()
    student.study()
    
    // Вызов методов по умолчанию
    car.stop() // Стандартная остановка
    aircraft.stop() // Переопределенная остановка
}

// 1. Интерфейс со свойствами и методами (в т.ч. по умолчанию)
interface Movable {
    var speed: Int // Абстрактное свойство
    val model: String
    
    fun move() // Абстрактный метод
    
    fun stop() { // Метод с реализацией по умолчанию
        println("Stopping generic vehicle...")
    }
}

class CarImplementation(override val model: String, val plate: String) : Movable {
    override var speed: Int = 60
    override fun move() = println("$model ($plate) driving at $speed km/h")
}

class AircraftImplementation : Movable {
    override var speed: Int = 800
    override val model: String = "Boeing"
    override fun move() = println("$model flying at $speed km/h")
    
    override fun stop() {
        println("$model is landing...")
    }
}

// 2. Множественная реализация интерфейсов
interface Worker { fun work() }
interface Student { fun study() }

class WorkingStudent(val name: String) : Worker, Student {
    override fun work() = println("$name is working")
    override fun study() = println("$name is studying")
}

// Вспомогательная функция, принимающая интерфейс
fun travel(m: Movable) {
    m.move()
}

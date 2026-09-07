package lessons

fun main4_15() {
    // Обращение к свойствам и методам companion объекта через имя КЛАССА
    println("Initial count: ${PersonWithCompanion.counter}")
    
    val p1 = PersonWithCompanion("Tom")
    val p2 = PersonWithCompanion("Bob")
    
    PersonWithCompanion.printCounter() // Выведет 2
    
    // Наследование
    EmployeeFromCompanion("Alice")
    PersonWithCompanion.printCounter() // Выведет 3 (т.к. вызван init родителя)
}

open class PersonWithCompanion(val name: String) {
    init {
        counter++ // Доступ к companion члену внутри класса
    }

    // Companion объект - аналог статических членов
    companion object {
        var counter = 0
            private set // Сеттер приватный, менять можно только здесь
            
        fun printCounter() {
            println("Total persons created: $counter")
        }
    }
}

class EmployeeFromCompanion(name: String) : PersonWithCompanion(name)
// EmployeeFromCompanion.printCounter() - Ошибка! Статика не наследуется в Kotlin так, как в Java.
// Нужно использовать PersonWithCompanion.printCounter()

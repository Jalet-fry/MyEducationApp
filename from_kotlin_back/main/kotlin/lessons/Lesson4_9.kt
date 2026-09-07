package lessons

fun main4_9() {
    val bob = EmployeeBase("Bob", "JetBrains")
    bob.printName()
    bob.printCompany()
    
    val anyObj: Any = bob
    println("Hash: ${anyObj.hashCode()}")
}

// По умолчанию классы в Kotlin закрыты (final). Чтобы разрешить наследование, нужно 'open'
open class PersonBase(val name: String) {
    fun printName() {
        println("Name: $name")
    }
}

// Наследуемся от PersonBase. Обязательно вызываем конструктор родителя
class EmployeeBase(name: String, val company: String) : PersonBase(name) {
    
    fun printCompany() {
        println("Works at: $company")
    }
}

// Пример с вторичным конструктором и super
class ManagerBase : PersonBase {
    val department: String
    
    constructor(name: String, dept: String) : super(name) {
        this.department = dept
    }
}

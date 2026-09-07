package lessons

fun main4_6() {
    val person = PersonWithVisibility("Tom", 37)
    
    // Публичные члены доступны везде
    person.printInfo()
    println("Public name: ${person.publicName}")
    
    // person.printAge() // Ошибка: private
    // println(person.age) // Ошибка: private
    
    val emp = EmployeeWithVisibility("Bob", 25, "JetBrains")
    emp.showDetails()
}

// По умолчанию все public
open class PersonWithVisibility(val publicName: String, private var age: Int) {

    // private - доступно только внутри этого класса
    private fun printAge() {
        println("Age: $age")
    }

    // protected - доступно в этом классе и наследниках
    protected fun printName() {
        println("Name: $publicName")
    }

    // public - доступно везде
    fun printInfo() {
        printName()
        printAge()
    }
}

class EmployeeWithVisibility(name: String, age: Int, val company: String) : PersonWithVisibility(name, age) {
    
    fun showDetails() {
        println("Employee at $company")
        printName() // Доступно, так как protected в родителе
        // printAge() // Ошибка, так как private в родителе
    }
}

// internal - доступно во всем модуле
internal class InternalClass {
    internal val info = "I am internal"
}

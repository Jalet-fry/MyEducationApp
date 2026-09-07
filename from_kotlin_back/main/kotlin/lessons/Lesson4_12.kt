package lessons

fun main4_12() {
    val alice = PersonData("Alice", 24)
    
    // toString() уже реализован
    println(alice.toString()) // PersonData(name=Alice, age=24)
    
    // equals() / hashCode()
    val alice2 = PersonData("Alice", 24)
    println("alice == alice2: ${alice == alice2}") // true
    
    // copy() - создание копии с изменением части свойств
    val kate = alice.copy(name = "Kate")
    println(kate) // PersonData(name=Kate, age=24)
    
    // Деструктуризация (декомпозиция)
    val (name, age) = alice
    println("Destructured: $name, $age")
}

// data класс должен иметь хоть один параметр в первичном конструкторе
// все параметры должны быть val или var
data class PersonData(val name: String, val age: Int)

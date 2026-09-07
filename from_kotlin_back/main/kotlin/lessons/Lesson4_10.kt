package lessons

fun main4_10() {
    val tom = PersonOverriding("Tom")
    tom.age = 20
    tom.display() 

    val bob = EmployeeOverriding("Bob", 25, "JetBrains")
    bob.display() 
    
    val sam = ManagerOverriding("Sam", "Google")
    sam.display() 
}

open class PersonOverriding(val name: String) {
    
    open var age: Int = 1
    
    open fun display() {
        println("Name: $name")
    }
}

class EmployeeOverriding(name: String, override var age: Int, val company: String) : PersonOverriding(name) {
    
    override fun display() {
        println("Name: $name    Company: $company")
    }
}

class ManagerOverriding(name: String, val company: String) : PersonOverriding(name) {
    
    override fun display() {
        super.display()
        println("Company: $company, Position: Manager")
    }
    
    final override var age: Int = 30
}

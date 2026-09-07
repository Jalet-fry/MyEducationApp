package lessons

fun main4_1() {
    val tom = Person4_1()
    tom.name = "Tom"
    tom.age = 37

    tom.sayHello()
    tom.go("the shop")
    println(tom.personToString())
    
    val bob = Person4_1()
    bob.name = "Bob"
    bob.age = 25
    println(bob.personToString())
}

class Person4_1 {
    var name: String = "Undefined"
    var age: Int = 18

    fun sayHello() {
        println("Hello, my name is $name")
    }

    fun go(location: String) {
        println("$name goes to $location")
    }

    fun personToString(): String {
        return "Name: $name  Age: $age"
    }
}

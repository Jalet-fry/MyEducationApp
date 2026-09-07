package lessons

fun main4_14() {
    // 1. Анонимный объект "на лету"
    val person = object {
        val name = "Tom"
        var age = 37
        fun sayHello() = println("Hi, I am $name, $age years old")
    }
    person.sayHello()

    // 2. Анонимный объект с наследованием
    val manager = object : Person4_14("Sam") {
        val company = "JetBrains"
        override fun sayHello() {
            println("Hi, I am $name. I work at $company")
        }
    }
    manager.sayHello()

    // 3. Анонимный объект как аргумент
    greetPerson(object : Person4_14("Alice") {
        override fun sayHello() = println("Alice says hi!")
    })
}

open class Person4_14(val name: String) {
    open fun sayHello() = println("Hi, I am $name")
}

fun greetPerson(p: Person4_14) {
    p.sayHello()
}

// 4. Глобальный анонимный объект (Singleton)
object SingletonPerson {
    val name = "Global Tom"
    fun info() = println("I am a global object named $name")
}

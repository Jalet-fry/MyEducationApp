package lessons

fun main4_3() {
    // Вызов вторичного конструктора
    val tom = PersonV1("Tom", 39)
    println("Tom: ${tom.name}, ${tom.age}")

    // Первичный конструктор
    val bob = PersonV2("Bob", 45)
    println("Bob: ${bob.name}, ${bob.age}")

    // Свойства прямо в конструкторе
    val alice = PersonV3("Alice", 25)
    println("Alice: ${alice.name}, ${alice.age}")

    // Блок init (валидация)
    val sam = PersonV4("Sam", -10)
    println("Sam (invalid age): ${sam.age}") // Должно быть 1
}

// Класс только со вторичным конструктором
class PersonV1 {
    val name: String
    var age: Int

    constructor(_name: String, _age: Int) {
        name = _name
        age = _age
    }
}

// Класс с первичным конструктором и явными свойствами
class PersonV2(_name: String, _age: Int) {
    val name: String = _name
    var age: Int = _age
}

// Свойства определяются прямо в первичном конструкторе
class PersonV3(val name: String, var age: Int)

// Использование блока init для логики инициализации
class PersonV4(_name: String, _age: Int) {
    val name: String = _name
    var age: Int = 1

    init {
        println("Initializing $name")
        if (_age > 0 && _age < 110) {
            age = _age
        }
    }
}

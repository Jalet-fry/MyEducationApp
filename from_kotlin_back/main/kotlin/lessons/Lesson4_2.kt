package lessons

fun main4_2() {
    val bob = PersonWithAccessors("Bob")
    bob.age = 25 // Вызывает сеттер
    println("Age: ${bob.age}") // Вызывает геттер
    
    bob.age = -10 // Сеттер не пропустит
    println("Age after invalid set: ${bob.age}") // Останется 25
    
    val tom = PersonWithAccessors("Tom", "Smith")
    println("Fullname: ${tom.fullname}") // Вычисляемый геттер
    
    tom.lastname = "Simpson"
    println("Fullname after lastname change: ${tom.fullname}")
}

class PersonWithAccessors(val firstname: String) {
    var lastname: String = ""

    // Вторичный конструктор для удобства (будет в след. теме)
    constructor(firstname: String, lastname: String) : this(firstname) {
        this.lastname = lastname
    }

    // Свойство с кастомным геттером и сеттером
    var age: Int = 1
        set(value) {
            println("Setting age to $value")
            if (value in 1..109) {
                field = value // field - скрытое поле (backing field)
            } else {
                println("Invalid age ignored")
            }
        }
        get() {
            println("Getting age...")
            return field
        }

    // Только для чтения (вычисляемое свойство)
    val fullname: String
        get() = "$firstname $lastname".trim()
}

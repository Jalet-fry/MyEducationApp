package lessons

fun main5_3() {
    // 1. Встроенные методы преобразования
    val s = "12"
    val d = s.toInt()
    println("String '12' to Int: $d")
    
    // 2. Оператор is и Smart Cast
    val tom = Person5_3("Tom")
    val bob = Employee5_3("Bob", "JetBrains")
    
    checkEmployment5_3(tom)
    checkEmployment5_3(bob)
    
    // 3. Оператор as (явное приведение)
    val hello: Any = "Hello Kotlin"
    val message: String = hello as String // unsafe cast
    println("As String: $message")
    
    // 4. Оператор as? (безопасное приведение)
    val obj: Any = 123
    val str: String? = obj as? String
    println("Safe cast result (Int to String): $str") // null
}

open class Person5_3(val name: String)
class Employee5_3(name: String, val company: String) : Person5_3(name)

fun checkEmployment5_3(person: Person5_3) {
    if (person is Employee5_3) {
        // Smart Cast: здесь person автоматически считается Employee5_3
        println("${person.name} works at ${person.company}")
    } else {
        println("${person.name} is unemployed")
    }
}

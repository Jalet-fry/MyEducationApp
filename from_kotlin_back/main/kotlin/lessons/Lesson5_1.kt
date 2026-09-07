package lessons

fun main5_1() {
    // Nullable типы
    var name: String? = "Tom"
    name = null // Можно присвоить null
    
    // val age: Int = null // Ошибка
    var age: Int? = null // Ок
    
    // Оператор ?: (Elvis operator)
    val userName: String = name ?: "Undefined"
    println("User name: $userName")
    
    // Оператор ?. (Safe call)
    val length: Int? = name?.length
    println("Length: $length")
    
    // Цепочки вызовов
    val person: Person5_1? = Person5_1(null)
    val upperName = person?.name?.uppercase() ?: "UNKNOWN"
    println("Upper name: $upperName")
    
    // Оператор !! (Not-null assertion)
    name = "Alice"
    val nonNullName: String = name!!
    println("Non-null name: $nonNullName")
    
    try {
        val nullVal: String? = null
        val forced = nullVal!! // Вызовет исключение
    } catch (e: Exception) {
        println("Caught exception from !! operator")
    }
}

class Person5_1(val name: String?)

package lessons

fun main7_1() {
    // Коллекции бывают изменяемые (Mutable) и неизменяемые (read-only)
    
    // Неизменяемая коллекция
    val readOnlyList = listOf("Tom", "Bob", "Sam")
    println("Read-only list: $readOnlyList")
    // readOnlyList.add("Alice") // Ошибка компиляции
    
    // Изменяемая коллекция
    val mutableList = mutableListOf("Tom", "Bob")
    mutableList.add("Sam")
    println("Mutable list after add: $mutableList")
    
    // Общие свойства и методы (Collection)
    println("Size: ${readOnlyList.size}")
    println("IsEmpty: ${readOnlyList.isEmpty()}")
    println("Contains 'Tom': ${readOnlyList.contains("Tom")}")
}

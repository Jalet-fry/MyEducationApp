package lessons

fun main7_2() {
    // Создание списка
    val people = listOf("Tom", "Sam", "Kate", "Bob", "Alice")
    
    // Получение элементов
    println("First: ${people[0]}")
    println("Second: ${people.get(1)}")
    println("Safe get: ${people.getOrNull(10)}") // null
    println("Get or else: ${people.getOrElse(7) { "Unknown index $it" }}")
    
    // Часть списка
    val sub = people.subList(1, 4)
    println("Sublist (1 to 4): $sub")
    
    // Изменяемый список (MutableList)
    val mutablePeople = mutableListOf("Tom", "Bob")
    mutablePeople.add("Sam")
    mutablePeople.add(0, "Alice")
    println("After adds: $mutablePeople")
    
    mutablePeople.removeAt(1)
    mutablePeople.remove("Sam")
    println("After removes: $mutablePeople")
}

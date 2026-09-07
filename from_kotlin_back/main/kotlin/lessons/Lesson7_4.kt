package lessons

fun main7_4() {
    // Неизменяемая карта (Map)
    val people = mapOf(1 to "Tom", 5 to "Sam", 8 to "Bob")
    println("Map: $people")

    // Перебор
    for ((key, value) in people) {
        println("$key - $value")
    }

    // Обращение к элементам
    val dictionary = mapOf("red" to "красный", "blue" to "синий")
    println("blue: ${dictionary["blue"]}")
    println("yellow: ${dictionary.getOrDefault("yellow", "Undefined")}")

    // Изменяемая карта (MutableMap)
    val mutablePeople = mutableMapOf(1 to "Tom", 2 to "Sam")
    mutablePeople[3] = "Bob" // добавление
    mutablePeople[1] = "Tomas" // изменение
    println("After changes: $mutablePeople")

    mutablePeople.remove(2)
    println("After remove: $mutablePeople")

    // Ключи и значения
    println("Keys: ${mutablePeople.keys}")
    println("Values: ${mutablePeople.values}")
}

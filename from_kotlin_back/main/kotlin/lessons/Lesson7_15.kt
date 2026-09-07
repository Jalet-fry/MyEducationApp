package lessons

/**
 * Получение отдельных элементов
 */
fun main7_15() {
    val people = listOf("Tom", "Sam", "Kate", "Bob", "Alice")

    // 1. elementAt
    println("Element at 1: ${people.elementAt(1)}")     // Sam

    // 2. elementAtOrNull
    println("Element at 1 (safe): ${people.elementAtOrNull(1)}")
    println("Element at 6 (safe): ${people.elementAtOrNull(6)}")

    // 3. elementAtOrElse
    println("Element at 6 (else): ${people.elementAtOrElse(6) { "Undefined" }}")
    println("Element at 8 (else): ${people.elementAtOrElse(8) { "Index $it out of bounds" }}")

    // 4. first и last
    println("First: ${people.first()}")
    println("Last: ${people.last()}")

    // 5. first/last с условием
    println("First length 4: ${people.first { it.length == 4 }}")
    println("Last length 3: ${people.last { it.length == 3 }}")

    // 6. firstOrNull и lastOrNull
    println("First length 33: ${people.firstOrNull { it.length == 33 }}")
    println("Last length 33: ${people.lastOrNull { it.length == 33 }}")

    // 7. random
    println("Random: ${people.random()}")
    val emptyList = listOf<String>()
    println("Random (empty): ${emptyList.randomOrNull()}")
}

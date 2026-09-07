package lessons

/**
 * Продвинутые операции с коллекциями: associate, partition, windowed
 */
fun main7_17() {
    val users = listOf(
        User7_17(1, "Tom", 20),
        User7_17(2, "Bob", 15),
        User7_17(3, "Alice", 25)
    )

    // 1. associate - превращение списка в Map
    println("--- Task 1: associate ---")
    val idToName = users.associate { it.id to it.name }
    println("Map (ID to Name): $idToName")

    val nameToUser = users.associateBy { it.name }
    println("Map (Name to User object): $nameToUser")

    // 2. partition - разделение списка на два по условию
    println("\n--- Task 2: partition ---")
    val (adults, minors) = users.partition { it.age >= 18 }
    println("Adults: $adults")
    println("Minors: $minors")

    // 3. windowed - скользящее окно
    println("\n--- Task 3: windowed ---")
    val numbers = listOf(1, 2, 3, 4, 5)
    val windows = numbers.windowed(size = 3, step = 1)
    println("Sliding windows of 3: $windows") // [[1,2,3], [2,3,4], [3,4,5]]
}

data class User7_17(val id: Int, val name: String, val age: Int)

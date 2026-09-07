package lessons

/**
 * Сортировка
 */
fun main7_11() {
    val peopleNames = listOf("Tom", "Mike", "Bob", "Sam", "Alice")
    val numbers = listOf(3, 5, 2, -4, -6, 9, 1)

    // 1. sorted и sortedDescending
    println("Sorted names: ${peopleNames.sorted()}")
    println("Sorted numbers: ${numbers.sorted()}")
    println("Sorted descending names: ${peopleNames.sortedDescending()}")
    println("Sorted descending numbers: ${numbers.sortedDescending()}")

    // 2. Реализация Comparable (по имени)
    val peopleByNames = listOf(
        Person7_11_ByName("Tom", 37),
        Person7_11_ByName("Bob", 41),
        Person7_11_ByName("Sam", 25)
    )
    println("Sorted by name (Comparable): ${peopleByNames.sorted()}")

    // 3. Реализация Comparable (по возрасту)
    val peopleByAge = listOf(
        Person7_11_ByAge("Tom", 37),
        Person7_11_ByAge("Bob", 41),
        Person7_11_ByAge("Sam", 25)
    )
    println("Sorted by age (Comparable): ${peopleByAge.sorted()}")

    // 4. sortedWith и Comparator
    val peopleList = listOf(
        Person7_11_Simple("Tom", 37),
        Person7_11_Simple("Bob", 41),
        Person7_11_Simple("Sam", 25)
    )
    val ageComparator = Comparator { p1: Person7_11_Simple, p2: Person7_11_Simple -> p1.age - p2.age }
    println("Sorted with Comparator: ${peopleList.sortedWith(ageComparator)}")

    // 5. sortedBy и sortedByDescending
    println("SortedBy name: ${peopleList.sortedBy { it.name }}")
    println("SortedBy age: ${peopleList.sortedBy { it.age }}")
    println("SortedByDescending age: ${peopleList.sortedByDescending { it.age }}")

    // 6. reversed и shuffled
    val nums = listOf(1, 2, 3, 4, 5, 6)
    println("Reversed: ${nums.reversed()}")
    println("Shuffled: ${nums.shuffled()}")
}

class Person7_11_ByName(val name: String, val age: Int) : Comparable<Person7_11_ByName> {
    override fun compareTo(other: Person7_11_ByName): Int = name.compareTo(other.name)
    override fun toString(): String = "$name ($age)"
}

class Person7_11_ByAge(val name: String, val age: Int) : Comparable<Person7_11_ByAge> {
    override fun compareTo(other: Person7_11_ByAge): Int = age - other.age
    override fun toString(): String = "$name ($age)"
}

class Person7_11_Simple(val name: String, val age: Int) {
    override fun toString(): String = "$name ($age)"
}

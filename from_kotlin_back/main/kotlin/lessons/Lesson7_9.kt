package lessons

/**
 * Трансформации
 */
fun main7_9() {
    // 1. map
    val people = listOf(Person7_9("Tom"), Person7_9("Sam"), Person7_9("Bob"))
    val names = people.map { it.name }
    println("Names: $names")

    val numbers = listOf(1, 2, 3, 4, 5)
    val squares = numbers.map { it * it }
    println("Squares: $squares")

    // 2. mapIndexed
    val peopleWithIndex = listOf(Person7_9("Tom"), Person7_9("Sam"), Person7_9("Bob"))
    val indexedNames = peopleWithIndex.mapIndexed { index, p -> "${index + 1}.${p.name}" }
    println("Indexed Names: $indexedNames")

    // 3. mapNotNull
    val mixedPeople = listOf(
        Person7_9("Tom"), Person7_9("Sam"),
        Person7_9("Bob"), Person7_9("Alice")
    )
    val names3Chars = mixedPeople.mapNotNull { if (it.name.length != 3) null else it.name }
    println("Names with 3 chars: $names3Chars")

    val oddNames = mixedPeople.mapIndexedNotNull { index, p -> if (index % 2 == 0) null else p.name }
    println("Names on odd positions: $oddNames")

    // 4. flatten
    val personalGroups = listOf(listOf("Tom", "Bob"), listOf("Sam", "Mike", "Kate"), listOf("Tom", "Bill"))
    val flattenedPeople = personalGroups.flatten()
    println("Flattened: $flattenedPeople")
}

class Person7_9(val name: String)

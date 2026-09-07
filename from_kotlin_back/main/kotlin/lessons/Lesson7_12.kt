package lessons

/**
 * Агрегатные операции
 */
fun main7_12() {
    // 1. Минимальное и максимальное значение
    val numbers = listOf(4, 6, 3, 5, 1, 2)
    val peopleNames = listOf("Alice", "Tom", "Sam", "Kate", "Bob")

    println("Numbers min: ${numbers.minOrNull()}, max: ${numbers.maxOrNull()}")
    println("Names min: ${peopleNames.minOrNull()}, max: ${peopleNames.maxOrNull()}")

    // 2. minByOrNull и maxByOrNull
    val people = listOf(Person7_12("Tom", 37), Person7_12("Bob", 41), Person7_12("Sam", 25))
    println("Min age person: ${people.minByOrNull { it.age }}")
    println("Max age person: ${people.maxByOrNull { it.age }}")

    // 3. minOfOrNull и maxOfOrNull (возвращают само значение)
    println("Min age value: ${people.minOfOrNull { it.age }}")
    println("Max age value: ${people.maxOfOrNull { it.age }}")

    // 4. minWithOrNull и maxWithOrNull (с компаратором)
    val colors = listOf("red", "green", "blue", "yellow")
    println("Min color length: ${colors.minWithOrNull(compareBy { it.length })}")
    println("Max color length: ${colors.maxWithOrNull(compareBy { it.length })}")

    // 5. minOfWithOrNull и maxOfWithOrNull
    val complexPeople = listOf(
        Person7_12("Tom", 37), Person7_12("Kate", 29),
        Person7_12("Sam", 25), Person7_12("Alice", 33)
    )
    println("Shortest name: ${complexPeople.minOfWithOrNull(compareBy { it.length }) { it.name }}")
    println("Longest name: ${complexPeople.maxOfWithOrNull(compareBy { it.length }) { it.name }}")

    // 6. Среднее и сумма
    println("Avg: ${numbers.average()}")
    println("Sum: ${numbers.sum()}")

    // 7. Количество элементов
    val names = listOf("Tom", "Sam", "Bob", "Kate", "Alice")
    println("Count: ${names.count()}")
    println("Count length 3: ${names.count { it.length == 3 }}")

    // 8. Сведение (reduce)
    val numList = listOf(1, 2, 3, 4, 5)
    println("Reduced sum: ${numList.reduce { a, b -> a + b }}")
    println("Reduced names string: ${names.reduce { a, b -> "$a $b" }}")

    // 9. Сведение (fold)
    println("Folded names: ${names.fold("People:") { a, b -> "$a $b" }}")
}

class Person7_12(val name: String, val age: Int) {
    override fun toString(): String = "$name ($age)"
}

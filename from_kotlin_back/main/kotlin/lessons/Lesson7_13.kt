package lessons

/**
 * Сложение, вычитание и объединение коллекций
 */
fun main7_13() {
    val people = listOf("Tom", "Bob", "Sam")

    // 1. plus (+)
    val resultPlus1 = people.plus("Alice")
    val resultPlus2 = people + listOf("Mike", "Kate")
    println("Plus single: $resultPlus1")
    println("Plus collection: $resultPlus2")

    // 2. minus (-)
    val peopleForMinus = listOf("Tom", "Bob", "Sam", "Kate")
    val resultMinus1 = peopleForMinus.minus("Bob")
    val resultMinus2 = peopleForMinus - listOf("Mike", "Kate")
    println("Minus single: $resultMinus1")
    println("Minus collection: $resultMinus2")

    // 3. zip
    val english = listOf("red", "blue", "green")
    val russian = listOf("красный", "синий", "зеленый")
    val zipped = english.zip(russian)
    println("Zipped: $zipped")
    for (pair in zipped) {
        println("${pair.first}: ${pair.second}")
    }

    // 4. zip с трансформацией
    val formatted = english.zip(russian) { en, ru -> "$en - $ru" }
    println("Zipped formatted: $formatted")

    // 5. unzip
    val (enList, ruList) = zipped.unzip()
    println("Unzipped first: $enList")
    println("Unzipped second: $ruList")
}

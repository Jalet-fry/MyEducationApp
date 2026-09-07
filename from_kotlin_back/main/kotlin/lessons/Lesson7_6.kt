package lessons

/**
 * Отличие последовательности от коллекций Iterable
 */
fun main7_6() {
    // 1. Коллекции Iterable (List)
    var peopleList = listOf(
        Person7_6("Tom", 37),
        Person7_6("Sam", 25),
        Person7_6("Alice", 33)
    )
    println("Processing List:")
    peopleList = peopleList.filter { println("Age filter: ${it}"); it.age > 30 }
        .filter { println("Name filter: ${it}"); it.name.length == 3 }
    println("Result:")
    for (person in peopleList) println(person)

    println("\n----------------\n")

    // 2. Последовательности
    var peopleSeq = sequenceOf(
        Person7_6("Tom", 37),
        Person7_6("Sam", 25),
        Person7_6("Alice", 33)
    )
    println("Processing Sequence:")
    peopleSeq = peopleSeq.filter { println("Age filter: ${it}"); it.age > 30 }
        .filter { println("Name filter: ${it}"); it.name.length == 3 }
    println("Result:")
    for (person in peopleSeq) println(person)

    println("\n----------------\n")

    // 3. Сокращение набора операций с take()
    var peopleTake = sequenceOf(
        Person7_6("Tom", 37),
        Person7_6("Sam", 25),
        Person7_6("Alice", 33)
    )
    println("Sequence with take(1):")
    val resultTake = peopleTake.filter { println("Age filter: ${it}"); it.age > 30 }
        .take(1)
    for (person in resultTake) println(person)
}

data class Person7_6(val name: String, val age: Int)

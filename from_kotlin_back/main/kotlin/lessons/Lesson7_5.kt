package lessons

/**
 * Последовательности
 */
fun main7_5() {
    val people = sequenceOf("Tom", "Sam", "Bob")    // тип Sequence<String>
    println(people.joinToString())  // Tom, Sam, Bob

    val employees = listOf("Tom", "Sam", "Bob") // объект List<String>
    val peopleSeq = employees.asSequence()         // тип Sequence<String>
    println(peopleSeq.joinToString())    // Tom, Sam, Bob

    var number = 0
    val numbers = generateSequence { number += 2; number }
    println(numbers.take(5).joinToString())    // 2, 4, 6, 8, 10

    var number2 = 0
    val numbersLimited = generateSequence { number2 += 2; if (number2 > 8) null else number2 }
    println(numbersLimited.joinToString())    // 2, 4, 6, 8

    val numbersStep = generateSequence(5) { if (it == 25) null else it + 5 }
    println(numbersStep.joinToString())    // 5, 10, 15, 20, 25

    val yieldNumbers = sequence {
        yield(1)
        yield(4)
        yield(7)
    }
    println(yieldNumbers.joinToString())    // 1, 4, 7

    val infiniteSeq = sequence {
        var start = 0
        while (true) yield(start++)
    }
    println(infiniteSeq.take(5).joinToString())    // 0, 1, 2, 3, 4

    val personal = sequence {
        val data = listOf("Alice", "Kate", "Ann")
        yieldAll(data)
    }
    println(personal.joinToString())    // Alice, Kate, Ann

    for (person in people) println(person)
}

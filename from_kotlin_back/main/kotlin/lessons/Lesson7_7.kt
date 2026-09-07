package lessons

/**
 * Фильтрация
 */
fun main7_7() {
    // 1. Фильтрация по условию (filter)
    var people = sequenceOf("Tom", "Sam", "Mike", "Bob", "Alice")
    people = people.filter { it.length == 3 }
    println("Filter length 3: ${people.joinToString()}")

    var employees = listOf(
        Person7_7("Tom", 37),
        Person7_7("Bob", 41),
        Person7_7("Sam", 25)
    )
    val filteredEmployees = employees.filter { it.age > 30 }
    println("Filter age > 30: $filteredEmployees")

    // 2. filterNot
    val names = sequenceOf("Tom", "Sam", "Mike", "Bob", "Alice")
    val notLength3 = names.filterNot { it.length == 3 }
    println("FilterNot length 3: ${notLength3.joinToString()}")

    // 3. filterIndexed
    val peopleList = listOf("Tom", "Mike", "Sam", "Bob", "Alice")
    val filteredIndexed = peopleList.filterIndexed { index, s -> (index % 2 == 0) && (s.length == 3) }
    println("FilterIndexed (even index and length 3): $filteredIndexed")

    // 4. filterIsInstance
    val mixedList = listOf(
        Person7_7_Basic("Tom"), Employee7_7("Bob"),
        Person7_7_Basic("Sam"), Employee7_7("Mike")
    )
    val onlyEmployees = mixedList.filterIsInstance<Employee7_7>()
    println("FilterIsInstance<Employee>: $onlyEmployees")

    // 5. filterNotNull
    val nullablePeople = listOf(Person7_7_Basic("Tom"), null, Person7_7_Basic("Sam"), null)
    val nonNullPeople = nullablePeople.filterNotNull()
    println("FilterNotNull: $nonNullPeople")
}

data class Person7_7(val name: String, val age: Int)

open class Person7_7_Basic(val name: String) {
    override fun toString(): String = name
}

class Employee7_7(name: String) : Person7_7_Basic(name)

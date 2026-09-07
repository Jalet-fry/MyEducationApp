package lessons

/**
 * Set
 */
fun main7_3() {
    val numbers = setOf(5, 6, 7)            // объект Set<Int>
    val people = setOf("Tom", "Sam", "Bob") // объект Set<String>

    for (person in people) println(person)
    println(people) // [Tom, Sam, Bob]

    val numbers2 = setOf(5, 6, 7, 5, 6)
    val people2 = setOf("Tom", "Sam", "Bob", "Tom")

    println(numbers2) // [5, 6, 7]
    println(people2) // [Tom, Sam, Bob]

    val peopleList = listOf("Tom", "Bob", "Sam", "Tom", "Bob", "Alex")
    val uniquePeople = peopleList.toSet()
    println(uniquePeople)  // [Tom, Bob, Sam, Alex]

    val peopleSet = setOf("Tom", "Sam", "Bob", "Mike")
    val employeesSet = setOf("Tom", "Sam", "Kate", "Alice")

    //  объединение множеств
    val all = peopleSet.union(employeesSet)
    // пересечение множеств
    val common = peopleSet.intersect(employeesSet)
    // вычитание множеств
    val different = peopleSet.subtract(employeesSet)

    println(all)        // [Tom, Sam, Bob, Mike, Kate, Alice]
    println(common)     // [Tom, Sam]
    println(different)  // [Bob, Mike]

    // Изменяемые коллекции
    val mutableNumbers: MutableSet<Int> = mutableSetOf(35, 36, 37)

    val numbers1: HashSet<Int> = hashSetOf(5, 6, 7)
    val numbers2_linked: LinkedHashSet<Int> = linkedSetOf(25, 26, 27)

    mutableNumbers.add(2)
    mutableNumbers.addAll(setOf(4, 5, 6))
    mutableNumbers.remove(36)

    for (n in mutableNumbers) {
        println(n)
    }    // 35 37 2 4 5 6
    mutableNumbers.clear()
}

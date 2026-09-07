package lessons

/**
 * Обобщенные классы и функции
 */
fun main6_1() {
    val tom6_1: Person6_1<Int> = Person6_1(367, "Tom")
    val bob6_1: Person6_1<String> = Person6_1("A65", "Bob")

    println("${tom6_1.id} - ${tom6_1.name}")
    println("${bob6_1.id} - ${bob6_1.name}")

    val tom2 = Person6_1("qwrtf2", "Tom")
    tom2.checkId("qwrtf2")   // The same
    tom2.checkId("q34tt")    // Different

    val people: Array<String> = arrayOf("Tom", "Bob", "Sam")
    val numbers: Array<Int> = arrayOf(1, 2, 3, 4)

    var word1: Word6_1<String, String> = Word6_1("one", "один")
    var word2: Word6_1<String, Int> = Word6_1("two", 2)

    println("${word1.source} - ${word1.target}")    // one - один
    println("${word2.source} - ${word2.target}")    // two - 2

    display6_1("Hello Kotlin")
    display6_1(1234)
    display6_1(true)

    val arr1 = getBiggest6_1(arrayOf(1, 2, 3, 4), arrayOf(3, 4, 5, 6, 7, 7))
    arr1.forEach { item -> print("$item ") }    // 3  4  5  6  7  7

    println()

    val arr2 = getBiggest6_1(arrayOf("Tom", "Sam", "Bob"), arrayOf("Kate", "Alice"))
    arr2.forEach { item -> print("$item ") }    // Tom  Sam  Bob
}

class Person6_1<T>(val id: T, val name: String) {
    fun checkId(_id: T) {
        if (id == _id) {
            println("The same")
        } else {
            println("Different")
        }
    }
}

class Word6_1<K, V>(val source: K, var target: V)

fun <T> display6_1(obj: T) {
    println(obj)
}

fun <T> getBiggest6_1(args1: Array<T>, args2: Array<T>): Array<T> {
    if (args1.size > args2.size) return args1
    return args2
}

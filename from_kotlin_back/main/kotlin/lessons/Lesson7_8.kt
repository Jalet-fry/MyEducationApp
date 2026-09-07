package lessons

/**
 * Проверка элементов
 */
fun main7_8() {
    val people = listOf("Tom", "Kate", "Sam", "Alice", "Bob")

    // 1. all
    println("all length == 3: ${people.all { it.length == 3 }}")     // false
    println("all length != 10: ${people.all { it.length != 10 }}")     // true

    // 2. none
    println("none length == 3: ${people.none { it.length == 3 }}")     // false
    println("none length == 2: ${people.none { it.length == 2 }}")     // true

    // 3. any
    println("any length == 3: ${people.any { it.length == 3 }}")     // true
    println("any length == 10: ${people.any { it.length == 10 }}")    // false

    // 4. any() и none() без параметров
    val empty: List<String> = listOf()
    println("people.any(): ${people.any()}")     // true
    println("empty.any(): ${empty.any()}")      // false
    println("people.none(): ${people.none()}")    // false
    println("empty.none(): ${empty.none()}")     // true

    // 5. contains
    println("people.contains('Sam'): ${people.contains("Sam")}")     // true
    println("people.contains('Bill'): ${people.contains("Bill")}")    // false

    // 6. containsAll
    println("people.containsAll(Tom, Sam): ${people.containsAll(listOf("Tom", "Sam"))}") // true
    println("people.containsAll(Tom, Bill): ${people.containsAll(listOf("Tom", "Bill"))}") // false
}

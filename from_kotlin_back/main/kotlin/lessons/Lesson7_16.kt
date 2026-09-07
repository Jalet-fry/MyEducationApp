package lessons

/**
 * Массивы
 */
fun main7_16() {
    // 1. Создание массива
    val numbers = arrayOf(1, 2, 3, 4, 5)     // объект Array<Int>
    val people = arrayOf("Tom", "Sam", "Kate", "Bob", "Alice")   // объект Array<String>
    
    // 2. arrayOfNulls
    val nullNumbers = arrayOfNulls<Int>(3)  // [null, null, null]
    println("ArrayOfNulls: ${nullNumbers.contentToString()}")

    // 3. Конструктор Array
    val fives = Array(3) { 5 } // [5, 5, 5]
    var i = 1
    val generated = Array(3) { i++ * 2 } // [2, 4, 6]
    println("Generated array: ${generated.contentToString()}")

    // 4. Обращение к элементам (get/set)
    val firstPerson = people.get(0)
    people.set(0, "Tomas")
    println("First person: $firstPerson -> ${people[0]}")
    
    // 5. Безопасное получение (getOrNull / getOrElse)
    println("Person at 10 (safe): ${people.getOrNull(10)}")
    println("Person at 10 (else): ${people.getOrElse(10) { "Undefined" }}")

    // 6. Свойства
    println("Size: ${people.size}, LastIndex: ${people.lastIndex}, Indices: ${people.indices}")

    // 7. Перебор
    println("Simple for:")
    for (number in numbers) {
        print("$number \t")
    }
    println("\nFor by index and modifying:")
    val numsToSquare = arrayOf(2, 3, 4)
    for (idx in numsToSquare.indices) {
        numsToSquare[idx] = numsToSquare[idx] * numsToSquare[idx]
        print("${numsToSquare[idx]} \t")
    }

    // 8. forEach и forEachIndexed
    println("\nForEachIndexed:")
    people.forEachIndexed { idx, name -> println("$idx. $name") }

    // 9. Двухмерные массивы
    val table = Array(3) { Array(3) { 0 } }
    table[0] = arrayOf(1, 2, 3)
    table[1] = arrayOf(4, 5, 6)
    table[2] = arrayOf(7, 8, 9)
    
    println("2D Table:")
    for (row in table) {
        for (cell in row) {
            print("$cell \t")
        }
        println()
    }
}

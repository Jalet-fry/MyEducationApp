package lessons

/**
 * Получение части элементов
 */
fun main7_14() {
    val people = listOf("Tom", "Bob", "Sam", "Kate", "Alice", "Mike")

    // 1. slice
    println("Slice 1..3: ${people.slice(1..3)}")
    println("Slice step 2: ${people.slice(0..5 step 2)}")
    println("Slice custom list: ${people.slice(listOf(1, 3, 5, 1))}")

    // 2. take и takeLast
    println("Take 3: ${people.take(3)}")
    println("TakeLast 3: ${people.takeLast(3)}")

    // 3. takeWhile и takeLastWhile
    val names = listOf("Tom", "Sam", "Kate", "Bob", "Alice", "Mike")
    println("TakeWhile (length 3): ${names.takeWhile { it.length == 3 }}")
    println("TakeLastWhile (length != 3): ${names.takeLastWhile { it.length != 3 }}")

    // 4. drop и dropLast
    println("Drop 3: ${people.drop(3)}")
    println("DropLast 2: ${people.dropLast(2)}")

    // 5. dropWhile и dropLastWhile
    println("DropWhile (length 3): ${names.dropWhile { it.length == 3 }}")
    println("DropLastWhile (length != 3): ${names.dropLastWhile { it.length != 3 }}")

    // 6. chunked
    println("Chunked 3: ${people.chunked(3)}")
    println("Chunked 3 with transform (first char): ${people.chunked(3) { it.first() }}")
}

package lessons

fun main2_2() {
    // Целочисленные типы
    val a: Byte = -10
    val b: Short = 45
    val c: Int = -250
    val d: Long = 30000L
    println("Byte: $a, Short: $b, Int: $c, Long: $d")

    // Беззнаковые типы
    val ua: UByte = 10U
    val ub: UShort = 45U
    val uc: UInt = 250U
    val ud: ULong = 30000U
    println("UByte: $ua, UShort: $ub, UInt: $uc, ULong: $ud")

    // Числа с плавающей точкой
    val height: Double = 1.78
    val pi: Float = 3.14F
    println("Double: $height, Float: $pi")

    // Логический тип
    val isTrue: Boolean = true
    println("Boolean: $isTrue")

    // Символы
    val charA: Char = 'A'
    println("Char: $charA")

    // Строки
    val name: String = "Eugene"
    val multiline: String = """
        Multiline
        String
    """.trimIndent()
    println("String: $name")
    println("Multiline:\n$multiline")

    // Выведение типа
    val age = 5 // Int
    val sum = 45L // Long
    println("Inferred types: age=$age, sum=$sum")

    // Any
    var anyValue: Any = "Tom"
    println("Any (String): $anyValue")
    anyValue = 6758
    println("Any (Int): $anyValue")
}

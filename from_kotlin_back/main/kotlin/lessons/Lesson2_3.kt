package lessons

fun main2_3() {
    // Создание массива
    val numbers: Array<Int> = arrayOf(1, 2, 3, 4, 5)
    val names = arrayOf("Tom", "Bob", "Sam")
    
    // arrayOfNulls
    val nulls = arrayOfNulls<Int>(3)
    
    // Конструктор Array
    val fives = Array(3) { 5 }
    var i = 1
    val generated = Array(3) { i++ * 2 }
    
    // Обращение к элементам
    println("numbers[1] = ${numbers[1]}")
    numbers[2] = 7
    println("Updated numbers[2] = ${numbers[2]}")
    
    // Размер массива
    println("Size of names: ${names.size}")
    
    // Перебор массива
    print("Numbers: ")
    for (number in numbers) {
        print("$number ")
    }
    println()
    
    // Проверка наличия
    println("4 in numbers: ${4 in numbers}")
    println("10 in numbers: ${10 in numbers}")
    
    // Специализированные массивы
    val intArray: IntArray = intArrayOf(1, 2, 3)
    val doubleArray: DoubleArray = doubleArrayOf(1.1, 2.2)
    println("IntArray size: ${intArray.size}")
}

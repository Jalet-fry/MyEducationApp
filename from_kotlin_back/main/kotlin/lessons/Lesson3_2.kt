package lessons

fun main3_2() {
    // Вызов функции с переменным количеством аргументов
    printStrings3_2("Tom", "Bob", "Sam")
    
    // Сумма чисел
    sum3_2(1, 2, 3, 4, 5)
    
    // Именованные аргументы после vararg
    printUserGroup3_2("KT-091", "Tom", "Bob", "Alice", count = 3)
    
    // Spread operator (*) - передача массива в vararg
    val nums = intArrayOf(1, 2, 3, 4)
    changeNumbers3_2(*nums, koef = 2)
}

fun printStrings3_2(vararg strings: String) {
    println("Strings:")
    for (str in strings) {
        println("- $str")
    }
}

fun sum3_2(vararg numbers: Int) {
    var result = 0
    for (n in numbers) result += n
    println("Sum of numbers: $result")
}

fun printUserGroup3_2(group: String, vararg users: String, count: Int) {
    println("Group: $group, Count: $count")
    for (user in users) println("User: $user")
}

fun changeNumbers3_2(vararg numbers: Int, koef: Int) {
    print("Multiplied by $koef: ")
    for (number in numbers) {
        print("${number * koef} ")
    }
    println()
}

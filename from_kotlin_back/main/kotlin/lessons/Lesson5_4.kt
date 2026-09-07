package lessons

fun main5_4() {
    val acc = AccountInfix(1000)
    
    // Инфиксная нотация (как обычный текст)
    acc put 150
    // Эквивалентно: acc.put(150)
    
    acc.printSum() // 1150
    
    // Инфиксная функция расширения
    val str = "hello world"
    val count = str countChar 'l'
    println("Char 'l' count: $count")
    
    // Еще пример для "естественного языка"
    val tom = PersonInfix("Tom")
    tom says "Hello infix!"
}

class AccountInfix(var sum: Int) {
    // infix - функция должна иметь ровно ОДИН параметр
    infix fun put(amount: Int) {
        sum += amount
    }
    
    fun printSum() = println("Current sum: $sum")
}

// Инфиксная функция расширения
infix fun String.countChar(c: Char): Int {
    return this.count { it == c }
}

class PersonInfix(val name: String) {
    infix fun says(words: String) {
        println("$name says: $words")
    }
}

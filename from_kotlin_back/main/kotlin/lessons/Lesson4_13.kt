package lessons

fun main4_13() {
    val day = DayEnum.FRIDAY
    println("Today is $day, value = ${day.value}")
    
    // Встроенные свойства
    println("Name: ${day.name}, Ordinal: ${day.ordinal}")
    
    // Методы в Enum
    val monday = DayEnum.MONDAY
    println("Days between Friday and Monday: ${day.getDuration(monday)}")
    
    // Работа со всеми значениями
    println("All days:")
    for (d in DayEnum.values()) {
        print("$d ")
    }
    println()
    
    // Состояние и логика
    println("5 + 6 = ${operate4_13(5, 6, OperationEnum.ADD)}")
    
    // Анонимные классы в Enum
    DayTimeEnum.DAY.printName()
}

enum class DayEnum(val value: Int) {
    MONDAY(1), TUESDAY(2), WEDNESDAY(3),
    THURSDAY(4), FRIDAY(5), SATURDAY(6), SUNDAY(7);

    fun getDuration(day: DayEnum): Int = this.value - day.value
}

enum class OperationEnum {
    ADD, SUBTRACT, MULTIPLY;
}

fun operate4_13(n1: Int, n2: Int, op: OperationEnum): Int {
    return when (op) {
        OperationEnum.ADD -> n1 + n2
        OperationEnum.SUBTRACT -> n1 - n2
        OperationEnum.MULTIPLY -> n1 * n2
    }
}

enum class DayTimeEnum {
    DAY {
        override fun printName() = println("It is Day")
    },
    NIGHT {
        override fun printName() = println("It is Night")
    };
    abstract fun printName()
}

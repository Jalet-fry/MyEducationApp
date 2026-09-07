package lessons

import kotlin.reflect.KProperty

fun main5_6() {
    val user = UserDelegate("Tom", 25)
    
    // При чтении вызывается getValue делегата
    println("User name: ${user.name}")
    
    // При записи вызывается setValue делегата
    user.age = 30
    println("User age: ${user.age}")
    
    user.age = -5 // Валидация в делегате не пропустит
    println("User age after invalid set: ${user.age}")
}

class UserDelegate(val initialName: String, initialAge: Int) {
    // Делегированное свойство только для чтения
    val name: String by ReadOnlyDelegate(initialName)
    
    // Делегированное свойство для чтения и записи
    var age: Int by ReadWriteDelegate(initialAge)
}

// Делегат для val
class ReadOnlyDelegate(private val value: String) {
    operator fun getValue(thisRef: Any?, property: KProperty<*>): String {
        println("Log: Reading property '${property.name}'")
        return value
    }
}

// Делегат для var
class ReadWriteDelegate(private var value: Int) {
    operator fun getValue(thisRef: Any?, property: KProperty<*>): Int {
        println("Log: Reading property '${property.name}'")
        return value
    }

    operator fun setValue(thisRef: Any?, property: KProperty<*>, newValue: Int) {
        println("Log: Setting property '${property.name}' to $newValue")
        if (newValue > 0) {
            value = newValue
        } else {
            println("Log: Invalid value ignored")
        }
    }
}

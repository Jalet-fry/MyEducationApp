package lessons

fun main5_7() {
    val person = PersonScope("Tom", "tom@gmail.com")

    // 1. let - часто для проверки на null. Доступ через 'it'. Возвращает результат лямбды.
    val resultLet = person.email?.let {
        println("Sending email to $it")
        "Email sent"
    }
    println("Let result: $resultLet")

    // 2. with - для группы операций над одним объектом. Доступ через 'this'. Возвращает результат лямбды.
    val description = with(person) {
        println("Processing person: $name")
        "Person with name $name and email $email"
    }
    println("With result: $description")

    // 3. run - комбинация let и with. Доступ через 'this'. Возвращает результат лямбды.
    val runResult = person.run {
        name.uppercase()
    }
    println("Run result: $runResult")

    // 4. apply - для настройки объекта. Доступ через 'this'. Возвращает САМ ОБЪЕКТ.
    val configuredPerson = person.apply {
        // Настраиваем объект
    }
    println("Apply returned: ${configuredPerson.name}")

    // 5. also - для доп. действий (логгирование). Доступ через 'it'. Возвращает САМ ОБЪЕКТ.
    person.also {
        println("Log: working with person ${it.name}")
    }
}

data class PersonScope(val name: String, var email: String?)

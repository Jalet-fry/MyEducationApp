package lessons

/**
 * Группировка
 */
fun main7_10() {
    val employees = listOf(
        Employee7_10("Tom", "Microsoft"),
        Employee7_10("Bob", "JetBrains"),
        Employee7_10("Sam", "Google"),
        Employee7_10("Alice", "Microsoft"),
        Employee7_10("Kate", "Google")
    )

    // 1. groupBy по компании
    val companies = employees.groupBy { it.company }    // объект Map<String, List<Employee7_10>>

    println("Grouping by company:")
    println(companies) // {Microsoft=[Tom, Alice], JetBrains=[Bob], Google=[Sam, Kate]}

    // перебор групп
    for (company in companies) {
        println(company.key) // название компании
        // перебор списка сотрудников
        for (employee in company.value) {
            println(employee.name)
        }
        println() // для отделения групп
    }

    // 2. groupBy с трансформацией (только имена)
    val companyNames = employees.groupBy({ it.company }) { it.name }  // объект Map<String, List<String>>

    println("Grouping by company (names only):")
    println(companyNames)
    for (company in companyNames) {
        println("${company.key}: ${company.value}")
    }
}

class Employee7_10(val name: String, val company: String) {
    override fun toString(): String = name
}

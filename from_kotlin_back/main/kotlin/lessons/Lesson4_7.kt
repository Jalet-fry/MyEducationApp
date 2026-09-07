package lessons

fun main4_7() {
    // Работа с вложенным классом (Nested)
    // Обращаемся через имя внешнего класса: Внешний.Вложенный()
    val nestedAccount = OuterPerson.Account("ivan_root", "pass123")
    nestedAccount.showDetails()

    // Работа с внутренним классом (Inner)
    // Нужен ЭКЗЕМПЛЯР внешнего класса: экземпляр.Внутренний()
    val bankAcc = BankAccount(5000)
    val transaction = bankAcc.Transaction(2000)
    transaction.execute()
    
    // После транзакции баланс изменился (т.к. inner класс имеет доступ к полям внешнего)
    bankAcc.displayBalance()
}

// 1. Вложенный класс (Nested) - не имеет доступа к членам внешнего класса
class OuterPerson {
    class Account(val username: String, val password: String) {
        fun showDetails() {
            println("Nested Account: $username")
        }
    }
}

// 2. Внутренний класс (Inner) - имеет доступ к членам внешнего класса (даже private)
class BankAccount(private var balance: Int) {
    
    fun displayBalance() {
        println("Current balance: $balance")
    }

    inner class Transaction(private val amount: Int) {
        fun execute() {
            println("Executing transaction: -$amount")
            // Прямой доступ к свойству внешнего класса
            balance -= amount 
        }
        
        fun showStatus() {
            // Если есть конфликт имен, используем this@ИмяВнешнегоКласса
            println("Outer balance: ${this@BankAccount.balance}")
            println("Inner amount: ${this.amount}")
        }
    }
}

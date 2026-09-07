package lessons

/**
 * Вариантность, ковариантность и контравариантность
 */
fun main6_3() {
    // Ковариантность
    val emailMessenger6_3: MessengerCovariant6_3<EmailMessage6_3> = EmailMessenger6_3()
    val messenger6_3: MessengerCovariant6_3<Message6_3> = emailMessenger6_3
    val message6_3 = messenger6_3.writeMessage("Hello Kotlin")
    println(message6_3.text)    // Email: Hello Kotlin

    // Контравариантность
    val instantMessenger6_3: MessengerContravariant6_3<Message6_3> = InstantMessenger6_3()
    val messengerContravariant6_3: MessengerContravariant6_3<EmailMessage6_3> = instantMessenger6_3
    val emailMsg6_3 = EmailMessage6_3("Hi Kotlin")
    messengerContravariant6_3.sendMessage(emailMsg6_3)
}

open class Message6_3(val text: String)
class EmailMessage6_3(text: String) : Message6_3(text)

// Инвариантность (по умолчанию)
interface MessengerInvariant6_3<T : Message6_3>

// Ковариантность
interface MessengerCovariant6_3<out T : Message6_3> {
    fun writeMessage(text: String): T
}

class EmailMessenger6_3 : MessengerCovariant6_3<EmailMessage6_3> {
    override fun writeMessage(text: String): EmailMessage6_3 {
        return EmailMessage6_3("Email: $text")
    }
}

// Контравариантность
interface MessengerContravariant6_3<in T : Message6_3> {
    fun sendMessage(message: T)
}

class InstantMessenger6_3 : MessengerContravariant6_3<Message6_3> {
    override fun sendMessage(message: Message6_3) {
        println("Send message: ${message.text}")
    }
}

fun changeMessengerToEmail6_3(obj: MessengerCovariant6_3<EmailMessage6_3>) {
    val messenger: MessengerCovariant6_3<Message6_3> = obj
}

fun changeMessengerToDefault6_3(obj: MessengerContravariant6_3<Message6_3>) {
    val messenger: MessengerContravariant6_3<EmailMessage6_3> = obj
}

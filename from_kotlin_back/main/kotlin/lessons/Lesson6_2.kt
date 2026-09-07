package lessons

/**
 * Ограничения обобщений
 */
fun main6_2() {
    val result1 = getBiggest6_2(1, 2)
    println(result1)
    val result2 = getBiggest6_2("Tom", "Sam")
    println(result2)

    val email1 = EmailMessage6_2("Hello METANIT.COM")
    send6_2(email1)
    val sms1 = SmsMessage6_2("Привет, ты спишь?")
    send6_2(sms1)

    val res1 = getBiggestNumber6_2(1, 2)
    println(res1)    // 2

    val res2 = getBiggestNumber6_2(1.6, -2.8)
    println(res2)    // 1.6

    val email2 = EmailMessage6_2_Full("Hello METANIT.COM")
    sendMultipleConstraints6_2(email2)
    val sms2 = SmsMessage6_2_Full("Привет, ты спишь?")
    sendMultipleConstraints6_2(sms2)

    val email3 = EmailMessage6_2_Full("Hello METANIT.COM")
    val outlook = Messenger6_2<EmailMessage6_2_Full>()
    outlook.send(email3)

    val skype = Messenger6_2<SmsMessage6_2_Full>()
    val sms3 = SmsMessage6_2_Full("Привет, ты спишь?")
    skype.send(sms3)
}

fun <T : Comparable<T>> getBiggest6_2(a: T, b: T): T {
    return if (a > b) a
    else b
}

interface Message6_2 {
    val text: String
}

class EmailMessage6_2(override val text: String) : Message6_2
class SmsMessage6_2(override val text: String) : Message6_2

fun <T : Message6_2> send6_2(message: T) {
    println(message.text)
}

fun <T> getBiggestNumber6_2(a: T, b: T): T where T : Comparable<T>, T : Number {
    return if (a > b) a
    else b
}

interface Logger6_2 {
    fun log()
}

fun <T> sendMultipleConstraints6_2(message: T) where T : Message6_2, T : Logger6_2 {
    message.log()
}

class EmailMessage6_2_Full(override val text: String) : Message6_2, Logger6_2 {
    override fun log() = println("Email: $text")
}

class SmsMessage6_2_Full(override val text: String) : Message6_2, Logger6_2 {
    override fun log() = println("SMS: $text")
}

class Messenger6_2<T> where T : Message6_2, T : Logger6_2 {
    fun send(mes: T) {
        mes.log()
    }
}

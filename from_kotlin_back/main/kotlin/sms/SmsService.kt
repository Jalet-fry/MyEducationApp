package sms

class Message(val text: String)

fun send(message: Message, phoneNumber: String) {
    println("SMS Message `${message.text}` has been sent to $phoneNumber")
}

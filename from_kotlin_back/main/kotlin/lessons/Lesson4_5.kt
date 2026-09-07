package lessons

// Импорт с псевдонимами для разрешения конфликтов имен
import email.Message as EmailMessage
import email.send as sendEmail
import sms.Message as SmsMessage
import sms.send as sendSms

fun main4_5() {
    // Используем типы из пакета email
    val myEmail = EmailMessage("Hello via Email")
    sendEmail(myEmail, "admin@example.com")
    
    // Используем типы из пакета sms
    val mySms = SmsMessage("Hello via SMS")
    sendSms(mySms, "+123456789")
}

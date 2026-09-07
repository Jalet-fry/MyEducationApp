package lessons

fun main4_4() {
    val telegram = InstantMessenger("Telegram")
    val photoCamera = PhotoCamera()
    
    // Смартфон делегирует отправку сообщений и съемку фото
    val pixel = SmartPhone("Pixel 5", telegram, photoCamera)
    
    pixel.send("Hello Kotlin!") // Делегируется мессенджеру
    pixel.takePhoto()           // Делегируется камере
    
    // Делегирование свойств
    println("Program using: ${pixel.programName}")
}

// 1. Интерфейс для мессенджера
interface Messenger {
    val programName: String
    fun send(message: String)
}

// 2. Реализация мессенджера
class InstantMessenger(override val programName: String) : Messenger {
    override fun send(message: String) {
        println("[$programName] Sending: $message")
    }
}

// 3. Интерфейс для камеры
interface PhotoDevice {
    fun takePhoto()
}

// 4. Реализация камеры
class PhotoCamera : PhotoDevice {
    override fun takePhoto() = println("Click! Photo taken.")
}

// 5. Делегирование: класс SmartPhone использует готовые реализации
// Мы говорим: "Реализуй Messenger с помощью объекта m, а PhotoDevice с помощью p"
class SmartPhone(
    val model: String, 
    m: Messenger, 
    p: PhotoDevice
) : Messenger by m, PhotoDevice by p
// Здесь SmartPhone получает все методы и свойства Messenger и PhotoDevice автоматически

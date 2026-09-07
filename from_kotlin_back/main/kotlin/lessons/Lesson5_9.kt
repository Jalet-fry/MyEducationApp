package lessons

fun main5_9() {
    // Использование DSL-подобной функции конфигурации
    val person = PersonDSL().configure {
        name = "Tom"
        age = 41
        company = "JetBrains"
    }
    person.display()
    
    // Пример построения иерархической структуры (мини-HTML)
    val myHtml = html5_9 {
        head {
            title = "Kotlin DSL Page"
        }
        body {
            content = "Hello from DSL with receiver!"
        }
    }
    println("\nGenerated HTML:\n$myHtml")
}

// 1. Класс и функция расширения с получателем
class PersonDSL {
    var name: String = ""
    var age: Int = 0
    var company: String = ""
    fun display() = println("Name: $name, Age: $age, Co: $company")
}

// block: PersonDSL.() -> Unit означает, что внутри лямбды this - это PersonDSL
fun PersonDSL.configure(block: PersonDSL.() -> Unit): PersonDSL {
    this.block() // Выполняем лямбду в контексте этого объекта
    return this
}

// 2. Пример простого DSL для HTML
class HtmlBuilder {
    private var headContent = ""
    private var bodyContent = ""

    fun head(block: HeadBuilder.() -> Unit) {
        val hb = HeadBuilder()
        hb.block()
        headContent = hb.title
    }

    fun body(block: BodyBuilder.() -> Unit) {
        val bb = BodyBuilder()
        bb.block()
        bodyContent = bb.content
    }

    override fun toString() = "<html><head><title>$headContent</title></head><body>$bodyContent</body></html>"
}

class HeadBuilder { var title = "" }
class BodyBuilder { var content = "" }

fun html5_9(block: HtmlBuilder.() -> Unit): String {
    val builder = HtmlBuilder()
    builder.block()
    return builder.toString()
}

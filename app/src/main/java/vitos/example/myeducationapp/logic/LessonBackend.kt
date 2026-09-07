package vitos.example.myeducationapp.logic

import androidx.compose.runtime.Composable
import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter

/**
 * Интерфейс бэкенда. Содержит данные и логику урока.
 */
interface LessonBackend {
    var lessonId: String
    val courseId: String
    val title: String
    val description: String get() = ""
    
    val sections: List<LessonSection> get() = emptyList()
    val parameters: List<Parameter> get() = emptyList()

    /**
     * Если true, результат выполнения будет обновляться мгновенно при изменении параметров.
     */
    val isAutoExecute: Boolean get() = true

    /**
     * Выполняет логику урока.
     * @param onUpdate позволяет выводить данные в реальном времени (для имитации логов/задержек)
     */
    suspend fun execute(
        params: Map<String, Any>,
        sectionIndex: Int = -1,
        tag: String? = null,
        onUpdate: (String) -> Unit = {}
    ): String

    /**
     * Автоматически находит код в секциях по тегу, подставляет параметры и возвращает его.
     * Это позволяет не дублировать код в методе execute.
     */
    fun getCodeWithParams(tag: String, params: Map<String, Any>): String {
        val section = sections.find { it.tag == tag } ?: return "Ошибка: Секция с тегом $tag не найдена"
        var code = section.content
        params.forEach { (key, value) ->
            // Учитываем кавычки для строк в выводе
            val displayValue = if (value is String) "\"$value\"" else value.toString()
            code = code.replace("{{$key}}", displayValue)
        }
        return code
    }

    @Composable
    fun CustomUI(params: MutableMap<String, Any>) {}
}

// Хелперы для получения параметров
fun Map<String, Any>.getInt(key: String, default: Int = 0): Int = (this[key] as? Number)?.toInt() ?: default
fun Map<String, Any>.getString(key: String, default: String = ""): String = this[key] as? String ?: default
fun Map<String, Any>.getBool(key: String, default: Boolean = false): Boolean = this[key] as? Boolean ?: default

/**
 * Реестр бэкендов.
 */
object LessonRegistry {
    private val backends = mutableMapOf<String, LessonBackend>()

    fun register(backend: LessonBackend) {
        backends[backend.lessonId] = backend
    }

    fun clear() {
        backends.clear()
    }

    fun getBackend(lessonId: String): LessonBackend? = backends[lessonId]
    fun getAllBackends(): List<LessonBackend> = backends.values.toList()

    inline fun runSafe(
        crossinline onUpdate: (String) -> Unit = {},
        crossinline block: suspend (println: (Any?) -> Unit, print: (Any?) -> Unit) -> Unit
    ): String {
        val output = StringBuilder()
        
        val updateFunc: (Any?, Boolean) -> Unit = { msg, newline ->
            val text = msg.toString() + if (newline) "\n" else ""
            output.append(text)
            onUpdate(output.toString().trim())
        }

        val println: (Any?) -> Unit = { msg -> updateFunc(msg, true) }
        val print: (Any?) -> Unit = { msg -> updateFunc(msg, false) }

        // Используем runBlocking для совместимости в синхронном контексте, 
        // но так как execute уже suspend, это сработает гладко.
        try {
            kotlinx.coroutines.runBlocking {
                block(println, print)
            }
        } catch (e: Exception) {
            output.append("\n[Ошибка: ${e.localizedMessage}]\n")
            onUpdate(output.toString().trim())
        }
        
        val result = output.toString().trim()
        if (result.isEmpty()) {
            return "Код выполнен успешно (без вывода в консоль)."
        }
        return result
    }
}

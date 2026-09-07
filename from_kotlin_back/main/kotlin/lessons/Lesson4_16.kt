package lessons

/**
 * Sealed classes (Запечатанные классы)
 */
fun main4_16() {
    val success = Result.Success("Data loaded")
    val error = Result.Error("404 Not Found")
    val loading = Result.Loading

    println("Processing results:")
    handleResult(success)
    handleResult(error)
    handleResult(loading)
}

// Sealed class ограничивает иерархию наследования
sealed class Result {
    data class Success(val message: String) : Result()
    data class Error(val error: String) : Result()
    object Loading : Result()
}

// Преимущество: when не требует блока else, так как все варианты известны
fun handleResult(result: Result) {
    when (result) {
        is Result.Success -> println("Success: ${result.message}")
        is Result.Error -> println("Error occurred: ${result.error}")
        Result.Loading -> println("Loading...")
    }
}

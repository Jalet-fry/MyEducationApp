package vitos.example.myeducationapp

import androidx.compose.ui.graphics.Color
import androidx.compose.ui.text.AnnotatedString
import androidx.compose.ui.text.SpanStyle
import androidx.compose.ui.text.buildAnnotatedString
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.text.withStyle

object SyntaxHighlighter {
    private val KEYWORDS = setOf(
        "fun", "val", "var", "class", "object", "interface", "for", "while", "if", "else", 
        "when", "return", "in", "is", "import", "package", "override", "suspend", "data", 
        "as", "break", "continue", "do", "false", "true", "null", "super", "this", "throw", "try", "catch", "finally",
        "typealias", "typeof", "when", "while", "it"
    )

    fun highlight(code: String): AnnotatedString {
        return buildAnnotatedString {
            // Добавлена поддержка {{param}} в регулярное выражение
            val regex = """(\{\{\w+\}\}|\b\w+\b|"[^"]*"|//.*|[ \n\t\r]|[^a-zA-Z0-9\s])""".toRegex()
            val matches = regex.findAll(code)

            for (match in matches) {
                val token = match.value
                when {
                    token.startsWith("{{") && token.endsWith("}}") -> {
                        withStyle(style = SpanStyle(color = Color(0xFF61AFEF), fontWeight = FontWeight.Bold)) {
                            append(token)
                        }
                    }
                    token in KEYWORDS -> {
                        withStyle(style = SpanStyle(color = Color(0xFFC678DD), fontWeight = FontWeight.Bold)) {
                            append(token)
                        }
                    }
                    token.startsWith("//") -> {
                        withStyle(style = SpanStyle(color = Color(0xFF5C6370))) {
                            append(token)
                        }
                    }
                    token.startsWith("\"") && token.endsWith("\"") -> {
                        withStyle(style = SpanStyle(color = Color(0xFF98C379))) {
                            append(token)
                        }
                    }
                    token.toIntOrNull() != null || token.toDoubleOrNull() != null -> {
                        withStyle(style = SpanStyle(color = Color(0xFFD19A66))) {
                            append(token)
                        }
                    }
                    else -> append(token)
                }
            }
        }
    }
}

package vitos.example.myeducationapp.ui.components

import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material3.Button
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.remember
import androidx.compose.runtime.rememberCoroutineScope
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.text.font.FontFamily
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.launch
import vitos.example.myeducationapp.SyntaxHighlighter
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.logic.LessonRegistry
import vitos.example.myeducationapp.ui.theme.MyEducationAppTheme

@Composable
fun CodeSection(
    lessonId: String,
    code: String,
    paramValues: Map<String, Any>,
    onResult: (String) -> Unit,
    result: String,
    parameters: List<Parameter> = emptyList(),
    scope: CoroutineScope,
    sectionIndex: Int = -1,
    tag: String? = null
) {
    // Динамически подставляем значения параметров в код для отображения
    val displayedCode = remember(code, paramValues.toMap()) {
        var processed = code
        paramValues.forEach { (key, value) ->
            val param = parameters.find { it.id == key }
            val displayValue = if (param?.type == ParameterType.STRING) {
                "\"$value\""
            } else {
                value.toString()
            }
            processed = processed.replace("{{$key}}", displayValue)
        }
        processed
    }

    val annotatedCode = remember(displayedCode) {
        SyntaxHighlighter.highlight(displayedCode)
    }

    Column(modifier = Modifier.padding(vertical = 8.dp)) {
        Box(
            modifier = Modifier
                .fillMaxWidth()
                .background(
                    color = MaterialTheme.colorScheme.surfaceVariant,
                    shape = RoundedCornerShape(8.dp)
                )
                .padding(12.dp)
        ) {
            Text(
                text = annotatedCode,
                fontFamily = FontFamily.Monospace,
                fontSize = 14.sp,
                color = MaterialTheme.colorScheme.onSurfaceVariant
            )
        }

        Button(
            onClick = {
                scope.launch {
                    val backend = LessonRegistry.getBackend(lessonId)
                    if (backend != null) {
                        onResult(backend.execute(paramValues, sectionIndex, tag, onUpdate = { res -> onResult(res) }))
                    } else {
                        onResult("Ошибка: Бэкенд для этого урока не найден.")
                    }
                }
            },
            modifier = Modifier.align(Alignment.End).padding(top = 4.dp)
        ) {
            Text("Запустить")
        }

        if (result.isNotEmpty()) {
            Box(
                modifier = Modifier
                    .fillMaxWidth()
                    .padding(top = 4.dp)
                    .background(
                        color = MaterialTheme.colorScheme.secondaryContainer,
                        shape = RoundedCornerShape(8.dp)
                    )
                    .padding(12.dp)
            ) {
                Text(
                    text = result,
                    fontFamily = FontFamily.Monospace,
                    fontSize = 12.sp,
                    color = MaterialTheme.colorScheme.onSecondaryContainer
                )
            }
        }
    }
}

@Preview(showBackground = true)
@Composable
fun CodeSectionPreview() {
    MyEducationAppTheme {
        CodeSection(
            lessonId = "test",
            code = "fun main() {\n    val x = {{val}}\n    println(x)\n}",
            paramValues = mapOf("val" to 20),
            onResult = {},
            result = "20",
            parameters = listOf(Parameter("val", "Значение", ParameterType.INT, "0")),
            scope = rememberCoroutineScope()
        )
    }
}

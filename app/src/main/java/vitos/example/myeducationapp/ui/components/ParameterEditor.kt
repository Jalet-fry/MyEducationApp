package vitos.example.myeducationapp.ui.components

import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.widthIn
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.OutlinedTextField
import androidx.compose.material3.Slider
import androidx.compose.material3.Switch
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.ui.theme.MyEducationAppTheme
import java.util.Locale

@Composable
fun ParameterEditor(
    parameter: Parameter,
    value: Any,
    onValueChange: (Any) -> Unit
) {
    Column(modifier = Modifier.padding(vertical = 8.dp)) {
        Text(text = parameter.title, style = MaterialTheme.typography.labelLarge)
        when (parameter.type) {
            ParameterType.STRING -> {
                OutlinedTextField(
                    value = value.toString(),
                    onValueChange = { onValueChange(it) },
                    modifier = Modifier.fillMaxWidth(),
                    singleLine = true
                )
            }
            ParameterType.INT -> {
                Column(modifier = Modifier.widthIn(max = 400.dp)) { // Ограничиваем ширину
                    Row(verticalAlignment = Alignment.CenterVertically) {
                        Slider(
                            value = (value as? Number)?.toFloat() ?: 0f,
                            onValueChange = { onValueChange(it.toInt()) },
                            valueRange = (parameter.minValue ?: 0f)..(parameter.maxValue ?: 100f),
                            modifier = Modifier.weight(1f)
                        )
                        Text(text = value.toString(), modifier = Modifier.padding(start = 8.dp))
                    }
                    val isError = value.toString().toIntOrNull() == null && value.toString().isNotEmpty()
                    OutlinedTextField(
                        value = value.toString(),
                        onValueChange = { 
                            if (it.isEmpty()) onValueChange(0)
                            else it.toIntOrNull()?.let { num -> onValueChange(num) }
                        },
                        label = { Text("Точное значение") },
                        isError = isError,
                        supportingText = {
                            if (isError) {
                                Text("Введите целое число")
                            }
                        },
                        modifier = Modifier.fillMaxWidth(),
                        singleLine = true
                    )
                }
            }
            ParameterType.DOUBLE -> {
                Column(modifier = Modifier.widthIn(max = 400.dp)) { // Ограничиваем ширину
                    Row(verticalAlignment = Alignment.CenterVertically) {
                        Slider(
                            value = (value as? Number)?.toFloat() ?: 0f,
                            onValueChange = { onValueChange(it.toDouble()) },
                            valueRange = (parameter.minValue ?: 0f)..(parameter.maxValue ?: 1000f),
                            modifier = Modifier.weight(1f)
                        )
                        Text(text = String.format(Locale.US, "%.2f", (value as? Number)?.toDouble() ?: 0.0), modifier = Modifier.padding(start = 8.dp))
                    }
                    val isError = value.toString().toDoubleOrNull() == null && value.toString().isNotEmpty()
                    OutlinedTextField(
                        value = value.toString(),
                        onValueChange = { 
                            if (it.isEmpty()) onValueChange(0.0)
                            else it.toDoubleOrNull()?.let { num -> onValueChange(num) }
                        },
                        label = { Text("Точное значение") },
                        isError = isError,
                        supportingText = {
                            if (isError) {
                                Text("Введите число")
                            }
                        },
                        modifier = Modifier.fillMaxWidth(),
                        singleLine = true
                    )
                }
            }
            ParameterType.BOOLEAN -> {
                Switch(
                    checked = value as? Boolean ?: false,
                    onCheckedChange = { onValueChange(it) }
                )
            }
            ParameterType.ARRAY_INT -> {
                val textValue = if (value is List<*>) value.joinToString(", ") else value.toString()
                OutlinedTextField(
                    value = textValue,
                    onValueChange = { input ->
                        val list = input.split(",").mapNotNull { it.trim().toIntOrNull() }
                        onValueChange(list)
                    },
                    label = { Text("Числа через запятую") },
                    modifier = Modifier.fillMaxWidth()
                )
            }
            ParameterType.ARRAY_STRING -> {
                val textValue = if (value is List<*>) value.joinToString(", ") else value.toString()
                OutlinedTextField(
                    value = textValue,
                    onValueChange = { input ->
                        val list = if (input.isBlank()) emptyList()
                        else input.split(",").map { it.trim() }.filter { it.isNotEmpty() }
                        onValueChange(list)
                    },
                    label = { Text("Строки через запятую") },
                    modifier = Modifier.fillMaxWidth()
                )
            }
        }
    }
}

@Preview(showBackground = true)
@Composable
fun IntParameterPreview() {
    MyEducationAppTheme {
        ParameterEditor(
            parameter = Parameter("count", "Количество", ParameterType.INT, "10"),
            value = 42,
            onValueChange = {}
        )
    }
}

@Preview(showBackground = true)
@Composable
fun BoolParameterPreview() {
    MyEducationAppTheme {
        ParameterEditor(
            parameter = Parameter("enabled", "Включить", ParameterType.BOOLEAN, "true"),
            value = true,
            onValueChange = {}
        )
    }
}

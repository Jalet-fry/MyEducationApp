package vitos.example.myeducationapp.ui.components

import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
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
                Column {
                    Row(verticalAlignment = Alignment.CenterVertically) {
                        Slider(
                            value = (value as? Number)?.toFloat() ?: 0f,
                            onValueChange = { onValueChange(it.toInt()) },
                            valueRange = 0f..100f,
                            modifier = Modifier.weight(1f)
                        )
                        Text(text = value.toString(), modifier = Modifier.padding(start = 8.dp))
                    }
                    OutlinedTextField(
                        value = value.toString(),
                        onValueChange = { 
                            val num = it.toIntOrNull()
                            if (num != null) onValueChange(num)
                            else if (it.isEmpty()) onValueChange(0)
                        },
                        label = { Text("Точное значение") },
                        modifier = Modifier.fillMaxWidth(),
                        singleLine = true
                    )
                }
            }
            ParameterType.DOUBLE -> {
                Column {
                    Row(verticalAlignment = Alignment.CenterVertically) {
                        Slider(
                            value = (value as? Number)?.toFloat() ?: 0f,
                            onValueChange = { onValueChange(it.toDouble()) },
                            valueRange = 0f..1000f,
                            modifier = Modifier.weight(1f)
                        )
                        Text(text = String.format(Locale.US, "%.2f", (value as? Number)?.toDouble() ?: 0.0), modifier = Modifier.padding(start = 8.dp))
                    }
                    OutlinedTextField(
                        value = value.toString(),
                        onValueChange = { 
                            val num = it.toDoubleOrNull()
                            if (num != null) onValueChange(num)
                            else if (it.isEmpty()) onValueChange(0.0)
                        },
                        label = { Text("Точное значение") },
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
                        val list = input.split(",").map { it.trim() }
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

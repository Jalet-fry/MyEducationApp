package vitos.example.myeducationapp.ui.screens

import androidx.compose.foundation.layout.*
import androidx.compose.foundation.rememberScrollState
import androidx.compose.foundation.verticalScroll
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.automirrored.filled.ArrowBack
import androidx.compose.material3.*
import androidx.compose.runtime.*
import androidx.compose.ui.Modifier
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.dp
import coil.compose.AsyncImage
import kotlinx.coroutines.launch
import vitos.example.myeducationapp.data.Lesson
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.LessonRegistry
import vitos.example.myeducationapp.ui.components.CodeSection
import vitos.example.myeducationapp.ui.components.ParameterEditor

@OptIn(ExperimentalMaterial3Api::class)
@Composable
fun LessonDetailScreen(
    lesson: Lesson,
    onBack: () -> Unit
) {
    val scope = rememberCoroutineScope()
    val backend = remember(lesson.id) { LessonRegistry.getBackend(lesson.id) }
    
    // Используем параметры напрямую из бэкенда, если он есть
    val displayParameters = remember(lesson.id) {
        backend?.parameters ?: lesson.parameters
    }

    // Инициализируем значения параметров. 
    // Мы используем mutableStateMapOf, но обновляем его, если меняется lesson.id
    val paramValues = remember(lesson.id) {
        mutableStateMapOf<String, Any>().apply {
            displayParameters.forEach {
                when (it.type) {
                    ParameterType.INT -> put(it.id, it.defaultValue.toIntOrNull() ?: 0)
                    ParameterType.DOUBLE -> put(it.id, it.defaultValue.toDoubleOrNull() ?: 0.0)
                    ParameterType.BOOLEAN -> put(it.id, it.defaultValue.toBoolean())
                    ParameterType.STRING -> put(it.id, it.defaultValue)
                    ParameterType.ARRAY_INT -> {
                        val list = it.defaultValue.split(",").mapNotNull { s -> s.trim().toIntOrNull() }
                        put(it.id, list)
                    }
                    ParameterType.ARRAY_STRING -> {
                        val list = it.defaultValue.split(",").map { s -> s.trim() }
                        put(it.id, list)
                    }
                }
            }
        }
    }

    // Секции берем из бэкенда (приоритет) или из объекта урока
    val sections = remember(lesson.id) {
        backend?.sections ?: lesson.sections
    }

    val results = remember { mutableStateMapOf<Int, String>() }

    Scaffold(
        topBar = {
            TopAppBar(
                title = { Text(lesson.title) },
                navigationIcon = {
                    IconButton(onClick = onBack) {
                        Icon(Icons.AutoMirrored.Filled.ArrowBack, contentDescription = "Назад")
                    }
                }
            )
        }
    ) { padding ->
        Column(
            modifier = Modifier
                .padding(padding)
                .fillMaxSize()
                .verticalScroll(rememberScrollState())
                .padding(16.dp)
        ) {
            if (displayParameters.isNotEmpty()) {
                Text(text = "Настройка параметров", style = MaterialTheme.typography.titleLarge)
                displayParameters.forEach { parameter ->
                    ParameterEditor(
                        parameter = parameter,
                        value = paramValues[parameter.id] ?: "",
                        onValueChange = { newValue ->
                            paramValues[parameter.id] = newValue
                            // Авто-выполнение, если бэкенд это поддерживает
                            if (backend?.isAutoExecute == true) {
                                sections.forEachIndexed { index, section ->
                                    if (section.type == SectionType.CODE) {
                                        scope.launch {
                                            backend.execute(paramValues, index, section.tag, onUpdate = { res ->
                                                results[index] = res
                                            })
                                        }
                                    }
                                }
                            }
                        }
                    )
                }
                Spacer(modifier = Modifier.height(16.dp))
                HorizontalDivider()
                Spacer(modifier = Modifier.height(16.dp))
            }

            sections.forEachIndexed { index, section ->
                when (section.type) {
                    SectionType.HEADER -> {
                        Text(
                            text = section.content,
                            style = MaterialTheme.typography.headlineSmall,
                            fontWeight = FontWeight.Bold,
                            modifier = Modifier.padding(top = 16.dp, bottom = 8.dp)
                        )
                    }
                    SectionType.SUBHEADER -> {
                        Text(
                            text = section.content,
                            style = MaterialTheme.typography.titleMedium,
                            fontWeight = FontWeight.SemiBold,
                            modifier = Modifier.padding(top = 12.dp, bottom = 4.dp)
                        )
                    }
                    SectionType.TEXT -> {
                        Text(
                            text = section.content,
                            style = MaterialTheme.typography.bodyLarge,
                            modifier = Modifier.padding(vertical = 4.dp)
                        )
                    }
                    SectionType.CODE -> {
                        CodeSection(
                            lessonId = lesson.id,
                            code = section.content,
                            paramValues = paramValues,
                            onResult = { res -> results[index] = res },
                            result = results[index] ?: "",
                            parameters = displayParameters,
                            scope = scope,
                            sectionIndex = index,
                            tag = section.tag
                        )
                    }
                    SectionType.IMAGE -> {
                        coil.compose.AsyncImage(
                            model = section.content,
                            contentDescription = section.title ?: "Изображение к уроку",
                            modifier = Modifier
                                .fillMaxWidth()
                                .padding(vertical = 8.dp),
                            contentScale = androidx.compose.ui.layout.ContentScale.Inside
                        )
                    }
                }
            }

            // Рендерим кастомный UI из бэкенда, если он есть
            backend?.CustomUI(paramValues)

            Spacer(modifier = Modifier.height(32.dp))
        }
    }
}

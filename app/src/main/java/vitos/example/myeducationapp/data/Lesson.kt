package vitos.example.myeducationapp.data

import kotlinx.serialization.Serializable

@Serializable
data class Lesson(
    val id: String,
    val course: String,
    val title: String,
    val description: String = "",
    val sections: List<LessonSection>,
    val parameters: List<Parameter>
)

@Serializable
data class LessonSection(
    val type: SectionType,
    val content: String,
    val title: String? = null,
    val tag: String? = null // Уникальный идентификатор для логики (например, для запуска кода)
)

enum class SectionType {
    TEXT, CODE, IMAGE, HEADER, SUBHEADER
}

@Serializable
data class Parameter(
    val id: String,
    val title: String,
    val type: ParameterType,
    val defaultValue: String,
    val minValue: Float? = null,
    val maxValue: Float? = null
)

enum class ParameterType {
    INT, STRING, BOOLEAN, DOUBLE, ARRAY_INT, ARRAY_STRING
}

package vitos.example.myeducationapp.data

import android.content.Context
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import vitos.example.myeducationapp.logic.LessonRegistry

class LessonsRepository(private val context: Context) {

    /**
     * Загружает все уроки курса. Теперь только из бэкендов.
     */
    suspend fun getLessonsByCourse(courseId: String): List<Lesson> = withContext(Dispatchers.IO) {
        val lessons = LessonRegistry.getAllBackends()
            .filter { it.courseId == courseId }
            .map { backend ->
                Lesson(
                    id = backend.lessonId,
                    course = backend.courseId,
                    title = backend.title,
                    description = backend.description,
                    sections = emptyList(), // Не грузим секции для списка
                    parameters = backend.parameters
                )
            }

        lessons.sortedWith(compareBy<Lesson> { it.id.split(".").getOrNull(0)?.toIntOrNull() ?: 0 }
            .thenBy { it.id.split(".").getOrNull(1)?.toIntOrNull() ?: 0 })
    }

    /**
     * Загружает полный контент урока.
     */
    suspend fun getLessonById(courseId: String, lessonId: String): Lesson? = withContext(Dispatchers.IO) {
        val backend = LessonRegistry.getBackend(lessonId)
        if (backend != null && backend.courseId == courseId) {
            Lesson(
                id = backend.lessonId,
                course = backend.courseId,
                title = backend.title,
                description = backend.description,
                sections = backend.sections,
                parameters = backend.parameters
            )
        } else {
            null
        }
    }
}

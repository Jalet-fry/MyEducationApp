package vitos.example.myeducationapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.enableEdgeToEdge
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.material3.CircularProgressIndicator
import androidx.compose.runtime.getValue
import androidx.compose.runtime.produceState
import androidx.compose.runtime.remember
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.navigation.NavType
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import androidx.navigation.navArgument
import vitos.example.myeducationapp.data.Course
import vitos.example.myeducationapp.data.Lesson
import vitos.example.myeducationapp.data.LessonsRepository
import vitos.example.myeducationapp.ui.lessons.registerAllLessonBackends
import vitos.example.myeducationapp.ui.screens.CourseSelectionScreen
import vitos.example.myeducationapp.ui.screens.LessonDetailScreen
import vitos.example.myeducationapp.ui.screens.LessonListScreen
import vitos.example.myeducationapp.ui.theme.MyEducationAppTheme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        
        registerAllLessonBackends()
        
        enableEdgeToEdge()
        setContent {
            MyEducationAppTheme {
                val navController = rememberNavController()
                val context = LocalContext.current
                val repository = remember { LessonsRepository(context) }

                val courses = remember {
                    listOf(
                        Course("kotlin", "Kotlin", "Лучший язык для Android", "#7F52FF"),
                        Course("java", "Java", "Классика программирования", "#ED8B00"),
                        Course("android", "Android", "Разработка приложений", "#3DDC84")
                    )
                }

                NavHost(navController = navController, startDestination = "course_selection") {
                    composable("course_selection") {
                        CourseSelectionScreen(courses = courses) { course ->
                            navController.navigate("lesson_list/${course.id}")
                        }
                    }
                    composable(
                        "lesson_list/{courseId}",
                        arguments = listOf(navArgument("courseId") { type = NavType.StringType })
                    ) { backStackEntry ->
                        val courseId = backStackEntry.arguments?.getString("courseId") ?: "kotlin"
                        val lessons by produceState<List<Lesson>>(initialValue = emptyList(), courseId) {
                            value = repository.getLessonsByCourse(courseId)
                        }
                        LessonListScreen(
                            lessons = lessons,
                            onBack = { navController.popBackStack() },
                            onLessonClick = { lesson ->
                                navController.navigate("lesson_detail/$courseId/${lesson.id}")
                            }
                        )
                    }
                    composable(
                        "lesson_detail/{courseId}/{lessonId}",
                        arguments = listOf(
                            navArgument("courseId") { type = NavType.StringType },
                            navArgument("lessonId") { type = NavType.StringType }
                        )
                    ) { backStackEntry ->
                        val courseId = backStackEntry.arguments?.getString("courseId") ?: ""
                        val lessonId = backStackEntry.arguments?.getString("lessonId") ?: ""

                        val lesson by produceState<Lesson?>(initialValue = null, courseId, lessonId) {
                            value = repository.getLessonById(courseId, lessonId)
                        }

                        if (lesson != null) {
                            LessonDetailScreen(lesson!!) {
                                navController.popBackStack()
                            }
                        } else {
                            Box(modifier = Modifier.fillMaxSize(), contentAlignment = Alignment.Center) {
                                CircularProgressIndicator()
                            }
                        }
                    }
                }
            }
        }
    }
}

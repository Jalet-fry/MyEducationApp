package vitos.example.myeducationapp.ui.screens

import androidx.compose.foundation.layout.*
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.items
import androidx.compose.material3.*
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.unit.dp
import vitos.example.myeducationapp.data.Course
import vitos.example.myeducationapp.ui.components.CourseCard

@OptIn(ExperimentalMaterial3Api::class)
@Composable
fun CourseSelectionScreen(
    courses: List<Course>,
    onCourseClick: (Course) -> Unit
) {
    Scaffold(
        topBar = { TopAppBar(title = { Text("Учебный центр") }) }
    ) { padding ->
        LazyColumn(
            contentPadding = padding,
            modifier = Modifier
                .fillMaxSize()
                .padding(16.dp),
            verticalArrangement = Arrangement.spacedBy(16.dp)
        ) {
            items(courses) { course ->
                CourseCard(course = course, onClick = { onCourseClick(course) })
            }
        }
    }
}

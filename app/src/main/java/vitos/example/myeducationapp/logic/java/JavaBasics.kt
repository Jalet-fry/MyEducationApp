package vitos.example.myeducationapp.logic.java

import vitos.example.myeducationapp.data.LessonSection
import vitos.example.myeducationapp.data.Parameter
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.data.SectionType
import vitos.example.myeducationapp.logic.*

fun registerJavaBasics() {
    val course = "java"

    // 1. Введение в Java
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "java_1.1"
        override val courseId = course
        override val title = "Введение в Java и переменные"
        override val description = "Синтаксис Java, типы данных и вывод в консоль."
        override val parameters = listOf(
            Parameter("name", "Имя пользователя", ParameterType.STRING, "Java Developer")
        )
        override val sections = listOf(
            LessonSection(SectionType.TEXT, "Java — это объектно-ориентированный язык программирования. Код компилируется в байт-код и исполняется виртуальной машиной JVM."),
            LessonSection(SectionType.CODE, """
                public class Main {
                    public static void main(String[] args) {
                        String name = "{{name}}";
                        System.out.println("Hello, " + name + "!");
                    }
                }
            """.trimIndent())
        )
        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val name = params.getString("name")
            println("Hello, $name!")
        }
    })

    // 2. Циклы в Java
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "java_1.2"
        override val courseId = course
        override val title = "Циклы и условия в Java"
        override val description = "Использование if-else, switch и циклов for/while."
        override val parameters = listOf(
            Parameter("limit", "Количество итераций", ParameterType.INT, "3")
        )
        override val sections = listOf(
            LessonSection(SectionType.CODE, """
                int limit = {{limit}};
                for (int i = 1; i <= limit; i++) {
                    System.out.println("Итерация: " + i);
                }
            """.trimIndent())
        )
        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val limit = params.getInt("limit")
            for (i in 1..limit) {
                println("Итерация: $i")
            }
        }
    })

    // 3. Классы в Java
    LessonRegistry.register(object : LessonBackend {
        override var lessonId = "java_1.3"
        override val courseId = course
        override val title = "Классы и объекты (Java OOP)"
        override val description = "Создание классов, полей и методов в Java."
        override val parameters = listOf(
            Parameter("carBrand", "Марка авто", ParameterType.STRING, "Tesla")
        )
        override val sections = listOf(
            LessonSection(SectionType.CODE, """
                class Car {
                    String brand;
                    Car(String b) { this.brand = b; }
                    void drive() { System.out.println(brand + " едет!"); }
                }
                
                Car myCar = new Car("{{carBrand}}");
                myCar.drive();
            """.trimIndent())
        )
        override suspend fun execute(
            params: Map<String, Any>,
            sectionIndex: Int,
            tag: String?,
            onUpdate: (String) -> Unit
        ) = LessonRegistry.runSafe(onUpdate) { println, _ ->
            val brand = params.getString("carBrand")
            println("$brand едет!")
        }
    })
}

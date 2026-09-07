package vitos.example.myeducationapp

import kotlinx.coroutines.runBlocking
import org.junit.Assert.assertFalse
import org.junit.Assert.assertNotNull
import org.junit.Before
import org.junit.Test
import vitos.example.myeducationapp.data.ParameterType
import vitos.example.myeducationapp.logic.LessonRegistry
import vitos.example.myeducationapp.logic.android.registerAndroidBasics
import vitos.example.myeducationapp.logic.java.registerJavaBasics
import vitos.example.myeducationapp.logic.kotlin.basics.registerBasics
import vitos.example.myeducationapp.logic.kotlin.collections.registerCollections
import vitos.example.myeducationapp.logic.kotlin.coroutines.Coroutines
import vitos.example.myeducationapp.logic.kotlin.flows.Flows
import vitos.example.myeducationapp.logic.kotlin.functions.registerFunctions
import vitos.example.myeducationapp.logic.kotlin.generics.registerGenerics
import vitos.example.myeducationapp.logic.kotlin.oop.registerOOP

/**
 * Автоматический тест целостности всех зарегистрированных бэкендов.
 */
class BackendIntegrityTest {

    @Before
    fun setup() {
        LessonRegistry.clear()
        registerBasics()
        registerFunctions()
        registerOOP()
        registerGenerics()
        registerCollections()
        Coroutines.register()
        Flows.register()
        registerJavaBasics()
        registerAndroidBasics()
    }

    @Test
    fun testAllRegisteredBackends() = runBlocking {
        val backends = LessonRegistry.getAllBackends()
        println("Found ${backends.size} backends in registry")
        if (backends.isEmpty()) {
            throw AssertionError("Реестр бэкендов пуст!")
        }

        for (backend in backends) {
            val id = backend.lessonId
            println("Testing lesson $id (${backend.title})")
            
            val testParams = mutableMapOf<String, Any>()
            backend.parameters.forEach { param ->
                val value: Any = when (param.type) {
                    ParameterType.INT -> param.defaultValue.toIntOrNull() ?: 0
                    ParameterType.DOUBLE -> param.defaultValue.toDoubleOrNull() ?: 0.0
                    ParameterType.STRING -> param.defaultValue
                    ParameterType.BOOLEAN -> param.defaultValue.toBoolean()
                    ParameterType.ARRAY_INT -> param.defaultValue.split(",").mapNotNull { it.trim().toIntOrNull() }
                    ParameterType.ARRAY_STRING -> param.defaultValue.split(",").map { it.trim() }
                }
                testParams[param.id] = value
            }

            val result = try {
                backend.execute(testParams)
            } catch (e: Exception) {
                System.err.println("Урок $id (${backend.title}) УПАЛ:")
                e.printStackTrace()
                throw AssertionError("Урок $id упал при выполнении: ${e.message}", e)
            }

            assertNotNull("Урок $id вернул null", result)
            assertFalse("Урок $id вернул пустой результат", result.isEmpty())
        }
    }
}

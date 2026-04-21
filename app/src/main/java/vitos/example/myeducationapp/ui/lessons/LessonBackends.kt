package vitos.example.myeducationapp.ui.lessons

import vitos.example.myeducationapp.logic.kotlin.basics.registerBasics
import vitos.example.myeducationapp.logic.kotlin.functions.registerFunctions
import vitos.example.myeducationapp.logic.kotlin.oop.registerOOP
import vitos.example.myeducationapp.logic.kotlin.generics.registerGenerics
import vitos.example.myeducationapp.logic.kotlin.oop_ext.registerOopExtensions
import vitos.example.myeducationapp.logic.kotlin.collections.registerCollections
import vitos.example.myeducationapp.logic.kotlin.coroutines.Coroutines
import vitos.example.myeducationapp.logic.kotlin.flows.Flows
import vitos.example.myeducationapp.logic.java.registerJavaBasics
import vitos.example.myeducationapp.logic.android.registerAndroidBasics

/**
 * Инициализация всех ручных бэкендов для уроков.
 * Логика разделена по темам в пакете logic.impl.*
 */
fun registerAllLessonBackends() {
    // Kotlin
    registerBasics()               // Главы 1, 2
    registerFunctions()            // Глава 3
    registerOOP()                  // Глава 4
    registerGenerics()             // Глава 5 (Metanit: 6.1-6.3)
    registerOopExtensions()        // Глава 6 (Metanit: 5.1-5.9)
    registerCollections()          // Глава 7
    Coroutines.register()          // Глава 8
    Flows.register()               // Глава 9

    // Java
    registerJavaBasics()

    // Android
    registerAndroidBasics()
}

plugins {
    kotlin("jvm")
    alias(libs.plugins.kotlin.serialization)
}

group = "vitos.example.myeducationapp"
version = "1.0.0"

dependencies {
    implementation(libs.kotlinx.serialization.json)
}

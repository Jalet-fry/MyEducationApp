package vitos.example.myeducationapp.server

import io.ktor.serialization.kotlinx.json.*
import io.ktor.server.application.*
import io.ktor.server.engine.*
import io.ktor.server.netty.*
import io.ktor.server.plugins.contentnegotiation.*
import io.ktor.server.request.*
import io.ktor.server.response.*
import io.ktor.server.routing.*
import vitos.example.myeducationapp.server.lessons.kotlin.*
import java.io.ByteArrayOutputStream
import java.io.PrintStream

/**
 * Основной бэкенд для связи с телефоном.
 */
fun main() {
    println("Запуск сервера на http://localhost:8080...")
    embeddedServer(Netty, port = 8080) {
        install(ContentNegotiation) {
            json()
        }
        
        routing {
            get("/") {
                call.respondText("Бэкенд MyEducationApp готов к работе!")
            }
            
            post("/execute/{id}") {
                val id = call.parameters["id"] ?: return@post call.respond(mapOf("error" to "No ID"))
                val params = call.receive<Map<String, String>>()
                
                val output = captureOutput {
                    when (id) {
                        "1.1" -> lesson1_1()
                        "2.1" -> lesson2_1(params)
                        else -> println("Логика для $id еще не добавлена на бэкенд.")
                    }
                }
                call.respond(mapOf("output" to output))
            }
        }
    }.start(wait = true)
}

/**
 * Магия: перехватывает всё, что функции пишут в println(), 
 * чтобы отправить это на телефон.
 */
fun captureOutput(block: () -> Unit): String {
    val baos = ByteArrayOutputStream()
    val ps = PrintStream(baos)
    val oldOut = System.out
    System.setOut(ps)
    try {
        block()
    } catch (e: Exception) {
        println("Ошибка при выполнении: ${e.message}")
    } finally {
        System.out.flush()
        System.setOut(oldOut)
    }
    return baos.toString()
}

# Задай путь к папке с уроками
$folder = "C:\Kotlin_project\Test_all_fitches\src\main\kotlin\lessons"

# Проверяем, существует ли папка
if (-not (Test-Path $folder)) {
    Write-Host "Папка не найдена: $folder" -ForegroundColor Red
    exit
}

# Получаем все .kt файлы
$files = Get-ChildItem -Path $folder -Filter "*.kt"

foreach ($file in $files) {
    # Извлекаем номер из имени файла: Lesson3_4.kt -> 3_4
    if ($file.BaseName -match 'Lesson(\d+_\d+)') {
        $number = $matches[1]
    } else {
        Write-Host "Пропускаем $($file.Name): имя не соответствует LessonX_Y" -ForegroundColor Yellow
        continue
    }

    # Читаем содержимое файла
    $content = Get-Content -Path $file.FullName -Raw

    # Ищем "main(" (с учётом возможных пробелов между main и скобкой)
    # Заменяем на "main<номер>("
    $pattern = 'main\s*\('
    $replacement = "main${number}("

    if ($content -match $pattern) {
        $newContent = $content -replace $pattern, $replacement

        # Сохраняем изменения (только если что-то реально изменилось)
        if ($newContent -ne $content) {
            Set-Content -Path $file.FullName -Value $newContent -NoNewline
            Write-Host "Обновлён: $($file.Name) -> $replacement" -ForegroundColor Green
        } else {
            Write-Host "В $($file.Name) уже исправлено или не найдено main(" -ForegroundColor Cyan
        }
    } else {
        Write-Host "В $($file.Name) не найдено main(" -ForegroundColor Cyan
    }
}

Write-Host "Готово!" -ForegroundColor Green
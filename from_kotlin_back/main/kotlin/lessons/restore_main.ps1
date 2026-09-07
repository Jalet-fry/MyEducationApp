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
    # Читаем содержимое файла
    $content = Get-Content -Path $file.FullName -Raw

    # Ищем "mainЧИСЛО_ЧИСЛО(" (например, main3_4(, main5_2(, main10_3( и т.д.)
    # Заменяем на просто "main("
    $pattern = 'main\d+_\d+\s*\('
    $replacement = "main("

    if ($content -match $pattern) {
        $newContent = $content -replace $pattern, $replacement

        # Сохраняем изменения
        Set-Content -Path $file.FullName -Value $newContent -NoNewline
        Write-Host "Восстановлен: $($file.Name)" -ForegroundColor Green
    } else {
        Write-Host "В $($file.Name) не найдено mainX_Y( — возможно, уже обычный main(" -ForegroundColor Cyan
    }
}

Write-Host "Готово! Все функции восстановлены в main()" -ForegroundColor Green
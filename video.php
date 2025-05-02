<?php
// Указываем ссылку на внешний контент
$url = "https://antenacentral.store/megogosport1.php";

// Получаем содержимое страницы
$content = @file_get_contents($url);

// Обрабатываем ошибки загрузки
if ($content === false) {
    echo "<p style='color:red;'>Ошибка загрузки видеопотока. Попробуйте позже.</p>";
    exit;
}

// Удаляем рекламные скрипты и вложенные iframe
$content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $content);
$content = preg_replace('/<iframe\b[^>]*>(.*?)<\/iframe>/is', '', $content);

// Оборачиваем в контейнер и выводим
echo '<div style="position:relative;" class="video-responsive">';
echo $content;
echo '</div>';
?>
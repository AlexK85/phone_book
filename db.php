<?php
// Подключение к серверу БД
function connectDB() {
    $db = @mysqli_connect('localhost', 'root', '', 'phone_book') or die('Ошибка соединения с БД');
    if (!$db) die(mysqli_connect_error());
    return $db;
}

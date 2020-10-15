<?php

if (!isset($_GET['id'])) {
    // 
    die('Не установлен параметр id');
}

// Создаём переменную $id
$id = $_GET['id'];

// Подключаем файл с функцией подключения к БД
require_once "db.php";

// Вызов функции подключения к серверу БД
$connection = connectDB();

// Запрос на удаление данных
$delete = "DELETE FROM contacts WHERE id = $id";
$res_delete = mysqli_query($connection, $delete);


if ($res_delete) {
   //редирект 
   header('Location: /phone_book/index.php', true, 303);
} else {
    echo 'Error';
    echo mysqli_error($connection);
}




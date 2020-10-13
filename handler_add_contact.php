<?php
require_once "db.php";

// Вызов функции подключения к серверу БД
$connection = connectDB();

// Создаём для удобства переменные
$name = $_POST['name'];
$subname = $_POST['subname'];
$birthday = $_POST['birthday'];
$phone = $_POST['phone'];

// Запрос на добавление данных
$insert = "INSERT INTO contacts (name, subname, birthday, phone) VALUES ('$name', '$subname', '$birthday', '$phone')";
$res_insert = mysqli_query($connection, $insert);

if ($res_insert) {
    //редирект 
    header('Location: /phone_book/index.php', true, 303);
} else {
    echo 'Error';
    echo mysqli_error($connection);
}

//Закрываем подключение
// mysqli_close($db);

// Обработчик 

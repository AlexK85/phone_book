<?php
require_once "db.php";

// Обработчик 

// Вызов функции подключения к серверу БД
$connection = connectDB();

// Создаём для удобства переменные
$name = $_POST['name'];
$subname = $_POST['subname'];
$birthday = $_POST['birthday'];
$phone = $_POST['phone'];
// $to = sprintf(
//     "%s (%s) %s-%s-%s",
//     substr($phone, 0, 1),
//     substr($phone, 1, 3),
//     substr($phone, 4, 3),
//     substr($phone, 7, 2),
//     substr($phone, 9)
// );
// echo $to;


// Запрос на добавление данных
$insert = "INSERT INTO contacts (name, subname, birthday, phone) VALUES ('$name', '$subname', '$birthday', '$phone')";
$res_insert = mysqli_query($connection, $insert);

// $update = "UPDATE contacts SET id = 'id' WHERE id = '$id';
// $res_update = mysqli_query($connection, $update);

if ($res_insert) {
    //редирект 
    header('Location: /phone_book/index.php', true, 303);
} else {
    echo 'Error';
    echo mysqli_error($connection);
}

//Закрываем подключение
// mysqli_close($db);

<?php

// Подключаем файл с функцией подключения к БД
require_once "db.php";

// Вызов функции подключения к серверу БД
$connection = connectDB();

$id = $_POST['id'];
// print_r($id);
$name = $_POST['name'];
$subname = $_POST['subname'];
$birthday = $_POST['birthday'];
$phone = $_POST['phone'];

$update =  "UPDATE contacts SET name = '$name', subname = '$subname', birthday = '$birthday', phone = '$phone' WHERE id = '$id'";
$res_update = mysqli_query($connection, $update);

if ($res_update) {
    //редирект 
    header('Location: /phone_book/index.php', true, 303);
} else {
    echo 'Error';
    echo mysqli_error($connection);
}

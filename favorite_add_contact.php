<?php

if (!isset($_GET['favorite']) || !isset($_GET['id'])) {
    // 
    die('Не установлены параметры');
}

// Создаём переменную $id
$favorite = $_GET['favorite'];
$id = $_GET['id'];

// Подключаем файл с функцией подключения к БД
require_once "db.php";

// Вызов функции подключения к серверу БД
$connection = connectDB();

// Запрос на удаление данных
// UPDATE - обновить, SET - установлен, WHERE - где.
// $update = "UPDATE contacts SET favorite = $favorite WHERE id = $id";
// $res_update = mysqli_query($connection, $update);

// if ($res_update) {
//редирект 
//     header('Location: /phone_book/index.php', true, 303);
// } else {
//     echo 'Error';
//     echo mysqli_error($connection);
// }


// PDO
$sql = "UPDATE contacts SET favorite = $favorite WHERE id = :id";
$statement = $connection->prepare($sql);
$addFavorite = $statement->execute(
    [
        ':id' => $id
    ]
);

if ($addFavorite) {
    // редирект 
    header('Location: /phone_book/index.php', true, 303);
} else {
    echo 'Error';
    echo mysqli_error($connection);
}

<?php
// Подключение к серверу БД
function connectDB()
{
    // Вариант 1
    // $db = @mysqli_connect('localhost', 'root', '', 'phone_book') or die('Ошибка соединения с БД');
    // if (!$db) die(mysqli_connect_error());

    // Вариант 2
    // $dsn = 'mysql:dbname=phone_book;host=localhost';
    // $user = 'root';
    // $password = '';

    // try {
    //     $db = new PDO($dsn, $user, $password);
    // } catch (PDOException $e) {
    //     echo 'Подключение не удалось: ' . $e->getMessage();
    // }
    // return $db;

    // Вариант 3
    // Обработка ошибки соединения с базой данных 
    try {
        $db = new PDO(
            'mysql:dbname=phone_book;host=localhost',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo "Невозможно установить соединение с БД";
    }
    return $db;
}


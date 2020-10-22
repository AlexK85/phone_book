<?php
require_once "db.php";
require_once "func.php";

// Обработчик 

// Вызов функции подключения к серверу БД
$connection = connectDB();

// Создаём для удобства переменные
$name = $_POST['name'];
$subname = $_POST['subname'];
$birthday = $_POST['birthday'];
// $phone = $_POST['phone'];
$phoneNumber = $_POST['phone'];

//Перед тем как на валидность проверять - скорректируем номер телефона и результат присвоим новой переменной $phoneNumber
$phoneNumber = correctPhoneNumber($phoneNumber);

// Проверка на валидность
// echo $phoneNumber; die; 

//Проверка на валидацию (заглушка)
if (!isValidPhoneNumber($phoneNumber)) { // Если не валидный тел. номер, то вывести...
    // Как то вывести предупреждение....  
    // Опять Вывести форму клиенту + вывести предупреждение в виде текста в красной рамке

    $error = "Не валидный номер ($phoneNumber). Телефон должен быть в формате 79045327579";
    printHeader();
    // Параметры в этой функции от переменных, которые выше находятся на этой странице!
    showClientForm($name, $subname, $birthday, '', $error);
    printFooter();
} else {
    // echo 'Телефон валидный: ' . $phoneNumber;

    // стандартные действия по записи в базу / изменению в базе

    // Запрос на добавление данных
    $insert = "INSERT INTO contacts (name, subname, birthday, phone) VALUES ('$name', '$subname', '$birthday', '$phoneNumber')";
    $res_insert = mysqli_query($connection, $insert);

    if ($res_insert) {
        //редирект 
        header('Location: /phone_book/index.php', true, 303);
    } else {
        echo 'Error';
        echo mysqli_error($connection);
    }
}

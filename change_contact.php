<?php

// Подключаем файл с функцией подключения к БД
require_once "db.php";
require_once "func.php";

// Вызов функции подключения к серверу БД
$connection = connectDB();

$id = $_POST['id'];
// print_r($id);
$name = $_POST['name'];
$subname = $_POST['subname'];
$birthday = $_POST['birthday'];
$phone = $_POST['phone'];

//Перед тем как на валидность проверять - скорректируем номер телефона и результат присвоим новой переменной 
$name = correctName($name);
$subname = correctSubname($subname);
$birthday = correctBirthday($birthday);
$phone = correctPhoneNumber($phone);


//Проверка на валидацию ВВЕДЁНОГО ИМЕНИ, ФАМИЛИЮ, ДАТУ РОЖДЕНИЯ, НОМЕРА ТЕЛЕФОНА (заглушка)
if (!isValidname($name)) { // Если не валидное имя, то вывести...
    // Как то вывести предупреждение....  
    // Опять Вывести форму клиенту + вывести предупреждение в виде текста в красной рамке

    $error = "Не валидное имя ($name).";
    printHeader();
    // Параметры в этой функции от переменных, которые выше находятся на этой странице!
    showClientForm($id, '', $subname, $birthday, $phone, $error);
    printFooter();
    die;
}
if (!isValidSubname($subname)) {
    // Как то вывести предупреждение....  
    // Опять Вывести форму клиенту + вывести предупреждение в виде текста в красной рамке

    $error = "Не валидная фамилия ($subname).";
    printHeader();
    // Параметры в этой функции от переменных, которые выше находятся на этой странице!
    showClientForm($id, $name, '', $birthday, $phone, $error);
    printFooter();
    die;
}
if (!isValidBirthday($birthday)) {
    // Как то вывести предупреждение....  
    // Опять Вывести форму клиенту + вывести предупреждение в виде текста в красной рамке

    $error = "Не валидная дата рождения ($birthday).";
    printHeader();
    // Параметры в этой функции от переменных, которые выше находятся на этой странице!
    showClientForm($id, $name, $subname, '', $phone, $error);
    printFooter();
    die;
}
if (!isValidPhoneNumber($phone)) {
    // Как то вывести предупреждение....  
    // Опять Вывести форму клиенту + вывести предупреждение в виде текста в красной рамке

    $error = "Не валидный номер ($phone). Телефон должен быть в формате 79045327579";
    printHeader();
    // Параметры в этой функции от переменных, которые выше находятся на этой странице!
    showClientForm($id, $name, $subname, $birthday, '', $error);
    printFooter();
    die;
} else {
    // Запрос на изменение данных
    // $update =  "UPDATE contacts SET name = '$name', subname = '$subname', birthday = '$birthday', phone = '$phone' WHERE id = '$id'";
    // $res_update = mysqli_query($connection, $update);

    // if ($res_update) {
    //редирект 
    //     header('Location: /phone_book/index.php', true, 303);
    // } else {
    //     echo 'Error';
    //     echo mysqli_error($connection);
    // }

    // PDO 
    $sql = "UPDATE contacts SET name = :name, subname = :subname, birthday = :birthday, phone = :phone WHERE id = :id";
    $statement = $connection->prepare($sql);
    $update = $statement->execute(
        [
            ':id' => $id,
            ':name' => $name,
            ':subname' => $subname,
            ':birthday' => $birthday,
            ':phone' => $phone
        ]
    );
    // $contact = $statement->fetchAll(PDO::FETCH_ASSOC);


    if ($update) {
        // редирект 
        header('Location: /phone_book/index.php', true, 303);
    } else {
        echo 'Error';
        echo mysqli_error($connection);
    }
}

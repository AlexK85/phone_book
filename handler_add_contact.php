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
$phone = $_POST['phone'];


//Перед тем как на валидность проверять - скорректируем номер телефона и результат присвоим новой переменной $phoneNumber
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
    showClientForm('', $subname, $birthday, $phone, $error);
    printFooter();
    die;
}
if (!isValidSubname($subname)) {
    // Как то вывести предупреждение....  
    // Опять Вывести форму клиенту + вывести предупреждение в виде текста в красной рамке

    $error = "Не валидная фамилия ($subname).";
    printHeader();
    // Параметры в этой функции от переменных, которые выше находятся на этой странице!
    showClientForm($name, '', $birthday, $phone, $error);
    printFooter();
    die;
}
if (!isValidBirthday($birthday)) {
    // Как то вывести предупреждение....  
    // Опять Вывести форму клиенту + вывести предупреждение в виде текста в красной рамке

    $error = "Не валидная дата рождения ($birthday).";
    printHeader();
    // Параметры в этой функции от переменных, которые выше находятся на этой странице!
    showClientForm($name, $subname, '', $phone, $error);
    printFooter();
    die;
}
if (!isValidPhoneNumber($phone)) {
    // Как то вывести предупреждение....  
    // Опять Вывести форму клиенту + вывести предупреждение в виде текста в красной рамке

    $error = "Не валидный номер ($phone). Телефон должен быть в формате 79045327579";
    printHeader();
    // Параметры в этой функции от переменных, которые выше находятся на этой странице!
    showClientForm($name, $subname, $birthday, '', $error);
    printFooter();
    die;
} else {
    // echo 'Телефон валидный: ' . $phoneNumber;

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
}

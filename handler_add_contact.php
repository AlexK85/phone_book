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
    echo 'OK';
} else {
    echo 'Error';
    echo mysqli_error($connection);
}





//Eсли существует значения "name" и "subname" "birthday" "phone" переданные методом POST, то выполняется подключение к БД и запись в таблицу.
// if (isset($_POST['name']) && isset($_POST['subname']) && isset($_POST['birthday']) && isset($_POST['phone'])) {
//     //Переменные из формы
//     $name = $_POST['name'];
//     $subname = $_POST['subname'];
//     $birthday = $_POST['birthday'];
//     $phone = $_POST['phone'];
//     //Запрос для записи в БД
//     $request = $connection->query("INSERT INTO " . "contacts" . " (name, subname, birthday, phone) VALUES ($name, $subname, $birthday, $phone)");

//     //Проверка запроса
//     if ($request == true) {
//         echo "Информация записана в БД";
//     } else {
//         echo "Информация не занесена в базу данных";
//     }
// }



// function save_contacts() {
// global $connection;
// $name = mysqli_real_escape_string($connection, $_POST['name']);
// $subname = mysqli_real_escape_string($connection, $_POST['subname']);
// $birthday = mysqli_real_escape_string($connection, $_POST['birthday']);
// $phone = mysqli_real_escape_string($connection, $_POST['phone']);
// $query = "INSERT INTO catalogs (name, subname, birthday, phone) VALUES ('$name', '$subname', '$birthday', '$phone')";
// mysqli_query($connection, $query);
// }



// $name = mysqli_real_escape_string($connection, $_POST['name']);
// $subname = mysqli_real_escape_string($connection, $_POST['subname']);
// $birthday = mysqli_real_escape_string($connection, $_POST['birthday']);
// $phone = mysqli_real_escape_string($connection, $_POST['phone']);

// $submit = $_POST['submit'];

// if (isset($submit)) {
//     if (isset($_POST['name']) && isset($_POST['subname']) && isset($_POST['birthday']) && isset($_POST['phone'])) {
//         $query = "INSERT INTO 'catalogs' ('name', 'subname', 'birthday', 'phone') VALUES ('{$name}', '{$subname}', '{$birthday}', '{$phone}')";
//         if (mysqli_query($connection, $query)) {
//             echo 'Запись добавлена!';
//         }
//     }
// }

//Закрываем подключение
// mysqli_close($db);

// Обработчик 

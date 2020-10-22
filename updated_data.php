<?php

// Подключаем файл с функцией подключения к БД
require_once "db.php";

// Вызов функции подключения к серверу БД
$connection = connectDB();

$id = $_GET['id'];

// По данному идентификатору находим строку
$query =  "SELECT * FROM contacts WHERE id = '$id'";
$result = mysqli_query($connection, $query);

//Для преобразования в обычный массив
$contact = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updated</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form class="form" action="change_contact.php" method="post">
        <ul class="data-list">
            <li>
                <input type="hidden" name="id" value="<?= $contact['id'] ?>">
            </li>
            <li>
                <label for="name">Имя:</label>
                <input type="text" name="name" value="<?= $contact['name'] ?>" required>
            </li>
            <li>
                <label for="surname">Фамилия:</label>
                <input type="text" name="subname" value="<?= $contact['subname'] ?>" required>
            </li>
            <li>
                <label for="date">Дата рождения:</label>
                <input type="date" name="birthday" value="<?= $contact['birthday'] ?>" required>
            </li>
            <li>
                <label for="phone">Номер телефона:</label>
                <input type="tel" name="phone" placeholder="+7(999)999-99-99" value="<?= $contact['phone'] ?>" required>
            </li>

            <button type="submit" name="submit" value="Изменить">Изменить</button>
        </ul>
    </form>
</body>

</html>
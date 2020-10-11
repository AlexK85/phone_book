<?php
// Подключение к серверу
$db = @mysqli_connect('localhost', 'root', '', 'phone_book') or die('Ошибка соединения с БД');
if (!$db) die(mysqli_connect_error());

mysqli_set_charset($db, "utf8") or die('Не установлена кодировка');

// Запрос на добавление данных
$insert = "INSERT INTO contacts (name, subname, birthday, phone) VALUES ('Петя', 'Петров', '2020-10-11', '+79105554455')";
$res_insert = mysqli_query($db, $insert);

if($res_insert) echo 'OK';
else echo 'Error';
echo mysqli_error($db);

//Закрываем подключение
// mysqli_close($db);
?>
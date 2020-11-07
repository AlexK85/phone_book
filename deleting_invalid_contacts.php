<?php

// написать скрипт, который удалит не валидные записи. И запустить его из консоли(консольный скрипт)
require_once "db.php";
require_once "func.php";

// Сначала берём все записи с БД
// Записываем в массив
// Проходимся по маcсиву и выбираем, которые не подходят
// И после того как выбрали - удаляем! 

// Вызов функции подключения к серверу БД
$connection = connectDB();

// Выполняем запрос к БД
// 
$sql = 'SELECT * FROM contacts';
$sth = $connection->prepare($sql);
$sth->execute();
$contacts = $sth->fetchAll(PDO::FETCH_ASSOC);


$dryRun = true;

foreach ($contacts as $contact) {
    $contactsFromDelete = [];
    if (!isValidBirthday($contact['birthday']) || !isValidPhoneNumber($contact['phone'])) {
        $contactsFromDelete[] = $contact['id'];
    }
}

if ($dryRun) {
    print_r($contactsFromDelete);
} else {
    foreach ($contactsFromDelete as $id) {
        $delete_sql = "DELETE FROM contacts WHERE id = $id";
        // $resDel_sql = mysqli_query($connection, $delete_sql);
    }
}

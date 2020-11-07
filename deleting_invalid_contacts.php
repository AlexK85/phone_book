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
// print_r($contacts);
// die;


$dryRun = false;

$contactsFromDelete = []; // Массив должен быть вне цикла!
foreach ($contacts as $contact) {
    if (!isValidBirthday($contact['birthday']) || !isValidPhoneNumber($contact['phone'])) {
        $contactsFromDelete[] = $contact['id'];
    }
}


if ($dryRun) {
    print_r($contactsFromDelete);
} else {
    $count = 0;
    foreach ($contactsFromDelete as $id) {
        // $delete_sql = "DELETE FROM contacts WHERE id = $id";
        // $resDel_sql = mysqli_query($connection, $delete_sql);

        // PDO 
        $sql = "DELETE FROM contacts WHERE id = :id";
        $statement = $connection->prepare($sql);
        $count += $statement->execute(
            [
                ':id' => $id
            ]
        );
    }
    echo "Удалено $count строк";
    // echo 'Удалено ' . $count . ' строк!';
}

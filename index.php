<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);

require_once "db.php";
require_once "func.php";

$connection = connectDB();
$sql = "SELECT * FROM contacts";
$result = $connection->query($sql);
// В $contacts будет аасоциативный массив
$contacts = $result->fetch_all(MYSQLI_ASSOC);


// $contacts = [
//   [
//     'number' => '1',
//     'name' => 'Александр',
//     'subname' => 'Курганский',
//     'birthday' => '16.10.1985',
//     'phone' => '+79045327579',
//     'favorite' => false,
//   ],
//   [
//     'number' => '2',
//     'name' => 'Вася',
//     'subname' => 'Пупкин',
//     'birthday' => '16.10.1985',
//     'phone' => '+79045327579',
//     'favorite' => true,
//   ],
//   [
//     'number' => '3',
//     'name' => 'Гена',
//     'subname' => 'Гешка',
//     'birthday' => '16.10.1985',
//     'phone' => '+79045327579',
//     'favorite' => true,
//   ],
//   [
//     'number' => '4',
//     'name' => 'Антоха',
//     'subname' => 'Хотеев',
//     'birthday' => '16.10.1985',
//     'phone' => '+79045327579',
//     'favorite' => true,
//   ]
// ];

?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Телефонная книга</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

  <!-- <h1>Телефонная книга</h1> -->
  <div class="container">
    <div class="container-favorite">
      <h2>Избранные</h2>
      <table class="phone-book favorites" border="1">
        <tr>
          <th>№</th>
          <th>Имя</th>
          <th>Фамилия</th>
          <th>День рождения</th>
          <th>Номер телефона</th>
          <th>Избранное</th>
          <th>Править</th>
          <th>Удалить</th>
        </tr>
        <?php
        $favoriteContacts = array_filter($contacts, function ($contact) {
          return $contact['favorite'];
        });

        foreach ($favoriteContacts as $contact) {
          // if ($contact['favorite']) {
          echo renderContact($contact);
          // }
        }
        ?>
      </table>
    </div>
  </div>

  <div class="container-contacts">
    <div class="container-title-add_contact">
      <h2>Контакты</h2>
      <button>Добавить контакт</button>
    </div>
    <table class="phone-book" border="1">
      <tr>
        <th>№</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>День рождения</th>
        <th>Номер телефона</th>
        <th>Избранное</th>
        <th>Править</th>
        <th>Удалить</th>
      </tr>
      <?php
      foreach ($contacts as $contact) {
        echo renderContact($contact);
      }
      ?>
    </table>
  </div>

</body>

</html>
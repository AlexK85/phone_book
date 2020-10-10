<?php
  header("Content-type: text/html; charset=utf-8");
  error_reporting(-1);

  require_once "func.php";
  
  $contacts = [
    [
      'number' => '1',
      'name' => 'Александр',
      'subname' => 'Курганский',
      'age' => '16.10.1985',
      'phone' => '+79045327579',
      'favorite' => false,
    ],
    [
      'number' => '2',
      'name' => 'Вася',
      'subname' => 'Пупкин',
      'age' => '16.10.1985',
      'phone' => '+79045327579',
      'favorite' => true,
    ],
    [
      'number' => '3',
      'name' => 'Гена',
      'subname' => 'Гешка',
      'age' => '16.10.1985',
      'phone' => '+79045327579',
      'favorite' => true,
    ],
    [
      'number' => '4',
      'name' => 'Антоха',
      'subname' => 'Хотеев',
      'age' => '16.10.1985',
      'phone' => '+79045327579',
      'favorite' => true,
    ]
  ];

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
    <form class="form" action="index.php" method="post">
      <ul class="data-list">
        <li>
          <label for="name">Имя:</label> 
          <input type="text" name="name">
        </li>
        <li>
          <label for="surname">Фамилия:</label> 
          <input type="text" name="surname">
        </li>
        <li>
          <label for="date">Дата рождения:</label>
          <input type="date" name="date">
        </li>
        <li>
          <label for="phone">Номер телефона:</label> 
          <input type="text" name="phone">
        </li>

        <button type="submit" name="submit" value="Добавить контакт">Добавить</button>
      </ul>
    </form>
    
    <div class="container-favorite">
          <h2>Избранные</h2>
        <table class="phone-book favorites" border="1">
            <tr>
              <th>№</th>
              <th>Имя</th>
              <th>Фамилия</th>
              <th>Дата рождения</th>
              <th>Номер телефона</th>
              <th>Избранное</th>
              <th>Править</th>
              <th>Удалить</th>
            </tr>
            <?php
              $favoriteContacts = array_filter($contacts, function($contact){
                return $contact['favorite'];
              });

              foreach($favoriteContacts as $contact) {
                // if ($contact['favorite']) {
                  echo renderContact($contact);
                // }
              }
            ?>
        </table>
    </div>
</div>

<div class="container-contacts">
      <h2>Контакты</h2>
    <table class="phone-book" border="1">
        <tr>
          <th>№</th>
          <th>Имя</th>
          <th>Фамилия</th>
          <th>Дата рождения</th>
          <th>Номер телефона</th>
          <th>Избранное</th>
          <th>Править</th>
          <th>Удалить</th>
        </tr>
        <?php
          foreach($contacts as $contact) {
            echo renderContact($contact);
          }
        ?> 
    </table>
</div>

</body>
</html>
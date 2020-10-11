
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
          <input type="tel" name="phone">
        </li>
        
        <button type="submit" name="submit" value="Добавить контакт">Добавить</button>
      </ul>
    </form>
</body>
</html>
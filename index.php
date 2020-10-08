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
    <form class="form" action="" method="">
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
              <th>Удалить/Править</th>
            </tr>
            <tr>
              <td>1</td>
              <td>Александр</td>
              <td>Курганский</td>
              <td>16.10.1985</td>
              <td>+79045327579</td>
              <td>
                <div class="checkbox">
                  <input id="check1" type="checkbox" name="check" value="check1">
                  <label for="check1">☆</label>
                </div>
              </td>
              <td>
                <button class="buttun-del" type="button" value="Добавить контакт">Удалить</button>
                <button type="edit" name="edit">Править</button>
              </td>
            </tr>
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
          <th>Удалить/Править</th>
        </tr>
        <tr>
          <td>1</td>
          <td>Александр</td>
          <td>Курганский</td>
          <td>16.10.1985</td>
          <td>+79045327579</td>
          <td>
            <div class="checkbox">
              <input id="check2" type="checkbox" name="check" value="check2">
              <label for="check2">☆</label>
            </div>
          </td>
          <td>
            <button class="buttun-del" type="button" value="Добавить контакт">Удалить</button>
            <button type="edit" name="edit">Править</button>
          </td>
        </tr>
    </table>
</div>
</body>
</html>
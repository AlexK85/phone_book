<?php

function renderContact($contact, $number)
{

  return '<tr class="row-clear">
            <td>' . $number . '</td> 
            <td>' . $contact['name'] . '</td>
            <td>' . $contact['subname'] . '</td>
            <td>' . $contact['birthday'] . '</td>
            <td>' . $contact['phone'] . '</td>
            <td>' . renderLinkFavorite((bool)$contact['favorite'], $contact['id']) . '</td>
            <td>
               <a class="edit" href="updated_data.php?id=' . $contact['id'] . '">Изменить</a>
            </td>
            <td>
              <a href="delete_contacts.php?id=' . $contact['id'] . '" class="button-del">Удалить</a>
            </td>
          </tr>';
}

function renderLinkFavorite($isFavorite, $id)
{
  if ($isFavorite) {
    $link = '<a class="favorite" href="favorite_add_contact.php?favorite=0&id=' . $id . '">⭐️</a>';
  } else {
    $link = '<a class="favorite" href="favorite_add_contact.php?favorite=1&id=' . $id . '">☆</a>';
  }
  return $link;
}


// Функция для коррекции номеров
function correctPhoneNumber($phoneNumber)
{
  // удалить из строки все не нужные символы
  $phoneNumber = preg_replace('#\D#', '', $phoneNumber);

  // если впереди 8 - удалить её
  $phoneNumber = preg_replace('#^8#', '', $phoneNumber);

  // добавить спереди +7 или + (если первая 7)
  $phoneNumber = preg_replace('#^7#', '', $phoneNumber);
  $phoneNumber = '+7' . $phoneNumber;

  return $phoneNumber;
}

// Пишем функцию, которая будет проверять на валидность
function isValidPhoneNumber($phoneNumber)
{
  if (strlen($phoneNumber) !== 12) {  // если длиина строки не равна 12 (или больше или меньше)
    return false; // не валидный
  }
  return true;
}

// Выводит сообщение, если НЕ валидный номер
function showClientForm($name = '', $subname = '', $birthday = '', $phoneNumber = '', $error = '')
{
  $form = '<form class="form" action="handler_add_contact.php" method="post">
                <ul class="data-list">
                    <li>
                      <label for="name">Имя:</label>
                      <input type="text" name="name" value="' . $name . '" autofocus required>
                    </li>
                    <li>
                      <label for="surname">Фамилия:</label>
                      <input type="text" name="subname"  value="' . $subname . '"  required>
                    </li>
                    <li>
                      <label for="date">Дата рождения:</label>
                      <input type="date" name="birthday" value="' . $birthday . '" required>
                    </li>
                    <li>
                      <label for="phone">Номер телефона:</label>
                      <input type="tel" name="phone" value="' . $phoneNumber . '" placeholder="+7(___)___-__-__" required>
                    </li>

                    <button type="submit" name="submit" value="Добавить контакт">Добавить</button>
                    <input type="reset" value="Очистить!">
                </ul>
            </form>';

  if ($error !== '') {  // Если error не пустой
    $errorMessage = '<span style="border: 2px solid red; margin: 5px;">'  . $error . '</span>';
  } else {
    $errorMessage = '';
  }
  
  echo $form;
  echo $errorMessage;
}


function printHeader() {
  echo '<!DOCTYPE html>
          <html lang="en">
          <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Форма</title>
          <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>';
}

function printFooter() {
  echo '</body>
        </html>';
}
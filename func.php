<?php

// <<<<<<<  Передаёт данные в INDEX.PHP 
function renderContact($contact, $number)
{

  return '<tr class="row-clear">
            <td>' . $number . '</td> 
            <td>' . $contact['name'] . '</td>
            <td>' . $contact['subname'] . '</td>
            <td>' . date('d.m.Y', strtotime($contact['birthday'])) . '</td>
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
// Передаёт данные в INDEX.PHP >>>>>





// <<<<<<<  Передаёт данные в HANDLER_ADD_CONTACT.PHP

// Функция для коррекции ИМЕНИ
function correctName($userName)
{
  // удалить из строки все не нужные символы кроме букв
  $userName = preg_replace('/[^a-zA-Zа-яА-Я ]/u', '', $userName);
  // $userName = preg_replace('#\d#', '', $userName);
  // Спереди должна быть только буква верхнего регистра
  // .....?!?!?
  return $userName;
}

// Функция для коррекции ФАМИЛИИ
function correctSubname($userSubname)
{
  // удалить из строки все не нужные символы кроме букв
  $userSubname = preg_replace('/[^a-zA-Zа-яА-Я ]/u', '', $userSubname);
  // .....?!?!?

  return $userSubname;
}

// Функция для коррекции ДАТЫ РОЖДЕНИЯ
function correctBirthday($userBirthday)
{
  // Поменять формат ДАТЫ 
  // $userBirthday = date('d.m.Y', strtotime($userBirthday));
  // $userBirthday = date_create_from_format('d.m.Y', '16.10.1985');

  // .....?!?!?

  return $userBirthday;
}

// Функция для коррекции НОМЕРА ТЕЛЕФОНА
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


// <<<<<<<<<  Функцию, которая будет ПРОВЕРЯТЬ НА ВАЛИДНОСТЬ введённые данные: ИМЯ
function isValidName($userName)
{
  if ($userName === '') {  // ....?
    return false; // не валидный
  }
  return true;
}

// Функцию, которая будет ПРОВЕРЯТЬ НА ВАЛИДНОСТЬ введённые данные: ФАМИЛИЯ
function isValidSubname($userSubname)
{
  if ($userSubname === '') {  //
    return false; // не валидный
  }
  return true;
}

// Функцию, которая будет ПРОВЕРЯТЬ НА ВАЛИДНОСТЬ введённые данные: ДАТА РОЖДЕНИЯ
function isValidBirthday($birthday)
{
  $timestamp = strtotime($birthday); // Преобразуем дату в числовую метку времени 
  $year = (int)date('Y', $timestamp); // Получаем ВВЕДЁННЫЙ ГОД и преобразуем его в ЧИСЛО
  $current_year = (int)date('Y', time()); // Получаем текущий год и преобразуем его в ЧИСЛО

  if ($year <= 1900 || $year > $current_year) {
    return false; // не валидный
  }
  return true;
}

// Функцию, которая будет ПРОВЕРЯТЬ НА ВАЛИДНОСТЬ введённые данные: НАМЕРА ТЕЛЕФОНА
function isValidPhoneNumber($phoneNumber)
{
  if (strlen($phoneNumber) !== 12) {  // если длиина строки не равна 12 (или больше или меньше)
    return false; // не валидный
  }
  return true;
}
// Передаёт данные в HANDLER_ADD_CONTACT.PHP >>>>>>>>>




// <<<<<<<<<  Передаёт данные в FORM_ADD_CONTACT.PHP

// Выводит сообщение, если НЕ валидный номер
function showClientForm($userName = '', $subname = '', $birthday = '', $phoneNumber = '', $error = '')
{
  $form = '<form class="form" action="handler_add_contact.php" method="post">
                <ul class="data-list">
                    <li>
                      <label for="name">Имя:</label>
                      <input type="text" name="name" value="' . $userName . '" autofocus required>
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

// Вёрстка верхней части формы
function printHeader()
{
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

// Вэрстка нижней части формы
function printFooter()
{
  echo '</body>
        </html>';
}
// Передаёт данные в FORM_ADD_CONTACT.PHP >>>>>>>>>>

<?php

if (!empty($_POST)) {
  header("Location: {$_SERVER['PHP_SELF']}");
  exit;
}

// Подключаем файл с функциями
require_once "func.php";


//Скрипт, который принимает данные из формы

// +79045327579 - корректный

// +79045327579
// 79045327579
// 9045327579
// 8-904-532-75-79
// 8 (904) 532+75-!.79a

// $phoneNumber = $_POST['phone'];
// $phoneNumber = "8 (904) 532-75-79";
// $phoneNumber = "79045327579";
// $phoneNumber = "790453275799999999";

//Перед тем как на валидность проверять - скорректируем номер телефона и результат присвоим новой переменной $phoneNumber
// $phoneNumber = correctPhoneNumber($phoneNumber);

// // Проверка на валидность
// // echo $phoneNumber; die; 

//Проверка на валидацию (заглушка)
// if (!isValidPhoneNumber($phoneNumber)) { // Если не валидный тел. номер, то вывести...
//   // Как то вывести предупреждение....  
//   // Опять Вывести форму клиенту + вывести предупреждение в виде текста в красной рамке
// header('Location: /phone_book/form_add_contact.php'); // редирект на страницу формы
// echo '<span style="background-color: red; margin: 5px;">НЕ валидный номер: '  . $phoneNumber . '</span>'; // предупреждение в виде текста в красной рамке
//   $errorMessage = "НЕ валидный номер ($phoneNumber). Телефон должен быть в формате 79045327579";
//   showClientForm($errorMessage);
//   // echo $errorMessage;
// } else {
//   echo 'телефон валидный: ' . $phoneNumber;

//   // стандартные действия по записи в базу / изменению в базе
//   require_once "db.php";
//   $connection = connectDB();
// // $phoneNumber = $_POST['phone'];
// Запрос на добавление данных
// $insertPhone = "INSERT INTO contacts phone VALUES '$phoneNumber'";
// $res_insertPhone = mysqli_query($connection, $insertPhone);

// if ($res_insertPhone) {
//редирект 
//   header('Location: /phone_book/index.php', true, 303);
// } else {
//   echo 'Error';
//   echo mysqli_error($connection);
// }
// }


// // Функция для коррекции номеров
// function correctPhoneNumber($phoneNumber)
// {
//   // удалить из строки все не нужные символы
//   $phoneNumber = preg_replace('#\D#', '', $phoneNumber);

//   // если впереди 8 - удалить её
//   $phoneNumber = preg_replace('#^8#', '', $phoneNumber);

//   // добавить спереди +7 или + (если первая 7)
//   $phoneNumber = preg_replace('#^7#', '', $phoneNumber);
//   $phoneNumber = '+7' . $phoneNumber;

//   return $phoneNumber;
// }

// // Пишем функцию, которая будет проверять на валидность
// function isValidPhoneNumber($phoneNumber)
// {
//   if (strlen($phoneNumber) !== 12) {  // если длиина строки не равна 12 (или больше или меньше)
//     return false; // не валидный
//   }
//   return true;
// }


// function showClientForm($errorMessage)
// {
//   if ($errorMessage !== "") {  // Если errorMessage не пустой
//     echo $errorMessage;
//     // header('Location: /phone_book/form_add_contact.php', true, 303); // редирект на страницу формы
//   }
//   return $errorMessage;
// }

// 1 Способ как решить задачу
// Вопрос: как очистить строку от не нужных символов?
// str_replace — Заменяет все вхождения строки поиска на строку замены
// Далее ПРОТЕСТИРУЕМ РАБОТУ ФУНКЦИИ 

// $phoneNumber = "8 (904) 532+75-!.79a";

// $incorrectChars = [
//     '(',')','+','-','.','_',' ','!','a'     
// ];

// // foreach($incorrectChars as $char) {
//     $phoneNumber = str_replace($incorrectChars, '', $phoneNumber);
// // }

// echo $phoneNumber;

// 2 Способ решения задачи
// Вопрос: регулярные выражения - отрицание
// preg_replace — Выполняет поиск и замену по регулярному выражению
// Далее ПРОТЕСТИРУЕМ РАБОТУ ФУНКЦИИ 

// $phoneNumber = "8 (904) 532+75-!.79a";

// $phoneNumber = preg_replace('#\D#', '', $phoneNumber);

// echo $phoneNumber;


// Наши действия: 
// 1. Мы берём телефон из формы
// 2. Корректируем его в нашей функции correctPhoneNumber($phoneNumber)
// 3. Проверяем валидность. Если не валидный телефонный номер...
// 4. Стоп
// 5. Должны вывести форму клиенту + предупреждение в виде текста в красной рамке
// 6. Если всё прошло, то записываем в базу или изменение в базе 

// Проволидировать ИМЯ и ФАМИЛИЮ и что бы не пустое поле

    printHeader();
    showClientForm();
    printFooter();

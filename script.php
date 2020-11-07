<?php 
// Для консольного скрипта
   echo "Введите фамилию: ";
   $lastname = trim(fgets(STDIN));

   echo "Введите имя: ";
   $name = trim(fgets(STDIN));

  do {
    echo "Введите возраст: ";
    $age = (int) trim(fgets(STDIN));
  } 
  while($age <= 0);
   
  //  $lastname . $name . $age . "\n";
  //  var_dump($lastname);
  //  var_dump($name);
  //  var_dump($age);
   
  // if ($age === 0) {
  //   echo '!';
  //   echo "Введите возраст: ";
  //   $age = (int) trim(fgets(STDIN));
  // } 
  // if ($age > 0) {
  //   echo 'Спасибо! Вы ввели все данные!';
  // }
  
<?php

session_start();
require_once __DIR__ . "/database/pdo.php";

$Student_ID = $_POST["Student_ID"];
$UserLogin = $_POST["UserLogin"];
$Gmail = $_POST["Gmail"];
$Group_ID = $_POST["Group_ID"];
$Password = $_POST["Password"];
$PhoneNumber = $_POST["PhoneNumber"];
$Address = $_POST["Address"];

// Отримання та оновлення даних користувача з бази даних за логіном
$sql = "UPDATE `Students` SET Student_ID = :Student_ID, Gmail = :Gmail, Group_ID = :Group_ID, Password = :Password, PhoneNumber = :PhoneNumber, Address = :Address WHERE UserLogin = :UserLogin";
$params = [
  "Student_ID" => $Student_ID,
  "Gmail" => $Gmail,
  "Group_ID" => $Group_ID,
  "Password" => $Password,
  "PhoneNumber" => $PhoneNumber,
  "Address" => $Address,  
  "UserLogin" => $UserLogin,
];

// Передання даних користувача в базу даних
   $prepare = $pdo->prepare($sql);
   $prepare->execute($params);

   // Перевірка на відправку даних
  //  $result = $prepare->execute($params);
  //  if ($result) {
  //      echo "Дані успішно збережено!";
  //   } else {
  //      echo "Помилка збереження даних: " . $prepare->errorInfo()[2];
  //   }

    $_SESSION["user"] = [
      "UserLogin" => $UserLogin,
      "Gmail" => $Gmail,
      "Group_ID" => $Group_ID,
      "PhoneNumber" => $PhoneNumber,
      "Address" => $Address,
  ];

  header("Location: /profile.php?UserLogin=$UserLogin");
?>
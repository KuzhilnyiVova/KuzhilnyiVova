<?php
session_start();
require_once __DIR__ . "/database/pdo.php";

$UserLogin = $_POST["UserLogin"];
$Password = $_POST["Password"];

$Password = md5($Password . "thisisforhabr");

$UserLogin = filter_var(trim($UserLogin), 513);

// Отримання даних користувача з бази даних за логіном
$sql = "SELECT * FROM `Students` WHERE `UserLogin` = :UserLogin";
$params = [":UserLogin" => $UserLogin];
$statement = $pdo->prepare($sql);
$statement->execute($params);

$user = $statement->fetch(PDO::FETCH_ASSOC);

if(
    $UserLogin === '' ||
    $Password === '' 
){
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Перевірте коректність введених даних!';
    header('Location: /login.php');
}
else

//echo   'pass' . $Password. '<br>';
//echo   'pass hash' . $user["Password"]. '<br>';

if(hash_equals($Password, $user["Password"])){
    $_SESSION["auth"] = true;
    $_SESSION["user"] = [
        "Student_ID" => $user["Student_ID"],
        "UserLogin" => $user["UserLogin"],
        "Group_ID" => $user["Group_ID"],
        "PhoneNumber" => $user["PhoneNumber"],
        "Address" => $user["Address"],
        "Status" => $user["Status"],
        "Gmail" => $user["Gmail"],
    ];
    header('Location: /profile.php');
} else {
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Вказано неправильний пароль';
        header('Location: /login.php');
}

?>
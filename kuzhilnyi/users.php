<?php
session_start();
require_once __DIR__ . "/database/pdo.php";

$UserLogin = $_POST["UserLogin"];
$Gmail = $_POST["Gmail"];
$Group_ID = $_POST["Group_ID"];
$Password = $_POST["Password"];
$Password_Confirm = $_POST["Password_Confirm"];

$UserLogin = filter_var(trim($UserLogin), 513);
$Group_ID = filter_var(trim($Group_ID), 513);

//перевірка на пусті поля
if(
    $UserLogin === '' ||
    $Gmail === '' ||
    $Group_ID === '' ||
    $Password === '' ||
    $Password_Confirm === '' 
){
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Перевірте коректність введених даних!';
    header('Location: /registration.php');
}
else
//перевірка на співпадіння паролів
if($Password !== $Password_Confirm){
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Паролі не співпадають';
    header('Location: /registration.php');
}
else
//перевірки на довжину 
if(mb_strlen($Password) < 5){
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Пароль має бути більше 5 символів';
    header('Location: /registration.php');
}
else

if(mb_strlen($UserLogin) < 5)
{
   echo "Недопустима довжина логіну";
   exit();
}
else {

$sql = "INSERT INTO `Students` (`UserLogin`, `Gmail`, `Group_ID`, `Password`) VALUES (:UserLogin, :Gmail, :Group_ID, :Password)";

$params = [
    ":UserLogin" => $UserLogin,
    ":Gmail" => $Gmail,
    ":Group_ID" => $Group_ID,
    ":Password" => md5($Password . "thisisforhabr"),
];

$prepare = $pdo->prepare($sql);
$prepare->execute($params);

if (mail("example@gexample.com", "Заявка з сайту", "ПІБ: ".$UserLogin . "E-mail: " .$Gmail . "From: example2@example.com \r\n"))
{
    echo "Повідомлення успішно надіслано";
}
else{
    echo "При відправці повідомлення виникла помилка";
}

header("Location: /login.php");
}
?>
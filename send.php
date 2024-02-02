<?php
 require_once __DIR__ . "/database/pdo.php";
 session_start();

    $Student_ID = $_POST['id'];
    $UserLogin = $_POST['UserLogin'];
    $Gmail = $_POST['Gmail'];
    $Group_ID = $_POST['Group_ID'];
    $Password = $_POST['Password'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Address = $_POST['Address'];

    if (mail("example@gexample.com", "Заявка з сайту", "ПІБ: ".$UserLogin . "E-mail: " .$Gmail , "From: vovakugilnyi1234@gmail.com \r\n"))
    {
        echo "Повідомлення успішно надіслано";
    }
    else{
        echo "При відправці повідомлення виникла помилка";
    }
?>
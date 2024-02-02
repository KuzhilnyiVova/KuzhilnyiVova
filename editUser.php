<?php

require_once __DIR__ . "/database/pdo.php";

       $Student_ID = $_POST['id'];
       $UserLogin = $_POST['UserLogin'];
       $Gmail = $_POST['Gmail'];
       $Group_ID = $_POST['Group_ID'];
       $Password = $_POST['Password'];
       $PhoneNumber = $_POST['PhoneNumber'];
       $Address = $_POST['Address'];

       $update = "UPDATE `Students` SET UserLogin = :UserLogin, Gmail =:Gmail, Group_ID = :Group_ID, Password = :Password, PhoneNumber = :PhoneNumber, Address = :Address WHERE Student_ID = :id";
       $params = [
           "id" => $Student_ID,
           "UserLogin" => $UserLogin,
           "Gmail" => $Gmail,
           "Group_ID" => $Group_ID,
           "Password" => $Password,
           "PhoneNumber" => $PhoneNumber,
           "Address" => $Address,
       ];

       $prepare = $pdo->prepare($update);
       $prepare->execute($params);  

       header("Location: /registredusers.php?Student_ID=$Student_ID");
       exit();
?>
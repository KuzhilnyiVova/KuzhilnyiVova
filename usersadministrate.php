<?php
require_once __DIR__ . "/database/pdo.php";

//session_start();

function deleteUser($id) {
    global $pdo;
    $deleteQuery = "DELETE FROM Students WHERE Student_ID = :id";
    $deleteStmt = $pdo->prepare($deleteQuery);
    $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $deleteStmt->execute();
}

function banUser($id) {
   global $pdo;
   $banQuery = "UPDATE Students SET banned = 1 WHERE Student_ID = :id";
   $banStmt = $pdo->prepare($banQuery);
   $banStmt->bindParam(':id', $id, PDO::PARAM_INT);
   return $banStmt->execute();
}

function editUser($id) {
   //global $pdo;

   //if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'], $_POST['UserLogin'], $_POST['Group_ID'], $_POST['Password'], $_POST['PhoneNumber'], $_POST['Address'])) {

       $Student_ID = $_POST['id'];
       $UserLogin = $_POST['UserLogin'];
       $Gmail = $_POST['Gmail'];
       $Group_ID = $_POST['Group_ID'];
       $Password = $_POST['Password'];
       $PhoneNumber = $_POST['PhoneNumber'];
       $Address = $_POST['Address'];

       $update = "UPDATE `Students` SET UserLogin = :UserLogin, Gmail = :Gmail, Group_ID = :Group_ID, Password = :Password, PhoneNumber = :PhoneNumber, Address = :Address WHERE Student_ID = :id";
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
   }
//}


if (isset($_GET['action']) && isset($_GET['id'])) {
   $action = $_GET['action'];
   $id = $_GET['id'];

   if ($action == 'delete') {
       deleteUser($id);
   } elseif ($action == 'ban') {
       banUser($id);
   } elseif ($action == 'edit') {
       editUser($id);
   }
       
}
   
   header('Location: /registredusers.php');
   //header('Location: /registredusers.php?Student_ID=$Student_ID');
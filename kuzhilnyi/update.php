<?php
session_start();

   require_once __DIR__ . "/database/pdo.php";
 
   $Book_ID = $_POST["Book_ID"];
   $bookName = $_POST["Book_Name"];
   $bookAuthor = $_POST["Author_ID"];
   $bookPublication = $_POST["Publication_ID"];
   $bookYear = $_POST["Publication_Year"];
   $bookADD = $_POST["Add_Date"];
   
   if (isset($_SESSION["user"]["Status"]) && $_SESSION["user"]["Status"] == 10) {
   $sql = "UPDATE `Book` SET Book_Name= :Book_Name, Author_ID= :Author_ID, Publication_ID= :Publication_ID, Publication_Year= :Publication_Year, Add_Date= :Add_Date WHERE Book_ID= :Book_ID";;
   $params = [
    "Book_ID" => $Book_ID,
    "Book_Name" => $bookName,
    "Author_ID" => $bookAuthor,
    "Publication_ID" => $bookPublication,
    "Publication_Year" => $bookYear,
    "Add_Date" => $bookADD,
   ];

   $prepare = $pdo->prepare($sql);
   $prepare->execute($params);

  header("Location: /book.php?Book_ID=$Book_ID");
 }
?>
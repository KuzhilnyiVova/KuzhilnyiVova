<?php

   require_once __DIR__ . "/database/pdo.php";

   $bookID = $_POST["Book_ID"];
   $bookName = $_POST["Book_Name"];
   $bookAuthor = $_POST["Author_ID"];
   $bookPublication = $_POST["Publication_ID"];
   $bookYear = $_POST["Publication_Year"];
   $bookADD = $_POST["Add_Date"];

   $sql = "INSERT INTO `Book` (`Book_ID`, `Book_Name`, `Author_ID`, `Publication_ID`, `Publication_Year`, `Add_Date`) VALUES (:Book_ID, :Book_Name, :Author_ID, :Publication_ID, :Publication_Year, :Add_Date)";

   $params = [
    ":Book_ID" => $bookID,
    ":Book_Name" => $bookName,
    ":Author_ID" => $bookAuthor,
    ":Publication_ID" => $bookPublication,
    ":Publication_Year" => $bookYear,
    ":Add_Date" => $bookADD,
   ];

  $prepare = $pdo->prepare($sql);
  $prepare->execute($params);

  $pdo->lastInsertID();

  $lastInsertID = $pdo->lastInsertID();

  header("location: /book.php?Book_ID=$bookID")
?>
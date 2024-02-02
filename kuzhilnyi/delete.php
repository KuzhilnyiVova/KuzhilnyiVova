<?
  session_start();
  require_once __DIR__ . "/database/pdo.php";

  $Book_ID = $_GET["Book_ID"];
  
  if (isset($_SESSION["user"]["Status"]) && $_SESSION["user"]["Status"] == 10) {
  $sql = "DELETE FROM Book WHERE Book_ID = :Book_ID";

  $params = [
       "Book_ID" => $Book_ID
  ];

  $prepare = $pdo->prepare($sql);
  $prepare->execute($params);
}

  header("Location: /list.php");
?>
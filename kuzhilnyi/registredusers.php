<?php
require_once __DIR__ . "/database/pdo.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Підключення FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Admin Panel</title>
    <style>
      body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background-image: url('/image/DSC_0030.jpg');
        width: 100%;
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
      footer {
        margin-top: auto;
        bottom: 0;
        width: 100%;
      }
      .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000; /* підняти наверх, щоб перекривати інші елементи */
      }
      .section-form {
        padding-top: 56px; /* враховуємо висоту навігаційної панелі */
      }
    </style>
</head>
<body>

<div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Бібліотека коледжу</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Головна</a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Книги
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="create.php">Додати книгу</a></li>
            <li><a class="dropdown-item" href="list.php">Список усіх книг</a></li>
            <li><a class="dropdown-item" href="recent.php">Наші новинки</a></li>
          </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="login.php">Вхід</a>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="registration.php">Реєстрація</a>
    </div>
  </div>
</nav>
</div>

<section class="section-form">
    <div class="card mx-auto" style="width: 70rem; margin-top: 1%">
        <div class="card-body">
            <h2 class="card-title">Користувачі сайту</h2>

<?php 

// Вибірка даних з таблиці
$select = "SELECT * FROM Students";
$result = $pdo->prepare($select);
$result->execute();


// Вивід результатів
echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo "<thead style='background-color: #f2f2f2;'><tr><th style='padding: 8px; border: 1px solid #ddd;'>ID</th><th style='padding: 8px; border: 1px solid #ddd;'>Логін</th><th style='padding: 8px; border: 1px solid #ddd;'>Група</th><th style='padding: 8px; border: 1px solid #ddd;'>Телефон</th><th style='padding: 8px; border: 1px solid #ddd;'>E-mail</th><th style='padding: 8px; border: 1px solid #ddd;'>Адреса</th><th style='padding: 8px; border: 1px solid #ddd;'>Видалити</th><th style='padding: 8px; border: 1px solid #ddd;'>Забанити</th><th style='padding: 8px; border: 1px solid #ddd;'>Редагувати</th></tr></thead>";
echo "<tbody>";

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row["Student_ID"] . "</td>";
    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row["UserLogin"] . "</td>";
    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row["Group_ID"] . "</td>";
    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row["PhoneNumber"] . "</td>";
    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row["Gmail"] . "</td>";
    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row["Address"] . "</td>";
    echo "<td class='text-center' style='padding: 8px; border: 1px solid #ddd;'><a href='usersadministrate.php?action=delete&id=" . $row["Student_ID"] . "'>видалити</a></td>";
    echo "<td class='text-center' style='padding: 8px; border: 1px solid #ddd;'><a href='usersadministrate.php?action=ban&id=" . $row["Student_ID"] . "'>бан</a></td>";
    echo "<td class='text-center' style='padding: 8px; border: 1px solid #ddd;'><a href='edituserform.php?action=edit&id=" . $row["Student_ID"] . "'>змінити</a></td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

?>
</div>
</div>

<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
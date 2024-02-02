<?php
require_once __DIR__ . "/database/pdo.php";
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
    <!-- Підключення FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Last of books</title>
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
    <div class="card mx-auto" style="width: 50rem; margin-top: 1%">
        <div class="card-body">
            <h2 class="card-title">Останні надходження</h2>
            <hr class="my-4">
            <div class="row">
                <?php 
                $createTableQuery = "CREATE TEMPORARY TABLE tmp_table SELECT * FROM Book WHERE Add_Date >= CURDATE() - INTERVAL 3 DAY ORDER BY Book_ID DESC";
                $pdo->exec($createTableQuery);

                // Вибірка даних з тимчасової таблиці
                $selectQuery = "SELECT * FROM tmp_table";
                $result = $pdo->prepare($selectQuery);
                $result->execute();

                // Вивід результатів
                echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
                echo "<thead style='background-color: #f2f2f2;'><tr><th style='padding: 8px; border: 1px solid #ddd;'>ID книги</th><th style='padding: 8px; border: 1px solid #ddd;'>Назва книги</th><th style='padding: 8px; border: 1px solid #ddd;'>Дата додавання</th></tr></thead>";
                echo "<tbody>";
                
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row["Book_ID"] . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row["Book_Name"] . "</td>";
                    echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row["Add_Date"] . "</td>";
                    echo "</tr>"; 
                }
                
                echo "</tbody>";
                echo "</table>";
                ?>
                <hr class="my-4">
                <a href="/create.php" class="btn btn-white">Додати книгу</a>
            </div>
        </div>
    </div>
</section>

<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
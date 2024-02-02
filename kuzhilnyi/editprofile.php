<?php
session_start();

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
    <title>Profile Edit</title>
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
    <?php
    $UserLogin = $_SESSION["user"]["UserLogin"];
    
    $query = $pdo->prepare("SELECT * FROM `Students` WHERE `UserLogin` = :UserLogin");
    
    $query->execute(["UserLogin" => $UserLogin]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if (!isset($user) || empty($user)) {
     echo '<h5 class="card-title">Запис не знайдено</h5>';
    die();
  }
    ?>
  <div class="row">
    <div class="col-6">
     <h2>Змінити дані про студента - <?= $user["UserLogin"] ?></h2>
      <form action="updateuser.php" method="POST">
      <div class="mb-3">
          <input type="hidden" name="UserLogin" class="form-control" id="exampleInputName" value="<?= $user["UserLogin"]?>">  
        </div>  

        <div class="mb-3">
          <input type="hidden" name="Password" class="form-control" id="exampleInputName" value="<?= $user["Password"]?>">  
        </div>  

        <div class="mb-3">
          <input type="hidden" name="Student_ID" class="form-control" id="exampleInputName" value="<?= $user["Student_ID"]?>">  
        </div>  
      
        <div class="mb-3">
          <label for="exampleInputName1" class="form-label">Почта</label>
          <input type="text" name="Gmail" class="form-control" id="exampleInputName" value="<?= $user["Gmail"]?>">  
        </div>

      <div class="mb-3">
          <label for="exampleInputName1" class="form-label">ID групи</label>
          <input type="text" name="Group_ID" class="form-control" id="exampleInputName" value="<?= $user["Group_ID"]?>">  
        </div>

        <div class="mb-3">
          <label for="exampleInputPublication" class="form-label">Номер телефону</label>
          <input type="tel" name="PhoneNumber" class="form-control" id="exampleInputPublication" value="<?= $user["PhoneNumber"]?>">  
        </div>

        <div class="mb-3">
          <label for="exampleInputYear" class="form-label">Адреса</label>
          <input type="text" name="Address" class="form-control" id="exampleInputYear" value="<?= $user["Address"]?>">  
        </div>

  <button type="submit" class="btn btn-dark">Оновити дані</button>
</form>
</div>

<div class="col-6">
 <div class="col-sm-10 mb-3">
         <div>
            <h2>Попередні дані про користувача</h2>
           <div class="card-body">
              <p class="card-text">Логін: <?= $user["UserLogin"]?></p>
              <p class="card-text">Почта: <?= $user["Gmail"]?></p>
              <p class="card-text">ID групи: <?= $user["Group_ID"] ?></p>
              <p class="card-text">Номер телефону: <?= $user["PhoneNumber"] ?></p>
              <p class="card-text">Адреса: <?= $user["Address"] ?></p>
            </div>
        </div>
    </div>
  </form> 
</div> 
</section>


<footer class="text-center bg-body-tertiary">
  <!-- Grid container -->
  <div class="container pt-2">
    <!-- Section: Social media -->
    <section class="mb-2">

    <!-- Site -->
    <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body m-1"
        href="https://vtc.vn.ua/"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Facebook -->
      <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body m-1"
        href="https://www.facebook.com/vtc1964/?locale=uk_UA"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- YouTube -->
      <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body m-1"
        href="https://www.youtube.com/@user-xi8vv4vo1y"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-youtube"></i
      ></a>

      <!-- Telegram -->
      <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body m-1"
        href="https://t.me/vtfcvnua"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-telegram"></i
      ></a>


      <!-- Instagram -->
      <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body m-1"
        href="https://www.instagram.com/vtfc_college/"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-instagram"></i
      ></a>

    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2020 Copyright:
    <a class="text-body" href="https://t.me/my_name_vova">Kuzhilnyi Volodymyr</a>
  </div>
  <!-- Copyright -->
</footer>

<script src="script.js"></script>
</body>
</html>
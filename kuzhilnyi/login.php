<?php
session_start();

if(isset($_SESSION["auth"]) && $_SESSION["auth"] === true){
  header('Location: /profile.php');
}
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
    <title>Login</title>
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
<div class="container">
<div class="card mx-auto" style="width: 30rem; margin-top: 3%">
<div class="card-body">
<h2 class="card-title text-center">Вхід в систему</h2>
<br>
       <form action="userslogin.php" method="POST">
        <div class="mb-3">
           <label for="UserLogin" class="form-label">Ім'я та фамілія</label>
            <input type="text" name="UserLogin" class="form-control" id="UserLogin">
        </div>
        <div class="mb-3">
           <label for="Password" class="form-label">Пароль</label>
           <input type="int" name="Password" class="form-control" id="Passwod" required>
           <a href="#" style="color: #000000; text-align: right; display: block;">Забули пароль?</a>
        </div>

        <br>
            <button type="submit" class="btn btn-dark d-block mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Увійти</button>
        </form>

        <?php
          if(isset($_SESSION['is_error']) && $_SESSION['is_error'] === true){
                  ?>
          <div class="alert alert-danger mt-3" role="alert">
            <?= $_SESSION['error_message'] ?>
          </div>
        <?php  
          }
          unset($_SESSION['is_error']);
          unset($_SESSION['error_message']);
        ?>
</div>
</section>
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
    © 2024 Copyright:
    <a class="text-body" href="https://t.me/my_name_vova">Kuzhilnyi Volodymyr</a>
  </div>
  <!-- Copyright -->
</footer>

<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
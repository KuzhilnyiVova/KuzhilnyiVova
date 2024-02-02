<!DOCTYPE html>
<html lang="uk-UA">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Бібліотека ВТФК</title>
    <!-- Підключення FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
        </li>
      </ul>
    </div>
  </div>
</nav>

<section class="section-form">
<div class="jumbotron" style="margin-left: 3%">
    <br>
    <h1 class="display-4"><b>Привіт, друже!</b></h1>
    <p class="lead"><b>Ти зайшов на сторінку бібліотеки Вінницького технічного фахового коледжу. Тут ти можеш переглянути наявність бажаних книг</b></p>
    <hr class="my-4">
    <p><b>«Людина з гарною книгою в руках ніколи не може бути самотньою» К. Гольдоні</b></p>
    <p class="lead"></p>
</div>

<br>

<div style="margin-left: 3%; margin-right: auto; margin-top: -1%; width: 70%;">
    <h1 class="display-7"><b>Новини:</b></h1>

    <div class="container">
        <div class="row">
            <div class="left-block text-center">
                <div style="background-color: #f2f2f2; padding: 10px;">
                    <img class="media-object" src="\image\2.jpg" style="width: 90%; height: 90%;">
                </div>
            </div>
            <div class="right-block">
                <div style="background-color: #e0e0e0; padding: 10px;">
                    <h4 class="media-heading">#Заходи</h4>
                    У читальному залі відбувся виховний захід до Дня української писемності та мови для студентів групи 1ОД та 1ОБ. Працівники бібілотеки ознайомили студентів з історією свята, походження слов'янської писемності, розповідали про Кирила та Мефодія, Нестора Літописця, їх внески у становлення та розвиток української мови. Студенти дізнались про складний історичний шлях, який пройшла рідна мова, про її силу та невмирущість. Закликали слухачів змінити своє ставлення до мови і розмовляти правильно, гарно, вишукано, вдосконалювати, любити і берегти свою мову. У заході приймали участь студенти 2ЕП Ворон Захар, 2РТ2 Ворон Ростислав, 2ВЕ Антощук Самуїл, 1РТ3 Склярук Володимир, 1ОД Ткачук Дарія, 1ОД Кушпит Олександр, 1ОД Манзюк Анна, 1ОБ Бегус Вікторія.
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="row">
            <div class="left-block text-center">
                <div style="background-color: #f2f2f2; padding: 10px;">
                    <img class="media-object" src="\image\3.jpg" style="width: 90%; height: 90%;">
                </div>
            </div>
            <div class="right-block">
                <div style="background-color: #e0e0e0; padding: 10px;">
                    <h4 class="media-heading">#Заходи</h4>
                    Для групи  1ЕА1 працівники бібліотеки провели огляд книжкової виставки та надали цікаву інформацію про книги,  поради про вдосконалення знань з української мови Студентів  ознайомлено з новими книгами, словниками,  енциклопедями, підручниками,  творами українських класиків, які є у фонді бібліотеки. 
                </div>
            </div>
        </div>
    </div>
</div>
<br>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+CE8nJw8ig9dIxlZ+oqmO/+a/1TK5TkDTC5I0Q4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

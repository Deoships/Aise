<?php
include("../php/db_connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/A.svg">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Aise</title>    
</head>
<body>
    <header>
        <nav>
            <ul>
                <div>
                    <a href="../index/Aise.php">Главная</a>
                    <a href="../index/Aise-katalog.php">Каталог</a>
                    <a href="../index/Aise-kontakt.php">Контакты</a>
                </div>
                <li><a href="Aise.php"><img src="../img/logo-Aise.svg"></a></li>

                 <button class="modal-toggle"><img src="../img/profile.svg"></button>
            </ul>
        </nav>
    </header>


  <div class="modal">
    <div class="modal-overlay modal-toggle"></div>
    <div class="modal-wrapper modal-transition">
      <div class="tabs">
        <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
        <label for="tab-btn-1"><p>АВТОРИЗОВАТЬСЯ</p></label>
        <input type="radio" name="tab-btn" id="tab-btn-2" value="">
        <label for="tab-btn-2"><p>РЕГИСТРАЦИЯ</p></label>

        <div id="content-1">
          <form action="../php/login.php" method="post">
            <img src="../img/logo-Aise.svg" alt="">
            <h2>АВТОРИЗОВАТЬСЯ</h2>
            <hr class="hr-1">
            <input type="text" placeholder="ЛОГИН" name="login" required>
            <input type="password" placeholder="ПАРОЛЬ" name="password" required>
            <div>
                <input type="submit" id="button-pop" >
            </div>
          </form>
        </div>

        <div id="content-2">
          <form action="../php/register.php" method="post"> 
            <img src="../img/logo-Aise.svg" alt="">
            <h2>РЕГИСТРАЦИЯ</h2>
            <hr class="hr-1">
            <input type="text" placeholder="ЛОГИН" name="login" required>
            <input type="email" placeholder="ПОЧТА" name="email" required>
            <input type="password" placeholder="ПАРОЛЬ" name="password" required>
            <input type="password" placeholder="ПОВТОРИТЕ ПАРОЛЬ" name="password2" required>
            <div>
                <input type="submit" id="button-pop" >
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('.modal-toggle').on('click', function(e) {
      e.preventDefault();
      $('.modal').toggleClass('is-visible');
    });
  </script>

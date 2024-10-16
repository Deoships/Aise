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
                    <a href="../index_login/Aise-login.php">Главная</a>
                    <a href="../index_login/Aise-katalog-login.php">Каталог</a>
                    <a href="../index_login/Aise-kontakt-login.php">Контакты</a>
                </div>
                <li><a href="Aise.php"><img src="../img/logo-Aise.svg"></a></li>
                <button class="modal-toggle"><a href="../index_login/Aise-user-login.php"><img src="../img/profile.svg"></a></button>
                <a href="../cookie/visits.php">Визиты</a>
                <form action="../php/logout.php" method="post">
      <button type="submit">Logout</button>
    </form>
            </ul>
        </nav>
    </header>



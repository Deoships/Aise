<?php
$conn = mysqli_connect("localhost", "root", "", "aise");
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение данных из таблицы "product"
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="../js/myCart.js"></script>
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
                <form action="../php/logout.php" method="post">
      <button type="submit">Logout</button>
    </form>
            </ul>
        </nav>
    </header>

    <h1>Каталог</h1>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            <div class="product-card">
                <h2><?php echo $row["name"]; ?></h2>
                <p><?php echo $row["price"]; ?></p>
                <p><?php echo $row["description"]; ?></p>
                <img src="<?php echo $row["img"]; ?>" alt="<?php echo $row["name"]; ?>">
                <button onclick="addToCart(<?php echo $row["id"]; ?>, '<?php echo $row["name"]; ?>', '<?php echo $row["price"]; ?>', '<?php echo $row["description"]; ?>', '<?php echo $row["img"]; ?>')">Добавить</button>
            </div>
            <?php
        }
    } else {
        echo "Домов не найдено";
    }
    $conn->close();
    ?>

    <br>
    <a href="../index_login/Aise-user-login.php">Перейти в профиль</a>

    <script>
        function addToCart(productId, name, price, description, img) {
            // Отправка запроса на добавление товара в корзину
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Обновление содержимого корзины
                        console.log("Дом добавлен в корзину");
                    } else {
                        console.error("Ошибка при добавлении дома в профиль");
                    }
                }
            };
            xhr.open("POST", "../php/add_to_cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("productId=" + productId + "&name=" + encodeURIComponent(name) + "&price=" + encodeURIComponent(price) + "&description=" + encodeURIComponent(description) + "&img=" + encodeURIComponent(img));
        }
    </script>

</body>
    </html>

    
   
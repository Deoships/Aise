<?php
// Подключение к базе данных
$conn = mysqli_connect("localhost", "root", "", "aise");

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Добавление продукта
if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['img'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $img = $_POST['img'];

    $sql = "INSERT INTO Product (name, price, description, img) VALUES ('$name', '$price', '$description', '$img')";

    if ($conn->query($sql) === TRUE) {
        echo "Продукт успешно добавлен.";
    } else {
        echo "Ошибка при добавлении продукта: " . $conn->error;
    }
}

$conn->close();
?>

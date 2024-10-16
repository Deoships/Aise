<?php
// Подключение к базе данных
$conn = mysqli_connect("localhost", "root", "", "aise");

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Удаление продукта
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM Product WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Продукт успешно удален.";
    } else {
        echo "Ошибка при удалении продукта: " . $conn->error;
    }
}

$conn->close();
?>

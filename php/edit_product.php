<?php
$conn = mysqli_connect("localhost", "root", "", "aise");

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Изменение продукта
if (isset($_POST['id']) && isset($_POST['new_name']) && isset($_POST['new_price']) && isset($_POST['new_description']) && isset($_POST['new_img'])) {
    $id = $_POST['id'];
    $newName = $_POST['new_name'];
    $newPrice = $_POST['new_price'];
    $newDescription = $_POST['new_description'];
    $newImg = $_POST['new_img'];

    $sql = "UPDATE Product SET name='$newName', price='$newPrice', description='$newDescription', img='$newImg' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Продукт успешно изменен.";
    } else {
        echo "Ошибка при изменении продукта: " . $conn->error;
    }
}

$conn->close();
?>

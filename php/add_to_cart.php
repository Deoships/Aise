<?php
session_start();

// Проверка, существует ли сессия корзины
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// Получение данных товара
$productId = $_POST["productId"];
$name = $_POST["name"];
$price = $_POST["price"];
$description = $_POST["description"];
$img = $_POST["img"];

// Добавление товара в корзину
$product = array(
    "id" => $productId,
    "name" => $name,
    "price" => $price,
    "description" => $description,
    "img" => $img
);
array_push($_SESSION["cart"], $product);

http_response_code(200);
?>

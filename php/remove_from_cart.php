<?php
session_start();

// Проверка, существует ли сессия корзины
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// Получение идентификатора товара
$productId = $_POST["productId"];

// Удаление товара из корзины
foreach ($_SESSION["cart"] as $key => $product) {
    if ($product["id"] === $productId) {
        unset($_SESSION["cart"][$key]);
        break;
    }
}

http_response_code(200);
?>

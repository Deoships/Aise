<?php
session_start();
include("./db_connect.php");

$login = $_POST['login'];
$password = $_POST['password'];

$query = mysqli_query($db, "SELECT * FROM users WHERE login='{$login}' AND password='{$password}'");
if (mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_assoc($query);
    if ($user['is_admin'] == 1) { // Проверка, является ли пользователь администратором
        $_SESSION['user'] = ['nick' => $login];
        header("Location: ./admin.php"); // Перенаправление на страницу для администратора
        exit(); // Завершение скрипта после перенаправления
    } else {
        $_SESSION['user'] = ['nick' => $login];
        header("Location: ./user.php"); // Перенаправление на страницу для обычных пользователей
        exit(); // Завершение скрипта после перенаправления
    }
} else {
    if (isset($_SESSION['user']['nick'])) {
        echo "Your session is running " . $_SESSION['user']['nick'];
    }
}
?>

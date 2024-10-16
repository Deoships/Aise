<?php
session_start();
include("./db_connect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once '../PHPMailer/PHPMailer-master/src/PHPMailer.php';
require_once '../PHPMailer/PHPMailer-master/src/SMTP.php';


// Функция для генерации случайного кода подтверждения
function generateVerificationCode() {
    return random_int(100000, 999999);
}

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$md5_password = md5($password);
$md5_password = md5($password2);

$query = mysqli_query($db, "SELECT * FROM users WHERE login='{$login}'");
$row = mysqli_fetch_assoc($query);
if ($row['login'] == $login) {
    echo "Данный логин занят";
}
if (mysqli_num_rows($query) !== 0) {
    die();
}
if ($password !== $password2) {
    die("Ошибка: Пароли отличаются");
}

$_SESSION['user'] = ['nick' => $login];

// Генерация и отправка письма с кодом подтверждения
$verificationCode = generateVerificationCode();

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.mail.ru';
$mail->SMTPAuth = true;
$mail->Username = 'aise-elite-estate@mail.ru'; // Замените на вашу электронную почту
$mail->Password = 'iHW8HjC8VJTHLHbfQk9q'; // Замените на ваш пароль
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->CharSet = 'UTF-8'; // Установка кодировки

$mail->setFrom('aise-elite-estate@mail.ru', 'Aise'); // Замените на вашу электронную почту и имя отправителя
$mail->addAddress($email); // Адрес получателя

$mail->Subject = 'Подтверждение почты';
$mail->Body = 'Для завершения регистрации, введите следующий код подтверждения: ' . $verificationCode;

if ($mail->send()) {
    echo 'Письмо с кодом подтверждения отправлено на вашу почту.';
} else {
    echo 'Ошибка при отправке письма: ' . $mail->ErrorInfo;
}

mysqli_query($db, "INSERT INTO `users`(`login`, `email`, `password`, `verification_code`) VALUES ('{$login}','{$email}','{$password}','{$verificationCode}')");

header("Location: ./verification.php");

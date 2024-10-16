<?php
session_start();
include("./db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verificationCode = $_POST['verification_code'];

    // Получение данных пользователя из сессии
    $login = $_SESSION['user']['nick'];

    // Проверка соответствия введенного кода подтверждения
    $query = mysqli_query($db, "SELECT * FROM users WHERE login='{$login}'");
    $row = mysqli_fetch_assoc($query);
    if ($row['verification_code'] == $verificationCode) {
        // Код подтверждения верный
        // Можно выполнить необходимые действия, например, установить флаг подтверждения в базе данных

        // Редирект на страницу успешного подтверждения
        header("Location: ../index/Aise.php");
        exit();
    } else {
        // Код подтверждения неверный
        $error = "Введен неверный код подтверждения. Попробуйте еще раз.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Подтверждение почты</title>
</head>
<body>
    <h1>Подтверждение почты</h1>
    
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="verification_code">Введите код подтверждения:</label>
        <input type="text" id="verification_code" name="verification_code" required>
        <br>
        <input type="submit" value="Подтвердить">
    </form>
</body>
</html>

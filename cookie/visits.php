<?php
session_start();

include "../php/db_connect.php";

if (isset($_SESSION['ID_users'])) {
    $IDuser = $_SESSION['ID_users'];
    if ($IDuser === '') {
        unset($IDuser);
    }
}

$qInfoTrack = "SELECT * FROM users WHERE ID_users='$IDuser'";
addslashes($qInfoTrack);
$resInfoTrack = mysqli_query($db, $qInfoTrack) or die(mysqli_error($db));
$InfoTrack = mysqli_fetch_object($resInfoTrack);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Визиты</title>
</head>

<body>
    <div class="main-content-table">
        <table>
            <caption>Статистика посещений сайта</caption>
            <tr>
                <th>ID</th>
                <th>Имя пользователя</th>
                <th>Дата посещения</th>
                <th>Количество посещений</th>
            </tr>
            <?php
            include("../php/count.php");
            $query_visits = "SELECT * FROM visits, users WHERE visits.user = users.ID_users";
            $res = mysqli_query($db, $query_visits);
            while ($visits = mysqli_fetch_object($res)) {
                echo "
                <tr>
                    <td>" . $visits->id_visit . "</td>
                    <td>" . $visits->login . "</td>
                    <td>" . $visits->date . "</td>
                    <td>" . $visits->count . "</td>
                </tr>";
            }
            ?>
        </table>
    </div>
    <a href="../php/clear.php">Очистить cookies</a>
    <a href="../php/exit.php">Выйти</a>
</body>

</html>
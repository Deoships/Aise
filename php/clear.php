<?php
session_start();
include ("../php/db_connect.php");

if (isset($_SESSION['ID_users'])) {
    $IDuser = $_SESSION['ID_users'];
    if ($IDuser === '') {
        unset($IDuser);
    }
}

if (isset($_COOKIE['id_count'])) {
    setcookie('id_count', $id_count, time() - 3600, "/");
    $query_delete = "UPDATE visits SET count='0' WHERE user = '$IDuser'";
    $res = mysqli_query($db, $query_delete);
    header("location:../cookie/visits.php");
} else {
    echo 'error';
}
?>
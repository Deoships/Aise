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

$q = "SELECT * FROM visits WHERE user ='$IDuser'";
$r = mysqli_query($db, $q);
$rq = mysqli_fetch_array($r);

$date = date("Y-m-d");

if (!isset($_COOKIE['id_count'])) {
    if (isset($rq['count'])) {
        $id_count = $rq['count'];
        $id_count++;
        $query_update = "UPDATE visits SET count='$id_count' WHERE user = '$IDuser'";
        $res2 = mysqli_query($db, $query_update);
    } else {
        $id_count = 1;
        $query = "INSERT INTO visits(user, date, count) VALUES('$IDuser', '$date', '1')";
        $res = mysqli_query($db, $query);
    }
    setcookie('id_count', $id_count, time() + 3600, "/");
} else {
    if (!empty($rq['user'])) {
        $query_visit = "SELECT id_visit FROM visits WHERE date = '$date'";
        $res_visit_today = mysqli_query($db, $query_visit);
        if (mysqli_num_rows($res_visit_today) == 0) {
            $query = "INSERT INTO visits(user, date, count) VALUES('$IDuser', '$date', '1')";
            $res = mysqli_query($db, $query);
        } else {
            $id_count = $_COOKIE['id_count'];
            $id_count++;
            setcookie('id_count', $id_count, time() + 3600, "/");
            $query_update = "UPDATE visits SET count='$id_count' WHERE user='$IDuser'";
            $res2 = mysqli_query($db, $query_update);
        }
    } else {
        $query = "INSERT INTO visits(user, date, count) VALUES('$IDuser', '$date', '1')";
        $res = mysqli_query($db, $query);
    }
}
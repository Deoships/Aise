<?php
session_start();
session_destroy();

if(isset($_COOKIE['id_count'])) {
    setcookie('id_count', '', time()-3600,"/"); 
    header("Location: ../index/Aise.php");
} else {
    echo 'Error: Cookie id_count not found'; 
}
?>
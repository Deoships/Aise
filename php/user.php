

<?php

session_start();
if (isset($_SESSION['user'])) {
    include('../index_login/Aise-user-login.php');
} else {
   echo "вы даун";
}

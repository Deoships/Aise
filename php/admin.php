

<?php

session_start();
if (isset($_SESSION['user'])) {
    include('../index_admin/Aise-user-admin.php');
} else {
   echo "вы даун";
}

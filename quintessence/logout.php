<?php
// Menghapus data sesi dan mengarahkan ke halaman login
session_start();
$user = $_SESSION['login'];
session_destroy();
if ($user == 1){
    header("Location: login.php");
}else{
    header("Location: login_admin.php");
}

exit;

<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username-admin'];
    $password = $_POST['password-admin'];

    $cek_user = mysqli_query($conn," SELECT *FROM t_admin WHERE usn_admin = '$username' AND pass_admin = '$password'");
    $cek_login = mysqli_num_rows($cek_user);

    if ($cek_login > 0) {
        $data = mysqli_fetch_array($cek_user);
        $_SESSION['login'] = 2;
        $_SESSION['id'] = $data['id_admin'];
        $_SESSION['admin'] = 1;
        echo "<script>
            alert('Berhasil Login');
            
            window.location = 'admin_page.php';
        </script>";
    }
    else {
        echo "<script>
        alert('Anda Bukan Admin');
        window.location = 'login_admin.php';
    </script>";
    }
}

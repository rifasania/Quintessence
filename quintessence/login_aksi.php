<?php
include 'function.php';
session_start();



if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek_user = mysqli_query($conn, " SELECT * FROM t_user WHERE usn_user = '$username' AND pass_user = '$password'");
    $cek_login = mysqli_num_rows($cek_user);



    if ($cek_login > 0) {
        $data = mysqli_fetch_array($cek_user);
        $_SESSION['id'] = $data['id_user'];
        $_SESSION['login'] = 1;
        $_SESSION['user'] = 1;
        echo "<script>
            alert('Berhasil Login');
            window.location = 'courses.php';
        </script>";
    } else {
        echo "<script>
        alert('Username dan Password Salah');
        window.location = 'login.php';
    </script>";
    }
}

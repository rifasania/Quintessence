<?php

include 'koneksi.php';

if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    $date1 = strtr($_REQUEST['date'], '/', '-');
    $new_date = date('Y-m-d', strtotime($date1));
    $kelamin = mysqli_real_escape_string($conn, $_POST['j_kelamin']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $waktu_sekarang = new DateTime();
    $umur = $waktu_sekarang->diff(new DateTime($new_date))->y;

    $cek_user = mysqli_query($conn, "SELECT * FROM t_user WHERE usn_user = '$username'");
    $cek_login = mysqli_num_rows($cek_user);


    if ($cek_login == 0) {
        $query1 = mysqli_query($conn, "INSERT INTO t_user VALUES ('', '$username', '$password')");
        $user_baru = mysqli_query($conn, "SELECT * FROM t_user WHERE usn_user = '$username'");
        $data = mysqli_fetch_array($user_baru);
        $id = $data['id_user'];
        $query2 = mysqli_query($conn, "INSERT INTO t_datadiri VALUES ('', '$fullname', '$new_date', '$kelamin', '$alamat', '$umur', '$id')");

        if ($query1 && $query2) {
            echo "<script>
                alert('Sukses');
                window.location = 'login.php';
            </script>";
        } else {
            echo "<script>
                alert('Gagal');
                window.location = 'registrasi.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Username telah terpakai');
            window.location = 'registrasi.php';
        </script>";
    }
}

<?php

include("koneksi.php");

function readAll()
{
    global $conn;

    $query = "SELECT
        t_user.id_user,
        t_datadiri.nama_lengkap,
        t_user.usn_user,
        t_user.pass_user,
        t_datadiri.id_biodata,
        t_datadiri.tanggal_lahir,
        t_datadiri.jenis_kelamin,
        t_datadiri.alamat,
        t_datadiri.usia,
        t_datadiri.id_user,
        t_bmi.id_bmi,
        t_bmi.berat_badan,
        t_bmi.tinggi_badan,
        t_bmi.id_status_bmi,
        t_bmi.id_user,
        t_status_bmi.id_status_bmi,
        t_status_bmi.status_bmi,
        t_tekanan_darah.id_tekanan_darah,
        t_tekanan_darah.golongan_darah,
        t_tekanan_darah.tekanan_darah,
        t_tekanan_darah.id_status_tdarah,
        t_tekanan_darah.id_user,
        t_status_tdarah.id_status_tdarah,
        t_status_tdarah.status_tdarah
        FROM
        t_user
        Inner Join t_datadiri ON t_user.id_user = t_datadiri.id_user
        Inner Join t_bmi ON t_user.id_user = t_bmi.id_user
        Inner Join t_status_bmi ON t_bmi.id_status_bmi = t_status_bmi.id_status_bmi
        Inner Join t_tekanan_darah ON t_user.id_user = t_tekanan_darah.id_user
        Inner Join t_status_tdarah ON t_tekanan_darah.id_status_tdarah = t_status_tdarah.id_status_tdarah
        ";
    $eksekusi = mysqli_query($conn, $query);

    $data = array();

    if (mysqli_num_rows($eksekusi) > 0) {
        while ($row = mysqli_fetch_assoc($eksekusi)) {
            $data[] = $row; // Masukkan data ke dalam array $data
        }
    }

    return $data;
}

function readAllUser()
{
    global $conn;

    $query = "SELECT * FROM t_user";

    
    $eksekusi = mysqli_query($conn, $query);

    return $eksekusi;
}

function readUser($id)
{
    global $conn;

    $query = "SELECT * FROM t_user WHERE t_user.id_user = $id";
    $eksekusi = mysqli_query($conn, $query);

    return $eksekusi;
}

function hapusUser($id)
{
    global $conn;

    $query = "DELETE FROM t_user WHERE id_user = $id";
    $eksekusi = mysqli_query($conn, $query);

    return $eksekusi;
}

function getDataWithHighestUserID()
{
    global $conn;


    $query = "SELECT id_user FROM t_user WHERE id_user = (SELECT MAX(id_user) FROM t_user)";


    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        return $data;
    } else {
        return null;
    }
}

function readAdmin($id)
{
    global $conn;

    $query = "SELECT * FROM t_admin WHERE t_admin.id_admin = $id";
    $eksekusi = mysqli_query($conn, $query);

    return $eksekusi;
}

function readBiodata($id)
{
    global $conn;

    $query = "SELECT * FROM t_datadiri WHERE t_datadiri.id_user = $id";
    $eksekusi = mysqli_query($conn, $query);

    return $eksekusi;
}

function readBiodataUser()
{
    global $conn;

    $query = "SELECT * FROM t_datadiri inner join t_user on t_user.id_user = t_datadiri.id_user";

    
    $eksekusi = mysqli_query($conn, $query);

    return $eksekusi;
}

function updateBiodata($id, $data)
{
    global $conn;

    $nama = $data['nama'];
    $alamat = $data['alamat'];

    $query = "UPDATE t_datadiri SET nama_lengkap = '$nama', alamat = '$alamat' WHERE id_user = $id";


    $result = mysqli_query($conn, $query);


    $isSucceed = mysqli_affected_rows($conn);

    // mengembalikan nilai sukses
    return $isSucceed;
}

function readBMI($id)
{
    global $conn;

    $query = "SELECT * FROM t_bmi WHERE t_bmi.id_user = $id";
    $eksekusi = mysqli_query($conn, $query);

    $cekBMI = mysqli_num_rows($eksekusi);
    if ($cekBMI == 0) {
        $query = "fRT INTO t_bmi VALUES('', NULL, NULL, NULL, '$id')";
        $eksekusi = mysqli_query($conn, $query);
        $query = "SELECT * FROM t_bmi inner join t_status_bmi on t_bmi.id_status_bmi = t_status_bmi.id_status_bmi where t_bmi.id_user = $id";
        $eksekusi = mysqli_query($conn, $query);
        return $eksekusi;
    } else {
        return $eksekusi;
    }
}

function readDataBMI($id)
{
    global $conn;

    $query = "SELECT * FROM t_bmi inner join t_status_bmi on t_bmi.id_status_bmi = t_status_bmi.id_status_bmi WHERE t_bmi.id_user = $id";
    $eksekusi = mysqli_query($conn, $query);

    return $eksekusi;
}

function readStatusBMI($status)
{
    global $conn;

    $query = "SELECT * FROM t_status_bmi WHERE t_status_bmi.id_status_bmi = $status";
    $eksekusi = mysqli_query($conn, $query);

    return $eksekusi;
}

function updateDataBMI($data, $id)
{

    global $conn;
    $tinggiAsli = $data['t-badan'];
    $berat = $data['b-badan'];

    // Konversi tinggi menjadi meter
    $tinggi = $tinggiAsli / 100;

    // Hitung BMI
    $bmi = $berat / ($tinggi * $tinggi);

    if ($bmi < 18.5) {
        $status = 1;
    } else if ($bmi < 24.9) {
        $status = 2;
    } else if ($bmi < 29.9) {
        $status = 3;
    } else {
        $status = 4;
    }


    $query = "UPDATE t_bmi SET berat_badan = '$berat', tinggi_badan = $tinggiAsli, 
              id_status_bmi = $status WHERE id_user = $id";

    $result = mysqli_query($conn, $query);


    $isSucceed = mysqli_affected_rows($conn);

    // mengembalikan nilai sukses
    return array($isSucceed, $status, $bmi);
}

function readBMINotBlank()
{
    global $conn;

    $query = "SELECT * FROM t_bmi WHERE TRIM(tinggi_badan) <> '' AND TRIM(berat_badan) <> '' ";


    $eksekusi = mysqli_query($conn, $query);

    return $eksekusi;
}

function readBMINotBlankUser()
{
    global $conn;

    $query = "SELECT * FROM t_bmi inner join t_user on t_user.id_user = t_bmi.id_user inner join t_status_bmi on t_status_bmi.id_status_bmi = t_bmi.id_status_bmi WHERE TRIM(tinggi_badan) <> '' AND TRIM(berat_badan) <> '' ";
    $eksekusi = mysqli_query($conn, $query);

    return $eksekusi;
}



function readTekananDarah($id)
{
    global $conn;

    $query = "SELECT * FROM t_tekanan_darah inner join t_status_tdarah on t_tekanan_darah.id_status_tdarah = t_status_tdarah.id_status_tdarah WHERE t_tekanan_darah.id_user = $id";
    $eksekusi = mysqli_query($conn, $query);

    if (mysqli_num_rows($eksekusi) > 0) {
        // Data ditemukan, lakukan sesuatu
        return $eksekusi;
    } else {
        // Data tidak ditemukan, lakukan insert data baru

        $checkQuery = "SELECT * FROM t_tekanan_darah WHERE id_user = $id";
        $checkEksekusi = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkEksekusi) == 0) {
            // Data tidak ada, lakukan insert
            $insertQuery = "INSERT INTO t_tekanan_darah VALUES ('', NULL, NULL, NULL, $id)";
            $insertEksekusi = mysqli_query($conn, $insertQuery);
        }

        $query = "SELECT * FROM t_tekanan_darah WHERE t_tekanan_darah.id_user = $id";
        $eksekusi = mysqli_query($conn, $query);
        return $eksekusi;
    }
}

function readTekananDarahNotBlank()
{
    global $conn;

    $query = "SELECT * FROM t_tekanan_darah WHERE TRIM(golongan_darah) <> '' AND TRIM(tekanan_darah) <> '' ";


    $eksekusi = mysqli_query($conn, $query);

    return $eksekusi;
}

function readTekananDarahNotBlankUser()
{
    global $conn;

    $query = "SELECT * FROM t_tekanan_darah inner join t_user on t_user.id_user = t_tekanan_darah.id_user inner join t_status_tdarah on t_status_tdarah.id_status_tdarah = t_tekanan_darah.id_status_tdarah WHERE TRIM(golongan_darah) <> '' AND TRIM(tekanan_darah) <> '' ";
    $eksekusi = mysqli_query($conn, $query);

    return $eksekusi;
}

function cekTekananDarah($id, $data)
{
    global $conn;
    $goldar = $data['goldar'];
    $sistole = $data['sistole'];
    $diastole = $data['diastole'];

    if ($sistole < 90 || $diastole < 60) {
        $status = 1;
        $pesan = "Tekanan darah rendah.";
    } elseif ($sistole >= 90 && $sistole <= 120 && $diastole >= 60 && $diastole <= 80) {
        $status = 2;
        $pesan = "Tekanan darah normal.";
    } elseif (($sistole > 120 && $sistole <= 129) && ($diastole >= 60 && $diastole <= 80)) {
        $status = 3;
        $pesan = "Tekanan darah normal tinggi (prehypertension).";
    } elseif (($sistole >= 130 && $sistole <= 139) || ($diastole >= 80 && $diastole <= 89)) {
        $status = 4;
        $pesan = "Tekanan darah tinggi tahap 1.";
    } elseif ($sistole >= 140 || $diastole >= 90) {
        $status = 5;
        $pesan = "Tekanan darah tinggi tahap 2.";
    }

    $tekananDarah = $sistole . '/' . $diastole;

    $query = "UPDATE t_tekanan_darah SET golongan_darah = '$goldar', tekanan_darah = '$tekananDarah', id_status_tdarah = $status WHERE id_user = $id";
    $result = mysqli_query($conn, $query);

    return $pesan;
}

function cekKesehatanMental($jawaban)
{
    $skor = array_sum($jawaban);

    // Menghitung rata-rata skor
    $rataSkor = $skor / count($jawaban);

    // Mengembalikan hasil
    if ($rataSkor <= 2.5) {
        return "Anda dalam kondisi kesehatan mental yang baik.";
    } elseif ($rataSkor <= 3.5) {
        return "Anda mungkin mengalami beberapa stres atau kecemasan. Pertimbangkan untuk mencari dukungan.";
    } else {
        return "Anda mungkin mengalami masalah kesehatan mental yang serius. Disarankan untuk mencari bantuan profesional.";
    }
}

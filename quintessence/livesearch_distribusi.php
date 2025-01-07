<?php
include "function.php";

// Ambil nilai pencarian dari permintaan GET
$searchText = $_GET['searchText'];

// Lakukan query SQL untuk pencarian
$query = "select t_provinsi.provinsi, t_nakes.jumlah_nakes, t_nakes.jumlah_rs from t_nakes inner join t_provinsi on t_nakes.id_provinsi =t_provinsi.id_provinsi WHERE t_provinsi.provinsi LIKE '%$searchText%' OR t_nakes.jumlah_nakes LIKE '%$searchText%' OR t_nakes.jumlah_rs LIKE '%$searchText%' order by t_nakes.jumlah_nakes desc";
$result = mysqli_query($conn, $query);

// Buat variabel untuk nomor urutan
$no = 1;

// Tampilkan hasil pencarian dalam bentuk tabel
while ($data = mysqli_fetch_array($result)) {
    echo '<tr>
            <th scope="row">' . $no . '</th>
            <td>' . $data['provinsi'] . '</td>
            <td>' . $data['jumlah_nakes'] . '</td>
            <td>' . $data['jumlah_rs'] . '</td>
        </tr>';
    $no++;
}

// Tutup koneksi database
mysqli_close($conn);

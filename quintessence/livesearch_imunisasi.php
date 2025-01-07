<?php
include "function.php";

// Ambil nilai pencarian dari permintaan GET
$searchText = $_GET['searchText'];

// Lakukan query SQL untuk pencarian
$query = "SELECT t_provinsi.id_provinsi, t_provinsi.provinsi, t_imunisasi.persentase_imunisasi, t_imunisasi.jumlah_balita FROM t_imunisasi INNER JOIN t_provinsi ON t_imunisasi.id_provinsi = t_provinsi.id_provinsi WHERE t_provinsi.provinsi LIKE '%$searchText%' OR t_provinsi.id_provinsi LIKE '%$searchText%' OR t_imunisasi.persentase_imunisasi LIKE '%$searchText%' OR t_imunisasi.jumlah_balita LIKE '%$searchText%' ORDER BY CAST(persentase_imunisasi AS UNSIGNED) DESC";
$result = mysqli_query($conn, $query);

// Buat variabel untuk nomor urutan
$no = 1;

// Tampilkan hasil pencarian dalam bentuk tabel
while ($data = mysqli_fetch_array($result)) {
    echo '<tr>
            <th scope="row">' . $no . '</th>
            <td>' . $data['provinsi'] . '</td>
            <td>' . $data['persentase_imunisasi'] . '%</td>
            <td>' . $data['jumlah_balita'] . '</td>
        </tr>';
    $no++;
}

// Tutup koneksi database
mysqli_close($conn);

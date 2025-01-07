<?php
include "function.php";

// Ambil nilai pencarian dari permintaan GET
$searchText = $_GET['searchText'];

// Lakukan query SQL untuk pencarian
$query = "SELECT t_covid.id_provinsi, t_provinsi.provinsi, t_covid.jumlah_covid, t_covid.jumlah_kematian FROM t_covid INNER JOIN t_provinsi ON t_covid.id_provinsi = t_provinsi.id_provinsi WHERE t_provinsi.provinsi LIKE '%$searchText%' or t_provinsi.id_provinsi LIKE '%$searchText%'  or t_covid.jumlah_covid LIKE '%$searchText%' or t_covid.jumlah_kematian LIKE '%$searchText%' ORDER BY t_covid.jumlah_covid DESC";
$result = mysqli_query($conn, $query);

$no = 1;
// Tampilkan hasil pencarian dalam bentuk tabel
while ($data = mysqli_fetch_array($result)) {
    echo '<tr>
            <th scope="row">' . $no++ . '</th>
            <td>' . $data['provinsi'] . '</td>
            <td>' . $data['jumlah_covid'] . '</td>
            <td>' . $data['jumlah_kematian'] . '</td>
        </tr>';
}

// Tutup koneksi database
mysqli_close($conn);

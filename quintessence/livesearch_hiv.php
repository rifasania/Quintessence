<?php
include "function.php";

// Ambil nilai pencarian dari permintaan GET
$searchText = $_GET['searchText'];

// Lakukan query SQL untuk pencarian
$query = "select t_provinsi.provinsi, t_hiv.jumlah_hiv from t_hiv inner join t_provinsi on t_hiv.id_provinsi =t_provinsi.id_provinsi WHERE t_provinsi.provinsi LIKE '%$searchText%' or  t_hiv.jumlah_hiv LIKE '%$searchText%' order by t_hiv.jumlah_hiv desc";
$result = mysqli_query($conn, $query);

$no = 1;
// Tampilkan hasil pencarian dalam bentuk tabel
while ($data = mysqli_fetch_array($result)) {
    echo '<tr>
            <th scope="row">' . $no++ . '</th>
            <td>' . $data['provinsi'] . '</td>
            <td>' . $data['jumlah_hiv'] . '</td>
        </tr>';
        
}

// Tutup koneksi database
mysqli_close($conn);

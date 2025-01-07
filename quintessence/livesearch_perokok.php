<?php
include "function.php";

// Ambil nilai pencarian dari permintaan GET
$searchText = $_GET['searchText'];

// Lakukan query SQL untuk pencarian
$query = "SELECT t_perokok.id_provinsi, t_provinsi.provinsi, t_perokok.persentase_perokok FROM t_perokok INNER JOIN t_provinsi ON t_perokok.id_provinsi = t_provinsi.id_provinsi WHERE t_provinsi.provinsi LIKE '%$searchText%' or t_provinsi.id_provinsi LIKE '%$searchText%'  or t_perokok.persentase_perokok LIKE '%$searchText%' ORDER BY t_perokok.persentase_perokok DESC";
$result = mysqli_query($conn, $query);

$no = 1;
// Tampilkan hasil pencarian dalam bentuk tabel
while ($data = mysqli_fetch_array($result)) {
    echo '<tr>
            <th scope="row">' . $no++ . '</th>
            <td>' . $data['provinsi'] . '</td>
            <td>' . $data['persentase_perokok'] . '%</td>
        </tr>';
        
}

// Tutup koneksi database
mysqli_close($conn);

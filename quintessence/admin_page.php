<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

include_once "function.php";
$id = $_SESSION['id'];
$readAdmin = readAdmin($id);
$admin = mysqli_fetch_array($readAdmin);

$all = readAll();

$user = readAllUser();

$userRegister = getDataWithHighestUserID();

$userActive = mysqli_num_rows(readAllUser());

$userTekananDarah = mysqli_num_rows(readTekananDarahNotBlank());

$userBMI = mysqli_num_rows(readBMINotBlank());

$userBMIData = readBMINotBlankUser();

$userTDData = readTekananDarahNotBlankUser();

$userBiodata = readBiodataUser();


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>

    <link href="img/faviconQ.ico" rel="icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugin/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .welcome-container {
            margin-top: 100px;
            text-align: center;
        }

        .welcome-text {
            font-size: 32px;
            color: #333333;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .welcome-subtext {
            font-size: 18px;
            color: #666666;
            margin-top: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
        }

        .card-title {
            color: #fff;
        }

        .small-box .icon>i {
            font-size: 60px;
            line-height: 60px;
        }

        .small-box .inner {
            padding: 10px;
        }

        .small-box h3 {
            font-size: 30px;
            font-weight: bold;
            margin: 0 0 10px 0;
            white-space: nowrap;
            padding: 0;
            color: #fff;
        }

        .small-box p {
            font-size: 18px;
            color: #fff;
        }

        .small-box-footer {
            background: rgba(0, 0, 0, 0.1);
            color: #fff;
            display: block;
            padding: 3px 0;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
        }

        .small-box-footer:hover {
            background: rgba(0, 0, 0, 0.15);
        }

        .table thead th {
            text-align: center;
            vertical-align: middle;
        }

        .table tbody td {
            text-align: center;
            vertical-align: middle;
        }

        .modal-custom {
            max-width: 600px;
            margin: 0 auto;
        }

        .modal-custom-1 {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div class="welcome-container">
        <h1 class="welcome-text">Welcome back, <?= $admin['usn_admin'] ?></h1>
        <p class="welcome-subtext">Thank you for your continued support</p>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center;">Data User Quintessence</h3>
                    <div class="col-md-12 text-right">
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $userRegister['id_user'] ?></h3>
                                    <p>Registered Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $userActive; ?></h3>
                                    <p>Active Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-check"></i>
                                </div>
                                <a href="" class="small-box-footer" data-toggle="modal" data-target="#myModalBio">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $userBMI; ?></h3>
                                    <p>Users with BMI Data</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-weight"></i>
                                </div>
                                <a href="" class="small-box-footer" data-toggle="modal" data-target="#myModalBMI">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $userTekananDarah; ?></h3>
                                    <p>Users with Blood Pressure Data</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-heartbeat"></i>
                                </div>
                                <a href="" class="small-box-footer" data-toggle="modal" data-target="#myModalTD">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ./card-header -->
    <div class="card-body">
        <div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center text-wrap ">#</th>
                        <th class="text-wrap text-center">Id User</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1;
                    foreach ($user as $b) : ?>
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td><?= $nomor++ ?></td>
                            <td><?= $b['id_user'] ?></td>
                            <td><?= $b['usn_user'] ?></td>
                            <td>
                                <a href="?kode=<?= $b['id_user'] ?>" onClick="return confirm('Yakin ingin menghapus data?')">
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </a>
                            </td>
                        </tr>
                        <tr class="expandable-body">
                            <td colspan="5">
                                <!-- Card Start -->
                                <div class="container py-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <div class="card border-primary">
                                                <div class="card-body">
                                                    <?php
                                                    $biodata = readBiodata($b['id_user']);
                                                    $b = mysqli_fetch_array($biodata);

                                                    if ($b['jenis_kelamin'] == 'P') {
                                                        $b['jenis_kelamin'] = "Perempuan";
                                                    } else {
                                                        $b['jenis_kelamin'] = "Laki-Laki";
                                                    }
                                                    ?>
                                                    <h5 class="card-title text-primary" style="text-align: center;">Data Diri</h5>
                                                    <br><br>
                                                    <p class="card-text"><strong>Nama Lengkap:</strong> <?= $b['nama_lengkap'] ?></p>
                                                    <p class="card-text"><strong>Tanggal Lahir:</strong> <?= $b['tanggal_lahir'] ?></p>
                                                    <p class="card-text"><strong>Jenis Kelamin:</strong> <?= $b['jenis_kelamin'] ?></p>
                                                    <p class="card-text"><strong>Alamat:</strong> <?= $b['alamat'] ?></p>
                                                    <p class="card-text"><strong>Usia:</strong> <?= $b['usia'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card border-success">
                                                <div class="card-body">
                                                    <?php
                                                    $readBMI = readDataBMI($b['id_user']);
                                                    $bmi = mysqli_fetch_array($readBMI);

                                                    if (isset($bmi['tinggi_badan'])) {
                                                        // Lakukan sesuatu dengan $bmi['tinggi_badan']
                                                        $tinggi = $bmi['tinggi_badan'];
                                                    } else {
                                                        // Jika $bmi['tinggi_badan'] tidak ada, berikan nilai default
                                                        $tinggi = ''; 
                                                    }
                                                    if (isset($bmi['berat_badan'])) {
                                                        // Lakukan sesuatu dengan $bmi['tinggi_badan']
                                                        $berat = $bmi['berat_badan'];
                                                    } else {
                                                        // Jika $bmi['tinggi_badan'] tidak ada, berikan nilai default
                                                        $berat = '';
                                                    }
                                                    if (isset($bmi['status_bmi'])) {
                                                        // Lakukan sesuatu dengan $bmi['tinggi_badan']
                                                        $status = $bmi['status_bmi'];
                                                    } else {
                                                        // Jika $bmi['tinggi_badan'] tidak ada, berikan nilai default
                                                        $status = '';
                                                    }
                                                    ?>
                                                    <h5 class="card-title text-success text-center">Data BMI</h5>
                                                    <br><br>
                                                    <p class="card-text"><strong>Tinggi Badan:</strong> <?= $tinggi ?></p>
                                                    <p class="card-text"><strong>Berat Badan:</strong> <?= $berat ?></p>
                                                    <p class="card-text"><strong>Status BMI:</strong> <?= $status ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card border-danger">
                                                <div class="card-body">
                                                    <?php
                                                    $readTekananDarah = readTekananDarah($b['id_user']);
                                                    $c = mysqli_fetch_array($readTekananDarah);

                                                    if (isset($c['status_tdarah'])) {
                                                        // Lakukan sesuatu dengan $bmi['tinggi_badan']
                                                        $tdarah = $c['status_tdarah'];
                                                    } else {
                                                        // Jika $bmi['tinggi_badan'] tidak ada, berikan nilai default
                                                        $tdarah = '';
                                                    }
                                                    ?>
                                                    <h5 class="card-title text-danger text-center">Data Hasil Cek Tekanan Darah</h5>
                                                    <br><br>
                                                    <p class="card-text"><strong>Golongan Darah:</strong> <?= $c['golongan_darah'] ?></p>
                                                    <p class="card-text"><strong>Tekanan Darah:</strong> <?= $c['tekanan_darah'] ?></p>
                                                    <p class="card-text"><strong>Hasil Pengecekan Tekanan Darah Terakhir:</strong> <?= $tdarah ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card End -->
                            </td>
                        </tr>

                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->

    <!-- Modal -->
    <div class="modal fade" id="myModalBio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-custom-1 modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Users Bio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="overflow-y: auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Usia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($userBiodata as $z) :
                                if ($z['jenis_kelamin'] == 'P') {
                                    $z['jenis_kelamin'] = "Perempuan";
                                } else {
                                    $z['jenis_kelamin'] = "Laki-Laki";
                                }
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $z['usn_user'] ?></td>
                                    <td><?= $z['nama_lengkap'] ?></td>
                                    <td><?= $z['tanggal_lahir'] ?></td>
                                    <td><?= $z['jenis_kelamin'] ?></td>
                                    <td><?= $z['alamat'] ?></td>
                                    <td><?= $z['usia'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModalBMI" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-custom modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Users with BMI Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="overflow-y: auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Tinggi Badan</th>
                                <th>Berat Badan</th>
                                <th>Status BMI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($userBMIData as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a['usn_user'] ?></td>
                                    <td><?= $a['tinggi_badan'] ?></td>
                                    <td><?= $a['berat_badan'] ?></td>
                                    <td><?= $a['status_bmi'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModalTD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-custom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Users with Blood Pressure Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="overflow-y: auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Golongan Darah</th>
                                <th>Tekanan Darah</th>
                                <th>Status Tekanan Darah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($userTDData as $b) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $b['usn_user'] ?></td>
                                    <td><?= $b['golongan_darah'] ?></td>
                                    <td><?= $b['tekanan_darah'] ?></td>
                                    <td><?= $b['status_tdarah'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php
    if (isset($_GET['kode'])) {
        hapusUser($_GET['kode']);
        echo "<script>
                alert('Data Berhasil Dihapus');
                window.location = 'admin_page.php';
            </script>";
    }

    ?>


    <!-- jQuery -->
    <script src="plugin/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Skrip untuk Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
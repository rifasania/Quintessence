<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: courses.php");
    exit;
}

$id = $_SESSION['id'];

include_once 'function.php';

$readBiodata = readBiodata($id);
$biodata = mysqli_fetch_array($readBiodata);

$readTD = readTekananDarah($id);
$td = mysqli_fetch_array($readTD);





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Cek Tekanan Darah Quintessence</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/faviconQ.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0" id="home">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-success"><i class="fa fa-stethoscope me-3"></i>Quintessence</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="login.php" class="nav-item nav-link active">Medical Check-up</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Data Provinsi</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="data-perokok.php" class="dropdown-item">Perokok aktif</a>
                        <a href="data-covid.php" class="dropdown-item">Covid-19</a>
                        <a href="data-imunisasi.php" class="dropdown-item">Imunisasi</a>
                        <a href="data-distribusi.php" class="dropdown-item">Distribusi Tenaga Kerja</a>
                        <a href="data-hiv.php" class="dropdown-item">HIV</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="logout.php" class="btn btn-success py-4 px-lg-5 d-none d-lg-block">Logout<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav> <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header-courses">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <a href="courses.php">
                        <h1 class="display-3 text-white animated slideInDown">
                            Cek Tekanan Darah
                        </h1>
                    </a>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="cek_badan_ideal.php">Cek Badan Ideal</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-white" href="courses.php">User Page</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-white" href="cek_kesehatan_mental.php">Cek Kesehatan Mental</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> <!-- Header End -->

    <!-- Check-up start -->

    <form action="" method="post">
        <div class="m-lg-5">
            <div class="mb-3">
                <label for="Nama" class="form-label">Nama</label>
                <input class="form-control" type="text" id="Nama" placeholder="Masukan Nama Lengkap" name="nama" value="<?= $biodata['nama_lengkap'] ?>" disabled />
            </div>
            <label for="" class="col-md-6 mb-2"> Jenis Kelamin</label><br>
            <select class="select" name="j_kelamin">
                <option value="L" <?php echo ($biodata['jenis_kelamin'] == "L") ? 'selected' : ''; ?> disabled>Laki-Laki </option>
                <option value="P" <?php echo ($biodata['jenis_kelamin'] == "P") ? 'selected' : ''; ?> disabled>Perempuan</option>
            </select>
            <br>
            <br>

            <div class="mb-3">
                <label for="Nama" class="form-label">Golongan Darah</label>
                <input class="form-control" type="text" id="Golongan Darah" placeholder="Masukan Golongan Darah : Contoh O" name="goldar" value="<?= $td['golongan_darah'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="T-badan" class="form-label">Sistol</label>
                <input class="form-control" type="text" id="T-badan" placeholder="Contoh: 120" name="sistole" required />
            </div>
            <div class="mb-1">
                <label for="B-badan" class="form-label">Diastol</label>
                <input class="form-control form-control-sm" id="B-badan" type="text" name="diastole" placeholder="Contoh: 80" required />
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
        </div>
    </form>

    <!-- Check-up End -->

    <?php
    if (isset($_POST['submit'])) {
        $status = cekTekananDarah($id, $_POST);
        echo "<script>
        alert('$status');
        document.location.href = 'courses.php';
        </script>";
    }
    ?>

    <!-- Footer Start -->
    <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Quintessence</small>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    ><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
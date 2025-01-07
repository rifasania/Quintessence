<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$id = $_SESSION['id'];

include_once 'function.php';

$readBiodata = readBiodata($id);
$biodata = mysqli_fetch_array($readBiodata);

if ($biodata['jenis_kelamin'] == 'P') {
    $biodata['jenis_kelamin'] = "Perempuan";
} else {
    $biodata['jenis_kelamin'] = "Laki-Laki";
}

$readBMI = readDataBMI($id);
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

$readTekananDarah = readTekananDarah($id);
$td = mysqli_fetch_array($readTekananDarah);

if (isset($td['status_tdarah'])) {
    // Lakukan sesuatu dengan $bmi['tinggi_badan']
    $tdarah = $td['status_tdarah'];
} else {
    // Jika $bmi['tinggi_badan'] tidak ada, berikan nilai default
    $tdarah = '';
}


if (isset($_GET['edit'])) {
    echo "
        <script>
            document.location.href = 'editBiodata.php';
        </script>
    ";
}



?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <title>Check Up</title>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        .logout-btn {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
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
                <a href="courses.php" class="nav-item nav-link active">Medical Check-up</a>
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
    </nav>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header-courses">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <a href="courses.php">
                        <h1 class="display-3 text-white animated slideInDown">
                            Medical Check-up
                        </h1>
                    </a>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="cek_badan_ideal.php">Cek Badan Ideal</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-white" href="cek_kesehatan_mental.php">Cek Kesehatan Mental</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-white" href="cek_tekanan_darah.php">Cek Tekanan Darah</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Check-up start -->
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="row g-5">
                <div data-wow-delay="0.3s">
                    <div class="about-container">
                        <h1 class="mb-4">Welcome to Quintessence, <?= $biodata['nama_lengkap'] ?></h1>
                        <h6 style="color: green;">About Us</h6>
                        <p class="mb-1" style="text-align: justify;">Ensuring a healthy life and promoting well-being for everyone at all ages.</p>
                        <p class="mb-2" style="text-align: justify;">Reducing the prevalence of easily transmissible diseases within the community &amp; increasing awareness about the importance of a healthy lifestyle.</p>
                        <p class="mb-4" style="text-align: justify;">On This Medical Check, you will find three main features that we offer:<br><br>
                            <strong>Cek Kesehatan Mental:</strong> We provide tools that allow you to assess your mental health independently. You can participate in tests and quizzes designed by experts to help you understand your mental health condition and provide relevant advice.<br><br>
                            <strong>Cek BMI (Body Mass Index):</strong> Using our user-friendly BMI calculator, you can determine your body mass index. This feature helps you understand if your weight falls within a healthy range or if adjustments in diet and physical activity are needed.<br><br>
                            <strong>Cek Tekanan Darah (Blood Pressure Check):</strong> You can measure your blood pressure with the help of the provided device. This feature helps you monitor your blood pressure regularly and provides important insights into your heart health and circulation.
                        </p>
                        <div class="row gy-2 gx-4 mb-4">
                            <!-- <a class="btn btn-success py-3 px-5 mt-2" href="about.html">Read More</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Check-up End -->


    <!-- Card Start -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Data Diri</h5>
                        <p class="card-text"><strong>Nama Lengkap:</strong> <?= $biodata['nama_lengkap'] ?></p>
                        <p class="card-text"><strong>Tanggal Lahir:</strong> <?= $biodata['tanggal_lahir'] ?></p>
                        <p class="card-text"><strong>Jenis Kelamin:</strong> <?= $biodata['jenis_kelamin'] ?></p>
                        <p class="card-text"><strong>Alamat:</strong> <?= $biodata['alamat'] ?></p>
                        <p class="card-text"><strong>Usia:</strong> <?= $biodata['usia'] ?></p>
                        <a href="?edit"><button type="buttonn" name="edit" class="btn btn-primary">Ubah Data</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-success">
                    <div class="card-body">
                        <h5 class="card-title text-success">Data BMI</h5>
                        <p class="card-text"><strong>Tinggi Badan:</strong> <?= $tinggi ?></p>
                        <p class="card-text"><strong>Berat Badan:</strong> <?= $berat ?></p>
                        <p class="card-text"><strong>Status BMI:</strong> <?= $status ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-danger">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Data Hasil Cek Tekanan Darah</h5>
                        <p class="card-text"><strong>Golongan Darah:</strong> <?= $td['golongan_darah'] ?></p>
                        <p class="card-text"><strong>Tekanan Darah:</strong> <?= $td['tekanan_darah'] ?></p>
                        <p class="card-text"><strong>Hasil Pengecekan Tekanan Darah Terakhir:</strong> <?= $tdarah ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card End -->




    <!-- link check-up start -->

    <div class="card-group">
        <div class="card wow animate__animated animate__fadeInUp m-2" data-wow-delay="0.3s">
            <a href="cek_badan_ideal.php">
                <img src="img/ideal.jpg" class="card-img-top" alt="badan-ideal" height="250">
                <div class="card-body">
                    <h5 class="card-title">Cek Badan Ideal</h5>
                    <p class="card-text">"Find out if your body weight is ideal by clicking here!"</p>
                </div>
            </a>
        </div>
        <div class="card wow animate__animated animate__fadeInUp m-2" data-wow-delay="0.5s">
            <a href="cek_kesehatan_mental.php">
                <img src="img/emotion.jpg" class="card-img-top" alt="badan-ideal" height="250">
                <div class="card-body">
                    <h5 class="card-title">Cek Kesehatan Mental</h5>
                    <p class="card-text">"Take care of your mental health by clicking here to perform a check-up and get useful information!"</p>
                </div>
            </a>
        </div>
        <div class="card wow animate__animated animate__fadeInUp m-2" data-wow-delay="0.7s">
            <a href="cek_tekanan_darah.php">
                <img src="img/tekanan-darah.jpg" class="card-img-top" alt="badan-ideal" height="250">
                <div class="card-body">
                    <h5 class="card-title">Cek Tekanan Darah</h5>
                    <p class="card-text">"Ensure your blood pressure is in optimal condition by performing a blood pressure check. Click here to learn more and maintain your health!"</p>
                </div>
            </a>
        </div>
    </div>

    <!-- link check-up end -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">



        <!-- Footer Start -->

        <!-- Footer End -->
        <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
            <div class="container text-center">
                <small>Copyright &copy; Quintessence</small>
            </div>
        </footer>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

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
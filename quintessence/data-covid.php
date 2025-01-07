<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Data Covid Quintessence</title>
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


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
                <a href="courses.php" class="nav-item nav-link">Medical Check-up</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Data Provinsi</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="data-perokok.php" class="dropdown-item">Perokok aktif</a>
                        <a href="data-covid.php" class="dropdown-item active">Covid-19</a>
                        <a href="data-imunisasi.php" class="dropdown-item">Imunisasi</a>
                        <a href="data-distribusi.php" class="dropdown-item">Distribusi Tenaga Kerja</a>
                        <a href="data-hiv.php" class="dropdown-item">HIV</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="login_admin.php" class="btn btn-success py-4 px-lg-5 d-none d-lg-block">Admin Page<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header-covid">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <a href="">
                        <h1 class="display-3 text-white animated slideInDown">
                            Data Pengidap Penyakit COVID Tiap Provinsi
                        </h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- data start -->

    <!-- Main Search -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Search</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="">
                        <div class="input-group">
                            <input type="search" id="searchInput" class="form-control form-control-lg" placeholder="Type your keywords here">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </div>
    <br>
    <!-- End Search -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>NO</th>
                    <th>Provinsi</th>
                    <th>Jumlah Kasus</th>
                    <th>Angka Kematian</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $query = mysqli_query($conn, "SELECT t_provinsi.provinsi, t_covid.jumlah_covid, t_covid.jumlah_kematian FROM t_covid INNER JOIN t_provinsi ON t_covid.id_provinsi = t_provinsi.id_provinsi ORDER BY jumlah_covid DESC");
                $no = 1;
                while ($data = mysqli_fetch_array($query)) {
                    echo '<tr>
                <td>' . $no . '</td>
                <td>' . $data['provinsi'] . '</td>
                <td>' . $data['jumlah_covid'] . '</td>
                <td>' . $data['jumlah_kematian'] . '</td>
            </tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- data end -->


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
    <script>
        $(document).ready(function() {
            // Menggunakan event keyup untuk memantau setiap kali pengguna mengetik pada input pencarian
            $('#searchInput').keyup(function() {
                // Mendapatkan nilai input pencarian
                var searchText = $(this).val().toLowerCase();

                // Kirim permintaan AJAX ke server
                $.ajax({
                    url: 'livesearch_covid.php',
                    type: 'GET',
                    data: {
                        searchText: searchText
                    },
                    beforeSend: function() {
                        // Tampilkan spinner atau indikator loading
                        $('#spinner').addClass('show');
                    },
                    success: function(response) {
                        // Sembunyikan spinner atau indikator loading
                        $('#spinner').removeClass('show');

                        // Perbarui hasil pencarian di dalam tabel
                        $('tbody').html(response);
                    }
                });
            });
        });
    </script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
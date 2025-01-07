<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: courses.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="img/faviconQ.ico" rel="icon">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-gray navbar-light shadow sticky-top p-0" id="home">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-success"><i class="fa fa-stethoscope me-3"></i>Quintessence</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>


        </div>
    </nav>
    <!-- Navbar End -->
    <div class="wrapper">
        <div class="logo">
            <img src="img/logo.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Quintessence
        </div>
        <form class="p-3 mt-3" action="login_aksi.php" method="post">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="userName" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button class="btn mt-3" type="submit" value="login" name="login">Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="registrasi.php">Belum Punya Akun? Sign up</a>
        </div>
    </div>
</body>

</html>
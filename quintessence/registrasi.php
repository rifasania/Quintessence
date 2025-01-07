<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="img/faviconQ.ico" rel="icon">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- <form action="registrasi.php"> -->
    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Buat Akun</h3>

                            <form class="px-md-2" action="registrasiAksi.php" method="post">

                                <div class="form-outline mb-2">
                                    <label for="fullname">Nama Lengkap</label>
                                    <input type="text" id="fullname" name="fullname" class="form-control" required>

                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" id="username" class="form-control" name="username" required />
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-0 mt-1">

                                        <div class="form-outline datepicker mb-2">
                                            <label for="date" class="form-label">Select a date</label>
                                            <input type="date" class="form-control" id="date" name="date" required />

                                        </div>
                                        <label for="" class="col-md-6 mb-2"> Jenis Kelamin</label><br>
                                        <select class="select" name="j_kelamin" required>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-outline mb-2">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control" required>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="password1">Password</label>
                                        <div class="form-outline">
                                            <input type="password" id="password1" class="form-control" name="password1" required />
                                        </div>

                                    </div>
                                </div>

                                <div class="row mb-4 pb-2 pb-md-0 mb-md-5">
                                    <div class="col-md-6">
                                        <label class="form-label" for="password2">Konfirmasi Password</label>
                                        <div class="form-outline">
                                            <input type="password" id="password2" class="form-control" name="password2" required />
                                        </div>

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-lg mb-1" name="submit" value="submit">Submit</button>
                                <a href="login.php" class="btn btn-danger btn-lg mb-1">Kembali</a>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- </form> -->
    <script>
        var today = new Date();
        var minDate = new Date(today.getFullYear() - 10, today.getMonth(), today.getDate()).toISOString().split("T")[0];
        document.getElementById("date").setAttribute("max", minDate);
    </script>
</body>

</html>
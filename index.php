<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="assets/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body style="background-color:#eaeaea;">
    <div class="container-fluid " style="margin-top:70px">
        <div class="">
            <div class="brand text-center mb-3">
                <img src="assets/img/logo.png" alt="logo" style="width: 100px; height: 100px;">
                <h3 style="font-size: 20px; font-weight: bold;" class="mt-4">SISTEM INFORMASI AKADEMIK</h3>
                <h3 style="font-size: 18px; ">SD Negeri Madusari 1</h3>
            </div>
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12  rounded p-3 bg-light mt-2">
                    <div class="text-center mb-0">
                        <h3 class="text-primary mt-2">Login</h3>
                    </div>
                    <form action="login.php" method="POST">
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="password">
                            </div>
                            <br>
                            <button class="btn btn-primary text-center col-sm-12" name="submit" type="submit">
                                Login
                            </button>
                            <center>
                                <p style="margin-top: 20px; font-size:15px; margin-bottom: -30px;">Copyright © SD Negeri Madusari 1, 2022</p>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="main/assets/sweetalert/dist/sweetalert.min.js"></script>

</html>
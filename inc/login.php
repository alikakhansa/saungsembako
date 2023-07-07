<?php
@session_start();
include "koneksi.php";

if (@$_SESSION['LEVEL']) {
    if(@$_SESSION['LEVEL'] == "PEMILIK") {
        header("location:../pemilik/index.php");
    } elseif (@$_SESSION['LEVEL'] == "KASIR") {
        header("location:../kasir/index.php");
    }
}

if(isset($_POST['masuk'])) {
    $username = $_POST['USERNAME'];
    $password = $_POST['PASSWORD'];
    
    // Lakukan validasi dan proses login di sini
    
    // Set session dan redirect ke halaman yang sesuai
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mortezaom/google-sans-cdn@master/fonts.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="icon" href="../assets/images/icon.png">
</head>
<body>
    <div class="container-login">
        <div class="sidebar"></div>
        <div class="login-container">
            <form class="login-form" action="" method="POST">
                <img src="../assets/images/logosaung.png" alt="Logo" height="50px" width="200px;" style="margin-left: 50px; margin-bottom: 30px;">
                <?php
                if (isset($_POST['masuk'])) {
                    include 'cek_login.php';
                }
                ?>
                <div class="form-group">
                    <label for="USERNAME">Username</label>
                    <input type="text" id="USERNAME" name="USERNAME" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="PASSWORD">Password</label>
                    <input type="password" id="PASSWORD" name="PASSWORD" placeholder="**********">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="masuk" value="Login" style="width: 110%">Login</button>
                </div>
                <div>
                    <!-- Pesan error atau notifikasi bisa ditampilkan di sini -->
                </div>
                <span class="form-redirect">Belum punya akun? Daftar <a href="#">di sini</a></span>
            </form>
        </div>
    </div>
</body>
</html>

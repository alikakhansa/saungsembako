<?php
@session_start();
include('koneksi.php');
$USER = addslashes($_POST['USERNAME']);
$PASS = addslashes($_POST['PASSWORD']);
$QUERY = mysqli_query($koneksi, "SELECT * FROM `users` WHERE `USERNAME` = '$USER' AND `PASSWORD` ='$PASS'");

$HASIL = mysqli_num_rows($QUERY);
$DATA = mysqli_fetch_array($QUERY);
if ($HASIL == 1) {
    $_SESSION['USERNAME'] = $DATA['USERNAME'];
    $_SESSION['LEVEL'] = $DATA['LEVEL'];
    $_SESSION['PEMILIK'];
    if ($DATA['LEVEL'] == "KASIR") {
        header("location:../kasir/index.php");
    } else if ($DATA['LEVEL'] == "PEMILIK") {
        header("location:../pemilik/index.php");
    }
    echo "<div class='alert alert-success'>
                <center>
                    <strong>LOGIN BERHASIL !</strong>
                    <br>
                    Halaman Akan Redirect Otomatis
                </center>
            </div>
            <meta http-equiv='refresh' content='2'>";
} else {
    echo "<div class='alert alert-danger'>
                <center>
                    <strong>LOGIN GAGAL</strong>
                    <br>
                    Periksa Username dan Password !
                </center>
            </div>
            <meta http-equiv='refresh' content='2'>";
}
?>

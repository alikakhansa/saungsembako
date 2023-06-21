<?php
if (isset($_POST['submit'])) {
    ob_start();
    include '../../inc/koneksi.php';

    $USERNAME = $_POST['USERNAME'];
    $EMAIL = $_POST['EMAIL'];
    $PASSWORD = $_POST['PASSWORD'];
    $LEVEL = $_POST['LEVEL'];

    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE USERNAME = '$USERNAME'")
        or die(mysqli_error($koneksi));

    if (mysqli_num_rows($cek) == 0) {
        $sql = mysqli_query($koneksi, "INSERT INTO users(USERNAME, EMAIL, PASSWORD, LEVEL) VALUES('$USERNAME', '$EMAIL','$PASSWORD', '$LEVEL')")
            or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menambahkan data."); document.location="../../pemilik/index.php?page=user";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Gagal, NIS sudah terdaftar.</div>';
    }
}
?>

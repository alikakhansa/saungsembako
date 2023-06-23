<?php
include '../inc/koneksi.php';

$satu = mysqli_real_escape_string($koneksi, $_POST['USERNAME']);
$dua = mysqli_real_escape_string($koneksi, $_POST['EMAIL']);
$tiga = mysqli_real_escape_string($koneksi, $_POST['PASSWORD']);
$empat = mysqli_real_escape_string($koneksi, $_POST['LEVEL']);

if ($satu == "" || $dua == "" || $tiga == "" || $empat == "") {
   // Menampilkan pesan jika USERNAME, EMAIL, PASSWORD, atau LEVEL kosong
   echo '<div class="alert alert-warning">Data tidak boleh kosong.</div>';
} else {
   $UPDATE1 = mysqli_query($koneksi, "UPDATE users SET EMAIL='$dua', PASSWORD='$tiga', LEVEL='$empat' WHERE USERNAME='$ID'") or die(mysqli_error($koneksi));

   if ($UPDATE1) {
       echo '<script>alert("Berhasil mengubah data."); document.location="index.php?page=user";</script>';
   } else {
       echo '<div class="alert alert-warning">Gagal melakukan proses ubah data.</div>';
   }
}
?>

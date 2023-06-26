<?php
include '../inc/koneksi.php';

$ID = mysqli_real_escape_string($koneksi, $_POST['ID']);
$USERNAME = mysqli_real_escape_string($koneksi, $_POST['USERNAME']);
$EMAIL = mysqli_real_escape_string($koneksi, $_POST['EMAIL']);
$PASSWORD = mysqli_real_escape_string($koneksi, $_POST['PASSWORD']);
$LEVEL = mysqli_real_escape_string($koneksi, $_POST['LEVEL']);

if ($ID == "" || $USERNAME == "" || $EMAIL == "" || $PASSWORD == "" || $LEVEL == "") {
   // Menampilkan pesan jika USERNAME, EMAIL, PASSWORD, atau LEVEL kosong
   echo '<div class="alert alert-warning">Data tidak boleh kosong.</div>';
} else {
   $UPDATE = mysqli_query($koneksi, "UPDATE users SET EMAIL='$EMAIL', PASSWORD='$PASSWORD', LEVEL='$LEVEL', USERNAME='$USERNAME' WHERE USERNAME='$ID'") or die(mysqli_error($koneksi));

   if ($UPDATE) {
       echo '<script>alert("Berhasil mengubah data."); document.location="index.php?page=user";</script>';
   } else {
       echo '<div class="alert alert-warning">Gagal melakukan proses ubah data.</div>';
   }
}
?>

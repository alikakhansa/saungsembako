<?php
   ob_start();
   include '../../inc/koneksi.php';

   $KETERANGAN = $_POST['KETERANGAN'];

   if ($KETERANGAN != "") {
      $QUERY1 = mysqli_query($koneksi, "INSERT INTO jenis_barang SET KETERANGAN='$KETERANGAN';")
               or die('Gagal Memasukan Data Baru'.mysqli_error($koneksi));
   }

   if ($QUERY1) {
      echo '<script>alert("Berhasil menambahkan data."); document.location="../../pemilik/index.php?page=jenis_barang";</script>';
   } else {
      echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
   }
?>

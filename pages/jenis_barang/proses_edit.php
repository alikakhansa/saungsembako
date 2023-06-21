<?php
   include '../inc/koneksi.php';
   
   $satu = mysqli_real_escape_string($koneksi, $_POST['ID_JENIS']);
   $dua = mysqli_real_escape_string($koneksi, $_POST['KETERANGAN']);
   
   if ($satu == "" || $dua == "") {
       // Menampilkan pesan jika ID_JENIS atau KETERANGAN kosong
       echo '<div class="alert alert-warning">ID_JENIS atau KETERANGAN tidak boleh kosong.</div>';
   } else {
       $UPDATE1 = mysqli_query($koneksi, "UPDATE jenis_barang SET KETERANGAN='$dua' WHERE ID_JENIS='$satu'")
           or die ("Gagal: " . mysqli_error($koneksi));
   
       if ($UPDATE1) {
           echo '<script>alert("Berhasil mengubah data."); document.location="index.php?page=jenis_barang";</script>';
       } else {
           echo '<div class="alert alert-warning">Gagal melakukan proses ubah data.</div>';
       }
   }
   ?>
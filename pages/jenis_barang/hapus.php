<?php 
   ob_start();
   include '../../inc/koneksi.php';
   
   $del = mysqli_query($koneksi,"DELETE FROM jenis_barang WHERE ID_JENIS = '$_GET[ID_JENIS]'")
   
   or die(mysqli_error($koneksi));
   
   if($del){
   			echo '<script>alert("Berhasil menghapus data."); document.location="../../pemilik/index.php?page=jenis_barang";</script>';
   		}else{
   			echo '<script>alert("Gagal menghapus data."); document.location="../../pemilik/index.php?page=jenis_barang";</script>';
   		}
    ?>
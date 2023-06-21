<?php 

ob_start();
include '../../inc/koneksi.php';

$del = mysqli_query($koneksi,"DELETE FROM users WHERE USERNAME = '$_GET[USERNAME]'")

or die(mysqli_error($koneksi));

if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="../../pemilik/index.php?page=user";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="../../pemilik/index.php?page=user";</script>';
		}
 ?>
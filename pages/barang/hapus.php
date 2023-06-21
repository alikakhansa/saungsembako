<?php 

ob_start();
include '../../inc/koneksi.php';

$del = mysqli_query($koneksi,"DELETE FROM barang WHERE ID_BARANG = '$_GET[ID_BARANG]'")

or die(mysqli_error($koneksi));

if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="../../pemilik/index.php?page=barang";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="../../pemilik/index.php?page=barang";</script>';
		}
 ?>
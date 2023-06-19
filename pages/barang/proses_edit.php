<?php 
   ob_start();
   include ("../inc/koneksi.php");
   
   
   // Select data dari tabel barang
   
   $ID 			= mysqli_real_escape_string($koneksi,$_POST['ID_BARANG']);
   $NAMA 			= mysqli_real_escape_string($koneksi,$_POST['NAMA']);
   $HARGA 			= mysqli_real_escape_string($koneksi,$_POST['HARGA']);
   $IDJENIS 			= mysqli_real_escape_string($koneksi,$_POST['ID_JENIS']);
   $FOTO 			= mysqli_real_escape_string($koneksi,$_POST['IMG']);

   	$QUERY1 = mysqli_query($koneksi,"UPDATE barang INNER JOIN jenis_barang ON jenis_barang.ID_JENIS=barang.ID_JENIS SET
   
   	ID_BARANG  	= '$ID',
   	NAMA 			= '$NAMA', 
   	HARGA 		= '$HARGA',
   	ID_JENIS 		= '$IDJENIS',
   	IMG		= '$NAMA_BARANG',
   	foto 		= '$FOTO'
   
   	WHERE  barang.ID_BARANG ='$ID';")
   
   	or die(mysqli_error($koneksi));
   if($QUERY1){
   		echo '<script>alert("Berhasil Edit data."); document.location="index.php?page=barang";</script>';
   	}else{
   		echo '<script>alert("Gagal Edit data."); document.location="index.php?page=barang";</script>';
   	}
   ?>
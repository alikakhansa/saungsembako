<?php
   ob_start();
   include '../../inc/koneksi.php';
   
   $ID           =$_POST['ID_BARANG'];
   $NAMA     =$_POST['NAMA'];
   $HARGA          =$_POST['HARGA'];
   $KATEGORI        =$_POST['KATEGORI'];
   $POTO =             $_POST['IMG'];
   
   if ($ID=="" || 
       $NAMA=="" || 
       $HARGA=="" || 
       $KATEGORI==""||
       $POTO=="") {
   
   ?>
<!-- <script type="text/javascript">
   alert("Tambah Data Gagal");
   window.location.href="?page=barang";
   </script>-->
<?php
   }else{
        $QUERY2=mysqli_query($koneksi,"INSERT INTO jenis_barang SET
           ID_JENIS        ='$ID_JENIS';")
       or die("Gagal memasukan data baru".mysqli_error($koneksi) );
   
       
        $QUERY1=mysqli_query($koneksi,"INSERT INTO barang SET
       ID_BARANG       ='$ID',
       NAMA        ='$NAMA',
       HARGA             ='$HARGA',
       KATEGORI             ='$KATEGORI',
       IMG             ='$POTO';")
       or die('Gagal Memasukan Data Baru'.mysqli_error($koneksi) );
       }
   ?>
<!--
   <script type="text/javascript">
        alert("Tambah Data Berhasil");
        window.location.href="?page=barang";
   </script>-->
<?php
   if
       ($QUERY1){
                     echo '<script>alert("Berhasil menambahkan data."); document.location="../../admin/index.php?page=barang";</script>';
                   }else{
                       echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
                   }
   ?>
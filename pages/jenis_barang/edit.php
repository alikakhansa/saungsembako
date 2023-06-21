<?php 
   include '../inc/koneksi.php';
   ?>
<?php 
   $PAGE = $_GET['aksi'];
   ?> 
<?php
   $ID=$_GET['id'];
   $EDIT ="SELECT * FROM jenis_barang WHERE jenis_barang.ID_JENIS='$ID' " or die ("Gagal melakukan query!!!!".mysql_error());
   $HASILEDIT=mysqli_query($koneksi,$EDIT);
   while ($ROW = mysqli_fetch_array($HASILEDIT)) {
       $ID = $ROW['ID_JENIS'];
       $KETERANGAN=$ROW['KETERANGAN'];
   }
   ?>
<!-- Page-Title -->
<div class="row" style="width: 92%; margin: 0 auto; margin-top: 20px;">
   <div class="col-sm-12">
      <div class="page-title-box">
         <div class="btn-group float-right">
            <ol class="breadcrumb hide-phone p-0 m-0">
               <li class="breadcrumb-item"><a href="index.php" style="font-size: 20px; text-decoration: none; color: #007bff;">Dashboard</a></li>
            </ol>
         </div>
         <h3  class="page-title">Edit Data Jenis Barang</h3>
      </div>
   </div>
</div>
<?php
   if (@$_POST['edit']){ 
     include "proses_edit.php";
   }
   ?>
<div class="card m-b-30" style="width:90%; margin: 0 auto; margin-top: 20px;">
   <div class="card-body">
      <form action="#" method="post"  enctype="multipart/form-data">
         <input type="hidden" class="form-control" id="ID_JENIS" name="ID_JENIS" style="color: black; width: 100%;" value="<?php echo $ID; ?>" required readonly>
         <div class="form-group">
            <b style= "color: black;"><label for="text">Keterangan</label></b>
            <input type="text" class="form-control" name="KETERANGAN" style="color: black; width: 100%" value="<?php echo $KETERANGAN; ?>" required>
         </div>
         <div class="box-footer">
            <button type="submit" name="edit" class="btn btn-primary" value="edit">Simpan</button>
         </div>
      </form>
   </div>
</div>
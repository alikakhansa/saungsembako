<?php 
   include '../inc/koneksi.php';
?>
<?php 
   $PAGE = $_GET['aksi'];
?> 

<?php
   $ID=$_GET['id'];
   $EDIT ="SELECT b.ID_BARANG, b.NAMA, b.HARGA, jb.ID_JENIS, b.IMG FROM `barang` b INNER JOIN `jenis_barang` jb ON b.ID_JENIS = jb.ID_JENIS WHERE b.ID_BARANG='$ID'" or die ("Gagal melakukan query!!!!".mysql_error());
   $HASILEDIT=mysqli_query($koneksi,$EDIT);
   while ($ROW = mysqli_fetch_array($HASILEDIT)) {
       $ID = $ROW['ID_BARANG'];
       $NAMA=$ROW['NAMA'];
       $HARGA=$ROW['HARGA'];
       $KATEGORI=$ROW['ID_JENIS'];
       $FOTO=$ROW['IMG'];
   
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
         <h3  class="page-title">Edit Data Barang</h3>
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
      <input type="hidden" class="form-control" id="ID_BARANG" name="ID_BARANG" style="color: black; width: 100%;" value="<?php echo $ID; ?>" required readonly>
   <div class="form-group">
      <b style= "color: black;"><label for="text">Nama Barang</label></b>
      <input type="text" class="form-control" name="NAMA" style="color: black; width: 100%" value="<?php echo $NAMA; ?>" required>
   </div>
   <div class="form-group">
      <b style= "color: black;"><label for="text">Harga</label></b>
      <input type="number" class="form-control" name="HARGA" style="color: black; width: 100%" value="<?php echo $HARGA; ?>" required>
   </div>

    <div class="form-group">
                  <b style= "color: black;"><label for="text">Kategori</label></b>
                  <select class="form-control show-tick " name="ID_JENIS" value="<?php echo $KATEGORI; ?>">
                                      <?php
         $query = "SELECT * FROM jenis_barang";
         $result = mysqli_query($koneksi, $query);
         while ($row = mysqli_fetch_assoc($result)) : ?>
            <option value="<?php echo $row['ID_JENIS']; ?>"<?php if($row['ID_JENIS']==$KATEGORI){echo "selected";}?>><?php echo $row['KETERANGAN']; ?></option>
         <?php endwhile; ?>
      </select>
                </div>

  
   <div class="form-group">
   <b style= "color: black;"><label for="text" style="margin-bottom: 20px;">Gambar</label></b>
   <div class="col-md-6" style="margin-bottom: 20px;">
      <?php echo "<img src='../pages/barang/img/$FOTO' width='70' >"; ?>
   </div>
   <input type="file" name="IMG" style="margin-bottom: 20px;">
</div>
   <div class="box-footer">
      <button type="submit" name="edit" class="btn btn-primary" value="edit">Simpan</button>
   </div>
</form>
</div>
</div>
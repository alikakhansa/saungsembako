<?php 
   include '../inc/koneksi.php';
   ?>
<?php 
   $PAGE = $_GET['aksi'];
   ?> 
<?php
   $ID=$_GET['id'];
   $EDIT ="SELECT * FROM users WHERE users.USERNAME='$ID' " or die ("Gagal melakukan query!!!!".mysql_error());
   $HASILEDIT=mysqli_query($koneksi,$EDIT);
   while ($ROW = mysqli_fetch_array($HASILEDIT)) {
      $USERNAME = $ROW['USERNAME'];
      $EMAIL = $ROW['EMAIL'];
      $PASSWORD = $ROW['PASSWORD'];
      $LEVEL = $ROW['LEVEL'];
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
         <h3  class="page-title">Edit Data User</h3>
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
         <input type="hidden" class="form-control" name="ID" style="color: black; width: 100%;" value="<?php echo $USERNAME; ?>" required readonly>
         <div class="form-group">
            <b style="color: black;"><label for="text">Username</label></b>
            <input type="text" class="form-control" id="USERNAME" name="USERNAME" style="color: black; width: 100%;" value="<?php echo $USERNAME; ?>" required>
         </div>
         <div class="form-group">
            <b style="color: black;"><label for="text">Email</label></b>
            <input type="text" class="form-control" name="EMAIL" style="color: black; width: 100%" value="<?php echo $EMAIL; ?>" required>
         </div>
         <div class="form-group">
            <b style="color: black;"><label for="text">Password</label></b>
            <input type="text" class="form-control" name="PASSWORD" style="color: black; width: 100%" value="<?php echo $PASSWORD; ?>" required>
         </div>
         <div class="form-group">
            <b style="color: black;"><label for="text">Level</label></b>
            <select class="form-control show-tick" name="LEVEL" value="<?php echo $LEVEL; ?>">
               <?php
                  $query = "SELECT * FROM users";
                  $result = mysqli_query($koneksi, $query);
                  while ($row = mysqli_fetch_assoc($result)) :
                  ?>
               <option value="<?php echo $row['LEVEL']; ?>" <?php if ($row['LEVEL'] == $LEVEL) {
                  echo "selected";
                  } ?>><?php echo $row['LEVEL']; ?></option>
               <?php endwhile; ?>
            </select>
         </div>
         <div class="box-footer">
            <button type="submit" name="edit" class="btn btn-primary" value="edit">Simpan</button>
         </div>
      </form>
   </div>
</div>
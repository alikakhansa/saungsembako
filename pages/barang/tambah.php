 
<!-- Page-Title -->
<div class="row" style="width: 92%; margin: 0 auto; margin-top: 20px;">
   <div class="col-sm-12">
      <div class="page-title-box">
         <div class="btn-group float-right">
            <ol class="breadcrumb hide-phone p-0 m-0">
             <li class="breadcrumb-item"><a href="index.php" style="font-size: 20px; text-decoration: none; color: #007bff;">Dashboard</a></li>
            </ol>
         </div>
         <h3  class="page-title">Tambah Data Barang</h3>
      </div>
   </div>
</div>


<form action="../pages/barang/proses_tambah.php" method="post">
   <div class="card m-b-30" style="width:90%; margin: 0 auto; margin-top: 20px;">
      <div class="card-body">
         <label class="mb-0"><b>ID Barang</b></label>
         <input type="text" name="ID_BARANG" class="form-control" size="4" required>
         <div class="m-t-20" style= "margin-top: 20px;">
            <label class="mb-0"><b>Nama Barang</b></label>
            <input type="text" name="NAMA" class="form-control" required>
         </div>
         <div class="m-t-20" style= "margin-top: 20px;">
            <label class="mb-0"><b>Harga</b></label>
            <input type="text" name="HARGA" class="form-control" required>
         </div>
         <div class="m-t-20" style= "margin-top: 20px;">
            <label class="mb-0"><b>Kategori</b></label>
            <input type="texts" name="KATEGORI" class="form-control" required>
         </div>
         <div class="m-t-20" style= "margin-top: 20px;">
            <label class="mb-0"><b>Gambar</b></label>
            <div class="m-t-20">
               <input type="file" id="IMG" class="form-control" name="foto" required="required">
            </div>
         </div>
         <label class="col-sm-2 col-form-label">&nbsp;</label>
         <div class="m-t-20">
            <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
         </div>
      </div>
   </div>
</form>
<!-- Modal -->
</div>
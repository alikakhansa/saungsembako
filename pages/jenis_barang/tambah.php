<div class="row" style="width: 92%; margin: 0 auto; margin-top: 20px;">
   <div class="col-sm-12">
      <div class="page-title-box">
         <div class="btn-group float-right">
            <ol class="breadcrumb hide-phone p-0 m-0">
             <li class="breadcrumb-item"><a href="index.php" style="font-size: 20px; text-decoration: none; color: #007bff;">Dashboard</a></li>
            </ol>
         </div>
         <h3  class="page-title">Tambah Data Jenis Barang</h3>
      </div>
   </div>
</div>


<form action="../pages/jenis_barang/proses_tambah.php" method="post" enctype="multipart/form-data">
   <div class="card m-b-30" style="width:90%; margin: 0 auto; margin-top: 20px;">
      <div class="card-body">
         <div class="m-t-20" style= "margin-top: 20px;">
            <label class="mb-0"><b>Keterangan</b></label>
            <input type="text" name="KETERANGAN" class="form-control" required>
         </div>
         <label class="col-sm-2 col-form-label">&nbsp;</label>
         <div class="m-t-20">
            <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
         </div>
      </div>
   </div>
</form>
</div>
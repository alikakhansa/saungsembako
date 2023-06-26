<div class="row" style="width: 90%; margin: 0 auto; margin-top: 50px;">
   <div class="col-md-12">
      <div class="card m-b-30">
         <div class="card-body table-responsive" style="width: 100%">
            <h5 class="header-title" style="font-size: 20px; margin-bottom: 20px;">DAFTAR DATA USER</h5>
            <a href="?page=user&aksi=tambah">
            <button type="button" class="btn btn-info"><i class="fas fa-plus"></i> Tambah</button>
            </a>
            <br><br>
            <div style="display: flex; justify-content: space-between; margin-bottom: 20px; margin-top: 20px;">
               <div>
                  <label for="entry-count-select" style="">Show</label>
                  <select id="entry-count-select" onchange="changeEntryCount()">
                     <option value="10">10</option>
                     <option value="25">25</option>
                     <option value="50">50</option>
                  </select>
                  <label for="entry-count-select">Entries</label>
               </div>
               <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Search">
            </div>
         </div>
         <div>
            <table id="dataTables-example" class="table border" style="width: 98%">
               <thead>
                  <tr>
                     <th style="color: black;">No</th>
                     <th style="color: black;">Username</th>
                     <th style="color: black;">Email</th>
                     <th style="color: black;">Password</th>
                     <th style="color: black;">Level</th>
                     <th style="color: black;">Aksi</th>
                  </tr>
               </thead>
               <tbody>
                       <?php
                       include '../inc/koneksi.php';
								$sql = mysqli_query($koneksi, "SELECT * FROM users ORDER BY USERNAME") or die(mysqli_error($koneksi));
   
                     $no = 1;
                     
                    	while($data = mysqli_fetch_assoc($sql)){
                     ?>
                  <tr>
                     <td><?php echo $no; ?></td>
                     <td><?php echo $data['USERNAME']; ?></td>
                     <td><?php echo $data['EMAIL']; ?></td>
                     <td><b><?php echo str_repeat('*', strlen($data['PASSWORD'])); ?></b></td>
                     <td><?php echo $data['LEVEL']; ?></td>
                     <td>
                        <a href="index.php?page=user&aksi=edit&id=<?php echo $data['USERNAME'] ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Edit</a>
                        <a href="../pages/user/hapus.php?USERNAME=<?php echo $data['USERNAME'] ?>" class="btn btn-danger tom" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                  <?php
                     $no++;
                     }
                     ?>
               </tbody>
            </table>
            <script>
               function showEntryCount() {
               var table = document.getElementById("myTable");
               var rowCount = table.rows.length - 1; // Mengurangi 1 untuk mengabaikan baris header
               document.getElementById("entry-count").innerHTML = "Jumlah Data : " + rowCount;
               }
               
               // Memanggil fungsi showEntryCount saat halaman selesai dimuat
               window.onload = showEntryCount;
               
               // Fungsi JavaScript untuk pencarian
               function searchTable() {
               // Mendapatkan input pencarian
               var input = document.getElementById("search-input").value.toLowerCase();
               
               // Mendapatkan semua baris pada tabel
               var rows = document.getElementsByTagName("tr");
               
               // Melakukan iterasi pada setiap baris tabel, mulai dari indeks 1 untuk menghindari baris header
               for (var i = 1; i < rows.length; i++) {
               var row = rows[i];
               var rowData = row.getElementsByTagName("td");
               
               var match = false;
               
               // Melakukan iterasi pada setiap sel pada baris saat ini
               for (var j = 0; j < rowData.length; j++) {
               var cell = rowData[j];
               
               // Jika teks pada sel cocok dengan input pencarian, tampilkan baris
               if (cell.innerHTML.toLowerCase().indexOf(input) > -1) {
               match = true;
               break;
               }
               }
               
               // Mengatur gaya tampilan baris (tampilkan atau sembunyikan)
               if (match) {
               row.style.display = "";
               } else {
               row.style.display = "none";
               }
               }
               }
               
               function changeEntryCount() {
               var select = document.getElementById("entry-count-select");
               var entryCount = select.value;
               
               var rows = document.getElementsByTagName("tr");
               
               for (var i = 1; i < rows.length; i++) {
               var row = rows[i];
               if (i <= entryCount) {
               row.style.display = "";
               } else {
               row.style.display = "none";
               }
               }
               
               showEntryCount();
               }
            </script>
         </div>
      </div>
   </div>
</div>
</div>			
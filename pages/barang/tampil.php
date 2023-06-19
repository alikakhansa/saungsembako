<div class="row" style="width: 90%; margin: 0 auto; margin-top: 50px;">
   <div class="col-md-12">
      <div class="card m-b-30">
         <div class="card-body table-responsive" style="width: 100%">
            <h5 class="header-title" style="font-size: 20px; margin-bottom: 20px;">DAFTAR BARANG</h5>
            <a href="?page=barang&aksi=tambah">
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
                     <th style="color: black;">ID Barang</th>
                     <th style="color: black;">Nama Barang</th>
                     <th style="color: black;">Harga</th>
                     <th style="color: black;">Kategori</th>
                     <th style="color: black;">Gambar</th>
                     <th style="color: black;">Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     include '../inc/koneksi.php';
                     $query = mysqli_query($koneksi, "SELECT b.ID_BARANG, b.NAMA, b.HARGA, jb.KETERANGAN 'KATEGORI', b.IMG FROM `barang` b INNER JOIN `jenis_barang` jb ON b.ID_JENIS = jb.ID_JENIS")
                         or die(mysqli_error($koneksi));
                     
                     $no = 1;
                     
                     while ($data = mysqli_fetch_assoc($query)) {
                     ?>
                  <tr>
                     <td><?php echo $no; ?></td>
                     <td><?php echo $data['ID_BARANG']; ?></td>
                     <td><?php echo $data['NAMA']; ?></td>
                     <td><?php echo $data['HARGA']; ?></td>
                     <td><?php echo $data['KATEGORI']; ?></td>
                     <td><img src="../pages/barang/img/<?php echo $data['IMG']; ?>" width="70"></td>
                     <td>
                        <a href="index.php?page=barang&aksi=edit&id=<?php echo $data['ID_BARANG'] ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Edit</a>
                        <a href="../pages/barang/hapus.php?ID_BARANG=<?php echo $data['ID_BARANG'] ?>" class="btn btn-danger tom" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Delete</a>
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
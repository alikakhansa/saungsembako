<div class="row" style="width: 90%; margin: 0 auto; margin-top: 50px;">
   <div class="col-md-12">
      <div class="card m-b-30">
         <div class="card-body table-responsive" style="width: 100%">
            <h5 class="header-title" style="font-size: 20px; margin-bottom: 20px;">Riwayat Transaksi</h5>
            <br>
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
                     <th style="color: black; text-align: center;">ID Transaksi</th>
                     <th style="color: black; text-align: center;">Username</th>
                     <th style="color: black; text-align: center;">Tanggal</th>
                     <th style="color: black; text-align: center;">Total</th>
                     <th style="color: black; text-align: center;">Dibayar</th>
                     <th style="color: black; text-align: center;">Kembali</th>
                     <th style="color: black; text-align: center;">Status</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     include '../inc/koneksi.php';
                     $sql = mysqli_query($koneksi, "SELECT * FROM `transaksi`") or die(mysqli_error($koneksi));
                     
                     $no = 1;
                     
                     while($data = mysqli_fetch_assoc($sql)){
                     ?>
                  <tr>
                     <td style="text-align: center;"><?php echo $data['ID_TRANSAKSI']; ?></td>
                     <td style="text-align: center;"><?php echo $data['USERNAME']; ?></td>
                     <td style="text-align: center;"><?php echo $data['TANGGAL']; ?></td>
                     <td style="text-align: center;"><?php echo $data['TOTAL']; ?></td>
                     <td style="text-align: center;"><?php echo $data['DIBAYAR']; ?></td>
                     <td style="text-align: center;"><?php echo $data['KEMBALI']; ?></td>
                     <td style="text-align: center;">
                        <?php
                           if ($data['STATUS'] == 'DIBAYAR') {
                             echo "<span class='badge badge-pill badge-success' style='background-color: green;'>Dibayar</span>";
                           } elseif ($data['STATUS'] == 'PROSES') {
                             echo "<span class='badge badge-pill badge-warning' style='background-color: yellow;'>Proses</span>";
                           } elseif ($data['STATUS'] == 'DIBATALKAN') {
                             echo "<span class='badge badge-pill badge-danger' style='background-color: red;'>Dibatalkan</span>";
                           } else {
                             echo "<span class='badge badge-pill badge-secondary'>Tidak Diketahui</span>";
                           }
                           ?>
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
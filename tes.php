        <?php
            // Data contoh
            $data = array(
                array("John Doe", "john.doe@example.com", "Male"),
                array("Jane Smith", "jane.smith@example.com", "Female"),
                array("Mark Johnson", "mark.johnson@example.com", "Male"),
                array("Emily Davis", "emily.davis@example.com", "Female"),
            );
            ?>
         <!-- Kotak pencarian -->
         <div class="box">
            <div style="display: flex; justify-content: space-around; margin-bottom: 20px; margin-top: 50px;">
               <div>
                  <label for="entry-count-select" style="">Show</label>
                  <select id="entry-count-select" onchange="changeEntryCount()">
                     <option value="10">10</option>
                     <option value="25">25</option>
                     <option value="50">50</option>
                  </select>
                  <label for="entry-count-select">Entries</label>
               </div>
               <div>
                  <input type="text" id="search-input" onkeyup="searchTable()" placeholder="Search">
               </div>
            </div>
            <!-- Tabel -->
            <table id="myTable">
               <thead>
                  <tr>
                     <th>Nama</th>
                     <th>Email</th>
                     <th>Jenis Kelamin</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     // Iterasi melalui data dan menampilkan baris tabel
                     foreach ($data as $row) {
                         echo "<tr>";
                         echo "<td>{$row[0]}</td>";
                         echo "<td>{$row[1]}</td>";
                         echo "<td>{$row[2]}</td>";
                         echo "</tr>";
                     }
                     ?>
               </tbody>
            </table>
            <!-- Menampilkan jumlah entri -->
            <p id="entry-count" style="text-align: right; width: 90%; margin-top: 20px;"></p>
         </div>

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
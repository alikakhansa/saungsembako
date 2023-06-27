<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
      <style>
         /* Gaya CSS untuk tabel */
         table {
         border-collapse: collapse;
         width: 80%;
         margin: 0 auto;
         }
         th,
         td {
         padding: 12px;
         text-align: left;
         border-bottom: 1px solid #ddd;
         }
         tr:hover {
         background-color: #f5f5f5;
         }
         th {
         background-color: #4CAF50;
         color: white;
         }
         .box {
         border: 1px solid black;
         padding: 5px;
         width: 90%;
         margin: 0 auto;
         border-radius: 5px;
         }
         /* Gaya CSS untuk kotak pencarian */
         #search-box {
         margin-bottom: 10px;
         }
         .menu {
         display: flex;
         justify-content: space-between;
         align-items: center;
         }
         .menu {
         display: flex;
         justify-content: space-between;
         align-items: center;
         }
         .menu a {
         margin-right: 10px; /* Jarak antara elemen menu */
         }
         .dropdown {
         position: relative;
         }
         .dropdown-content {
         display: none;
         position: absolute;
         top: 100%;
         left: 0;
         width: 200px; /* Lebar kotak dropdown */
         padding: 10px; /* Jarak antara isi dropdown dengan tepi kotak */
         background-color: #fff; /* Warna latar belakang kotak dropdown */
         box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Bayangan pada kotak dropdown */
         z-index: 1; /* Menempatkan kotak dropdown di atas elemen lain */
         }
         .dropdown-content li {
         list-style-type: none; /* Menghilangkan bullet pada daftar dropdown */
         }
         .dropdown-content a {
         display: block;
         padding: 5px 0;
         color: #333; /* Warna teks pada dropdown */
         text-decoration: none;
         }
         .dropdown-content a:hover {
         background-color: #fff; /* Warna latar belakang saat dihover */
         }
      </style>
   </head>

<div class="row" style="width: 90%; margin: 0 auto; margin-top: 50px;">
   <div class="col-md-12">
      <div class="card m-b-30">
         <div class="card-body table-responsive" style="width: 100%">
            <h5 class="header-title" style="font-size: 20px; margin-bottom: 20px;">PILIH BARANG</h5>
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
                     <th style="color: black;">Nama Barang</th>
                     <th style="color: black;">Harga</th>
                     <th style="color: black;">Kategori</th>
                     <th style="color: black;">Gambar</th>
                     <th style="color: black;"></th>
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
                     <td><?php echo $data['NAMA']; ?></td>
                     <td><?php echo $data['HARGA']; ?></td>
                     <td><?php echo $data['KATEGORI']; ?></td>
                     <td><img src="../pages/barang/img/<?php echo $data['IMG']; ?>" width="70"></td>
                     <td>
                        <button class="btn btn-success tom" onclick="startPopup(<?php echo $data['ID_BARANG']; ?>, <?php echo $data['HARGA']; ?>)">Pilih</button>
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


<style>
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #f9f9f9;
      padding: 20px;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      z-index: 9999;
    }
  </style>

  <div class="popup" id="popup">
    <h2>Masukkan kuantitas</h2>
    <p>Masukkan jumlah barang yang diinginkan</p>
    <p><span id="prod-price">10000</span> x <span id="prod-amount">1</span> = <span id="subtotal">10000</span></p>
    <input type="number" id="amountInput" value="1">
    <button onclick="addProduct()">Tambah</button>
    <button onclick="closePopup()">Batal</button>
  </div>

  <script>
   var queryParams = new URLSearchParams(window.location.search);
   var price = 0;
   var id_barang = 0;
   var id_transaksi = queryParams.get('id');
   var amount = 0;

   function updateSubtotal() {
   var amountInput = document.getElementById('amountInput');
   var prodAmount = document.getElementById('prod-amount');
   var subtotal = document.getElementById('subtotal');
   amount = parseInt(amountInput.value);
   var total = price * amount;
   prodAmount.textContent = amount;
   subtotal.textContent = total;
   }

   document.getElementById('amountInput').addEventListener('input', updateSubtotal);

   function startPopup(prod_id, new_price) {
   var prod_price = document.getElementById('prod-price');
   prod_price.textContent = new_price;
   price = new_price;
   id_barang = prod_id;
   updateSubtotal();
   var popup = document.querySelector('#popup');
   popup.style.display = 'block';
   }

   function closePopup() {
   var popup = document.querySelector('#popup');
   popup.style.display = 'none';
   }

   function addProduct(){
   document.location = "../pages/transaksi/proses_tambah_barang.php?id_transaksi="+id_transaksi+"&id_barang="+id_barang+"&amount="+amount;
   }
  </script>
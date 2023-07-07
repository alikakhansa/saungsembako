<?php 
include '../inc/koneksi.php';
$ID = $_GET['id'];
$QUERY_TABLE = "SELECT TB.ID_TRANSAKSI_BARANG 'ID_T_BARANG', COALESCE(B.NAMA, '<span style=\'color:red;\'><i>Barang sudah dihapus</i></span>') 'NAMA', TB.HARGA, TB.KUANTITAS, (TB.HARGA*TB.KUANTITAS) 'SUBTOTAL', COALESCE(B.IMG, 'NOIMAGE.PNG') 'IMG' FROM `transaksi_barang` TB LEFT JOIN `barang` B ON TB.ID_BARANG = B.ID_BARANG WHERE TB.ID_TRANSAKSI = $ID;";
$DATA_TABLE = mysqli_query($koneksi, $QUERY_TABLE);

$QUERY_INFO = "SELECT `STATUS`, TANGGAL, TOTAL, DIBAYAR, KEMBALI FROM `transaksi` WHERE ID_TRANSAKSI = $ID;";
$DATA_INFO = mysqli_fetch_assoc(mysqli_query($koneksi, $QUERY_INFO));

$TANGGAL = $DATA_INFO['TANGGAL'];
$STATUS = $DATA_INFO['STATUS'];
$TOTAL = $DATA_INFO['TOTAL'];
$DIBAYAR = $DATA_INFO['DIBAYAR'];
$KEMBALI = $DATA_INFO['KEMBALI'];
?>
  <style>
    .transaction-box {
      padding: 20px;
      margin-bottom: 20px;
      background-color: #f9f9f9;
    }

    .transaction-title {
      margin-bottom: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
  </style>

<div class="container">
  <div class="row">
  <div class="transaction-box">
          <h2 class="transaction-title" style="margin-bottom: 20px;">Detail Transaksi (TR-ID #<?php echo $ID?>)</h2>
          <span>Tanggal Transaksi : <?php echo $TANGGAL?></span><br>  
          <span>Status Transaksi : <?php echo $STATUS?></span><br>
          <span>Total Transaksi : Rp<?php echo $TOTAL?></span><br>

          <?php
          // KEDUA INFO DIBAWAH INI CUMA MUNCUL KETIKA STATUS TRANSAKSI = DIBAYAR
          if ($STATUS == "DIBAYAR") {
            echo "<span>Dibayar : Rp$DIBAYAR</span><br>";
            echo "<span>Uang Kembali : Rp$KEMBALI</span><br>";
          }
          // KETIGA TOMBOL DIBAWAH CUMA MUNCUL KETIKA STATUS TRANSAKSI = PROSES
          elseif ($STATUS == "PROSES") {
            if ($TOTAL > 0) {
            echo "<a class='btn btn-success' style='margin-bottom: 8px; margin-top: 20px; margin-right: 8px;' onclick=\"startPopup($TOTAL)\">Selesaikan Transaksi</a>";
            }
            echo "<a class='btn btn-danger' style='margin-bottom: 8px; margin-top: 20px; margin-right: 8px;' href='../pages/transaksi/update_status_transaksi.php?aksi=cancel&id=$ID' onclick=\"return confirm('Yakin ingin membatalkan transaksi ini?')\">Batalkan</a>";
            echo "<a class='btn btn-primary' style='margin-bottom: 8px; margin-top: 20px; margin-right: 8px;' href='?page=transaksi&aksi=tambah&id=$ID'>Tambah Barang</a>";
          }
          // <!-- SATU TOMBOL INI CUMA MUNCUL KETIKA STATUS TRANSAKSI = DIBAYAR -->
          if ($STATUS == "DIBAYAR"){
            echo "<a class='btn btn-primary' style='margin-bottom: 8px; margin-top: 20px; margin-right: 8px;' href='../pages/transaksi/struk.php?id=$ID'>Cetak Struk</a>";
          }
          ?>
          <table>
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Kuantitas</th>
                <th>Subtotal</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              while($data = mysqli_fetch_assoc($DATA_TABLE)){
            ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['NAMA']; ?></td>
                <td>Rp<?php echo $data['HARGA']; ?></td>
                <td><?php echo $data['KUANTITAS']; ?></td>
                <td>Rp<?php echo $data['SUBTOTAL']; ?></td>
                <td><img src="../pages/barang/img/<?php echo $data['IMG']; ?>" width="70"></td>
                <td><?php if($STATUS == "PROSES"){
                    $TEMPID = $data['ID_T_BARANG'];
                  echo "<a class='btn btn-danger' style='margin-bottom: 8px; margin-top: 20px; margin-right: 8px;' href='../pages/transaksi/proses_hapus_barang.php?id=$TEMPID&idt=$ID' onclick=\"return confirm('Yakin ingin menghapyus produk ini?')\">Hapus</a>";}?></td>
              </tr>
              <?php
                $no++;
                }
            ?>
            </tbody>
          </table>
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
    <h2>Mulai Pembayaran Cash</h2>
    <p>Uang Kembali: <span id="CHANGES"></span></p>
    <input type="number" id="amountInput" value="0">
    <button onclick="finishTransaction()">Bayar</button>
    <button onclick="closePopup()">Batal</button>
  </div>

  <script>
   var queryParams = new URLSearchParams(window.location.search);
    var id = queryParams.get('id');
    var total = 0;
    var amount = 0;

    var amountInput = document.getElementById('amountInput');
    var changesText = document.getElementById('CHANGES');

    function updateSubtotal() {

      amount = parseInt(amountInput.value);
      var changes = amount - total;
      if (changes>=0){
        changesText.textContent = "Rp " + changes;
      } else {
        changesText.innerHTML = "<b style='color: red;'>Uang Tidak Cukup</b>";
      }
    }

    document.getElementById('amountInput').addEventListener('input', updateSubtotal);

    function startPopup(php_total) {
      total = php_total;
      updateSubtotal();
      var popup = document.querySelector('#popup');
      popup.style.display = 'block';
    }

    function closePopup() {
      amountInput.value = 0;
      amount = 0;
      var popup = document.querySelector('#popup');
      popup.style.display = 'none';
    }

    function finishTransaction(){
      if ((amount - total) >= 0) {
        document.location = '../pages/transaksi/update_status_transaksi.php?aksi=finish&id='+id+'&amount='+amount;
      } else {
        alert("Uang tidak mencukupi, transaksi tidak dapat dilanjutkan.");
        closePopup();
      }
      
    }
  </script>
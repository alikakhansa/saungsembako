<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="transaction-box">
          <h2 class="transaction-title" style="margin-bottom: 20px;">Daftar Transaksi</h2>
          <button class="btn btn-primary" id="mulaiTransaksi" style="margin-bottom: 20px;">Mulai Transaksi</button>
          <table>
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Jumlah Barang</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>01/01/2023</td>
                <td>$100</td>
                <td>5</td>
                <td>Selesai</td>
              </tr>
              <tr>
                <td>02/01/2023</td>
                <td>$150</td>
                <td>7</td>
                <td>Selesai</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div id="transaksiBox" class="col-md-6" style="display: none;">
        <?php include 'detailtransaksi.php'; ?>
      </div>
    </div>
  </div>

  <script>
    document.getElementById("mulaiTransaksi").addEventListener("click", function() {
      document.getElementById("transaksiBox").style.display = "block";
    });
  </script>
</body>
</html>

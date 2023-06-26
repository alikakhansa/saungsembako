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
    <?php 
    include '../inc/koneksi.php';
    $QUERY_SELECT_TRANSAKSI = mysqli_query($koneksi, "SELECT ID_TRANSAKSI 'ID', TANGGAL, COALESCE(TOTAL, 0) 'TOTAL', STATUS FROM `transaksi` WHERE USERNAME = '".$_SESSION['USERNAME']."' ORDER BY ID_TRANSAKSI ASC;");
    ?>
  <div class="container">
    <div class="row">
        <div class="transaction-box">
          <h2 class="transaction-title" style="margin-bottom: 20px;">Daftar Transaksi (<?php echo ucfirst($_SESSION['USERNAME'])?>)</h2>
          <a class="btn btn-primary" id="mulaiTransaksi" style="margin-bottom: 20px; color: white;" href="../pages/transaksi/create_transaksi.php">Mulai Transaksi</a>
          <table>
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($data = mysqli_fetch_assoc($QUERY_SELECT_TRANSAKSI)){
              ?>
              
              <tr>
                <td><?php echo $data['TANGGAL'];?></td>
                <td>Rp<?php echo $data['TOTAL'];?></td>
                <td><?php echo $data['STATUS'];?></td>
                <td><a href="index.php?page=transaksi&aksi=detail&id=<?php echo $data['ID'];?>">Buka</a></td>
              </a>
              </tr>
              <?php
                }
            ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</body>
</html>

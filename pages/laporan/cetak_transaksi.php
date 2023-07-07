<?php include '../../inc/koneksi.php'; ?>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="icon" href="../../assets/images/icon.png">
  <title>Struk</title>
  <style>
    .header {
      background-color: #a9d8c4;
      color: #fff;
      padding: 10px;
    }

    .header h2 {
      margin: 0;
    }

    /* Tambahkan CSS untuk tabel */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    table thead th {
      background-color: #333;
      color: #fff;
      padding: 10px;
    }

    table tbody td {
      padding: 10px;
      border-bottom: 1px solid #ccc;
    }

    .badge {
      padding: 5px 10px;
      color: #fff;
      font-size: 12px;
      border-radius: 3px;
      text-transform: uppercase;
    }

    .badge-success {
      background-color: #28a745;
    }

    .badge-warning {
      background-color: #ffc107;
    }
  </style>
</head>

<body id="page-top" onload="window.print();">
  <div class="header">
    <nav class="navbar navbar-expand navbar-dark static-top">
      <ul class="navbar-nav ml-auto ml-md-12" style="margin-left: -35px;">
        <form method="GET">
          <input type="date" name="TANGGAL">
          <input type="submit" value="search">
        </form>
      </ul>
    </nav>
  </div>

  <div class="wrapper dashboard">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card m-b-30">
            <div class="card-body table-responsive">
              <table id="dataTables-example" class="table border-0">
                <thead>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>Username</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Dibayar</th>
                    <th>Kembali</th>
                    <th>Status</th>
                  </tr>
                </thead>

                <?php
                include "../../inc/koneksi.php";

                $TANGGAL = isset($_GET['TANGGAL']) ? $_GET['TANGGAL'] : null;

                $query = "SELECT * FROM transaksi";
                if (!empty($TANGGAL)) {
                  $query .= " WHERE DATE(TANGGAL) = '$TANGGAL'";
                }

                $sql = mysqli_query($koneksi, $query);

                while ($data = mysqli_fetch_array($sql)) {
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
                        echo "<span class='badge badge-pill badge-success'>Dibayar</span>";
                      } elseif ($data['STATUS'] == 'PROSES') {
                        echo "<span class='badge badge-pill badge-warning'>Proses</span>";
                      } elseif ($data['STATUS'] == 'DIBATALKAN') {
                        echo "<span class='badge badge-pill badge-danger' style='background-color: red;'>Dibatalkan</span>";
                      } else {
                        echo "<span class='badge badge-pill badge-secondary'>Tidak Diketahui</span>";
                      }
                      ?>
                    </td>
                  </tr>

                <?php
                }
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

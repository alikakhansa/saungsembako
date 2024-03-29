<style>
   .container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      padding: 20px;
   }
   .text {
      grid-column: 1;
   }
   .card:hover {
      background-color: #ebeae4;
   }
</style>

<?php
$USER = $_SESSION['USERNAME'];
$LEVEL = $_SESSION['LEVEL'];
$query_statistik1   = mysqli_query($koneksi,"SELECT count(*) AS total_barang FROM barang");
$data_statistik1    = mysqli_fetch_array($query_statistik1);
$query_statistik2   = mysqli_query($koneksi,"SELECT count(*) AS total_jenis FROM jenis_barang");
$data_statistik2    = mysqli_fetch_array($query_statistik2);
$query_statistik3   = mysqli_query($koneksi,"SELECT count(*) AS total_user FROM users");
$data_statistik3    = mysqli_fetch_array($query_statistik3);
$query_statistik4   = mysqli_query($koneksi,"SELECT count(*) AS total_transaksi FROM transaksi");
$data_statistik4    = mysqli_fetch_array($query_statistik4);
$query_user_transaksi = mysqli_query($koneksi, "SELECT USERNAME, COUNT(*) 'TOTAL' FROM transaksi WHERE STATUS = 'DIBAYAR'  AND YEAR(TANGGAL) = YEAR(NOW()) AND MONTH(TANGGAL) = MONTH(NOW()) GROUP BY USERNAME ORDER BY COUNT(*) DESC");
$data_user_transaksi = mysqli_fetch_array($query_user_transaksi);
$query_total_transaksi = mysqli_query($koneksi, "SELECT COUNT(*) 'TOTAL', COALESCE(SUM(TOTAL)) 'PEMASUKAN' FROM `transaksi` WHERE STATUS = 'DIBAYAR' AND YEAR(TANGGAL) = YEAR(NOW()) AND MONTH(TANGGAL) = MONTH(NOW())");
$data_total_transaksi = mysqli_fetch_array($query_total_transaksi);
$query_kasir = mysqli_query($koneksi, "SELECT (SELECT COUNT(*) FROM `transaksi` WHERE USERNAME = '$USER' AND YEAR(TANGGAL) = YEAR(NOW()) AND MONTH(TANGGAL) = MONTH(NOW())) AS `JumlahTransaksiBulanIni`, (SELECT COUNT(*) FROM `transaksi` WHERE USERNAME = '$USER' AND DATE(TANGGAL) = DATE(NOW()) AND STATUS = 'DIBAYAR') AS `JumlahTransaksiHariIni`, COALESCE((SELECT SUM(COALESCE(TOTAL, 0)) FROM `transaksi` WHERE USERNAME = '$USER' AND YEAR(TANGGAL) = YEAR(NOW()) AND MONTH(TANGGAL) = MONTH(NOW())), 0) AS `TotalTransaksiBulanIni`, COALESCE((SELECT SUM(COALESCE(TOTAL, 0)) FROM `transaksi` WHERE USERNAME = '$USER' AND DATE(TANGGAL) = DATE(NOW())),0) AS `TotalTransaksiHariIni`;");
$data_kasir = mysqli_fetch_array($query_kasir);
?>

<?php  
$QUERY = mysqli_query($koneksi, "SELECT * FROM users WHERE USERNAME='".$_SESSION['USERNAME']."'");
while ($DATA = mysqli_fetch_array($QUERY)) {
   $NIP = $DATA['EMAIL'];
   $QUERY2 = mysqli_query($koneksi, "SELECT * FROM users WHERE users.EMAIL='$NIP'");
   $DATA2 = mysqli_fetch_array($QUERY2);

   if ($_SESSION['USERNAME']) {
      if ($_SESSION['LEVEL'] == "PEMILIK") {
         echo "
            <div class='alert alert-info alert-dismissible fade show' role='alert' style='width: 95%; margin: 10px auto;'>
               <h3>
               Halo, $DATA2[USERNAME]! <font size='5px'>($DATA2[EMAIL])</font><br>
               Selamat datang di Dashboard Admin!
               </h3>
            </div>

            <div class='row' style='width: 96%; margin: 10px auto;'>
               <div class='col-md-12 col-xl-4' style='margin-top:20px;'>
                  <div class='card m-b-30'>
                     <div class='card-body'>
                        <div class='container' style='text-align:center;'>
                           <div class='text'>
                              <p style='margin-top: 5px; font-size: 18px;'>Total Barang</p>
                           </div>
                           <div>
                              <p style='font-family: sans-serif; font-size: 22px;'>".$data_statistik1['total_barang']." Barang</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class='col-md-12 col-xl-4' style='margin-top:20px;'>
                  <div class='card m-b-30'>
                     <div class='card-body'>
                        <div class='container' style='text-align:center;'>
                           <div class='text'>
                              <p style='margin-top: 5px; font-size: 18px;'>Total Jenis Barang</p>
                           </div>
                           <div>
                           <p style='font-family: sans-serif; font-size: 22px;'>".$data_statistik2['total_jenis']." Jenis</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class='col-md-12 col-xl-4' style='margin-top:20px;'>
                  <div class='card m-b-30'>
                     <div class='card-body'>
                        <div class='container' style='text-align:center;'>
                           <div class='text'>
                              <p style='margin-top: 5px; font-size: 18px;'>User Terdaftar</p>
                           </div>
                           <div>
                           <p style='font-family: sans-serif; font-size: 22px;'>".$data_statistik3['total_user']." User</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class='col-md-12 col-xl-6' style='margin-top:20px;'>
                  <div class='card m-b-30'>
                     <div class='card-body'>
                        <div class='container' style='text-align:center;'>
                           <div class='text'>
                              <p style='margin-top: 5px; font-size: 18px;'>Transaksi Bulan Ini</p>
                           </div>
                           <div  >
                           <p style='font-family: sans-serif; font-size: 22px;'>Rp".$data_total_transaksi['PEMASUKAN']." (".$data_total_transaksi['TOTAL']." Transaksi)</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class='col-md-12 col-xl-6' style='margin-top:20px;'>
                  <div class='card m-b-30'>
                     <div class='card-body'>
                        <div class='container' style='text-align:center;'>
                           <div class='text'>
                              <p style='margin-top: 5px; font-size: 18px;'>Transaksi Terbanyak</p>
                           </div>
                           <div>
                           <p style='font-family: sans-serif; font-size: 22px;'>".($data_user_transaksi['USERNAME'] ?? '')." (".($data_user_transaksi['TOTAL'] ?? '0')." Transaksi)</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            ";
      } else if ($_SESSION['LEVEL'] == "KASIR") {
         echo "
            <div class='alert alert-info alert-dismissible fade show' role='alert' style='width: 95%; margin: 10px auto;'>
               <h3>
               Halo, $DATA2[USERNAME]! <font size='5px'>($DATA2[EMAIL])</font><br>
               Selamat datang di Dashboard Kasir!
               </h3>
            </div>

            <div class='row' style='width: 96%; margin: 10px auto;'>

               <div class='col-md-12 col-xl-6' style='margin-top:20px;'>
                  <div class='card m-b-30'>
                     <div class='card-body'>
                        <div class='container' style='text-align:center;'>
                           <div class='text'>
                              <p style='margin-top: 5px; font-size: 18px;'>Jumlah Transaksi Bulan Ini</p>
                           </div>
                           <div>
                              <h2 style='font-family: \"Slabserif\", serif; font-size: 24px; margin-top: 5px;'>".$data_kasir['JumlahTransaksiBulanIni']."</h2>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class='col-md-12 col-xl-6' style='margin-top:20px;'>
                  <div class='card m-b-30'>
                     <div class='card-body'>
                        <div class='container' style='text-align:center;'>
                           <div class='text'>
                              <p style='margin-top: 5px; font-size: 18px;'>Jumlah Transaksi Hari Ini</p>
                           </div>
                           <div>
                              <h2 style='font-family: \"Slabserif\", serif; font-size: 24px; margin-top: 5px;'>".$data_kasir['JumlahTransaksiHariIni']."</h2>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class='col-md-12 col-xl-6' style='margin-top:20px;'>
                  <div class='card m-b-30'>
                     <div class='card-body'>
                        <div class='container' style='text-align:center;'>
                           <div class='text'>
                              <p style='margin-top: 5px; font-size: 18px;'>Total Transaksi Bulan Ini (Rp)</p>
                           </div>
                           <div>
                              <h2 style='font-family: \"Slabserif\", serif; font-size: 24px; margin-top: 5px;'>".$data_kasir['TotalTransaksiBulanIni']."</h2>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class='col-md-12 col-xl-6' style='margin-top:20px;'>
                  <div class='card m-b-30'>
                     <div class='card-body'>
                        <div class='container' style='text-align:center;'>
                           <div class='text'>
                              <p style='margin-top: 5px; font-size: 18px;'>Total Transaksi Hari Ini (Rp)</p>
                           </div>
                           <div>
                              <h2 style='font-family: \"Slabserif\", serif; font-size: 24px; margin-top: 5px;'>".$data_kasir['TotalTransaksiHariIni']."</h2>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         ";
      }
   }
}
?>

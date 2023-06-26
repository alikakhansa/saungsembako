<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: monospace;
        }

        #printable{
            display: none;
        }

        button {
            text-align: center;
            width: 100vw;
            height: 100vh;
            background-color: green;
            color: white;
        }

        @media print {
            @page {
                size: 90mm 150mm; /* Ukuran kertas kustom */
                margin: 0; /* Menghilangkan margin */
            }
            body {
                margin: 10px;
            }
            body * {
                visibility: hidden;
            }
            #printable {
                display: block;
            }
            #printable, #printable * {
                visibility: visible;
            }
            button {
                display: none;
            }
        }
    </style>
</head>

<?php
include '../../inc/koneksi.php';
$ID = $_GET['id'];
$QUERY_INFO = "SELECT USERNAME, TANGGAL, TOTAL, DIBAYAR, KEMBALI FROM `transaksi` WHERE ID_TRANSAKSI = $ID";
$QUERY_LIST = "SELECT B.NAMA, TB.HARGA, TB.KUANTITAS, COALESCE((TB.HARGA * TB.KUANTITAS)) 'SUBTOTAL' FROM `transaksi_barang` TB LEFT JOIN `barang` B ON TB.ID_BARANG=B.ID_BARANG WHERE ID_TRANSAKSI = $ID;";

$FETCH_INFO = mysqli_query($koneksi, $QUERY_INFO);
$FETCH_LIST = mysqli_query($koneksi, $QUERY_LIST);

$INFO = mysqli_fetch_assoc($FETCH_INFO);
?>
<body>
<button onclick="window.print()"><span style='font-size: 400px;margin: 0; padding: 0;'>⎙</span><br style="margin: 0; padding: 0;"><span style='font-size: 60px;margin: 0; padding: 0;'>CETAK STRUK</span></button>
    <div id="printable">
        <div style="text-align: center;">
            <span style="font-size:20px;"><b>STRUK PEMBELIAN SEMBAKO</b></span><br>
            <span>Toko SaungSembako Cabang Bandung</span><br>
            <span>Jl. Mulu Jadian Kagak No. 69</span><br>
            <span>Telp: 08123456543</span>
        </div>
        <hr>
        <div>
            <span>Tanggal: <?php echo $INFO['TANGGAL']?></span><br>
            <span>Kasir&nbsp : <?php echo $INFO['USERNAME']?></span>
        </div>
        <table style="width: 100%;">
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Qty.</th>
                <th>Subtotal</th>
            </tr>
            <?php
                while($LIST = mysqli_fetch_assoc($FETCH_LIST)) {
              ?>
            <tr>
                <td><?php echo $LIST['NAMA']?></td>
                <td style="text-align: right;"><?php echo $LIST['HARGA']?></td>
                <td style="text-align: center;"><?php echo $LIST['KUANTITAS']?></td>
                <td style="text-align: right;"><?php echo $LIST['SUBTOTAL']?></td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td colspan="3" style="text-align: right;">Total</td>
                <td style="text-align: right;"><?php echo $INFO['TOTAL']?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;">Bayar</td>
                <td style="text-align: right;"><?php echo $INFO['DIBAYAR']?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;">Kembali</td>
                <td style="text-align: right;"><?php echo $INFO['KEMBALI']?></td>
            </tr>
        </table>
        <hr>
        <div style="text-align: center;">
            <p>Terima kasih atas kunjungan Anda!</p>
            <p>Semoga hari Anda menyenangkan.</p>
        </div>
    </div>
</body>

<script>
    window.print();
</script>
</html>

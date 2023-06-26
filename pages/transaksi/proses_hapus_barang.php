<?php
ob_start();
include '../../inc/koneksi.php';

$ID = $_GET['id'];
$IDT = $_GET['idt'];
if($ID == '' || $IDT == ''){
    echo '<script>document.location="../../kasir/index.php?page=transaksi";</script>';
}
$query_delete = "DELETE FROM transaksi_barang WHERE ID_TRANSAKSI_BARANG = $ID";
echo $query_delete;
$delete = mysqli_query($koneksi, $query_delete);

if ($delete) {
    $query_refresh = "UPDATE `transaksi` SET `TOTAL` = (SELECT SUM(HARGA * KUANTITAS) FROM `transaksi_barang` WHERE ID_TRANSAKSI = $ID) WHERE ID_TRANSAKSI = $ID";
    $refresh = mysqli_query($koneksi, $query_refresh);
    echo '<script>alert("Berhasil menghapus barang."); document.location="../../kasir/index.php?page=transaksi&aksi=detail&id='.$IDT.'";</script>';
} else {
    echo '<script>alert("Gagal menghapus barang."); document.location="../../kasir/index.php?page=transaksi&aksi=detail&id='.$IDT.'";</script>';
}
?>

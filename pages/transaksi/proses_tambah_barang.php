<?php
ob_start();
include '../../inc/koneksi.php';

$id_transaksi = $_GET['id_transaksi'];
$id_barang = $_GET['id_barang'];
$amount = $_GET['amount'];

$query_insert = "INSERT INTO `transaksi_barang` (`ID_TRANSAKSI`, `ID_BARANG`, `KUANTITAS`, `HARGA`) VALUES ('$id_transaksi', '$id_barang', '$amount', (SELECT HARGA FROM `barang` WHERE ID_BARANG='$id_barang'));";
$insert = mysqli_query($koneksi, $query_insert);

if ($insert) {
    $query_refresh = "UPDATE `transaksi` SET `TOTAL` = (SELECT SUM(HARGA * KUANTITAS) FROM `transaksi_barang` WHERE ID_TRANSAKSI = $id_transaksi) WHERE ID_TRANSAKSI = $id_transaksi";
    $refresh = mysqli_query($koneksi, $query_refresh);
    echo '<script>alert("Berhasil menambahkan data."); document.location="../../kasir/index.php?page=transaksi&aksi=detail&id='.$id_transaksi.'";</script>';
} else {
    echo '<script>alert("Gagal menambah barang.")</script>';
}
?>

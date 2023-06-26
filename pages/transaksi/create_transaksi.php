<?php
session_start();
include "../../inc/koneksi.php";

if ($koneksi->query("INSERT INTO `transaksi` (USERNAME) VALUES ('" . $_SESSION['USERNAME'] . "')") === true) {
    $insertedId = $koneksi->insert_id;
    $REDIRECT_URI = "../../kasir/index.php?page=transaksi&aksi=detail&id=$insertedId";
    echo "<script>document.location='$REDIRECT_URI';</script>";
} else {
    echo '<script>alert("Gagal membuat transaksi baru."); document.location="../index.php?page=transaksi";</script>';
}

?>

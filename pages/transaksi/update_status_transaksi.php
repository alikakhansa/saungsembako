<?php 
include '../../inc/koneksi.php';
	@$PAGE = $_GET['aksi'];
    $ID = $_GET['id'];
    
    if($ID == ''){
        echo '<script>document.location="../../kasir/index.php?page=transaksi";</script>';
    }

    $REDIRECT_URI = "../../kasir/index.php?page=transaksi&aksi=detail&id=$ID";

	switch ($PAGE) {
		case 'cancel':
            if ($koneksi->query("UPDATE `transaksi` SET STATUS = 'DIBATALKAN' WHERE ID_TRANSAKSI = $ID") === true) {
                echo "<script>alert('Transaksi dibatalkan.'); document.location='$REDIRECT_URI';</script>";
            } else {
                echo "<script>alert('Gagal membatalkan transaksi.'); document.location='$REDIRECT_URI';</script>";
            }
			break;
		case 'finish':
            $DIBAYAR = (int)$_GET['amount'];
            $TOTAL_QUERY = mysqli_query($koneksi, "SELECT COALESCE(TOTAL, 0) 'TOTAL' FROM `transaksi` WHERE ID_TRANSAKSI = $ID;");
            $TOTAL_FETCH = mysqli_fetch_assoc($TOTAL_QUERY);
            $KEMBALI = $DIBAYAR - $TOTAL_FETCH['TOTAL'];
            if (!$DIBAYAR || $KEMBALI < 0) {
                echo "<script>alert('uang Tidak Cukup!'); document.location='$REDIRECT_URI';</script>";
            }
			if ($koneksi->query("UPDATE `transaksi` SET STATUS = 'DIBAYAR', DIBAYAR = '$DIBAYAR', KEMBALI = '$KEMBALI' WHERE ID_TRANSAKSI = $ID") === true) {
                echo "<script>alert('Transaksi berhasil diselesaikan!'); document.location='$REDIRECT_URI';</script>";
            } else {
                echo '<script>alert("Gagal menyelesaikan transaksi."); document.location="'.$ID.'";</script>';
            }
			break;
		default:
            echo "<script>document.location='$REDIRECT_URI';</script>";
			break;
	}
?>
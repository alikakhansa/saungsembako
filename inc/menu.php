<?php
@$PAGE = $_GET['page'];
switch ($PAGE) {
	case 'transaksi':
		include '../pages/transaksi/transaksi.php';
		break;
	case 'user':
		include '../pages/user/user.php';
		break;
	case 'riwayat':
		include '../pages/riwayat/riwayat.php';
		break;
	case 'barang':
		include '../pages/barang/barang.php';
		break;		
	case 'jenis_barang':
		include '../pages/jenis_barang/jenis_barang.php';
		break;
	case 'pinjam':
		include '../pages/pinjam/pinjam.php';
		break;
	default:
		include '../pages/dashboard.php';
		break;
}


?>
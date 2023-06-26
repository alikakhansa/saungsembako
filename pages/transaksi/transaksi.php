<section class="">
	<header class="panel-heading">
	</header>
	<?php 
	@$PAGE = $_GET['aksi'];
	switch ($PAGE) {

		case 'konfirmasi':
			include 'konfirmasi.php';
			break;
		case 'detail':
			include 'detail.php';
			break;
		case 'detailtransaksi':
			include 'detailtransaksi.php';
			break;
		default:
			include 'tampil.php';
			break;
	}
	?> 	
</section>

<?php 

	function autonumber($TABEL,$KOLOM,$LEBAR = 0,$AWALAN){


		include 'koneksi.php';


		

		$AUTO 	= mysqli_query($koneksi,"SELECT $KOLOM FROM $TABEL order by $KOLOM desc limit 1")
		or die(mysqli_error());

		$JUMLAH_RECORD	= mysqli_num_rows($AUTO); 

		if ($JUMLAH_RECORD = 0)

		$NOMOR = 1;

		else {

			$ROW 	= mysqli_fetch_array($AUTO);
			$NOMOR	= intval(substr($ROW[0],strlen($AWALAN)))+1;


		}

		if ($LEBAR > 0) {
			

				$ANGKA 	= $AWALAN.str_pad($NOMOR,$LEBAR,"0",STR_PAD_LEFT);

		}

		else

			$ANGKA = $AWALAN.$NOMOR;

		return $ANGKA;

	}
 ?>
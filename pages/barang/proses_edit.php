<?php
ob_start();
include '../inc/koneksi.php';

$ID = $_POST['ID_BARANG'];
$NAMA = $_POST['NAMA'];
$HARGA = $_POST['HARGA'];
$ID_JENIS = $_POST['ID_JENIS'];

if (isset($_FILES['IMG']) && $_FILES['IMG']['error'] === UPLOAD_ERR_OK) {
	echo "OK!!";
    $IMG_FILE = $_FILES['IMG'];
    $IMG = $IMG_FILE['name'];

    $tempFile = $IMG_FILE['tmp_name'];
    $targetFile = __DIR__ . "/img/$IMG";

    if (move_uploaded_file($tempFile, $targetFile)) {
        echo "Image saved successfully.";
    } else {
        echo "Failed to save the image.";
    }
} else {
    $GET_CURRENT_IMG = "SELECT IMG FROM `barang` WHERE ID_BARANG='$ID'";
    $CURRENT_IMG = mysqli_query($koneksi, $GET_CURRENT_IMG) or die('Gagal Memasukan Data Baru' . mysqli_error($koneksi));
    $row = mysqli_fetch_assoc($CURRENT_IMG);
    $IMG = $row['IMG'];
}

if ($NAMA == "" || $HARGA == "" || $ID_JENIS == "" || $IMG == "") {
    // Handle the case when required fields are empty
} else {
    $QUERY = mysqli_query($koneksi, "UPDATE `barang` SET 
                                        `ID_JENIS` = '$ID_JENIS', 
                                        `NAMA` = '$NAMA', 
                                        `HARGA` = '$HARGA', 
                                        `IMG` = '$IMG' 
                                      WHERE ID_BARANG = '$ID'")
        or die('Gagal Memasukan Data Baru' . mysqli_error($koneksi));


        if($QUERY1){
			echo '<script>alert("Gagal Edit data."); document.location="index.php?page=barang";</script>';
		}else{
			echo '<script>alert("Berhasil Edit data."); document.location="index.php?page=barang";</script>';
		}
        }

 ?>

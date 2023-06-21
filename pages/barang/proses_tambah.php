<?php
ob_start();
include '../../inc/koneksi.php';

$NAMA = $_POST['NAMA'];
$HARGA = $_POST['HARGA'];
$ID_JENIS = $_POST['ID_JENIS'];

if (isset($_FILES['IMG']) && $_FILES['IMG']['error'] === UPLOAD_ERR_OK) {
    $IMG_FILE = $_FILES['IMG'];
    $IMG = $IMG_FILE['name'];

    if ($NAMA == "" || $HARGA == "" || $ID_JENIS == "" || $IMG == "") {
        // Handle the case when required fields are empty
    } else {
        $tempFile = $IMG_FILE['tmp_name'];
        $targetFile = __DIR__ . "/img/$IMG";

        if (move_uploaded_file($tempFile, $targetFile)) {
            echo "Image saved successfully.";
        } else {
            echo "Failed to save the image.";
        }

        $QUERY1 = mysqli_query($koneksi, "INSERT INTO barang SET
            NAMA = '$NAMA',
            HARGA = '$HARGA',
            ID_JENIS = '$ID_JENIS',
            IMG = '$IMG';")
            or die('Gagal Memasukan Data Baru' . mysqli_error($koneksi));
    }
    
    if ($QUERY1) {
        echo '<script>alert("Berhasil menambahkan data."); document.location="../../pemilik/index.php?page=barang";</script>';
    } else {
        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data (DB ERROR).</div>';
    }
} else {
   echo '<div class="alert alert-warning">Gagal mengambil data foto.</div>';
}
?>

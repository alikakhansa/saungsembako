
<!-- page start-->
        <section class="">
            <header class="panel-heading">
            </header>
            <?php
            @$page = $_GET['aksi'];
            switch ($page) {
                case 'tambah':
                    include "tambah.php";
                    break;
                case 'edit':
                    include "edit.php";    
                    break;
                case 'selengkapnya':
                    include "selengkapnya.php";
                    break;
                case 'detail':
                    include "laporan_detail.php";
                    break;
                case 'hapus':
                    include "hapus.php";
                    break;
                case 'proses_hapus':
                    include "proses_hapus.php";
                    break;
                default:
                    include "tampil.php";
                    break;
            }
            ?>
        </section>
<!-- page end-->

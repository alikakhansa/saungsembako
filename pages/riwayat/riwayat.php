
<!-- page start-->
        <section class="">
            <header class="panel-heading">
            </header>
            <?php
            @$page = $_GET['aksi'];
            switch ($page) {
                default:
                    include "tampil.php";
                    break;
            }
            ?>
        </section>
<!-- page end-->

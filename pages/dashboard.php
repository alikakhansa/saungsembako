
     <?php  
      $QUERY = mysqli_query ($koneksi, "SELECT * FROM users WHERE USERNAME='".$_SESSION['USERNAME']."'");
      while ($DATA=mysqli_fetch_array($QUERY)) 
      $NIP = $DATA['EMAIL'];
      {
        $QUERY = mysqli_query ($koneksi, "SELECT * FROM users WHERE users.EMAIL='$NIP'");
        while ($DATA2=mysqli_fetch_array($QUERY)) 
        if ($_SESSION['USERNAME']) 
        {
          if ($_SESSION['LEVEL']== "PEMILIK") 
          {

            }else if ($_SESSION['LEVEL']== "KASIR") 
            {
               Echo "
            <div class='alert alert-info alert-dismissible fade show' role='alert'>
               
                <h3>$DATA2[EMAIL]</h3>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>

                <div class='row'>
                    <div class='col-md-12 col-xl-3'>
                        <div class='card m-b-30'>
                            <div class='card-body '>
                                <div class='d-flex row'>
                                    <div class='col-3 align-self-center'>
                                        <div class='round'>
                                            <i class='mdi mdi-account-multiple-plus text-white'></i>
                                        </div>
                                    </div>
                                    <div class='col-6 ml-auto align-self-center text-center'>
                                        <div class='m-l-10 text-white-50 float-right'>
                                            <h5 class='mt-0 round-inner'>15321</h5>
                                            <p class='mb-0 '>Transaksi</p>                                                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

               ";
           }else if ($_SESSION['LEVEL']== "PEMILIK") 
            {
               Echo "
            <div class='alert alert-info alert-dismissible fade show' role='alert'>
               
                <h3>$DATA2[EMAIL]</h3>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>

                <div class='row'>
                    <div class='col-md-12 col-xl-3'>
                        <div class='card m-b-30'>
                            <div class='card-body '>
                                <div class='d-flex row'>
                                    <div class='col-3 align-self-center'>
                                        <div class='round'>
                                            <i class='mdi mdi-account-multiple-plus text-white'></i>
                                        </div>
                                    </div>
                                    <div class='col-6 ml-auto align-self-center text-center'>
                                        <div class='m-l-10 text-white-50 float-right'>
                                            <h5 class='mt-0 round-inner'>15321</h5>
                                            <p class='mb-0 '>DATA BARANG</p>                                                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-md-12 col-xl-3'>
                        <div class='card m-b-30'>
                            <div class='card-body '>
                                <div class='d-flex row'>
                                    <div class='col-3 align-self-center'>
                                        <div class='round'>
                                            <i class='mdi mdi-google-physical-web text-primary'></i>
                                        </div>
                                    </div>
                                    <div class='col-6 ml-auto align-self-center text-center'>
                                        <div class='m-l-10 text-white-50 float-right'>
                                            <h5 class='mt-0 round-inner'>822</h5>
                                            <p class='mb-0 '>DATA SISWA </p>                                                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-md-12 col-xl-3'>
                        <div class='card m-b-30'>
                            <div class='card-body '>
                                <div class='d-flex row'>
                                    <div class='col-3 align-self-center'>
                                        <div class='round'>
                                            <i class='mdi mdi-basket text-white'></i>
                                        </div>
                                    </div>
                                    <div class='col-6 ml-auto align-self-center text-center'>
                                        <div class='m-l-10 text-white-50 float-right'>
                                            <h5 class='mt-0 round-inner'>6487</h5>
                                            <p class='mb-0 '>PEMINJAMAN</p>                                                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class='col-md-12 col-xl-3'>
                        <div class='card m-b-30'>
                            <div class='card-body '>
                                <div class='d-flex row'>
                                    <div class='col-3 align-self-center'>
                                        <div class='round'>
                                            <i class='mdi mdi-basket text-white'></i>
                                        </div>
                                    </div>
                                    <div class='col-6 ml-auto align-self-center text-center'>
                                        <div class='m-l-10 text-white-50 float-right'>
                                            <h5 class='mt-0 round-inner'>6487</h5>
                                            <p class='mb-0 '>PENGEMBALIAN</p>                                                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

               ";
            
            }
        }
        

};
?>
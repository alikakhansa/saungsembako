<style>
   .container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      padding: 20px;
   }
   .text {
      grid-column: 1;
   }
   .card:hover {
      background-color: #ebeae4;
   }
</style>
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
               echo "
                <div class='alert alert-info alert-dismissible fade show' role='alert' style='width: 95%; margin: 10px auto;'>
                     <h3>$DATA2[EMAIL]</h3>
                  </div>

                <div class='row' style='width: 96%; margin: 10px auto;'>
                     <div class='col-md-12 col-xl-3' style='margin-top:20px;'>
                        <div class='card m-b-30'>
                           <div class='card-body'>
                              <div class='container' style='text-align:center;'>
                                 <div class='text'>
                                    <p style='margin-top: 5px; font-size: 18px;'>Transaksi</p>
                                 </div>
                                 <div>
                                    <h2 style='font-family: 'Slabserif', serif; font-size: 24px;'>123</h2>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                    </div>

               ";
           }else if ($_SESSION['LEVEL'] == "PEMILIK") {
               echo "
                  <div class='alert alert-info alert-dismissible fade show' role='alert' style='width: 95%; margin: 10px auto;'>
                     <h3>$DATA2[EMAIL]</h3>
                  </div>
   
                  <div class='row' style='width: 96%; margin: 10px auto;'>
                     <div class='col-md-12 col-xl-3' style='margin-top:20px;'>
                        <div class='card m-b-30'>
                           <div class='card-body'>
                              <div class='container' style='text-align:center;'>
                                 <div class='text'>
                                    <p style='margin-top: 5px; font-size: 18px;'>Data Barang</p>
                                 </div>
                                 <div>
                                    <h2 style='font-family: 'Slabserif', serif; font-size: 24px;'>123</h2>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
   
                     <div class='col-md-12 col-xl-3' style='margin-top:20px;'>
                        <div class='card m-b-30'>
                           <div class='card-body'>
                              <div class='container' style='text-align:center;'>
                                 <div class='text'>
                                    <p style='margin-top: 5px; font-size: 18px;'>Jenis Barang</p>
                                 </div>
                                 <div>
                                    <h2 style='font-family: 'Slabserif', serif; font-size: 24px;'>123</h2>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
   
                     <div class='col-md-12 col-xl-3' style='margin-top:20px;'>
                        <div class='card m-b-30'>
                           <div class='card-body'>
                              <div class='container' style='text-align:center;'>
                                 <div class='text'>
                                    <p style='margin-top: 5px; font-size: 18px;'>User</p>
                                 </div>
                                 <div>
                                    <h2 style='font-family: 'Slabserif', serif; font-size: 24px;'>123</h2>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
   
                     <div class='col-md-12 col-xl-3' style='margin-top:20px;'>
                        <div class='card m-b-30'>
                           <div class='card-body'>
                              <div class='container' style='text-align:center;'>
                                 <div class='text'>
                                    <p style='margin-top: 5px; font-size: 18px;'>Total Transaksi juni</p>
                                 </div>
                                 <div>
                                    <h2 style='font-family: 'Slabserif', serif; font-size: 24px;'>123</h2>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
   
                     <div class='col-md-12 col-xl-3' style='margin-top:20px;'>
                        <div class='card m-b-30'>
                           <div class='card-body'>
                              <div class='container' style='text-align:center;'>
                                 <div class='text'>
                                    <p style='margin-top: 5px; font-size: 18px;'>Transaksi Terbanyak</p>
                                 </div>
                                 <div>
                                    <h2 style='font-family: 'Slabserif', serif; font-size: 24px;'>123</h2>
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
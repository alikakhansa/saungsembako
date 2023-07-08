<?php
   @session_start();
   include "../inc/koneksi.php";
   if (@$_SESSION['USERNAME']) {
       if (@!$_SESSION['LEVEL'] == "PEMILIK") {
           header("location:../pemilik/index.php");
       } else {
           if (@$_SESSION['LEVEL'] == "KASIR") {
               header("location:../kasir/index.php");
           }
       }
   } else {
       header("location:../inc/login.php");
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
      <style>
         table {
         border-collapse: collapse;
         width: 80%;
         margin: 0 auto;
         }
         th,
         td {
         padding: 12px;
         text-align: left;
         border-bottom: 1px solid #ddd;
         }
         tr:hover {
         background-color: #f5f5f5;
         }
         th {
         background-color: #4CAF50;
         color: white;
         }
         .box {
         border: 1px solid black;
         padding: 5px;
         width: 90%;
         margin: 0 auto;
         border-radius: 5px;
         }
         #search-box {
         margin-bottom: 10px;
         }
         .menu {
         display: flex;
         justify-content: space-between;
         align-items: center;
         }
         .menu {
         display: flex;
         justify-content: space-between;
         align-items: center;
         }
         .menu a {
         margin-right: 10px;
         }
         .dropdown {
         position: relative;
         }
         .dropdown .dropbtn {
         padding: 0;
         border: none;
         background: none;
         cursor: pointer;
         }
         .dropdown:hover .dropdown-content {
         display: block;
         }
         .dropdown-content {
         display: none;
         position: absolute;
         top: 100%;
         right: 0;
         min-width: 200px;
         padding: 10px; 
         background-color: #fff; 
         box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
         z-index: 1; 
         border-radius: 5px;
         margin-top: 2px;
         }
         .dropdown-content li {
         list-style-type: none; 
         }
         .dropdown-content a {
         display: block;
         padding: 5px 0;
         color: #333; 
         text-decoration: none;
         }
         .dropdown-content a:hover {
         background-color: transparent;
         }
         .sticky-header {
         position: sticky;
         top: 0;
         background-color: #ffffff;
         }
      </style>
   </head>
   <body>
      <header class="sticky-header">
         <div class="header">
            <div class="header-logo" style="margin-left:20px;">
               <img src="../assets/images/logoheader.png" alt="Logo">
            </div>
            <div class="dropdown">
               <button class="dropbtn" onclick="toggleDropdown()"> <img src="../assets/images/user.png" alt="Logo 2" style="margin-right: 50px;"></button>
               <div class="dropdown-content" id="dropdownMenu">
                  <a href="../inc/logout.php">Logout</a>
               </div>
            </div>
            <button class="btn btn-primary material-icons" id="hamburger-mobile" onclick="toggleHamburgerMobile()">menu</button>
         </div>
         <div class="header-options mobile-hide" id="navigation" style="margin-bottom: 20px;">
            <div class="menu">
               <?php
                  @$PAGE = $_GET['page'];
                  ?>
               <a href="index.php"><i class="mdi mdi-airplay"></i>Dashboard</a>
               <a href="?page=barang" <?php if ($PAGE=="barang") { ?> class="active" <?php  } ?>>Barang</a>
               <a href="?page=jenis_barang" <?php if ($PAGE=="jenis_barang") { ?> class="active" <?php  } ?>><i class="fa fa-user"></i> <span>Jenis Barang</span></a>
               <a href="?page=user" <?php if ($PAGE=="user") { ?> class="active" <?php  } ?>><i class="fa fa-user"></i> <span>User</span></a>
               <div class="dropdown">
                  <a href="#" style="margin-top: 50px;">Transaksi</a>
                  <div class="dropdown-content">
                     <a href="?page=riwayat">Riwayat Transaksi</a>
                     <a href="../pages/laporan/cetak_transaksi.php" target="_blank">Cetak Transaksi</a>
                  </div>
               </div>
            </div>
         </div>
         <?php include "../inc/menu.php" ?>
         <?php include "../inc/kode.php" ?>
      </header>
   </body>
   <script>
      var header = document.querySelector('.sticky-header');
      
      function stick() {
          header.classList.add('sticky');
          console.log('sticking header');
      }
      
      function unstick() {
          header.classList.remove('sticky');
          console.log('unstick header');
      }
      
      window.addEventListener('scroll', function() {
          var scrollPosition = window.scrollY;
      
          if (scrollPosition >= header.offsetHeight) {
              stick();
          } else {
              unstick();
          }
      })
      
      function toggleHamburgerMobile() {
          var div = document.getElementById("navigation");
          div.classList.toggle("mobile-hide");
      }
      
      function toggleDropdown() {
          var dropdown =document.getElementById("dropdownMenu");
          dropdown.classList.toggle("show");
      }
      
      window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
              var dropdowns = document.getElementsByClassName("dropdown-content");
              var i;
              for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                      openDropdown.classList.remove('show');
                  }
              }
          }
      }
      
   </script>
</html>
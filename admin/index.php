<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <style>
    .header {
        background-color: #303F9F;
        color: white;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-height: 8%;
    }
    .header-logo {
        display: flex;
        align-items: center;
    }
    .header-logo img {
        height: 40px;
        margin-right: 10px;
    }
    .header-text {
        font-size: 20px;
    }
    .header-user {
        display: flex;
        align-items: center;
    }
    .header-user .material-icons {
        margin-right: 5px;
    }
    .header-options {
        background-color: #303F9F;
        display: flex;
        /* justify-content: space-between; */
        padding-top: 10px;
        padding-bottom: 4px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    .header-options .btn {
        margin-left: 1%;
    }

    .uname {
        padding-left: 4px;
        padding-right: 8px;
    }

    #hamburger-mobile {
        display: none;
    }

    .sticky-header {
            position: relative;
        }
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    /* Mobile Styles */
    @media (max-width: 767px) {
        .header-text, .header-user {display: none;}

        .header-user .material-icons {
            margin-right: 0;
            margin-bottom: 5px;
        }
        .header-options {
            flex-wrap: wrap;
            padding-top: 20px;
        }
        .header-options .btn {
            margin-right: 10px;
            margin-bottom: 10px;
            flex-basis: 45%;
        }
        #hamburger-mobile {
            display: flex;
        }
        .mobile-hide {
            display: none;
        }
    }

  </style>
</head>
<body>
    <header class="sticky-header">
        <div class="header">
            <div class="header-logo">
                <img src="../assets/images/logosaung.png" alt="Logo">
            </div>
            <div class="header-text">Admin Sembako</div>
            <div class="header-user">Halo, $username!</div>
            <button class="btn btn-primary material-icons" id="hamburger-mobile" onclick="toggleHamburgerMobile()">menu</button>  
            
        </div>
        <div class="header-options mobile-hide" id="navigation">
            <button class="btn btn-primary active"><span class="material-icons">dashboard</span> Dashboard</button>
            <button class="btn btn-primary"><span class="material-icons">shopping_cart</span> Barang</button>
            <button class="btn btn-primary"><span class="material-icons">category</span> Jenis Barang</button>
            <button class="btn btn-primary"><span class="material-icons">person</span> User</button>
            <button class="btn btn-primary"><span class="material-icons">description</span> Laporan</button>
            <button class="btn btn-warning"><span class="material-icons">logout</span> Keluar</button>
        </div>
    </header>
    <main>
        <div style="height: 100px; background-color: red;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: green;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: blue;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: red;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: green;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: blue;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: red;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: green;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: blue;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: red;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: green;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: blue;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: red;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: green;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: blue;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: red;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: green;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: blue;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: red;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: green;"><center><h1>INI CONTENT</h1></center></div>
        <div style="height: 100px; background-color: blue;"><center><h1>INI CONTENT</h1></center></div>
    </main>
</body>
<script>
    var header = document.querySelector('.sticky-header');

    function stick () {
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
</script>
</html>

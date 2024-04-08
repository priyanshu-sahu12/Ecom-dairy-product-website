<?php 
include('../includes/connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout page </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-secondary">
    <!-- navbar -->
    <div class="container-fluid nav-1 p-0 bg-primary">
    <nav class="navbar navbar-expand-lg">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#"><img src="" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="user_registrationn.php">Register</a>
        </li>
     
      </ul>
      </div>
    
     ?></sup></a></h2>
    </div>
  </div>
</nav>
    </div>

    <!-- calling cart function -->
    




    <!-- end of Navbar-->

  <!-- navbar-2 -->

  <!-- <nav class="navbar navbar-expand-lg navbar-dark navbar-2">
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Welcome guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
    </ul>
</nav> -->
<!-- End Of Nav Bar -2 -->
<!-- hero section -->


<!-- home section -->


    <div class="row px-1">
        <div class="col-md-12">
            <div class="row">
                <!-- products -->
                <?php
              if(!isset($_SESSION['username'])){
                include('user_login.php');
              }else{
                include('payment.php');
              }



            ?>
            </div>

        </div>
    </div>
</div>
       


<!-- footer -->

<!-- <nav class="navbar navbar-expand-lg navbar-dark navbar-2">
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">copyright</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
    </ul>
</nav> -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
include('includes/connection.php');
include('Functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dairy Product </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
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
          <a class="nav-link" href="/user/user_registration.php">Register</a>
        </li>
        <form class="d-flex" role="search" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_product">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_item">
        
      </form>
      </ul>
      </div>
     <h2> <a href="#" class="cart-1"><i class="fa-solid fa-cart-shopping"></i> <sup><?php 
                cart_number();
     ?></sup></a></h2>
    </div>
  </div>
</nav>
    </div>
    <!-- end of Navbar-->

  <!-- navbar-2 -->

  <nav class="navbar navbar-expand-lg navbar-dark navbar-2">
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Welcome guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user/user_login.php">Login</a>
        </li>
    </ul>
</nav>
<!-- End Of Nav Bar -2 -->
<!-- hero section -->


<!-- home section -->

 <div class="container-fluid home-1">
     <div class="row">
       <?php  
     search_product();
      ?> 
        
     </div>
</div> 
       


<!-- footer -->

<nav class="navbar navbar-expand-lg navbar-dark navbar-2">
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">copyright</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
    </ul>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
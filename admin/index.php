<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
        .hap-1{
            height: 100px;
        }
    </style>
    
</head>
<body>
    <!-- navbar 1-->
    <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a href="#" class="nav-link text-light">Welcome Guest</a>
      </div>
    </div>
  </div>
</nav>

<!-- navbar2 -->
  <div class="bg-light">
    <h3 class="p-2 text-center">Manage Detailes</h3>
  </div>

  <!-- main-body -->

  <div class="row">
    <div class="col-md-12 bg-secondary p-4 hap-1">
       <div class="button text-center">
       <button><a href="insert_product.php" class="nav-link bg-info text-light p-1 ">Insert Products</a></button>
       <button><a href="" class="nav-link bg-info text-light p-1 ">View Products</a></button>
       <button><a href="index.php?insert_brand" class="nav-link bg-info text-light p-1">Insert Brands</a></button>
       <button><a href="" class="nav-link bg-info text-light p-1">View Brands</a></button>
       <button><a href="" class="nav-link bg-info text-light p-1">All Payments</a></button>
       <button><a href="" class="nav-link bg-info text-light p-1">All orders</a></button>
       <button><a href="" class="nav-link bg-info text-light p-1">All Users</a></button>

       </div>
    </div>
  </div>
  <div class="bg-light">
    <h3 class="p-2 text-center"><button><a href="" class="nav-link bg-info text-light p-1">Logout</a></button></h3>
  </div>

  <!-- insert brands -->
    <div class="container my-5">
        <?php 
             if(isset($_GET['insert_brand'])){
                include('insert_brand.php');
             }
        ?>
    </div>

  <!-- footer -->


  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
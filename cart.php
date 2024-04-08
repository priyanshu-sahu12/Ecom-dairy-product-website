<?php 
include('includes/connection.php');
include('Functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
            width:100px;
            height:100px;
        }
        .checkout{
            text-decoration:none;
        }
    </style>
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
          <a class="nav-link" href="#">Register</a>
        </li>
       
      </ul>
      </div>
     <h2> <a href="cart.php" class="cart-1"><i class="fa-solid fa-cart-shopping"></i> <sup><?php 
                cart_number();
     ?></sup></a></h2>
    </div>
  </div>
</nav>
    </div>

    <!-- calling cart function -->
    <?php 
       cart();
    ?>




    <!-- end of Navbar-->

  <!-- navbar-2 -->

  <nav class="navbar navbar-expand-lg navbar-dark navbar-2">
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Welcome guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
    </ul>
</nav>
<!-- End Of Nav Bar -2 -->
<!-- hero section -->


<!-- home section -->

<div class="container pt-5">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
                <!-- php code -->
                <?php 
                
                

                global $con;
                $get_ip_add = getIPAddress();
                $total_price=0;
                $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                $result=mysqli_query($con,$cart_query);
                $count_cart=mysqli_num_rows($result);
                while($row=mysqli_fetch_array($result)){
                    $product_id=$row['cart_id'];
                    $select_product="Select * from `products` where product_id='$product_id'";
                    $result_products=mysqli_query($con,$select_product);
                    
                    if(mysqli_num_rows($result_products) > 0){
                        while($row_product_price=mysqli_fetch_array($result_products)){
                            $product_price=array($row_product_price['product_price']);
                            $price_table=$row_product_price['product_price'];
                            $product_title=$row_product_price['product_title'];
                            $product_image1=$row_product_price['product_image1'];
                            $product_values=array_sum($product_price);
                            $total_price+=$product_values;
                     
                
                ?>
                
            
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="<?php echo $product_image1 ?>"class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php 
                    $get_ip_add = getIPAddress();
                    if(isset($_POST['update_cart'])){
                        $quantity=$_POST['qty'];
                        $update_cart="update `cart_details` set quantity=$quantity where ip_address='$get_ip_add'";
                        $update_result=mysqli_query($con,$update_cart);
                        $total_price=$total_price*$quantity;
                    }
                    
                    ?>
                    <td><?php echo $price_table ?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>" ></td>
                    <td class="d-flex">
                        
                        <input type="submit" value="Update cart" name="update_cart" class="btn bg-secondary text-light px-3 py-2 mx-3">
                        <input type="submit" value="remove cart" name="remove_cart" class="btn bg-secondary text-light px-3 py-2 mx-3">
                    </td>
                </tr>
             <?php }
                    }
                }?>
        
            
        
            </tbody>
        </table>

        <div class="d-flex mb-5">
            <h4 class="px-3">Total : <strong class="text-info"><?php echo $total_price  ?> Rs<strong></h4>
            <a href="index.php"><button class="btn bg-secondary text-light">Continue Shopping</button></a>
           <button class="btn bg-secondary text-light"> <a href="./user/checkout.php" class="text-light checkout">CheckOut</a></button>
        </div>
    </div>
</div>
</form>

<!-- function for removing cart item -->

<?php 
function remove_cart(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach ($_POST['removeitem'] as $remove_id) {
           echo $remove_id;
           $delete_query="DELETE FROM `cart_details` where cart_id=$remove_id";
           $run_delete=mysqli_query($con,$delete_query);
           if($run_delete){
            echo "<script>window.open('cart.php','_self')</script>";
           }
    }
}
}
echo $remove_item=remove_cart();
?>
       


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
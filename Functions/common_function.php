<?php

// include('./includes/connection.php');

// getting products

function getproducts(){
    global $con;
    $select_query="Select * from `products` order by rand() limit 0,8";
    $result_query=mysqli_query($con,$select_query);
    // $row=mysqli_fetch-assoc($result_query);
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) { 
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $brand_id=$row['brand_id'];
      echo "<div class='col-md-3 card-1'>
      <div class='card' style='width: 18rem;'>
         <img src='$product_image1' class='card-img-top' alt='..'>
              <div class='card-body'>
                   <h5 class='card-title'>$product_title</h5>
                   <h5 class='card-title'> $product_price</h5>
                   <p class='card-text'>$product_description</p>
                   <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
              </div>
       </div>
   </div>";
      
    }   
}
// all products
function get_all_products(){
    global $con;
    $select_query="Select * from `products` order by rand()";
    $result_query=mysqli_query($con,$select_query);
    // $row=mysqli_fetch-assoc($result_query);
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) { 
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $brand_id=$row['brand_id'];
      echo "<div class='col-md-3 card-1'>
      <div class='card' style='width: 18rem;'>
         <img src='$product_image1' class='card-img-top' alt='..'>
              <div class='card-body'>
                   <h5 class='card-title'>$product_title</h5>
                   <h5 class='card-title'> $product_price</h5>
                   <p class='card-text'>$product_description</p>
                   <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
              </div>
       </div>
   </div>";
      
    }   
}

// search product

function search_product(){
    global $con;
    if(isset($_GET['search_item'])){
        $search_data=$_GET['search_product'];
    $search_query="Select * from `products` where product_keyword like '%$search_data%'";
    $result_query=mysqli_query($con,$search_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "No results found!";
    }
    while ($row = mysqli_fetch_assoc($result_query)) { 
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $brand_id=$row['brand_id'];
      echo "<div class='col-md-3 card-1'>
      <div class='card' style='width: 18rem;'>
         <img src='$product_image1' class='card-img-top' alt='..'>
              <div class='card-body'>
                   <h5 class='card-title'>$product_title</h5>
                   <h5 class='card-title'> $product_price</h5>
                   <p class='card-text'>$product_description</p>
                   <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
              </div>
       </div>
   </div>";
      
    }   
}
}

// getting ip address function

function getIPAddress(){  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

// cart funtion

function cart(){
 
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add' and cart_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('This Item  Is Already Present In Cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            $insert_query="insert into `cart_details` (cart_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('Item Added in cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


// cart number function

function cart_number(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart=mysqli_num_rows($result_query);
        }else{
            global $con;
            $get_ip_add = getIPAddress();
            $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart=mysqli_num_rows($result_query);
        }
        echo $count_cart;
    }

?>
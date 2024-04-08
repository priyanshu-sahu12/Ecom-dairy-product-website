<?php 
     include('../includes/connection.php');
     if(isset($_POST['insert_product'])){
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keyword=$_POST['product_keyword'];
        $product_brand=$_POST['product_brand'];
        $product_price=$_POST['product_price'];
        $product_status='true';

        // accessing img

        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];

        // accessin tmp img

        $tmp_image1=$_FILES['product_image1']['tmp_name'];
        $tmp_image2=$_FILES['product_image2']['tmp_name'];
        $tmp_image3=$_FILES['product_image3']['tmp_name'];

        // checking condition

        if($product_title=='' or $product_description=='' or $product_keyword=='' or  $product_brand=='' or  $product_price=='' or   $product_image1=='' or  $product_image2=='' or  $product_image3==''){
            echo "<script>alert('Please fill all fields')</script>";
            exit();
        }else{
            move_uploaded_file($tmp_image1,"./product_img/$product_image1");
            move_uploaded_file($tmp_image2,"./product_img/$product_image2");
            move_uploaded_file($tmp_image3,"./product_img/$product_image3");

            // insert query

            $insert_products="insert into `products` (product_title,product_description,product_keyword,brand_id,product_image1,product_image2,product_image3,product_price,status) values (' $product_title',' $product_description','$product_keyword',' $product_brand',' $product_image1',' $product_image2',' $product_image3','$product_price','$product_status')";
            $result_query=mysqli_query($con,$insert_products);
            if($result_query){
                echo "<script>alert('Successfully inserted the product')</script>";
            }
        }
       
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- product title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="name" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" require="required">
            </div>
            <!-- product description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="name" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product description" require="required">
            </div>
            <!-- product keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="name" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product keyword" require="required">
            </div>
             <!-- select brand -->
             <div class="form-outline mb-4 w-50 m-auto">
               <select name="product_brand" class="form-select">
                <option value="">Select Brand</option>
                <?php
                      $select_query="Select * from `brands`";
                      $result_query=mysqli_query($con,$select_query);
                      while ($row = mysqli_fetch_assoc($result_query)) { 
                        $brand_title=$row['brand_name'];
                        $brand_id=$row['brand_id'];
                        echo "  <option value='$brand_id'>$brand_title</option>";
                      }
                ?>
                
               </select>
            </div>

            <!-- prodcut img1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="name" class="form-label">Product Image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"  require="required">
            </div>
            <!-- prodcut img2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="name" class="form-label">Product Image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"  require="required">
            </div>
            <!-- prodcut img3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="name" class="form-label">Product Image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"  require="required">
            </div>
             <!-- product price -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="name" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" require="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
               <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
             
        </form>
    </div>
</body>
</html>
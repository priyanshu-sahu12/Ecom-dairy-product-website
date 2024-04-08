<?php include('../includes/connection.php');
      include('../Functions/common_function.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-secondary">
<div class="container-fluid my-4">
    <h2 class="text-center text-light">New Registration</h2>
    <div class="row d-flex align-item-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- username -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label text-light">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter Your Name" autocomplete="off" required="required" name="user_username"/>
                </div>
                <!-- email -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label text-light">Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="user_email"/>
                </div>
                <!-- mobile -->
                <div class="form-outline mb-4">
                    <label for="user_mobile" class="form-label text-light">Mobile Number</label>
                    <input type="number" id="user_mobile" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off" required="required" name="user_mobile"/>
                </div>
                <!-- password -->
                <div class="form-outline mb-4">
                    <label for="user_password1" class="form-label text-light">Password</label>
                    <input type="password" id="user_password1" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password1"/>
                </div>
                <!-- confirm password -->
                <div class="form-outline mb-4">
                    <label for="user_password2" class="form-label text-light">Confirm Password</label>
                    <input type="password" id="user_password2" class="form-control" placeholder="Enter Your Confirm Password" autocomplete="off" required="required" name="user_password2"/>
                </div>
                

                <div class="text-center">
                    <input type="submit" value="Register" class="btn bg-danger text-light" name="user_register">
                    <p class="text-light mt-4">Already have an account?<a href="user_login.php" class="text-decoration-none text-info">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- php code -->

<?php
if(isset($_POST['user_register'])){
    $name = $_POST['user_username'];
    $email = $_POST['user_email'];
    $phone = $_POST['user_mobile'];
    $pass_1 = $_POST['user_password1'];
    $pass_2 = $_POST['user_password2'];
    $hash_pass = password_hash($pass_2,PASSWORD_DEFAULT);
    $user_ip = getIPAddress();
    // check if user already exists or not
    $sql = "SELECT * FROM `user_table` WHERE username='$name' or user_mobile='$phone' or user_email='$email'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0){
        echo "<script>alert('User Already Exist')</script>";
    }elseif($pass_1!=$pass_2){
        echo "<script>alert('Passwords Do Not Match')</script>";
    }
    
    else{


//    insert query
    $insert_query = "INSERT into `user_table` (username,user_password,user_email,user_mobile,user_ip) values ('$name','$hash_pass','$email','$phone','$user_ip')";
    $sql_result=mysqli_query($con,$insert_query);
    if($sql_result){
        echo "<script>alert('Registration Successful')</script>";
    }
}
}
?>
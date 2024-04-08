<?php include('../includes/connection.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-secondary">
<div class="container-fluid my-4">
    <h2 class="text-center text-light">User Login</h2>
    <div class="row d-flex align-item-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post">
                <!-- username -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label text-light">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter Your Name" autocomplete="off" required="required" name="user_username"/>
                </div>
                
                
                <!-- password -->
                <div class="form-outline mb-4">
                    <label for="user_password1" class="form-label text-light">Password</label>
                    <input type="password" id="user_password1" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password1"/>
                </div>

                

                <div class="text-center">
                    <input type="submit" value="Login" class="btn bg-danger text-light" name="user_login">
                    <p class="text-light mt-4">Don't have an account?<a href="user_registration.php" class="text-decoration-none text-info">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- php code for login -->

<?php
if(isset($_POST['user_login'])){
    $username = $_POST['user_username'];
    $password = $_POST['user_password1'];
    
    $select_query = "SELECT * from `user_table` where username='$username'" ;
    $select_query_result = mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($select_query_result);
    $row_data=mysqli_fetch_assoc($select_query_result);
    if($row_count>0){
        if(password_verify($password,$row_data['user_password'])){
            echo "<script>alert('Successfully Login')</script>";
        }else{
            echo "<script>alert('Invalid Password')</script>";
        }
    }else{
        echo "<script>alert('Invalid Username')</script>";
    }
}

?>
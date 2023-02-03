<?php

include('connect.php');
include('common_function.php');
session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

    <style>
      .logo{

width: 7%;
height: 7%;
}

.text-center{

color: red;
}

      .cart_img {

width: 50px;
height: 50px;
object-fit: contain;
}
    </style>

</head>
<body>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container-fluid">
    <img src="SLflag.jpg" class="logo">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"> 
          <a class="nav-link active" href="index.php">HOME <i class="fa-solid fa-home"></i> </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="user_registration.php">REGISTER <i class="fa-solid fa-user"></i> </a> 
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="shop.php">SHOP <i class="fa-solid fa-shopping-bag"></i> </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active" href="#">CONTACT US <i class="fa-solid fa-phone"></i> </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active" href="cart.php">CART <i class="fa-solid fa-cart-shopping"></i><sup><?php
          cart_item(); ?></sup></a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="cart.php">TOTAL PRICE: <?php total_cart_price() ; ?> SL ($<?php total_cart_dollar() ?>) </a>
        </li>
        
        
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!--<button class="btn btn-outline-success" type="submit">SEARCH</button> -->
        <input type="submit" value="Search" class="btn btn-outline-success" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<?php

cart();

?>

<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <ul class="navbar-nav me-auto">

       
    <?php
          if(!isset($_SESSION['username'])){

            echo " <li class='nav-item'>
            <a class='nav-link bg-success' href='#'>WELCOME GUEST</a>
        </li>";
       
        
         
          }else{
  
            echo "<li class='nav-item'>
            <a class='nav-link bg-white' href='#'>WELCOME ".$_SESSION['username']." </a>
        </li>";

        
  
  
          }
        if(!isset($_SESSION['username'])){

          echo " <li class='nav-item'>
          <a class='nav-link bg-white' href='user_login.php'>LOGIN</a>
      </li>";
          
       
        }else{

          echo "<li class='nav-item'>
          <a class='nav-link bg-white' href='logout.php'>Logout</a>
      </li>";


        }

        ?>
    </ul>
</nav>

<br><br>

<div class="container-fluid">
    <h2 class="text-center">NEW USER REGISTRATION</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">USERNAME</label>
                    <input type="text" id="user_name" class="form-control" placeholder="Enter your username"
                    autocomplete="off" required="required" name="user_username"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">EMAIL</label>
                    <input type="text" id="user_email" class="form-control" placeholder="Enter your email"
                    autocomplete="off" required="required" name="user_email"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">USER IMAGE</label>
                    <input type="file" id="user_image" class="form-control" 
                    required="required" name="user_image"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">PASSWORD</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
                    autocomplete="off" required="required" name="user_password"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">CONFIRM PASSWORD</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password"
                    autocomplete="off" required="required" name="conf_user_password"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">ADDRESS</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter your address"
                    autocomplete="off" required="required" name="user_address"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">CONTACT</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number"
                    autocomplete="off" required="required" name="user_contact"/>
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-success py-2 px-3 border-0" name="user_register"/>
                    <p class="small fw-bold mt-2 pt-1 mb-0">ALREADY HAVE AN ACCOUNT? <a href="user_login.php" class="text-danger">LOGIN</a></p>
                </div>
                

                </div>
            </form>
        </div>
    </div>
</div>
<br><br>

<?php
if(isset($_POST['user_register'])){

  $user_username=$_POST['user_username'];
  $user_email=$_POST['user_email'];
  $user_password=$_POST['user_password'];
  $hash_password=password_hash($user_password, PASSWORD_DEFAULT);
  $conf_user_password=$_POST['conf_user_password'];
  $user_address=$_POST['user_address'];
  $user_contact=$_POST['user_contact'];
  $user_image=$_FILES['user_image']['name'];
  $user_image_tmp=$_FILES['user_image']['tmp_name'];
  $user_ip=getIPAddress();

  $select_query="Select * from user_table where username='$user_username' or user_email='$user_email'";
  $result=mysqli_query($con, $select_query);
  $rows_count=mysqli_num_rows($result);
  if($rows_count>0){

    echo "<script>alert('DENIED: USERNAME AND EMAIL ALREADY EXIST')</script>";
  
  }else if($user_password!=$conf_user_password){
    echo "<script>alert('Passwords do not match')</script>";
  }
  
  else{
  
  move_uploaded_file($user_image_tmp, "Products/$user_image");
  $insert_query="insert into user_table (username, user_email, user_password,
  user_image, user_ip, user_address, user_mobile) values
  ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
  $sql_execute=mysqli_query($con, $insert_query);
  }

$select_cart_items="Select * from cart_details where ip_address='$user_ip'";
$result_cart=mysqli_query($con, $select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){

  $_SESSION['username']=$user_username;

  echo "<script>alert('You have items in your cart')</script>";
  echo "<script>window.open('checkout.php', '_self')</script>";
}else{
  echo "<script>window.open('index.php', '_self')</script>";
}
}








?>





















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>



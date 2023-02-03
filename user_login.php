<?php

include('connect.php');
include('common_function.php');
@session_start();
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
    <link rel="stylesheet" href="aynite.css">

    <style>

      body{
        overflow-x:hidden;
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
        <?php

        
        if(isset($_SESSION['username'])){
          echo "<li class='nav-item'><a class='nav-link' href='profile.php'>".$_SESSION['username']."</a></li>";
        }else{
          echo  "<li class='nav-item'>
          <a class='nav-link active' href='user_registration.php'>REGISTER <i class='fa-solid fa-id-card'></i> </a> 
        </li>";
        }




?>
        

        <li class="nav-item">
          <a class="nav-link active" href="user_login.php">PROFILE <i class="fa-solid fa-user"></i> </a> 
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
    <h2 class="text-center">USER LOGIN</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">USERNAME</label>
                    <input type="text" id="user_name" class="form-control" placeholder="Enter your username"
                    autocomplete="off" required="required" name="user_username"/>
                </div>
         
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">PASSWORD</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
                    autocomplete="off" required="required" name="user_password"/>
                </div>
      
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-success py-2 px-3 border-0" name="user_login"/>
                    <p class="small fw-bold mt-2 pt-1 mb-0">DON'T HAVE AN ACCOUNT? <a href="user_registration.php" class="text-danger">LOGIN</a></p>
                </div>
                

                </div>
            </form>
        </div>
    </div>
</div>
<br><br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

<?php


if(isset($_POST['user_login'])){

  $user_username=$_POST['user_username'];
  $user_password=$_POST['user_password'];

  $select_query="Select * from user_table where username='$user_username'";
  $result=mysqli_query($con, $select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);
  $user_ip=getIPAddress();
  
  $select_query_cart="Select * from cart_details where ip_address='$user_ip'";
  $select_cart=mysqli_query($con, $select_query_cart);
  $row_count_cart=mysqli_num_rows($select_cart);
  if($row_count>0){

    $_SESSION['username']=$user_username;
    $_SESSION['password']=$user_password;

    if(password_verify($user_password, $row_data['user_password'])){

      $_SESSION['username']=$user_username;

      if($row_count==1 and $row_count_cart==0)
      echo "<script>alert('CONFIRMED: LOGIN SUCCESSFUL')</script>";
      echo "<script>window.open('profile.php', '_self')</script>";
    }else{
      $_SESSION['username']=$user_username;
      $_SESSION['password']=$user_password;
      echo "<script>alert('CONFIRMED: LOGIN SUCCESSFUL')</script>";
      echo "<script>window.open('profile.php', '_self')</script>";
    }
    }else{

      echo "<script>alert('DENIED: INVALID CREDENTIALS')</script>";
    }
  }else{

    
  }




?>



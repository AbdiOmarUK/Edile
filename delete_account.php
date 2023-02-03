<?php

include('connect.php');
include('common_function.php');
session_start();

?>

<!-- 1) Insert production: Image file and Dollar price
     2) Cart: Quantity increase -->







     

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
            <a class='nav-link bg-success' href='user_login.php'>WELCOME GUEST</a>
        </li>";
       
        
         
          }else{
  
            echo "<li class='nav-item'>
            <a class='nav-link bg-white' href='profile.php'>WELCOME ".$_SESSION['username']." </a>
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
<h3 class="text-danger mb-4">DELETE ACCOUNT</h3>

<form action="" method="post" class="mt-5">
  <div class="form-outline mb-4">
    <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
  </div>

  <div class="form-outline mb-4">
    <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Delete Account">
  </div>

</form>


<?php

$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){

    $delete_query="Delete from user_table where username='$username_session'";
    $result=mysqli_query($con, $delete_query);

    if($result){

        session_destroy();

        echo "<script>alert('CONFIRMED: ACCOUNT DELETED SUCCESFULLY')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }
}



if(isset($_POST['dont_delete'])){

    echo "<script>window.open('profile.php','_self')</script>";


}







?>


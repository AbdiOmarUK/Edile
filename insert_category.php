<?php

include('connect.php');
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];

    $select_query="Select * from categories where CATEGORY_TITLE='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){

        echo "<script>alert('DENIED: CATEGORY ALREADY ADDED')</script>";
    }else{

    
    $insert_query="insert into categories (CATEGORY_TITLE) values ('$category_title')";
    $result=mysqli_query($con,$insert_query);

    if($result){

        echo "<script>alert('CONFIRMED: CATEGORY ADDED')</script>";
    }
    }
    
}

?>
<?php

include('connect.php');
include('common_function.php');
session_start();

?>



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


<h2 class="text-center">INSERT CATEGORY</h2>


<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Username"
        aria-describeby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">

    <input type="submit" class="bg-danger border-0 p-2 my-3" name="insert_cat" 
    value="INSERT CATEGORIES" aria-label="Username" aria-describeby="basic-addon1">

    

    </div>
</form>



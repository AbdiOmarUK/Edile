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

#home{

background: url(Images/Hargeisa.jpg);
width: 100%;
height: 100vh;
background-size: cover; 
background-position-x: 0px;
background-position-y: 0px;
display: flex;
flex-direction: column;
justify-content: center;
align-items: flex-start;

}


#home span{

color: red;
text-size-adjust: 300px;
font-size: 350%;
}

h1 {

font-size: 2.5rem;
font-weight: 700;
color: white;
text-size-adjust: 250px;
text-size-adjust: 300%;
}

#new .one img {

width: 100%;
height: 100%;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}

.logo{

width: 7%;
height: 7%;
}


.text-center{

color: red;
}

.img-fluid{
  width: 100%;
height: 200px;
object-fit: contain;
}
    </style>

</head>





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


<h1 class="text-center">ALL PRODUCTS</h1>
<button><a href="shop.php">BACK TO STORE</a></button>

<br><br>
<div class="row px-4">
  <div class="col-md-10">
    <div class="row">

    

<?php

$select_query = "Select * from products";
$result_query = mysqli_query($con, $select_query);


while($row=mysqli_fetch_assoc($result_query)){

  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  $category_id=$row['category_id'];
  $product_dollar=$row['product_dollar'];
  echo "<div class='col-md-4 mb-2 p-4'>
  <div class='card'>
  
  <div class='card-body'>
  <img src=\"$product_image1\" alt=\"Product Image\" class=\"img-fluid card-img-top\">
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'> $product_description</p>
  <h5 class='price_color'> $product_price SL ($$product_dollar)</h5>
  <a href='shop.php?add_to_cart=$product_id' class='card-link btn btn-success'>ADD TO CART</a>
  <a href='product_details.php?category_id=$product_id' class='card-link btn btn-dark'>VIEW MORE</a>
  </div>
  </div>
  </div>";
  
}


?>


</div>
</div>


<div class="col-md-2 bg-white p-0">
  <ul class="navbar-nav me-auto text-center">

<li class="nav-item bg-white">
  <a href="shop.php" class="nav-link text-danger" ><h4>CATERGORY</h4></a>
</li>


<?php 

getcategories();

?>


</ul>
</div>

</div>
</div>


















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
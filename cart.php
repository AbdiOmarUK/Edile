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

.cart_img {

width: 70px;
height: 70px;
object-fit: contain;
}


.text-center{

color: red;
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

<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>PRODUCT TITLE</th>
                    <th>PRODUCT IMAGE</th>
                    <th>QUANTITY</th>
                    <th>TOTAL PRICE</th>
                    <th>REMOVE</th>
                    <th colspan="2">OPERATIONS</th>
                </tr>
            </thead>
            <tbody>

            <?php

global $con;
$get_ip_add= getIPAddress();
$total_price=0;
$cart_query= "Select * from cart_details where ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);
while($row=mysqli_fetch_array($result)){

  $product_id=$row['product_id'];
  $select_products="Select * from products where product_id=$product_id";
  $result_products=mysqli_query($con, $select_products);
  while($row_product_price=mysqli_fetch_array($result_products)){
    $product_price=array($row_product_price['product_price']);
    $price_table= $row_product_price['product_price'];
    $product_title=$row_product_price['product_title'];
    $product_image1= $row_product_price['product_image1'];
    $product_values=array_sum($product_price);
    $total_price+=$product_values;
  



?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><?php echo "<img src=\"$product_image1\" alt=\"Product Image\" class=\"cart_img\"" ?>></td>
                    <td><input type="text" name="qty" id="" class="form-input w-50"></td>

                    <?php

$get_ip_add= getIPAddress();
if(isset($_POST['update_cart'])){
  $quantities=$_POST['qty'];
  $update_cart="update cart_details set quantity=$quantities where ip_address='$get_ip_add'";
  $result_products_quantity=mysqli_query($con,$update_cart);
  $total_price= $total_price*$quantities;
}

                    ?>
                    <td><?php  echo $price_table  ?> SL </td> 
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                        <input type="submit" class="bg-success px-3 py-2 border-0 mx-3" value="Update Cart" name="update_cart"/>
                        <input type="submit" value="Remove Cart" class="bg-success px-3 py-2 border-0 mx-3" name="remove_cart"/>
                    </td>
                </tr>

                <?php }} ?>


                
                
            </tbody>
        </table> <br>
        <div class="d-flex mb-2">
        <h4 class="px-4">SUBTOTAL: <strong class="text-success"><?php echo $total_price?> SL ($<?php echo $total_price/8500?>) </strong></h4>
        </div>
        <hr>
        <div class="d-flex mb-2">
            <a href="shop.php" class="btn btn-danger">CONTINUE SHOPPING</a> 
        </div>

        <div class="d-flex mb-2">
            <a href="payment.php" class="btn btn-success">CHECKOUT</a>
        </div>
    </div>
</div>
</form>
<?php
function remove_cart_item(){

  global $con;
  if(isset($_POST['remove_cart'])){

    foreach($_POST['removeitem'] as $remove_id){

      echo $remove_id;
      $delete_query="Delete from cart_details where product_id=$remove_id";
      $run_delete=mysqli_query($con, $delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php', '_self)</script>";
      }
    }
  }
}

echo $remove_item=remove_cart_item();





?>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
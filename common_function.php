<?php


include('connect.php');




function get_unique_categories(){
        
        global $con;  

        if(isset($_GET['category'])){
        $category_id=$_GET['category']; 
        $select_query="Select * from products where CATERGORY_ID=$category_id";
        $result_query=mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){

            echo "<h2 class='text-center'>No stock for this category</h2>";
        }

        while($row=mysqli_fetch_assoc($result_query)){

          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_keywords=$row['product_keywords'];
          $product_category=$row['category_id'];
          $product_price=$row['product_price'];
          $product_dollar=$row['product_dollar'];
          $product_image1=$row['product_image1'];

          echo "<div class='col-md-4 mb-2 p-4'>
          <div class='card'>
          
          <div class='card-body'>
          <img src=\"$product_image1\" alt=\"Product Image\" class=\"img-fluid card-img-top\"> <br>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'> $product_description</p>
          <h5 class='price_color'> $product_price SL ($$product_dollar)</h5>
          <a href='shop.php?add_to_cart=$product_id' class='card-link btn btn-success'>ADD TO CART</a>
          <a href='product_details.php?category_id=$product_id' class='card-link btn btn-dark'>VIEW MORE</a>
          </div>
          </div>
          </div>";

        }
          
          
          
        }
    }

    function getproducts(){
        
        global $con;  

        if(!isset($_GET['category'])){
        $select_query="Select * from products";
        $result_query=mysqli_query($con, $select_query);

        while($row=mysqli_fetch_assoc($result_query)){

          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_keywords=$row['product_keywords'];
          $product_category=$row['category_id'];
          $product_price=$row['product_price'];
          $product_dollar=$row['product_dollar'];
          $product_image1=$row['product_image1'];

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
          
          
          
        }
    }


    


        function getcategories(){

            global $con;
            if(!isset($_GET['category'])){
            $select_categories="Select * from categories";
$result_categories=mysqli_query($con, $select_categories);

while($row_data=mysqli_fetch_assoc($result_categories)){
  $category_title=$row_data['CATEGORY_TITLE'];
  $category_id=$row_data['CATERGORY_ID'];

  echo " <li class='nav-item'><a class='nav-link text-white bg-success'>$category_title</a></li>";
  
}
}
        }
        

        function search_product(){

          global $con;
          if(isset($_GET['search_data_product'])){
          $search_data_value = $_GET['search_data'];
          $search_query="Select * from products where product_keywords like '%$search_data_value%'";
$result_query=mysqli_query($con, $search_query);

$num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){

            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        }


while($row=mysqli_fetch_assoc($result_query)){

  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_keywords=$row['product_keywords'];
  $product_category=$row['category_id'];
  $product_price=$row['product_price'];
  $product_dollar=$row['product_dollar'];
  $product_image1=$row['product_image1'];

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
    }
  }
  
  function view_details(){

    global $con;  

        if(!isset($_GET['product_id'])){
          if(!isset($_GET['category'])){
            $product_id=$_GET['category_id'];
        $select_query="Select * from products where product_id=$product_id";
        $result_query=mysqli_query($con, $select_query);

        while($row=mysqli_fetch_assoc($result_query)){

          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_keywords=$row['product_keywords'];
          $product_category=$row['category_id'];
          $product_price=$row['product_price'];
          $product_dollar=$row['product_dollar'];
          $product_image1=$row['product_image1'];

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
      }
    }




  }

  function getIPAddress() {

    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }

    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    else{

      $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    return $ip;
  }
 

  function cart(){

    if(isset($_GET['add_to_cart'])){
      global $con;
      $get_ip_add = getIPAddress();
      $get_product_id=$_GET['add_to_cart'];
      $select_query="Select * from cart_details where ip_address='$get_ip_add' and
      product_id=$get_product_id";
      $result_query=mysqli_query($con, $select_query);
      $num_of_rows=mysqli_num_rows($result_query);

      if($num_of_rows>0){

        echo "<script>alert('DENIED: THIS ITEM IS ALREADY INSIDE THE CART')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      }else{

        $insert_query="insert into cart_details (product_id, ip_address, quantity)
        values ($get_product_id, '$get_ip_add', 0)";
        $result_query=mysqli_query($con, $insert_query);
        echo "<script>alert('CONFIRMED: ITEM ADDED TO CART')</script>";
        echo "<script>window.open('shop.php','_self')</script>";
      }
    }
  }

  function cart_item(){
    if(isset($_GET['add_to_cart'])){
      global $con;
      $get_ip_add = getIPAddress();
      $select_query="Select * from cart_details where ip_address='$get_ip_add'";
      $result_query=mysqli_query($con, $select_query);
      $count_cart_items=mysqli_num_rows($result_query);
    }else{
      global $con;
      $get_ip_add = getIPAddress();
      $select_query="Select * from cart_details where ip_address='$get_ip_add'";
      $result_query=mysqli_query($con, $select_query);
      $count_cart_items=mysqli_num_rows($result_query);
      
    }
    echo $count_cart_items;
  }

  function total_cart_price(){

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
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
      }
    }

    echo $total_price;


  
  }

  function total_cart_dollar(){

    global $con;
    $get_ip_add= getIPAddress();
    $total_price_dollar=0;
    $cart_query= "Select * from cart_details where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){

      $product_id=$row['product_id'];
      $select_products="Select * from products where product_id=$product_id";
      $result_products=mysqli_query($con, $select_products);
      while($row_product_dollar=mysqli_fetch_array($result_products)){
        $product_dollar=array($row_product_dollar['product_dollar']);
        $product_values=array_sum($product_dollar);
        $total_price_dollar+=$product_values;
      }
    }

    echo $total_price_dollar;
  }


  function get_user_order_details(){

    global $con; 
    $username=$_SESSION['username'];
    $get_details="Select * from user_table where username='$username'";
    $result_query=mysqli_query($con, $get_details);
    while($row_query=mysqli_fetch_array($result_query)){

      $user_id=$row_query['user_id'];
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
          if(!isset($_GET['delete_account'])){
            $get_orders="Select * from user_orders where user_id=$user_id and
            order_status='pending'";
            $result_orders_query=mysqli_query($con, $get_orders);
            $row_count=mysqli_num_rows($result_orders_query);
            if($row_count>0){

              echo "<h3 class='text-center text-success'>YOU HAVE <span class='text-danger'>($row_count) </span>PENDING ORDERS</h3>
              <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>ORDER DETAILS</a></p>";
            }else{

              echo "<h3 class='text-center text-danger mt-5 mb-2'>YOU HAVE ZERO PENDING ORDERS</h3>
              <p class='text-center'><a href='index.php' class='text-dark'>EXPLORE PRODUCTS</a></p>";
            }
          } 
        }
        }
    }
  }
?>
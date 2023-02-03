<?php

include('connect.php');
include('common_function.php');
session_start();

if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    

    $product_image1=$_FILES['product_image1']['name'];
    $product_image1=$_FILES['product_image2']['name'];
    $product_image1=$_FILES['product_image3']['name'];

    $product_image1_tmp=$_FILES['product_image1']['tmp_name'];
    $product_image2_tmp=$_FILES['product_image2']['tmp_name'];
    $product_image3_tmp=$_FILES['product_image3']['tmp_name'];

  
    $product_status=$_POST='true';

    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_price=='' 
    or $product_image1='' or $product_image2='' or $product_image3=' '){

        echo "<script>alert('DENIED: PLEASE FILL ALL AVAILABLE FIELDS')</script>";
        exit();

    }else{

      move_uploaded_file($product_image1_tmp, "Products/$product_image1");
      move_uploaded_file($product_image2_tmp, "Products/$product_image2");
      move_uploaded_file($product_image3_tmp, "Products/$product_image3");

    
      
      
      $insert_products = "insert into products (prodct_title, product_description, product_keywords, 
        category_id, product_image1,  product_price,date, status) values ('$product_title', '$product_description',
        '$product_keywords', '$product_category','$product_image1', '$product_price' , NOW(), 
        '$product_status')";

        $result_query=mysqli_query($con,$insert_products);

        if($result_query){
            
            echo "<script>alert('CONFIRMED: YOU INSERTED THE PRODUCT')</script>";
        }
    }
}


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

<body class="bg-white">
    <div class="container mt-3">
        <h1 class="text-center">INSERT PRODUCTS</h1> <br>
            <form action="" method="POST" entype="multipart/form-data">
                

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">PRODUCT TITLE</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" 
                    placeholder="Enter product's title" autocomplete="off" required="required">
                </div> <br>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="description" class="form-label">PRODUCT DESCRIPTION </label>
                    <input type="text" name="description" id="description" class="form-control" 
                    placeholder="Enter product's description" autocomplete="off" required="required">
                </div> <br>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="form-label">PRODUCT KEYWORDS</label>
                    <input type="text" name="product_keywords" id="product_keywords" class="form-control" 
                    placeholder="Enter product keywords" autocomplete="off" required="required">
                </div> <br>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">PRODUCT IMAGE</label>
                    <input type="file" id="product_image1" class="form-control" 
                    required="required" name="product_image1"/>
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">PRODUCT IMAGE</label>
                    <input type="file" id="product_image2" class="form-control" 
                    required="required" name="product_image2"/>
                </div>
                
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="form-label">PRODUCT IMAGE</label>
                    <input type="file" id="product_image3" class="form-control" 
                    required="required" name="product_image3"/>
                </div>



                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_category" id="" class="form-select">
                        <option value="">Select a category</option>
                        <?php 

                        $select_query="Select * from categories";
                        $result_query=mysqli_query($con, $select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['CATEGORY_TITLE'];
                            $category_id=$row['CATERGORY_ID']; 

                            echo "<option value='$category_id'>$category_title</option>";
                        
                        }
                        
                        ?>
                        
                    </select>
                </div> <br>


                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">PRODUCT PRICE </label>
                    <input type="number" name="product_price" id="product_price" class="form-control" 
                    placeholder="Enter product's price" autocomplete="off" required="required">
                </div> <br>

                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" class="btn btn-dark mb-3 px-3" value="Insert products">
                </div> <br>








            </form>
        
    </div>
    












<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
</body>
</html>
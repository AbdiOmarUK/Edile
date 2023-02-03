<?php
if(isset($_GET['edit_account'])){

  $user_session_name=$_SESSION['username'];
  $select_query="Select * from user_table where username='$user_session_name'";
  $result_query=mysqli_query($con, $select_query);
  $row_fetch=mysqli_fetch_assoc($result_query);
  $user_id=$row_fetch['user_id'];
  $username=$row_fetch['username'];
  $user_email=$row_fetch['user_email'];
  $user_address=$row_fetch['user_address'];
  $user_mobile=$row_fetch['user_mobile'];

  if(isset($_POST['user_update'])){

    $update_id=$user_id;
    $username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    $user_image1=$_FILES['user_image']['name'];
    $user_image1_tmp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp, "Images/$user_image");

    $update_data="update user_table set username='$username',
    user_email='$user_email', user_image='$user_image1', user_address='$user_address',
    user_mobile='$user_mobile' where user_id=$update_id";
    $result_query_update=mysqli_query($con, $update_data);

    if($result_query_update){

      echo "<script>alert('CONFIRMED: DATA UPDATED SUCCESSFULLY')</script>";
      echo "<script>window.open('user_login.php', '_self')</script>";
    }


  }

}








?>



    <style>
.profile_img{

width: 50px;
height: 50px;
}

.card-img-top{

width: 100%;
height: 200px;
object-fit: contain;
}

.logo{

width: 7%;
height: 7%;
}

.text-center{

color: red;

}
    </style>


<h3 class="text-center text-danger mb-4">EDIT ACCOUNT</h3>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-outline mb-4">
    <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>"name="user_username">
  </div>

  <div class="form-outline mb-4">
    <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
  </div>

  <div class="form-outline mb-4 d-flex w-50 m-auto">
    <input type="file" class="form-control w-50 m-auto" name="user_image">
    <img src="./Images/<?php echo $user_image ?>" class="profile_img" >
  </div> 

  <div class="form-outline mb-4">
    <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
  </div>

  <div class="form-outline mb-4">
    <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile">
  </div>

  
    <input type="submit" value="Update" class="bg-success py-2 px-3 border-0" name="user_update">
  </div>
</form>  



























<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

















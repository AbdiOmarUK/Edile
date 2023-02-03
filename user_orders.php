
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



<?php

$username=$_SESSION['username'];
$get_user="Select * from user_table where username='$username'";
$result=mysqli_query($con, $get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];
//echo $user_id;



?>


<h3 class="text-danger">ALL OF MY ORDERS</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-white">
    <tr>
        <th>S1 NO</th>
        <th>AMOUNT DUE</th>
        <th>TOTAL PRODUCTS</th>
        <th>INVOICE NUMBER</th>
        <th>DATA</th>
        <th>COMPLETE/INCOMPLETE</th>
        <th>STATUS</th>
    </tr>
    </thead>
    <tbody class="bg-white text-danger">
        <?php

        $get_order_details="Select * from user_orders where user_id=$user_id";
        $result_orders=mysqli_query($con, $get_order_details);
        while($row_orders=mysqli_fetch_assoc($result_orders)){
            $order_id=$row_orders['order_id'];
            $amount_due=$row_orders['amount_due'];
            $amount_due=$row_orders['amount_due'];
            $total_products=$row_orders['total_products'];
            $invoice_number=$row_orders['invoice_number'];
            $order_status=$row_orders['order_status'];
            $order_date=$row_orders['order_date'];
            if($order_status=='pending'){
                $order_status='Incomplete';
            }else{
                $order_status='Complete';
            }
            $oder_date=$row_orders['order_date'];
            $number=1;
            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td> $order_date</td>
            <td>$order_status</td>";
            ?>
            <?php

            if($order_status=='Complete'){

                echo "<td>PAID</td>";
            }else{

                echo "<td><a href='confirm_payment.php?order_id' class='text-danger'>CONFIRM</a></td> </tr>";
            }
            

            

            $number++;
        }

        ?>
    
    </tbody>
</table>
    































<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>


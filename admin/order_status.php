<?php

@include 'config.php';
session_start();
$username = $_SESSION ['user_name'];





?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
         <div class="container">

            <div class="content">
               <h3>hi, <span><?php echo $_SESSION['name'] ?></span></h3>
               <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
               <p>THIS IS WHERE YOU ADD, EDIT, REMOVE A PRODUCT</p>
               <a href="admin_creation/super_admin_page.php" class="btn" style = "width: 300px">go back</a>
               <a href="admin_creation/logout.php" class="btn" style = "width: 300px">logout</a>
            </div>

         </div>

   <?php

if(isset($_GET['receive'])){
   $id = $_GET['receive'];
   mysqli_query($conn, "UPDATE orders SET status='to receive'WHERE id = '$id'");
   mysqli_query($conn, "INSERT INTO product_log(username, date_log, time_log,  edit_create) 
   VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'updated order status (to receive) : order number $id')");
   header('location:order_status.php');
};

if(isset($_GET['complete'])){
   $id = $_GET['complete'];
   mysqli_query($conn, "UPDATE orders SET status='order completed'WHERE id = '$id'");
   mysqli_query($conn, "INSERT INTO product_log(username, date_log, time_log,  edit_create) 
   VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'updated order status (completed) : order number $id')");
   header('location:order_status.php');
};

   $select = mysqli_query($conn, "SELECT * FROM orders");
   
   ?>
   <div class="product-display">
      
      <table class="product-display-table">
      <h1>MANAGE ORDERS</h1>
         <thead>
         <tr>
            <th>user id number</th>
            <th>name</th>
            <th>number</th>
            <th>email</th>
            <th>payment method</th>
            <th>address</th>
            <th>Products</th>
            <th>Total Price</th>
            <th>Date and Time ordered</th>
            <th>Status</th>
           
            
            
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            
            
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['number']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['method']; ?></td>
            <td><?php echo $row['housenumber']; ?> <?php echo $row['street']; ?><?php echo $row['city']; ?> <?php echo $row['province']; ?> <?php echo $row['country']; ?><?php echo $row['zip_code']; ?></td>
            <td><?php echo $row['total_products']; ?></td>
            <td><?php echo $row['total_price']; ?></td>
            <td><?php echo $row['date_created']; ?> <?php echo $row['time_created']; ?></td>
            <td> <?php echo $row['status']; ?></td>
          
            <td>
            <a href="order_status.php?receive=<?php echo $row['id']; ?>" class="btn"> <i class="fas "></i> To receive </a>
            </td>
            <td>
            <a href="order_status.php?complete=<?php echo $row['id']; ?>" class="btn"> <i class="fas "></i> Order complete </a>
            </td>
         
         
         </tr>
      <?php } ?>
      </table>
      <br>
      <br>


      
   </div>
   
   </div>

</div>


</body>
</html>
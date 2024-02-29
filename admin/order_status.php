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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e9T9hXmJ58bldgTk+" crossorigin="anonymous">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center mb-5">
                <div class="card-header">
                    <h1>Hi, <span><?php echo $_SESSION['name'] ?></span></h1>
                    <h1>Welcome</h1>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center mb-5">
                        <a href="admin_creation/super_admin_page.php" class="btn btn-primary me-5">Go back</a>
                        <a href="admin_creation/logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
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
   <br><br><br>
    <div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="thead-dark" style="display: table-row-group;">
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Payment Method</th>
                    <th>Address</th>
                    <th>Products</th>
                    <th>Total Price</th>
                    <th>Order Time</th>
                    <th>Status</th>
                    <th>Reference Number</th>
                    <th>Gcash Number</th>
                    <th>Receipt</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody style="display: table-row-group;">
            <?php while($row = mysqli_fetch_assoc($select)){ ?>
            <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['number']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['method']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['total_products']; ?></td>
                <td><?php echo $row['total_price']; ?></td>
                <td><?php echo $row['date_created'] . ' ' . $row['time_created']; ?></td>
                <td> <?php echo $row['status']; ?></td>
                <td> <?php echo $row['reference_number']; ?></td>
                <td> <?php echo $row['gcash_number']; ?></td>
                <td><img src="../<?php echo $row['screenshot']; ?>" height="100" alt="Receipt"></td>
                <td>
                    <a href="order_status.php?receive=<?php echo $row['id']; ?>" class="btn">
                        <i class="fas "></i> To receive
                    </a>
                </td>
                <td>
                    <a href="order_status.php?complete=<?php echo $row['id']; ?>" class="btn">
                        <i class="fas "></i> Order complete
                    </a>
                </td>
            </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
</div>

</div>


</body>
</html>
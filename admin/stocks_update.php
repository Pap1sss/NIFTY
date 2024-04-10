<?php

@include 'config.php';
require_once "admin_creation/controllerUserData.php";

$username = $_SESSION['username'];


if ($username != false) {
   $sql = "SELECT * FROM admin_accounts WHERE username = '$username'";
   $run_Sql = mysqli_query($conn, $sql);
   if ($run_Sql) {
      $fetch_info = mysqli_fetch_assoc($run_Sql);
      $username = $fetch_info['username'];
   }
} else {
   header('Location: admin_creation/login_form.php');
}


$id = $_GET['manage'];

if (isset($_POST['add_unit'])) {
   $create = 'added a unit stock on product id';
   $unit = $_POST['unit'];
   $username = $_SESSION['username'];

   $product_check = "SELECT * FROM stocks_unit WHERE unit_name = '$unit' AND product_id = '$id' ";
   $res = mysqli_query($conn, $product_check);
   if (mysqli_num_rows($res) > 0) {
      $message[] = 'stocks already added!!';
   } else {
      $insert = "INSERT INTO stocks_unit(product_id,unit_name, date_created, time_created) 
      VALUES('$id', '$unit',  CURRENT_DATE(), CURRENT_TIME())";
      $stocks_logs = "INSERT INTO admin_activity_log(username, date_log, time_log,  action) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$create : $id')";
      $data_check = mysqli_query($conn, $stocks_logs);
      $upload = mysqli_query($conn, $insert);
      if ($upload) {
         $message[] = 'new stocks added successfully';
      } else {
         $message[] = 'could not add the stocks';
      }
   }
};

if (isset($_POST['add_color'])) {
   $create = 'add a color stock on product id';

   $color = $_POST['color'];
   $username = $_SESSION['user_name'];

   $product_check = "SELECT * FROM stocks_color WHERE color_name = '$color' AND product_id = '$id' ";
   $res = mysqli_query($conn, $product_check);
   if (mysqli_num_rows($res) > 0) {
      $message[] = 'stocks already added!!';
   } else {
      $insert = "INSERT INTO stocks_color(product_id, color_name, date_created, time_created) 
      VALUES('$id', '$color', CURRENT_DATE(), CURRENT_TIME())";
      $stocks_logs = "INSERT INTO admin_activity_log(username, date_log, time_log,  action) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$create : $id')";
      $data_check = mysqli_query($conn, $stocks_logs);
      $upload = mysqli_query($conn, $insert);
      if ($upload) {
         $message[] = 'new stocks added successfully';
      } else {
         $message[] = 'could not add the stocks';
      }
   }
};



?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Stocks Update</title>

   <!-- Montserrat Font -->
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

   <!-- Material Icons -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/analyticstyle.css">



</head>

<body>
   <style>
      .detail-btn {
         background-color: #f9c47f;
         border: 1px solid white;

      }

      .detail-btn:hover {
         background-color: #F4B39D;
         color: white;
      }
   </style>
   <style>
      .alert {
         padding: 20px;
         background-color: #f44336;
         color: white;
         opacity: 1;
         transition: opacity 0.6s;
         margin-bottom: 15px;
      }

      .alert.success {
         background-color: #04AA6D;
      }

      .alert.info {
         background-color: #2196F3;
      }

      .alert.warning {
         background-color: #ff9800;
      }

      .closebtn {
         margin-left: 15px;
         color: white;
         font-weight: bold;
         float: right;
         font-size: 22px;
         line-height: 20px;
         cursor: pointer;
         transition: 0.3s;
      }

      .closebtn:hover {
         color: black;
      }
   </style>
   <div class="grid-container">

      <!-- Header -->
      <header class="header">
         <div class="menu-icon" onclick="openSidebar()">
            <span class="material-icons-outlined">menu</span>
         </div>
         <div class="header-left">



         </div>
         <div class="header-right">
            <a href="admin_creation/logout.php">
               <span class="material-icons-outlined">logout</span>
            </a>
         </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
         <div class="sidebar-title">
            <div class="sidebar-brand">
               <span class="material-icons-outlined"></span>Welcome
            </div>
         </div>

         <ul class="sidebar-list">
            <li class="sidebar-list-item">
               <a href="admin_creation/regular_admin_page.php">
                  <span class="material-icons-outlined">dashboard</span> Dashboard
               </a>
            </li>
            <li class="sidebar-list-item">
               <a href="uploads.php">
                  <span class="material-icons-outlined">wysiwyg</span> Setup Website
               </a>
            </li>
            <li class="sidebar-list-item">
               <a href="CRUD.php">
                  <span class="material-icons-outlined">inventory</span> Manage Products
               </a>
            </li>
            <li class="sidebar-list-item">
               <a href="user_accounts.php">
                  <span class="material-icons-outlined">group</span> Accounts
               </a>
            </li>
            <li class="sidebar-list-item">
               <a href="order_status.php">
                  <span class="material-icons-outlined">inventory</span> Manage Order Status
               </a>
            </li>
            <li class="sidebar-list-item">
               <a href="admin_logs.php">
                  <span class="material-icons-outlined">face</span> Admin Logs
               </a>
            </li>
         </ul>


      </aside>

      <!-- fetch categories  -->

      <?php
      $query = "SELECT category FROM category";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
         $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
      }
      ?>
      <!-- End Sidebar -->




      <?php


      ?>
      <div class="d-flex justify-content-center " style="margin-top: 20px">
         <div style="margin: 100px;">
            <ul class="list-group float-left mr-3">
               <li class="list-group-item d-flex justify-content-center">
                  <h5>AVAILABLE UNITS</h5>
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <form action="" method="post">
                     <table class="product-display-table table-bordered border-dark">
                        <thead>
                           <tr>
                              <th>
                                 <input type="checkbox" id="select-all"> Select all
                              </th>
                              <th>Unit/Size/Variation Name</th>
                              <th>Color Name</th>
                              <th>Quantity</th>



                           </tr>
                        </thead>
                        <?php
                        $select_stocks_unit = mysqli_query($conn, "SELECT * FROM stocks WHERE product_id = '$id'");
                        while ($row = mysqli_fetch_assoc($select_stocks_unit)) {
                        ?>
                           <tr>
                              <td>
                                 <input type="checkbox" name="delete_ids[]" value="<?php echo $row['id']; ?>">
                                 <input type="hidden" name="stocks_unit_id" value="<?php echo $row['id']; ?>">
                              </td>
                              <td>
                                 <?php echo $row['unit_name']; ?>
                              </td>
                              <td>
                                 <?php echo $row['color_name']; ?>
                              </td>
                              <td>
                                 <?php echo $row['quantity']; ?>
                              </td>

                           </tr>
                        <?php } ?>
                     </table>
                     <button type="submit" name="delete_unit_submit" class="btn btn-danger">Delete</button>
                  </form>
               </li>
            </ul>
         </div>
         <?php
         if (isset($_POST['delete_unit_submit'])) {
            // Get the list of checkbox values
            $delete_ids = $_POST['delete_ids'];
            $stocks_unit_id = $_POST['stocks_unit_id'];

            // Loop through the list of IDs to delete
            foreach ($delete_ids as $stocks_id) {
               // Prepare a delete statement
               $delete_stmt = $conn->prepare("DELETE FROM stocks_unit WHERE stocks_unit_id = ?");
               $delete_stmt->bind_param("i", $stocks_unit_id);
               $delete_stmt->execute();
            }

            // Display the alert messages
            echo "<script>alert('Removed Successfully');</script>";

            // Redirect back to the admin page with the ID of the item being edited
            echo "<script>window.location.href = 'stocks_update.php?manage=$id';</script>";
            exit;
         }
         ?>

         <br><br>

         <?php

         $select = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
         while ($row = mysqli_fetch_assoc($select)) {

         ?>

            <style>
               .center {
                  display: block;
                  margin-left: auto;
                  margin-right: auto;
                  width: 50%;
                  height: inherit;
               }
            </style>


            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
               <ul class="list-group" style="margin-top: 20px">

                  <li class="list-group-item d-flex justify-content-center">
                     <h3>Product Information</h3>
                  </li>
                  <li class="list-group-item d-flex justify-content-center">
                     <img class="center" src="../<?php echo $row['image']; ?>" height="100" alt="logo"></td>
                  </li>
                  <li class="list-group-item d-flex justify-content-center">
                     <h5>NAME:
                        <?php echo $row['name']; ?>
                     </h5>
                  </li>
                  <li class="list-group-item d-flex justify-content-center">
                     <h5>PRICE: ₱
                        <?php echo $row['price']; ?>
                     </h5>
                  </li>
                  <li class="list-group-item d-flex justify-content-center">
                     <input type="text" placeholder="Enter Unit/Size/Variation " name="product_name" class="box" required>
                     <input type="submit" class="btn detail-btn" name="add_unit" value="confirm">
                  </li>


               </ul>

            </form>


         <?php }; ?>


      </div>




      <script>
         var close = document.getElementsByClassName("closebtn");
         var i;

         for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
               var div = this.parentElement;
               div.style.opacity = "0";
               setTimeout(function() {
                  div.style.display = "none";
               }, 600);
            }
         }
      </script>
</body>

</html>
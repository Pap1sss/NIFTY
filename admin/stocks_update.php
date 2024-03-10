<?php

@include 'config.php';
require_once "admin_creation/controllerUserData.php";

$username = $_SESSION['user_name'];
$name = $_SESSION['name'];

if ($username != false && $name != false) {
  $sql = "SELECT * FROM admin_accounts WHERE username = '$username'";
  $run_Sql = mysqli_query($conn, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $username = $fetch_info['username'];
    $name = $fetch_info['name'];
  }
} else {
  header('Location: ../admin_creation/login_form.php');
}

$id = $_GET['manage'];

if (isset($_POST['add_stocks'])) {
   $create = 'add a stock of product id';
   $unit = $_POST['unit'];
   $color = $_POST['color'];
   $username = $_SESSION['user_name'];

   $product_check = "SELECT * FROM stocks WHERE unit_name = '$unit' AND color_name = '$color' AND product_id = '$id' ";
   $res = mysqli_query($conn, $product_check);
   if (mysqli_num_rows($res) > 0) {
      $message[] = 'stocks already added!!';
   } else {
      $insert = "INSERT INTO stocks(product_id,unit_name, color_name, date_created, time_created) 
      VALUES('$id', '$unit', '$color', CURRENT_DATE(), CURRENT_TIME())";
      $stocks_logs = "INSERT INTO product_log(username, date_log, time_log,  edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$create : $id')";
      $data_check = mysqli_query($conn, $stocks_logs);
      $upload = mysqli_query($conn, $insert);
      if ($upload) {
         $message[] = 'new stocks added successfully';
      } else {
         $message[] = 'could not add the stocks';
      }
   }
}
;



?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Stocks Update</title>

   <!-- Montserrat Font -->
   <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet">

   <!-- Material Icons -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>

   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/analyticstyle.css">



</head>

<body>
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

            <a href="regular_admin_page.php">
               <span class="material-icons-outlined">refresh</span>
            </a>

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
               <span class="material-icons-outlined"></span>Welcome,
               <?php echo $_SESSION['user_name'] ?>
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

      $select_stocks = mysqli_query($conn, "SELECT * FROM stocks WHERE product_id = '$id'");
      while ($row = mysqli_fetch_assoc($select_stocks)) {
         $unit_name = $row['unit_name'];
         $color_name = $row['color_name'];


         if (isset($_GET['delete'])) {
            $id = $_GET['manage'];
            mysqli_query($conn, "DELETE FROM stocks WHERE unit_name = '$unit_name' AND color_name = '$color_name' AND product_id = '$id'");
            header('location:stocks_update.php?id=' . $id);
         }
      }


      ?>

      <div class="d-flex justify-content-center " style="margin-top: 20px">
         <ul class="list-group float-left mr-3">
            <li class="list-group-item d-flex justify-content-center">
               <h5>AVAILABLE STOCKS</h5>
            </li>
            <li class="list-group-item d-flex justify-content-center">
               <table class="product-display-table table-bordered border-dark">
                  <thead>
                     <tr>
                        <th>unit name</th>
                        <th>color name</th>
                     </tr>
                  </thead>
                  <?php
                  $select_stocks = mysqli_query($conn, "SELECT * FROM stocks WHERE product_id = '$id'");
                  while ($row = mysqli_fetch_assoc($select_stocks)) { ?>
                     <tr>
                        <td>
                           <?php echo $row['unit_name']; ?>
                        </td>
                        <td>
                           <?php echo $row['color_name']; ?>
                        </td>

                        </td>
                     </tr>
                  <?php } ?>
               </table>
            </li>

      </div>

      <!-- fetch units  -->

      <?php
      $query = "SELECT unit_name FROM product_units";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
         $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
      }
      ?>

      <?php
      $query1 = "SELECT color_name FROM color";
      $result1 = $conn->query($query1);
      if ($result1->num_rows > 0) {
         $options1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
      }
      ?>
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
                  <select class="box" name="unit">
                     <option>Select Unit</option>
                     <?php
                     foreach ($options as $option) {
                        ?>
                        <option>
                           <?php echo $option['unit_name']; ?>
                        </option>
                        <?php
                     }
                     ?>
                  </select>
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <select class="box" name="color">
                     <option>Select color</option>
                     <?php
                     foreach ($options1 as $option) {
                        ?>
                        <option>
                           <?php echo $option['color_name']; ?>
                        </option>
                        <?php
                     }
                     ?>
                  </select>
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="submit" class="btn btn-dark" name="add_stocks" value="confirm">
               </li>
            </ul>

         </form>


      <?php }
      ; ?>

   </div>





   <script>
      var close = document.getElementsByClassName("closebtn");
      var i;

      for (i = 0; i < close.length; i++) {
         close[i].onclick = function () {
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function () { div.style.display = "none"; }, 600);
         }
      }
   </script>
</body>

</html>
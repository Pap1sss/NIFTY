<?php

@include 'config.php';
session_start();
$id = $_GET['edit'];



$username = $_SESSION['user_name'];


if (isset($_POST['update_product_name'])) {

   $product_name = $_POST['product_name'];


   if (empty($product_name)) {
      $message[] = 'please fill out product name';
   } else {
      $editproductname = 'edit product name';

      $update_data = "UPDATE products SET name='$product_name', date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = '$id'";
      $product_logs = "INSERT INTO product_log(username, date_log, time_log, edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$editproductname')";
      $upload = mysqli_query($conn, $update_data);
      $data_check = mysqli_query($conn, $product_logs);


   }
}
;

if (isset($_POST['update_price'])) {

   $product_price = $_POST['product_price'];

   if (empty($product_price)) {
      $message[] = 'please fill out price';
   } else {
      $editproductprice = 'edit product price';

      $update_data = "UPDATE products SET price='$product_price', date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = '$id'";
      $product_logs = "INSERT INTO product_log(username, date_log, time_log, edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$editproductprice')";
      $upload = mysqli_query($conn, $update_data);
      $data_check = mysqli_query($conn, $product_logs);
   }

}


if (isset($_POST['update_description'])) {

   $product_description = $_POST['product_description'];

   if (empty($product_description)) {
      $message[] = 'please fill out description';
   } else {
      $editproductdescription = 'edit product description';

      $update_data = "UPDATE products SET description ='$product_description', date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = '$id'";
      $product_logs = "INSERT INTO product_log(username, date_log, time_log, edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$editproductdescription')";
      $upload = mysqli_query($conn, $update_data);
      $data_check = mysqli_query($conn, $product_logs);
   }

}


if (isset($_POST['update_image'])) {

   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/' . $product_image;

   if (empty($product_image)) {
      $message[] = 'please fill attach image';
   } else {
      $editproductimage = 'change product image';
      $update_data = "UPDATE products SET image='admin/uploaded_img/$product_image', date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = '$id'";
      $product_logs = "INSERT INTO product_log(username, date_log, time_log, edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$editproductimage')";
      $upload = mysqli_query($conn, $update_data);
      $data_check = mysqli_query($conn, $product_logs);
      if ($upload) {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);

      } else {
         $$message[] = 'please fill attach image';
      }
   }

}


?>

<!DOCTYPE html>

<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0">
   <title>REGULAR ADMIN</title>

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
   <div class="grid-container">

      <!-- Header -->
      <header class="header">
         <div class="menu-icon" onclick="openSidebar()">
            <span class="material-icons-outlined">menu</span>
         </div>
         <div class="header-left">

         </div>
         <div class="header-right">
            <a href="logout.php">
               <span class="material-icons-outlined">LOGOUT</span>
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
               <a href="CRUD.php">
                  <span class="material-icons-outlined">inventory</span> Manage Products
               </a>
            </li>
            <a href="../categories.php">
               <li class="sidebar-list-item">
                  <span class="material-icons-outlined">inventory_2</span> Add Category
            </a>
            </li>
            <li class="sidebar-list-item">
               <a href="analytics_table/admin_logs.php">
                  <span class="material-icons-outlined">fact_check</span> Stocks Update
               </a>
            </li>

         </ul>

      </aside>

      </main>

      <style>
         .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            height: inherit;
         }
      </style>

      <?php

      $select = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
      while ($row = mysqli_fetch_assoc($select)) {

         ?>
         <!-- End Main -->
         <div class="container">


         </div>

         <form action="" method="post" enctype="multipart/form-data">
            <ul class="list-group" style="margin-top: 20px">
               <li class="list-group-item"> <img class="center border border-dark" src="../<?php echo $row['image']; ?>"
                     height="100" alt="logo"></td>

                  <h4 style="text-align: center">NAME:
                     <?php echo $row['name']; ?>
                  </h4>
                  <h4 style="text-align: center">PRICE: ₱
                     <?php echo $row['price']; ?>
                  </h4>
                  <p style="text-align: justify">
                     <?php echo $row['description']; ?>
                  </p>
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="text" class="box me-1 pe-5" name="product_name" value="" placeholder="new product name">
                  <input type="submit" value="UPDATE" name="update_product_name" class="btn btn-dark">
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="number" min="0" class="box me-1 pe-5" name="product_price" value=""
                     placeholder="new product price">

                  <input type="submit" value="UPDATE" name="update_price" class="btn btn-dark">
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="text" class="box me-1 pe-5" name="product_description" value=""
                     placeholder="new description">

                  <input type="submit" value="UPDATE" name="update_description" class="btn btn-dark">
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="file" class="box me-1 pe-4" name="product_image" accept="image/png, image/jpeg, image/jpg">

                  <input type="submit" value="UPDATE IMAGE" name="update_image" class="btn btn-dark">
               </li>

            </ul>
            <br>
            <br>
         </form>



      <?php }
      ; ?>





</body>

</html>
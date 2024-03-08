<?php

@include 'config.php';
session_start();
$id = $_GET['edit'];



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
   header('Location: admin_creation/login_form.php');
}



if (isset($_POST['update_product_name'])) {

   // Validate the input
   $product_name = $_POST['product_name'];
   if (!preg_match("/^[a-zA-Z0-9 ]*$/", $product_name)) {
      $message[] = 'Only letters, numbers, and whitespace are allowed in product name';
      goto end;
   }

   if (empty($product_name)) {
      $message[] = 'Please fill out product name';
      goto end;
   }

   // Use prepared statements to prevent SQL injection
   $stmt = $conn->prepare("UPDATE products SET name=?, date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = ?");
   $stmt->bind_param("si", $product_name, $id);
   $stmt->execute();

   // Log the activity
   $editproductname = 'edit product name';
   $stmt = $conn->prepare("INSERT INTO product_log(username, date_log, time_log, edit_create) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
   $stmt->bind_param("ss", $username, $editproductname);
   $stmt->execute();


}
;

if (isset($_POST['update_price'])) {

   // Validate the input
   $product_price = $_POST['product_price'];
   if (!is_numeric($product_price)) {
      $message[] = 'Price must be a number';
      goto end;
   }

   if (empty($product_price)) {
      $message[] = 'Please fill out price';
      goto end;
   }

   // Use prepared statements to prevent SQL injection
   $stmt = $conn->prepare("UPDATE products SET price=?, date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = ?");
   $stmt->bind_param("di", $product_price, $id);
   $stmt->execute();

   // Log the activity
   $editproductprice = 'edit product price';
   $stmt = $conn->prepare("INSERT INTO product_log(username, date_log, time_log, edit_create) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
   $stmt->bind_param("ss", $username, $editproductprice);
   $stmt->execute();


}
;


if (isset($_POST['update_description'])) {

   // Validate the input
   $product_description = trim($_POST['product_description']);
   if (strlen($product_description) > 500) {
      $message[] = 'Description should not exceed 500 characters';
      goto end;
   }

   if (empty($product_description)) {
      $message[] = 'Please fill out description';
      goto end;
   }

   // Use prepared statements to prevent SQL injection
   $stmt = $conn->prepare("UPDATE products SET description=?, date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = ?");
   $stmt->bind_param("si", $product_description, $id);
   $stmt->execute();

   // Log the activity
   $editproductdescription = 'edit product description';
   $stmt = $conn->prepare("INSERT INTO product_log(username, date_log, time_log, edit_create) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
   $stmt->bind_param("ss", $username, $editproductdescription);
   $stmt->execute();

   end:
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
   <title>EDIT PRODUCT</title>

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

         <a href="CRUD.php" class="btn btn-danger">LOGOUT</a>


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
               <li class="list-group-item d-flex justify-content-start">
                  <a href="CRUD.php" class="btn btn-secondary">BACK</a>
               </li>
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
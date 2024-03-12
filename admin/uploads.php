<?php

@include 'config.php';
session_start();



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



if (isset($_POST['upload'])) {
   $title = $_POST['title'];
   $description = $_POST['description'];
   $email = $_POST['email'];
   $address = $_POST['company_address'];
   $contact = $_POST['company_contact'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/' . $product_image;

   // Validate and sanitize user inputs
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $contact = filter_var($contact, FILTER_SANITIZE_NUMBER_INT);

   if (empty($title) || empty($description) || empty($email) || empty($address) || empty($contact) || empty($product_image)) {
      $message[] = 'please fill out all';
   } else {
      // Use prepared statements to prevent SQL injection attacks
      $stmt = $conn->prepare("TRUNCATE TABLE upload");
      $stmt->execute();

      $stmt = $conn->prepare("INSERT INTO upload(title, description, address, contact, email, logo) VALUES(?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssss", $title, $description, $address, $contact, $email, $product_image);
      $stmt->execute();

      // Move the uploaded file to a secure location
      $target_dir = "uploaded_img/";
      $target_file = $target_dir . basename($product_image);
      move_uploaded_file($product_image_tmp_name, $target_file);

      $message[] = 'new product added successfully';
   }
}

?>


<!DOCTYPE html>

<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0">
   <title>SETUP YOUR WEBSITE</title>

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

            <a href="uploads.php">
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
               <?php echo htmlspecialchars($_SESSION['user_name']) ?>

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
      <div class="container">


      </div>
      <div class="admin-product-form-container">

         <form action="" method="post" enctype="multipart/form-data">
            <br>
            <br>
            <h3>SETUP YOUR WEBSITE</h3>
            <ul class="list-group" style="margin-top: 20px;">

               <li class="list-group-item d-flex justify-content-center">
                  <input type="text" placeholder="Business Name" name="title" class="box" style="width: 80%;">
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="text" placeholder="Business Description" name="description" class="box"
                     style="width: 80%;">
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="text" placeholder="Business Email Address" name="email" class="box" style="width: 80%;">
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="text" placeholder="Business Address" name="company_address" class="box"
                     style="width: 80%;">
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="tel" placeholder="Business Contact number" name="company_contact" class="box"
                     style="width: 80%;">
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <p>COMPANY LOGO | MAKE SURE SIZE OF LOGO IS 150X50 PX</p>
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
               </li>
               <li class="list-group-item list-group-item-success d-flex justify-content-center">
                  <input type="submit" name="upload" class="btn" value="UPLOAD">
               </li>

            </ul>
         </form>

         <div class="admin-product-form-container">
            <?php

            $select = mysqli_query($conn, "SELECT * FROM upload");
            while ($row = mysqli_fetch_assoc($select)) {

               ?>
               <br>
               <br>

               <table class="table table-bordered border-primary">
                  <thead>
                     <tr>

                        <th style="border: 1px solid black;">Company Name</th>
                        <th style="border: 1px solid black;">Company Description</th>
                        <th style="border: 1px solid black;">Company Address</th>
                        <th style="border: 1px solid black;">Contact Number</th>
                        <th style="border: 1px solid black">Email Address</th>
                        <th style="border: 1px solid black">Logo</th>

                     </tr>
                  </thead>

                  <tr>

                     <td style="border: 1px solid black;">
                        <?php echo htmlspecialchars($row['title']); ?>
                     </td>
                     <td style="border: 1px solid black;">
                        <?php echo htmlspecialchars($row['description']); ?>
                     </td>
                     <td style="border: 1px solid black;">
                        <?php echo htmlspecialchars($row['address']); ?>
                     </td>


                     <td style="border: 1px solid black;">
                        <?php echo htmlspecialchars($row['contact']); ?>
                     </td>
                     <td style="border: 1px solid black;">
                        <?php echo htmlspecialchars($row['email']); ?>
                     </td>
                     <td style="border: 1px solid black;">
                        <img src="uploaded_img/<?php echo htmlspecialchars($row['logo']); ?>" height="50" width="150"
                           alt="logo">
                     </td>

                  </tr>
               <?php } ?>
            </table>

            <br>
            <br>
         </div>

      </div>

   </div>

   </div>

   <?php

   ?>





</body>

<!-- ApexCharts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
<!-- Custom JS -->
<script src="js/scripts.js"></script>

</html>
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




if (isset ($_POST['update_business_name'])) {

   // Validate the input
   $title = $_POST['title'];

   if (!preg_match("/^[a-zA-Z0-9 ]*$/", $title)) {
      echo "<script>alert('Only letters, numbers, and whitespace are allowed');</script>";

   }

   if (empty ($title)) {
      echo "<script>alert('Please fill out the field');</script>";

   }

   // Use prepared statements to prevent SQL injection
   $stmt = $conn->prepare("UPDATE upload SET title=?");
   $stmt->bind_param("s", $title);
   $stmt->execute();

   // Log the activity
   $editbusinessname = 'edit business name';
   $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
   $stmt->bind_param("ss", $username, $editbusinessname);
   $stmt->execute();


}
;
if (isset ($_POST['update_business_description'])) {

   // Validate the input
   $description = $_POST['description'];

   if (empty ($description)) {
      echo "<script>alert('Please fill out the field');</script>";

   }

   // Use prepared statements to prevent SQL injection
   $stmt = $conn->prepare("UPDATE upload SET description=?");
   $stmt->bind_param("s", $description);
   $stmt->execute();

   // Log the activity
   $editbusinessdescription = 'edit business description';
   $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
   $stmt->bind_param("ss", $username, $editbusinessdescription);
   $stmt->execute();


}
;

if (isset ($_POST['update_business_email'])) {

   // Validate the input
   $email = $_POST['email'];


   // Use prepared statements to prevent SQL injection
   $stmt = $conn->prepare("UPDATE upload SET email=?");
   $stmt->bind_param("s", $email);
   $stmt->execute();

   // Log the activity
   $editemail = 'edited company email';
   $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
   $stmt->bind_param("ss", $username, $editemail);
   $stmt->execute();


}
;
if (isset ($_POST['update_business_address'])) {

   // Validate the input
   $address = $_POST['company_address'];

   if (empty ($address)) {
      echo "<script>alert('Please fill out the field');</script>";

   }

   // Use prepared statements to prevent SQL injection
   $stmt = $conn->prepare("UPDATE upload SET address=?");
   $stmt->bind_param("s", $address);
   $stmt->execute();

   // Log the activity
   $editbusinessaddress = 'edit business address';
   $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
   $stmt->bind_param("ss", $username, $editbusinessaddress);
   $stmt->execute();


}
;
if (isset ($_POST['update_business_contact'])) {

   // Validate the input
   $contact = $_POST['company_contact'];
   if (!preg_match("/^[0-9]{11}$/", $contact)) {
      echo "<script>alert('Please enter exactly 11 numbers');</script>";
   } else {
      if (empty ($contact)) {
         echo "<script>alert('Please fill out the field');</script>";
      }

      // Use prepared statements to prevent SQL injection
      $stmt = $conn->prepare("UPDATE upload SET contact=?");
      $stmt->bind_param("i", $contact);
      $stmt->execute();

      // Log the activity
      $editbusinesscontact = 'edit business contact number';
      $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
      $stmt->bind_param("ss", $username, $editbusinesscontact);
      $stmt->execute();

   }

}

if (isset ($_POST['update_business_logo'])) {
   $company_logo = $_FILES['company_logo']['name'];
   $company_logo_tmp_name = $_FILES['company_logo']['tmp_name'];

   if (empty ($company_logo)) {
      echo "<script>alert('Please fill out all');</script>";
   } else {
      $stmt = $conn->prepare("UPDATE upload SET logo=?");
      $stmt->bind_param("s", $company_logo);
      $stmt->execute();

      $target_dir = "uploaded_img/";
      $target_file_logo = $target_dir . basename($company_logo);
      move_uploaded_file($company_logo_tmp_name, $target_file_logo);

   }
}
;
if (isset ($_POST['update_business_home'])) {
   $display_image = $_FILES['display_image']['name'];
   $display_image_tmp_name = $_FILES['display_image']['tmp_name'];


   if (empty ($display_image)) {
      echo "<script>alert('Please fill out all');</script>";
   } else {
      $stmt = $conn->prepare("UPDATE upload SET homepage_image=?");
      $stmt->bind_param("s", $display_image);
      $stmt->execute();

      $target_dir = "uploaded_img/";
      $target_file_image = $target_dir . basename($display_image);
      move_uploaded_file($display_image_tmp_name, $target_file_image);

   }
}
;

if (isset ($_POST['update_business_gcash'])) {
   $gcash_qr = $_FILES['gcash_qr']['name'];
   $gcash_qr_tmp_name = $_FILES['gcash_qr']['tmp_name'];


   if (empty ($gcash_qr)) {
      echo "<script>alert('Please fill out all');</script>";
   } else {
      $stmt = $conn->prepare("UPDATE upload SET gcash_ss=?");
      $stmt->bind_param("s", $gcash_qr);
      $stmt->execute();

      $target_dir = "uploaded_img/";
      $target_file_image = $target_dir . basename($gcash_qr);
      move_uploaded_file($gcash_qr_tmp_name, $target_file_image);

   }
}
;


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
            <li class="sidebar-list-item" style="opacity: 0.5;">
               <a href="admin_creation/regular_admin_page.php">
                  <span class="material-icons-outlined">dashboard</span> Dashboard
               </a>
            </li>
            <li class="sidebar-list-item">
               <a href="uploads.php">
                  <span class="material-icons-outlined">wysiwyg</span> Setup Website
               </a>
            </li>
            <li class="sidebar-list-item" style="opacity: 0.5;">
               <a href="CRUD.php">
                  <span class="material-icons-outlined">inventory</span> Manage Products
               </a>
            </li>


            <li class="sidebar-list-item" style="opacity: 0.5;">
               <a href="user_accounts.php">
                  <span class="material-icons-outlined">group</span> Accounts
               </a>
            </li>
            <li class="sidebar-list-item" style="opacity: 0.5;">
               <a href="order_status.php">
                  <span class="material-icons-outlined">inventory</span> Manage Order Status
               </a>
            </li>
            <li class="sidebar-list-item" style="opacity: 0.5;">
               <a href="admin_logs.php">
                  <span class="material-icons-outlined">face</span> Admin Logs
               </a>
            </li>
         </ul>
      </aside>

      </main>
      <div class="container">

         <style>
            .detail-btn {
               background-color: #f9c47f;
               border-radius: 0px;

            }

            .detail-btn:hover {
               background-color: #F4B39D;
               color: white;
            }
         </style>
      </div>
      <div class="admin-product-form-container">

         <form action="" method="post" enctype="multipart/form-data">
            <br>
            <br>
            <h3>SETUP YOUR WEBSITE</h3>
            <ul class="list-group" style="margin-top: 20px;">

               <li class="list-group-item d-flex justify-content-center">
                  <input type="text" placeholder="Business Name" name="title" class="box" style="width: 80%;">
                  <input type="submit" value="&#x2713;" name="update_business_name" class="btn detail-btn">
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="text" placeholder="Business Description" name="description" class="box"
                     style="width: 80%;">
                  <input type="submit" value="&#x2713;" name="update_business_description" class="btn detail-btn">
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="text" placeholder="Business Email Address" name="email" class="box" style="width: 80%;">
                  <input type="submit" value="&#x2713;" name="update_business_email" class="btn detail-btn">
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="text" placeholder="Business Address" name="company_address" class="box"
                     style="width: 80%;">
                  <input type="submit" value="&#x2713;" name="update_business_address" class="btn detail-btn">
               </li>
               <li class="list-group-item d-flex justify-content-center">
                  <input type="tel" placeholder="Business Contact number" name="company_contact" class="box"
                     style="width: 80%;">
                  <input type="submit" value="&#x2713;" name="update_business_contact" class="btn detail-btn">
               </li>

               <li class="list-group-item" style="text-align: center;">
                  <div style="margin-left: 37px;">
                     <h4>COMPANY LOGO |150X50px size required </h4>
                  </div>
                  <div style="margin-left: 120px; margin-bottom: 20px;">
                     <input type="file" accept="image/png, image/jpeg, image/jpg" name="company_logo" class="box">
                  </div>
                  <input type="submit" value="Upload Logo" name="update_business_logo" class="btn detail-btn"
                     style="border-radius:20px">
               </li>


               <li class="list-group-item" style="text-align: center;">
                  <h4>UPLOAD HOMEPAGE IMAGE</h4>
                  <div style="margin-left: 50px;">

                  </div>

                  <div style="margin-left: 120px; margin-bottom: 20px;">
                     <input type="file" accept="image/png, image/jpeg, image/jpg" name="display_image" class="box">
                  </div>

                  <input type="submit" value="Upload Home Image" name="update_business_home" class="btn detail-btn"
                     style="border-radius:20px">
               </li>
               <li class="list-group-item" style="text-align: center;">
                  <h4>UPLOAD GCASH QR SCREENSHOT</h4>
                  <div style="margin-left: 50px;">

                  </div>

                  <div style="margin-left: 120px; margin-bottom: 20px;">
                     <input type="file" accept="image/png, image/jpeg, image/jpg" name="gcash_qr" class="box">
                  </div>

                  <input type="submit" value="Upload GCASH QR" name="update_business_gcash" class="btn detail-btn"
                     style="border-radius:20px">
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
                        <th style="border: 1px solid black">Email Address</th>
                        <th style="border: 1px solid black;">Company Address</th>
                        <th style="border: 1px solid black;">Contact Number</th>
                        <th style="border: 1px solid black">Logo</th>
                        <th style="border: 1px solid black">Display Image</th>
                        <th style="border: 1px solid black">GCASH</th>

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
                        <?php echo htmlspecialchars($row['email']); ?>
                     </td>
                     <td style="border: 1px solid black;">
                        <?php echo htmlspecialchars($row['address']); ?>
                     </td>
                     <td style="border: 1px solid black;">
                        <?php echo htmlspecialchars($row['contact']); ?>
                     </td>
                     <td style="border: 1px solid black;">
                        <img src="uploaded_img/<?php echo htmlspecialchars($row['logo']); ?>" width="150" alt="logo">
                     </td>
                     <td style="border: 1px solid black;">
                        <img src="uploaded_img/<?php echo htmlspecialchars($row['homepage_image']); ?>" width="150"
                           alt="logo">
                     </td>
                     <td style="border: 1px solid black;">
                        <img src="uploaded_img/<?php echo htmlspecialchars($row['gcash_ss']); ?>" width="150" alt="gcash">
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
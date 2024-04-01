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
      echo "<script>alert('Only letters, numbers, and whitespace are allowed in product name');</script>";

   }

   if (empty($product_name)) {
      echo "<script>alert('Please fill out product name');</script>";

   }

   // Use prepared statements to prevent SQL injection
   $stmt = $conn->prepare("UPDATE products SET name=?, date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = ?");
   $stmt->bind_param("si", $product_name, $id);
   $stmt->execute();

   // Log the activity
   $editproductname = 'edit product name';
   $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
   $stmt->bind_param("ss", $username, $editproductname);
   $stmt->execute();


}
;

if (isset($_POST['update_price'])) {

   // Validate the input
   $product_price = $_POST['product_price'];
   if (!is_numeric($product_price)) {
      echo "<script>alert('Something went wrong');</script>";
   }

   if (empty($product_price)) {
      echo "<script>alert('Please fill out properly');</script>";

   }

   // Use prepared statements to prevent SQL injection
   $stmt = $conn->prepare("UPDATE products SET price=?, date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = ?");
   $stmt->bind_param("di", $product_price, $id);
   $stmt->execute();

   // Log the activity
   $editproductprice = 'edit product price';
   $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
   $stmt->bind_param("ss", $username, $editproductprice);
   $stmt->execute();



}
;


if (isset($_POST['update_description'])) {

   // Validate the input
   $product_description = trim($_POST['product_description']);
   if (strlen($product_description) > 500) {

      echo "<script>alert('Description should not exceed 500 characters');</script>";

   }

   if (empty($product_description)) {

      echo "<script>alert('Please fill out the description');</script>";

   }

   // Use prepared statements to prevent SQL injection
   $stmt = $conn->prepare("UPDATE products SET description=?, date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = ?");
   $stmt->bind_param("si", $product_description, $id);
   $stmt->execute();

   // Log the activity
   $editproductdescription = 'edit product description';
   $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
   $stmt->bind_param("ss", $username, $editproductdescription);
   $stmt->execute();
}


if (isset($_POST['update_image'])) {

   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/' . $product_image;

   if (empty($product_image)) {

      echo "<script>alert('Please fill required attachment');</script>";
   } else {
      $editproductimage = 'change product image';
      $update_data = "UPDATE products SET image='admin/uploaded_img/$product_image', date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = '$id'";
      $product_logs = "INSERT INTO admin_activity_log(username, date_log, time_log, action) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$editproductimage')";
      $upload = mysqli_query($conn, $update_data);
      $data_check = mysqli_query($conn, $product_logs);
      if ($upload) {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);

      } else {

         echo "<script>alert('Please fill required attachment');</script>";
      }
   }

}
if (isset($_POST['upload_image'])) {
   $product_gallery = mysqli_real_escape_string($conn, $_FILES['product_gallery']['name']);
   $product_gallery_tmp_name = $_FILES['product_gallery']['tmp_name'];
   $product_image_folder = 'uploaded_img/' . $product_gallery;

   if (empty($product_gallery)) {
      echo "<script>alert('Please insert a file');</script>";
   } else {
      $insert = "INSERT INTO product_gallery(product_id, product_image, date_uploaded) 
         VALUES('$id', '$product_gallery', CURRENT_TIME())";
      $product_logs = "INSERT INTO admin_activity_log(username, date_log, time_log,  action) 
         VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'uploaded a file on product #$id')";
      $data_check = mysqli_query($conn, $product_logs);
      $upload = mysqli_query($conn, $insert);
      if ($upload) {
         move_uploaded_file($product_gallery_tmp_name, $product_image_folder);
         echo "<script>alert('New Image Added Successfully');</script>";
      } else {
         echo "<script>alert('Could not add the product');</script>";
      }
   }

}
if (isset($_GET['delete'])) {
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM product_gallery WHERE id = $id");
   mysqli_query($conn, "INSERT INTO admin_activity_log(username, date_log, time_log,  action) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'deleted a image in the gallery [product # $id]')");
   echo "<script>alert('Removed Successfully');</script>";
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
         <div>

         </div>


         <div class="column " style="padding: 20px;">

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
                     <textarea class="box me-1 pe-5" name="product_description" value=""
                        placeholder="new description"></textarea>

                     <input type="submit" value="UPDATE" name="update_description" class="btn btn-dark">
                  </li>
                  <li class="list-group-item d-flex justify-content-center">
                     <input type="file" class="box me-1 pe-4" name="product_image"
                        accept="image/png, image/jpeg, image/jpg">

                     <input type="submit" value="UPDATE MAIN IMAGE" name="update_image" class="btn btn-dark">
                  </li>
                  <li class="list-group-item d-flex justify-content-center">
                     <input type="file" class="box me-1 pe-4" name="product_gallery"
                        accept="image/png, image/jpeg, image/jpg">

                     <input type="submit" value="UPLOAD TO GALLERY" name="upload_image" class="btn btn-dark">
                  </li>



               </ul>
               <br>
               <br>
            </form>

            <?php

            $select = mysqli_query($conn, "SELECT * FROM product_gallery WHERE product_id = '$id' ORDER BY gallery_id DESC");

            ?>

            <div style="padding: 20px;">
               <form action="" method="post">
                  <table class="table align-middle mb-0 bg-white" style="border: 1px solid #EEEEEE; border-radius: 5px; ">
                     <thead class="bg-light">
                        <tr>
                           <th>
                              Select
                           </th>
                           <th>Image ID</th>
                           <th>Product Image</th>
                           <th>Date Uploaded</th>

                        </tr>
                     </thead>
                     <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                        <tr>

                           <td>
                              <input type="checkbox" name="delete_ids[]" value="<?php echo $row['gallery_id']; ?>">
                           </td>
                           <td style="text-align: center;">
                              <input type="hidden" name="image_id" value=" <?php echo $row['gallery_id']; ?>">
                              <?php echo $row['gallery_id']; ?>
                           </td>
                           <td><img src="uploaded_img/<?php echo $row['product_image']; ?>" height="100" width="100"
                                 alt="logo">
                           </td>
                           <td>
                              <?php echo $row['date_uploaded']; ?>
                           </td>

                        </tr>
                     <?php } ?>
                  </table>
                  <br>
                  <br>
                  <button type="submit" name="delete_submit" class="btn btn-danger">Delete Selected</button>
               </form>
            </div>
            <?php

            if (isset($_POST['delete_submit'])) {
               // Get the list of checkbox values
               $delete_ids = $_POST['delete_ids'];
               $image_id = $_POST['image_id'];

               // Loop through the list of IDs to delete
               foreach ($delete_ids as $gallery_id) {
                  // Prepare a delete statement
                  $delete_stmt = $conn->prepare("DELETE FROM product_gallery WHERE gallery_id = ?");
                  $delete_stmt->bind_param("i", $image_id);
                  $delete_stmt->execute();
               }


               // Display the alert messages
               echo "<script>alert('Removed Successfully');</script>";

               // Redirect back to the admin page with the ID of the item being edited
               echo "<script>window.location.href = 'admin_update.php?edit=$id';</script>";

            }
            ?>
         </div>


      </div>

      <?php

      ?>


   <?php }
      ; ?>





</body>

</html>
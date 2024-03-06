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
   header('Location: admin_creation/login_form.php');
}


if (isset($_POST['add_product'])) {
   $create = 'createa a product';
   $category = $_POST['category'];
   $username = $_SESSION['user_name'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_description = $_POST['product_description'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/' . $product_image;

   if (empty($product_name) || empty($product_price) || empty($product_image)) {
      $message[] = 'please fill out all';
   } else {
      $insert = "INSERT INTO products(category,name, price, image, description, date_created, time_created) 
      VALUES('$category', '$product_name', '$product_price', 'admin/uploaded_img/$product_image', '$product_description', CURRENT_DATE(), CURRENT_TIME())";
      $product_logs = "INSERT INTO product_log(username, date_log, time_log,  edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$create : $product_name')";
      $data_check = mysqli_query($conn, $product_logs);
      $upload = mysqli_query($conn, $insert);
      if ($upload) {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      } else {
         $message[] = 'could not add the product';
      }
   }

}
;

if (isset($_GET['delete'])) {
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE id = $id");
   mysqli_query($conn, "DELETE FROM stocks WHERE product_id = $id");
   mysqli_query($conn, "INSERT INTO product_log(username, date_log, time_log,  edit_create) 
   VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'deleted a product : $product_name')");
   header('location:CRUD.php');
}
;

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
                  <span class="material-icons-outlined">home</span> Dashboard
               </a>
            </li>

            <li class="sidebar-list-item">
               <a href="uploads.php">
                  <span class="material-icons-outlined">dashboard</span> Setup Website
               </a>
            </li>
            <li class="sidebar-list-item">
               <a href="CRUD.php">
                  <span class="material-icons-outlined">inventory</span> Manage Products
               </a>
            </li>
            <a href="categories.php">
               <li class="sidebar-list-item">
                  <span class="material-icons-outlined">inventory_2</span> Add Category
            </a>
            </li>
            <li>
               <a href="units.php">
            <li class="sidebar-list-item">
               <span class="material-icons-outlined">inventory_2</span> Add Color & Sizes
               </a>
            </li>
            <li class="sidebar-list-item">
               <a href="stocks_update.php">
                  <span class="material-icons-outlined">fact_check</span> Stocks Update
               </a>
            </li>

            <li class="sidebar-list-item">
               <a href="analytics.php">
                  <span class="material-icons-outlined">fact_check</span> Data & Information
               </a>
            </li>
            <li class="sidebar-list-item">
               <a href="analytics_table/admin_logs.php">
                  <span class="material-icons-outlined">inventory</span> Manage Order Status
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

      <!-- Main -->
      <?php

      if (isset($message)) {
         foreach ($message as $message) {
            echo '<span class="message">' . $message . '</span>';
         }
      }

      ?>
      <main class="main-container">
         <style>
            .input-container {
               display: flex;
               flex-wrap: nowrap;
            }

            .box {
               flex: 1;
               margin-right: 10px;
            }

            select.box {
               margin-right: 10px;
            }
         </style>

         <div class="container">

            <div class="card-body">
               <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                  <h3 style="text-align: center;">Manage Products</h3>
                  <p>Add a Product</p>
                  <div class="input-container">
                     <select class="box" name="category">
                        <option>Select category</option>
                        <?php
                        foreach ($options as $option) {
                           ?>
                           <option>
                              <?php echo $option['category']; ?>
                           </option>
                           <?php
                        }
                        ?>
                     </select>
                     <input type="text" placeholder="Enter product name" name="product_name" class="box">
                     <input type="text" placeholder="Enter product description" name="product_description" class="box">
                     <input type="number" placeholder="Enter product price" name="product_price" class="box">
                  </div>
                  <br>
                  <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
            </div>
            <br>
            <div class="card-body">
               <input type="submit" class="btn btn-primary" name="add_product" value="SUBMIT">
               </form>
            </div>




         </div>


         <div class="container">



         </div>


         <?php

         $select = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");

         ?>

         <br>
         <table class="table table-bordered border-primary">
            <thead>
               <tr>

                  <th style="border: 1px solid black;">product image</th>
                  <th style="border: 1px solid black;">product category</th>
                  <th style="border: 1px solid black;">product name</th>
                  <th style="border: 1px solid black;">product price</th>
                  <th style="width: 30%; border: 1px solid black">product description</th>
                  <th style="border: 1px solid black;">edit product</th>
                  <th style="border: 1px solid black;">manage stocks</th>
                  <th style="border: 1px solid black;">remove product</th>


               </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
               <tr>

                  <td style="border: 1px solid black"><img src="../<?php echo $row['image']; ?>" height="100" width="100"
                        alt="logo">
                  </td>
                  <td style="border: 1px solid black;">
                     <?php echo $row['category']; ?>
                  </td>
                  <td style="border: 1px solid black;">
                     <?php echo $row['name']; ?>
                  </td>
                  <td style="border: 1px solid black;">₱
                     <?php echo $row['price']; ?>.00
                  </td>


                  <td style="border: 1px solid black;">
                     <?php echo $row['description']; ?>
                  </td>
                  <td style="border: 1px solid black;">
                     <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary"> <i
                           class="fas fa-edit"></i>
                        edit </a>
                  </td>

                  <td style="border: 1px solid black;">
                     <a href="stocks_update.php?manage=<?php echo $row['id']; ?>" class="btn btn-secondary"> <i
                           class="fas fa-edit"></i> manage </a>
                  </td>
                  <td style="border: 1px solid black;">
                     <a href="CRUD.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger"> <i
                           class="fas fa-trash"></i>
                        delete </a>
                  </td>
               </tr>
            <?php } ?>
         </table>
         <br>
         <br>





      </main>
      <!-- End Main -->
</body>



</html>
<?php
ini_set('display_errors', 1);
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


if (isset ($_POST['add_product'])) {
   $create = 'create a product';
   $category = mysqli_real_escape_string($conn, $_POST['category']);
   $username = mysqli_real_escape_string($conn, $_SESSION['user_name']);
   $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
   $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
   $product_image = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);
   $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/' . $product_image;

   if (empty ($product_name) || empty ($product_price) || empty ($product_image)) {
      echo "<script>alert('Please fill out all');</script>";
   } else {
      $insert = "INSERT INTO products(category,name, price, image, description, date_created, time_created, date_edited, time_edited)  
         VALUES('$category', '$product_name', '$product_price', 'admin/uploaded_img/$product_image', '$product_description', CURRENT_DATE(), CURRENT_TIME(), CURRENT_DATE(), CURRENT_TIME())";
      $product_logs = "INSERT INTO admin_activity_log(username, date_log, time_log, action) 
         VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$create : (\"$product_name\")')";

      $data_check = mysqli_query($conn, $product_logs);
      $upload = mysqli_query($conn, $insert);
      if ($upload) {
         $product_id = mysqli_insert_id($conn);
         $insert_gallery = "INSERT INTO product_gallery (product_id, product_image, date_uploaded) 
         VALUES('$product_id', '$product_image', CURRENT_TIME())";
         $upload_img = mysqli_query($conn, $insert_gallery);
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         echo "<script>alert('New Product Added Successfully');</script>";

       
      } else {
         echo "<script>alert('Could not add the product');</script>";
      }
   }

}
;


?>
<!-- for categories -->
<?php

if (isset ($_POST['add_product_category'])) {
   $create = 'created a category';
   $username = $_SESSION['user_name'];
   $category = $_POST['category'];

   // Check if category already exists
   $duplicate_check = "SELECT * FROM category WHERE category = ?";
   $stmt = $conn->prepare($duplicate_check);
   $stmt->bind_param("s", $category);
   $stmt->execute();
   $result = $stmt->get_result();
   if ($result->num_rows > 0) {
      echo "<script>alert('Category Already Exists');</script>";
   } else {
      if (empty ($category)) {
         echo "<script>alert('Please fill out all fields.');</script>";
      } else {
         // Insert category
         $insert = "INSERT INTO category (category) VALUES(?)";

         $stmt = $conn->prepare($insert);
         $stmt->bind_param("s", $category);
         $stmt->execute();

         // Insert log
         $product_logs = "INSERT INTO admin_activity_log(username, date_log, time_log,  action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(), ?)";
         $stmt = $conn->prepare($product_logs);
         $action = $create . ': ("' . $category . '")';
         $stmt->bind_param("ss", $username, $action);
         $stmt->execute();
         echo "<script>alert('Category Added Successfully');</script>";

       


      }
   }
}
;



?>

<!-- for colors and sizes -->
<?php
if (isset ($_POST['add_product_unit'])) {
   $create = 'created a unit';
   $username = $_SESSION['user_name'];
   $unit = $_POST['unit'];

   // Check if unit already exists
   $stmt = $conn->prepare("SELECT * FROM product_units WHERE unit_name = ?");
   $stmt->bind_param("s", $unit);
   $stmt->execute();
   $result = $stmt->get_result();
   if ($result->num_rows > 0) {
      echo "<script>alert('Unit already exists');</script>";
   } else {
      // Prepare the INSERT statement
      $stmt = $conn->prepare("INSERT INTO product_units (unit_name) VALUES (?)");

      // Bind the parameters
      $stmt->bind_param("s", $unit);

      // Execute the statement
      if ($stmt->execute()) {
         // Insert log
         $logs = "INSERT INTO admin_activity_log(username, date_log, time_log,  action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(), ?)";
         $stmt = $conn->prepare($logs);
         $action = $create . ': ("' . $unit . '")';
         $stmt->bind_param("ss", $username, $action);
         $stmt->execute();
         echo "<script>alert('Added successfully');</script>";

      
      } else {
         echo "<script>alert('We encountered an error!');</script>";
      }

      // Close the prepared statement
      $stmt->close();
   }
}
if (isset ($_POST['add_product_color'])) {
   $create = 'created a color';
   $username = $_SESSION['user_name'];
   $color = $_POST['color'];

   // Check if color already exists
   $stmt = $conn->prepare("SELECT * FROM color WHERE color_name = ?");
   $stmt->bind_param("s", $color);
   $stmt->execute();
   $result = $stmt->get_result();
   if ($result->num_rows > 0) {
      echo "<script>alert('Color already exists');</script>";
   } else {
      // Prepare the INSERT statement
      $stmt = $conn->prepare("INSERT INTO color (color_name) VALUES (?)");

      // Bind the parameters
      $stmt->bind_param("s", $color);
      if ($stmt->execute()) {
         // Insert log
         $logs = "INSERT INTO admin_activity_log(username, date_log, time_log,  action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(), ?)";
         $stmt = $conn->prepare($logs);
         $action = $create . ': ("' . $color . '")';
         $stmt->bind_param("ss", $username, $action);
         $stmt->execute();
         // Execute the statementif ($stmt->execute()) {
         echo "<script>alert('New color added successfully.');</script>";

       
      } else {
         echo "<script>alert('We encountered a problem');</script>";
      }

      // Close the prepared statement
      $stmt->close();
   }
}
;


//delete query//
if (isset ($_GET['delete'])) {
   $id = $_GET['delete'];

   // Get product name
   $result = mysqli_query($conn, "SELECT name FROM products WHERE id = $id");
   $product_name = '';
   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $product_name = $row['name'];
   }

   mysqli_query($conn, "DELETE FROM products WHERE id = $id");
   mysqli_query($conn, "DELETE FROM stocks_unit WHERE product_id = $id");
   mysqli_query($conn, "DELETE FROM stocks_color WHERE product_id = $id");
   mysqli_query($conn, "INSERT INTO admin_activity_log(username, date_log, time_log, action) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'deleted a product (\"$product_name\")')");
   echo "<script>alert('Removed Successfully');</script>";

   
}
;
if (isset ($_GET['category_delete'])) {
   $id = $_GET['category_delete'];

   // Get category name
   $result = mysqli_query($conn, "SELECT category FROM category WHERE id = $id");
   $category_name = '';
   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $category_name = $row['category'];
   }

   mysqli_query($conn, "DELETE FROM category WHERE id = $id");
   mysqli_query($conn, "INSERT INTO admin_activity_log(username, date_log, time_log, action) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'deleted category (\"$category_name\")')");
   echo "<script>alert('Removed Successfully');</script>";



}
;
if (isset ($_GET['unit_delete'])) {
   $id = $_GET['unit_delete'];

   // Get unit name
   $result = mysqli_query($conn, "SELECT unit_name FROM product_units WHERE id = $id");
   $unit_name = '';
   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $unit_name = $row['unit_name'];
   }

   mysqli_query($conn, "DELETE FROM product_units WHERE id = $id");
   mysqli_query($conn, "INSERT INTO admin_activity_log(username, date_log, time_log, action) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'deleted a unit (\"$unit_name\")')");
   echo "<script>alert('Removed Successfully');</script>";


}

if (isset ($_GET['color_delete'])) {
   $id = $_GET['color_delete'];

   // Get color name
   $result = mysqli_query($conn, "SELECT color_name FROM color WHERE id = $id");
   $color_name = '';
   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $color_name = $row['color_name'];
   }

   mysqli_query($conn, "DELETE FROM color WHERE id = $id");
   mysqli_query($conn, "INSERT INTO admin_activity_log(username, date_log, time_log, action) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'deleted a color (\"$color_name\")')");
   echo "<script>alert('Removed Successfully');</script>";

  
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

   <div class="grid-container" style="background-color: #fffdf6;">

      <!-- Header -->
      <header class="header">
         <div class="menu-icon" onclick="openSidebar()">
            <span class="material-icons-outlined">menu</span>
         </div>
         <div class="header-left">

            <a href="CRUD.php">
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
            <li class="sidebar-list-item" style="opacity: 0.5;">
               <a href="admin_creation/regular_admin_page.php">
                  <span class="material-icons-outlined">dashboard</span> Dashboard
               </a>
            </li>
            <li class="sidebar-list-item" style="opacity: 0.5;">
               <a href="uploads.php">
                  <span class="material-icons-outlined">wysiwyg</span> Setup Website
               </a>
            </li>
            <li class="sidebar-list-item">
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
                     <input type="text" placeholder="Enter product name" name="product_name" class="box" required>
                     <input type="text" placeholder="Enter product description" name="product_description" class="box"
                        required>
                     <input type="number" placeholder="Enter product price" name="product_price" class="box"
                        id="productPriceInput" required>
                     <script>
                        document.getElementById('productPriceInput').addEventListener('input', function (e) {
                           // Only allow numbers and decimal point
                           this.value = this.value.replace(/[^0-9.]/g, '');

                           // Only allow one decimal point
                           this.value = this.value.replace(/\.(\..*)/g, '1');
                        });
                     </script>
                  </div>
                  <br>
                  <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box"
                     required>
            </div>
            <br>
            <div class="card-body">
               <input type="submit" class="btn detail-btn" name="add_product" value="SUBMIT">
               </form>
            </div>




         </div>



         <?php

         $select = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");

         ?>

         <br>
         <table class="table align-middle mb-0 bg-white"
            style="border: 1px solid #EEEEEE; border-radius: 5px;     box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
            <thead class="bg-light">
               <tr>

                  <th>Product Image</th>
                  <th>Product Category</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product description</th>
                  <th>Edit Product</th>
                  <th>Manage Stocks</th>
                  <th>Remove Product</th>


               </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
               <tr>

                  <td><img src="../<?php echo $row['image']; ?>" height="100" width="100" alt="logo">
                  </td>
                  <td>
                     <?php echo $row['category']; ?>
                  </td>
                  <td>
                     <?php echo $row['name']; ?>
                  </td>
                  <td>₱
                     <?php echo $row['price']; ?>.00
                  </td>


                  <td>
                     <?php echo $row['description']; ?>
                  </td>
                  <td>
                     <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn detail-btn"> <i
                           class="fas fa-edit"></i>
                        Edit </a>
                  </td>

                  <td>
                     <a href="stocks_update.php?manage=<?php echo $row['id']; ?>" class="btn detail-btn"> <i
                           class="fas fa-edit"></i> Manage </a>
                  </td>
                  <td>
                     <a href="CRUD.php?delete=<?php echo $row['id']; ?>" class="btn detail-btn"> <i
                           class="fas fa-trash"></i>
                        Delete </a>
                  </td>
               </tr>
            <?php } ?>
         </table>



         <div class="column d-flex justify-content-evenly" style="padding: 20px;">
            <div class="d-flex justify-content-evenly" style=" height: 100px; width: 75%; padding: 20px;">
               <h5>Other Options:</h5>

               <button class="btn detail-btn" id="addCategoryBtn">ADD CATEGORY</button>
               <button class="btn detail-btn" id="addUnitBtn">ADD UNIT/SIZE</button>
               <button class="btn detail-btn" id="addColorBtn">ADD COLOR</button>
            </div>
         </div>
         <div id="addCategorySection" class="card card-order-status 4 mb-md-0">
            <div class="card-body">
               <h5>Add Category</h5>
               <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                  <input type="text" placeholder="Enter Category name" name="category" class="box" required>
                  <input type="submit" class="btn btn-secondary" name="add_product_category" value="SUBMIT">
               </form>
               <br>
               <table class="table table-bordered border-primary">
                  <thead>
                     <tr>
                        <th style="border: 1px solid black;">Category Name</th>
                        <th style="border: 1px solid black;">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $select = mysqli_query($conn, "SELECT * FROM category ORDER BY id DESC");
                     while ($row = mysqli_fetch_assoc($select)) {
                        ?>
                        <tr>
                           <td style="border: 1px solid black">
                              <?php echo $row['category']; ?>
                           </td>
                           <td style="border: 1px solid black;">
                              <a href="CRUD.php?category_delete=<?php echo $row['id']; ?>" class="btn btn-danger"> <i
                                    class="fas fa-trash"></i>
                                 delete </a>
                           </td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>

         <div id="addUnitSection" class="card card-order-status 4 mb-md-0">
            <div class="card-body">
               <h5>Add Unit/Size</h5>
               <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                  <input type="text" placeholder="Enter Unit/Size name" name="unit" class="box" required>
                  <input type="submit" class="btn btn-secondary" name="add_product_unit" value="SUBMIT">
               </form>
               <br>
               <table id="product_units_table" class="table table-bordered border-primary">
                  <thead>
                     <tr>
                        <th style="border: 1px solid black;">Unit/Size Name</th>
                        <th style="border: 1px solid black;">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $select = mysqli_query($conn, "SELECT * FROM product_units ORDER BY id DESC");
                     while ($row = mysqli_fetch_assoc($select)) {
                        ?>
                        <tr>
                           <td style="border: 1px solid black">
                              <?php echo $row['unit_name']; ?>
                           </td>
                           <td style="border: 1px solid black;">
                              <a href="CRUD.php?unit_delete=<?php echo $row['id']; ?>" class="btn btn-danger"> <i
                                    class="fas fa-trash"></i>
                                 delete </a>
                           </td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>

         <div id="addColorSection" class="card card-order-status 4 mb-md-0">
            <div class="card-body">
               <h5>Add Color</h5>
               <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                  <input type="text" placeholder="Enter Color" name="color" class="box" required>
                  <input type="submit" class="btn btn-secondary" name="add_product_color" value="SUBMIT">
               </form>
               <br>
               <table class="table table-bordered border-primary">
                  <thead>
                     <tr>
                        <th style="border: 1px solid black;">Product Color</th>
                        <th style="border: 1px solid black;">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $select = mysqli_query($conn, "SELECT * FROM color ORDER BY id DESC");
                     while ($row = mysqli_fetch_assoc($select)) {
                        ?>
                        <tr>
                           <td style="border: 1px solid black">
                              <?php echo $row['color_name']; ?>
                           </td>
                           <td style="border: 1px solid black;">
                              <a href="CRUD.php?color_delete=<?php echo $row['id']; ?>" class="btn btn-danger"> <i
                                    class="fas fa-trash"></i>
                                 delete </a>
                           </td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   <style>
      .detail-btn {
         background-color: #f9c47f;

      }

      .detail-btn:hover {
         background-color: #F4B39D;
         color: white;
      }
   </style>
   <script>
      document.getElementById('addCategoryBtn').addEventListener('click', function () { toggleVisibility('addCategorySection'); toggleVisibility('addUnitSection', false); toggleVisibility('addColorSection', false); });
      document.getElementById('addUnitBtn').addEventListener('click', function () {
         toggleVisibility('addCategorySection', false); toggleVisibility('addUnitSection');
         toggleVisibility('addColorSection', false);
      }); document.getElementById('addColorBtn').addEventListener('click', function () {
         toggleVisibility('addCategorySection', false);
         toggleVisibility('addUnitSection', false); toggleVisibility('addColorSection');
      }); function toggleVisibility(sectionId, shouldShow = true) { const section = document.getElementById(sectionId); section.style.display = shouldShow ? 'block' : 'none'; } </script>
   <style>
      .card-order-status {
         display: none;
      }




      </main>< !-- End Main --></body></html>
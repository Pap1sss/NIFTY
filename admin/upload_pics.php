<?php

@include 'config.php';
session_start();


if(isset($_POST['add_product'])){
   $create = 'createa a product';
   $category = $_POST['category'];
   $username = $_SESSION ['user_name'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_description = $_POST['product_description'];
   $product_quantity = $_POST['product_quantity'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO products(category,name, price, image, description, quantity, date_created, time_created) 
      VALUES('$category', '$product_name', '$product_price', 'admin/uploaded_img/$product_image', '$product_description', '$product_quantity', CURRENT_DATE(), CURRENT_TIME())";
      $product_logs = "INSERT INTO product_log(username, date_log, time_log,  edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$create : $product_name')";
      $data_check = mysqli_query($conn, $product_logs);
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE id = $id");
   mysqli_querystocks($conn, "DELETE FROM product_units WHERE product_id = $id");
   header('location:CRUD.php');
};

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

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
         <div class="container">

            <div class="content">
               <h3>hi, <span><?php echo $_SESSION['name'] ?></span></h3>
               <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
               <p>THIS IS WHERE YOU ADD, EDIT, REMOVE A PRODUCT</p>
               <a href="admin_creation/regular_admin_page.php" class="btn" style = "width: 300px">go back</a>
               <a href="admin_creation/logout.php" class="btn" style = "width: 300px">logout</a>
            </div>

         </div>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class="container">

<!-- fetch categories  -->

      <?php 
         $query ="SELECT category FROM category";
         $result = $conn->query($query);
         if($result->num_rows> 0){
            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
         }
      ?>

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
                  <select class = "box" name="category">
                        <option>Select category</option>
                     <?php 
                           foreach ($options as $option) {
                     ?>
                   <option> <?php echo $option['category']; ?> </option>
                     <?php 
                      }
                      ?>
                   </select>
         <input type="text" placeholder="Enter product name" name="product_name" class="box">
         <input type="text" placeholder="Enter product description" name="product_description" class="box">
         <input type="number" placeholder="Enter product price" name="product_price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>
      
   </div>
   

   <?php

   $select = mysqli_query($conn, "SELECT * FROM products");
   
   ?>
   <div class="product-display">
      
      <table class="product-display-table">
      <h1>MANAGE INVENTORY</h1>
         <thead>
         <tr>
            
            <th>product image</th>
            <th>product category</th>
            <th>product name</th>
            <th>product price</th>
            <th>edit product</th>
            <th>manage stocks</th>
            <th>remove product</th>
            <th style="width: 30%">product description</th>
            
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            
            <td><img src="../<?php echo $row['image']; ?>" height="100" alt="logo"></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>₱ <?php echo $row['price']; ?>.00</td>

            <td>
               <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
            </td>

            <td>
               <a href="stocks_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> manage </a>
            </td>
            <td>
            <a href="CRUD.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
            <td><?php echo $row['description']; ?></td>
         </tr>
      <?php } ?>
      </table>
      <br>
      <br>


      
   </div>
   
   </div>

</div>


</body>
</html>
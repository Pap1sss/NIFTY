<?php

@include 'config.php';
session_start();
$id = $_GET['edit'];



$username = $_SESSION ['user_name'];


if(isset($_POST['update_product_name'])){
   
   $product_name = $_POST['product_name'];
  

   if(empty($product_name)){
      $message[] = 'please fill out product name';    
   }else{
      $editproductname = 'edit product name';
      
      $update_data = "UPDATE products SET name='$product_name', date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = '$id'";
      $product_logs = "INSERT INTO product_log(username, date_log, time_log, edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$editproductname')";
      $upload = mysqli_query($conn, $update_data);
      $data_check = mysqli_query($conn, $product_logs);
      

   }
};

if(isset($_POST['update_price'])){

   $product_price = $_POST['product_price'];
   
   if(empty($product_price)){
      $message[] = 'please fill out price';    
   }else{
      $editproductprice= 'edit product price';

      $update_data = "UPDATE products SET price='$product_price', date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = '$id'";
      $product_logs = "INSERT INTO product_log(username, date_log, time_log, edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$editproductprice')";
      $upload = mysqli_query($conn, $update_data);
      $data_check = mysqli_query($conn, $product_logs);
   }

}

if(isset($_POST['update_quantity'])){

   $product_quantity = $_POST['product_quantity'];
  
   if(empty($product_quantity)){
      $message[] = 'please fill out quantity';    
   }else{
      $editproductquantity= 'edit product quantity';
      $update_data = "UPDATE products SET quantity='$product_quantity', date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = '$id'";
      $product_logs = "INSERT INTO product_log(username, date_log, time_log, edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$editproductquantity')";
      $upload = mysqli_query($conn, $update_data);
      $data_check = mysqli_query($conn, $product_logs);
   }

}

if(isset($_POST['update_image'])){
   
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   $product_price = $_POST['product_image'];
   if(empty($product_image)){
      $message[] = 'please fill attach image';    
   }else{
      $editproductimage= 'change product image';
      $update_data = "UPDATE products SET image='admin/uploaded_img/$product_image', date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = '$id'";
      $product_logs = "INSERT INTO product_log(username, date_log, time_log, edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$editproductimage')";
      $upload = mysqli_query($conn, $update_data);
      $data_check = mysqli_query($conn, $product_logs);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:CRUD.php');
      }else{
         $$message[] = 'please fill attach image'; 
      }
   }

}


?>

<!DOCTYPE html>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

            <div class="content">
               <h3>hi, <span><?php echo $_SESSION['name'] ?></span></h3>
               <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
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


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

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

   <form action="" method="post" enctype="multipart/form-data">

      <h3 class="title">update the product</h3>
      <img class="center" src="../<?php echo $row['image']; ?>" height="100" alt="logo" ></td>
      <h2 class ="center">&nbsp;&nbsp;PRODUCT INFORMATION</h2>
      <h1>NAME: <?php echo $row['name']; ?></h1>
      <h1>PRICE: ₱<?php echo $row['price']; ?> </h1>
      <h1>----------------------------------</h1>
      <h4>UPDATE NAME</h4>
      <input type="text" class="box" name="product_name" value="" placeholder="enter the product name">
      <input type="submit" value="update name" name="update_product_name" class="btn">
      <br>
      <br>
      <h4>UPDATE PRICE</h4>
      <input type="number" min="0" class="box" name="product_price" value="" placeholder="enter the product price">
      <input type="submit" value="update price" name="update_price" class="btn">
      <br>
      <br>
      <h4>UPDATE STOCKS</h4>
      <input type="number" min="0" class="box" name="product_quantity" value="" placeholder="enter the product quantity">
      <input type="submit" value="update stocks" name="update_quantity" class="btn">
      <br>
      <br>
      <h4>UPDATE IMAGE</h4>
      <input type="file" class="box" name="product_image" accept="image/png, image/jpeg, image/jpg" >
      <input type="submit" value="update image" name="update_image" class="btn">
      <a href="CRUD.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>
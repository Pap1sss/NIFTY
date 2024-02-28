<?php
@include 'config.php';
session_start();

if(isset($_POST['add_product'])){
   $create = 'created a category';
   $username = $_SESSION ['user_name'];
   $category = $_POST['category'];


   if(empty($category)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO category (category) 
      VALUES('$category')";
      $product_logs = "INSERT INTO product_log(username, date_log, time_log,  edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$create : $category')";
      $data_check = mysqli_query($conn, $product_logs);
      $upload = mysqli_query($conn,$insert);
      if($upload){
         $message[] = 'new category added successfully';
      }else{
         $message[] = 'could not add the category to the database';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM category WHERE id = $id");
   header('location:categories.php');
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
            <p>THIS IS WHERE YOU ADD, EDIT, REMOVE A CATEGORY</p>
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

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a category</h3>
         <input type="text" placeholder="Enter Category name" name="category" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>
      
   </div>
   

   <?php

   $select = mysqli_query($conn, "SELECT * FROM category");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>category name</th>
            <th>action</th>
            
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['category']; ?></td>
            <td>
               <a href="categories.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
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
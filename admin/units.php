<?php
@include 'config.php';
session_start();


if(isset($_POST['add_unit'])){
   $create = 'created a unit';
   $username = $_SESSION ['user_name'];
   $unit= $_POST['unit'];


   if(empty($unit)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO product_units (unit_name) 
      VALUES('$unit')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         $message[] = 'new size added successfully';
      }else{
         $message[] = 'could not add to the database';
      }
   }

};

if(isset($_POST['add_color'])){
   $create = 'created a color';
   $username = $_SESSION ['user_name'];
   $color= $_POST['color'];


   if(empty($color)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO color(color_name) 
      VALUES('$color')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         $message[] = 'new color added successfully';
      }else{
         $message[] = 'could not add to the database';
      }
   }

};


if(isset($_GET['1delete'])){
   $id = $_GET['1delete'];
   mysqli_query($conn, "DELETE FROM product_units WHERE id = $id"); 
   header('location:units.php');
};

if(isset($_GET['2delete'])){
   $id = $_GET['2delete'];
   mysqli_query($conn, "DELETE FROM color WHERE id = $id"); 
   header('location:units.php');
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
            <p>THIS IS WHERE YOU ADD, EDIT, REMOVE A UNIT</p>
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
   
      <div style = "display:flex;">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a size</h3>
         <input type="text" placeholder="ADD SIZE" name="unit" class="box">
         <input type="submit" class="btn" name="add_unit" value="add unit">
      </form>
      
   </div>
   

   <?php

   $select = mysqli_query($conn, "SELECT * FROM product_units");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>unit name</th>
            <th>action</th>
            
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['unit_name']; ?></td>
            <td>
               <a href="units.php?1delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
      <br>
      <br>


      
   </div>
   
 
<!--  -->

<div class="container">


   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a color</h3>
         <input type="text" placeholder="ADD COLOR" name="color" class="box">
         <input type="submit" class="btn" name="add_color" value="add color">
      </form>
      
   </div>
   

   <?php

   $select = mysqli_query($conn, "SELECT * FROM color");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>color name</th>
            <th>action</th>
            
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['color_name']; ?></td>
            <td>
               <a href="units.php?2delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
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



</body>
</html>
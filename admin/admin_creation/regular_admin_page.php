<?php

@include 'config.php';

session_start();


if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Regular Admin</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>CHOOSE WHAT YOU WANT TO DO</p>

      <a href="../units.php" class="btn" style = "width: 300px">ADD COLORS & SIZES</a>
      <a href="../categories.php" class="btn" style = "width: 300px">CREATE A CATEGORY</a>
      <a href="../CRUD.php" class="btn" style = "width: 300px">MANAGE INVENTORY</a>
      <a href="logout.php" class="btn" style = "width: 300px">LOGOUT</a>
   </div>

</div>

</body>
</html>
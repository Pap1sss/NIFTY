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
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

<div class="content">
      <h3>hi, <span><?php echo $_SESSION['name'] ?></span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>CHOOSE WHAT YOU WANT TO DO</p>
      <a href="../uploads.php" class="btn" style = "width: 300px">SETUP THE WEBSITE</a>
      <a href="../order_status.php" class="btn" style = "width: 300px">UPDATE ORDER STATUS</a>
      <a href="../analytics.php" class="btn" style = "width: 300px">VIEW DATA</a>
      <a href="logout.php" class="btn" style = "width: 300px">LOGOUT</a>
   </div>

</div>

</body>
</html>
<?php require_once "controllerUserData.php"; ?>
<?php


@include 'config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="ENTER USERNAME">
      <input type="password" name="password" required placeholder="ENTER PASSWORD">
      <input type="submit" name="login" value="login now" class="form-btn">
      <p> <a href="register_form.php">REGISTER AN ADMIN</a></p>
   </form>

</div>

</body>
</html>
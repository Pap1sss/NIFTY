<?php

@include 'config.php';

?>
<?php require_once "controllerUserData.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="register_form.php" method="post">
      <h3>CREATE ADMIN ACCOUNT</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="FULL NAME">
      <input type="text" name="username" required placeholder="USERNAME">
      <input type="password" name="password" required placeholder="PASSWORD">
      <input type="password" name="cpassword" required placeholder="VERIFY PASSWORD">
      <input type="password" name="code" required placeholder="ENTER COMPANY CODE">
      <input type="submit" name="submit" value="CREATE NOW" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>
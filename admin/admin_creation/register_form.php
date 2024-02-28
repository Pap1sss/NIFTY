<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = md5($_POST['password']);
   $cpassword = md5($_POST['cpassword']);
   $admin_type = $_POST['admin_type'];
   $code = $_POST['code'];
   $company_code = '12345678';

   $select = " SELECT * FROM admin_accounts WHERE username = '$username'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($password != $cpassword || $company_code != $code){
         $error[] = 'INVALID SIGN UP!';
         
      }else{
         $insert = "INSERT INTO admin_accounts(name, username, password, admin_type) VALUES('$name','$username','$password','$admin_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

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

   <form action="" method="post">
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
      <select name="admin_type">
         <option value="regular">regular</option>
         <option value="super">super</option>
      </select>

      <input type="password" name="code" required placeholder="ENTER COMPANY CODE">
      <input type="submit" name="submit" value="CREATE NOW" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>
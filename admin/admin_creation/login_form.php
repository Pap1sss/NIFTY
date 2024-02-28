<?php

@include 'config.php';

session_start();
if(isset($_POST['submit'])){
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = md5($_POST['password']);

   $select = " SELECT * FROM admin_accounts WHERE username = '$username' && password = '$password' ";
   
   $result = mysqli_query($conn, $select, $insert_logs);
   

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result,);
      
      if($row['admin_type'] == 'super'){

         $_SESSION['user_name'] = $row['username'];
         $_SESSION['name'] = $row['name'];
         header('location:super_admin_page.php');
         
         $insert_logs = "INSERT INTO admin_log (username, timein, date)
         values( '$username', CURRENT_TIME(), CURRENT_DATE())";

          $data_check = mysqli_query($conn, $insert_logs);

      }elseif($row['admin_type'] == 'regular'){

         $_SESSION['user_name'] = $row['username'];
         $_SESSION['name'] = $row['name'];
         header('location:regular_admin_page.php');

         $insert_logs = "INSERT INTO admin_log (username, timein, date)
         values( '$username', CURRENT_TIME(), CURRENT_DATE())";

         $data_check = mysqli_query($conn, $insert_logs);

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
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
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p> <a href="register_form.php">REGISTER AN ADMIN</a></p>
   </form>

</div>

</body>
</html>
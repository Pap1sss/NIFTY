<?php
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
$secure = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "";
if (!$secure) {
   $r = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   header("Location: $r");
   exit("use https!");
}
//if($secure) {
session_start();
/* and other secure happenings;;; */
//}
$_SESSION['logged_in'] = false;
require "config.php";
$username = "";
$name = "";
$errors = array();



//if  signup button
if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = md5($_POST['password']);
   $cpassword = md5($_POST['cpassword']);
   $code = $_POST['code'];
   $company_code = '12345678';

   $select = " SELECT * FROM admin_accounts WHERE username = '$username'";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $error[] = 'user already exist!';

   } else {

      if ($password != $cpassword || $company_code != $code) {
         $error[] = 'INVALID SIGN UP!';

      } else {
         $insert = "INSERT INTO admin_accounts(name, username, password) VALUES('$name','$username','$password')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

}
;

//if user click login button
if (isset($_POST['login'])) {
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = md5($_POST['password']);

   $select = " SELECT * FROM admin_accounts WHERE username = '$username' && password = '$password' ";

   $result = mysqli_query($conn, $select);


   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      $_SESSION['user_name'] = $row['username'];
      $_SESSION['name'] = $row['name'];

      // You can specify the default admin page here, or handle it separately based on your application logic
      header('location:regular_admin_page.php');

      $insert_logs = "INSERT INTO admin_log (username, timein, date)
           values( '$username', CURRENT_TIME(), CURRENT_DATE())";

      $data_check = mysqli_query($conn, $insert_logs);

   } else {
      $error[] = 'incorrect email or password!';
   }

}
;

//if login now button click
if (isset($_POST['login-now'])) {
   header('Location: login-user.php');
}

?>
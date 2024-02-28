<?php 
session_start(); 
include "config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Username</label>
     	<input type="text" name="username" placeholder=""><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder=""><br>

     	<button type="submit">Login</button>
     </form>
</body>
</html>
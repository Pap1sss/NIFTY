<?php

@include 'config.php';
session_start();


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
               <p>SETUP YOUR WEBSITE HERE!</p>
               <a href="admin_creation/super_admin_page.php" class="btn" style = "width: 300px">go back</a>
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

<?php

if(isset($_POST['upload'])){
   $title = $_POST['title'];
   $description = $_POST ['description'];
   $email= $_POST['email'];
   $address = $_POST['company_address'];
   $contact = $_POST['company_contact'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($title) || empty($description) || empty($email) || empty($address) || empty($contact) || empty($product_image)){
      $message[] = 'please fill out all';
   }else{
      $delete = "TRUNCATE TABLE upload;";
      $remove = mysqli_query ($conn, $delete);
      $insert = "INSERT INTO upload(title, description, address, contact, email, logo) 
      VALUES('$title', '$description', '$address', '$contact', '$email', '$product_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

?>

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>SETUP YOUR WEBSITE</h3>
         <input type="text" placeholder="Enter Business/Company Name" name="title" class="box">
         <input type="text" placeholder="Enter Business/Company Description" name="description" class="box">
         <input type="text" placeholder="Enter Business/Company Email Address" name="email" class="box">
         <input type="text" placeholder="Enter Business/Company Address" name="company_address" class="box">
         <input type="tel" placeholder="Enter Business/Company Contact number" name="company_contact" class="box">
         <h2>COMPANY LOGO | MAKE SURE SIZE OF LOGO IS 150X50PX</h2>
         <input type="file" accept="image/png, image/jpeg, image/jpg"  name="product_image" class="box">
         <input type="submit" class="btn" name="upload" value="UPLOAD">
      </form>
      
   </div>
   

   <?php

   $select = mysqli_query($conn, "SELECT * FROM upload");
   
   ?>
   <div class="product-display">
      
      <table class="product-display-table">
      <h1>YOUR COMPANY INFORMATION  </h1>
         <thead>
         <tr>
            
            <th>TITLE</th>
            <th style="width: 40%">DESCRIPTION</th>
            <th>ADDRESS</th>
            <th>CONTACT</th>
            <th style="width: 20%">EMAIL</th>
            <th>LOGO</th>
            <th></th>
            <th></th>
            
            
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            
            
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td> <?php echo $row['address']; ?></td>
            <td> <?php echo $row['contact']; ?></td>
            <td> <?php echo $row['email']; ?></td>
            <td><img src="uploaded_img/<?php echo $row['logo']; ?>" height="100" alt="logo"></td>

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
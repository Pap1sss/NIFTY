<?php

@include 'config.php';
session_start();
$id = $_GET['manage'];

if(isset($_POST['add_stocks'])){
   $create = 'add a stock of product id';
   $unit = $_POST['unit'];
   $color = $_POST['color'];
   $username = $_SESSION ['user_name'];
  
      $product_check = "SELECT * FROM stocks WHERE unit_name = '$unit' AND color_name = '$color' AND product_id = '$id' ";
      $res = mysqli_query($conn, $product_check);
      if(mysqli_num_rows($res) > 0){
         $message[] = 'stocks already added!!';
      }
      else{
      $insert = "INSERT INTO stocks(product_id,unit_name, color_name, date_created, time_created) 
      VALUES('$id', '$unit', '$color', CURRENT_DATE(), CURRENT_TIME())";
      $stocks_logs = "INSERT INTO product_log(username, date_log, time_log,  edit_create) 
      VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$create : $id')";
      $data_check = mysqli_query($conn, $stocks_logs);
      $upload = mysqli_query($conn,$insert);
      if($upload){
         $message[] = 'new stocks added successfully';
      }else{
         $message[] = 'could not add the stocks';
      }
   }
   }
;



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
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #04AA6D;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
         <div class="container">

            <div class="content">
               <h3>hi, <span><?php echo $_SESSION['name'] ?></span></h3>
               <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
               <p>THIS IS WHERE YOU ADD, EDIT, REMOVE A PRODUCT</p>
               <a href="CRUD.php" class="btn" style = "width: 300px">go back</a>
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

$select_stocks = mysqli_query($conn, "SELECT * FROM stocks WHERE product_id = '$id'");
while($row = mysqli_fetch_assoc($select_stocks)) {
   $unit_name = $row['unit_name'];
   $color_name = $row['color_name'];


if(isset($_GET['delete'])){
   $id = $_GET['manage'];
   mysqli_query($conn, "DELETE FROM stocks WHERE unit_name = '$unit_name' AND color_name = '$color_name' AND product_id = '$id'");
   header('location:stocks_update.php?id='.$id);
}};

?>
<div class="product-display">
   
   <table class="product-display-table">
   <h1>AVAILABLE STOCKS</h1>
      <thead>
      <tr>
         
         <th>unit name</th>
         <th>color name</th>
       
         
      </tr>
      </thead>
      
      <?php 
      $select_stocks = mysqli_query($conn, "SELECT * FROM stocks WHERE product_id = '$id'");
      while($row = mysqli_fetch_assoc($select_stocks)){ ?>
      <tr>
         
         
         <td><?php echo $row['unit_name']; ?></td>
         <td><?php echo $row['color_name']; ?></td>
         
         </td>
  
        
        
      </tr>
   <?php } ?>
   </table>
   <br>
   <br>


   
</div>

<!-- fetch units  -->

      <?php 
         $query ="SELECT unit_name FROM product_units";
         $result = $conn->query($query);
         if($result->num_rows> 0){
            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
         }
      ?>

      <?php 
         $query1 ="SELECT color_name FROM color";
         $result1 = $conn->query($query1);
         if($result1->num_rows> 0){
            $options1= mysqli_fetch_all($result1, MYSQLI_ASSOC);
         }
      ?>
      <?php
      
      $select = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>

      <style>
         .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            height: inherit;
         }
         </style>

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Product Information</h3>
         <img class="center" src="../<?php echo $row['image']; ?>" height="100" alt="logo" ></td>
         
         <h1>NAME: <?php echo $row['name']; ?></h1>
         <h1>PRICE: ₱<?php echo $row['price']; ?> </h1>
         <h1>----------------------------------</h1>
                  <select class = "box" name="unit">
                        <option>Select Unit</option>
                     <?php 
                           foreach ($options as $option) {
                     ?>
                   <option> <?php echo $option['unit_name']; ?> </option>
                     <?php 
                      }
                      ?>
                   </select>

                   <!--   -->


                   <select class = "box" name="color">
                        <option>Select color</option>
                     <?php 
                           foreach ($options1 as $option) {
                     ?>
                   <option> <?php echo $option['color_name']; ?> </option>
                     <?php 
                      }
                      ?>
                   </select>
         
         <input type="submit" class="btn" name="add_stocks" value="add stocks">
         
      </form>
      
   </div>
   <?php }; ?>

  
  

  
  
</div>
</div>
<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
</body>
</html>
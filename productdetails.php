<?php require_once "login_user/controllerUserData.php"; 
     include 'admin/config.php';
     $sql="SELECT * from upload";
     $result = mysqli_query($conn, $sql);
     if ($result-> num_rows > 0){
       while ($row=$result-> fetch_assoc()) {
       
     ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       
  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="admin/uploaded_img/<?=$row["logo"]?>" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">

  <!-- 
    - preload banner
  -->
  <link rel="preload" href="admin/uploaded_img/<?=$row["logo"]?>" as="image">

</head>

<body id="top"style ="background-color: #b69f77;">
  
  <!-- 
    - alert for add to cart
  -->
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

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <!-- 
    - #PIC FOR MAINPAGE
      -->
      <a href="index.php" class="logo">
        <img src="admin/uploaded_img/<?=$row["logo"]?>" width="150" height="50" alt="logo">
      </a>
      <!-- 
    - #FOR SMALL BROWSER
      -->
      <button class="nav-open-btn" data-nav-open-btn aria-label="Open Menu">
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
          <ion-icon name="close-outline"></ion-icon>
        </button>

        <a href="index.php" class="logo">
          <img src="admin/uploaded_img/<?=$row["logo"]?>" width="190" height="50" alt="logo">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="index.php" class="navbar-link">Home</a>
          </li>



          <li class="navbar-item">
            <a href="products.php" class="navbar-link">Products</a>
          </li>




        </ul>

        <ul class="nav-action-list">

        <li>
            <a href="login_user/home.php" class="nav-action-btn">
              <ion-icon name="person-outline" aria-hidden="false"></ion-icon>

              <span class="nav-action-text">Login / Register</span>
            </a>
          </li>

          

          <li>
          <a href="login_user/cart.php" class="nav-action-btn">
              <ion-icon name="bag-outline" aria-hidden="true"></ion-icon>

              <data class="nav-action-text">Basket: <strong></strong></data>

             
          </a>
          </li>

        </ul>

      </nav>

    </div>
    
  </header>


  <!-- 
    - #END HEADER
  -->

    
  <!-- 
    - $DETAILS
  -->
  <?php

            @include 'admin/config.php';

        $id = "";
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];
        }

        $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE `id` = '$id'");
        
       
    ?>
<style>
  .p3 {
  font-family: "roboto-medium";
}
  .p2 {
    font-family:"Gill Sans Extrabold", cursive;
    
  }
</style>
<br>
<br>
<br>
        <div class="container">
          
                
                    <?php
                        if(mysqli_num_rows($select_products) > 0)
                        {
                            
                            while($fetch_product = mysqli_fetch_assoc($select_products))
                            {
                                                    
                                        $query ="SELECT * FROM stocks WHERE `product_id` = '$id'";
                                        $result = $conn->query($query);
                                        if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        }
                                      
                    ?>
                                        <div class="row">
                                            <div class="col-md-4" style ="height: auto; max-width: 100; width: auto;" >
                                           
                                            <div class="product-card" >
                                                         
                                                         <figure class="card-banner" >
                                                         <style>
                                                            .productimage{
                                                                border: 5px solid #000;
                                                                
                                                            }
                                                        </style>
                                                              <img src="<?php echo $fetch_product['image']; ?>" loading="lazy"
                                                                    alt="PRODUCTS" class="image-contain productimage">  
                                
                                                                      </ul>
                                                                                                    
                                                                                    
                                                       
                                                        </figure>
                                                        
                                                        
                                                        
                                                        <!-- 
                                                            - ADD TO CART
                                                          -->
                                                        <style>
                                                              .btn1 {
                                                                    background-color: #E48F45;
                                                                    color: var(--color, var(--white));
                                                                    font-size: var(--fs-5);
                                                                    display: flex;
                                                                    align-items: center;
                                                                    gap: 5px;
                                                                    padding: 14px 25px;
                                                                    
                                                                  }
                                                        </style>
                                                        <br>
                                                        <br>
                                                      

                                                     
                                          
                                                                                             
                                                        <style>
                                                          .unselectable {
                                                              -webkit-touch-callout: none;
                                                              -webkit-user-select: none;
                                                              -khtml-user-select: none;
                                                              -moz-user-select: none;
                                                              -ms-user-select: none;
                                                              user-select: none;
                                                            }
                                                            .form-check-label {
                                                                  color: black;
                                                                }
                                                        </style>
                                                        
<h1>Select Size & Color</h1>
<form action="" method="post">
  <div class="row">
  <div class="box">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="size" id="size" required disabled>
      
    </div>
    <div class="form-check-inline">
      <?php
         
         if (empty($options)) {
           echo "OUT OF STOCK";
         } else {
           $size_names = array();
           foreach ($options as $option) {
             if (!empty($option['unit_name']) && !in_array($option['unit_name'], $size_names)) {
               $size_names[] = $option['unit_name'];
               echo '<div class="form-check">';
               echo '<input class="form-check-input" type="radio" name="size" id="size' . $option['id'] . '" value="' . $option['unit_name'] . '" required>';
               echo '<label class="form-check-label" for="size' . $option['id'] . '">' . $option['unit_name'] . '</label>';
               echo '</div>';
             }
           }
         }
         ?>
       </div>

       <div class="form-check">
      <input class="form-check-input" type="radio" name="color" id="color" required disabled>
    </div>

       <div class="form-check-inline">
         <?php
         if (empty($options)) {
           echo "OUT OF STOCK";
         } else {
           $color_names = array();
           foreach ($options as $option) {
             if (!empty($option['color_name']) && !in_array($option['color_name'], $color_names)) {
               $color_names[] = $option['color_name'];
               echo '<div class="form-check">';
               echo '<input class="form-check-input" type="radio" name="color" id="color' . $option['id'] . '" value="' . $option['color_name'] . '" required>';
               echo '<label class="form-check-label" for="color' . $option['id'] . '">' . $option['color_name'] . '</label>';
               echo '</div>';
             }
           }
         }
         ?>
      
    </div>
    </div>
        <div class="form-group">
          <br>
          <br>
          <style>
              .bordered-input {
              border: 1px solid #ccc;
              padding: 5px;
              border-radius: 3px;
          }
          .bordered-input:focus {
              border: 2px solid #007bff;
              outline: none;
          }
          </style>
          <label for="quantity">Quantity:</label>
          <input type="number" name="quantity" id="quantity" value="1" required class="bordered-input">
          <input type="hidden" name="image" value="<?php echo $fetch_product['image']; ?>">
          <input type="hidden" name="name" value="<?php echo $fetch_product['name']; ?>">
          <input type="hidden" name="price" value="<?php echo $fetch_product['price']; ?>">
          <input class ="btn btn-primary" type="submit" value="ADD TO CART" name="add_to_cart" id="addToCartBtn" style="display: none;">
      
        </div>
        </div>
</form>
                                                                    
                                                                    </div>
                                                      </div>
                                                      
                                                      
                                                           <!-- 
                                                            - Product Details
                                                          -->
                                                      <div class="col-md-7">
                                              
                                                    
                                              <h2 style = "color: white; font-size: 40px; text-transform: uppercase;"class = p2><?php echo $fetch_product['name']; ?></h2>
                                              <br>
                                              
                                              <br>
                                                <div class="container">
                                                  
                                              
                                              <h2 class = p2 style = "color: white; font-size: 30px;"><?php echo $fetch_product['description']; ?></h2>
                                              <br>
                                              <h2  style = "color: black;" class=p2>Price: ₱<?php echo $fetch_product['price']; ?></h2>
                                              </div>

                                              <br><br><br>
                                      </div>

                                            
                                                          
                                           
                                                    
                                 
                                                      </div>
                                        
                    <?php
                            }
                        }
                      
                    ?>
                <br><br>


  
<?php
                @include 'connection.php';
                if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
                  $email = $_SESSION['email'];
                  $password = $_SESSION['password'];
                  if($email != false && $password != false){
                    $sql = "SELECT * FROM usertable WHERE email = '$email'";
                    $run_Sql = mysqli_query($conn, $sql);
                    if($run_Sql){
                        $fetch_info = mysqli_fetch_assoc($run_Sql);
                        $status = $fetch_info['status'];
                        $code = $fetch_info['code'];
                        $user_id = $fetch_info['id'];
                        $user_name = $fetch_info['name'];

                                  if(isset($_POST['add_to_cart'])){
                                    $product_image = $_POST['image'];
                                    $product_name = $_POST['name'];
                                    $product_price = $_POST['price'];
                                    $product_unit = array('size' => $_POST['size'], 'color' => $_POST['color']);
                                    $product_quantity = $_POST['quantity'];
                                    $product_unit_json = json_encode($product_unit);
                                
                                    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name' AND user_id = '$user_id' AND unit = '$product_unit_json'");
                                
                                    if(mysqli_num_rows($select_cart) > 0){
                                      ?>
                                                      <div class="alert info">
                                        <span class="closebtn">&times; </span>  
                                        <strong><a href="login_user/cart.php">Go to cart</a> Info!</strong> Product already in cart.  
                                      
                                      </div>
                                    <?php
                                    }else{
                                      
                                      mysqli_query($conn, "INSERT INTO `cart`(user_id, image, name, price, unit, quantity) VALUES('$user_id', '$product_image','$product_name', '$product_price', '$product_unit_json', '$product_quantity')");
                                      ?>
                                      <div class="alert success">
                                      <span class="closebtn">&times;</span>  
                                      <strong>Success! <a  href="login_user/cart.php">Go to cart</a></strong> Product added to cart successfully.
                                      
                                      </div>
                                    </div>
                
                  <?php
                          }}

                          ?>

<!-- 
    - #REVIEW with login
  -->
<style>
  #add_review {
  width: 100%;
  display: inline-block;
  border: 1px solid #000;
  background-color: transparent;
  padding: 10px;
  box-sizing: border-box;
}
</style>

  <div class="container" >

<div class="card" style ="background-color: #b69f77;">
  <div class="card-header">Do you like our product? Leave a review

  </div>
  
  <br>
  
  
  <div class="card-body">
 
    <div class="row">
      
      <div class="col-sm-4 text-center">
        <h1 class="text-warning mt-4 mb-4">
          <b><span id="average_rating">0.0</span> / 5</b>
        </h1>
        <div class="mb-3">
          <i class="fas fa-star star-light mr-1 main_star"></i>
                      <i class="fas fa-star star-light mr-1 main_star"></i>
                      <i class="fas fa-star star-light mr-1 main_star"></i>
                      <i class="fas fa-star star-light mr-1 main_star"></i>
                      <i class="fas fa-star star-light mr-1 main_star"></i>
        </div>
        <h3><span id="total_review">0</span> Review</h3>
      </div>
      <div class="col-sm-4">
        <p>
                      <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                      <div class="progress-label-right"><span id="total_five_star_review">0</span></div>
                      <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                      </div>
                  </p>
        <p>
                      <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                      
                      <div class="progress-label-right"><span id="total_four_star_review">0</span></div>
                      <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                      </div>               
                  </p>
        <p>
                      <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                      
                      <div class="progress-label-right"><span id="total_three_star_review">0</span></div>
                      <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                      </div>               
                  </p>
        <p>
                      <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                      
                      <div class="progress-label-right"><span id="total_two_star_review">0</span></div>
                      <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                      </div>               
                  </p>
        <p>
                      <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                      
                      <div class="progress-label-right"><span id="total_one_star_review">0</span></div>
                      <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                      </div>               
                  </p>
      </div>
      <div class="col-sm-4 text-center">

        <br><br>
        <button type="button" name="add_review" id="add_review" class="btn" style = "width:50%; display: inline-block;">ADD REVIEW</button>
      </div>
      
    </div>
  </div>
</div>
<div class="mt-5" id="review_content"></div>
</div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Submit Review</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <h4 class="text-center mt-2 mb-4">
        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
      </h4>
      <div class="form-group">
        <input type="text" name="user_name" id="user_name" class="form-control" value = "<?php echo $user_name; ?>" readonly="readonly"  />
      </div>
      <div class="form-group">
      <input type="hidden" id="product_id" value="<?php echo $id; ?>">
      </div>
      <div class="form-group">
        <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
      </div>
      <div class="form-group text-center mt-4">
        <button type="button" class="btn btn-primary" id="save_review">Submit</button>
      </div>
    </div>
</div>
</div>
</div>

<style>
.progress-label-left
{
float: left;
margin-right: 0.5em;
line-height: 1em;
}
.progress-label-right
{
float: right;
margin-left: 0.3em;
line-height: 1em;
}
.star-light
{
color:#e9ecef;
}
</style>

<script>

$(document).ready(function(){

var rating_data = 0;

$('#add_review').click(function(){

  $('#review_modal').modal('show');

});

$(document).on('mouseenter', '.submit_star', function(){

  var rating = $(this).data('rating');

  reset_background();

  for(var count = 1; count <= rating; count++)
  {

      $('#submit_star_'+count).addClass('text-warning');

  }

});

function reset_background()
{
  for(var count = 1; count <= 5; count++)
  {

      $('#submit_star_'+count).addClass('star-light');

      $('#submit_star_'+count).removeClass('text-warning');

  }
}

$(document).on('mouseleave', '.submit_star', function(){

  reset_background();

  for(var count = 1; count <= rating_data; count++)
  {

      $('#submit_star_'+count).removeClass('star-light');

      $('#submit_star_'+count).addClass('text-warning');
  }

});

$(document).on('click', '.submit_star', function(){

  rating_data = $(this).data('rating');

});


$('#save_review').click(function(){



  var user_name = $('#user_name').val();

  var user_review = $('#user_review').val();

  var product_id = $('#product_id').val();

  if(user_name == '' || user_review == '')
  {
      alert("Please Fill Both Field");
      return false;
  }
  else
  {
      $.ajax({
          url:"submit_rating.php",
          method:"POST",
          data:{rating_data:rating_data, user_name:user_name, user_review:user_review, product_id:product_id},
          success:function(data)
          {
              $('#review_modal').modal('hide');

              load_rating_data();

              alert(data);
          }
      })
  }

});

load_rating_data();

function load_rating_data()
{
  $.ajax({
      url:"submit_rating.php",
      method:"POST",
      data:{action:'load_data',product_id: <?php echo $id; ?>},
      dataType:"JSON",
      success:function(data)
      {
          $('#average_rating').text(data.average_rating);
          $('#total_review').text(data.total_review);

          var count_star = 0;

          $('.main_star').each(function(){
              count_star++;
              if(Math.ceil(data.average_rating) >= count_star)
              {
                  $(this).addClass('text-warning');
                  $(this).addClass('star-light');
              }
          });

          $('#total_five_star_review').text(data.five_star_review);

          $('#total_four_star_review').text(data.four_star_review);

          $('#total_three_star_review').text(data.three_star_review);

          $('#total_two_star_review').text(data.two_star_review);

          $('#total_one_star_review').text(data.one_star_review);

          $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

          $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

          $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

          $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

          $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

          if(data.review_data.length > 0)
          {
              var html = '';

              for(var count = 0; count < data.review_data.length; count++)
              {
                  html += '<div class="row mb-3">';

                  html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                  html += '<div class="col-sm-11" >';

                  html += '<div class="card"style ="background-color: #b69f77;">';

                  html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                  html += '<div class="card-body">';

                  for(var star = 1; star <= 5; star++)
                  {
                      var class_name = '';

                      if(data.review_data[count].rating >= star)
                      {
                          class_name = 'text-warning';
                      }
                      else
                      {
                          class_name = 'star-light';
                      }

                      html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                  }

                  html += '<br />';

                  html += data.review_data[count].user_review;

                  html += '</div>';

                  html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                  html += '</div>';

                  html += '</div>';

                  html += '</div>';
              }

              $('#review_content').html(html);
          }
      }
  })
}

});

</script>

            <?php

                        if($status == "verified"){
                            if($code != 0){
                                header('Location: reset-code.php');
                            }
                        }else{
                            header('Location: user-otp.php');
                        }
                    }
                  }
                } else {
                  echo "<script>alert('Please log in to add products to your cart.');</script>";
                ?>



                <!-- 
    - #REVIEW without login
  -->

  <div class="container">

<div class="card" style ="background-color: #b69f77;">
  <div class="card-header"><a href="login_user/login-user.php" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Login to leave a review!</a></div>
  <br>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-4 text-center">
        <h1 class="text-warning mt-4 mb-4">
          <b><span id="average_rating">0.0</span> / 5</b>
        </h1>
        <div class="mb-3">
          <i class="fas fa-star star-light mr-1 main_star"></i>
                      <i class="fas fa-star star-light mr-1 main_star"></i>
                      <i class="fas fa-star star-light mr-1 main_star"></i>
                      <i class="fas fa-star star-light mr-1 main_star"></i>
                      <i class="fas fa-star star-light mr-1 main_star"></i>
        </div>
        <h3><span id="total_review">0</span> Review</h3>
      </div>
      <div class="col-sm-4">
        <p>
                      <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                      <div class="progress-label-right"><span id="total_five_star_review">0</span></div>
                      <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                      </div>
                  </p>
        <p>
                      <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                      
                      <div class="progress-label-right"><span id="total_four_star_review">0</span></div>
                      <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                      </div>               
                  </p>
        <p>
                      <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                      
                      <div class="progress-label-right"><span id="total_three_star_review">0</span></div>
                      <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                      </div>               
                  </p>
        <p>
                      <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                      
                      <div class="progress-label-right"><span id="total_two_star_review">0</span></div>
                      <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                      </div>               
                  </p>
        <p>
                      <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                      
                      <div class="progress-label-right"><span id="total_one_star_review">0</span></div>
                      <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                      </div>               
                  </p>
      </div>
      <div class="col-sm-4 text-center">
        <br><br>

        
      </div>
    </div>
  </div>
</div>
<div class="mt-5" id="review_content"></div>
</div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Submit Review</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <h4 class="text-center mt-2 mb-4">
        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
      </h4>
      <div class="form-group">
        <input type="text" name="user_name" id="user_name" class="form-control" value = "<?php echo $user_name; ?>" readonly="readonly"  />
      </div>
      <div class="form-group">
      <input type="hidden" id="product_id" value="<?php echo $id; ?>">
      </div>
      <div class="form-group">
        <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
      </div>
      <div class="form-group text-center mt-4">
        <button type="button" class="btn btn-primary" id="save_review">Submit</button>
      </div>
    </div>
</div>
</div>
</div>

<style>
.progress-label-left
{
float: left;
margin-right: 0.5em;
line-height: 1em;
}
.progress-label-right
{
float: right;
margin-left: 0.3em;
line-height: 1em;
}
.star-light
{
color:#e9ecef;
}
</style>

<script>

$(document).ready(function(){

var rating_data = 0;

$('#add_review').click(function(){

  $('#review_modal').modal('show');

});

$(document).on('mouseenter', '.submit_star', function(){

  var rating = $(this).data('rating');

  reset_background();

  for(var count = 1; count <= rating; count++)
  {

      $('#submit_star_'+count).addClass('text-warning');

  }

});

function reset_background()
{
  for(var count = 1; count <= 5; count++)
  {

      $('#submit_star_'+count).addClass('star-light');

      $('#submit_star_'+count).removeClass('text-warning');

  }
}

$(document).on('mouseleave', '.submit_star', function(){

  reset_background();

  for(var count = 1; count <= rating_data; count++)
  {

      $('#submit_star_'+count).removeClass('star-light');

      $('#submit_star_'+count).addClass('text-warning');
  }

});

$(document).on('click', '.submit_star', function(){

  rating_data = $(this).data('rating');

});


$('#save_review').click(function(){



  var user_name = $('#user_name').val();

  var user_review = $('#user_review').val();

  var product_id = $('#product_id').val();

  if(user_name == '' || user_review == '')
  {
      alert("Please Fill Both Field");
      return false;
  }
  else
  {
      $.ajax({
          url:"submit_rating.php",
          method:"POST",
          data:{rating_data:rating_data, user_name:user_name, user_review:user_review, product_id:product_id},
          success:function(data)
          {
              $('#review_modal').modal('hide');

              load_rating_data();

              alert(data);
          }
      })
  }

});

load_rating_data();

function load_rating_data()
{
  $.ajax({
      url:"submit_rating.php",
      method:"POST",
      data:{action:'load_data' ,product_id: <?php echo $id; ?>},
      dataType:"JSON",
      success:function(data)
      {
          $('#average_rating').text(data.average_rating);
          $('#total_review').text(data.total_review);

          var count_star = 0;

          $('.main_star').each(function(){
              count_star++;
              if(Math.ceil(data.average_rating) >= count_star)
              {
                  $(this).addClass('text-warning');
                  $(this).addClass('star-light');
              }
          });

          $('#total_five_star_review').text(data.five_star_review);

          $('#total_four_star_review').text(data.four_star_review);

          $('#total_three_star_review').text(data.three_star_review);

          $('#total_two_star_review').text(data.two_star_review);

          $('#total_one_star_review').text(data.one_star_review);

          $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

          $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

          $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

          $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

          $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

          if(data.review_data.length > 0)
          {
              var html = '';

              for(var count = 0; count < data.review_data.length; count++)
              {
                  html += '<div class="row mb-3">';

                  html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                  html += '<div class="col-sm-11">';

                  html += '<div class="card" style ="background-color: #b69f77;">';

                  html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                  html += '<div class="card-body">';

                  for(var star = 1; star <= 5; star++)
                  {
                      var class_name = '';

                      if(data.review_data[count].rating >= star)
                      {
                          class_name = 'text-warning';
                      }
                      else
                      {
                          class_name = 'star-light';
                      }

                      html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                  }

                  html += '<br />';

                  html += data.review_data[count].user_review;

                  html += '</div>';

                  html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                  html += '</div>';

                  html += '</div>';

                  html += '</div>';
              }

              $('#review_content').html(html);
          }
      }
  })
}

});

</script>


                <?php
                }
 ?>

</div>
       
 
   <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top section"style ="background-color: #b69f77;">
      <div class="container">

        <div class="footer-brand">

          
            <img src="admin/uploaded_img/<?=$row["logo"]?>" width="150" height="50" alt="Nifty logo">
          

       

           

          </ul>

        </div>

        <div class="footer-link-box">

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Contact Us</p>
            </li>

            <li>
              <address class="footer-link">
                <ion-icon name="location"></ion-icon>

                <span class="footer-link-text">
                <?=$row["address"]?>
                </span>
              </address>
            </li>

            <li>
              <a href="tel:<?=$row["contact"]?>" class="footer-link">
                <ion-icon name="call"></ion-icon>

                <span class="footer-link-text"><?=$row["contact"]?></span>
              </a>
            </li>

            <li>
              <a href="mailto:niftyshoesph@gmail.com" class="footer-link">
                <ion-icon name="mail"></ion-icon>

                <span class="footer-link-text"><?=$row["email"]?></span>
              </a>
            </li>

          </ul>

        

          

        </div>

      </div>
    </div>

  

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top-btn" data-go-top>
    <ion-icon name="arrow-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
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

<script>
  // JavaScript to show button only when an option is selected
document.querySelectorAll('input[name="size"], input[name="color"]').forEach(function(input) {
  input.addEventListener('change', function() {
    var sizeSelected = document.querySelector('input[name="size"]:checked');
    var colorSelected = document.querySelector('input[name="color"]:checked');
    var addButton = document.getElementById('addToCartBtn');

    if (sizeSelected && colorSelected) {
      addButton.style.display = 'block'; // Show the button
    } else {
      addButton.style.display = 'none'; // Hide the button if no option is selected
    }
  });
});
</script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  
  <?php
  

  }}
?>
  </body>

</html>



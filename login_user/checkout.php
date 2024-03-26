<?php


require_once "controllerUserData.php";
include 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

?>
<?php

$sql = "SELECT * from upload";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {


    $email = $_SESSION['email'];
    $password = $_SESSION['password'];


    if ($email != false && $password != false) {
      $sql = "SELECT * FROM usertable WHERE email = '$email'";
      $run_Sql = mysqli_query($conn, $sql);
      if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        $user_id = $fetch_info['id'];
        $user_name = $fetch_info['name'];
        $contact = $fetch_info['contact'];
        $address = $fetch_info['address'];



        if ($status == "verified") {
          if ($code != 0) {
            header('Location: reset-code.php');
          }
        } else {
          header('Location: user-otp.php');
        }
      }
    } else {
      header('Location: login-user.php');
    }

    ?>


    <?php


    @include 'connection.php';

    if (isset ($_POST['order_btn'])) {

      $name = $_POST['name'];
      $number = $_POST['number'];
      $email = $_POST['email'];
      $method = $_POST['method'];
      $address = $_POST['address'];
      $reference_number = $_POST['reference'];
      $gcash_number = $_POST['gcash_number'];
      $product_image = $_POST['product_image'];
      if (isset ($product_image['product_image'])) {
        $product_image_folder = 'uploaded_img/' . $product_image['product_image'];
      } else {
        $product_image_folder = 'default_image.jpg'; // Provide a default value if the key doesn't exist
      }
      $cart_query = mysqli_prepare($conn, "SELECT * FROM `cart` WHERE user_id = ?");
      mysqli_stmt_bind_param($cart_query, "i", $user_id);
      mysqli_stmt_execute($cart_query);
      $result = mysqli_stmt_get_result($cart_query);

      $price_total = 0;
      $glue = "\n";
      if (mysqli_num_rows($result) > 0) {
        while ($product_item = mysqli_fetch_assoc($result)) {
          $product_name[] = 'Item: [' . $product_item['name'] . '] SIZE & COLOR [' . $product_item['unit'] . '] Quantity: [' . $product_item['quantity'] . '] ';

          $product_price = ($product_item['price'] * $product_item['quantity']);
          $price_total += $product_price;
          $total_price = $price_total;

        }
        ;
      }
      ;

      $total_product = implode($glue, $product_name);

      $detail_query = mysqli_prepare($conn, "INSERT INTO `orders`(name, number, email, method, address, total_products, total_price, user_id, status, date_created, time_created, reference_number, gcash_number, screenshot) 
      VALUES(?, ?, ?, ?, ?, ?, ?, ?, 'pending', CURRENT_DATE(), CURRENT_TIME(), ?,?,?)");
      mysqli_stmt_bind_param($detail_query, "ssssssdiiis", $name, $number, $email, $method, $address, $total_product, $price_total, $user_id, $reference_number, $gcash_number, $product_image);
      mysqli_stmt_execute($detail_query);
      $order_id = mysqli_insert_id($conn);
      $sales_query = mysqli_prepare($conn, "INSERT INTO `sales`(orders_id, total_price, date_created) VALUES (?, ?, CURRENT_DATE())");
      mysqli_stmt_bind_param($sales_query, "di", $order_id, $price_total);
      mysqli_stmt_execute($sales_query);



      $delete_query = mysqli_prepare($conn, "DELETE FROM `cart` WHERE user_id = ?");
      mysqli_stmt_bind_param($delete_query, "i", $user_id);
      mysqli_stmt_execute($delete_query);


      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);

      $mail = new PHPMailer(true);
      $now = new DateTime();
      $date = date('Y-m-d');
      $time = date('H:i:s');
      $minDaysToAdd = 3;
      $maxDaysToAdd = 5;
      $daysToAdd = rand($minDaysToAdd, $maxDaysToAdd); // Randomly choose between 3 and 5 days to add
      $now->add(new DateInterval('P' . $daysToAdd . 'D'));
      $expectedDeliveryDate = $now->format('Y-m-d');



      $subject = "NIFTY SHOES ORDER CONFIRMATION";
      $message = "
      
      Thank you for placing an order of our product $name 

      We have received your order on $date $time and your payment method is $method
      We’re getting your order ready and will let you know once it’s on the way. We wish you enjoy shopping with us 
      and hope to see you again real soon!
      

      ________________________________________________________________________


      DELIVERY DETAILS:
      
      Name: $name
      Address: $address
      Phone: $number
      Email: $email

      Orders: $total_product

      _________________________________________________________________________
      
      Estimated Delivery Dates: $expectedDeliveryDate
      

      Delivery date will depends on the availability of the product you ordered
      For inquires and questions you can email us on this address";

      try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'papisssgg@gmail.com';
        $mail->Password = 'mnxc djee wiln kzje';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender and recipient settings
        $mail->setFrom('niftyshoes@gmail.com', 'Nifty Shoes');
        $mail->addAddress($email);

        // Email content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();

        header('location: home.php');

      } catch (Exception $e) {
        $errors['otp-error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }





    }
    ?>

    <?php


    $sql = "SELECT * from upload";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

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
          <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
          <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

          <!-- jQuery library -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

          <!-- Latest compiled JavaScript -->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
          <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

          <!-- 
    - favicon
  -->
          <link rel="shortcut icon" href="../admin/uploaded_img/<?= $row["logo"] ?>" type="image/svg+xml">

          <!-- 
    - custom css link
  -->
          <link rel="stylesheet" href="../assets/css/style.css">
          <link rel="stylesheet" href="../css/style.css">

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
          <link rel="preload" href="../admin/uploaded_img/<?= $row["logo"] ?>" as="image">

        </head>

        <!-- 
    - #HEADER
  -->

        <header class=" header" data-header
          style="background: linear-gradient(to right, #f9c47f, #F4B39D); box-shadow: 0px 4px 4px rgba(0, 0, 0, .05);">
          <div class="container">

            <div class="overlay" data-overlay></div>

            <!-- 
    - #PIC FOR MAINPAGE
      -->
            <a href="../index.php" class="logo">
              <img src="../admin/uploaded_img/<?= $row["logo"] ?>" width="150" height="50" alt="logo">
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

              <a href="../index.php" class="logo">
                <img src="../admin/uploaded_img/<?= $row["logo"] ?>" width="190" height="50" alt="logo">
              </a>

              <ul class="navbar-list">

                <li class="navbar-item">

                </li>

                <li class="navbar-item">

                </li>




              </ul>

              <ul class="nav-action-list">


                <li>
                  <a href="home.php" class="nav-action-btn">
                    <ion-icon name="person-outline" aria-hidden="false"></ion-icon>

                    <span class="nav-action-text">Login / Register</span>
                  </a>
                </li>



                <li>
                  <a href="cart.php" class="nav-action-btn">
                    <ion-icon name="bag-outline" aria-hidden="true"></ion-icon>

                    <data class="nav-action-text">Cart: <strong></strong></data>


                  </a>
                </li>
                <li>
                  <a href="logout-user.php" class="nav-action-btn" onclick="return confirm('Are you sure you want to logout?')">
                    <ion-icon name="log-out-outline" aria-hidden="true"></ion-icon>
                    <data class="nav-action-text">Logout: <strong></strong></data>
                  </a>
                </li>



              </ul>

            </nav>

          </div>
        </header>


        <!-- 
    - #END HEADER
  -->

        <body style="background-color:rgba(0,0,0,0.025);">
          <style>
            .detail-btn {
              background-color: #f9c47f;
              border: 1px solid white;

            }

            .detail-btn:hover {
              background-color: #F4B39D;
              color: white;
            }
          </style>
          <div class="container">
            <div class="container mt-5">
              <hr style=" border-top: 0.3px solid #5F5E5E; ">
              <br>
              <h1 class="heading text-center mb-5"> - Complete Your Order - </h1>
              <hr style=" border-top: 0.3px solid #5F5E5E; ">
              <br>
              <br>
              <form action="" method="post">
                <div class="display-order mb-4 p-3 bg-light">

                  <div class="row justify-content-center">
                    <div class="col-md-8">
                      <div class="card">
                        <div class="card-body">
                          <div class="display-order text-center">
                            <?php
                            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'");
                            $total = 0;
                            $grand_total = 0;
                            if (mysqli_num_rows($select_cart) > 0) {
                              while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                                $grand_total += $total_price;
                                $shipping = "80";
                                $Total = 0;
                                $Total = $grand_total + $shipping;

                                ?>
                                <span>
                                  <h4>
                                    <?= $fetch_cart['name']; ?>
                                    [
                                    <?= $fetch_cart['unit']; ?> ]
                                    [ Quantity:
                                    <?= $fetch_cart['quantity']; ?> ]
                                  </h4>
                                </span>
                                <?php
                              }
                            } else {

                            }
                            ?>

                            <span class="grand-total ms-3">Grand Total: ₱
                              <?php echo $Total; ?>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                if ($grand_total == 0) {
                  echo "<script>alert('Your cart is empty.'); history.back();</script>";
                } else {
                  ?>
                  <h4>INPUT YOUR ORDER INFORMATION</h4>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="inputBox p-3 mb-3 bg-light">
                        <span class="fs-5">Name</span>
                        <input type="text" style="font-size: 20px;" placeholder="Enter your name" name="name"
                          value="<?php echo htmlspecialchars($user_name); ?>" required class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="inputBox p-3 mb-3 bg-light">
                        <span class="fs-5">Mobile Number</span>
                        <input type="number" style="font-size: 20px;" placeholder="Enter your number" name="number"
                          value="<?php echo htmlspecialchars($contact); ?>" required class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="inputBox p-3 mb-3 bg-light">
                        <span class="fs-5">Email address</span>
                        <input type="email" style="font-size: 20px;" placeholder="Enter your email" name="email"
                          value="<?php echo htmlspecialchars($email); ?>" required class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="inputBox p-3 mb-3 bg-light">
                        <span class="fs-5">Full Address</span>
                        <input type="text" style="font-size: 20px;"
                          placeholder="e.g. House Number. Street, Barangay, City, Province" name="address"
                          value="<?php echo htmlspecialchars($address); ?>" required class="form-control">
                      </div>
                    </div>
                    <script>
                      function showGcashInput() {
                        document.getElementById('gcash-input').style.display = 'block';
                      }

                      function hideGcashInput() {
                        document.getElementById('gcash-input').style.display = 'none';
                      }

                      function uploadGcashQRCode() {
                        const input = document.createElement('input');
                        input.type = 'file';
                        input.accept = 'image/*';
                        input.onchange = function (e) {
                          const file = e.target.files[0];
                          const reader = new FileReader();
                          reader.onload = function (e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            document.getElementById('gcash-qr-code').appendChild(img);
                          };
                          reader.readAsDataURL(file);
                        };
                        input.click();
                      }
                    </script>
                    </head>


                    <div class="col-md-6">
                      <div class="inputBox p-3 mb-3 bg-light">
                        <span class="fs-5">Payment Method:</span>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="method" id="cash-on-delivery"
                            value="cash on delivery" required onchange="hideGcashInput()">
                          <label class="form-check-label" for="cash-on-delivery">
                            Cash on Delivery
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="method" id="gcash" value="gcash" required
                            onchange="showGcashInput()">
                          <label class="form-check-label" for="gcash">
                            GCash
                          </label>
                          <div id="gcash-input" style="display: none;">
                            <div class="input-group mb-3">

                              <div id="gcash-input" style="display: block;">
                                <img src="../assets/images/gcashQR.jpg" alt="GCash QR Code" class="img-fluid">
                              </div>

                              <div id="gcash-qr-code"></div>
                              <div class="col-md-6">
                                <div class="inputBox p-3 mb-3 bg-light">
                                  <span class="fs-5">Enter REFERENCE NO.</span>
                                  <input type="text" style="font-size: 20px;" placeholder="" name="reference"
                                    class="form-control">
                                </div>

                                <div class="inputBox p-3 mb-3 bg-light">
                                  <span class="fs-5">Enter Gcash Number Used:</span>
                                  <input type="text" style="font-size: 20px;" placeholder="" name="gcash_number"
                                    pattern="[0-9]{11}" class="form-control">
                                </div>


                                <div class="inputBox p-3 mb-3 bg-light">
                                  <span class="fs-5">Upload Receipt Screenshot:</span>
                                  <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
                                </div>
                              </div>
                            </div>


                          </div>
                        </div>
                      </div>




                    </div>


                  </div>
                  <div class="text-center mt-5">
                    <button type="submit" name="order_btn" id="orderButton" class="btn detail-btn">Order Now</button>
                  </div>



                </form>
              </div>

            </div>
            </div>
            <?php
                }
      }
    }
  }
}
?>

  <!-- 
    - #FOOTER
  -->
  <?php
  $sql = "SELECT * from upload";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

      ?>
      <footer class="footer">
        <br><br>

        <div class="footer-top section"
          style="background: linear-gradient(to right, #f9c47f, #F4B39D); box-shadow: 0px 4px 4px rgba(0, 0, 0, .05);">
          <div class="container">


            <div class="footer-link-box">

              <ul class="footer-list">

                <li>
                  <p class="footer-list-title">Contact Us</p>
                </li>

                <li>
                  <address class="footer-link">
                    <ion-icon name="location"></ion-icon>

                    <span class="footer-link-text">
                      <?= htmlspecialchars($row["address"]); ?>
                    </span>
                  </address>
                </li>

                <li>
                  <a href="tel:<?= htmlspecialchars($row["contact"]); ?>" class="footer-link">
                    <ion-icon name="call"></ion-icon>

                    <span class="footer-link-text">
                      <?= htmlspecialchars($row["contact"]); ?>
                    </span>
                  </a>
                </li>

                <li>
                  <a href="mailto:<?= htmlspecialchars($row["email"]); ?>" class="footer-link">
                    <ion-icon name="mail"></ion-icon>

                    <span class="footer-link-text">
                      <?= htmlspecialchars($row["email"]); ?>
                    </span>
                  </a>
                </li>

              </ul>





            </div>

          </div>
        </div>


        <?php
    }
  }
  ?>
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

  <!-- custom js file link  -->
  <script>
    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
      close[i].onclick = function () {
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function () { div.style.display = "none"; }, 600);
      }
    }
  </script>
  <script src="js/script.js"></script>

</body>

</html>
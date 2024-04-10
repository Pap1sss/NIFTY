<?php require_once "controllerUserData.php";
include 'connection.php';



?>
<?php
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

if (isset($_POST['update_cart'])) {
  $update_quantity = strip_tags($_POST['cart_quantity']);
  $update_id = strip_tags($_POST['cart_id']);

  // Prepare the update statement
  $stmt = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
  // Bind the parameters
  $stmt->bind_param("ii", $update_quantity, $update_id);
  // Execute the statement
  $stmt->execute();
  echo "<script>alert('Quantity updated Successfully');</script>";

}

if (isset($_GET['remove'])) {
  $remove_id = $_GET['remove'];

  // Prepare the delete statement
  $stmt = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
  // Bind the parameter
  $stmt->bind_param("i", $remove_id);
  // Execute the statement
  $stmt->execute();
  echo "<script>alert('Item removed.');</script>";

  header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
  // Prepare the delete statement
  $stmt = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
  // Bind the parameter
  $stmt->bind_param("i", $user_id);
  // Execute the statement
  $stmt->execute();
  echo "<script>alert('Cart has been cleared');</script>";
  header('location:cart.php');
}


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

          <a href="index.php" class="logo">
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




    <?php

    $select_rows = mysqli_query($conn, "SELECT * FROM `cart` ") or die('query failed');
    $row_count = mysqli_num_rows($select_rows);

    ?>



    <div class="container">

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

        .alert.success {
          background-color: #04AA6D;
        }

        .alert.info {
          background-color: #2196F3;
        }

        .alert.warning {
          background-color: #ff9800;
        }

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



    </div>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>


    <script>
      // Check if there are items in the cart
      if (<?php echo $row_count; ?> <= 0) {
        // Disable the "Go to checkout" button
        document.querySelector("button[type='submit']").disabled = true;
      }
    </script>


    <body style="background-color: white;">
      <style>
        .detail-btn {
          background-color: #f9c47f;
          border: transparent;

        }

        .detail-btn:hover {
          background-color: #F4B39D;
          color: white;
        }
      </style>
      <section class="h-100 gradient-custom container" style="padding: 50px;">
        <div class="row d-flex justify-content-center">

          <div class="card mb-4" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.20); width: 90%;">
            <?php
            $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            $grand_total = 0;
            if (mysqli_num_rows($cart_query) > 0) {
              while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                ?>
                <div class="card-body">
                  <style>
                    .img-box {
                      width: 100%;
                      height: 0;
                      padding-bottom: 100%;
                      position: relative;
                      overflow: hidden;
                    }

                    .img-box img {
                      position: absolute;
                      top: 0;
                      left: 0;
                      width: 100%;
                      height: 100%;
                    }
                  </style>
                  <!-- Single item -->
                  <div class="row" style="margin: 10px;">
                    <div class="col-lg-4 col-md-4 mb-4 mb-lg-0">
                      <!-- Image -->
                      <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                        <div class="img-box" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.20);">
                          <img src="../<?php echo $fetch_cart['image']; ?>"
                            alt="<?php echo htmlspecialchars($fetch_cart['name']); ?>" class="image-contain">
                        </div>
                        <a href="#!">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                        </a>
                      </div>
                      <!-- Image -->
                    </div>

                    <div class="col-lg-4 col-md-4 mb-4 mb-lg-0">
                      <ul class="list-group">
                        <!-- Data -->
                        <li class="list-group-item" style="background: #f9c47f;">
                          <h2 style="text-transform: uppercase;"><strong>
                              <?php echo htmlspecialchars(strip_tags($fetch_cart['name'])); ?>
                            </strong></h2>
                        </li>
                        <li class="list-group-item">
                          <h5>Size:
                            <?php echo htmlspecialchars(strip_tags($fetch_cart['unit'])); ?>
                          </h5>
                        </li>
                        <li class="list-group-item">
                          <h5>Color:
                            <?php echo htmlspecialchars(strip_tags($fetch_cart['color'])); ?>
                          </h5>
                        </li>

                        <li class="list-group-item">
                          <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="fas fa-fw fa-trash"
                            style="color: red; text-align: right;" onclick="return confirm('remove item from cart?');">
                          </a>
                        </li>
                        <!-- Data -->
                      </ul>
                    </div>

                    <div class="col-lg-4 col-md-4 mb-4 mb-lg-0">
                      <!-- Quantity -->
                      <label class="form-label" for="quantity">Quantity:</label>
                      <form action="" method="post">
                        <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                        <div class="input-group">
                          <input type="number" style="resize:none; font-size: 15px;" min="1" name="cart_quantity"
                            value="<?php echo $fetch_cart['quantity']; ?>" class="form-control" />
                          <br>
                          <button style="padding: 10px;" type="submit" name="update_cart" value="update" class="">✔</button>
                        </div>
                        <strong id="subtotal"> Total: ₱
                          <?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>
                        </strong>
                      </form>
                    </div>
                    <!-- Quantity -->

                    <!-- Price -->
                    <?php
                    $grand_total += $sub_total;
                    ?>
                    <!-- Price -->
                    
                 
                  </div>
                  <hr style=" border-top: 0.3px solid #5F5E5E; ">
                </div>
                <!-- Single item -->
                <?php
              }
            } else {
              echo '<h1 style="text-align: center; padding: 100px;">YOUR CART IS EMPTY</h1>';
            }
            ?>

            <div class="card mb-4" style="padding: 20px; width: 90%; margin: 3%;">
              <div class="card-body">
                <p><strong>Expected shipping delivery</strong></p>
                <p class="mb-0">The expected delivery date should be 3 days onwards depending on the availability of
                  theproduct.</p>
              </div>
            </div>

            <div class="card mb-4" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.20); width: 90%; margin:3%;">
              <div class="card-header py-3">
                <h5 class="mb-0">Summary</h5>
              </div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                    Products
                    <span>₱
                      <?php echo $grand_total; ?>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                    Shipping
                    <?php
                    $shipping = "80";
                    ?>
                    <span>₱
                      <?php echo $shipping; ?>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                    <div>
                      <strong>Total amount</strong>

                    </div>
                    <?php
                    $Total = $grand_total + $shipping;
                    ?>
                    <span><strong>₱
                        <?php echo $Total; ?>
                      </strong></span>
                  </li>
                </ul>
              </div>

              <?php

              if ($grand_total == 0) {

                ?>
                <?php
              } else {
                ?>
                <div class="row d-flex justify-content-between" style="padding: 10px;">
                  <div style="padding: 10px;">
                    <form action="checkout.php">

                      <button type="submit" class="btn detail-btn">
                        Go to checkout
                      </button>
                    </form>
                  </div>
                  <div style="padding: 10px;">
                    <form action="../products.php">
                      <button type="submit" class="btn detail-btn">
                        Back
                      </button>
                    </form>
                  </div>
                </div>
                <?php
              }
              ?>

            </div>

          </div>

      </section>
    </body>

    <!-- 
    - #FOOTER
  -->


    <footer class="footer">
      <div class="footer-top section" style="background-color: #f9c47f;">
        <div class="container">
          <div class="footer-brand">
            <img src="../admin/uploaded_img/<?= $row["logo"] ?>" width="150" height="50" alt="Nifty logo">
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
                    <?= $row["address"] ?>
                  </span>
                </address>
              </li>

              <li>
                <a href="tel:<?= $row["contact"] ?>" class="footer-link">
                  <ion-icon name="call"></ion-icon>

                  <span class="footer-link-text">
                    <?= $row["contact"] ?>
                  </span>
                </a>
              </li>

              <li>
                <a href="mailto:niftyshoesph@gmail.com" class="footer-link">
                  <ion-icon name="mail"></ion-icon>

                  <span class="footer-link-text">
                    <?= $row["email"] ?>
                  </span>
                </a>
              </li>

            </ul>





          </div>

        </div>
      </div>



    </footer>

    <?php
  }
}
?>

</html>
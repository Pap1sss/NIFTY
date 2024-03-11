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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shopping cart</title>

  <!-- Montserrat Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="../style.css">


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
  <section class="h-100 gradient-custom">
    <div class="row d-flex justify-content-center">

      <div class="card mb-4" style="border: 2px solid black; width: 90%; margin:3%;">

        <div class="card-header py-3">
          <h5 class="mb-0">YOUR CART</h5>

        </div>
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
              <div class="row">
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                  <!-- Image -->
                  <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                    <div class="img-box">
                      <img src="../<?php echo $fetch_cart['image']; ?>"
                        alt="<?php echo htmlspecialchars($fetch_cart['name']); ?>" class="image-contain">
                    </div>
                    <a href="#!">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                    </a>
                  </div>
                  <!-- Image -->


                </div>

                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                  <ul class="list-group">
                    <!-- Data -->


                    <li class="list-group-item">
                      <h2><strong>
                          Item:
                          <?php echo htmlspecialchars(strip_tags($fetch_cart['name'])); ?>
                        </strong></h2>
                    </li>
                    <li class="list-group-item">
                      <h5>Size and Color:
                        <?php echo htmlspecialchars(strip_tags($fetch_cart['unit'])); ?>
                      </h5>
                    </li>
                    <li class="list-group-item">
                      <h5>Price: ₱
                        <?php echo htmlspecialchars(strip_tags($fetch_cart['price'])); ?>
                      </h5>
                    </li>
                    <br>
                    <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="btn btn-danger" class="delete-btn"
                      onclick="return confirm('remove item from cart?');">
                      REMOVE
                    </a>

                    <!-- Data -->
                  </ul>
                </div>


                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                  <!-- Quantity -->
                  <label class="form-label" for="quantity">Quantity:</label>
                  <form action="" method="post">
                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                    <div class="input-group">
                      <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>"
                        class="form-control" />
                      <br>
                      <button type="submit" name="update_cart" value="update" class="btn btn-secondary">Update</button>
                    </div>
                    <strong id="subtotal" style="font-size: 35px;">₱
                      <?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>
                    </strong>
                  </form>
                </div>
                <!-- Quantity -->

                <!-- Price -->

                <p class="text-start text-md-center">

                </p>
                <?php
                $grand_total += $sub_total;
                ?>
                <!-- Price -->
              </div>


              <!-- Single item -->
              <?php
          }
        } else {
          echo '<h1>YOUR CART IS EMPTY</h1>';
        }
        ?>
          <hr class="my-4" />


          <div class="card mb-4">
            <div class="card-body">
              <p><strong>Expected shipping delivery</strong></p>
              <p class="mb-0">The expected delivery date should be 3 days onwards depending on stocks</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4" style="border: 2px solid black; width: 90%; margin:3%;">
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
              <?php

              if ($grand_total == 0) {


                ?>
                <form action="checkout.php">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" disabled="true">
                    Go to checkout
                  </button>
                </form>
                <?php
              } else {
                ?>
                <form action="checkout.php">

                  <button type="submit" style="width: 90%;" class="btn btn-primary btn-lg btn-block">
                    Go to checkout
                  </button>
                </form>

                <?php
              }
              ?>

              <form action="../products.php">
                <button type="submit" style="width: 90%;"
                  class="btn btn-primary btn-lg btn-block justify-content-center">
                  Back
                </button>
              </form>
            </div>


          </div>
        </div>

  </section>
</body>

</html>
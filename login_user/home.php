<?php require_once "controllerUserData.php";
include 'connection.php';



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
          background-color: #E7AF65;
          border: transparent;
          border-radius: 20px;
          box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.20);


        }

        .detail-btn:hover {
          background-color: #F4B39D;
          color: white;
        }
      </style>




      <div class=" container py-4" style=" display: flex; justify-content: center;">


        <div class="col-lg-8">
          <div class="card mb-4" style="border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.20);">
            <div class="card-body">
              <form method="post" action="">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Name:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">
                      <input type="tel" class="form-control flex-grow-1 mr-2" id="contact" name="fullname"
                        value="<?php echo htmlspecialchars($user_name); ?>">
                    </p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">
                      <?php echo $email; ?>
                    </p>
                  </div>
                </div>
                <hr>
                <hr>
                <style>
                  .form-control {
                    font-size: 1.4rem;
                  }
                </style>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Contact Number:</p>
                  </div>
                  <div class="col-sm-9">
                    <div class="d-flex align-items-center">
                      <input type="tel" class="form-control flex-grow-1 mr-2" id="contact" name="contact"
                        value="<?php echo htmlspecialchars($contact); ?>" maxlength="11" pattern="[0-9]{11}">

                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                    <div class="d-flex align-items-center">
                      <textarea class="form-control flex-grow-1 mr-2" id="address" name="address"
                        rows="3"><?php echo htmlspecialchars($address); ?></textarea>

                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <button type="submit" name="submit" class="btn detail-btn"
                      style=" display: inline-block; width:100%; ">Update
                      Information</button>

                    <?php
                    if (isset($_POST['submit'])) {
                      $contact = filter_var($_POST['contact'], FILTER_SANITIZE_NUMBER_INT);
                      $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
                      $user_name = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);



                      $sql = "UPDATE usertable SET name =?, contact = ?, address = ? WHERE id = ?";
                      $stmt = $conn->prepare($sql);
                      $stmt->bind_param("ssss", $user_name, $contact, $address, $user_id);
                      $stmt->execute();


                      if ($stmt->affected_rows > 0) {
                        echo "<script>alert('Information updated successfully.'); window.location.reload(); </script>";
                      } else {

                      }

                      $stmt->close();
                    }
                    ?>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <br><br>

          <hr style=" border-top: 0.5px solid #F9C47F; ">

          <div class="container" style="padding: 5px;">
            <style>
              .tab_font {
                color: black;
              }
            </style>
            <div style="text-align: center; ">
              <H2>Your Orders</H2>
            </div>

            <div class="column d-flex justify-content-evenly" style="padding: 20px; ">
              <ul class="nav nav-tabs" style="font-color: black;">
                <li class="nav-item">
                  <a class="nav-link tab_font" id="pendingOrderTab" data-toggle="tab" href="#pendingOrderPanel"
                    role="tab">PENDING
                    ORDER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link tab_font" id="toShipTab" data-toggle="tab" href="#toShipPanel" role="tab">TO SHIP</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link tab_font" id="toReceiveTab" data-toggle="tab" href="#toReceivePanel" role="tab">TO
                    RECEIVED</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link tab_font" id="orderCompletedTab" data-toggle="tab" href="#orderCompletedPanel"
                    role="tab">ORDER
                    COMPLETED</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link tab_font" id="CancelTab" data-toggle="tab" href="#orderCompletedPanel"
                    role="tab">CANCELED ORDERS</a>
                </li>
              </ul>
            </div>
            <br>



            <div id="pendingOrderSection" class="card card-order-status 4 mb-md-0"
              style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.20);">
              <div class="card-body">
                <h4>Pending Orders</h4>
                <table class="table table-striped table-bordered">
                  <thead style="display: table-row-group;">
                    <tr>
                      <th style="width: 50%;">Products</th>
                      <th style="width: 25%;">Total Price</th>
                      <th style="width: 25%;">Status</th>
                      <th style="width: 25%;">Cancel Order</th>
                    </tr>
                  </thead>
                  <tbody style="display: table-row-group;">
                    <?php
                    include_once "connection.php";
                    $pending = "pending";
                    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ? AND status = ?");
                    $stmt->bind_param("is", $user_id, $pending);
                    $pending = "pending";
                    $stmt->execute();
                    $resultpending = $stmt->get_result();

                    if ($resultpending->num_rows > 0) {
                      while ($row = $resultpending->fetch_assoc()) {
                        ?>
                        <tr>
                          <td>
                            <?= htmlspecialchars($row["total_products"]) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($row["total_price"]) ?>
                          </td>
                          <td style=" text-transform: uppercase;">
                            <?= htmlspecialchars($row["status"]) ?>
                          </td>
                          <td style="width: 25%;">
                          <?php
                            if (isset($_POST['cancel'])) {
                            $order_id = $_POST['order_id'];

                            $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
                            $stmt->bind_param("si", $pending, $order_id);
                            $pending = "cancelled";
                            $stmt->execute();
                            }
                            ?>

                            <form action="" method="post">
                              <input type="hidden" name="order_id" value="<?= htmlspecialchars($row["id"]) ?>">
                              <button type="cancel" class="btn btn-danger">Cancel Order</button>
                            </form>
                          </td>

                        </tr>
                        <?php
                      }
                    } else {
                      ?>
                      <tr>
                        <td colspan="4">No user orders found.</td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div id="toShipSection" class="card card-order-status 4 mb-md-0"
              style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.20);">
              <div class="card-body">
                <h4>To Ship</h4>
                <table class="table table-striped table-bordered">
                  <thead style="display: table-row-group;">
                    <tr>
                      <th style="width: 50%;">Products</th>
                      <th style="width: 25%;">Total Price</th>
                      <th style="width: 25%;">Status</th>
                    </tr>
                  </thead>
                  <tbody style="display: table-row-group;">
                    <?php
                    include_once "connection.php";
                    $ship = "to ship";
                    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ? AND status = ?");
                    $stmt->bind_param("is", $user_id, $ship);
                    $ship = "to ship";
                    $stmt->execute();
                    $resultship = $stmt->get_result();

                    if ($resultship->num_rows > 0) {
                      while ($row = $resultship->fetch_assoc()) {
                        ?>
                        <tr>
                          <td>
                            <?= htmlspecialchars($row["total_products"]) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($row["total_price"]) ?>
                          </td>
                          <td style=" text-transform: uppercase;">
                            <?= htmlspecialchars($row["status"]) ?>
                          </td>
                        </tr>
                        <?php
                      }
                    } else {
                      ?>
                      <tr>
                        <td colspan="4">No user orders found.</td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div id="toReceiveSection" class="card card-order-status 4 mb-md-0">
              <div class="card-body">
                <h4>To Received</h4>
                <table class="table table-striped table-bordered">
                  <thead style="display: table-row-group;">
                    <tr>
                      <th style="width: 50%;">Products</th>
                      <th style="width: 25%;">Total Price</th>
                      <th style="width: 25%;">Status</th>
                    </tr>
                  </thead>
                  <tbody style="display: table-row-group;">
                    <?php
                    include_once "connection.php";
                    $receive = "to receive";
                    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ? AND status = ?");
                    $stmt->bind_param("is", $user_id, $receive);
                    $receive = "to receive";
                    $stmt->execute();
                    $resultreceive = $stmt->get_result();

                    if ($resultreceive->num_rows > 0) {
                      while ($row = $resultreceive->fetch_assoc()) {
                        ?>
                        <tr>
                          <td>
                            <?= htmlspecialchars($row["total_products"]) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($row["total_price"]) ?>
                          </td>
                          <td style=" text-transform: uppercase;">
                            <?= htmlspecialchars($row["status"]) ?>
                          </td>
                        </tr>
                        <?php
                      }
                    } else {
                      ?>
                      <tr>
                        <td colspan="4">No user orders found.</td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div id="orderCompletedSection" class="card card-order-status 4 mb-md-0">
              <div class="card-body">
                <h4>Order Completed</h4>
                <table class="table table-striped table-bordered">
                  <thead style="display: table-row-group;">
                    <tr>
                      <th style="width: 50%;">Products</th>
                      <th style="width: 25%;">Total Price</th>
                      <th style="width: 25%;">Status</th>
                    </tr>
                  </thead>
                  <tbody style="display: table-row-group;">
                    <?php
                    include_once "connection.php";
                    $complete = "order completed";
                    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ? AND status = ?");
                    $stmt->bind_param("is", $user_id, $complete);
                    $complete = "order completed";
                    $stmt->execute();
                    $resultcomplete = $stmt->get_result();

                    if ($resultcomplete->num_rows > 0) {
                      while ($row = $resultcomplete->fetch_assoc()) {
                        ?>
                        <tr>
                          <td>
                            <?= htmlspecialchars($row["total_products"]) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($row["total_price"]) ?>
                          </td>
                          <td style=" text-transform: uppercase;">
                            <?= htmlspecialchars($row["status"]) ?>
                          </td>
                        </tr>
                        <?php
                      }
                    } else {
                      ?>
                      <tr>
                        <td colspan="4">No user orders found.</td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div id="cancelSection" class="card card-order-status 4 mb-md-0">
              <div class="card-body">
                <h4>Cancelled orders</h4>
                <table class="table table-striped table-bordered">
                  <thead style="display: table-row-group;">
                    <tr>
                      <th style="width: 50%;">Products</th>
                      <th style="width: 25%;">Total Price</th>
                      <th style="width: 25%;">Status</th>
                    </tr>
                  </thead>
                  <tbody style="display: table-row-group;">
                    <?php
                    include_once "connection.php";
                    $cancel = "cancelled";
                    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ? AND status = ?");
                    $stmt->bind_param("is", $user_id, $cancel);
                    $cancel = "cancelled";
                    $stmt->execute();
                    $resultcomplete = $stmt->get_result();

                    if ($resultcomplete->num_rows > 0) {
                      while ($row = $resultcomplete->fetch_assoc()) {
                        ?>
                        <tr>
                          <td>
                            <?= htmlspecialchars($row["total_products"]) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($row["total_price"]) ?>
                          </td>
                          <td style=" text-transform: uppercase;">
                            <?= htmlspecialchars($row["status"]) ?>
                          </td>
                        </tr>
                        <?php
                      }
                    } else {
                      ?>
                      <tr>
                        <td colspan="4">No user orders found.</td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <script>
        document.getElementById('pendingOrderTab').addEventListener('click', function () {
          toggleVisibility('pendingOrderSection');
          toggleVisibility('toShipSection', false);
          toggleVisibility('toReceiveSection', false);
          toggleVisibility('orderCompletedSection', false);
          toggleVisibility('cancelSection', false);

        }); document.getElementById('toShipTab').addEventListener('click', function () {
          toggleVisibility('toShipSection');
          toggleVisibility('pendingOrderSection', false);
          toggleVisibility('toReceiveSection', false);
          toggleVisibility('orderCompletedSection', false);
          toggleVisibility('cancelSection', false);

        }); document.getElementById('toReceiveTab').addEventListener('click', function () {
          toggleVisibility('toShipSection', false);
          toggleVisibility('pendingOrderSection', false);
          toggleVisibility('toReceiveSection');
          toggleVisibility('orderCompletedSection', false);
          toggleVisibility('cancelSection', false);

        }); document.getElementById('orderCompletedTab').addEventListener('click', function () {
          toggleVisibility('toShipSection', false);
          toggleVisibility('pendingOrderSection', false);
          toggleVisibility('toReceiveSection', false);
          toggleVisibility('orderCompletedSection');
          toggleVisibility('cancelSection', false);
        }); 
        document.getElementById('CancelTab').addEventListener('click', function () {
          toggleVisibility('toShipSection', false);
          toggleVisibility('pendingOrderSection', false);
          toggleVisibility('toReceiveSection', false);
          toggleVisibility('orderCompletedSection', false);
          toggleVisibility('cancelSection');
        }); 
        
        function
          toggleVisibility(sectionId, shouldShow = true) { const section = document.getElementById(sectionId); section.style.display = shouldShow ? 'block' : 'none'; } </script>
      <style>
        .card-order-status {
          display: none;
        }
      </style>








      <!-- 
    - custom js link
  -->
      <script src="./assets/js/script.js"></script>
    </body>

    <?php
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

<!--
    JS click edit button
    -->




</html>
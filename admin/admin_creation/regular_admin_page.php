<?php

@include 'config.php';
require_once "controllerUserData.php";

$username = $_SESSION['user_name'];
$name = $_SESSION['name'];

if ($username != false && $name != false) {
  $sql = "SELECT * FROM admin_accounts WHERE username = '$username'";
  $run_Sql = mysqli_query($conn, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $username = $fetch_info['username'];
    $name = $fetch_info['name'];
  }
} else {
  header('Location: login_form.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Admin Page</title>

  <!-- Montserrat Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/analyticstyle.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/analyticstyle.css">

</head>

<body>
  <div class="grid-container">

    <!-- Header -->
    <header class="header">
      <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
      </div>
      <div class="header-left">

        <a href="regular_admin_page.php">
          <span class="material-icons-outlined">refresh</span>
        </a>

      </div>
      <div class="header-right">
        <a href="logout.php">
          <span class="material-icons-outlined">logout</span>
        </a>
      </div>

    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar">


      <div class="sidebar-title">
        <div class="sidebar-brand">
          <span class="material-icons-outlined"></span>Welcome,
          <?php echo htmlspecialchars($_SESSION['user_name']) ?>
        </div>
      </div>

      <ul class="sidebar-list">
        <li class="sidebar-list-item">
          <a href="regular_admin_page.php">
            <span class="material-icons-outlined">dashboard</span> Dashboard
          </a>
        </li>
        <li class="sidebar-list-item" style="opacity: 0.5;">
          <a href="../uploads.php">
            <span class="material-icons-outlined">wysiwyg</span> Setup Website
          </a>
        </li>
        <li class="sidebar-list-item" style="opacity: 0.5;">
          <a href="../CRUD.php">
            <span class="material-icons-outlined">inventory</span> Manage Products
          </a>
        </li>

        <li class="sidebar-list-item" style="opacity: 0.5;">
          <a href="../user_accounts.php">
            <span class="material-icons-outlined">group</span> Accounts
          </a>
        </li>
        <li class="sidebar-list-item" style="opacity: 0.5;">
          <a href="../order_status.php">
            <span class="material-icons-outlined">inventory</span> Manage Order Status
          </a>
        </li>
        <li class="sidebar-list-item" style="opacity: 0.5;">
          <a href="../admin_logs.php">
            <span class="material-icons-outlined">face</span> Admin Logs
          </a>
        </li>
      </ul>
    </aside>
    <!-- End Sidebar -->


    <!-- Main -->
    <main class="main-container d-flex justify-content-evenly">

      <!-- SALES -->
      <section style="padding-top:10px;">
        <div class="handler">
          <div class="row">
            <h1>SALES</h1>
            <form method="post" action="" onsubmit="return checkPassword()">
              <div class="col-lg-4">
                <div class="form-group" style="width: 230%;">
                  <input type="date" name="start_date" class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" style="width: 230%;">
                  <input type="date" name="end_date" class="form-control">
                </div>

              </div>


              <div class="col-lg-4">
                <br>
                <div class="form-group">
                  <input type="submit" name="submit_date_sales" class="btn btn-primary" class="material-icons-outlined"
                    value="Continue">
                </div>
              </div>
            </form>

          </div>



          <script>
            function checkPassword() {
              var password = prompt("Please enter the password to proceed.");
              if (password === "12345678") {
                return true;
              } else {
                alert("Something went wrong.");
                return false;
              }
            }
          </script>



          <?php
          if (isset ($_POST['submit_date_sales'])) {

            $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
            $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);

            // Prepare the SQL statement
            $stmt = $conn->prepare("SELECT * FROM sales WHERE date_created BETWEEN ? AND ?");
            $stmt->bind_param("ss", $start_date, $end_date);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if there are any rows
            if ($result->num_rows > 0) {

              // Prepare the SQL statement for sum
              $stmtSum = $conn->prepare("SELECT SUM(total_price) AS total_sales FROM sales WHERE date_created BETWEEN ? AND ?");
              $stmtSum->bind_param("ss", $start_date, $end_date);
              $stmtSum->execute();
              $resultSum = $stmtSum->get_result();
              $rowSum = $resultSum->fetch_assoc();
              $total_sales = $rowSum['total_sales'];
              $query = mysqli_query($conn, "SELECT * FROM sales WHERE date_created BETWEEN '$start_date' AND '$end_date' ORDER BY sales_id DESC");

              // Loop through the rows and display the data
              if (mysqli_num_rows($query) > 0) {

                foreach ($query as $value) {

                  // Use htmlspecialchars to prevent XSS attacks
                  $start_date = htmlspecialchars($start_date);
                  $end_date = htmlspecialchars($end_date);
                  $total_sales = htmlspecialchars($total_sales);


                  ?>

                  <div class="col-md-6">
                    <div class="col-lg-12">
                      <h3>Total Sales between
                        <?= $start_date ?> and
                        <?= $end_date ?>:

                      </h3>
                      <h1>₱
                        <?= $total_sales ?>
                      </h1>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <th style="border: 1px solid black;">SALES ID</th>
                        <th style="border: 1px solid black;">ORDER ID</th>
                        <th style="border: 1px solid black;">TOTAL ORDER PRICE</th>
                        <th style="border: 1px solid black;">DATE</th>
                      </thead>

                      <tbody>

                        <?php
                        foreach ($query as $value) { ?>
                          <tr>
                            <td>
                              <?= htmlspecialchars($value['sales_id']) ?>
                            </td>
                            <td>
                              <?= htmlspecialchars($value['orders_id']) ?>
                            </td>
                            <td>
                              <?= htmlspecialchars($value['total_price']) ?>
                            </td>
                            <td>
                              <?= htmlspecialchars($value['date_created']) ?>
                            </td>
                          </tr>
                          <?php
                        }
                        ?>
                      </tbody>

                    </table>
                  </div>


                  <?php


                }

              } else {
                ?>
                <div class="col-lg-12">
                  <h3>NO SALES CAN BE FOUND</h3>
                </div>

              </div>

              <?php
              }
            }
          }
          ?>

      </section>

      <br><br>
      <!-- ORDERS -->
      <section style="padding-top:10px;">
        <div class="handler">
          <div class="row">
            <h1>ORDERS</h1>
            <form method="post" action="" onsubmit="return checkPassword()">
              <div class="col-lg-4">
                <div class="form-group" style="width: 200%;">
                  <input type="date" name="start_date" class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" style="width: 200%;">
                  <input type="date" name="end_date" class="form-control">
                </div>

              </div>


              <div class="col-lg-4">
                <br>
                <div class="form-group">
                  <input type="submit" name="submit_date_orders" class="btn btn-primary" class="material-icons-outlined"
                    value="Continue">
                </div>
              </div>
            </form>
          </div>

        </div>



        <?php
        if (isset ($_POST['submit_date_orders'])) {

          $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
          $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);

          // Prepare the SQL statement
          $stmt = $conn->prepare("SELECT * FROM orders WHERE date_created BETWEEN ? AND ?");
          $stmt->bind_param("ss", $start_date, $end_date);
          $stmt->execute();
          $result = $stmt->get_result();

          // Check if there are any rows
          if ($result->num_rows > 0) {
            $query = mysqli_query($conn, "SELECT * FROM orders WHERE date_created BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC");

            if (mysqli_num_rows($query) > 0) {

              foreach ($query as $value) {

                // Use htmlspecialchars to prevent XSS attacks
                $start_date = htmlspecialchars($start_date);
                $end_date = htmlspecialchars($end_date);

                ?>

                <div class="col-lg-12">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <th>ORDER ID</th>
                      <th>STATUS</th>
                      <th>DATE & TIME</th>
                      <th>NAME</th>
                      <th>MOBILE NUMBER</th>
                      <th>EMAIL</th>
                      <th>PAYMENT METHOD</th>
                      <th>ADDRESS</th>
                      <th>ORDERS</th>
                      <th>TOTAL PRICE</th>

                    </thead>

                    <tbody>

                      <?php
                      foreach ($query as $value) { ?>
                        <tr>
                          <td>
                            <?= htmlspecialchars($value['id']) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($value['status']) ?>
                          </td>
                          <td>

                            <?= htmlspecialchars($value['time_created']) ?>
                          </td>

                          <td>
                            <?= htmlspecialchars($value['name']) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($value['number']) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($value['email']) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($value['method']) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($value['address']) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($value['total_products']) ?>
                          </td>
                          <td>
                            <?= htmlspecialchars($value['total_price']) ?>
                          </td>

                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>

                  </table>
                </div>
                <?php


              }
            }

          } else {
            ?>
            <div class="col-lg-12">
              <h3>NO ORDERS CAN BE FOUND</h3>
            </div>


            <?php
          }
        }
        ?>
      </section>




    </main>


    <!-- End Main -->



  </div>


  <!-- Scripts -->
  <!-- ApexCharts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
  <!-- Custom JS -->
  <script src="js/scripts.js"></script>
</body>

</html>
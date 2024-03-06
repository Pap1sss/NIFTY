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
  <title>REGULAR ADMIN</title>

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


</head>

<body>
  <div class="grid-container">

    <!-- Header -->
    <header class="header">
      <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
      </div>
      <div class="header-left">

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
          <?php echo $_SESSION['user_name'] ?>
        </div>
      </div>

      <ul class="sidebar-list">
        <li class="sidebar-list-item">
          <a href="../uploads.php">
            <span class="material-icons-outlined">dashboard</span> Setup Website
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="../CRUD.php">
            <span class="material-icons-outlined">inventory</span> Manage Products
          </a>
        </li>
        <a href="../categories.php">
          <li class="sidebar-list-item">
            <span class="material-icons-outlined">inventory_2</span> Add Category
        </a>
        </li>
        <li>
          <a href="../units.php">
        <li class="sidebar-list-item">
          <span class="material-icons-outlined">inventory_2</span> Add Color & Sizes
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="../stocks_update.php">
            <span class="material-icons-outlined">fact_check</span> Stocks Update
          </a>
        </li>

        <li class="sidebar-list-item">
          <a href="../analytics.php">
            <span class="material-icons-outlined">fact_check</span> Data & Information
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="analytics_table/admin_logs.php">
            <span class="material-icons-outlined">inventory</span> Manage Order Status
          </a>
        </li>
      </ul>
    </aside>
    <!-- End Sidebar -->

    <!-- Main -->
    <main class="main-container d-flex justify-content-evenly">
      <section style="padding-top:10px;">
        <div class="handler">
          <div class="row">
            <h1>SALES</h1>
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
                alert("Incorrect password. Please try again.");
                return false;
              }
            }
          </script>



          <?php
          if (isset($_POST['submit_date_sales'])) {

            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            $query = mysqli_query($conn, "SELECT * FROM sales WHERE date_created between '$start_date' and '$end_date'");
            $querysum = mysqli_query($conn, "SELECT SUM(total_price) AS total_sales FROM sales WHERE date_created BETWEEN '$start_date' AND '$end_date'");

            if (mysqli_num_rows($query) > 0) {
              $result = mysqli_fetch_assoc($querysum);
              $total_sales = $result['total_sales'];
              foreach ($query as $value) {



                ?>
                <div class="col-md-6">
                  <div class="row">
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
                                <?= $value['sales_id'] ?>
                              </td>
                              <td>
                                <?= $value['orders_id'] ?>
                              </td>
                              <td>
                                <?= $value['total_price'] ?>
                              </td>
                              <td>
                                <?= $value['date_created'] ?>
                              </td>
                            </tr>
                            <?php
                          }
                          ?>
                        </tbody>

                      </table>
                    </div>

                  </div>
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
          ?>

      </section>

      <br><br>
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
        if (isset($_POST['submit_date_orders'])) {

          $start_date = $_POST['start_date'];
          $end_date = $_POST['end_date'];

          $query = mysqli_query($conn, "SELECT * FROM orders WHERE date_created BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC");

          if (mysqli_num_rows($query) > 0) {

            foreach ($query as $value) {

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
                          <?= $value['id'] ?>
                        </td>
                        <td>
                          <?= $value['status'] ?>
                        </td>
                        <td>

                          <?= $value['time_created'] ?>
                        </td>

                        <td>
                          <?= $value['name'] ?>
                        </td>
                        <td>
                          <?= $value['number'] ?>
                        </td>
                        <td>
                          <?= $value['email'] ?>
                        </td>
                        <td>
                          <?= $value['method'] ?>
                        </td>
                        <td>
                          <?= $value['address'] ?>
                        </td>
                        <td>
                          <?= $value['total_products'] ?>
                        </td>
                        <td>
                          <?= $value['total_price'] ?>
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
              <h3>NO ORDERS CAN BE FOUND</h3>
            </div>

      </div>
      <?php
          }
        }
        ?>
  </section>

  <section style="padding-top:10px;">
        <div class="container">
          <div class="row">
            <h1>ADMIN LOGS</h1>
            <form method="post" action="">
              <div class="col-lg-4">
                <div class="form-group">
                  <input type="date" name="start_date" class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <input type="date" name="end_date" class="form-control">
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <input type="submit" name="submit_date_admin_logs" class="btn btn-primary">
                </div>
              </div>
            </form>



            <?php
            if (isset($_POST['submit_date_admin_logs'])) {

              $start_date = $_POST['start_date'];
              $end_date = $_POST['end_date'];

              $query = mysqli_query($conn, "SELECT * FROM admin_log WHERE date between '$start_date' and '$end_date'");

              if (mysqli_num_rows($query) > 0) {

                foreach ($query as $value) {

                  ?>

                  <div class="col-lg-12">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <th>ADMIN USERNAME</th>
                        <th>TIME-IN</th>
                        <th>DATE</th>
                      </thead>

                      <tbody>

                        <?php
                        foreach ($query as $value) { ?>
                          <tr>
                            <td>
                              <?= $value['username'] ?>
                            </td>
                            <td>
                              <?= $value['timein'] ?>
                            </td>
                            <td>
                              <?= $value['date'] ?>
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
                  <h3>NO RECORDS CAN BE FOUND</h3>
                </div>

              </div>
              <?php
              }
            }
            ?>

      </section>

  </div>


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
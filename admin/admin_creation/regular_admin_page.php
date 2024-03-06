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
          <span class="material-icons-outlined">LOGOUT</span>
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
          <a href="../CRUD.php">
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
          <a href="../categories.php">
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
     <main class="main-container">

<section style="padding-top:10px;">
  <div class="container">
    <div class="row">
      <h1>SALES</h1>
      <form method="post" action="sales.php">
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
            <input type="submit" name="submit_date" class="btn btn-primary">
          </div>
        </div>
      </form>



      <?php
      if (isset($_POST['submit_date'])) {

        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $query = mysqli_query($conn, "SELECT * FROM sales WHERE date_created between '$start_date' and '$end_date'");
        $querysum = mysqli_query($conn, "SELECT SUM(total_price) AS total_sales FROM sales WHERE date_created BETWEEN '$start_date' AND '$end_date'");

        if (mysqli_num_rows($query) > 0) {
          $result = mysqli_fetch_assoc($querysum);
          $total_sales = $result['total_sales'];
          foreach ($query as $value) {



            ?>
            <div class="col-lg-12">
              <h3>Total Sales between
                <?= $start_date ?> and
                <?= $end_date ?>: ₱
                <?= $total_sales ?>
              </h3>
            </div>

          </div>
          <div class="col-lg-12">
            <table class="table table-striped">
              <thead>
                <th>SALES ID</th>
                <th>ORDER ID</th>
                <th>TOTAL ORDER PRICE</th>
                <th>DATE</th>
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
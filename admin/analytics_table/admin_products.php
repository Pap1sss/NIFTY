<?php

@include '../config.php';
require_once "../admin_creation/controllerUserData.php";

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
  header('Location: ../admin_creation/login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Analytics</title>

  <!-- Montserrat Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/analyticstyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
        <a href="../admin_creation/super_admin_page.php">
          <span class="material-icons-outlined">account_circle</span>
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
          <a href="user_accounts.php">
            <span class="material-icons-outlined">dashboard</span> User Account
          </a>
        </li>
        <a href="#">
          <li class="sidebar-list-item">

            <span class="material-icons-outlined">inventory_2</span> Products
        </a>
        </li>
        <li class="sidebar-list-item">
          <a href="admin_logs.php">
            <span class="material-icons-outlined">fact_check</span> Admin logs
          </a>
        </li>

        <li class="sidebar-list-item">
          <a href="sales.php">
            <span class="material-icons-outlined">shopping_cart</span> Sales
          </a>
        </li>

        <li class="sidebar-list-item">
          <a href="orders.php">
            <span class="material-icons-outlined">shopping_cart</span> Orders
          </a>
        </li>

      </ul>
    </aside>
    <!-- End Sidebar -->

    <!-- Main -->
    <main class="main-container">


      <h2>PRODUCTS</h2>

      <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for products...">
      <div style="margin-left:45px; margin-right: 45px;">
        <table class="table table-striped" id="productTable" style="font-size: 90%;">
          <thead>
            <tr>
              <th>Product ID</th>
              <th>Product Category</th>
              <th>Product Name</th>
              <th>Product Price</th>
              <th>Product description</th>
              <th>DATE OF CREATION</th>
              <th>TIME OF CREATION</th>
              <th>EDITED ON</th>
              <th>TIME OF EDIT</th>

            </tr>
          </thead>
          <?php
          include_once "../admin_creation/config.php";
          $sql = "SELECT * from products";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <td>
                  <?= $row["id"] ?>
                </td>
                <td>
                  <?= $row["category"] ?>
                </td>
                <td>
                  <?= $row["name"] ?>
                </td>
                <td>
                  <?= $row["price"] ?>
                </td>
                <td>
                  <?= $row["description"] ?>
                </td>
                <td>
                  <?= $row["date_created"] ?>
                </td>
                <td>
                  <?= $row["time_created"] ?>
                </td>
                <td>
                  <?= $row["date_edited"] ?>
                </td>
                <td>
                  <?= $row["time_edited"] ?>
                </td>




                <?php

            }
          }
          ?>

        </table>



      </div>
  </div>

  </div>

  <br><br>




  </main>
  <!-- End Main -->

  </div>


  <!-- Scripts -->
  <script>
    function searchTable() {
      let input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("productTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Assuming the product name is in the second column
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>
  <!-- ApexCharts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
  <!-- Custom JS -->
  <script src="js/scripts.js"></script>
</body>

</html>
<?php

@include '../config.php';
require_once "admin_creation/controllerUserData.php";

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
  <link rel="stylesheet" href="css/analyticstyle.css">

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
          <a href="admin_creation/regular_admin_page.php">
            <span class="material-icons-outlined">home</span> Dashboard
          </a>
        </li>

        <li class="sidebar-list-item">
          <a href="uploads.php">
            <span class="material-icons-outlined">dashboard</span> Setup Website
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="CRUD.php">
            <span class="material-icons-outlined">inventory</span> Manage Products
          </a>
        </li>

        <li class="sidebar-list-item">
          <a href="stocks_update.php">
            <span class="material-icons-outlined">fact_check</span> Stocks Update
          </a>
        </li>

        <li class="sidebar-list-item">
          <a href="analytics.php">
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
      <div class="column">


        <!-- TABLE for users -->



        <div style="display: flex;">
          <div style="margin-left:45px; margin-right: 45px;">
            <h2>USER ACCOUNTS</h2>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <?php
                $status = isset($_GET['status']) ? $_GET['status'] : 'all';
                $limit = isset($_GET['limit_user']) ? (int) $_GET['limit_user'] : 10;
                $page = isset($_GET['user_page']) ? (int) $_GET['user_page'] : 1;
                $offset = ($page - 1) * $limit;
                if ($status == 'all') {
                  $sql = "SELECT COUNT(*) as total from usertable";
                } else {
                  $sql = "SELECT COUNT(*) as total from usertable WHERE status = '$status'";
                }
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $total_rows = $row["total"];
                $total_pages = ceil($total_rows / $limit);
                for ($i = 1; $i <= $total_pages; $i++) {
                  ?>
                  <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?status=<?= $status ?>&limit_user=<?= $limit ?>&page=<?= $i ?>">
                      <?= $i ?>
                    </a>
                  </li>
                  <?php
                }
                ?>
              </ul>
            </nav>
            <form method="get">
              <p>Select number of rows:</p>
              <select name="limit_user" onchange="this.form.submit()" class="btn btn-primary dropdown-toggle">
                <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10 Rows</option>
                <option value="20" <?= $limit == 20 ? 'selected' : '' ?>>20 Rows</option>
                <option value="50" <?= $limit == 50 ? 'selected' : '' ?>>50 Rows</option>
                <option value="100" <?= $limit == 100 ? 'selected' : '' ?>>100 Rows</option>
              </select>
            </form>
            <form method="get">
              <p>Filter by status:</p>
              <select name="status" onchange="this.form.submit()" class="btn btn-primary dropdown-toggle">
                <option value="all" <?= $status == 'all' ? 'selected' : '' ?>>All</option>
                <option value="verified" <?= $status == 'verified' ? 'selected' : '' ?>>Verified</option>
                <option value="notverified" <?= $status == "notverified" ? 'selected' : '' ?>>Not Verified</option>
              </select>
            </form>
            <br>
            <table class="table table-bordered border-primary">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>User's Name</th>
                  <th>User's Email</th>
                  <th>Status</th>
                </tr>
              </thead>
              <?php
              if ($status == 'all') {
                $sql = "SELECT * from usertable LIMIT $limit OFFSET $offset";
              } else {
                $sql = "SELECT * from usertable WHERE status = '$status' LIMIT $limit OFFSET $offset";
              }
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
                    <td>
                      <?= $row["id"] ?>
                    </td>
                    <td>
                      <?= $row["name"] ?>
                    </td>
                    <td>
                      <?= $row["email"] ?>
                    </td>
                    <td>
                      <?= $row["status"] ?>
                    </td>
                  </tr>
                  <?php
                }
              }
              ?>
            </table>
          </div>

          <div style="margin-left:45px; margin-right: 45px;">
            <h2>USERS LOGS</h2>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <?php
                $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10;
                $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                $offset = ($page - 1) * $limit;
                $sql = "SELECT COUNT(*) as total from logs";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $total_rows = $row["total"];
                $total_pages = ceil($total_rows / $limit);
                for ($i = 1; $i <= $total_pages; $i++) {
                  ?>
                  <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?limit=<?= $limit ?>&page=<?= $i ?>">
                      <?= $i ?>
                    </a>
                  </li>
                  <?php
                }
                ?>
              </ul>
            </nav>
            <form method="get">
              <p>Select number of rows:</p>
              <select name="limit" onchange="this.form.submit()" class="btn btn-primary dropdown-toggle">
                <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10 Rows</option>
                <option value="20" <?= $limit == 20 ? 'selected' : '' ?>>20 Rows</option>
                <option value="50" <?= $limit == 50 ? 'selected' : '' ?>>50 Rows</option>
                <option value="100" <?= $limit == 100 ? 'selected' : '' ?>>100 Rows</option>
              </select>
            </form>
            <br>
            <table class="table table-bordered border-primary">
              <thead>
                <tr>
                  <th>Email</th>
                  <th>Time of access</th>
                  <th>Date of access</th>
                </tr>
              </thead>
              <?php
              $sql = "SELECT * from logs ORDER BY id DESC LIMIT $limit OFFSET $offset";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
                    <td>
                      <?= $row["email"] ?>
                    </td>
                    <td>
                      <?= $row["timein"] ?>
                    </td>
                    <td>
                      <?= $row["date"] ?>
                    </td>
                  </tr>
                  <?php
                }
              }
              ?>
            </table>
          </div>
        </div>
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
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
  <title>Admin Logs</title>

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

        <a href="admin_logs.php">
          <span class="material-icons-outlined">refresh</span>
        </a>

      </div>
      <div class="header-right">
        <a href="admin_creation/logout.php">
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
        <li class="sidebar-list-item" style="opacity: 0.5;">
          <a href="admin_creation/regular_admin_page.php">
            <span class="material-icons-outlined">dashboard</span> Dashboard
          </a>
        </li>
        <li class="sidebar-list-item" style="opacity: 0.5;">
          <a href="uploads.php">
            <span class="material-icons-outlined">wysiwyg</span> Setup Website
          </a>
        </li>
        <li class="sidebar-list-item" style="opacity: 0.5;">
          <a href="CRUD.php">
            <span class="material-icons-outlined">inventory</span> Manage Products
          </a>
        </li>
        <li class="sidebar-list-item" style="opacity: 0.5;">
          <a href="user_accounts.php">
            <span class="material-icons-outlined">group</span> Accounts
          </a>
        </li>
        <li class="sidebar-list-item" style="opacity: 0.5;">
          <a href="order_status.php">
            <span class="material-icons-outlined">inventory</span> Manage Order Status
          </a>
        </li>

      </ul>
    </aside>
    <!-- End Sidebar -->

    <!-- Main -->
    <main class="main-container" style="background-color: #fffdf6;">
      <div class=" column">



        <div style="margin-left:45px; margin-right: 45px;">

          <h2>Admin Logs</h2>

          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php
              $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10;
              $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
              $offset = ($page - 1) * $limit;
              $sql = "SELECT COUNT(*) as total from admin_log";
              $result = $conn->query($sql);
              $row = $result->fetch_assoc();
              $total_rows = $row["total"];
              $total_pages = ceil($total_rows / $limit);
              for ($i = 1; $i <= $total_pages; $i++) {
                ?>
                <li class=" page-item <?= $i == $page ? 'active' : '' ?>">
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
                <th>Username</th>
                <th>Time & Date of Access</th>

              </tr>
            </thead>
            <?php
            $sql = "SELECT * from admin_log ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td>
                    <?= $row["username"] ?>
                  </td>
                  <td>
                    <?= $row["timein"] ?>
                  </td>

                </tr>
                <?php
              }
            }
            ?>
          </table>
        </div>
        <?php
        $conn->close();
        ?>
      </div>


      <br><br>




    </main>
    <!-- End Main -->

  </div>


  <!-- Scripts -->
  <script>
    function searchTable1() {
      let input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput1");
      filter = input.value.toUpperCase();
      table = document.getElementById("productTable1");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2]; // Assuming the product name is in the second column
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
  <script>
    function searchTable2() {
      let input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput2");
      filter = input.value.toUpperCase();
      table = document.getElementById("productTable2");
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
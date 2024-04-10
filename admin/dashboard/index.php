<!DOCTYPE html>
<html lang="en">
<?php @include 'config.php';
require_once "../controllerUserData.php";

$username = $_SESSION['username'];


if ($username != false) {
    $sql = "SELECT * FROM admin_accounts WHERE username =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    $username = mysqli_real_escape_string($conn, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $id, $email, $first_name, $middle_initial, $last_name, $username, $password, $code, $status);
        mysqli_stmt_fetch($stmt);
    } else {
        header('Location:../admin_creation/login_form.php');
    }
} else {
    header('Location:../admin_creation/login_form.php');
}

// Create a prepared statement for the SELECT query
$stmt = $conn->prepare("SELECT * from upload");

// Execute the prepared statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>


        <!-- 
                    - favicon
                -->
        <link rel="shortcut icon" href="../uploaded_img/<?= $row["logo"] ?>" type="image/svg+xml">

        <head>
            <link href="css/sb-admin-2.min.css" rel="stylesheet">

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Dashboard</title>

            <!-- Custom fonts for this template-->
            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link
                href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                rel="stylesheet">

            <!-- Custom styles for this template-->
            <link href="css/sb-admin-2.min.css" rel="stylesheet">

        </head>

        <body id="page-top">

            <!-- Page Wrapper -->
            <div id="wrapper">

                <!-- Sidebar -->
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                        <img src="../uploaded_img/<?= $row["logo"] ?>" alt="logo">
                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Interface
                    </div>





                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                            aria-expanded="true" aria-controls="collapsePages">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Order Management</span>
                        </a>
                        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Check Orders</h6>
                                <a class="collapse-item" href="pendingorders.php">Pending</a>
                                <a class="collapse-item" href="toshiporders.php">To Ship</a>
                                <a class="collapse-item" href="toreceiveorders.php">To Receive</a>
                                <a class="collapse-item" href="completedorders.php">Completed</a>
                                <h6 class="collapse-header">Verify Orders</h6>
                                <a class="collapse-item" href="gcashorders.php">GCASH</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Logs</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Data Logs:</h6>
                                <a class="collapse-item" href="admin_access_logs.php">Admin Logs</a>
                                <a class="collapse-item" href="admin_activity_logs.php">Admin Actions</a>
                                <a class="collapse-item" href="admin_product_activity.php">Product Operations</a>
                                <a class="collapse-item" href="user_records.php">User Records</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Products -->
                    <li class="nav-item">
                        <a class="nav-link" href="product_management.php">
                            <i class="fas fa-fw fa-briefcase"></i>
                            <span>Manage Products</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="sales_overview.php">
                            <i class="fas fa-fw fa-wallet"></i>
                            <span>Sales Overview</span></a>
                    </li>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Settings</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">

                                <a class="collapse-item" href="content_management.php">Content Manager</a>
                                <a class="collapse-item" href="user_management.php">User Management</a>
                            </div>
                        </div>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">


                </ul>
                <!-- End of Sidebar -->

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">

                        <!-- Topbar -->
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>



                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                <li class="nav-item dropdown no-arrow d-sm-none">
                                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-search fa-fw"></i>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                        aria-labelledby="searchDropdown">
                                        <form class="form-inline mr-auto w-100 navbar-search">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light border-0 small"
                                                    placeholder="Search for..." aria-label="Search"
                                                    aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>



                                <div class="topbar-divider d-none d-sm-block"></div>

                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                            <?php echo htmlspecialchars($username); ?>
                                        </span>
                                        <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown">

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../admin_creation/logout.php" data-toggle="modal"
                                            data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>

                            </ul>

                        </nav>
                        <!-- End of Topbar -->

                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Order Count</h1>
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                            </div>

                            <!-- Content Row -->
                            <div class="row">

                                <!-- pending orders Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-secondary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div style="font-size: 15px;"
                                                        class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                        To Pay / GCASH ORDERS</div>
                                                    <?php
                                                    $sql = "SELECT COUNT(*) FROM orders WHERE status = 'to pay'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_row($result);
                                                    ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php echo $row[0]; ?>
                                                        <a href="gcashorders.php" style="text-decoration: none;">
                                                            <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div style="font-size: 15px;"
                                                        class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Pending Orders</div>
                                                    <?php
                                                    $sql = "SELECT COUNT(*) FROM orders WHERE status = 'pending'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_row($result);
                                                    ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php echo $row[0]; ?>
                                                        <a href="pendingorders.php" style="text-decoration: none;">
                                                            <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- to ship Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div style="font-size: 15px;"
                                                        class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        To Ship</div>
                                                    <?php
                                                    $sql = "SELECT COUNT(*) FROM orders WHERE status = 'to ship'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_row($result);
                                                    ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php echo $row[0]; ?>
                                                        <a href="toshiporders.php" style="text-decoration: none;">
                                                            <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- to receive Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div style="font-size: 15px;"
                                                        class="text-xs font-weight-bold text-info text-uppercase mb-1">To
                                                        Receive
                                                    </div>
                                                    <?php
                                                    $sql = "SELECT COUNT(*) FROM orders WHERE status = 'to receive'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_row($result);
                                                    ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php echo $row[0]; ?>
                                                        <a href="toreceiveorders.php" style="text-decoration: none;">
                                                            <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- completed Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div style="font-size: 15px;"
                                                        class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Completed Orders</div>
                                                    <?php
                                                    $sql = "SELECT COUNT(*) FROM orders WHERE status = 'order completed'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_row($result);
                                                    ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php echo $row[0]; ?>
                                                        <a href="completedorders.php" style="text-decoration: none;">
                                                            <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- cancelled Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div style="font-size: 15px;"
                                                        class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                        Cancelled Orders</div>
                                                    <?php
                                                    $sql = "SELECT COUNT(*) FROM orders WHERE status = 'cancelled'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_row($result);
                                                    ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php echo $row[0]; ?>
                                                        <a href="cancelledorders.php?status=cancelled"
                                                            style="text-decoration: none;">
                                                            <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="sidebar-divider my-0">
                            <br>


                            <!-- Customer Insights -->
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Customer Insights</h1>
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                            </div>
                            <div class="row">

                                <!-- pending orders Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div style="font-size: 15px;"
                                                        class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Verified Users</div>
                                                    <?php
                                                    $sql = "SELECT COUNT(*) FROM usertable WHERE status = 'verified'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_row($result);

                                                    ?>

                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php echo $row[0]; ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- to ship Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div style="font-size: 15px;"
                                                        class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                        Not Verified Users</div>
                                                    <?php
                                                    $sql = "SELECT COUNT(*) FROM usertable WHERE status = 'notverified'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_row($result);

                                                    ?>

                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php echo $row[0]; ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <hr class="sidebar-divider my-0">
                            <br>

                            <div class="d-flex ">




                                <!-- Pie Chart -->
                                <div class="col-xl-4 col-lg-5 d-flex">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Top Selling Product</h6>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                    aria-labelledby="dropdownMenuLink">
                                                    <div class="dropdown-header">View:</div>
                                                    <a class="dropdown-item" href="#">Product Sales Count</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card Body -->
                                        <?php
                                        $sql_total = "SELECT quantity, SUM(quantity) as total FROM product_sales GROUP BY product_name;";
                                        $result_total = mysqli_query($conn, $sql_total);
                                        $row_total = mysqli_fetch_row($result_total);

                                        ?>
                                        <div class="card-body">
                                            <?php
                                            $sql_best = "SELECT product_name, SUM(quantity) as total FROM product_sales GROUP BY product_name ORDER BY total DESC LIMIT 1;";
                                            $result_best = mysqli_query($conn, $sql_best);

                                            if ($result_best && mysqli_num_rows($result_best) > 0) {
                                                $row_best = mysqli_fetch_assoc($result_best);

                                                $total_sales = $row_best['total'];
                                                $best = $row_best['product_name'];
                                                $select = mysqli_query($conn, "SELECT * FROM products WHERE name = '$best'");
                                                while ($row = mysqli_fetch_assoc($select)) {
                                                    $grandtotal = $row['price'] * $total_sales;

                                                    ?>
                                                    <div>
                                                        <img class="contain"
                                                            style="width: 100%; height: 100%; box-shadow: 1px 3px 10px 1px; "
                                                            src="../../<?= htmlspecialchars($row["image"]) ?>" alt="logo">
                                                        <hr style=" border-top: 0.3px solid #5F5E5E; ">
                                                        <h4>
                                                            Product:
                                                            <?php echo htmlspecialchars($best); ?>
                                                        </h4>
                                                        <h4>
                                                            Price:
                                                            ₱
                                                            <?php echo $row['price']; ?>
                                                        </h4>
                                                        <h4>
                                                            Total Sales Count:
                                                            <?php echo htmlspecialchars($total_sales); ?>
                                                        </h4>
                                                        <h4>

                                                            Sales Grand Total: ₱
                                                            <?php echo htmlspecialchars($grandtotal); ?>
                                                        </h4>
                                                    </div>

                                                    <?php
                                                }
                                            } else {
                                                echo "No results found.";
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Total Sales Count</th>
                                                    <th>Grand Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT product_name, SUM(quantity) as total FROM product_sales GROUP BY product_name;";
                                                $result = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $product_name = $row['product_name'];
                                                    $select = mysqli_query($conn, "SELECT * FROM products WHERE name = '$product_name'");
                                                    while ($row_prod = mysqli_fetch_assoc($select)) {
                                                        $grandtotal = $row_prod['price'] * $row['total'];
                                                        echo '<tr>';
                                                        echo '<td><img src="../../' . htmlspecialchars($row_prod["image"]) . '" style="width: 50px; height: 50px;"></td>';
                                                        echo '<td>' . htmlspecialchars($row_prod["name"]) . '</td>';

                                                        echo "<td> ₱" . $row["price"] . "</td>";
                                                        echo "<td>" . $total_sales . "</td>";
                                                        echo "<td>₱" . $grand_total . "</td>";


                                                        echo "</tr>";

                                                        ?>

                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>





                            </div>


                        </div>


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->



            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Do you want to Logout?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="../admin_creation/logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>
            <!-- Page level plugins -->
            <script src="vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


            <!-- Page level custom scripts -->
            <script src="js/demo/datatables-demo.js"></script>
            <?php
    }
}
?>
</body>

</html>
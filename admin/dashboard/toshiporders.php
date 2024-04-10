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
    while ($row = $result->fetch_assoc()) {


        if (isset($_GET['receive'])) {
            $id = $_GET['receive'];
            mysqli_query($conn, "UPDATE orders SET status='to receive'WHERE id = '$id'");
            mysqli_query($conn, "INSERT INTO order_log(order_id, action, username, datetime) 
                    VALUES('$id', 'updated order status (to receive)', '$username', CURRENT_TIME())");
            header('location:toshiporders.php');
            exit;
        }
        ;




        ?>



        <!-- 
                    - favicon
                -->
        <link rel="shortcut icon" href="../uploaded_img/<?= $row["logo"] ?>" type="image/svg+xml">

        <head>

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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous"></script>

            <!-- Custom styles for this template-->
            <link href="css/sb-admin-2.min.css" rel="stylesheet">

        </head>

        <body id="page-top">

            <!-- Page Wrapper -->
            <div id="wrapper">

                <!-- Sidebar -->
                <style>
                    .sidebar {
                        position: sticky;
                        top: 0;
                        height: 100vh;
                        overflow-y: auto;
                    }
                </style>

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


                            <!-- DataTales Example -->

                        </div>
                        <div class="card-body">
                            <h1>To Ship Orders</h1>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>Order ID</th>
                                            <th>Customer Name, Email, & Number</th>
                                            <th>Payment Method</th>
                                            <th>Address</th>
                                            <th>Orders</th>
                                            <th>Total Price</th>
                                            <th>Order Date</th>
                                            <th>Update Status</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                            <th>Order ID</th>
                                            <th>Customer Name, Email, & Number</th>
                                            <th>Payment Method</th>
                                            <th>Address</th>
                                            <th>Orders</th>
                                            <th>Total Price</th>
                                            <th>Order Date</th>
                                            <th>Update Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM orders WHERE status = 'to ship' ORDER BY date_created DESC";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";

                                                echo "<td>" . $row["id"] . "</td>";
                                                echo "<td>" . $row["name"] . "<br>" . $row["email"] . "<br>" . $row["number"] . "</td>";
                                                echo "<td>" . $row["method"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["total_products"] . "</td>";
                                                echo "<td>" . $row["total_price"] . "</td>";
                                                echo "<td>" . $row["date_created"] . "</td>";
                                                echo "<td>";
                                                echo "<a class='btn detail-btn' style='width: 100%' href='toshiporders.php?receive=" . htmlspecialchars($row['id']) . "'>TO RECEIVE</a>";
                                                echo "</td>";
                                                echo "</tr>";
                                                ?>

                                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'>No products found</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr class="sidebar-divider d-none d-md-block">
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
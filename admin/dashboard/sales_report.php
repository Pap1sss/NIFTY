<!DOCTYPE html>
<html lang="en">
<?php @include 'config.php';
require_once "../controllerUserData.php";
require ('fpdf186/fpdf.php');

$username = $_SESSION['username'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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
                <style>
                    .sidebar {
                        position: sticky;
                        top: 0;
                        height: 100vh;


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
                    <li class="nav-item ">
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
                    <li class="nav-item active">
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



                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-wallet"></i>
                            <span>Sales Management</span>
                        </a>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">

                                <a class="collapse-item" href="sales_overview.php">Product Sales</a>
                                <a class="collapse-item" href="sales_report.php">Sales Report</a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-keyboard"></i>
                            <span>Content Management</span>
                        </a>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Manage</h6>
                                <a class="collapse-item" href="product_management.php">Products</a>
                                <a class="collapse-item" href="content_management.php">Content</a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-smile"></i>
                            <span>User Management</span>
                        </a>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">

                                <a class="collapse-item" href="user_management.php">Customer Insights</a>
                                <a class="collapse-item" href="user_records.php">Review & Ratings</a>
                                
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Admin Logs</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Data Logs:</h6>
                                <a class="collapse-item" href="admin_order_logs.php">Order</a>
                                <a class="collapse-item" href="admin_stocks_logs.php">Stocks</a>
                                <a class="collapse-item" href="admin_access_logs.php">Access</a>
                                <a class="collapse-item" href="admin_activity_logs.php">Activity</a>
                                <a class="collapse-item" href="admin_product_activity.php">Product Operations</a>
                                <a class="collapse-item" href="user_records.php">User Records</a>

                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-archive"></i>
                            <span>Archive Informations</span>
                        </a>
                        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Data Logs:</h6>
                                <a class="collapse-item" href="archive_products.php">Product</a>
                                <a class="collapse-item" href="archive_accounts.php">Accounts</a>
                                <a class="collapse-item" href="admin_reviews.php">Reviews</a>
                                

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


                            <br>

                            <div class="d-sm-flex align-items-center justify-content-between mb-4" style="padding-left: 20px;">
                                <h1 class="h3 mb-0 text-gray-800">Display Sales Report</h1>

                            </div>
                            <div style="padding: 20px;">


                                <form method="post" action="" onsubmit="return checkPassword()" class="form-inline">

                                    <div class="form-group">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" name="start_date" class="form-control mx-2" id="start_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" name="end_date" class="form-control mx-2" id="end_date">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit_date_sales" class=" mx-2"
                                            class="material-icons-outlined" value="🔎">
                                    </div>
                                </form>

                            </div>

                            <div class="table-responsive" style="padding: 20px;">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Total Price</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                        <?php
                                        $start_date = "";
                                        $end_date = "";
                                        $total_sum = "";

                                        if (isset($_POST['submit_date_sales'])) {
                                            $start_date = $_POST['start_date'];
                                            $end_date = $_POST['end_date'];


                                            // Prepare and bind
                                            $stmt = $conn->prepare("SELECT SUM(total_price) as total_sum FROM sales WHERE date_created BETWEEN? AND?");
                                            $stmt->bind_param("ss", $start_date, $end_date);

                                            // Execute statement
                                            $stmt->execute();

                                            // Bind result variables
                                            $stmt->bind_result($total_sum);

                                            // Fetch value
                                            $stmt->fetch();



                                            $stmt->close();

                                            $sql = "SELECT * FROM sales WHERE date_created BETWEEN? AND?";
                                            $result1 = $conn->prepare($sql);
                                            $result1->bind_param("ss", $start_date, $end_date);
                                            $result1->execute();

                                            $result1->bind_result($sales_id, $orders_id, $total_price, $date_created);

                                            while ($result1->fetch()) {
                                                echo "<tr>";
                                                echo "<td>" . $orders_id . "</td>";
                                                echo "<td>₱" . $total_price . "</td>";
                                                echo "<td> " . $date_created . "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div style="font-size: 30px;">
                                    <?php

                                    echo "Total Sales Between: " . $start_date . " to " . $end_date . " is: ₱" . $total_sum;


                                    ?>
                                </div>


                            </div>

                            <hr class="sidebar-divider d-none d-md-block">
                            <br>
                            <div class="d-sm-flex align-items-center justify-content-between mb-4" style="padding-left: 20px;">
                                <h1 class="h3 mb-0 text-gray-800">Generate Report</h1>
                            </div>
                            <div style="padding: 20px;">

                                <form action="download_sales_pdf.php" method="post">
                                    <div class="form-group">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" name="start_date" class="form-control mx-2" id="start_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" name="end_date" class="form-control mx-2" id="end_date">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-download fa-sm text-white-50"></i> Download Report</button>
                                    </div>
                                </form>
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
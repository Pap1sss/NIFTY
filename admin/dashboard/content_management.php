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

        if (isset($_POST['update_business_name'])) {

            // Validate the input
            $title = $_POST['title'];

            if (!preg_match("/^[a-zA-Z0-9 ]*$/", $title)) {
                echo "<script>alert('Only letters, numbers, and whitespace are allowed');</script>";
            }

            if (empty($title)) {
                echo "<script>alert('Please fill out the field');</script>";
            }

            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("UPDATE upload SET title=?");
            $stmt->bind_param("s", $title);
            $stmt->execute();

            // Log the activity
            $editbusinessname = 'edit business name';
            $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
            $stmt->bind_param("ss", $username, $editbusinessname);
            $stmt->execute();
            header('location: content_management.php');
            exit();
        }
        ;
        if (isset($_POST['update_business_description'])) {

            // Validate the input
            $description = $_POST['description'];

            if (empty($description)) {
                echo "<script>alert('Please fill out the field');</script>";
            }

            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("UPDATE upload SET description=?");
            $stmt->bind_param("s", $description);
            $stmt->execute();

            // Log the activity
            $editbusinessdescription = 'edit business description';
            $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
            $stmt->bind_param("ss", $username, $editbusinessdescription);
            $stmt->execute();
            header('location: content_management.php');
            exit();
        }
        ;

        if (isset($_POST['update_business_email'])) {

            // Validate the input
            $email = $_POST['email'];


            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("UPDATE upload SET email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            // Log the activity
            $editemail = 'edited company email';
            $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
            $stmt->bind_param("ss", $username, $editemail);
            $stmt->execute();
            header('location: content_management.php');
            exit();
        }
        ;
        if (isset($_POST['update_business_address'])) {

            // Validate the input
            $address = $_POST['company_address'];

            if (empty($address)) {
                echo "<script>alert('Please fill out the field');</script>";
            }

            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("UPDATE upload SET address=?");
            $stmt->bind_param("s", $address);
            $stmt->execute();

            // Log the activity
            $editbusinessaddress = 'edit business address';
            $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
            $stmt->bind_param("ss", $username, $editbusinessaddress);
            $stmt->execute();
            header('location: content_management.php');
            exit();
        }
        ;
        if (isset($_POST['update_business_contact'])) {

            // Validate the input
            $contact = $_POST['company_contact'];
            if (!preg_match("/^[0-9]{11}$/", $contact)) {
                echo "<script>alert('Please enter exactly 11 numbers');</script>";
            } else {
                if (empty($contact)) {
                    echo "<script>alert('Please fill out the field');</script>";
                }

                // Use prepared statements to prevent SQL injection
                $stmt = $conn->prepare("UPDATE upload SET contact=?");
                $stmt->bind_param("i", $contact);
                $stmt->execute();

                // Log the activity
                $editbusinesscontact = 'edit business contact number';
                $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
                $stmt->bind_param("ss", $username, $editbusinesscontact);
                $stmt->execute();
                header('location: content_management.php');
                exit();
            }
        }

        if (isset($_POST['update_business_logo'])) {
            $company_logo = $_FILES['company_logo']['name'];
            $company_logo_tmp_name = $_FILES['company_logo']['tmp_name'];

            if (empty($company_logo)) {
                echo "<script>alert('Please fill out all');</script>";
            } else {
                $stmt = $conn->prepare("UPDATE upload SET logo=?");
                $stmt->bind_param("s", $company_logo);
                $stmt->execute();

                $target_dir = "../uploaded_img/";
                $target_file_logo = $target_dir . basename($company_logo);
                move_uploaded_file($company_logo_tmp_name, $target_file_logo);
                header('location: content_management.php');
                exit();
            }
        }
        ;
        if (isset($_POST['update_business_home'])) {
            $display_image = $_FILES['display_image']['name'];
            $display_image_tmp_name = $_FILES['display_image']['tmp_name'];


            if (empty($display_image)) {
                echo "<script>alert('Please fill out all');</script>";
            } else {
                $stmt = $conn->prepare("UPDATE upload SET homepage_image=?");
                $stmt->bind_param("s", $display_image);
                $stmt->execute();

                $target_dir = "../uploaded_img/";
                $target_file_image = $target_dir . basename($display_image);
                move_uploaded_file($display_image_tmp_name, $target_file_image);
                header('location: content_management.php');
                exit();
            }
        }
        ;

        if (isset($_POST['update_business_gcash'])) {
            $gcash_qr = $_FILES['gcash_qr']['name'];
            $gcash_qr_tmp_name = $_FILES['gcash_qr']['tmp_name'];


            if (empty($gcash_qr)) {
                echo "<script>alert('Please fill out all');</script>";
            } else {
                $stmt = $conn->prepare("UPDATE upload SET gcash_ss=?");
                $stmt->bind_param("s", $gcash_qr);
                $stmt->execute();

                $target_dir = "../uploaded_img/";
                $target_file_image = $target_dir . basename($gcash_qr);
                move_uploaded_file($gcash_qr_tmp_name, $target_file_image);
                header('location: content_management.php');
                exit();
            }
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
                    <li class="nav-item ">
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

                    <li class="nav-item active">
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
                                                    <a class="dropdown-item" href="../admin_creation/logout.php"
                                                        data-toggle="modal" data-target="#logoutModal">
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
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <div class="card-body">
                                                    <!-- fetch categories  -->

                                                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"
                                                        enctype="multipart/form-data">

                                                        <div class="input-container card"
                                                            style="background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
                                                            <div class="form-group d-flex flex-column align-items-center justify-content-center mb-4"
                                                                style="margin: 20px;">
                                                                <div class="d-flex justify-content-center"
                                                                    style="width: 100%; ">
                                                                    <input style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);"
                                                                        type="text" placeholder="Enter Business Name"
                                                                        name="title" class="form-control mb-3" maxlength="255">
                                                                    <input type="submit" value="&#x2713;"
                                                                        name="update_business_name" class="btn">
                                                                </div>
                                                                <div class="d-flex justify-content-center"
                                                                    style="width: 100%; ">
                                                                    <textarea style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);"
                                                                        type="text" placeholder="Enter Business Description"
                                                                        name="description" class="form-control mb-3"
                                                                        maxlength="255"></textarea>
                                                                    <input type="submit" value="&#x2713;"
                                                                        name="update_business_description"
                                                                        class="btn detail-btn">
                                                                </div>
                                                                <div class="d-flex justify-content-center"
                                                                    style="width: 100%; ">
                                                                    <input style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);"
                                                                        type="text" placeholder="Enter Business Email Address"
                                                                        name="email" class="form-control mb-3" maxlength="255">
                                                                    <input type="submit" value="&#x2713;"
                                                                        name="update_business_email" class="btn detail-btn">
                                                                </div>
                                                                <div class="d-flex justify-content-center"
                                                                    style="width: 100%; ">
                                                                    <input style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);"
                                                                        type="text" placeholder="Enter Business Address"
                                                                        name="company_address" class="form-control mb-3"
                                                                        maxlength="255">
                                                                    <input type="submit" value="&#x2713;"
                                                                        name="update_business_address" class="btn detail-btn">
                                                                </div>
                                                                <div class="d-flex justify-content-center"
                                                                    style="width: 100%; ">
                                                                    <input style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);"
                                                                        type="number"
                                                                        placeholder="Enter Business Contact Number"
                                                                        name="company_contact" class="form-control mb-3"
                                                                        maxlength="11">
                                                                    <input type="submit" value="&#x2713;"
                                                                        name="update_business_contact" class="btn detail-btn">
                                                                </div>






                                                    </form>
                                                    <div class="input-container card"
                                                        style="background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
                                                        <div class="form-group d-flex flex-column align-items-center justify-content-center mb-4"
                                                            style="margin: 20px;">
                                                            <div class="d-flex justify-content-evenly" style="width: 100%;">
                                                                <div class="custom-file">
                                                                    <input type="file" accept="image/png, image/jpeg, image/jpg"
                                                                        name="company_logo" class="custom-file-input">
                                                                    <label class="custom-file-label"
                                                                        for="productImageInput">Select
                                                                        Company
                                                                        Logo</label>

                                                                </div>
                                                                <input type="submit" value="UPLOAD" name="update_business_logo"
                                                                    class="btn" style="border-radius: 0px">
                                                            </div>
                                                            <br>
                                                            <div class="d-flex justify-content-evenly" style="width: 100%;">
                                                                <div class="custom-file">
                                                                    <input type="file" accept="image/png, image/jpeg, image/jpg"
                                                                        name="display_image" class="custom-file-input">
                                                                    <label class="custom-file-label"
                                                                        for="productImageInput">Select Display
                                                                        Image</label>

                                                                </div>
                                                                <input type="submit" value="UPLOAD" name="update_business_home"
                                                                    class="btn" style="border-radius: 0px">
                                                            </div>
                                                            <br>
                                                            <div class="d-flex justify-content-evenly" style="width: 100%;">
                                                                <div class="custom-file">
                                                                    <input type="file" accept="image/png, image/jpeg, image/jpg"
                                                                        name="gcash_qr" class="custom-file-input">
                                                                    <label class="custom-file-label"
                                                                        for="productImageInput">Select QR
                                                                    </label>

                                                                </div>
                                                                <input type="submit" value="UPLOAD" name="update_business_gcash"
                                                                    class="btn" style="border-radius: 0px">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Company Name</th>
                                                        <th>Company Description</th>
                                                        <th>Company Email Address</th>
                                                        <th>Company Address</th>
                                                        <th>Company Contact Number</th>
                                                        <th>Logo</th>
                                                        <th>Display Image</th>
                                                        <th>QR CODE</th>

                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Company Name</th>
                                                        <th>Company Description</th>
                                                        <th>Company Email Address</th>
                                                        <th>Company Address</th>
                                                        <th>Company Contact Number</th>
                                                        <th>Logo</th>
                                                        <th>Display Image</th>
                                                        <th>QR CODE</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM upload";
                                                    $result = mysqli_query($conn, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<tr>";

                                                            echo "<td>" . $row["title"] . "</td>";
                                                            echo "<td>" . $row["description"] . "</td>";
                                                           echo "<td>" . $row["email"] . "</td>";
                                                            echo "<td>" . $row["address"] . "</td>";
                                                            echo "<td>" . $row["contact"] . "</td>";
                                                            
                                                            echo "<td><img src='../uploaded_img/" . $row["logo"] . "' alt='" . $row["logo"] . "' width='150' height='100'></td>";
                                                            echo "<td><img src='../uploaded_img/" . $row["homepage_image"] . "' alt='" . $row["homepage_image"] . "' width='200' height='200'></td>";
                                                            echo "<td><img src='../uploaded_img/" . $row["gcash_ss"] . "' alt='" . $row["gcash_ss"] . "' width='100' height='100'></td>";
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
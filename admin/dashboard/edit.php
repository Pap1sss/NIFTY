<!DOCTYPE html>
<html lang="en">
<?php @include 'config.php';
require_once "../controllerUserData.php";

$username = $_SESSION['username'];
$id = $_GET['edit'];

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


if (isset($_POST['update_product_name'])) {
    $id = $_GET['edit'];
    // Validate the input
    $product_name = $_POST['product_name'];
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $product_name)) {
        echo "<script>alert('Only letters, numbers, and whitespace are allowed in product name');</script>";
    }

    if (empty($product_name)) {
        echo "<script>alert('Please fill out product name');</script>";
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE products SET name=?, date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = ?");
    $stmt->bind_param("si", $product_name, $id);
    $stmt->execute();

    // Log the activity
    $editproductname = "edit product name id number: " . $id . " to " . $product_name;

    $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
    $stmt->bind_param("ss", $username, $editproductname);
    $stmt->execute();
    header("Location:edit.php");
    exit;
}
;

if (isset($_POST['update_price'])) {
    $id = $_GET['edit'];
    // Validate the input
    $product_price = $_POST['product_price'];
    if (!is_numeric($product_price)) {
        echo "<script>alert('Something went wrong');</script>";
    }

    if (empty($product_price)) {
        echo "<script>alert('Please fill out properly');</script>";
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE products SET price=?, date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = ?");
    $stmt->bind_param("di", $product_price, $id);
    $stmt->execute();

    // Log the activity
    $editproductprice = "edit product price id number: " . $id . " to " . $product_price;
    $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
    $stmt->bind_param("ss", $username, $editproductprice);
    $stmt->execute();
    header("Location:edit.php");
    exit;
}
;


if (isset($_POST['update_description'])) {
    $id = $_GET['edit'];
    // Validate the input
    $product_description = trim($_POST['product_description']);
    if (strlen($product_description) > 255) {

        echo "<script>alert('Description should not exceed 255 characters');</script>";
    }

    if (empty($product_description)) {

        echo "<script>alert('Please fill out the description');</script>";
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE products SET description=?, date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = ?");
    $stmt->bind_param("si", $product_description, $id);
    $stmt->execute();

    // Log the activity
    $editproductdescription = "edit product description id number: " . $id . " to " . $product_description;
    $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
    $stmt->bind_param("ss", $username, $editproductdescription);
    $stmt->execute();
    header("Location:edit.php");
    exit;
}


if (isset($_POST['update_image'])) {
    $id = $_GET['edit'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = '../uploaded_img/' . $product_image;

    if (empty($product_image)) {

        echo "<script>alert('Please fill required attachment');</script>";
    } else {
        $editproductimage = "edit product description id number: " . $id;
        $update_data = "UPDATE products SET image='admin/uploaded_img/$product_image', date_edited =CURRENT_DATE(), time_edited=CURRENT_TIME() WHERE id = '$id'";
        $product_logs = "INSERT INTO admin_activity_log(username, date_log, time_log, action) 
       VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$editproductimage')";
        $upload = mysqli_query($conn, $update_data);
        $data_check = mysqli_query($conn, $product_logs);
        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);

        } else {

            echo "<script>alert('Please fill required attachment');</script>";
        }
        header("Location:edit.php");
        exit;
    }
}
if (isset($_POST['upload_image'])) {
    $id = $_GET['edit'];
    $product_gallery = mysqli_real_escape_string($conn, $_FILES['product_gallery']['name']);
    $product_gallery_tmp_name = $_FILES['product_gallery']['tmp_name'];
    $product_image_folder = '../uploaded_img/' . $product_gallery;

    if (empty($product_gallery)) {
        echo "<script>alert('Please insert a file');</script>";
    } else {
        $insert_gallery = "insert an image to gallery id number: " . $id;
        $insert = "INSERT INTO product_gallery(product_id, product_image, date_uploaded) 
          VALUES('$id', '$product_gallery', CURRENT_TIME())";
        $product_logs = "INSERT INTO admin_activity_log(username, date_log, time_log,  action) 
          VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'$insert_gallery')";
        $data_check = mysqli_query($conn, $product_logs);
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($product_gallery_tmp_name, $product_image_folder);
            echo "<script>alert('New Image Added Successfully');</script>";
        } else {
            echo "<script>alert('Could not add the product');</script>";
        }
        header("Location:edit.php");
        exit;
    }
}

if (isset($_POST['delete_submit'])) {
    $id = $_GET['edit'];
    // Get the list of checkbox values
    $delete_ids = $_POST['delete_ids'];
    $image_id = $_POST['image_id'];

    // Loop through the list of IDs to delete
    foreach ($delete_ids as $gallery_id) {
        // Prepare a delete statement
        $delete_stmt = $conn->prepare("DELETE FROM product_gallery WHERE gallery_id = ?");
        $delete_stmt->bind_param("i", $image_id);
        $delete_stmt->execute();
    }


    // Display the alert messages
    echo "<script>alert('Removed Successfully');</script>";

    // Redirect back to the admin page with the ID of the item being edited
    header("Location:edit.php?edit=$id");
    exit;
  

}

// Create a prepared statement for the SELECT query
$stmt = $conn->prepare("SELECT * from upload");

// Execute the prepared statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {



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
                        <div class=" d-flex justify-content-between">


                            <div class="container card shadow mb-4" style="padding: 20px;">

                                <div class="table-responsive">
                                    <p>Product Details</p>
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width: 200px;">Image</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th style="width: 500px;">Description</th>
                                                <th>Price</th>




                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $id = $_GET['edit'];
                                            $sql = "SELECT * FROM products WHERE id = '$id'";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td  style='width: 200px;''><img class = 'contain' src='../../" . $row["image"] . "' alt='" . $row["name"] . "' max-width='200' height='200'></td>";
                                                    echo "<td>" . $row["category"] . "</td>";
                                                    echo "<td>" . $row["name"] . "</td>";
                                                    echo "<td style='width: 500px;'>" . $row["description"] . "</td>";
                                                    echo "<td>" . $row["price"] . "</td>";



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







                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                                    <?php
                                    $id = $_GET['edit'];
                                    $sql = "SELECT * FROM products WHERE id = '$id'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <hr class="sidebar-divider d-none d-md-block">
                                            <h4 style="text-align:left;">Edit Product</h4>
                                            <div class="form-group d-flex flex-column align-items-center justify-content-center mb-4"
                                                style="margin: 20px;">


                                                <div class="container" style="margin-bottom: 20px;">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <div class="input-group mb-3">
                                                                <input style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" type="text"
                                                                    placeholder="Product Name" name="product_name" class="form-control"
                                                                    maxlength="255">
                                                                <div class="input-group-append">
                                                                    <input type="submit" value="&#x2713;" name="update_product_name"
                                                                        class="btn btn-dark">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">₱</span>
                                                                </div>
                                                                <input style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" type="text"
                                                                    placeholder="Product Price" name="product_price"
                                                                    class="form-control" maxlength="255">
                                                                <div class="input-group-append">
                                                                    <input type="submit" value="&#x2713;" name="update_price"
                                                                        class="btn btn-dark">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <textarea style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);"
                                                            placeholder="Enter Product Description" name="product_description"
                                                            class="form-control" maxlength="255"></textarea>
                                                        <div class="input-group-append">
                                                            <input type="submit" value="&#x2713;" name="update_description"
                                                                class="btn btn-dark">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <div class="input-group mb-3">
                                                                <div class="custom-file">
                                                                    <input type="file" accept="image/png, image/jpeg, image/jpg"
                                                                        name="product_image" class="custom-file-input"
                                                                        id="productImageInput">
                                                                    <label class="custom-file-label" for="productImageInput">Change
                                                                        Product
                                                                        Thumbnail</label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm">
                                                            <div class="custom-file">
                                                                <input type="file" accept="image/png, image/jpeg, image/jpg"
                                                                    name="product_gallery" class="custom-file-input"
                                                                    id="productImageInput">
                                                                <label class="custom-file-label" for="productImageInput">Add
                                                                    Image
                                                                    to
                                                                    Gallery</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm">

                                                            <input style="margin-bottom: 20px;" type="submit" value="UPDATE MAIN IMAGE"
                                                                name="update_image" class="btn btn-dark">
                                                        </div>

                                                        <div class="col-sm">

                                                            <input type="submit" value="UPLOAD TO GALLERY" name="upload_image"
                                                                class="btn btn-dark">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                    </div>

                                    </form>




                                    <?php
                                        }
                                    }
                                    ?>

                        </div>
                    </div>



                    <div class="container card shadow mb-4" style="padding: 20px;">
                        <h4>Product Gallery</h4>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>

                                        <th style="width: 90%;">Gallery</th>
                                        <th>
                                            Select
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = $_GET['edit'];
                                    $sql = "SELECT * FROM product_gallery WHERE product_id = '$id'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";

                                            echo "<td style='text-align: center;''><img class = 'contain' src='../../admin/uploaded_img/" . $row["product_image"] . "' alt='" . $row["gallery_id"] . "' max-width='300' height='300'></td>";
                                            echo "<td>    <input type='hidden' name='image_id' value=" . $row['gallery_id'] . ">
                                        <input type='checkbox' name='delete_ids[]'' value='<?php echo " . $row['gallery_id'] . "  ?>'></td>";
                                            echo "</tr>";
                                            ?>


                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No images found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th><button type="submit" name="delete_submit" class="btn">Delete
                                                Selected</button></th>

                                    </tr>
                                </tfoot>
                                <?php


                                ?>
                            </table>


                        </form>
                    </div>

                </div>


                <hr class="sidebar-divider d-none d-md-block">

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
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var checkboxes = document.querySelectorAll('input[type=checkbox][name="delete_ids[]"]');
                    var submitButton = document.querySelector('button[type=submit][name="delete_submit"]');

                    function updateSubmitButton() {
                        var anyChecked = false;
                        checkboxes.forEach(function (checkbox) {
                            if (checkbox.checked) {
                                anyChecked = true;
                            }
                        });

                        submitButton.disabled = !anyChecked;
                    }

                    checkboxes.forEach(function (checkbox) {
                        checkbox.addEventListener('change', updateSubmitButton);
                    });

                    updateSubmitButton();
                });
            </script>


            <?php
    }
}
?>
</body>

</html>
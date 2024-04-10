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

        //add product
        if (isset($_POST['add_product'])) {
            $create = 'created a product';
            $category = mysqli_real_escape_string($conn, $_POST['category']);
            $username = mysqli_real_escape_string($conn, $_SESSION['username']);
            $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
            $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
            $product_image = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);
            $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
            $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
            $product_image_folder = '../uploaded_img/' . $product_image;

            if (empty($product_name) || empty($product_price) || empty($product_image)) {
                echo "<script>alert('Please fill out all');</script>";
            } else {
                $insert = "INSERT INTO products(category,name, price, image, description, date_created, time_created) 
                  VALUES('$category', '$product_name', '$product_price', 'admin/uploaded_img/$product_image', '$product_description', CURRENT_DATE(), CURRENT_TIME())";
                $product_logs = "INSERT INTO product_operation(username, action, name, date_time) 
                  VALUES('$username','$create', '$product_name', CURRENT_TIME())";

                $data_check = mysqli_query($conn, $product_logs);
                $upload = mysqli_query($conn, $insert);
                if ($upload) {
                    $product_id = mysqli_insert_id($conn);
                    $insert_gallery = "INSERT INTO product_gallery (product_id, product_image, date_uploaded) 
                  VALUES('$product_id', '$product_image', CURRENT_TIME())";
                    $upload_img = mysqli_query($conn, $insert_gallery);
                    move_uploaded_file($product_image_tmp_name, $product_image_folder);
                    echo "<script>alert('New Product Added Successfully');</script>";
                    header("Location: product_management.php");
                    exit;
                } else {
                    echo "<script>alert('Could not add the product');</script>";
                }
            }
        }

        if (isset($_POST['add_product_category'])) {
            $create = 'created a category';
            $username = $_SESSION['username'];

            $category = $_POST['category'];

            // Check if category already exists
            $duplicate_check = "SELECT * FROM category WHERE category =?";
            $stmt = $conn->prepare($duplicate_check);
            $stmt->bind_param("s", $category);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                echo "<script>alert('Category Already Exists');</script>";
            } else {
                if (empty($category)) {
                    echo "<script>alert('Please fill out all fields.');</script>";
                } else {
                    // Insert category
                    $insert = "INSERT INTO category (category) VALUES(?)";

                    $stmt = $conn->prepare($insert);
                    $stmt->bind_param("s", $category);
                    $stmt->execute();

                    // Insert log
                    $product_logs = "INSERT INTO  admin_activity_log(username, date_log, time_log, action) 
                    VALUES('$username', CURRENT_DATE(),CURRENT_TIME(),'added a category:$category')";
                    $data_check = mysqli_query($conn, $product_logs);
                    echo "<script>alert('Category Added Successfully');</script>";
                    header("Location:product_management.php");
                    exit;
                }
            }
        }

        //delete query//
        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];

            // Get product name
            $result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
            $product_name = '';
            $category = '';

            $price = '';
            $image = '';
            $description = '';
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $product_name = $row['name'];
                $category = $row['category'];

                $price = $row['price'];
                $image = $row['image'];
                $description = mysqli_real_escape_string($conn, $row['description']);
            }
            mysqli_query($conn, "DELETE FROM product_sales WHERE product_name = $product_name");
            mysqli_query($conn, "DELETE FROM products WHERE id = $id");
            mysqli_query($conn, "DELETE FROM product_stocks WHERE product_id = $id");
            mysqli_query($conn, "INSERT INTO archive_products(product_id, category, name, price, image, description, date_time_archive)
       VALUES('$id', '$category', '$product_name', '$price', '$image', '$description', CURRENT_TIME())");
            echo "<script>alert('Product Archived');</script>";
            header("Location: product_management.php");
            exit;
        }
        ;

        if (isset($_GET['category_delete'])) {
            $id = $_GET['category_delete'];

            // Get category name
            $result = mysqli_query($conn, "SELECT category FROM category WHERE id = $id");
            $category_name = '';
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $category_name = $row['category'];
            }

            mysqli_query($conn, "DELETE FROM category WHERE id = $id");
            mysqli_query($conn, "INSERT INTO admin_activity_log(username, date_log, time_log, action) 
               VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'deleted category $category_name')");
            echo "<script>alert('Removed Successfully');</script>";
            header("Location:product_management.php");
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

                            <div class="card-body">
                                <h3>Product Information</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Date & Time Created</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Date & Time Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM products";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["id"] . "</td>";
                                                    echo "<td><img src='../../" . $row["image"] . "' alt='" . $row["name"] . "' width='100' height='100'></td>";
                                                    echo "<td>" . $row["category"] . "</td>";
                                                    echo "<td>" . $row["name"] . "</td>";
                                                    echo "<td>" . $row["price"] . "</td>";
                                                    echo "<td>" . $row["description"] . "</td>";
                                                    echo "<td>" . $row["time_created"] . "</td>";
                                                    echo "<td>";
                                                    echo "<a href='edit.php?edit=" . $row['id'] . "' class='btn' style ='color: #1cc88a;'> <i class='fas '></i> Edit </a>";
                                                    echo "<a href='stocks.php?manage=" . $row['id'] . "' class='btn' style ='color: #f6c23e;'> <i class='fas '></i> Manage </a>";
                                                    echo "<a href='product_management.php?delete=" . $row['id'] . "' class='btn'style ='color: #e74a3b;'> <i class='fas '></i> Archive </a>";
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



                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex">
                                    <div class="card-body">
                                        <!-- fetch categories  -->
                                        <div class="input-container card"
                                            style="background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
                                            <div class="form-group d-flex flex-column justify-content-center mb-4"
                                                style="margin: 20px;">
                                                <?php
                                                $query = "SELECT category FROM category";
                                                $result = $conn->query($query);
                                                if ($result->num_rows > 0) {
                                                    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                }
                                                ?>
                                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"
                                                    enctype="multipart/form-data">
                                                    <p>ADD A PRODUCT</p>

                                                    <select class="form-select mb-3" name="category"
                                                        style="max-width: 100%; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
                                                        <option>Select category</option>
                                                        <?php
                                                        foreach ($options as $option) {
                                                            ?>
                                                            <option>
                                                                <?php echo $option['category']; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <input style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" type="text"
                                                        placeholder="Enter product name" name="product_name"
                                                        class="form-control mb-3" maxlength="255" required>

                                                    <input style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" type="number"
                                                        placeholder="Enter product price" name="product_price"
                                                        class="form-control mb-3" id="productPriceInput" required>




                                                    <textarea style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" type="text"
                                                        placeholder="Enter product description" name="product_description"
                                                        class="form-control mb-3" maxlength="255" required></textarea>

                                                    <div class="custom-file">
                                                        <input type="file" accept="image/png, image/jpeg, image/jpg"
                                                            name="product_image" class="custom-file-input"
                                                            id="productImageInput" required>
                                                        <label class="custom-file-label" for="productImageInput">Select
                                                            Image</label>
                                                    </div>

                                                    <div class="card-body">
                                                        <input style="color:whitesmoke;" type="submit" class="btn btn-primary"
                                                            name="add_product" value="ADD PRODUCT">
                                                    </div>
                                            </div>

                                            </form>

                                        </div>




                                    </div>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <div class="card-body">
                                                <?php
                                                $query = "SELECT category FROM category";
                                                $result = $conn->query($query);
                                                if ($result->num_rows > 0) {
                                                    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                }
                                                ?>
                                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"
                                                    enctype="multipart/form-data">
                                                    <p>ADD A CATEGORY</p>
                                                    <input style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" type="text"
                                                        placeholder="Enter Category Name" name="category"
                                                        class="form-control mb-3" maxlength="255" required>

                                                    <input style="color:whitesmoke; margin-bottom: 10px;" type="submit"
                                                        class="btn btn-primary" name="add_product_category" value="SUBMIT">

                                                </form>

                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable1" width="100%"
                                                        cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Category Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                                            $limit = 5;
                                                            $offset = ($page - 1) * $limit;
                                                            $select = mysqli_query($conn, "SELECT * FROM category ORDER BY id DESC LIMIT $offset, $limit");
                                                            while ($row = mysqli_fetch_assoc($select)) {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $row['category']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="product_management.php?category_delete=<?php echo $row['id']; ?>"
                                                                            class="btn"> <i class="fas fa-archive"></i> Archive </a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-footer ">
                                                    <?php
                                                    $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM category"));
                                                    $total_pages = ceil($total_rows / $limit);
                                                    if ($page > 1) {
                                                        echo "<a href='product_management.php?page=" . ($page - 1) . "' class='btn btn-primary'>Previous</a>";
                                                    }
                                                    for ($i = 1; $i <= $total_pages; $i++) {
                                                        if ($i == $page) {

                                                            echo "<button class='btn btn-primary  '>" . $i . "</button>";
                                                        } else {
                                                            echo "<a href='product_management.php?page=" . $i . "' class='btn '>" . $i . "</a>";
                                                        }
                                                    }
                                                    if ($page < $total_pages) {
                                                        echo "<a href='product_management.php?page=" . ($page + 1) . "' class='btn '>Next</a>";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <br>


                            <div class="card-body">
                                <h3>Archive Products</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Date & Time Archived</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Date & Time Created</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM archive_products";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["product_id"] . "</td>";
                                                    echo "<td><img src='../../" . $row["image"] . "' alt='" . $row["name"] . "' width='100' height='100'></td>";
                                                    echo "<td>" . $row["category"] . "</td>";
                                                    echo "<td>" . $row["name"] . "</td>";
                                                    echo "<td>" . $row["price"] . "</td>";
                                                    echo "<td>" . $row["description"] . "</td>";
                                                    echo "<td>" . $row["date_time_archive"] . "</td>";

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
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
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
<?php

@include 'config.php';

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
    header('Location: admin_creation/login_form.php');
}



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "INSERT INTO product_log(username, date_log, time_log,  edit_create) 
    VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'deleted an order')");
    mysqli_query($conn, "DELETE FROM orders WHERE id = $id");
    echo "<script>alert('Removed Successfully');</script>";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Analytics</title>

    <!-- Montserrat Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/analyticstyle.css">

</head>

<body>
    <style>
        .detail-btn {
            background-color: #f9c47f;

        }

        .detail-btn:hover {
            background-color: #F4B39D;
            color: white;

        }

        table {
            width: 800px;
            border-collapse: collapse;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);

        }
    </style>
    <div class="grid-container" style="background-color: #fffdf6;">

        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">

                <a href="order_status.php">
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
                <li class="sidebar-list-item">
                    <a href="order_status.php">
                        <span class="material-icons-outlined">inventory</span> Manage Order Status
                    </a>
                </li>
                <li class="sidebar-list-item" style="opacity: 0.5;">
                    <a href="admin_logs.php">
                        <span class="material-icons-outlined">face</span> Admin Logs
                    </a>
                </li>
            </ul>
        </aside>
        <!-- End Sidebar -->


        <?php
        if (isset($_GET['ship'])) {
            $id = $_GET['ship'];
            mysqli_query($conn, "UPDATE orders SET status='to ship'WHERE id = '$id'");
            mysqli_query($conn, "INSERT INTO admin_activity_log(username, date_log, time_log, action) 
   VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'updated order status (to ship) : order number $id')");
            header('location:order_status.php');
            exit;
        }
        ;

        if (isset($_GET['receive'])) {
            $id = $_GET['receive'];
            mysqli_query($conn, "UPDATE orders SET status='to receive'WHERE id = '$id'");
            mysqli_query($conn, "INSERT INTO admin_activity_log(username, date_log, time_log,  action) 
   VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'updated order status (to receive) : order number $id')");
            header('location:order_status.php');
            exit;
        }
        ;

        if (isset($_GET['complete'])) {
            $id = $_GET['complete'];
            mysqli_query($conn, "UPDATE orders SET status='order completed'WHERE id = '$id'");
            mysqli_query($conn, "INSERT INTO admin_acitivity_log(username, date_log, time_log,  action) 
   VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'updated order status (completed) : order number $id')");
            header('location:order_status.php');
            exit;
        }
        ;

        $select = mysqli_query($conn, "SELECT * FROM orders");

        ?>

        <main class="main-container">
            <div class="" style="padding: 20px; ">
                <p>Select Payment Method:</p>
                <ul class="nav nav-tabs" style="font-color: black;">
                    <li class="nav-item">
                        <a class="nav-link tab_font" id="CODTab" data-toggle="tab" href="#" role="tab">Cash On
                            Delivery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab_font" id="GCASHTab" data-toggle="tab" href="#" role="tab">GCASH</a>
                    </li>


                </ul>
            </div>

            <!-- COD -->

            <div id="CODSection" class="card card-order-status 4 mb-md-0 container"
                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.20);">

                <div class="row">
                    <div class="d-flex justify-content-between">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                $status = isset($_GET['status']) ? $_GET['status'] : 'all';
                                $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 3;
                                $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                                $offset = ($page - 1) * $limit;
                                if ($status == 'all') {
                                    $sql = "SELECT COUNT(*) as total from orders WHERE method = 'cash on delivery'";
                                } else {
                                    $sql = "SELECT COUNT(*) as total from orders WHERE method = 'cash on delivery' AND status = '$status'";
                                }
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $total_rows = $row["total"];
                                $total_pages = ceil($total_rows / $limit);
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    ?>
                                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                        <a class="page-link"
                                            href="?status=<?= $status ?>&limit=<?= $limit ?>&page=<?= $i ?>">
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
                                <option value="3" <?= $limit == 3 ? 'selected' : '' ?>>3 Rows</option>
                                <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10 Rows</option>
                                <option value="20" <?= $limit == 20 ? 'selected' : '' ?>>20 Rows</option>
                                <option value="50" <?= $limit == 50 ? 'selected' : '' ?>>50 Rows</option>
                                <option value="100" <?= $limit == 100 ? 'selected' : '' ?>>100 Rows</option>
                            </select>
                        </form>

                        <form method="get">
                            <br>
                            <p>Filter by status:</p>
                            <select name="status" onchange="this.form.submit()" class="btn btn-primary dropdown-toggle">
                                <option value="all" <?= $status == 'all' ? 'selected' : '' ?>>All</option>
                                <option value="pending" <?= $status == 'pending' ? 'selected' : '' ?>>Pending Orders
                                </option>
                                <option value="to ship" <?= $status == 'to ship' ? 'selected' : '' ?>>To Ship</option>
                                <option value="to receive" <?= $status == 'to receive' ? 'selected' : '' ?>>To Receive
                                </option>
                                <option value="order completed" <?= $status == 'order completed' ? 'selected' : '' ?>>Order
                                    Completed
                                </option>
                            </select>
                        </form>
                    </div>


                    <div class="container overflow-x-auto">


                        <table class="table table-bordered border-secondary overflow-x-auto"
                            style="border-radius: 5px;">
                            <thead class="thead-dark" style="display: table-row-group; text-align: center; ">
                                <tr>
                                    <th style="text-transform: uppercase;">Change status</th>
                                    <th style="text-transform: uppercase;">Order ID</th>
                                    <th style="text-transform: uppercase;">Customer ID | Name & Email</th>
                                    <th style="text-transform: uppercase;">Contact Number</th>

                                    <th style="text-transform: uppercase;">Address</th>
                                    <th style="text-transform: uppercase;">Products</th>
                                    <th style="text-transform: uppercase;">Order Information
                                    </th>

                                    <th style="text-transform: uppercase;">Order Date & Time</th>
                                </tr>
                            </thead>
                            <?php
                            if ($status == 'all') {
                                $sql = "SELECT * from orders WHERE method = 'cash on delivery' ORDER BY id DESC LIMIT $limit OFFSET $offset";
                            } else {
                                $sql = "SELECT * from orders  WHERE method = 'cash on delivery' AND status = '$status'  ORDER BY id DESC LIMIT $limit OFFSET $offset";
                            }
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tbody style="display: table-row-group;">
                                        <tr>
                                            <td>
                                                <div style="display: flex; flex-direction: column; align-items: center;">
                                                    <a class="btn detail-btn" style="width: 100%;"
                                                        href="order_status.php?ship=<?= htmlspecialchars($row['id']) ?>">
                                                        Ship
                                                    </a>
                                                    <br>
                                                    <a class="btn detail-btn" style="width: 100%;"
                                                        href="order_status.php?receive=<?= htmlspecialchars($row['id']) ?>">
                                                        Receive
                                                    </a>
                                                    <br>
                                                    <a href="order_status.php?complete=<?= htmlspecialchars($row['id']); ?>"
                                                        class="btn detail-btn" style="width: 100%;">
                                                        <i class="fas "></i> Complete
                                                    </a>
                                                    <br>
                                                    <a href="order_status.php?delete=<?= htmlspecialchars($row['id']); ?>"
                                                        class="btn btn-danger" style="width: 100%;">
                                                        <i class="fas "></i> Remove
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['id']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['user_id']) ?>
                                                |
                                                <?= htmlspecialchars($row['name']) ?>
                                                <?= htmlspecialchars($row['email']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['number']) ?>
                                            </td>


                                            <td>
                                                <?= htmlspecialchars($row['address']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['total_products']) ?>
                                            </td>
                                            <td style="text-transform: capitalize; text-align:center;">₱
                                                <?= htmlspecialchars($row['total_price']) ?>
                                                _________________________

                                                <div style="background-color: #F4B39D; border-radius: 10px; margin-top: 10px;">
                                                    <p>
                                                        <?= htmlspecialchars($row['status']) ?>
                                                    </p>
                                                </div>
                                                _________________________
                                                <?= htmlspecialchars($row['method']) ?>
                                            </td>



                                            <td>
                                                <?= htmlspecialchars($row['date_created'] . ' ' . $row['time_created']) ?>
                                            </td>
                                        </tr>

                                    <?php }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- GCASH -->

            <div id="GCASHSection" class="card card-order-status 4 mb-md-0 container"
                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.20);">

                <div class="row">
                    <div class="d-flex justify-content-between">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                $status = isset($_GET['status']) ? $_GET['status'] : 'all';
                                $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 3;
                                $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                                $offset = ($page - 1) * $limit;
                                if ($status == 'all') {
                                    $sql = "SELECT COUNT(*) as total from orders WHERE method = 'gcash'";
                                } else {
                                    $sql = "SELECT COUNT(*) as total from orders WHERE method = 'gcash' AND  status = '$status'";
                                }
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $total_rows = $row["total"];
                                $total_pages = ceil($total_rows / $limit);
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    ?>
                                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                        <a class="page-link"
                                            href="?status=<?= $status ?>&limit=<?= $limit ?>&page=<?= $i ?>">
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
                                <option value="3" <?= $limit == 3 ? 'selected' : '' ?>>3 Rows</option>
                                <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10 Rows</option>
                                <option value="20" <?= $limit == 20 ? 'selected' : '' ?>>20 Rows</option>
                                <option value="50" <?= $limit == 50 ? 'selected' : '' ?>>50 Rows</option>
                                <option value="100" <?= $limit == 100 ? 'selected' : '' ?>>100 Rows</option>
                            </select>
                        </form>

                        <form method="get">
                            <br>
                            <p>Filter by status:</p>
                            <select name="status" onchange="this.form.submit()" class="btn btn-primary dropdown-toggle">
                                <option value="all" <?= $status == 'all' ? 'selected' : '' ?>>All</option>
                                <option value="pending" <?= $status == 'pending' ? 'selected' : '' ?>>Pending Orders
                                </option>
                                <option value="to ship" <?= $status == 'to ship' ? 'selected' : '' ?>>To Ship</option>
                                <option value="to receive" <?= $status == 'to receive' ? 'selected' : '' ?>>To Receive
                                </option>
                                <option value="order completed" <?= $status == 'order completed' ? 'selected' : '' ?>>Order
                                    Completed
                                </option>
                            </select>
                        </form>
                    </div>


                    <div class="container overflow-x-auto">


                        <table class="table table-bordered border-secondary overflow-x-auto"
                            style="border-radius: 5px;">
                            <thead class="thead-dark" style="display: table-row-group; text-align: center; ">
                                <tr>
                                    <th style="text-transform: uppercase;">Change status</th>
                                    <th style="text-transform: uppercase;">Order ID</th>
                                    <th style="text-transform: uppercase;">Customer ID | Name & Email</th>
                                    <th style="text-transform: uppercase;">Contact Number</th>

                                    <th style="text-transform: uppercase;">Address</th>
                                    <th style="text-transform: uppercase;">Products</th>
                                    <th style="text-transform: uppercase;">Order Information
                                    </th>

                                    <th style="text-transform: uppercase;">GCASH Payment Information</th>


                                    <th style="text-transform: uppercase;">Order Date & Time</th>
                                </tr>
                            </thead>
                            <?php
                            if ($status == 'all') {
                                $sql = "SELECT * from orders WHERE method = 'gcash' ORDER BY id DESC LIMIT $limit OFFSET $offset";
                            } else {
                                $sql = "SELECT * from orders  WHERE method = 'gcash' AND  status = '$status'  ORDER BY id DESC LIMIT $limit OFFSET $offset";
                            }
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tbody style="display: table-row-group;">
                                        <tr>
                                            <td>
                                                <div style="display: flex; flex-direction: column; align-items: center;">
                                                    <a class="btn detail-btn" style="width: 100%;"
                                                        href="order_status.php?ship=<?= htmlspecialchars($row['id']) ?>">
                                                        Ship
                                                    </a>
                                                    <br>
                                                    <a class="btn detail-btn" style="width: 100%;"
                                                        href="order_status.php?receive=<?= htmlspecialchars($row['id']) ?>">
                                                        Receive
                                                    </a>
                                                    <br>
                                                    <a href="order_status.php?complete=<?= htmlspecialchars($row['id']); ?>"
                                                        class="btn detail-btn" style="width: 100%;">
                                                        <i class="fas "></i> Complete
                                                    </a>
                                                    <br>
                                                    <a href="order_status.php?delete=<?= htmlspecialchars($row['id']); ?>"
                                                        class="btn btn-danger" style="width: 100%;">
                                                        <i class="fas "></i> Remove
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['id']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['user_id']) ?>
                                                |
                                                <?= htmlspecialchars($row['name']) ?>
                                                <?= htmlspecialchars($row['email']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['number']) ?>
                                            </td>


                                            <td>
                                                <?= htmlspecialchars($row['address']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['total_products']) ?>
                                            </td>
                                            <td style="text-transform: capitalize; text-align:center;">₱
                                                <?= htmlspecialchars($row['total_price']) ?>
                                                _________________________

                                                <div style="background-color: #F4B39D; border-radius: 10px; margin-top: 10px;">
                                                    <p>
                                                        <?= htmlspecialchars($row['status']) ?>
                                                    </p>
                                                </div>
                                                _________________________
                                                <?= htmlspecialchars($row['method']) ?>
                                            </td>

                                            <td>
                                                Reference Number:
                                                <?= htmlspecialchars($row['reference_number']) ?>
                                                Gcash Number:
                                                <?= htmlspecialchars($row['gcash_number']) ?>
                                                <br>
                                                <br>
                                                <img style="width: 200px; height: 150px;"
                                                    src="./uploaded_img/<?= $row['screenshot'] ?>" alt="Image"
                                                    class="img-fluid">
                                            </td>


                                            <td>
                                                <?= htmlspecialchars($row['date_created'] . ' ' . $row['time_created']) ?>
                                            </td>
                                        </tr>

                                    <?php }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <script>
                document.getElementById('CODTab').addEventListener('click', function () {
                    toggleVisibility('CODSection');
                    toggleVisibility('GCASHSection', false);

                }); document.getElementById('GCASHTab').addEventListener('click', function () {
                    toggleVisibility('GCASHSection');
                    toggleVisibility('CODSection', false);


                });

                function
                    toggleVisibility(sectionId, shouldShow = true) { const section = document.getElementById(sectionId); section.style.display = shouldShow ? 'block' : 'none'; } </script>
            <style>
                .card-order-status {
                    display: none;
                }
            </style>
    </div>

    </div>

    </main>
</body>

</html>
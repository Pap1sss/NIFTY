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

        if (isset($_GET['receive'])) {
            $id = $_GET['receive'];
            mysqli_query($conn, "UPDATE orders SET status='to receive'WHERE id = '$id'");
            mysqli_query($conn, "INSERT INTO product_log(username, date_log, time_log,  edit_create) 
   VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'updated order status (to receive) : order number $id')");
            header('location:order_status.php');
        }
        ;

        if (isset($_GET['complete'])) {
            $id = $_GET['complete'];
            mysqli_query($conn, "UPDATE orders SET status='order completed'WHERE id = '$id'");
            mysqli_query($conn, "INSERT INTO product_log(username, date_log, time_log,  edit_create) 
   VALUES('$username', CURRENT_DATE(), CURRENT_TIME(),'updated order status (completed) : order number $id')");
            header('location:order_status.php');
        }
        ;

        $select = mysqli_query($conn, "SELECT * FROM orders");

        ?>

        <main class="main-container">
            <div class="column" style="overflow-x:auto;">
                <div class="row">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            $status = isset($_GET['status']) ? $_GET['status'] : 'all';
                            $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10;
                            $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                            $offset = ($page - 1) * $limit;
                            if ($status == 'all') {
                                $sql = "SELECT COUNT(*) as total from orders";
                            } else {
                                $sql = "SELECT COUNT(*) as total from orders WHERE status = '$status'";
                            }
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $total_rows = $row["total"];
                            $total_pages = ceil($total_rows / $limit);
                            for ($i = 1; $i <= $total_pages; $i++) {
                                ?>
                                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                    <a class="page-link" href="?status=<?= $status ?>&limit=<?= $limit ?>&page=<?= $i ?>">
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
                            <option value="to ship" <?= $status == 'to ship' ? 'selected' : '' ?>>To Ship</option>
                            <option value="to receive" <?= $status == 'to receive' ? 'selected' : '' ?>>To Receive
                            </option>
                            <option value="order completed" <?= $status == 'order completed' ? 'selected' : '' ?>>Order
                                Completed
                            </option>
                        </select>
                    </form>

                    <div class="col-md-12" style="max-width: 100%;">
                        <br>
                        <table class="table table-bordered border-secondary overflow-x-auto" style="border-radius: 5px;">
                            <thead class="thead-dark" style="display: table-row-group; text-align: center; ">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer ID & Name</th>
                                    <th>Number</th>
                                    <th>Email</th>
                                    <th>Payment Method</th>
                                    <th>Address</th>
                                    <th>Products</th>
                                    <th style="width: 10%;">Price & Status</th>
                                    <th>Order Date & Time</th>
                                    <th>GCASH Payment Information</th>
                                    <th>Receipt</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <?php
                            if ($status == 'all') {
                                $sql = "SELECT * from orders  ORDER BY id DESC LIMIT $limit OFFSET $offset";
                            } else {
                                $sql = "SELECT * from orders  WHERE status = '$status'  ORDER BY id DESC LIMIT $limit OFFSET $offset";
                            }
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tbody style="display: table-row-group;">
                                        <tr>
                                            <td>
                                                <?= htmlspecialchars($row['id']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['user_id']) ?>
                                                |
                                                <?= htmlspecialchars($row['name']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['number']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['email']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['method']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['address']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['total_products']) ?>
                                            </td>
                                            <td>₱
                                                <?= htmlspecialchars($row['total_price']) ?>
                                                |
                                                <?= htmlspecialchars($row['status']) ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($row['date_created'] . ' ' . $row['time_created']) ?>
                                            </td>
                                            <td>
                                                Reference Number:
                                                <?= htmlspecialchars($row['reference_number']) ?>
                                                Gcash Number:
                                                <?= htmlspecialchars($row['gcash_number']) ?>
                                            </td>
                                            <td>
                                                <img src="./uploaded_img/<?= $row['screenshot'] ?>" alt="Image"
                                                    class="img-fluid">

                                            </td>
                                            <td>
                                                <a class="btn btn-secondary"
                                                    href="order_status.php?receive=<?= htmlspecialchars($row['id']) ?>">
                                                    To receive
                                                </a>
                                                <br><br>
                                                <a href="order_status.php?complete=<?= htmlspecialchars($row['id']); ?>"
                                                    class="btn btn-success">
                                                    <i class="fas "></i> Order complete
                                                </a>
                                                <br>
                                                <br>
                                                <a href="order_status.php?delete=<?= htmlspecialchars($row['id']); ?>"
                                                    class="btn btn-danger">
                                                    <i class="fas "></i> Remove Order
                                                </a>
                                            </td>
                                        </tr>

                                    <?php }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </main>
</body>

</html>
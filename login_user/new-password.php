<?php require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location: login-user.php');
}
$stmt = $conn->prepare("SELECT * from upload");

// Execute the prepared statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>Create a New Password</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="loginstyle.css">
            <!-- 
                    - favicon
                -->
            <link rel="shortcut icon" href="../admin/uploaded_img/<?= $row["logo"] ?>" type="image/svg+xml">

            <!-- 
- custom css link
-->
            <link rel="stylesheet" href="./assets/css/style.css">

            <!-- 
- google font link
-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link
                href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
                rel="stylesheet">

            <!-- 
- preload banner
-->
            <link rel="preload" href="../admin/uploaded_img/<?= $row["logo"] ?>" as="image">

        </head>

        <!-- 
- #HEADER
-->
        <header class=" header" data-header style="background: linear-gradient(to right, #f9c47f, #F4B39D); ">
            <div class="d-flex justify-content-center">
                <a href="../index.php" class="logo">
                    <p></p>
                </a>
            </div>
        </header>

        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 form">
                        <form action="new-password.php" method="POST" autocomplete="off">
                            <h2 class="text-center">New Password</h2>
                            <?php
                            if (isset($_SESSION['info'])) {
                                ?>

                                <?php
                            }
                            ?>
                            <?php
                            if (count($errors) > 0) {
                                ?>
                                <div class="alert alert-danger text-center">
                                    <?php
                                    foreach ($errors as $showerror) {
                                        echo $showerror;
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Create new password"
                                    required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password"
                                    required>
                            </div>
                            <style>
                                ul {
                                    list-style: none;
                                    padding: 0;
                                    margin: 0;
                                }
                            </style>

                            <div class="alert alert-success text-left" style="margin:0px;">
                                <?php echo $_SESSION['info']; ?>
                                <ul>
                                    <li>- Is at least 10 characters long</li>
                                    <li>- Contains at least one uppercase letter</li>
                                    <li>- Contains at least one lowercase letter</li>
                                    <li>- Contains at least one digit</li>
                                    <li>- Contains at least one special character (i.e., a non-alphanumeric character)</li>
                                </ul>

                            </div>
                            <hr>
                            <div class="form-group">
                                <input class="form-control submit_button" style="color: WHITE;" type="submit"
                                    name="change-password" value="Change">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
    }
}
?>
</body>

</html>
<?php require_once "../controllerUserData.php"; ?>
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
            <link rel="stylesheet" href="css/loginstyle.css">
        </head>
        <!-- 
                    - favicon
                -->
        <link rel="shortcut icon" href="../uploaded_img/<?= $row["logo"] ?>" type="image/svg+xml">
        </head>

        <header class=" header" data-header >
            <div class="d-flex justify-content-center">
                <a href="../index.php" class="logo">
                    <P></P>
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
                                <div class="alert alert-success text-center">
                                    <?php echo $_SESSION['info']; ?>password should at least 10 characters long, contains at least one uppercase letter, 
                        contains at least one lowercase letter, contains at least one number, and contains at least one special character.
                                </div>
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
                                <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control submit_button" style="color: white;" type="submit" name="change-password" value="Change">
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
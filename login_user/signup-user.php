<?php require_once "controllerUserData.php"; // Create a prepared statement for the SELECT query
$stmt = $conn->prepare("SELECT * from upload");

// Execute the prepared statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>Signup Form</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="loginstyle.css">
            <!-- 
                    - favicon
                -->
            <link rel="shortcut icon" href="../admin/uploaded_img/<?= $row["logo"] ?>" type="image/svg+xml">
        </head>

        <header class=" header" data-header style="background: linear-gradient(to right, #f9c47f, #F4B39D)">
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


                        <a href="../index.php">
                            <img src="../admin/uploaded_img/<?= $row["logo"] ?>" width="150" height="50" alt="logo">
                        </a>
                        <p style="text-align:left;">Create account.</p>

                        <form action="signup-user.php" method="POST" autocomplete="">


                            <?php
                            if (count($errors) == 1) {
                                ?>
                                <div class="alert alert-danger text-center">
                                    <?php
                                    foreach ($errors as $showerror) {
                                        echo $showerror;
                                    }
                                    ?>
                                </div>
                                <?php
                            } elseif (count($errors) > 1) {
                                ?>
                                <div class="alert alert-danger">
                                    <?php
                                    foreach ($errors as $showerror) {
                                        ?>
                                        <li>
                                            <?php echo $showerror; ?>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>

                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email Address" required
                                    value="<?php echo $email ?>">
                            </div>


                            <div class="form-group">

                                <input class="form-control submit_button" style="color: white;" type="submit" name="signup"
                                    value="SIGN UP">
                            </div>
                            <div class="link login-link text-center">Already have an account? <a href="login-user.php"
                                    style="color: #BB4D00;">Login here.</a></div>

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
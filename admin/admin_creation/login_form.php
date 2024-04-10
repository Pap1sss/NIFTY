<?php require_once "../controllerUserData.php";
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
            <title>Login Form</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/loginstyle.css">
            <!-- 
                    - favicon
                -->
            <link rel="shortcut icon" href="../uploaded_img/<?= $row["logo"] ?>" type="image/svg+xml">

            <!-- 
        - custom css link
        -->

            <!-- 
    - google font link
    -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

            <!-- 
        - preload banner
    -->
            <link rel="preload" href="../uploaded_img/<?= $row["logo"] ?>" as="image">

        </head>

        <!-- 
        - #HEADER
        -->
        <header class=" header" data-header >
            <div class="d-flex justify-content-center">
                <a href="../index.php" class="logo">
                    <p></p>
                </a>
            </div>
        </header>

        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 form login-form">
                        <form action="login_form.php" method="POST" autocomplete="">

                            <img src="../uploaded_img/<?= $row["logo"] ?>" width="150" height="50" alt="logo">

                            <p class="text-center">Sign in with your email and password.</p>
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
                                <input class="form-control" type="text" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="link forget-pass text-right"><a href="forgot-password.php" style="color: #BB4D00;">Forgot
                                    password?</a></div>
                            <div class="form-group">
                                <input class="form-control submit_button" type="submit" name="login" value="SIGN IN" style="color: white;">
                            </div>
                            <div class="link login-link text-center">Don't have an account? <a href="register_form.php" style="color: #BB4D00;">Register</a></div>


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
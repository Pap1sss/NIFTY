<?php require_once "controllerUserData.php";
$stmt = $conn->prepare("SELECT * from upload");

// Execute the prepared statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <?php
        $email = $_SESSION['email'];
        if ($email == false) {
            header('Location: login-user.php');
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>Code Verification</title>
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
                        <form action="user-otp.php" method="POST" autocomplete="off">
                            <h2 class="text-center">Code Verification</h2>
                            <?php
                            if (isset($_SESSION['info'])) {
                                ?>
                                <div class="alert alert-success text-center">
                                    <?php echo $_SESSION['info']; ?>
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
                                <input class="form-control" type="number" name="otp" placeholder="Enter verification code"
                                    required>
                            </div>
                            <div class="form-group">
                                <input class="form-control  submit_button" style="color: white;" type="submit" name="check"
                                    value="Submit">'
                                <div class="link login-link text-center"> <a href="signup-user.php"
                                        style="color: gray;">BACK</a></div>
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
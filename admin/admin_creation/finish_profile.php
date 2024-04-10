<?php require_once "../controllerUserData.php"; // Create a prepared statement for the SELECT query
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
    while ($row = $result->fetch_assoc()) { ?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>Profile</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/loginstyle.css">
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



                        <img src="../uploaded_img/<?= $row["logo"] ?>" width="150" height="50" alt="logo">

                        <p style="text-align:left;">Finish your profile.</p>

                        <form action="finish_profile.php" method="POST" autocomplete="">


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
                                <input class="form-control" type="text" name="first_name" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="middle_initial" placeholder="Middle Initial" max-length="2" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="last_name" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="username" placeholder="Username" required>
                            </div>


                            <div class="form-group">

                                <input class="form-control submit_button" style="color: white;" type="submit" name="finish" value="FINISH">
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
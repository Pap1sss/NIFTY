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
            <!-- Add Bootstrap CSS link here -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
                integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

            <!-- Add jQuery library link here -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

            <!-- Add Bootstrap JavaScript link here -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
                crossorigin="anonymous"></script>
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
        <style>
            input[type=submit] {
                display: none;
            }
        </style>

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
                            <hr>
                            <!-- Add terms and conditions checkbox -->
                            <div class="form-group">
                                <input type="checkbox" name="terms_and_conditions" id="terms_and_conditions" required>
                                <label for="terms_and_conditions">I agree to the <a href="#" data-toggle="modal"
                                        data-target="#termsModal">Terms and Conditions</a>.</label>
                            </div>
                            <!-- End of terms and conditions checkbox -->
                            <div class="link login-link text-center">Already have an account? <a href="login-user.php"
                                    style="color: #BB4D00;">Login here.</a></div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Add modal for terms and conditions -->
            <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Add terms and conditions text here -->
                            <p>Welcome to <strong>Niftyshoes.shop </strong>These terms and conditions (the "Terms") govern your
                                use of the
                                Website and any services provided through the Website. By accessing or using the Website, you
                                agree to be bound by these Terms. If you do not agree with these Terms, please do not use the
                                Website.</p>
                            <hr>
                            <p> <strong>Personal Information:</strong>We collect personal information such as your name, contact
                                information, email, and address to create your very own account.</p>
                            <hr>
                            <p><strong>Data Sharing: </strong>We do not sell your personal information to third parties.
                                However,
                                we may share your information with service providers who assist us in fulfilling orders,
                                processing payments, and delivering products to you. </p>
                            <hr>
                            <p><strong>Consent: </strong>By using the Website, you consent to the collection, use, and
                                disclosure of your information in accordance with these Terms and our Privacy Policy.</p>
                            <hr>

                            <p>"We take your privacy seriously and are committed to protecting your personal information. We
                                will only collect, use, and store your personal information for the purposes of providing our
                                services to you, and will not share your information with any third parties except as required
                                by law. By using our services, you consent to our collection, use, and storage of your personal
                                information in accordance with this policy."</p>

                            <hr>
                            <p>If you have any questions about these Terms or our Privacy Policy, please contact us at
                                <strong>niftyshoesph@gmail.com</strong>
                            </p>
                            <hr>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of modal for terms and conditions -->
            <?php
    }
}
?>

    <script>
        // Select the checkbox and the submit button
        const checkbox = document.getElementById("terms_and_conditions");
        const submitButton = document.querySelector("input[type=submit]");

        // Add an event listener to the checkbox
        checkbox.addEventListener("change", function () {
            // If the checkbox is checked, show the submit button
            if (this.checked) {
                submitButton.style.display = "block";
            } else {
                // Otherwise, hide the submit button
                submitButton.style.display = "none";
            }
        });
    </script>

</body>

</html>
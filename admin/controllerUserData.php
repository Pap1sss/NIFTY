<?php



session_start();

$_SESSION['logged_in'] = false;
require "admin_creation/config.php";
$email = "";
$name = "";
$errors = array();


require '../../login_user/PHPMailer/src/Exception.php';
require '../../login_user/PHPMailer/src/PHPMailer.php';
require '../../login_user/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//if user signup button
if (isset($_POST['signup'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $email_check = "SELECT * FROM admin_accounts WHERE email = '$email'";
    $res = mysqli_query($conn, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if (count($errors) === 0) {
        $status = "notverified";
        $code = rand(999999, 111111);
        $insert_data = "INSERT INTO admin_accounts (email, code, status) values('$email', '$code', '$status')";
        $data_check = mysqli_query($conn, $insert_data);
        if ($data_check) {
            $subject = "Your One-Time Password (OTP) for Verification for NIFTY SHOES account";
            $message = "To ensure the security of your account, we have generated a one-time password (OTP) for you to complete the authentication process. 
            Please find your OTP below:
            OTP: [$code]";
            // Create an instance of PHPMailer
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'papisssgg@gmail.com';
                $mail->Password = 'suqg vcti uwkk lpqz';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Sender and recipient settings
                $mail->setFrom('niftyshoes@gmail.com', 'Nifty Shoes');
                $mail->addAddress($email);

                // Email content
                $mail->isHTML(false);
                $mail->Subject = $subject;
                $mail->Body = $message;

                $mail->send();
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            } catch (Exception $e) {
                $errors['otp-error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
}


//if user click verification code submit button
if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM admin_accounts WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE admin_accounts SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($conn, $update_otp);
        if ($update_res) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: new-password.php');
            exit();
        } else {
            $errors['otp-error'] = "Failed while updating code!";
        }
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click login button
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $check_username = "SELECT * FROM admin_accounts WHERE username = '$username'";
    $res = mysqli_query($conn, $check_username);
    if (mysqli_num_rows($res) > 0) {

        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if (password_verify($password, $fetch_pass)) {
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if ($status == 'verified') {
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['logged_in'] = true;
                $_SESSION['id'] = $fetch['id'];
                $insert_logs = "INSERT INTO admin_log (username, timein, date)
                        values( '$username', CURRENT_TIME(), CURRENT_DATE())";
                $data_check = mysqli_query($conn, $insert_logs);
                header("location: ../dashboard/index.php");
            } else {
                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
            }
        } else {
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}

//if user click continue button in forgot password form
if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check_email = "SELECT * FROM admin_accounts WHERE email='$email'";
    $run_sql = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($run_sql) > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE admin_accounts SET code = $code WHERE email = '$email'";
        $run_query = mysqli_query($conn, $insert_code);
        if ($run_query) {
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Send using SMTP
                $mail->Host = 'smtp.gmail.com';               // Set the SMTP server to send through
                $mail->SMTPAuth = true;                           // Enable SMTP authentication
                $mail->Username = 'papisssgg@gmail.com';         // SMTP username
                $mail->Password = 'mnxc djee wiln kzje';         // SMTP password
                $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                           // TCP port to connect to

                //Recipients
                $mail->setFrom('niftyshoes@gmail.com', 'Nifty Shoes');
                $mail->addAddress($email);     // Add a recipient

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Password Reset Code';
                $mail->Body = 'Your password reset code is ' . $code;
                $mail->AltBody = 'Your password reset code is ' . $code;

                $mail->send();
                $info = "We've sent a password reset code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                exit();
            } catch (Exception $e) {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Something went wrong!";
        }
    } else {
        $errors['email'] = "This email address does not exist!";
    }
}

//if user click check reset otp button
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM admin_accounts WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $password_valid = true;

    if (strlen($password) < 10) {
        $errors['password'] = "Password requirements not fulfilled.";
        $password_valid = false;
    }

    if (!preg_match("/[A-Z]/", $password)) {
        $errors['password'] = "Password requirements not fulfilled.";
        $password_valid = false;
    }

    if (!preg_match("/[a-z]/", $password)) {
        $errors['password'] = "Password requirements not fulfilled.";
        $password_valid = false;
    }

    if (!preg_match("/[0-9]/", $password)) {
        $errors['password'] = "Password requirements not fulfilled.";
        $password_valid = false;
    }

    if (!preg_match("/[\W]/", $password)) {
        $errors['password'] = "Password requirements not fulfilled.";
        $password_valid = false;
    }

    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
        $password_valid = false;
    }

    if ($password_valid) {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE admin_accounts SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($conn, $update_pass);
        if ($run_query) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            $_SESSION['email'] = $email;
            header('Location: finish_profile.php');
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

//if user click finish submit button
if (isset($_POST['finish'])) {
    $_SESSION['info'] = "";
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_initial = mysqli_real_escape_string($conn, $_POST['middle_initial']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = $_SESSION['email']; // Added this line to avoid undefined index error
    $check_acc = "SELECT * FROM admin_accounts WHERE email = '$email'";
    $code_res = mysqli_query($conn, $check_acc);
    if (mysqli_num_rows($code_res) > 0) {

        $update_profile = "UPDATE admin_accounts SET first_name = '$first_name', middle_initial = '$middle_initial', last_name = '$last_name',
        username ='$username' WHERE email = '$email'";
        $update_res = mysqli_query($conn, $update_profile);
        if ($update_res) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: login_form.php');
            exit();
        } else {
            $errors['otp-error'] = "Failed while updating profile!";
        }
    } else {
        $errors['otp-error'] = "something went wrong";
    }
}

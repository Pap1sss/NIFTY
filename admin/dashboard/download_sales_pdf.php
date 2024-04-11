<?php
require_once "../controllerUserData.php";
require ('fpdf186/fpdf.php');
$username = $_SESSION['username'];
$current_date = date('Y-m-d');

if ($username != false) {
    $sql = "SELECT * FROM admin_accounts WHERE username =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    $username = mysqli_real_escape_string($conn, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $id, $email, $first_name, $middle_initial, $last_name, $username, $password, $code, $status);
        mysqli_stmt_fetch($stmt);
    } else {
        header('Location:../admin_creation/login_form.php');
    }
} else {
    header('Location:../admin_creation/login_form.php');
}


$stmt = $conn->prepare("SELECT * from upload");

// Execute the prepared statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Make sure that the form has been submitted
// Get the start and end dates from the form
        $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
        $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';

        // Check if the start and end dates are set
        if ($start_date && $end_date) {
            // Connect to the database


            // Prepare and bind
            $stmt = $conn->prepare("SELECT * FROM sales WHERE date_created BETWEEN? AND?");

            $stmt->bind_param("ss", $start_date, $end_date);


            // Execute statement
            $stmt->execute();

            // Bind result variables
            $stmt->bind_result($sales_id, $orders_id, $total_price, $date_created);

            // Create a new FPDF object
            $pdf = new FPDF();

            // Add a new page
            $pdf->AddPage();

            // Set the font and font size
            $pdf->SetFont('Arial', '', 12);

            // Add a title to the report
            $pdf->Cell(190, 10, 'NIFTYSHOES SALES REPORT', 0, 1, 'C');
            $pdf->Cell(190, 10, 'Contact #: 0' . $row["contact"], 0, 1, 'L');
            $pdf->Cell(190, 10, 'Email: ' . $row["email"], 0, 1, 'L');
            $pdf->Cell(190, 10, 'Address: ' . $row["address"], 0, 1, 'L');




            $pdf->Cell(190, 10, '', 0, 1, 'C');
            $pdf->Cell(190, 10, '', 0, 1, 'C');

            $pdf->Cell(190, 10, 'Sales Report for [' . $start_date . '] to [' . $end_date . ']', 0, 1, 'R');
            $pdf->Cell(190, 10, 'Printed by: ' . $username, 0, 1, 'L');



            // Set the color of the text to red
            $pdf->SetTextColor(255, 0, 0);

            // Add a cell with the date issued in red
            $pdf->Cell(190, 10, 'Date Issued: ' . $current_date, 0, 1, 'L');

            // Set the color of the text back to black
            $pdf->SetTextColor(0, 0, 0);



            $pdf->Cell(190, 10, '', 0, 1, 'C');





            // Add a table header
            $pdf->SetX((($pdf->GetPageWidth() - 100) / 2)); // Set the x-coordinate of the current position to center the table
            $pdf->Cell(20, 7, 'Order ID', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Total Price', 1, 0, 'C');
            $pdf->Cell(50, 7, 'Date', 1, 1, 'C');

            // Fetch the data and add it to the table
            while ($stmt->fetch()) {
                $pdf->SetX((($pdf->GetPageWidth() - 100) / 2)); // Set the x-coordinate of the current position to center the table
                $pdf->Cell(20, 6, $orders_id, 1, 0, 'C');
                $pdf->Cell(30, 6, '' . $total_price, 1, 0, 'C');
                $pdf->Cell(50, 6, $date_created, 1, 1, 'C');
            }

            $activity = 'Generate Sales Report from ' . $start_date. ' to ' .$end_date;
            $stmt = $conn->prepare("INSERT INTO admin_activity_log(username, date_log, time_log, action) VALUES(?, CURRENT_DATE(), CURRENT_TIME(),?)");
            $stmt->bind_param("ss", $username, $activity);
            $stmt->execute();


            mysqli_close($conn);

            // Output the PDF file
            $pdf->Output();
        } else {
            echo 'Start date and end date are required.';
        }
    }
}
?>
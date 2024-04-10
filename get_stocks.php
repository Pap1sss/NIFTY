<?php
// Get the selected size, color and id from the query string
$size = $_GET['size'] ?? '';
$color = $_GET['color'] ?? '';
$id= $_GET['id'] ?? '';

// Connect to the database
@include 'admin/admin_creation/config.php';

// Check the connection
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Query the database to get the remaining stocks
$query = "SELECT quantity FROM product_stocks WHERE unit = ? AND color = ? AND product_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('sss', $size, $color, $id);
$stmt->execute();
$result = $stmt->get_result();

// Get the remaining stocks
$remaining_stocks = $result->fetch_assoc()['quantity'] ?? 0;

// Close the statement and the connection
$stmt->close();
$conn->close();

// Output the remaining stocks
echo "$remaining_stocks";
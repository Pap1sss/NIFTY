<?php
// Get the selected size and color from the query string
$size = $_GET['size'] ?? '';
$color = $_GET['color'] ?? '';

// Connect to the database
@include 'admin/admin_creation/config.php';
// Check the connection
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Query the database to get the remaining stocks
$query = "SELECT quantity FROM product_stocks WHERE unit = ? AND color = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $size, $color);
$stmt->execute();
$result = $stmt->get_result();

// Get the remaining stocks
$remaining_stocks = $result->fetch_assoc()['quantity'] ?? 0;

// Close the statement and the connection
$stmt->close();
$conn->close();

// Output the remaining stocks
echo $remaining_stocks;
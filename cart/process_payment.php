<?php

// Your database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "uecs2094_website";

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// The user ID whose cart you want to retrieve
$userID = 1;

// Retrieve the shipping information
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Insert the shipping information into billing database table
$sql = "INSERT INTO billing (name, address, phone) VALUES ('$name', '$address', '$phone')";
mysqli_query($conn, $sql);

// Remove the items from the cart
$sql = "DELETE FROM cart WHERE userID = $userID";
mysqli_query($conn, $sql);

// Close the connection
mysqli_close($conn);

// Redirect the user to a confirmation page
header("Location: thank_you.php");

?>

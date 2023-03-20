<?php

$name = $_GET['name'];

// Connect to the MySQL database
$host = "localhost";
$username = "root";
$password = "";
$database = "mnnithub";

$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (mysqli_connect_errno()) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Query the database to retrieve the contacts data
$query = "SELECT * FROM $name";
$result = mysqli_query($conn, $query);

// Store the contacts data in an array
$contacts = array();
while ($row = mysqli_fetch_assoc($result)) {
  $contacts[] = $row;
}

// Output the contacts data in JSON format
header('Content-Type: application/json');
echo json_encode($contacts);

// Close the database connection
mysqli_close($conn);

// header("Location: index.html");
// exit();
?>

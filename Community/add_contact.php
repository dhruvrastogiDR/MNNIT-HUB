<?php

$name = $_GET['name'];
// Database connection information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mnnithub";

// Create a new database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data from the POST request
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Create a new SQL statement to insert the data into the database
$sql = "INSERT INTO $name (name, email, phone) VALUES ('$name', '$email', '$phone')";

// Execute the SQL statement and check if it was successful
if ($conn->query($sql) === TRUE) {
    echo "New contact added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

header("Location: index.html");
exit();

?>

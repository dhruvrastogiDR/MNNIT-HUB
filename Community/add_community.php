<?php
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
$email = $_POST['text'];

// Create a new SQL statement to insert the data into the database
$sql = "create table $name(id int, name varchar(50), email varchar(50), phone varchar(12)";


// Execute the SQL statement and check if it was successful
if ($conn->query($sql) === TRUE) {
    echo "New community created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

header("Location: main.html");
exit();

?>

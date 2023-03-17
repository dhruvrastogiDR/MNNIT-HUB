<?php
// database connection details
$host = "localhost";
$username = "your-username";
$password = "your-password";
$dbname = "your-dbname";

// establish connection
$conn = new mysqli($host, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // escape user inputs for security
  $full_name = $conn->real_escape_string($_POST["full-name"]);
  $quantity = $conn->real_escape_string($_POST["quantity"]);
  $phone_no = $conn->real_escape_string($_POST["phone-no"]);
  $email = $conn->real_escape_string($_POST["email"]);

  // prepare and execute SQL statement
  $sql = "INSERT INTO customer_details (full_name, quantity, phone_no, email) VALUES ('$full_name', '$quantity', '$phone_no', '$email')";
  if ($conn->query($sql) === TRUE) {
    echo "Order placed successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// close connection
$conn->close();
?>

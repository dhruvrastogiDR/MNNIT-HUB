<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve the values of the problem and solution inputs
	$problem = $_POST["problem"];
	$solution = $_POST["solution"];

    if(empty($problem))
    {
        echo "<script>alert(\"please enter the problem\");</script>";
    }

	// Connect to the MySQL database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mnnithub";
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check if the connection was successful
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Insert the problem into the database
	$sql = "INSERT INTO problems (problem, solution) VALUES ('$problem', '$solution')";
	if (mysqli_query($conn, $sql)) {
		echo "Problem added successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	// Close the database connection
	mysqli_close($conn);
    
    header("Location: problems.php");
    exit();
}
?>

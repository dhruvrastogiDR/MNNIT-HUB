<?php
// Database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'login';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch products from the database
$sql = "SELECT * FROM userse";
$result = $conn->query($sql);
$details_html = "";

// Fetch products and create HTML code for each product
$products_html = '';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $session_name = $_SESSION['username'];
    $username_html = $row['username'];
    $email_html = $row['email'];
    $state_html = $row['state'];
    $detail_html = "
    <section>
			<!-- <img src=alt=id=> -->
			<h2>$username_html</h2>
			<p> <h5> EMAIL: </h5> $email_html </p>
			<p>Location: $state_html</p>
			<p>About Me: I'm a student persuing BTECH at MNNIT ALLLAHABAD.</p>
		</section>
    ";
    if($session_name==$username_html)
    {
        $details_html .= $detail_html;
        break;
    }
  }
}

echo $details_html;

// Close database connection
$conn->close();
?>

<?php
// connect to the database
$db_host = 'localhost'; // your database host
$db_user = 'root'; // your database username
$db_pass = ''; // your database password
$db_name = 'lost_found'; // your database name
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Failed to connect to database: ' . mysqli_connect_error());
}

// get the form data
$name = mysqli_real_escape_string($conn, $_POST['name']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$image = $_FILES['image']['name'];
$tmp_image = $_FILES['image']['tmp_name'];

// check if an image was uploaded
if (empty($image)) {
    die('You must upload an image of the lost item.');
}

// move the uploaded image to a folder on the server
$upload_dir = 'uploads/';
$target_file = $upload_dir . basename($image);
if (!move_uploaded_file($tmp_image, $target_file)) {
    die('Failed to upload image.');
}

// insert the data into the database
$sql = "INSERT INTO lost_items (name, location, image) VALUES ('$name', '$location', '$target_file')";
if (mysqli_query($conn, $sql)) {
    echo 'Item report submitted successfully.';
} else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
}

// close the database connection
mysqli_close($conn);
?>

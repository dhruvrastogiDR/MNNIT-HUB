<?php
// Initialize the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buyandsell";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Get the form data
  $object_name = $_POST["object-name"];
  $object_description = $_POST["object-description"];
  $object_price = $_POST["object-price"];
  
  // Check if an image was uploaded
  if (isset($_FILES["object-img"]) && $_FILES["object-img"]["error"] == 0) {
    
    // Get the uploaded image details
    $image_name = $_FILES["object-img"]["name"];
    $image_tmp_name = $_FILES["object-img"]["tmp_name"];
    $image_size = $_FILES["object-img"]["size"];
    $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
    
    // Check if the image is a valid type and size
    $allowed_types = array("jpg", "jpeg", "png", "gif");
    $max_size = 5000000; // 5MB
    
    if (in_array($image_ext, $allowed_types) && $image_size <= $max_size) {
      
      // Generate a unique name for the image
      $image_new_name = $object_name . "_img." . $image_ext;
      
      // Set the destination folder for the image
      $destination_folder = "uploads/";
      
      // Move the uploaded image to the destination folder
      if (move_uploaded_file($image_tmp_name, $destination_folder . $image_new_name)) {
        
        // Save the image destination in the database table
        $sql = "INSERT INTO products (name, description, price, image) VALUES ('$object_name', '$object_description', '$object_price', '$destination_folder$image_new_name')";
        
        if ($conn->query($sql) === TRUE) {
          echo "Object added successfully.";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
      } else {
        echo "Error uploading image.";
      }
      
    } else {
      echo "Invalid image type or size.";
    }
    
  } else {
    // Save the object data without an image
    $sql = "INSERT INTO products (name, description, price) VALUES ('$object_name', '$object_description', '$object_price')";
        
    if ($conn->query($sql) === TRUE) {
      echo "Object added successfully.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  
}

$conn->close();

header("Location: index1.html");
exit();

?>

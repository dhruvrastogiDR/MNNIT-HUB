<?php
// Database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'buyandsell';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Fetch products and create HTML code for each product
$products_html = '';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $product_price = $row['price'];
    $product_name = $row['name'];
    $product_image = $row['image'];
    $product_description = $row['description'];
    $product_html = "
    <div class='product'>
    <div class='card' style='width: 18rem;'>
  <img src='$product_image' class='card-img-top' alt='$product_name'>
  <div class='card-body'>
    <h5 class='card-title'>$product_price</h5>
    <p class='card-text'>$product_name</p>
    <div class='button'>
          <button class='buy-now' onclick='window.location.href=\"BUY.html\"'>Buy Now</button>
          <button class='info' onclick='window.location.href=\"ProdInfo.html\"'>INFO</button>
        </div>
  </div>
</div>
</div>
    ";
    $products_html .= $product_html;
  }
}

// Close database connection
$conn->close();
?>

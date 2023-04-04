<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "game store";

// Créez une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['add'])) {
    $product_id = $_GET['add'];
    $query = "SELECT * FROM games WHERE appid='$product_id'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $product_title = $row['name'];
        $product_price = $row['price'];
        $query = "INSERT INTO cart (product_id, product_title, product_price, quantity) VALUES ('$product_id', '$product_title', '$product_price', 1)";
        if(mysqli_query($conn, $query)) {
          header('Location: index.php?success=Product added to the cart!');
        }
      }
    }
  }

  
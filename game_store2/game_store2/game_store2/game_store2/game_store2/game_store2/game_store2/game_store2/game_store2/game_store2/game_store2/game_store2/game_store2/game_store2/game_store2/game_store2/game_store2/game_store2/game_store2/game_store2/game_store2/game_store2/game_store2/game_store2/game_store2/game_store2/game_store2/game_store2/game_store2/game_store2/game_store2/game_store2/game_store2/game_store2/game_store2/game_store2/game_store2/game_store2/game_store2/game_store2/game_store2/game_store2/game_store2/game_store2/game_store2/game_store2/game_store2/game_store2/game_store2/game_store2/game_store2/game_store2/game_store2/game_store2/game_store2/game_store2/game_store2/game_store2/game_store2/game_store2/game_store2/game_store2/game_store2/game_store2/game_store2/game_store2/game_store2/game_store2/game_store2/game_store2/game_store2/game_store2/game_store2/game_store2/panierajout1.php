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

$query = "SELECT * FROM cart";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <!-- Ajoutez vos liens CSS ici -->
</head>
<body>
    <h1>Your Cart</h1>
    <table>
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Quantity</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['product_title'] . "</td>";
                echo "<td>" . $row['product_price'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No products in the cart</td></tr>";
        }
        ?>
    </table>
</body>
</html>

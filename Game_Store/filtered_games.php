<?php
include 'fonctionConnexion.php';
$conn = connDB();

$genre = isset($_GET['genre']) ? $_GET['genre'] : '';
$developer = isset($_GET['developer']) ? $_GET['developer'] : '';
$price = isset($_GET['price']) ? (float)$_GET['price'] : 0;

$rqt = $conn->prepare("SELECT * FROM games WHERE genres LIKE :genre AND developer LIKE :developer AND price <= :price");
$rqt->execute([
    ':genre' => '%' . $genre . '%',
    ':developer' => '%' . $developer . '%',
    ':price' => $price,
]);
$filtered_games = $rqt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtered Games</title>
    <link rel="stylesheet" href="StyleGame_Store.css">
</head>
<body>
    <div class="filtered-games-container">
        <section>
            <h2>Jeux filtrés</h2>
            <?php foreach ($filtered_games as $game): ?>
                <div class="game-card">
                    <h3><?php echo $game['name']; ?></h3>
                    <p>Date de sortie : <?php echo $game['release_date']; ?></p>
                    <p>Développeur : <?php echo $game['developer']; ?></p>
                    <p>Éditeur : <?php echo $game['publisher']; ?></p>
                    <p>Genres : <?php echo $game['genres']; ?></p>
                    <p>Prix : <?php echo $game['price']; ?> €</p>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
</body>
</html>

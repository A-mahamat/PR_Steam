<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveautés</title>
    <link rel="stylesheet" href="StyleGame_Store.css">
</head>
<body>
<div class="new-games-container">
    <h2>Nouveautés</h2>
    <?php
    include 'fonctionConnexion.php';
    $conn = connDB();

    $rqt = $conn->prepare("SELECT * FROM games ORDER BY release_date DESC LIMIT 5");
    $rqt->execute(array());
    $new_games = $rqt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($new_games as $game): ?>
        <div class="game-card">
            <h3><?php echo htmlspecialchars($game['name']); ?></h3>
            <p>Date de sortie : <?php echo htmlspecialchars($game['release_date']); ?></p>
            <p>Développeur : <?php echo htmlspecialchars($game['developer']); ?></p>
            <p>Éditeur : <?php echo htmlspecialchars($game['publisher']); ?></p>
            <p>Genres : <?php echo htmlspecialchars($game['genres']); ?></p>
            <p>Prix : <?php echo htmlspecialchars($game['price']); ?> €</p>
            <p><a href="forum.php?game_id=<?php echo $game['appid']; ?>">Forum du jeu</a></p>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>

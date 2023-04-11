<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recommandations</title>
</head>
<body>
    <h1>Recommandations de jeux</h1>

    <?php
    include "frecommandation.php";
    // Remplacer cette ligne par le code pour récupérer l'ID utilisateur actuel
    $user_id = 1;
    $recommandations = recupererRecommandations($user_id);

    if (count($recommandations) > 0) {
        echo "<ul>";
        foreach ($recommandations as $jeu) {
            echo "<li>" . $jeu['titre'] . " - Genre: " . $jeu['genre'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucune recommandation pour le moment.</p>";
    }
    ?>
</body>
</html>


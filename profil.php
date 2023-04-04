<?php
// Démarrez la session
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger l'utilisateur vers la page de connexion
    header("Location: login.php");
    exit();
}

// Récupérer l'ID de l'utilisateur à partir de la variable de session
$user_id = $_SESSION['user_id'];

// Générer des recommandations pour l'utilisateur actuel
$recommendations = getRecommendations($user_id, $ratings);


echo "Recommandations pour l'utilisateur " . $user_id . " :<br>";
foreach ($recommendations as $gameId => $averageRating) {
    echo "Jeu ID : " . $gameId . ", note moyenne : " . $averageRating . "<br>";
}

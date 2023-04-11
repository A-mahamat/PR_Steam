<?php
// Activer les erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "game store";
$user_id = 1; // ID de l'utilisateur pour lequel vous souhaitez générer des recommandations

// Créez une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête pour récupérer les jeux non notés par l'utilisateur
$sql = "SELECT games.appid AS game_id, games.name AS title, games.genres AS genre
        FROM games
        WHERE games.appid NOT IN (
            SELECT interets_utilisateurs.id
            FROM interets_utilisateurs
            WHERE interets_utilisateurs.user_id = " . $user_id . "
        )";

$result = $conn->query($sql);

if (!$result) {
    die("Erreur lors de l'exécution de la requête: " . $conn->error);
}

$unratedGames = [];
while($row = $result->fetch_assoc()) {
    $gameId = $row["game_id"];
    $title = $row["title"];
    $genre = $row["genre"];

    if (!isset($unratedGames[$genre])) {
        $unratedGames[$genre] = [];
    }
    $unratedGames[$genre][] = ["id" => $gameId, "title" => $title];
}

// Requête pour récupérer les genres préférés de l'utilisateur
$sql = "SELECT interets_utilisateurs.genre, COUNT(interets_utilisateurs.genre) AS genre_count
        FROM interets_utilisateurs
        WHERE interets_utilisateurs.user_id = " . $user_id . "
        GROUP BY interets_utilisateurs.genre";

$result = $conn->query($sql);

if (!$result) {
    die("Erreur lors de l'exécution de la requête: " . $conn->error);
}

$genres = [];
while($row = $result->fetch_assoc()) {
    $genre = $row["genre"];
    $genreCount = $row["genre_count"];

    $genres[$user_id][$genre] = $genreCount;
}

// Fermer la connexion
$conn->close();

// Initialiser un tableau vide si aucun genre n'est trouvé
if (!$genres) {
    $genres = [];
}

function recommendGames($unratedGames, $genres, $user_id, $limit = 10) {
    $recommendations = [];

    // Vérifier si l'utilisateur a des genres préférés
    if (isset($genres[$user_id])) {

    // Parcourir les genres préférés de l'utilisateur
    foreach ($genres[$user_id] as $genre => $count) {
        // Vérifier si le genre existe dans les jeux non notés
        if (isset($unratedGames[$genre])) {
            // Ajouter les jeux de ce genre aux recommandations
            foreach ($unratedGames[$genre] as $game) {
                $recommendations[] = $game;
            }
            // Supprimer le genre des jeux non notés pour éviter les doublons
            unset($unratedGames[$genre]);
        }
    }
}

    // Ajouter les jeux restants non notés aux recommandations
    foreach ($unratedGames as $genre => $games) {
       
        foreach ($games as $game) {
            $recommendations[] = $game;
        }
    }

    // Limiter le nombre de recommandations
    return array_slice($recommendations, 0, $limit);
}

// Générer les recommandations
$recommendations = recommendGames($unratedGames, $genres, $user_id);

// Afficher les recommandations
echo "<h2>Recommandations pour l'utilisateur " . $user_id . " :</h2>";
echo "<ol>";
foreach ($recommendations as $game) {
    echo "<li>" . htmlspecialchars($game["title"]) . " (ID: " . $game["id"] . ")</li>";
}
echo "</ol>";

?>

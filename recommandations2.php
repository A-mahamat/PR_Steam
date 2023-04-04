<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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

$conn->close();

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

$conn->close();


if (!$genres) {
    $genres = [];
}





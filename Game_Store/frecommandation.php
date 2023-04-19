<?php
function recupererRecommandations($user_id) {
    include "fonctionConnexion.php";
    $conn = connDB();
    // Modifiez la requête SQL pour utiliser la table "games" et la colonne "genres"
    $sql = "SELECT DISTINCT * FROM games JOIN interets_utilisateurs ON games.genres = interets_utilisateurs.genre WHERE interets_utilisateurs.user_id = :user_id";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        return []; // Ajoutez cette ligne pour renvoyer un tableau vide en cas d'erreur
    }
}

?>


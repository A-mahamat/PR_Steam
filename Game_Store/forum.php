<?php
include 'fonctionConnexion.php';
$conn = connDB();

$game_id = isset($_GET['game_id']) ? $_GET['game_id'] : 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $comment = $_POST['comment'];

    $rqt = $conn->prepare("INSERT INTO comments (game_id, username, comment) VALUES (?, ?, ?)");
    $rqt->execute(array($game_id, $username, $comment));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="StyleGame_Store.css">
</head>
<body>
    <h1>Forum</h1>

    <form action="forum.php?game_id=<?php echo $game_id; ?>" method="POST">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="comment">Commentaire :</label>
        <textarea name="comment" id="comment" required></textarea>
        <br>
        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
        <button type="submit">Envoyer</button>
    </form>

    <h2>Commentaires</h2>
    <?php
    $rqt = $conn->prepare("SELECT * FROM comments WHERE game_id = ? ORDER BY created_at DESC");
    $rqt->execute(array($game_id));
    $comments = $rqt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($comments as $comment) {
        echo '<div class="comment">';
        echo '<p class="comment-text"><strong>' . $comment['username'] . '</strong> - ' . $comment['created_at'] . '</p>';
        echo '<p class="comment-text">' . $comment['comment'] . '</p>';
        echo '</div>';
    }
    ?>
</body>
</html>
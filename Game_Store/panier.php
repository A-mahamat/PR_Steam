<?php
session_start();

// Inclure la connexion à la base de données
include 'fonctionConnexion.php';
$conn = connDB();

// Récupérer l'ID de l'utilisateur actuel à partir de la session
$id_utilisateur = $_SESSION['client'][0][0];

// Récupérer les données du panier pour l'utilisateur actuel
$rqt = $conn->prepare("SELECT p.id_jeu, g.name, COUNT(p.id_jeu) AS quantity, p.prix FROM panier p JOIN games g ON p.id_jeu = g.appid WHERE p.id_utilisateur = ? GROUP BY p.id_jeu, g.name, p.prix");
$rqt->execute([$id_utilisateur]);
$cart_items = $rqt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .container {
            margin-top: 30px;
        }

        .table-responsive {
            margin-top: 30px;
        }

        .total {
            font-weight: bold;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
       
    <input name="action" onclick="history.back()" type="submit" value="Revenir sur la page d'accueil" />
    <h1>Votre panier</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom du jeu</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($cart_items as $item) {
                        $item_total = $item['quantity'] * $item['prix'];
                        $total += $item_total;

                        echo "<tr>";
                        echo "<td>{$item['id_jeu']}</td>";
                        echo "<td>{$item['name']}</td>";
                        echo "<td>{$item['quantity']}</td>";
                        echo "<td>{$item['prix']} €</td>";
                        echo "<td>{$item_total} €</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="total">
            Total: <?php echo $total; ?> €
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>

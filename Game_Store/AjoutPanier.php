<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>panier</title>

    <style >
        
        
        img{
            margin-right: 41%;
            margin-left: 43%;
            margin-top: 20%;
            width: 100px;
            height: 100px;

        }
    </style>
</head>
<body>
    <?php 

    //inclure la connexion
    include 'fonctionConnexion.php';
    $conn=connDB();

    //fonction d'ajout
    function AjoutPanier($conn,$id_utilisateur,$id_jeu,$prix){

        $rqt=$conn->prepare("Insert Into panier (id_utilisateur,id_jeu,prix) Values(?,?,?)");
        $rqt->execute(array($id_utilisateur,$id_jeu,$prix));

        
        
         //Afficher l'image de chargement 
        echo"<img id='loading-image' src='../Images/Spinner.gif' alt='Loading...'>";

        //Script JavaScript pour masquer l'image après un certain délai 
        echo "<script>
        // Attendre 3 secondes avant de masquer l'image
        setTimeout(function() {
            // Cacher l'image de chargement
            document.getElementById('loading-image').style.display = 'none';
            // Afficher le message de confirmation
            document.write('<h3 style=\'background-color: green; margin-right: 42%; margin-left: 40%; margin-top: 20%;\'>Article ajouté avec succès </h3>');
            }, 3000); // 3000 ms = 3 secondes
        </script>";

        echo "<meta http-equiv='refresh' content='5; url=Index0.php'>";
    }
    //verifier si la varaible de session qui contient l'article à ajuter au panier est bien crée 

    if (isset($_SESSION['Article']))  {

        $id_jeu=$_SESSION['Article'][0][0];
        $prix=$_SESSION['Article'][0][5];
        $id_utilisateur=$_SESSION['client'][0][0];

        //appel de la focntion pour ajouter à la table
        AjoutPanier($conn,$id_utilisateur,$id_jeu,$prix);
        
    }

    ?>

    
</body>
</html>

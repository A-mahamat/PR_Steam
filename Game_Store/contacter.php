<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>contacter</title>
		<?php include /* insérer nom du fichier de la base de donnée */ ?>
	</head>
	<body>
		<?php
			// vérification de saisie des données
			if(isset($_POST["nom"], $_POST["email"], $_POST["sujet"], $_POST["message"]) && 
				!empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["sujet"]) && !empty($_POST["message"])) {
				
				// récupération des données du formulaire
				$nom = $_POST["nom"];
				$email = $_POST["email"];
				$sujet = $_POST["sujet"];
				$message = $_POST["message"];
				
				// ajout dans la base de données
				$bdd = /* insérer fonction d'accès à la base de données */;
				$sql = "INSERT INTO " /*ajouter nom table*/ "(nom, email, sujet, message) VALUES ('$nom', '$email', '$sujet', '$message')";
				if (mysqli_query($bdd, $sql)) {
					echo "Message sent successfully";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
				}
			}
			else{
				echo "Au moins un champ n'a pas été rempli";
			}
		?>
	</body>
</html>
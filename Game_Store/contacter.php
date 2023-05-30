<?php 
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>contacter</title>
		<?php 
		//importer le fichier qui contient la connexion à la bd
		include 'fonctionConnexion.php';
		//appeler la focntion de la connexion 
		$conn=connDB();
		?>
	</head>
	<body>
		<?php
		
		//envoi du mail
		
		
		//fonction d'enregistrement 

		function EnregisterMessage($conn,$nom, $email, $sujet, $message, $id_User){

			try{
				$rqt=$conn->prepare("Insert Into contacte (Nom,mail,Sujet,Message,id_User) Values(?,?,?,?,?)");

				$rqt->execute(array($nom, $email, $sujet, $message, $id_User));

				echo "Nous avons bien reçu votre message";
				
			}catch(PDOException $e){

				echo "erreur".' '.$e->getMessage();
			}
		}

		//verifier s'il est connecté  
		if (isset($_SESSION['client'])) {

			$id_User=$_SESSION['client'][0][0];

			// vérification de saisie des données
			if(isset($_POST["nom"], $_POST["email"], $_POST["sujet"], $_POST["message"]) && 
				!empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["sujet"]) && !empty($_POST["message"])) {
				
				// récupération des données du formulaire
				$nom = $_POST["nom"];
				$email = $_POST["email"];
				$sujet = $_POST["sujet"];
				$message = $_POST["message"];
				
				// envoie de la confirmation au client
				$header = "MIME_Version: 1.08\r\n";
				$header .= "From: 'Contact Game Store'<gamestore.miashs@gmail.com"."\n";
				$header .= "Content-Type:text/html; charset='utf-8'"."\n";
				$header .= "Content-Transfer-Encoding: 8bit";
				
				mail($email,"Contact Game Store","Votre demande à propos du Game Store a bien été prise en compte, merci de patienter le temps que nous la traitions", $header);
				
				// envoi aux gestionnaires du site
				
				mail("nestor.martin.raphael@gmail.com","Contact Game Store","Votre demande à propos du Game Store a bien été prise en compte, merci de patienter le temps que nous la traitions", $header);


				EnregisterMessage($conn,$nom, $email, $sujet, $message, $id_User);

				echo "<meta http-equiv='refresh' content='2; url=Index0.php'>";	
				
			}else{
				echo "<p  > il faut remplir tous les champs</p>";
				echo "<meta http-equiv='refresh' content='3; url=FormulaireContact.php'>";
			}
		}
		else{
			echo "<p > Veuillez-vous connecter s'il vous plaît !</p>";
			echo "<meta http-equiv='refresh' content='2; url=Index0.php'>";
		}
		?>
	</body>
</html>
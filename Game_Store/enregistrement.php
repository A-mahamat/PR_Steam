<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>enregistrement.</title>
</head>
<body>

	<?php

	//fonction de l'import du fuchier de la connexion et exécution de la rqt

	function enregistrerUser($nom,$prenom,$date_de_naissance,$password,$email){

         //import et connexion
		include "fonctionConnexion.php";
		$conn=connDB();

		//reqt pour enregistrer dans la table utilisateur de la base de donnée
         try{

         	$rqt=$conn->prepare("Insert Into utilisateur (nom,prenom,date_de_naissance,password,email) Values(?,?,?,?,?)");
		
		    //exécution de la rqt
         	$rqt->execute(array($nom, $prenom, $date_de_naissance, $password, $email));
         	echo "Inscription Reussie !<br>";

         }catch(PDOException $e){

         	if ($e->getcode()==23000) {
         		
         		echo "utilisateur existe déjà, veuillez vous connecter<br>";
         		echo "<meta http-equiv='refresh' content='3; url=FormulaireConnexionUser.php'>";
         	}
         	else{
         		echo "erreur"." ".$e->getcode();
         	}
         }
		






	}

	
	//recup des valeur du formulaire

	// && isset($_POST['date_de_naissance'])

	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['date_de_naissance']) && isset($_POST['password']) && isset($_POST['password_confirm'])) {

		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$date_de_naissance=$_POST['date_de_naissance'];
		//vérification de l'egalité de mot de passes
		if ($_POST['password']==$_POST['password_confirm']) {


			$password=$_POST['password'];
			enregistrerUser($nom,$prenom,$date_de_naissance,$password,$email);


			

			echo "<meta http-equiv='refresh' content='3; url=FormulaireConnexionUser.php'>";
		}
		else{

			echo "Le mot de passe de vérification est incorrect. Veuillez réessayer !";
			echo "<meta http-equiv='refresh' content='3; url=InscriptionUtilisateur.php'>";
		}
	}

	else{
		echo "vous devez saisir tous les champs";

		echo "<meta http-equiv='refresh' content='3; url=InscriptionUtilisateur.php'>";
		}
	

	




	?>

</body>
</html>
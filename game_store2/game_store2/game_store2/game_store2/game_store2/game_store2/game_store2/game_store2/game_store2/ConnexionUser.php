<?php
session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ConnexionUser</title>
</head>

<body>

	<?php 

	//fonction pour connexion à la BD et les requêts 

	function RecuperationUser($nom,$password){

		include 'fonctionConnexion.php';

		//recup de la connexion

		$conn=connDB();

		//creationde la rqt

		$rqt=$conn->prepare("SELECT * FROM utilisateur where nom=? and password=?");

		//exécution de la rqt

		$rqt->execute(array($nom,$password));

		return $rqt;
			



	}


	//recuperation des ID de la connexion


	if (isset($_POST['nom']) && isset($_POST['password'])) {

		$nom=$_POST['nom'];
		$password=$_POST['password'];


		//appel de la fonction 

		$resultat=RecuperationUser($nom,$password);
        
        // verifions si le user existe dans la base de donnée
		if ($resultat->rowCount() > 0) {

			$lignes=$resultat->fetchAll();

			//creation d'une varaible de session client

			$_SESSION['client']=array()	;

			foreach($lignes as $ligne){


				$client=array($ligne["id_utilisateur"],$ligne["nom"],$ligne["prenom"],$ligne['date_de_naissance'],$ligne["password"],$ligne["email"]);

				$_SESSION['client'][]=$client;

				
			}



			echo "connexion...";

            //si connexion reussie, on envoie le user à la page Index0 
			echo "<meta http-equiv='refresh' content='3; url=Index0.php'>";
		
			
		}

		//si le formulaire est bien rempli mais que le User n'existe pas dans la base de donnée

		else{

			echo " Mauvais identifiant / mot de passe.";
			echo "<meta http-equiv='refresh' content='3; url=FormulaireConnexionUser.php'>";
		}

		


	}


	//si le formaulaire n'est pas bien remplis 

	else{

		echo "il faut saisir tout les champs";
		echo "<meta http-equiv='refresh' content='3; url=FormulaireConnexionUser.php'>";
		}
	






	?>

</body>
</html>
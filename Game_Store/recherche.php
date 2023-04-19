<?php
session_start();

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>recherche</title>
</head>

<body>

	<?php

	//fonction pour preparer la requête pour la recherche des produit 

	function recherccheJeux($recherche){

		include 'fonctionConnexion.php';
		//creation de la conexion

		$conn=connDB();

		//preparation de la rqt

		$rqt=$conn->prepare("SELECT * FROM   games where   name LIKE ? OR developer LIKE ? OR platforms LIKE ? limit 40  ");

		//exécution de la requête

		$rqt->execute(array('%'.$recherche.'%','%'.$recherche.'%','%'.$recherche.'%'));

		return $rqt;


	}




	//recuperation des valeur de la recherche 

	if (isset($_POST['recherche'])) {

		$recherche=$_POST['recherche'];

		//appel de la fonction 
		
	

		$resultat=recherccheJeux($recherche);
        
        //verification s'l y a au moins un jeux qui répond aux critères de la recherche
		if ($resultat->rowCount()>0) {
			

			//creation d'une varaible de session

			$_SESSION['jeux']=array();

			//une boucle pour rajouter les jeux recuperés 


			while($ligne=$resultat->fetch()){

				// echo $ligne['name']." ".$ligne['developer']." ".$ligne['platforms']." ".$ligne['url_image']."<br>";

				$jeux=array($ligne['appid'],$ligne['name'],$ligne['release_date'],$ligne['developer'],$ligne['platforms'],$ligne['price'],$ligne['url_image']);

			$_SESSION['jeux'][]=$jeux;




			}
			echo "<meta http-equiv='refresh' content='0; url=Index0.php'>";


			



		}
		else{

			echo "auncun resultat";

		echo "<meta http-equiv='refresh' content='3; url=Index0.php'>";
		}



	}
	else{

		echo "auncun resultat proble variable";

		echo "<meta http-equiv='refresh' content='3; url=Index0.php'>";
	}




	 ?>

</body>
</html>







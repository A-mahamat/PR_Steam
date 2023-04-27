<?php   session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- lien du fichier de style  -->
	<link rel="stylesheet" type="text/css" href="StyleGame_Store.css">
	<!-- lien bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Article</title>

	<style >
		.container {
	width: 60%; 
      padding: 20px;
}
/*style de la carte de l'article*/



.ligne{
	background-color: #2F4F4F;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
	margin-left: 20%;
	margin-right: 20%;
}
.taille-Article-carte {
	height: 100%;
	width: 100%;
}
.card-img-top{
	height: 400px;
	width: 400px
}
.taille-Article-carte a{
	text-decoration: none;
}


/*style des etoiles */



.star-rating {
  display: flex;
  flex-direction: row-reverse;
  margin-right: 90px;
}


.star-rating input {
	display: none;
}

.star-rating label {
	color: lightgray;
	font-size: 30px;
	padding: 0;
	cursor: pointer;

}
.star-rating input:checked ~ label {
	color: gold;
}
	</style>

	
</head>
<body class='corps_id0' >
	<nav class="barN  bg-dark text-light navbar-fixed-top  navbar navbar-expand-md mb-5 ">
		

     <div class="multi_choix collapse navbar-collapse" id="NavbarMenu"> 
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="mb-3 mx-3 nav-link" href="../Index0.php"> Accueil</a></li>
          </ul>
     </div>
     <!-- logo du site -->
     <div class="logo">
        <span>G</span>
        <span>A</span>
        <span>M</span>
        <span>E</span>
        <span> </span>
        <span>S</span>
        <span>T</span>
        <span>O</span>
        <span>R</span>
        <span>E</span>
      </div>

  </nav>

	<?php

	    //recuperez l'id dispo dans l'url
	   $id=$_GET['id_art'];
	   include 'fonctionConnexion.php';
	   //connexion
	   $conn=connDB();
	   //fonction pour recuperer les infos de l'articel courant
	   function RecuperationInfosArticles($conn,$id){

	

		//creationde la rqt

		$rqt=$conn->prepare("SELECT * FROM games where appid=?");

		//exécution de la rqt

		$rqt->execute(array($id));

		return $rqt;
			



	}

	//fonction pour recuperer la valeur max des evaluation
	function RecuperationEvaluationMax($conn){


		$rqt=$conn->prepare("SELECT MAX(positive_ratings) FROM games");

		$rqt->execute();

		return $rqt;
		}
    //fonction pour recuperer la valeur min des evaluation

	function RecuperationEvaluationMin($conn){

	

		//creationde la rqt

		$rqt=$conn->prepare("SELECT Min(positive_ratings) FROM games");

		
    //exécution
		$rqt->execute();

		return $rqt;
		}	
    




   //fonction pour ajouter l'article au panier 
	function AjoutPanier($conn,$id_utilisateur,$id_jeu,$prix){
		


		$rqt=$conn->prepare("Insert Into panier (id_utilisateur,id_jeu,prix) Values(?,?,?)");
		$rqt->execute(array($id_utilisateur,$id_jeu,$prix));

		

		


	}


	

	

   //appel de la fonction pour recuperer les infos de l'article à afficher
	$resultat=RecuperationInfosArticles($conn,$id);
        
        //verification s'l y a au moins un jeux qui répond aux critères de la recherche
		if ($resultat->rowCount()>0) {
			

			//creation d'une varaible de session pour la recuperer dans la page AjoutPanier

			$_SESSION['Article']=array();

			//rajouter le jeux recuperés 


			$ligne=$resultat->fetch();
			$Article=array($ligne['appid'],$ligne['name'],$ligne['release_date'],$ligne['developer'],$ligne['platforms'],$ligne['price'],$ligne['url_image']);

			$_SESSION['Article'][]=$Article;
			


			



           
			
				
				
			

			

			
			//afficher l'article recuperé 
		

			echo "<div class=' ligne row '>
			        <div class='col-md-8 col-sm-6 col-xs-12'>
			          <div class='taille-Article-carte  '>
			            <img src='" . $ligne['url_image'] . "' class='card-img-top' alt='Image produit 1' >
			          </div>
			        </div>
			        <div class='carte-infos col-md-4 col-sm-6 col-xs-12'>
			          <div class='taille-Article-carte  '>
			          	<p class='card-text mb-4 mt-5'>Nom :<a href=#>" . $ligne['name'] . "</a></p>
			            <h5 class='card-title mb-4'>Prix :<a href=#>" . $ligne['price'] . " € </a></h5>
			            <p class='card-title mb-4'>Date de sortie:<a href=#> " . $ligne['release_date'] . "</a></p>
			            <p class='card-title mb-4'>Edition: <a href=#>" . $ligne['developer'] . "</a></p>
			            <p class='card-title mb-4'>platforms: <a href=#>" . $ligne['platforms'] . "</a></p>";

			            if (isset($_SESSION["client"])) {
			            	 $id_user=$_SESSION['client'][0][0];
			            	 $id_jeu=$ligne['appid'];
			            	 $prix_jeu=$ligne['price'];
			            	 $connexion=$conn;
			            	 
			            	
			            	
			            	//bouton d'ajout

			            	echo "<a href='AjoutPanier.php'><button class='btn btn-primary mt-3'>Ajouter au panier</button></a>";

			            	

			            	


							//affichage d'evaluation liée à l'article

							$resultatMin= RecuperationEvaluationMin($conn);
							$resultatMax= RecuperationEvaluationMax($conn);
							$min=$resultatMin->fetch();
							$Max=$resultatMax->fetch();
							

							

               //recuperer l'evaluation positive existante
							$note = $ligne['positive_ratings']; 
							//recuperer l'evaluation max 
							$note_max =  $Max[0];
							//recuperer l'evaluation max 
							$note_min = $min[0];

							// normaliser la note 
							$etoiles_remplies = round(($note - $note_min) / ($note_max - $note_min) * 5);
							
							
							// remplir les etoile
							echo "<div class='star-rating'>";
							for ($i = 5; $i >= 1; $i--) {
							    if ($i >= $etoiles_remplies) {
							        echo '<input type="radio" id="' . $i . '-stars" name="rating" value="' . $i . '" checked disabled /><label for="' . $i . '-stars">★</label>';
							    } else {
							        echo '<input type="radio" id="' . $i . '-stars" name="rating" value="' . $i . '" disabled /><label for="' . $i . '-stars">★</label>';
							    }
							}
							echo "</div>";


			            	


			            	



			            	
			            }
			            //si le user n'est pas conecté, il ne pourra pas ajouter des articles au panier
			            else{
			            	echo "<p><a href='FormulaireConnexionUser.php'>conntectez-vous pour ajouter le jeu au panier</a></p>";
			            }


			            
			            
			            
			          "</div>
			        </div>
			      </div>";
			      

                }

                
                
	?>


</body>
</html>
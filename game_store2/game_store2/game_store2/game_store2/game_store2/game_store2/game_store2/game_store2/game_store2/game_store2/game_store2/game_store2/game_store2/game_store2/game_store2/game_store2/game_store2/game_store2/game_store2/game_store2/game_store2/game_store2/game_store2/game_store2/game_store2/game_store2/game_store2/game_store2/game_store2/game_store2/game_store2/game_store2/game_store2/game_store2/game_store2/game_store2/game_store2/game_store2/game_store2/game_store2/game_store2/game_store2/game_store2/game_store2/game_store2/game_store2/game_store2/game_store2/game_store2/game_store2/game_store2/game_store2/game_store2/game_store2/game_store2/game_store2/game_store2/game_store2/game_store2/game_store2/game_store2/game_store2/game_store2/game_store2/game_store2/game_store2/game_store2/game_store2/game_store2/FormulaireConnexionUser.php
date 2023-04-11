<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="StyleGame_Store.css"> 
	<title>connexionUser</title>

	<style type="text/css">
		body{
			background-image: url("Images/combat.jpg");
		}
		.barN{
			background-color: gray;}
		h3{
			font-weight: 600;}
		.nomChamps{
			font-weight: 600;
		}
	</style>
	
</head>

<body class="corps_ForConnexion">

	<!-- Barre de navigation -->
	<nav class="bg-light barN navbar-fixed-top navbar navbar-expand-md mb-5 ">
		<!-- lien pr retourner le User vers la page d'accueil -->
		<a class="mb-3 mx-3" href="Index0.php"> Accueil</a>
		<!-- lien pour renvoyer le User vers vers la page connexion -->
		<a class="mb-3 mx-3" href="InscriptionUtilisateur.php">  Inscription</a>
	</nav>

	<!-- Formulaire d'inscription -->
	<div class="container ">
		<div class="row">
			<div id="fond_formulaireIns"  class="col-md-4 mx-auto mt-5"> 
				<div class="col-md-10 mx-auto nomChamps">
					<form class="form text-center" method="post" action="connexionUser.php">
						<h3 class=" mt-5 mb-3 fon">Connexion</h3>
						<div class="form-group mt-4">
							Nom d'utilisateur:<input type="text" class="login-form-control " name="nom" >
						</div>
						<div class="form-group">
							Mot de passe:<input type="password" class="login-form-control " name="password">
						</div>
						<div class="mb-3 mt-4"><button  type="submit" class="btn btn-primary">Se connecter</button></div>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

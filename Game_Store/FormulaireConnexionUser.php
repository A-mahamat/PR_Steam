<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="StyleGame_Store.css"> 
	<title>connexionUser</title>

  


	
</head>

<body class="corps_ForConnexion">


	<!-- Barre de navigation -->
  <nav class="barN  bg-light  navbar-fixed-top  navbar navbar-expand-md mb-5 ">
   
   
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
       <!-- lien pr retourner le User vers la page d'accueil -->
    <div class="Accueil mb-3 mx-3">
    <a href="Index0.php"> Accueil</a>
   </div>
   
    
  </nav>

  
  
    <!-- Formulaire d'inscription -->
    <div class="container ">
      <div class="row">
        <div id="fond_formulaireIns"  class="col-md-4 mx-auto mt-5"> 
          <div class="col-md-9 mx-auto nomChamps">
            <form id="form-connexion" class="form text-center" method="post" action="connexionUser.php">
              <h3 class=" mt-5 mb-3 fon">Connexion</h3>
             <div class="form-group mt-4   ">
                Nom d'utilisateur:<input type="text" class="login-form-control " name="nom" >
              </div>
              <div class="form-group   ">
                 Mot de passe:<input type="password" class="login-form-control " name="password" >
              </div>
              

              
              <div class=" mt-3 mb-2"><button  type="submit" class="btn btn-secondary ">Se connecter</button></div>
              <p>ou</p>
              <a class="mb-3 btn btn-secondary" href="InscriptionUtilisateur.php">Inscription</a>

              
            </form>
          </div>
        </div>
        </div>
      </div>



</body>
</html>
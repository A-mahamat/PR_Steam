<!DOCTYPE html>
<html>
<head>
  <title>Inscription</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="StyleGame_Store.css">

  
</head>
<body class="corps_ForIns">


  <!-- Barre de navigation -->
  <nav class=" bg-light barN navbar-fixed-top  navbar navbar-expand-md mb-5 ">
    <!-- lien pr retourner le User vers la page d'accueil -->
    <a class="mb-3 mx-3" href="Index0.php"> Accueil</a>
    <!-- lien pour renvoyer le User vers vers la page connexion -->
    <a class="mb-3 mx-3" href="FormulaireConnexionUser.php">  Connexion</a>
  </nav>


  
    <!-- Formulaire d'inscription -->
    <div class="container ">
      <div class="row">
        <div id="fond_formulaireIns"  class="col-md-4 mx-auto "> 
          <div class="col-md-11 mx-auto">
            <form class="form text-center" method="post" action="enregistrement.php">
              <h3 class="mb-0 mt-3 mb-3 fon">Inscription</h3>
              <div class="form-group   ">
                Nom d'utilisateur:<input type="text" class="form-control" name="nom" >
              </div>
              <div class="form-group ">
                Prénom:<input type="text" class="form-control" name="prenom" >
              </div>
              <div class="form-group ">
                Adresse email:<input type="email" class="form-control" name="email" >
              </div>
              <div class="form-group ">
                Date de naissance:<input type="Date" class="form-control" name="date_de_naissance" >
              </div>
              
              <div class="form-group ">
                Mot de passe:<input type="password" class="form-control" name="password" id="password">
              </div>
              <div class="form-group mb-1 ">
                Confirmez votre mot de passe:<input type="password" class="form-control" name="password_confirm" >
              </div>
              <div class="mb-3"><button  type="submit" class="btn btn-primary">S'inscrire</button></div>
            </form>
          </div>
        </div>
        </div>
      </div>

  


</body>

    

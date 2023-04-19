<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>contact</title>

  <!-- Inclure Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- ilclure le ficheir du style -->
  <link rel="stylesheet" type="text/css" href="StyleGame_Store.css">
  
</head>
<body>


  <!-- Barre de navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark ">
    <!-- lien pour retourner le User vers l'accueil-->
    <a class="navbar-brand" href="Index0.php"> Accueil</a>
  </nav>
  
  <!-- Contenu de la page -->
  <div class="container mt-5">
    <h1>Nous contacter</h1>
    <p>Vous pouvez nous contacter en utilisant le formulaire ci-dessous :</p>
    
    <!-- Formulaire de contact -->
    <form action="contacter.php" method="post">
      <div class="form-group">
        
       Nom: <input type="text" class="form-control" name="nom" >
      </div>
      
      <div class="form-group">
        E-mail: <input type="email" class="form-control" name="email" >
      </div>
      
      <div class="form-group">
        
        Sujet:<input type="text" class="form-control" name="sujet" >
      </div>
      
      <div class="form-group">
        
        Message <textarea class="form-control" name="message"></textarea>
      </div>
      
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
  </div>

  
</body>
</html>

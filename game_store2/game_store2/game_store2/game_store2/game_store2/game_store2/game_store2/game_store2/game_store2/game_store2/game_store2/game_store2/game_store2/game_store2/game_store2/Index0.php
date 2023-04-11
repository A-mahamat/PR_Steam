<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Game_Store</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="StyleGame_Store.css">

  <!-- lien pour les icônes -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />



 
	
 
</head>

<body class="corps_id0 d-flex flex-column">

  <?php 

  //verifions si un client un connecté 

  $client_connecté=False;

  if (isset($_SESSION['client'])) {

    $client_connecté=True;


  }


  ?>
	
    <div id="Navbar1">
    	<nav class="navbar navbar-expand-lg " style="background-image: url('Images/st.jpg');height: 287px; width: 100%;">

			<!-- logo -->
			<!-- <div class="logo">
				<img src="France_st/Images/HADIR.png" height="100px" width="100px"><br/>

			</div> -->

			<!-- logo de la connexion -->
			<div class="connexion" >
				<img src="conn2.png" height="70px" width="70px"><br/>
	    	</div>
	    	<!-- HTML -->
	    </nav >
    </div>
	
    <!-- la barre de navigation -->
    <div id="Navbar2" class="bg-dark text-light">
  <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
      <!-- le formulaire de recherche -->
      <div id="formulaire_recherche" class=" mt-4">
        <form class="form-inline my-2 my-lg-0" style="margin-right:25px" method="post" action="recherche.php">
          <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Rechercher" name="recherche" >
          <button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit">Rechercher</button> 
        </form>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#NavbarMenu" aria-controls="NavbarMenu" aria-expanded="false" aria-label="Toggle navigation">
       
      </button>
      <div class="multi_choix collapse navbar-collapse" id="NavbarMenu"> 
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="#">TAGS</a></li>
          <li class="nav-item"><a class="nav-link" href="#">FILTRES</a></li>
          <li class="nav-item"><a class="nav-link" href="#">COMMUNAUTE</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Nouveauté</a></li>
          <li class="nav-item"><a class="nav-link" href="Statistique1.php">Statistiques</a></li>
          <li class="nav-item"><a class="nav-link" href="recommandations.php">Voir les recommandations</a></li>
          <li class="nav-item"><a class="nav-link" href="recommandations2.php"> Quel jeu te ferait plaisir ?</a></li>
          <li class="nav-item"><a class="nav-link" href="panier.php"> Votre panier</a></li>

        </ul>
      </div>

     <div class="afficheConnexion">    

      <?php 

          if ($client_connecté) {
            echo "<li class='nav-item '><a  class='nav-link' href='deconnexion.php'>déconnexion</a></li>";
          }else{

            echo "<li class='nav-item '><a  class='nav-link' href='FormulaireConnexionUser.php'>Connexion</a></li>";


          }


          ?>
      </div>
          

    </div>
  </nav>
</div>

    
    <div class=" phraseAcc ">
    	<h2 class="mb-5 mt-5">Des jeux pour tous les goûts !</h2>
    </div>


    <!-- du code php pour l gestion de l'affichage dans la grille  -->

    <?php 
   
    

    // vérifions si la varaible de session existe 
    if (isset($_SESSION['jeux'])) {



      //nombre_lignes pour parcourir tout le tableau avec un for
      $nombre_lignes = count($_SESSION['jeux']);
      echo $nombre_lignes;

      //la boucle for

      $n=4;

      for ($i=0; $i < $nombre_lignes; $i+=4){



         //recuperation d'un sous_tableau ayant 5 tableau contenats les articles, cela permet d'afficher 4 artciles differents sur la même ligne
        $sous_tableaux = array_slice($_SESSION['jeux'], $i, $n);
        $n+=4;


        //recuperatin de nom,date de sortie,prix et images de chaque article du sous-tabaleu à 5 elements(qui sont les infos sur le jeux)
        
        
       
        
        
        //recuperation de l'url image de chaque article du tbaleau à  elements

        
          






        echo "<div class=' afficheIm container mt-5'>
            <div  class='row'>";



            //si la taille du tableau "$_SESSION['jeux']"" n'est pas un multiple de 4, on aura un problème d'affichage et donc  les "else"  de cette partie servent à gerer ce problème. 
          


            //condition 1

            if (count($sous_tableaux)>0) {
              $nom0=$sous_tableaux[0][0];
              $image0=$sous_tableaux[0][5];
              $date_sorti0=$sous_tableaux[0][1];
              $prix0=$sous_tableaux[0][4];

              echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                      <div class=' taille-carte card mb-4'>
                        <img src='$image0' class='card-img-top' alt='Image produit 1'>
                        <div class='card-body'>
                           <h5 class='card-title'>Produit 2</h5>
                          <p class='card-text'>p1 :"." ".$nom0." "."</p>
                          <a href='#' class='btn btn-primary'>Ajouter au panier</a>
                        </div>
                      </div>
                    </div>";
                  }


           
             //condition 2
    

            if (count($sous_tableaux)>1) {
              $nom1=$sous_tableaux[1][0];
              $image1=$sous_tableaux[1][5];
              $date_sorti1=$sous_tableaux[1][1];
              $prix0=$sous_tableaux[0][4];

              echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                      <div class=' taille-carte card mb-4'>
                        <img src='$image1' class='card-img-top' alt='Image produit 2'>
                        <div class='card-body'>
                          <h5 class='card-title'>Produit 2</h5>
                          <p class='card-text'>nom du jeux 2 : "." ".$nom1."</p>
                          <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
                        </div>
                      </div>
                    </div>";
                    }

                    //si la condition 1 est verifié et 2 est fausse, alors il faut rajouter 3 article par défaut pour completer la lignes 
            elseif (count($sous_tableaux)==1) {
            
              //Article 2
              echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                     <div class=' taille-carte card mb-4'>
                        <img src='Images/GTA.jpg' class='card-img-top' alt='Image produit 2'>
                          <div class='card-body'>
                                  <h5 class='card-title'>Produit 2</h5>
                                  <p class='card-text'>GTA</p>
                                  <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
                                </div>
                              </div>
                            </div>";

                            //Article 3
                            echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                              <div class=' taille-carte card mb-4'>
                                <vidéo src='Images/pp.webm' class='card-img-top' alt='Image produit 2'>
                                <div class='card-body'>
                                  <h5 class='card-title'>Produit 3</h5>
                                  <p class='card-text'>300PR</p>
                                  <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
                                </div>
                              </div>
                            </div>";
                            //Article 4
                            echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                              <div class=' taille-carte card mb-4'>
                                <img src='Images/200.webp' class='card-img-top' alt='Image produit 2'>
                                <div class='card-body'>
                                  <h5 class='card-title'>Produit 4</h5>
                                  <p class='card-text'>200PR</p>
                                  <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
                                </div>
                              </div>
                            </div>";

                              



                    }


            //condition 3

             if (count($sous_tableaux)>2) {
              $nom2=$sous_tableaux[2][0];
              $image2=$sous_tableaux[2][5];
              $date_sorti2=$sous_tableaux[2][1];

              echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                <div class=' taille-carte card mb-4'>
                  <img src='$image2' class='card-img-top' alt='Image produit 3'>
                  <div class='card-body'>
                    <h5 class='card-title'>Produit 3</h5>
                    <p class='card-text'>nom du jeux 3 : "." ".$nom2."</p>
                    <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
                  </div>
                </div>
              </div>";
              }

              //si la condition 2 est verifié et 3 est fausse, alors il faut rajouter 2 article par défaut pour completer la ligne
              elseif (count($sous_tableaux)==2) {
                

                 //Article 3
                            echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                              <div class=' taille-carte card mb-4'>
                                <img src='Images/300.gif' class='card-img-top' alt='Image produit 2'>
                                <div class='card-body'>
                                  <h5 class='card-title'>Produit 3</h5>
                                  <p class='card-text'>300PR</p>
                                  <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
                                </div>
                              </div>
                            </div>";
                            //Article 4
                            echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                              <div class=' taille-carte card mb-4'>
                                <img src='Images/200.webp' class='card-img-top' alt='Image produit 2'>
                                <div class='card-body'>
                                  <h5 class='card-title'>Produit 4</h5>
                                  <p class='card-text'>200PR</p>
                                  <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
                                </div>
                              </div>
                            </div>";
                       }


              //condition 4
             if (count($sous_tableaux)>3) {
              $nom3=$sous_tableaux[3][0];
              $image3=$sous_tableaux[3][5];
              $date_sorti3=$sous_tableaux[3][1];

                echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                  <div class=' taille-carte card mb-4'>
                    <img src='$image3' class='card-img-top' alt='Image produit 4'>
                    <div class='card-body'>
                      <h5 class='card-title'>Produit 4</h5>
                      <p class='card-text'>nom du jeux : "." ".$nom3."</p>
                      <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
                    </div>
                  </div>
                </div>";
            }
            //si la condition 3 est verifié et 4 est fausse, alors il faut rajouter 1 article par défaut pour completer la ligne
            elseif(count($sous_tableaux)==3){

              //Article 4
                            echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                              <div class=' taille-carte card mb-4'>
                                <img src='Images/200.webp' class='card-img-top' alt='Image produit 2'>
                                <div class='card-body'>
                                  <h5 class='card-title'>Produit 4</h5>
                                  <p class='card-text'>200PR</p>
                                  <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
                                </div>
                              </div>
                            </div>";
            }

           
           
          
        echo "</div>
         </div>";
      }
    }

    //si le user n'a pas fait de recherche, il faut afficher les produits par defaut(recommandation en quelques sorte)
    else{
      echo "<div afficheIm class='container mt-5'>
           <div  class='row'>
            <div class='col-md-3 col-sm-6 col-xs-12'>
             <div class=' taille-carte card mb-4'>

              <video controls>
               <source src='Images/pp.webm' autopaly class='card-img-top' type='video/webm'>
                    Votre navigateur ne supporte pas le format vidéo WebM.
              </video>

              <div class='card-body'>
                <h5 class='card-title'>Article 1</h5>
                <p class='card-text'>Description</p>
                <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
              </div>
            </div>
          </div>
          <div class='col-md-3 col-sm-6 col-xs-12'>
            <div class=' taille-carte card mb-4'>
              <img src='Images/mine.webp'class='card-img-top' alt='Image produit 2'>
              <div class='card-body'>
                <h5 class='card-title'>Article 2</h5>
                <p class='card-text'>Description</p>
                <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
              </div>
            </div>
          </div>
          <div class='col-md-3 col-sm-6 col-xs-12'>
            <div class=' taille-carte card mb-4'>
              <img src='Images/mine2.jpg' class='card-img-top' alt='Image produit 3'>
              <div class='card-body'>
                <h5 class='card-title'>Article 3</h5>
                <p class='card-text'>Description</p>
                <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
              </div>
            </div>
          </div>
          <div class='col-md-3 col-sm-6 col-xs-12'>
            <div class=' taille-carte card mb-4'>
              <img src='Images/combat.jpg' class='card-img-top' alt='image d'article ></img>
                <div class='card-body'>
                  <h5 class='card-title'>Article 4</h5>
                  <p class='card-text'>Description </p>
                  <a href='#' class='btn btn-primary'>Ajouter au panier</a>
              </div>
            </div>
          </div>
        </div>.
      </div>";
      //ligne 2
      echo "<div afficheIm class='container mt-5'>
              <div  class='row'>
                <div class='col-md-3 col-sm-6 col-xs-12'>
                 <div class=' taille-carte card mb-4'>
                  <img src='Images/combat1.webp'class='card-img-top' alt='Image produit 5'>
                  <div class='card-body'>
                    <h5 class='card-title'>Article 5</h5>
                    <p class='card-text'>Description</p>
                    <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
                  </div>
                 </div>
                </div>
                <div class='col-md-3 col-sm-6 col-xs-12'>
                 <div class=' taille-carte card mb-4'>
                  <img src='Images/200.webp'class='card-img-top' alt='Image produit 6'>
                  <div class='card-body'>
                    <h5 class='card-title'>Article 6</h5>
                    <p class='card-text'>Description</p>
                    <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
                  </div>
                 </div>
                </div>
                  <div class='col-md-3 col-sm-6 col-xs-12'>
                    <div class=' taille-carte card mb-4'>
                      <img src='Images/GTA.jpg' class='card-img-top' alt='Image produit 7'>
                      <div class='card-body'>
                        <h5 class='card-title'>Article 7</h5>
                        <p class='card-text'>Description</p>
                        <a href='#'' class='btn btn-primary'>Ajouter au panier</a>
                      </div>
                    </div>
                  </div>
                  <div class='col-md-3 col-sm-6 col-xs-12'>
                    <div class=' taille-carte card mb-4'>
                      <img src='Images/mario.jpg' class='card-img-top' alt='image d'article 8 ></img>
                        <div class='card-body'>
                          <h5 class='card-title'>Article _</h5>
                          <p class='card-text'>Description </p>
                          <a href='#' class='btn btn-primary'>Ajouter au panier</a>
                      </div>
                    </div>
                  </div>
                </div>.
              </div>"; 
        }

    

    
      
    
  ?>

  <footer class="bg-dark text-white">
  <div class="container">
    <div class="row">
      <div class="colonne1 col-md-6">
        <h5 class="mb-3">À propos</h5>
        <p class="mb-0 ">Game Store est une boutique en ligne spécialisée dans la vente de jeux vidéo et d'accessoires pour gamers.</p>
      </div>
      <div class="col-md-3">
        <h5 class="mb-3">Liens utiles</h5>
        <ul class="list-unstyled">
          <li><a href="#">Accueil</a></li>
          
          <li><a href="#">Promotions</a></li>
          <li><a href="FormulaireContact.php">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5 class="mb-3">Restez connecté</h5>
        <ul class="list-unstyled">
          <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
          <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
          <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
          
        </ul>
      </div>
    </div>
  </div>
  <div class="bg-dark text-center py-2">
    <p class="mb-0">&copy; 2023 Game Store. Tous droits réservés.</p>
  </div>
</footer>


    
    

 

  

</body>
</html>
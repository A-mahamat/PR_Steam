<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Game_Store</title>
  <!-- lien pour l'icônes -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">

  <!-- lien pour bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"> 

    <!-- lien pour notre fichier du style -->
	<link rel="stylesheet" type="text/css" href="StyleGame_Store.css">

  <!-- lien pour l'icônes -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap" rel="stylesheet">

  <!-- Fichier JavaScript de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap"></script>



  
  

  
 

 
 <script>
  let menuItems = document.querySelectorAll(".menu-item");
  for (let item of menuItems) {
    item.addEventListener("mouseover", function() {
        let submenu = this.querySelector(".submenu");
        if (submenu) {
            submenu.style.display = "block";
        }
    });
    item.addEventListener("mouseout", function() {
        let submenu = this.querySelector(".submenu");
        if (submenu) {
            submenu.style.display = "none";
        }
    });
}
</script>

 


 
	
 
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

			

			<!-- le lien de la connexion -->
			
	    	<!-- HTML -->
	    </nav >
    </div>
	
    <!-- la barre de navigation -->
    <div id="Navbar2" class="bg-dark text-light">
  <nav class="navbar navbar-expand-sm">
    <div class="container-fluid">
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
      
      <!-- le formulaire de recherche -->
      <div id="formulaire_recherche" class=" mt-4 mx-3">
        <form class="form-inline my-2 my-lg-0" style="margin-right:25px" method="post" action="recherche.php">
          <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Rechercher" name="recherche" >
          <button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit">Rechercher</button> 
        </form>
      </div> 
      
      <button class="  navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#NavbarMenu" aria-controls="NavbarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="  navbar-toggler-icon"></span>
      </button>
      <div class="multi_choix collapse navbar-collapse" id="NavbarMenu">
          <ul class="navbar-nav">
          <li class="  nav-item"><a class="nav-link a_different_de_section " href="#">TAGS</a></li>
          <li class="  nav-item  "><a  class="  nav-link a_different_de_section "  href="#">FILTRES</a></li>
      </div>

          
        <div class="SECTION">
        <ul class="menu">
          <li class="menu-item">
            <a href="#">SECTION</a>
            <ul class="submenu">
              <li class="nav-item"><a class="nav-link" href="#">communauté</a></li>
              <li class="nav-item"><a class="nav-link" href="#">nouveauté</a></li>
              <li class="nav-item"><a class="nav-link" href="Statistique1.php">statistiques</a></li>
              <li class="nav-item"><a class="nav-link" href="recommandations.php">Voir les recommandations</a></li>
              <li class="nav-item"><a class="nav-link" href="recommandations2.php"> Quel jeu te ferait plaisir ?</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
        

        


      
      


     <div class="afficheConnexion">    

      <?php 

          if ($client_connecté) {
            $nom = $_SESSION['client'][0][1];
          echo"<ul class='menu'>
          <li class='menu-item'>
            <a id='a_nom_user' href='#''>"." ".$nom." "."</a>
            <ul class='submenu'>
              <li class='nav-item'><a class='nav-link' href='#''>Profil</a></li>
              <li class='nav-item'><a class='nav-link' href='deconnexion.php''>Déconnexion</a></li>
              
            </ul>
          </li>
        </ul>";
        
            // echo "<li class='nav-item '>"." ".$nom." "."</li>";
          }else{
            echo "<li class='nav-item  '><a  class='nav-link' href='FormulaireConnexionUser.php'>CONNEXION</a></li>";

            
          }

      ?>
      </div>

      <!-- lien pour voir renvoyer le user vers son panier  -->
      <div class="panier">

        <a href="panier.php"><i class='fas fa-shopping-cart'></i></a>
        

      </div> 
    </div>
</nav>

</div>


    
    <div class=" phraseAcc ">
    	<h2 class="mb-5 mt-5">Des jeux pour tous les goûts !</h2>
    </div>


    <!-- du code php pour l gestion de l'affichage dans des grilles  -->

    <?php 
   
    

    // vérifions si la varaible de session existe 
    if (isset($_SESSION['jeux'])) {



      //nombre_lignes pour parcourir tout le tableau avec un for
      $nombre_lignes = count($_SESSION['jeux']);
      

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
              $nom0=$sous_tableaux[0][1];
              $image0=$sous_tableaux[0][6];
              $date_sorti0=$sous_tableaux[0][2];
              $prix0=$sous_tableaux[0][5];

              echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                      <a class='carte_lien' href='Article.php?id_art=".$sous_tableaux[0][0]."'><div class=' taille-carte card mb-4'>
                        <img src='$image0' class='card-img-top' alt='Image produit 1'>
                        <div class='card-body'>
                        <p class='card-text'>"." ".$nom0." "."</p>
                        <h5 class='card-title'>"." ".$prix0." "." €</h5>
                        </div>
                      </div></a>
                    </div>";
                    //<a href='Articles/article.php?id_art=".$enr['id_art']."'>" . $enr['nom'] . "</a>
                  }


           
             //condition 2
    

            if (count($sous_tableaux)>1) {
              $nom1=$sous_tableaux[1][1];
              $image1=$sous_tableaux[1][6];
              $date_sorti1=$sous_tableaux[1][2];
              $prix1=$sous_tableaux[1][5];

              echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                      <a class='carte_lien' href='Article.php?id_art=".$sous_tableaux[1][0]."'><div class=' taille-carte card mb-4'>
                        <img src='$image1' class='card-img-top' alt='Image produit 2'>
                        <div class='card-body'>
                          <p class='card-text'>"." ".$nom1." "."</p>
                        <h5 class='card-title'>"." ".$prix1." "." €</h5>
                          
                        </div>
                      </div></a>
                    </div>";
                    }

                    //si la condition 1 est verifié et 2 est fausse, alors il faut rajouter 3 article par défaut pour completer la lignes 
            elseif (count($sous_tableaux)==1) {
            
              //Article 2
              echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                     <a class='carte_lien' href='Article.php?id_art=".$sous_tableaux[2][0]."'><div class=' taille-carte card mb-4'>
                        <img src='Images/GTA.jpg' class='card-img-top' alt='Image produit 2'>
                          <div class='card-body'>
                                  <p class='card-text'> GTA </p>
                                  <h5 class='card-title'> 59.99 €</h5>
                                  
                                </div>
                              </div></a>
                            </div>";

                            //Article 3
                            echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                              <a class='carte_lien' href='Article.php?id_art=".$sous_tableaux[3][0]."'><div class=' taille-carte card mb-4'>
                                <vidéo src='Images/pp.webm' class='card-img-top' alt='Image produit 2'>
                                <div class='card-body'>
                                  <p class='card-text'>pp</p>
                                  <h5 class='card-title'>100 €</h5>
                                  
                                </div>
                              </div></a>
                            </div>";
                            //Article 4
                            echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                              <a class='carte_lien' href='Article.php?id_art=".$sous_tableaux[4][0]."'><div class=' taille-carte card mb-4'>
                                <img src='Images/200.webp' class='card-img-top' alt='Image produit 2'>
                                <div class='card-body'>
                                  <p class='card-text'>200pm</p>
                                  <h5 class='card-title'>16.99 €</h5>
                                  
                                </div></a>
                              </div>
                            </div>";

                              



                    }


            //condition 3

             if (count($sous_tableaux)>2) {
              $nom2=$sous_tableaux[2][1];
              $image2=$sous_tableaux[2][6];
              $date_sorti2=$sous_tableaux[2][2];
              $prix2=$sous_tableaux[2][5];

              echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                <a class='carte_lien' href='Article.php?id_art=".$sous_tableaux[2][0]."'><div class=' taille-carte card mb-4'>
                  <img src='$image2' class='card-img-top' alt='Image produit 3'>
                  <div class='card-body'>
                    <p class='card-text'>"." ".$nom2." "."</p>
                    <h5 class='card-title'>"." ".$prix2." "." €</h5>
                    
                  </div>
                </div></a>
              </div>";
              }

              //si la condition 2 est verifié et 3 est fausse, alors il faut rajouter 2 article par défaut pour completer la ligne
              elseif (count($sous_tableaux)==2) {
                

                 //Article 3
                            echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                              <a class='carte_lien' href='Article.php?id_art=".$sous_tableaux[2][0]."'><div class=' taille-carte card mb-4'>
                                <img src='Images/300.gif' class='card-img-top' alt='Image produit 2'>
                                <div class='card-body'>
                                  <p class='card-text'>300pp</p>
                                  <h5 class='card-title'>15.66 €</h5>
                                  
                                </div>
                              </div></a>
                            </div>";
                            //Article 4
                            echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                              <a class='carte_lien' href='Article.php?id_art=".$sous_tableaux[2][0]."'><div class=' taille-carte card mb-4'>
                                <img src='Images/200.webp' class='card-img-top' alt='Image produit 2'>
                                <div class='card-body'>
                                  <p class='card-text'>400po</p>
                                  <h5 class='card-title'>69.99 €</h5>
                                  
                                </div>
                              </div></a>
                            </div>";
                       }


              //condition 4
             if (count($sous_tableaux)>3) {
              $nom3=$sous_tableaux[3][1];
              $image3=$sous_tableaux[3][6];
              $date_sorti3=$sous_tableaux[3][2];
              $prix3=$sous_tableaux[3][5];

                echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                  <a class='carte_lien' href='Article.php?id_art=".$sous_tableaux[3][0]."'><div class=' taille-carte card mb-4'>
                    <img src='$image3' class='card-img-top' alt='Image produit 4'>
                    <div class='card-body'>
                      <p class='card-text'>"." ".$nom3." "."</p>
                      <h5 class='card-title'>"." ".$prix3." "." €</h5>
                      
                    </div>
                  </div></a>
                </div>";
            }
            //si la condition 3 est verifié et 4 est fausse, alors il faut rajouter 1 article par défaut pour completer la ligne
            elseif(count($sous_tableaux)==3){

              //Article 4
                            echo "<div class='col-md-3 col-sm-6 col-xs-12'>
                             <a class='carte_lien' href='Article.php?id_art=".$sous_tableaux[3][0]."'> <div class=' taille-carte card mb-4'>
                                <img src='Images/200.webp' class='card-img-top' alt='Image produit 2'>
                                <div class='card-body'>
                                  <p class='card-text'>300pop</p>
                                  <h5 class='card-title'>9.99€</h5>
                                  
                                </div>
                              </div></a>
                            </div>";
            }

           
           
          
        echo "</div>
         </div>";
      }
    }


    //<a href='#'' class='btn btn-primary'>Ajouter au panier</a>

    //si le user n'a pas fait de recherche, il faut afficher les produits recommadé de chaque user 

    // recuperer les jeux de la variable de session créee depuis le fichier recommandatio2.php et les afficher
    
    else{
      echo "<div afficheIm class='container mt-5'>
           <div  class='row'>
            <div class='col-md-3 col-sm-6 col-xs-12'>
             <div class=' taille-carte card mb-4'>

            <img src='Images/course.jpg' class='card-img-top'  alt='image de voiture '>

              <div class='card-body'>
                <h5 class='card-title'>Article 1</h5>
                <p class='card-text'>Description</p>
                
              </div>
            </div>
          </div>
          <div class='col-md-3 col-sm-6 col-xs-12'>
            <div class=' taille-carte card mb-4'>
              <img src='Images/mine.webp'class='card-img-top' alt='Image produit 2'>
              <div class='card-body'>
                <h5 class='card-title'>Article 2</h5>
                <p class='card-text'>Description</p>
                
              </div>
            </div>
          </div>
          <div class='col-md-3 col-sm-6 col-xs-12'>
            <div class=' taille-carte card mb-4'>
              <img src='Images/mine2.jpg' class='card-img-top' alt='Image produit 3'>
              <div class='card-body'>
                <h5 class='card-title'>Article 3</h5>
                <p class='card-text'>Description</p>
                
              </div>
            </div>
          </div>
          <div class='col-md-3 col-sm-6 col-xs-12'>
            <div class=' taille-carte card mb-4'>
              <img src='Images/combat.jpg' class='card-img-top' alt='image d'article ></img>
                <div class='card-body'>
                  <h5 class='card-title'>Article 4</h5>
                  <p class='card-text'>Description </p>
                  
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
                    
                  </div>
                 </div>
                </div>
                <div class='col-md-3 col-sm-6 col-xs-12'>
                 <div class=' taille-carte card mb-4'>
                  <img src='Images/200.webp'class='card-img-top' alt='Image produit 6'>
                  <div class='card-body'>
                    <h5 class='card-title'>Article 6</h5>
                    <p class='card-text'>Description</p>
                    
                  </div>
                 </div>
                </div>
                  <div class='col-md-3 col-sm-6 col-xs-12'>
                    <div class=' taille-carte card mb-4'>
                      <img src='Images/GTA.jpg' class='card-img-top' alt='Image produit 7'>
                      <div class='card-body'>
                        <h5 class='card-title'>Article 7</h5>
                        <p class='card-text'>Description</p>
                        
                      </div>
                    </div>
                  </div>
                  <div class='col-md-3 col-sm-6 col-xs-12'>
                    <div class=' taille-carte card mb-4'>
                      <img src='Images/mario.jpg' class='card-img-top' alt='image d'article 8 ></img>
                        <div class='card-body'>
                          <h5 class='card-title'>Article _</h5>
                          <p class='card-text'>Description </p>
                         
                      </div>
                    </div>
                  </div>
                </div>.
              </div>"; 
        }

    

    
      
    
  ?>

  <footer class="bg-dark text-white">
  <hr>
  <div class="container">
    <div class="row">
      <div class="colonne1 col-md-6">

        <h5 class="mb-3">À propos</h5>
        <p>Game Store propose une large sélection de jeux vidéo en ligne.</p>
        <p class="mb-0 ">Trouvez les meilleurs jeux vidéo en ligne sur Game Store.</p>
      </div>
      <div class="col-md-3">
        <h5 class="mb-3">Liens utiles</h5>
        <ul class="list-unstyled">
          <li><a href="#">Accueil</a></li>
          
          <li><a href="#">Promotions</a></li>
          <li><a href="FormulaireContact.php">Contact</a></li>
          <?php

          if ($client_connecté) {
            echo "<li class='nav-item '><a  class='nav-link' href='deconnexion.php'>deconnexion</a></li>";
          }

          ?>

        </ul>
      </div>
      <div class="col-md-3">
        <h5 class="mb-3">Restez connecté</h5>
        <ul class="list-unstyled">
          <li><a href="#"><li class="fa fa-facebook"></li> Facebook</a></li>
          <li><a href="#"><li class="fa fa-twitter"></li> Twitter</a></li>
          <li><a href="#"><li class="fa fa-instagram"></li> Instagram</a></li>

        </ul>

      </div>
    </div>
  </div>
  <hr>
  <div class="bg-dark text-center py-2">
    <p class="mb-0">&copy; 2023 Game Store. Tous droits réservés.</p>
  </div>
</footer>


    
    

 

  

</body>
</html>
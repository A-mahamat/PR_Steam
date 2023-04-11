<?php
//Une partie du code ci-dessous  a été inspiré d'un tutoriel trouvé sur "https://www.youtube.com/watch?v=6WqvRJTP-Y8&t=356s". Nous avons ensuite apporté des modifications au code pour répondre à nos besoins spécifiques 
// Inclusion du fichier de connexion à la base de données
include 'fonctionConnexion.php';
// Connexion à la base de données
$conn = connDB();
// Préparation de la requête pour extraire les données
$rqt = $conn->prepare("SELECT name, 
average_playtime  FROM games   LIMIT 25");
// Exécution de la requête
$rqt->execute(array());
// Récupération des résultats de la requête

$results = $rqt->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Statistique</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="StyleGame_Store.css">
	<!-- Inclusion des bibliothèques Google Charts -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		// Chargement des bibliothèques
		google.charts.load('current', {'packages':['corechart']});
		// Fonction de rappel lorsque les bibliothèques sont chargées
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['name', 'average_playtime'],
        <?php
        foreach ($results as $ligne) {
           echo "['" . $ligne['name'] . "', " . $ligne['average_playtime'] . "],";

        }
        ?>
    ]);

    var options = {
        
        legend: {position: 'none'},
        hAxis: {title: 'Nom de jeux',titleTextStyle: {color: '#fff'}, textStyle: {color: '#fff'}, baselineColor: '#fff'},
        vAxis: {title: 'Temps', titleTextStyle: {color: '#fff'}, textStyle: {color: '#fff'}, baselineColor: '#fff'},
        backgroundColor: 'transparent',
        width: 850,
        height: 400,
        
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

    chart.draw(data, options);
}

	</script>
	<style type="text/css">
		
		.barN_stat  a{
	text-decoration: none;
      color: white;


}

#chart_div {
        margin-left: 18%;
        margin-top: 2%;
        margin-right: 20%;
    }
.titre_graph{

	text-align: center;
	color: white;
}

	</style>
	

</head>
<body class="bg-black">

	<nav class="barN_stat  bg-dark  navbar-fixed-top  navbar navbar-expand-md mb-5 ">
		<div><!-- lien pr retourner le User vers la page d'accueil -->
			<a class=" mb-3 mx-3" href="Index0.php"> Accueil</a>
		    
		    
	    </div>
  </nav>

  <h3 class="titre_graph ">Temps de jeu moyen par jeu</h3>
	<div id="chart_div" class="bg-dark">
		
	</div> 
</body>
</html>

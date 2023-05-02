<?php
include 'fonctionConnexion.php';
$conn = connDB();

$rqt1 = $conn->prepare("SELECT name, average_playtime FROM games ORDER BY average_playtime DESC LIMIT 10");
$rqt1->execute(array());
$results1 = $rqt1->fetchAll(PDO::FETCH_ASSOC);

$rqt2 = $conn->prepare("SELECT name, price FROM games ORDER BY price DESC LIMIT 10");
$rqt2->execute(array());
$results2 = $rqt2->fetchAll(PDO::FETCH_ASSOC);

$rqt3 = $conn->prepare("SELECT name, price, average_playtime FROM games LIMIT 50");
$rqt3->execute(array());
$results3 = $rqt3->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Statistique</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="StyleGame_Store.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<style type="text/css">
		.barN_stat  a{
			text-decoration: none;
			color: white;
		}

		.titre_graph{
			text-align: center;
			color: white;
		}
	</style>
</head>
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data1 = google.visualization.arrayToDataTable([
			['name', 'average_playtime'],
			<?php
			foreach ($results1 as $ligne) {
				echo "['" . $ligne['name'] . "', " . $ligne['average_playtime'] . "],";
			}
			?>
		]);

		var data2 = google.visualization.arrayToDataTable([
			['name', 'price'],
			<?php
			foreach ($results2 as $ligne) {
				echo "['" . $ligne['name'] . "', " . $ligne['price'] . "],";
			}
			?>
		]);
		
		var data3 = google.visualization.arrayToDataTable([
	['Prix', 'Temps de jeu moyen'],
	<?php
	foreach ($results3 as $ligne) {
		echo "['" . $ligne['price'] . "', " . $ligne['average_playtime'] . "],";
	}
	?>
   ]);


		

		var options1 = {
			legend: {position: 'none'},
			hAxis: {title: 'Nom de jeux', titleTextStyle: {color: '#fff'}, textStyle: {color: '#fff'}, baselineColor: '#fff'},
			vAxis: {title: 'Temps', titleTextStyle: {color: '#fff'}, textStyle: {color: '#fff'}, baselineColor: '#fff'},
			backgroundColor: 'transparent',
			height: 500,
		};

		var options2 = {
			legend: {position: 'none'},
			hAxis: {title: 'Nom de jeux', titleTextStyle: {color: '#fff'}, textStyle: {color: '#fff'}, baselineColor: '#fff'},
			vAxis: {title: 'Prix', titleTextStyle: {color: '#fff'}, textStyle: {color: '#fff'}, baselineColor: '#fff'},
			backgroundColor: 'transparent',
			height: 500,
		};

		var options3 = {
			hAxis: {title: 'Prix', titleTextStyle: {color: '#fff'}, textStyle: {color: '#fff'}, baselineColor: '#fff'},
			vAxis: {title: 'Temps de jeu moyen', titleTextStyle: {color: '#fff'}, textStyle: {color: '#fff'}, baselineColor: '#fff'},
			backgroundColor: 'transparent',
			height: 500,
			legend: {position: 'none'},
		};

		var chart1 = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
		var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
		var chart3 = new google.visualization.ScatterChart(document.getElementById('chart_div3'));

		chart1.draw(data1, options1);
		chart2.draw(data2, options2);
		chart3.draw(data3, options3);

		window.onresize = function() {
			chart1.draw(data1, options1);
			chart2.draw(data2, options2);
			chart3.draw(data3, options3);
		};
	}
</script>
<body class="bg-black" onresize="drawChart()" >

	<nav class="barN_stat bg-dark navbar-fixed-top navbar navbar-expand-md mb-5 ">
		<div>
			<a class="mb-3 mx-3" href="Index0.php"> Accueil</a>
		</div>
	</nav>

	<h3 class="titre_graph">Temps de jeu moyen par jeu</h3>
	<div id="chart_div1" class="bg-dark"></div>

	<h3 class="titre_graph">Top 10 des jeux les plus chers</h3>
	<div id="chart_div2" class="bg-dark"></div>

	<h3 class="titre_graph">Relation entre le prix et le temps de jeu moyen</h3>
	<div id="chart_div3" class="bg-dark"></div>

</body>
</html>


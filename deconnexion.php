<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>deconnexion</title>
</head>
<body>



	<?php 
	//destruction de la session 
	session_destroy();

	echo "déconnexion...";

	echo "<meta http-equiv='refresh' content='2; url=Index0.php'>";
	?>

</body>
</html>
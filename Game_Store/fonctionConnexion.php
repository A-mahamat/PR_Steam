<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>base</title>
</head>
<body>
	<?php
	function connDB(){
		$host = "localhost";
		$dbname = "game store";
   	 	$Username = "root";
    	$password = "Halima123";

    	try {
    		$conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4",$Username,$password);
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		return $conn;
    		
    		
    	} catch (Exception $e) {

    		echo "erreur".$e->getMessage();
    		
    	}


	}
	
	?>

	


</body>
</html>
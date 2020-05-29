<html>
	<head>
  	<title>EXPORTACIÓ HISTÒRIC</title>
  	<link rel="stylesheet" type="text/css" href="estil.css">
	</head>
	
	<body>
	
	<br><br>

	<p> S'HA GENERAT LA EXPORTACIÓ DE LES INCIDÈNCIES RESOLTES </p>

	<a href="historic.php"> <button type="button">TORNAR A LES INCIDENCIES</button> </a>
	

	<?php
	$mysqli = new mysqli("localhost", "adminbd", "admin123", "login");

	if (mysqli_connect_errno()) {
	echo "Error enconexión: ". mysqli_connect_error();
	exit();
	}

	$sql = "SELECT * from incidencies WHERE estat = 'RESOLTA'";

	 $archivo = fopen("historic_incidencies.txt", "w");
	    if($result = mysqli_query($mysqli, $sql)){
		if(mysqli_num_rows($result) > 0){
		    while($row = mysqli_fetch_array($result)){
		        fprintf($archivo, $row[0].";".$row[1].";".$row[2].";".$row[3].";".$row[4].";".$row[5].";".$row[6].PHP_EOL);
		    }
		}
	    }
	    fclose($archivo); 

	$mysqli->close();

	?>
	</body>
</html>

<html>
	<head>
  	<title>EXPORTACIÓ USUARIS</title>
  	<link rel="stylesheet" type="text/css" href="estil.css">
	</head>
	
	<body>
	
	<br><br>

	<p> S'HA GENERAT LA EXPORTACIÓ DELS USUARIS </p>

	<a href="admin.php"> <button type="button">TORNAR ENRERE</button> </a>
	

	<?php
	$mysqli = new mysqli("localhost", "adminbd", "admin123", "login");

	if (mysqli_connect_errno()) {
	echo "Error enconexión: ". mysqli_connect_error();
	exit();
	}

	$sql = "SELECT * from users";

	 $archivo = fopen("historic_usuaris.txt", "w");
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

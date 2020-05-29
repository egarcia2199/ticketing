<html>
	<head>
	  <title>HISTORIC</title>
	  <link rel="stylesheet" type="text/css" href="estil.css">

	</head>
	
	<body>
	<div id="banner">
	    <div id="banner_titulo">PÀGINA DE RESOLUCIÓ D'INCIDÈNCIES</div>
	</div>

	<ul>
	  <li><a href="dashboard.php">Dashboard</a></li>
	  <li><a href="incidencies.php">Incidencies</a></li>
	  <li><a href="historic.php">Historic</a></li>
	  <li><a href="admin.php">Admin</a></li>
	  <li><a class ="active2" href="logout.php">Tancar sessió</a></li>
	 <div class="user">  <li> Hola, <?php
		session_start();
		  $user= $_SESSION['uname'];
		echo strtoupper($user);
		?>
		</li>  
	  </div>
	</ul>

	<br>
	
	<form>
	    <input type="button" onclick="window.location.href = 'historic_export.php';" value="CLICA AQUI PER EXPORTAR LES INCIDENCIES RESOLTES"/>
	</form>

	<br>

	<h3>CONTINGUT DEL FITXER "HISTORIC_INCIDENCIES.TXT:"</h3>

	<?php
	$arxiu = fopen("historic_incidencies.txt", "r") or die("");
	echo '<pre>';
	echo fread($arxiu,filesize("historic_incidencies.txt"));
	echo '</pre>';
	fclose($arxiu);
	?>  

	<br>

	<form action="historic.php">
	<input name="cerca">
	<input type="submit" value="BUSCA">
	</form>

	<br>

	<?php

	echo "<h4>RESULTAT DE LA CERCA:</h4>";

	$q = $_REQUEST["cerca"];
	$f = fopen("historic_incidencies.txt", "r");

		while (($line = fgets($f)) != FALSE) {
		   if (strstr($line, $q)) {
			echo "<pre>";
			echo "$line"; 
			echo "</pre>";
		   }   
		}
	?>
   </body>

</html>

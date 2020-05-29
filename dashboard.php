<?php
      session_start();
      require 'config.php';
 ?>
   
<!DOCTYPE html>
<html>
  <head>
    
    <title>DASHBOARD</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="estil_dashboard.css">
  </head>
  <body>
  <div id="banner">
	<div id="banner_titulo">PÀGINA DE RESOLUCIÓ D'INCIDÈNCIES</div>
  </div>  
	<ul>
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

	    <?php

	    $mysqli = mysqli_connect("localhost", "adminbd", "admin123", "login");
	     
	      if($mysqli === false){
		  die("ERROR: Could not connect. " . mysqli_connect_error());
	      }
	   
		//OBTENIR LES INCIDENCIES EN ESTAT PENDENT
	      $sql = 'SELECT COUNT(*) FROM incidencies WHERE estat = "PENDENT"';
	      if($result = mysqli_query($mysqli, $sql)){
		  if(mysqli_num_rows($result) > 0){
		      echo "<table>";
		          echo "<tr>";

		          echo "</tr>";
		      while($row = mysqli_fetch_array($result)){
		          echo "<tr>";

		              $pendent=$row['COUNT(*)'];
		          echo "</tr>";
		      }
		      echo "</table>";
		      mysqli_free_result($result);
		  } else{
		      echo "No hi ha registres.";
		  }
	      } else{
		  echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	      }


		//OBTENIR LES INCIDENCIES EN ESTAT RESOLTA
	      $sql = 'SELECT COUNT(*) FROM incidencies WHERE estat = "RESOLTA"';
	      if($result = mysqli_query($mysqli, $sql)){
		  if(mysqli_num_rows($result) > 0){
		      echo "<table>";
		          echo "<tr>";
		              //echo "<th>id_incidencia</th>";
		          echo "</tr>";
		      while($row = mysqli_fetch_array($result)){
		          echo "<tr>";
		              //echo "<td>" . $row['COUNT(*)'] . "</td>";
		              $resolta=$row['COUNT(*)'];
		          echo "</tr>";
		      }
		      echo "</table>";
		      mysqli_free_result($result);
		  } else{
		      echo "No hi ha registres.";
		  }
	      } else{
		  echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	      }

		//OBTENIR LES INCIDENCIES QUE HAN ESTAT CREADES PELS USUARIS AMB ROL DE ADMINISTRADOR
	      $sql = 'SELECT COUNT(*) FROM incidencies i JOIN users u ON (i.nom=u.username) WHERE u.rol = "1"';
	      if($result = mysqli_query($mysqli, $sql)){
		  if(mysqli_num_rows($result) > 0){
		      echo "<table>";
		          echo "<tr>";
		              //echo "<th>id_incidencia</th>";
		          echo "</tr>";
		      while($row = mysqli_fetch_array($result)){
		          echo "<tr>";
		              //echo "<td>" . $row['COUNT(*)'] . "</td>";
		              $administrador=$row['COUNT(*)'];
		          echo "</tr>";
		      }
		      echo "</table>";
		      mysqli_free_result($result);
		  } else{
		      echo "No hi ha registres.";
		  }
	      } else{
		  echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	      }


		//OBTENIR LES INCIDENCIES QUE HAN ESTAT CREADES PELS USUARIS AMB ROL DE GESTOR
	      $sql = 'SELECT COUNT(*) FROM incidencies i JOIN users u ON (i.nom=u.username) WHERE u.rol = "2"';
	      if($result = mysqli_query($mysqli, $sql)){
		  if(mysqli_num_rows($result) > 0){
		      echo "<table>";
		          echo "<tr>";
		              //echo "<th>id_incidencia</th>";
		          echo "</tr>";
		      while($row = mysqli_fetch_array($result)){
		          echo "<tr>";
		              //echo "<td>" . $row['COUNT(*)'] . "</td>";
		              $gestor=$row['COUNT(*)'];
		          echo "</tr>";
		      }
		      echo "</table>";
		      mysqli_free_result($result);
		  } else{
		      echo "No hi ha registres.";
		  }
	      } else{
		  echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	      }


		//OBTENIR LES INCIDENCIES QUE HAN ESTAT CREADES PELS USUARIS AMB ROL DE PROFESSOR
	      $sql = 'SELECT COUNT(*) FROM incidencies i JOIN users u ON (i.nom=u.username) WHERE u.rol = "3"';
	      if($result = mysqli_query($mysqli, $sql)){
		  if(mysqli_num_rows($result) > 0){
		      echo "<table>";
		          echo "<tr>";

		          echo "</tr>";
		      while($row = mysqli_fetch_array($result)){
		          echo "<tr>";

		              $professor=$row['COUNT(*)'];
		          echo "</tr>";
		      }
		      echo "</table>";
		      mysqli_free_result($result);
		  } else{
		      echo "No hi ha registres.";
		  }
	      } else{
		  echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	      }

		//OBTENIR LES INCIDENCIES QUE HAN ESTAT PROVOCADES PER UN ORDINADOR
	      $sql = 'SELECT COUNT(*) FROM incidencies WHERE component = "pc"';
	      if($result = mysqli_query($mysqli, $sql)){
		  if(mysqli_num_rows($result) > 0){
		      echo "<table>";
		          echo "<tr>";

		          echo "</tr>";
		      while($row = mysqli_fetch_array($result)){
		          echo "<tr>";

		              $pc=$row['COUNT(*)'];
		          echo "</tr>";
		      }
		      echo "</table>";
		      mysqli_free_result($result);
		  } else{
		      echo "No hi ha registres.";
		  }
	      } else{
		  echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	      }

		//OBTENIR LES INCIDENCIES QUE HAN ESTAT PROVOCADES PER UN PROJECTOR
	      $sql = 'SELECT COUNT(*) FROM incidencies WHERE component = "projector"';
	      if($result = mysqli_query($mysqli, $sql)){
		  if(mysqli_num_rows($result) > 0){
		      echo "<table>";
		          echo "<tr>";

		          echo "</tr>";
		      while($row = mysqli_fetch_array($result)){
		          echo "<tr>";
		              //echo "<td>" . $row['COUNT(*)'] . "</td>";
		              $projector=$row['COUNT(*)'];
		          echo "</tr>";
		      }
		      echo "</table>";
		      mysqli_free_result($result);
		  } else{
		      echo "No hi ha registres.";
		  }
	      } else{
		  echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	      }


		//OBTENIR LES INCIDENCIES QUE HAN ESTAT PROVOCADES PER UNA IMPRESSORA
	      $sql = 'SELECT COUNT(*) FROM incidencies WHERE component = "impressora"';
	      if($result = mysqli_query($mysqli, $sql)){
		  if(mysqli_num_rows($result) > 0){
		      echo "<table>";
		          echo "<tr>";

		          echo "</tr>";
		      while($row = mysqli_fetch_array($result)){
		          echo "<tr>";
		              $impressora=$row['COUNT(*)'];
		          echo "</tr>";
		      }
		      echo "</table>";
		      mysqli_free_result($result);
		  } else{
		      echo "No hi ha registres.";
		  }
	      } else{
		  echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
	      }
	    ?>
	    


		<div class="grafico" align="center">
		      <h4>Estat de les incidències</h4>
		      <canvas id="myChart"></canvas>
		      <script src="Chart.js"></script>
		      <script>
		      var ctx = document.getElementById('myChart').getContext('2d');
		      var chart = new Chart(ctx, {
			  type: 'doughnut',
			  data:{
			datasets: [{
			  data: [<?php echo $pendent.",".$resolta ?>],
			  backgroundColor: ['red', 'lime'],
			  label: 'Estat de les incidencies'}],
			  labels: ['PENDENT','RESOLTA']},
			  options: {responsive: true}
		      });
		      </script>
   
		 <br>
		 <br>

		    </div>
		    <div class="grafico" align="center">
		      <h4>Incidència per rols</h4>
		      <canvas id="myChart1"></canvas>
		      <script src="Chart.js"></script>
		      <script>
		      var ctx = document.getElementById('myChart1').getContext('2d');
		      var chart = new Chart(ctx, {
			  type: 'doughnut',
			  data:{
			datasets: [{
			  data: [<?php echo $administrador.",".$gestor.",".$professor ?>],
			  backgroundColor: ['blue', 'indigo', 'magenta'],
			  label: 'Rol de incidencies'}],
			  labels: ['Administrador','Gestor','Professor']},
			  options: {responsive: true}
		      });
		      </script>
		 
		 <br>
		 <br>

		    </div>
		    <div class="grafico" align="center">
		      <h4>Incidència per tipus</h4>
		      <canvas id="myChart2"></canvas>
		      <script src="Chart.js"></script>
		      <script>
		      var ctx = document.getElementById('myChart2').getContext('2d');
		      var chart = new Chart(ctx, {
			  type: 'doughnut',
			  data:{
			datasets: [{
			  data: [<?php echo $pc.",".$projector.",".$impressora ?>],
			  backgroundColor: ['maroon', 'coral', 'orange'],
			  label: 'Tipus de incidencies'}],
			  labels: ['Ordinador','Projector','Impressora']},
			  options: {responsive: true}
		      });
		      </script>
		     </div>
		
		<br>
		<br>
    
  	</body>
</html>




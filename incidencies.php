<html>
	<head>
  	<title>INCIDENCIES</title>
  	<link rel="stylesheet" type="text/css" href="estil.css">
  	<meta http-equiv="refresh" content="25">
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
		<button onclick="showForm()">Nova Incidència</button>
		<br>
		<form method="POST" action="incidencies.php" id="formElement" style="display: none;">
			<legend>DADES DE LA INCIDÈNCIA</legend>
			<br>
			<label for="component">COMPONENT: </label>
			<br>
				<input type="radio" name="radio" value="pc" > Ordinador<br>   
				<input type="radio" name="radio" value="projector" > Projector<br>
				<input type="radio" name="radio" value="impressora" > Impressora<br>
			<br>
			<label for="aula">AULA: </label>
			<br>
					<input type="radio" name="radio2" value="Aula informatica">Aula d'Informàtica</option>
					<input type="radio" name="radio2" value="Aula musica">Aula de Música</option>
					<input type="radio" name="radio2" value="Aula reforç">Aula de reforç</option>
			<br><br>
			<label for="descripcio_incidencia">DESCRIPCIÓ: </label>
			<br>
			<textarea name="desc" form="formElement" cols="50" rows="4"></textarea>
			<br>
			<button name="insert" type="submit">ENVIAR INCIDÈNCIA</button>
		</form>	

	
		<?php
		$con = mysqli_connect("localhost","adminbd","admin123","login") or die("conexion exitosa!");
		?>

		<?php
		  $user= $_SESSION['uname'];

		    if(isset($_POST['insert'])){ 
			$nom = $user;
			$component = $_POST['radio'];
			$aula = $_POST['radio2'];
			$array = explode("\r\n", $_POST["desc"]);

			$descrip = array_unique($array);

			$insertar = "INSERT INTO incidencies (nom, component, aula, descrip) VALUES ('$nom', '$component', '$aula', '".implode("'),('", $descrip)."')";
			$ejecutar = mysqli_query($con, $insertar);
			
			 if ($ejecutar === false ) {
		    printf("error: %s\n", mysqli_error($con));
			}
		   }
		?>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
		<script>
		$(document).ready(function(){
				$("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myList li").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
		</script>

		<br>

		<div class="form-group pull-right">
		<input type="text" class="search form-control" placeholder="Busca la incidencia que vulguis">
		</div>
		<br>

		</div>
		<?php
		$link = mysqli_connect("localhost", "adminbd", "admin123", "login");

		$sql = "SELECT * from incidencies order by id";


		if($resultado = mysqli_query($link, $sql)){
		if(mysqli_num_rows($resultado) > 0){
		echo "<table align='center' class='table table-striped' id='userTbl' >";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>NOM</th>";
		echo "<th>DATA</th>";
		echo "<th>COMPONENT</th>";
		echo "<th>AULA</th>";
		echo "<th>DESCRIPCIÓ</th>";
		echo "<th>ESTAT</th>";
		echo "<th></th>";
		echo "</tr>";

		while($row = mysqli_fetch_array($resultado)){
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['nom'] . "</td>";
		echo "<td>" . $row['data'] . "</td>";
		echo "<td>" . $row['component'] . "</td>";
		echo "<td>" . $row['aula'] . "</td>";
		echo "<td>" . $row['descrip'] . "</td>";
		echo "<td>" . $row['estat'] . "</td>";
		echo "</tr>";
		}
		echo "</table>";


		mysqli_free_result($resultado);
		} else{
		echo "";
		}
		} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		mysqli_close($link);
		?>


	<script>
		$(document).ready(function(){
			$('.search').on('keyup',function(){
			var searchTerm = $(this).val().toLowerCase();
			$('#userTbl tbody tr').each(function(){
			var lineStr = $(this).text().toLowerCase();
				if(lineStr.indexOf(searchTerm) === -1){
					$(this).hide();
				}else{
			$(this).show();
				}
			});
		});
	});
	</script>

	<script type="text/javascript">
		function showForm() {
		document.getElementById('formElement').style.display = 'block';
		}
	</script>

  </body>
</html>


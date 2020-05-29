<html>
	<head>
	  <title>ADMIN</title>
	  <link rel="stylesheet" type="text/css" href="estil.css">
	</head>
	<body>
	<div id="banner">
		<div id="banner_titulo">PÀGINA DE RESSOLUCIÓ D'INCIDÈNCIES</div>
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

		if($_SESSION['rol'] != 1) {
		header('location:restringir.php');
		}
		
		?>
		</li>  
	</ul>

	<br>

	<div class="form1">
	<form action="admin.php" method="post">       
		<h2>ALTA & MODIFICACIÓ USUARIS:</h2>
		<label for="nom_cognoms">NOM I COGNOMS:</label>
		<br>
		<input type="text" name="nom" id="nom_cognoms">
		<br><br>
		<label for="nom_usuari">USUARI:</label>
		<br>
		<input type="text" name="username" id="nom_usuari">
		<br><br>
		<label for="clau_usuari">CONTRASENYA:</label>
		<br>
		<input type="password" name="pw" id="clau_usuari">
		<br>
		<br>
		<label for="mail">EMAIL:</label>
		<br>
		<input type="text" name="email" id="mail">
		<br><br>
		<label for="rol">ROL:</label>
		<br>
		<input type="radio" name="radio" value="1">Administrador   
			<input type="radio" name="radio" value="2">Gestor
			<input type="radio" name="radio" value="3">Professor
			<br><br>
		<button name="nouuser" type="submit">NOU USUARI</button>
		<button name="moduser" type="submit">MODIFICAR USUARI</button>
	     </form>
	 </div>    

	 
	  <br><br> 

	<div class="form2">
	<form action="admin.php" method="post">   
		  <h2>ALTA & MODIFICACIÓ ROLS:</h2>
		<label for="nom_rol">NOM DE ROL:</label>
		<br>
		<input type="text" name="rol" id="nom_rol">
		<br><br>
		<label for="descripcio_incidencia">DESCRIPCIÓ DEL ROL:</label>
		<br>
		<input type="text" name="desc" id="nom_rol" cols="40" rows="5">
		<br><br>
		<button name="nourol" type="submit">NOU ROL</button>
		<button name="modrol" type="submit">MODIFICAR ROL</button>
		</form>
		
		<br><br>

		<form>
	     		 <input type="button" onclick="window.location.href = 'users_export.php';" value="EXPORTAR USUARIS"/>
	    	</form>
	</div>	


		<?php
		$con = mysqli_connect("localhost","adminbd","admin123","login") or die("conexion exitosa!");

		?>

		<?php
			if(isset($_POST['nouuser'])){ 
				$nom = $_POST['nom'];
				$username = $_POST['username'];
				$passwd = $_POST['pw'];
				$email = $_POST['email'];
				$rol = $_POST['radio'];

				$insertar = "INSERT INTO users (nom, username, password, email, rol) VALUES ('$nom', '$username', '$passwd', '$email','$rol')";
				$ejecutar = mysqli_query($con, $insertar);
				
				 if ($ejecutar === false ) {
			printf("error: %s\n", mysqli_error($con));
			}
		   }
		?>
		<?php
			if(isset($_POST['moduser'])){ 
				$nom = $_POST['nom'];
				$username = $_POST['username'];
				$passwd = $_POST['pw'];
				$email = $_POST['email'];
				$rol = $_POST['radio'];

				$modificar = "UPDATE  users SET nom='$nom', username='$username', password='$passwd', email='$email', rol='$rol' WHERE username='$username'";
				$ejecutar = mysqli_query($con, $modificar);
				
				 if ($modificar === false ) {
			printf("error: %s\n", mysqli_error($con));
			}
		   }
		?>
		
		
		
		<?php
			if(isset($_POST['nourol'])){ 
				$rol = $_POST['rol'];
				$desc = $_POST['desc'];
				
				$insertar = "INSERT INTO rols (rol, descripcio) VALUES ('$rol','$desc')";
				$ejecutar = mysqli_query($con, $insertar);
				
				 if ($ejecutar === false ) {
			printf("error: %s\n", mysqli_error($con));
			}
		   }
		?>
		<?php
			if(isset($_POST['modrol'])){ 
				$rol = $_POST['rol'];
				$desc = $_POST['desc'];
				
				$modif = "UPDATE rols SET rol='$rol', descripcio='$desc' WHERE rol='$rol'";
				$ejecutar = mysqli_query($con, $modif);
				
				 if ($ejecutar === false ) {
			printf("error: %s\n", mysqli_error($con));
			}
		   }
		?>

	<br><br><br>


	<?php

	$link = mysqli_connect("localhost", "adminbd", "admin123", "login");

	$sql = "SELECT * from users order by id";

	if($resultado = mysqli_query($link, $sql)){
	if(mysqli_num_rows($resultado) > 0){
		echo "<table align='center' class='table table-striped' id='userTbl' >";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>NOM</th>";
		echo "<th>USERNAME</th>";
		echo "<th>PASSWORD</th>";
		echo "<th>EMAIL</th>";
		echo "<th>ROL</th>";
		echo "</tr>";

		while($row = mysqli_fetch_array($resultado)){
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['nom'] . "</td>";
			echo "<td>" . $row['username'] . "</td>";
			echo "<td>" . $row['password'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['rol'] . "</td>";
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

	<br><br><br>
		
	</body>
</html>
	

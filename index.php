<html>
	<head>
	  <title>LOGIN</title>
	  <link rel="stylesheet" type="text/css" href="estil_login.css">

	<body>
	<img src="logo.png" class="logo" height="150" width="150">
	<div class="container">
		<form method="post" action="">
			<div id="div_login">
				<h1>LOGIN</h1>
				<div>
					<input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="USUARI" />
				</div>
				<br>
				<div>
					<input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="CONTRASENYA"/>
				</div>
				<br>
				<div>
					<input type="submit" value="ENTRAR" name="but_submit" id="but_submit" />
				</div>
			</div>
		</form>
	</div>

	<?php
	include "config.php";

	if(isset($_POST['but_submit'])){
	    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
	    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);
	   

	    if ($uname != "" && $password != ""){
		$sql_query = "select * from users where username='".$uname."' and password='".$password."'";
	 	$result = mysqli_query($con,$sql_query);
		$row = mysqli_fetch_array($result);
		$count = count($result);

		if($count > 0){
		    $_SESSION['uname'] = $uname;
		    $_SESSION['rol'] = $row['rol'];

			print_r($row);
		    header('Location: dashboard.php');

		}else{
		    echo "Usuari i/o contrasenya incorrecte!";
		}
	    }
	}
	?>

	</body>
</html>

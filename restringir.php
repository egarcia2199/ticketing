
<html>
<head>
<title>Pàgina restringida</title>
</head>
<body>
<? if ($coincideix=="si")
{
?>
<h2>Aquesta és una pàgina restringida!</h2>
<? }
else{
?> 
<p>Només pot accedir l'administrador de la pàgina! </p>

<a href="dashboard.php"> <button type="button">TORNAR A L'INICI</button> </a>

<? } ?>
</body>
</html>

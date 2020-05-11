<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/numberUserLive.php';

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Résultats de votre test</title>
		<link rel="stylesheet" href="css/styleResultatsTests.css" />
		
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h2>Résultats de votre test</h2></div>

		<table>

			<tr>
				<th>Reconnaissance de tonalité (score)</th>
				<th>Rythme cardiaque (en bpm)</th>
				<th>Température de la peau (en degré)
				<th>Réflexe sonore (temps en )</th>
				<th>Réflexe visuel (temps en )</th>
			</tr>

			<tr>
				<td>30<br/></td>
				<td>80<br/></td>
				<td>38<br/></td>
				<td>30<br/></td>
				<td>31<br/></td>


			</tr>

		</table>
		
	<img class="graph" src="radar.php">

	<div class="commentaire">
		<p><label for="comGestionnaire"> Commentaires du gestionnaire : </label></p>
			<p ><textarea name="comGestionnaire" id="comGestionnaire" size="50" rows="10" cols="50" ></textarea> </p>
	</div>

	<?php include("includes/footer.php"); ?>


	</body>
</html>	
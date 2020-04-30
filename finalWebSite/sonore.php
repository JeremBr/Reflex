<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Réflexe sonore</title>
		<link rel="stylesheet" href="css/tests/styleTemp.css" />
		<link rel="stylesheet" href="css/tests/styleReflexe.css" />
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h2>Réflexe sonore</h2></div>

		<div class="contenu">
			
			<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="Compte à rebours"/> 
		    </div>

			<div class="bouton"><p><a href="visuel.php" style="text-decoration:none">Réflexe visuel</a></p>
			</div>

			
			<div class="barre">
			<progress id="barreProgression" max="100" value="80">4/5 épreuves effectuées </progress><br/><br/>
			<label for="barreProgression">4/5 épreuves effectuées </label>
		    </div>
			

		</div>

	<?php include("includes/footer.php"); ?>



	</body>
</html>	
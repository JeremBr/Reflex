<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Reconnaissance de tonalité</title>
		<link rel="stylesheet" href="css/tests/styleReco.css" />
		
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h2>Reconnaissance de tonalité</h2></div>

		<div class="contenu">
			
			<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="Compte à rebours"/> 
		    </div>

			<div class="bouton"><p><a href="freqCard.php" style="text-decoration:none">Mesure du rythme cardiaque</a></p>
			</div>

			
			<div class="barre">
			<progress id="barreProgression" max="100" value="20">1/5 épreuve effectuée </progress><br/><br/>
			<label for="barreProgression">1/5 épreuve effectuée </label>
		    </div>
			

		</div>

	<?php include("includes/footer.php"); ?>


	</body>
</html>	
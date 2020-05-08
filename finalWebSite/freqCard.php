<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mesure du rythme cardiaque</title>
		<link rel="stylesheet" href="css/tests/styleReco.css" />
		<script type="text/javascript" src="js/rebours.js"></script>
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h2>Mesure du rythme cardiaque</h2></div>

		<div class="contenu">

			<div class="image">
			
				<div class="compte">
					<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="Compte à rebours"/> 
		    		</div>
		    		<div id="compte_a_rebours"></div>
		    		
		    	</div>
		    	<div class="reco"><img src="img/test5.png" alt="mesure du rythme cardiaque" title="mesure du rythme cardiaque"/> 
		    	</div>
		    </div>

			<div class="bouton"><p><a href="temp.php" style="text-decoration:none">Mesure de la température superficielle de la peau</a></p>
			</div>

			
			<div class="barre">
			<progress id="barreProgression" max="100" value="40">2/5 épreuves effectuées </progress><br/><br/>
			<label for="barreProgression">2/5 épreuves effectuées </label>
		    </div>
			

		</div>

	<?php include("includes/footer.php"); ?>


	</body>
	
</html>	
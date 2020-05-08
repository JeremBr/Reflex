<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=reflex', 'root', 'root');
    include 'function/cookie.php';

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mesure de la température</title>
		<link rel="stylesheet" href="css/tests/styleTemp.css" />
		<script type="text/javascript" src="js/rebours1.js"></script>
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h2>Mesure de la température</h2></div>

		<div class="contenu">

		<div class="image">
			
				<div class="compte">
					<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="Compte à rebours"/> 
		    		</div>
		    		<div id="cadre">
		    			<div id="compte_a_rebours"></div>
		    		</div>
		    	</div>
		    	<div class="temp"> <img src="img/test6.png" alt="temp"/>
		    	</div>
		    </div>
		   
		   
		   </div>
			</div>

			<div class="bouton"><p><a href="sonore.php" style="text-decoration:none">Réflexe sonore</a></p>
			</div>

			
			<div class="barre">
			<progress id="barreProgression" max="100" value="60">3/5 épreuves effectuées </progress><br/><br/>
			<label for="barreProgression">3/5 épreuves effectuées </label>
		    </div>
			

		</div>

	<?php include("includes/footer.php"); ?>



	</body>

	
</html>	
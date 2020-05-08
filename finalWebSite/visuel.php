<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=reflex', 'root', 'root');
    include 'function/cookie.php';

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Réflexe visuel</title>
		<link rel="stylesheet" href="css/tests/styleTemp.css" />
		<link rel="stylesheet" href="css/tests/styleReflexe.css" />
		<script type="text/javascript" src="js/rebours1.js"></script>
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h2>Réflexe visuel</h2></div>

		<div class="contenu">
			
			<div class="image">
			
				<div class="compte">
					<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="Compte à rebours"/> 
		    		</div>
		    		<div id="cadre">
		    			<div id="compte_a_rebours"></div>
		    		</div>
		    	</div>
		    	
		    	<div class="visuel"> <img src="img/test7.png" alt="visuel"/>
		 		  </div>
		    </div>

			<div class="bouton"><p><a href="resultatsTest.php" style="text-decoration:none">Envoi des résultats</a></p>
			</div>

			
			<div class="barre">
			<progress id="barreProgression" max="100" value="100">5/5 épreuves effectuées </progress><br/><br/>
			<label for="barreProgression">5/5 épreuves effectuées <br/><br/> Vous avez fini votre test ! </label>
		    </div>
		    
			

		</div>

	<?php include("includes/footer.php"); ?>



	</body>
	
</html>	
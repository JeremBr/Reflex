<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/numberUserLive.php';

    if(isset($_POST['idTest']) AND !empty($_POST['idTest'])){
    	

    	$resultat = rand(30,50); //intervalle à modifier


    	$idTest = $_POST['idTest'];

    	

    	$insertSon = $bdd->prepare("UPDATE test SET refVisuel = ? WHERE idTest = ?");
        $insertSon->execute(array($resultat, $idTest));
        
    } else {
    	header("Location: index.php");
    }

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Réflexe visuel</title>
		<link rel="stylesheet" href="css/tests/styleTemp.css" />
		<link rel="stylesheet" href="css/tests/styleReflexe.css" />
		<script type="text/javascript" src="js/rebours.js"></script>
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h2><?= trad("Réflexe visuel","Visual reflex") ?></h2></div>

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

			<!-- <div class="bouton"><p><a href="resultatsTest.php" style="text-decoration:none">Envoi des résultats</a></p>
			</div> -->

			<form method="POST" action="resultatsTest.php">

				<button type="submit" class="bouton" name="idTest" value="<?= $idTest ?>"><?= trad("Envoie des résultats","Send results") ?></button>
			</form>

			
			<div class="barre">
			<progress id="barreProgression" max="100" value="100"><?= trad("5/5 épreuves effectuées","5/5 tests performed") ?></progress><br/><br/>
			<label for="barreProgression"><?= trad("5/5 épreuves effectuées","5/5 tests performed") ?><br/><br/> <?= trad("Vous avez fini votre test !","You have finished your test !") ?> </label>
		    </div>
		    
			

		</div>

	<?php include("includes/footer.php"); ?>



	</body>
	
</html>	
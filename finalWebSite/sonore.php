<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/numberUserLive.php';


    if(isset($_POST['idTest']) AND !empty($_POST['idTest'])){
    	

    	$resultat = rand(40,50); //intervalle à modifier


    	$idTest = $_POST['idTest'];

    	

    	$insertSon = $bdd->prepare("UPDATE test SET refSonore = ? WHERE idTest = ?");
        $insertSon->execute(array($resultat, $idTest));
        
    } else {
    	header("Location: index.php");
    }

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Réflexe sonore</title>
		<link rel="stylesheet" href="css/tests/styleTemp.css" />
		<link rel="stylesheet" href="css/tests/styleReflexe.css" />
		<script type="text/javascript" src="js/rebours.js"></script>
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h2><?= trad("Réflexe sonore","Sound reflex") ?></h2></div>

		<div class="contenu">
			
			<div class="image">
			
				<div class="compte">
					<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="<?= trad("Compte à rebours","Countdown") ?>"/> 
		    		</div>
		    		<div id="cadre">
		    			<div id="compte_a_rebours"></div>
		    		</div>
		    	</div>
		    	<div class="sonore"><img src="img/test9.png" alt="sonore" title="sonore"/> 
		    	</div>
		    </div>

			<!-- <div class="bouton"><p><a href="visuel.php" style="text-decoration:none">Réflexe visuel</a></p>
			</div> -->

			<form method="POST" action="visuel.php">

				<button type="submit" class="bouton" name="idTest" value="<?= $idTest ?>"><?= trad("Réflexe visuel","Visual reflex") ?></button>
			</form>

			
			<div class="barre">
			<progress id="barreProgression" max="100" value="80"><?= trad("4/5 épreuves effectuées","4/5 tests performed") ?></progress><br/><br/>
			<label for="barreProgression"><?= trad("4/5 épreuves effectuées","4/5 tests performed") ?></label>
		    </div>
			

		</div>

	<?php include("includes/footer.php"); ?>



	</body>
	
</html>	
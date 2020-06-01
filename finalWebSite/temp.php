<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/numberUserLive.php';



    if(isset($_POST['idTest']) AND !empty($_POST['idTest'])){
    	

    	$resultat = rand(36,42); //intervalle à modifier


    	$idTest = $_POST['idTest'];

    	

    	$insertTemp = $bdd->prepare("UPDATE test SET temperature = ? WHERE idTest = ?");
        $insertTemp->execute(array($resultat, $idTest));

    } else {
    	header("Location: index.php");
    }

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mesure de la température</title>
		<link rel="stylesheet" href="css/tests/styleTemp.css" />
		<script type="text/javascript" src="js/rebours.js"></script>
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h2><?= trad("Mesure de la température","Temperature measurement") ?></h2></div>

		<div class="contenu">

		<div class="image">
			
				<div class="compte">
					<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="<?= trad("Compte à rebours","Countdown") ?>"/> 
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

			<!-- <div class="bouton"><p><a href="sonore.php" style="text-decoration:none">Réflexe sonore</a></p>
			</div> -->

			<form method="POST" action="sonore.php">

				<button type="submit" class="bouton" name="idTest" value="<?= $idTest ?>"><?= trad("Réflexe sonore","Sound reflex") ?></button>
			</form>

			
			<div class="barre">
			<progress id="barreProgression" max="100" value="60"><?= trad("3/5 épreuves effectuées","3/5 tests performed") ?></progress><br/><br/>
			<label for="barreProgression"><?= trad("3/5 épreuves effectuées","3/5 tests performed") ?></label>
		    </div>
			

		</div>

	<?php include("includes/footer.php"); ?>



	</body>

	
</html>	
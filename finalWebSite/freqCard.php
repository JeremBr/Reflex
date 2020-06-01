<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/numberUserLive.php';


    if(isset($_POST['idTest']) AND !empty($_POST['idTest'])){
    	

    	$resultat = rand(40,140); //intervalle à modifier
    	

    	

    	$idTest = $_POST['idTest'];

    	// //FAUT METTRE UN INSERT POUR idTest

    	$insertFreq = $bdd->prepare("UPDATE test SET freqCard = ? WHERE idTest = ?");
        $insertFreq->execute(array($resultat, $idTest));



    	//IL FAUT LUI ATTRIBUER DES VALEURS
    } else {
    	header("Location: index.php");
    }

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

	<div class="titre"><h2><?php echo trad("Mesure du rythme cardiaque","Heartbeat measurement")?></h2></div>

		<div class="contenu">

			<div class="image">
			
				<div class="compte">
					<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="Compte à rebours"/> 
		    		</div>
		    		<div id="texte"></div>
		    		<div id="compte_a_rebours"><a href="#" onclick="rebours(30,90)">Démarrer</a></div>
		    		
		    	</div>
		    	<div class="reco"><img src="img/test5.png" alt="mesure du rythme cardiaque" title="mesure du rythme cardiaque"/> 
		    	</div>
		    </div>

			<!-- <div class="bouton"><p><a href="temp.php" style="text-decoration:none">Mesure de la température superficielle de la peau</a></p>
			</div> -->

			<form method="POST" action="temp.php">

				<button type="submit" class="bouton" name="idTest" value="<?= $idTest ?>"><?php echo trad("Mesure de la température superficielle de la peau","Skin surface measurement")?></button>
			</form>

			
			<div class="barre">
			<progress id="barreProgression" max="100" value="40"><?php echo trad("2/5 épreuves effectuées ","2/5 tests performed")?></progress><br/><br/>
			<label for="barreProgression"><?php echo trad("2/5 épreuves effectuées ","2/5 tests performed")?></label>
		    </div>
			

		</div>

	<?php include("includes/footer.php"); ?>


	</body>
	
</html>	
<?php
    

    if(isset($_GET['id']) AND !empty($_GET['id'])){
    	

    	
    	$resultat = rand(80,100); //intervalle à modifier
    	

    	$insertToken = $bdd->prepare("INSERT INTO test(idUtilisateur, RecoTona) VALUES(?, ?)");
        $insertToken->execute(array($_GET['id'], $resultat));


        
        $last_id = $bdd->lastInsertId();

    	//IL FAUT LUI ATTRIBUER DES VALEURS
    } else {
    	header("Location: accueil");
    }

?>

<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?= trad("Reconnaissance de tonalité","Tone recognition") ?></title>
		<link rel="stylesheet" href="css/tests/styleTest.css" />
		<script type="text/javascript" src="js/rebours.js"></script>
		<script src="js/help.js"></script>

	</head>

	<body>


	<div class="titre"><h2><?= trad("Reconnaissance de tonalité","Tone recognition") ?></h2></div>

	<section class="conteneur1">
		<section class="conteneur2">
				
			<div class="image">
				<img src="img/test8.png" alt="Reconnaissance de tonalite" title="<?=trad("Reconnaissance de tonalité","Tone recognition")?>"/>
			</div>

			<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="<?=trad("Compte à rebours","Countdown")?>"/></div>

			<div id="texte"></div>

			<button type="button" class="boutonRebours" id="compte_a_rebours" onclick="rebours(30,90)"><?= trad("Démarrer","Start") ?></button>

			<button type="button" class="boutonHelp" name="idHelp" onclick ="helpReco()"><?= trad("Aide","Help") ?></button>
			
			<form method="POST" action="test/freqCard">
				<button type="submit" class="boutonSubmit" name="idTest" value="<?= $last_id ?>"><?= trad("Mesure du rythme cardiaque","Heartbeat measurement") ?></button>
			</form>

			<div class="barre">
				<progress id="barreProgression" max="100" value="20"><?= trad("1/5 épreuve effectuée","1/5 test performed") ?></progress><br/><br/>
			</div>

			<label for="barreProgression"><?= trad("1/5 épreuve effectuée","1/5 test performed") ?></label>

		</section>
	</section>



	</body>

</html>	
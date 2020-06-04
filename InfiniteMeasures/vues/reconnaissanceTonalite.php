<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?= trad("Reconnaissance de tonalité","Tone recognition") ?></title>
		<link rel="stylesheet" href="css/styleTest.css" />
		<link rel="stylesheet" href="css/titreEtBloc.css" />
		<script type="text/javascript" src="js/rebours.js"></script>
		<script src="js/help.js"></script>

	</head>

	<body>


	<h2><?= trad("Reconnaissance de tonalité","Tone recognition") ?></h2>

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
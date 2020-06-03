<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title>Mesure de la température</title>
		<link rel="stylesheet" href="css/tests/styleTest.css" />
		<script type="text/javascript" src="js/rebours.js"></script>
		<script src="js/help.js"></script>
	</head>

	<body>

	

	<div class="titre"><h2><?= trad("Mesure de la température","Temperature measurement") ?></h2></div>

	<section class="conteneur1">
		<section class="conteneur2">
				
			<div class="image">
				<img src="img/test6.png" alt="temp" title="<?=trad("Mesure de température","Temperature measurement")?>"/>
			</div>

			<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="<?=trad("Compte à rebours","Countdown")?>"/></div>

			<div id="texte"></div>

			<button type="button" class="boutonRebours" id="compte_a_rebours" onclick="rebours(30,90)"><?= trad("Démarrer","Start") ?></button>

			<button type="button" class="boutonHelp" name="idHelp" onclick ="helpTemp()"><?= trad("Aide","Help") ?></button>
			
			<form method="POST" action="test/sonore">
				<button type="submit" class="boutonSubmit" name="idTest" value="<?= $idTest ?>"><?= trad("Réflexe sonore","Sound reflex") ?></button>
			</form>

			<div class="barre">
				<progress id="barreProgression" max="100" value="60"><?= trad("3/5 épreuves effectuées","3/5 tests performed") ?></progress><br/><br/>
			</div>

			<label for="barreProgression"><?= trad("3/5 épreuves effectuées","3/5 tests performed") ?></label>

		</section>
	</section>

	



	</body>

	
</html>	
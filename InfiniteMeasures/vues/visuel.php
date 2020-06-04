<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?=trad("Mesure à un stimulus visuel","Measurement to a visual stimulus")?></title>
		<link rel="stylesheet" href="css/styleTest.css" />
		<link rel="stylesheet" href="css/titreEtBloc.css" />
		<script type="text/javascript" src="js/rebours.js"></script>
	</head>

	<body>

	<h2><?= trad("Mesure à un stimulus visuel","Measurement to a visual stimulus") ?></h2>

	<section class="conteneur1">
		<section class="conteneur2">
				
			<div class="image">
				<img src="img/test7.png" alt="visuel" title="<?=trad("Mesure à un stimulus visuel","Measurement to a visual stimulus")?>"/>
			</div>

			<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="<?=trad("Compte à rebours","Countdown")?>"/></div>

			<div id="texte"></div>

			<button type="button" class="boutonRebours" id="compte_a_rebours" onclick="rebours(30,90)"><?= trad("Démarrer","Start") ?></button>

			<button type="button" class="boutonHelp" name="idHelp" onclick ="helpVisuel()"><?= trad("Aide","Help") ?></button>
			
			<form method="POST" action="test/resultats">
				<button type="submit" class="boutonSubmit" name="idTest" value="<?= $idTest ?>"><?= trad("Envoie des résultats","Send results") ?></button>
			</form>

			<div class="barre">
				<progress id="barreProgression" max="100" value="100"><?= trad("5/5 épreuves effectuées","5/5 tests performed") ?></progress><br/><br/>
			</div>

			<label for="barreProgression"><?= trad("5/5 épreuves effectuées","5/5 tests performed") ?><br/><br/> <?= trad("Vous avez fini votre test !","You have finished your test !") ?> </label>

		</section>
	</section>



	</body>
	
</html>	
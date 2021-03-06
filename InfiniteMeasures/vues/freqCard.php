<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?=trad("Mesure du rythme cardiaque","Heart rate measurement")?></title>
		<link rel="stylesheet" href="css/styleTest.css" />
		<link rel="stylesheet" href="css/titreEtBloc.css" />
		<script type="text/javascript" src="js/rebours.js"></script>
		<script src="js/help.js"></script>
	</head>

	<body>


	<h2><?php echo trad("Mesure du rythme cardiaque","Heartbeat measurement")?></h2>

	<section class="conteneur1">
		<section class="conteneur2">
				
			<div class="image">
				<img src="img/test5.png" alt="mesure du rythme cardiaque" title="<?=trad("Mesure du rythme cardiaque","Heart rate measurement")?>"/>
			</div>

			<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="<?=trad("Compte à rebours","Countdown")?>"/></div>

			<div id="texte"></div>

			<button type="button" class="boutonRebours" id="compte_a_rebours" onclick="rebours(30,90)"><?= trad("Démarrer","Start") ?></button>

			<button type="button" class="boutonHelp" name="idHelp" onclick ="helpCard()"><?= trad("Aide","Help") ?></button>
			
			<form method="POST" action="test/temp">
				<button type="submit" class="boutonSubmit" name="idTest" value="<?= $idTest ?>"><?= trad("Mesure de la température superficielle de la peau","Skin surface measurement") ?></button>
			</form>

			<div class="barre">
				<progress id="barreProgression" max="100" value="40"><?= trad("2/5 épreuves effectuées ","2/5 tests performed") ?></progress><br/><br/>
			</div>

			<label for="barreProgression"><?= trad("2/5 épreuves effectuées ","2/5 tests performed") ?></label>
			
		</section>
	</section>


	</body>
	
</html>	
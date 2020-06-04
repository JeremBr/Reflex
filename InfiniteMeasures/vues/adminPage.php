<!DOCTYPE html>
<html>

	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet">
        <link href="css/titreEtBloc.css" rel="stylesheet">
        <link href="css/adminPage.css" rel="stylesheet">


		<title><?php echo trad("Page Administrateur","Administrator page")?></title>
	</head>

	<body>
		
		<h2>Informations Générales</h2>

		          <section class="conteneur1">
                  <section class="conteneur2">
                  <div class="conteneur3">
		<div class="texte1">
		<p>
			<?php echo trad("Actuellement","Right now")?> <?php echo $user_nbr; ?> <?php echo trad("utilisateur","users")?><?php if($user_nbr != 1) { echo "s"; } ?> <?php echo trad("en ligne","online")?><br />
		</p>

		<p>
			Au total <?php echo $data['total']; ?> tests ont été réalisés.
		</p>

		</div>

		<br/>

		<img class="graph" src="http://localhost/InfiniteMeasures/jpgraph/radar.php?rec=<?= $moyenneReco; ?>&freq=<?= $moyenneFreq; ?>&temp=<?= $moyenneTemp; ?>&son=<?= $moyenneSono; ?>&vis=<?= $moyenneVisu; ?>">

		<div class="texte2">
		<p>Moyenne reconnaissance de tonalité : <?= $moyenneReco; ?></p><br/>
		<p>Moyenne fréquence cardiaque : <?= $moyenneFreq; ?></p><br/>
		<p>Moyenne température corporel: <?= $moyenneTemp; ?></p><br/>
		<p>Moyenne réflexe sonore : <?= $moyenneSono; ?></p><br/>
		<p>Moyenne réflexe visuel : <?= $moyenneVisu; ?></p>
		</div>
			          </div>
			          </section>
            		  </section>
              


		
	</body>
</html>
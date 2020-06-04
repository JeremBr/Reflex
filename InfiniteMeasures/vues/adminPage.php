<!DOCTYPE html>
<html>

	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet">

		<title><?php echo trad("Page Administrateur","Administrator page")?></title>
	</head>

	<body>
		
		<p>
			<?php echo trad("Actuellement","Right now")?> <?php echo $user_nbr; ?> <?php echo trad("utilisateur","users")?><?php if($user_nbr != 1) { echo "s"; } ?> <?php echo trad("en ligne","online")?><br />
		</p>

		<p>
			Au total <?php echo $data['total']; ?> tests ont été réalisés.
		</p>
		<br/>

		<img class="graph" src="http://localhost/InfiniteMeasures/jpgraph/radar.php?rec=<?= $moyenneReco; ?>&freq=<?= $moyenneFreq; ?>&temp=<?= $moyenneTemp; ?>&son=<?= $moyenneSono; ?>&vis=<?= $moyenneVisu; ?>">

		<p>Moyenne reconnaissance Tonalité : <?= $moyenneReco; ?></p><br/>
		<p>Moyenne reconnaissance Tonalité : <?= $moyenneFreq; ?></p><br/>
		<p>Moyenne reconnaissance Tonalité : <?= $moyenneTemp; ?></p><br/>
		<p>Moyenne reconnaissance Tonalité : <?= $moyenneSono; ?></p><br/>
		<p>Moyenne reconnaissance Tonalité : <?= $moyenneVisu; ?></p>
			
			


		
	</body>
</html>
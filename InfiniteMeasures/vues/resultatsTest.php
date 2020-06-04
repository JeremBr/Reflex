<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?= trad("Résultats de votre test","Test results") ?></title>
		<link rel="stylesheet" href="css/styleResultatsTests.css" />
		<link rel="stylesheet" href="css/titreEtBloc.css" />
	</head>

	<body>

	
			
		<h2><?= trad("Résultats de votre test","Test results") ?></h2>

		<section class="conteneur1">
			<table>

				<tr>
					<th><?= trad("Reconnaissance de tonalité (score)","Tone recognition (score)") ?></th>
					<th><?= trad("Rythme cardiaque (en bpm)","Heartbeat (in bpm)") ?></th>
					<th><?= trad("Température de la peau (en degré)","Skin temperature (in degree celsius") ?></th>
					<th><?= trad("Réflexe sonore (temps en )","Sound reflex (time in )") ?></th>
					<th><?= trad("Réflexe visuel (temps en )","Visual reflex (time in )") ?></th>
				</tr>

				<tr>
					<td> <?= $results['RecoTona']; ?><br/></td>
					<td> <?= $results['freqCard']; ?><br/></td>
					<td> <?= $results['temperature']; ?><br/></td>
					<td> <?= $results['refSonore']; ?><br/></td>
					<td> <?= $results['refVisuel']; ?><br/></td>
				</tr>

			</table>
			<img class="graph" src="./img/FR.png">
				
			<img class="graph" src="radar.php?rec=<?= $results['RecoTona']; ?>&freq=<?= $results['freqCard']; ?>&temp=<?= $results['temperature']; ?>&son=<?= $results['refSonore']; ?>&vis=<?= $results['refVisuel']; ?>">

			<?php if(isset($access)){
				if( ($access == 1) OR ($access == 2) ){

			?>
			<form method="POST" action="test/resultats" enctype="multipart/form-data">
				<div class="commentaire">
					<p><label for="comGestionnaire"> Commentaires du gestionnaire : </label></p>
					<p ><textarea name="comGestionnaire" size="50" rows="10" cols="50" ><?= $results['comment']; ?></textarea> </p>
				</div> 
				<input type="submit" value="<?php echo trad("Envoyer","Update CGU") ?>" />
			</form>

			<?php 
				}else if($access == 0){

				} else {
					header("Location: accueil");
				}
			} else {
				header("Location: accueil");
			}
<<<<<<< Updated upstream
		?>
=======
			?>
>>>>>>> Stashed changes
			

		</section>
		



	</body>
</html>	
<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/cgu.css" rel="stylesheet">
		<link href="css/footer.css" rel="stylesheet">
      	<link href="css/header.css" rel="stylesheet">
      	<link href="css/titreEtBloc.css" rel="stylesheet">
	
		<title><?php echo trad("Conditions Générales d'Utilisation","Edit Terms and Conditions")?></title>
	</head>
	<body>

		<section id="cgu">
			<div class="wrapper">
				<h2><?php echo trad("Conditions Générales d'Utilisation","Edit Terms and Conditions")?></h2>
			</div>
	
		<section class="conteneur1">
			<section class="conteneur2">
				<div class="conteneur3">

				<h1><?php echo trad("Réglement	","Rules	")?></h1> <br/>


				<?php
					$allCgu = $bdd->query('SELECT * FROM cgu');
					while($cgu = $allCgu->fetch())
					{
				?>	
	
				<h5>Article <?= $cgu['article'] ?> :</h5> <p> <br/> <?= $cgu['texte'] ?></p>
		
				<?php 
					}
				?>

				</div>
			</section>
    	</section>

	
		</section>
		

	</body>
</html>
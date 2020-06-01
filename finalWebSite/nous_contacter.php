<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/numberUserLive.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/contacter.css" rel="stylesheet">

		<title>Reflex</title>
	</head>
	<body>

	<?php include("includes/header.php"); ?>
		







		<section id="contact">
			<div class="wrapper">
				<h3><?= trad("Nous contacter","Contact us") ?></h3>


				<strong><div class="faq"><?= trad("Consulter la","Check up the") ?><U><a href="FAQ.php" >F.A.Q,</a></U> <?= trad("votre question a peut-être déjà été posée","Your question might have already been asked") ?></strong></div>
				

				<form>
	
	  <!--PARTIE DROITE-->
    <div id="droite">

    <strong><?= trad("Accueil du centre","Reception center") ?></strong> 
   		<br>
   		<br>

    		<a href="tel:+33142223344"><?= trad("Téléphone : 01 42 22 33 44","Phone number : 01 42 22 33 44") ?></a>
    			<br>

    		<a href="mailto:reflex@gmail.com"> <?= trad("Mail : reflex@gmail.com","Email : reflex@gmail.com") ?></a><br/>
    		<a class="contacter" href="mailUtilisateur.php?mailto=centre"><?= trad("Contacter","Contact") ?></a>
</div>

	<!--PARTIE GAUCHE-->
	    <div id="gauche">
		
	<strong><?= trad("Administrateurs","Administrators") ?></strong>
		<br>
   		<br>

			<a href="tel:+33642223344"><?= trad("Téléphone : 06 42 22 33 44","Phone number : 06 42 22 33 44") ?></a>
    			<br>

    		<a href="mailto:reflex.admin@gmail.com"> <?= trad("Mail : reflex.admin@gmail.com","Email : reflex.admin@gmail.com") ?></a> <br/>
    		<a class="contacter" href="mailUtilisateur.php?mailto=admin"><?= trad("Contacter","Contact") ?></a>
		<br>
	   	<br>


	<strong><?= trad("Gestionnaires","Managers") ?></strong>
		<br>
	   	<br>

			<a href="tel:+33642226678"><?= trad("Téléphone : 06 42 22 66 78","Phone number : 06 42 22 66 78") ?></a>
    			<br>

    		<a href="mailto:reflex.gestio@gmail.com"><?= trad("Mail : reflex.gestio@gmail.com","Email : reflex.gestio@gmail.com") ?></a><br/>
    		<a class="contacter" href="mailUtilisateur.php?mailto=gestio"><?= trad("Contacter","Contact") ?></a>


		</div>
					
				</form>
			</div>
		</section>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>




	<?php include("includes/footer.php"); ?>


	</body>
</html>
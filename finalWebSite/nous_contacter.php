<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=reflex', 'root', '');
    include 'function/cookie.php';

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
				<h3>Nous contacter</h3>


				<strong><div class="faq"> Consultez la <U><a href="FAQ.php" >FAQ,</a></U> votre question a peut-être déjà été posée </strong></div>
				

				<form>
	
	  <!--PARTIE DROITE-->
    <div id="droite">

    <strong>Accueil du centre</strong> 
   		<br>
   		<br>

    		<a href="tel:+33142223344">Téléphone : 01 42 22 33 44</a>
    			<br>

    		<a href="mailto:adresse@serveur.com"> Email : reflex@gmail.com</a><br/>
    		<a class="contacter" href="mailUtilisateur.php">Contacter</a>
</div>

	<!--PARTIE GAUCHE-->
	    <div id="gauche">
		
	<strong>Administrateurs</strong>
		<br>
   		<br>

			<a href="tel:+33642223344">Téléphone : 06 42 22 33 44</a>
    			<br>

    		<a href="mailto:adresse@serveur.com"> Email : reflex.admin@gmail.com</a> <br/>
    		<a class="contacter" href="mailUtilisateur.php">Contacter</a>
		<br>
	   	<br>


	<strong>Gestionnaires</strong>
		<br>
	   	<br>

			<a href="tel:+33642226678">Téléphone : 06 42 22 66 78</a>
    			<br>

    		<a href="mailto:adresse@serveur.com"> Email : reflex.gestio@gmail.com</a><br/>
    		<a class="contacter" href="mailUtilisateur.php">Contacter</a>


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
<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/footer.css" rel="stylesheet">
		<link href="css/header.css" rel="stylesheet">
		
		<title>Reflex</title>
	</head>
	<body>
		<?php include("includes/header.php"); ?>

		<section id="main-image">
			<div class="wrapper">
				<h2>Faites votre test<br><strong>dès maintenant !</strong></h2>
				<?php if(isset($_COOKIE["idUtilisateur"])){
					?><a href="monCompte.php" class="button-1">Par ici !</a> <?php 
				}else{
					?> <a href="connexion.php" class="button-1">Par ici !</a> <?php
				}?>
				
			</div>
		</section>

		<section id="steps">
			<div class="wrapper">
				<ul>
					<li id="step-1">
						<h4>Planifier</h4>
						<p>Planifiez vos tests.</p>
					</li>
					<li id="step-2">
						<h4>Organiser</h4>
						<p>Bénéficiez de l'expertise de nos spécialistes, ils vous accompagnent dans la réalisation de vos tests.</p>
					</li>
					<li id="step-3">
						<h4>Tester</h4>
						<p>Nous nous chargeons de vous produire les meilleurs tests possible.</p>
					</li>

					<div class="clear"></div>
				</ul>
			</div>
		</section>


		<section id="possibilities">
			<div class="wrapper">
				<article style="background-image: url(img/test8.png)">
					<div class="overlay">
						<h4>Reconnaissance de la tonalité</h4>
						<p><small>L'objectif est de vous faire écouter un son pré-enregistré via un casque audio et de vous demander de le reproduire en chantant dans le micro </small></p>
						
					</div>
				</article>

				<article style="background-image: url(img/test6.png)">
					<div class="overlay">
						<h4>Mesure de la température de la peau</h4>
						<p><small>Nous allons mesurer la température superficielle de votre peau afin d'évaluer votre niveau de stress</small></p>
						
					</div>
				</article>
				<article style="background-image: url(img/test5.png)">
					<div class="overlay">
						<h4>Mesure du rythme cardiaque</h4>
						<p><small>Le principe est simple, vous posez votre doigt sur une LED et cela mesurera votre fréquence, soit votre nombre de battements par minute </small></p>
						
					</div>
				</article>
				<article style="background-image: url(img/test9.png)">
					<div class="overlay">
						<h4>Reflex sonore</h4>
						<p><small>Le but est de déterminer le temps que vous mettez à appuyer sur un bouton poussoir à partir du moment où vous entendez un son dans le casque</small></p>
						
					</div>
				</article>
				<article style="background-image: url(img/test7.png)">
					<div class="overlay">
						<h4>Reflex visuel</h4>
						<p><small>L’objectif étant de mesurer votre temps de réaction en appuyant sur un bouton le plus rapidement possible dès que vous voyez une LED s’allumer</small></p>
						
					</div>
				</article>

				<div class="clear"></div>
			</div>
		</section>

		<!-- <section id="contact">
			<div class="wrapper">
				<h3>Contactez-nous</h3>
				<p>Chez Reflex bla bla bla bla bla. C'est pourquoi nous mettons un point d'honneur à prendre en compte chacune de VOS attentes pour VOUS aider dans la préparation de VOS projets.</p>

				<form>
					<label for="name">Nom :</label>
					<input type="text" id="name" placeholder="Votre nom">

					<label for="email">Email :</label>
					<input type="text" id="email" placeholder="Votre email">

					<input type="submit" value="OK" class="button-3">
				</form>
			</div>
		</section>
 -->

		<?php include("includes/footer.php"); ?>
	</body>
</html>
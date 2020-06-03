<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet">
		<title>Reflex</title>
	</head>


	<body>

		<section id="main-image">
			<div class="wrapper">
				<h2><?php echo trad("Faites votre test","Run your test")?><br><strong><?php echo trad("dès maintenant !","now !")?></strong></h2>
				<?php if(isset($_COOKIE["idUtilisateur"])){
					?><a href="compte" class="button-1"><?php echo trad("Par ici !","Here !")?></a> <?php 
				}else{
					?> <a href="connexion" class="button-1"><?php echo trad("Par ici !","Here !")?></a> <?php
				}?>
				
			</div>
		</section>
		

		<section id="steps">
			<div class="wrapper">
				<ul>
					<li id="step-1">
						<h4><?php echo trad("Planifier","Schedule")?></h4>
						<p><?php echo trad("Planifiez vos tests","Schedule your test.")?></p>
					</li>
					<li id="step-2">
						<h4><?php echo trad("Organiser","Organize")?></h4>
						<p><?php echo trad("Bénéficiez de l'expertise de nos spécialistes, ils vous accompagnent dans la réalisation de vos tests.","Benefit from the expertise of our specialists, they accompany you in the realization of your test.")?></p>
					</li>
					<li id="step-3">
						<h4><?php echo trad("Tester","Test")?></h4>
						<p><?php echo trad("Nous nous chargeons de vous produire les meilleurs tests possible.", "We take care of producing you the best test.") ?></p>
					</li>

					<div class="clear"></div>
				</ul>
			</div>
		</section>


		<section id="possibilities">
			<div class="wrapper">
				<article style="background-image: url(./img/test8.png)">
					<div class="overlay">
						<h4><?php echo trad("Reconnaissance de la tonalité","Tone recognition") ?></h4>
						<p><small><?php echo trad("L'objectif est de vous faire écouter un son pré-enregistré via un casque audio et de vous demander de le reproduire en chantant dans le micro ","The goal is to make you listen to a pre-recorded sound via a headphone and ask you to reproduce it by singing in the microphone ") ?></small></p>
						
					</div>
				</article>

				<article style="background-image: url(./img/test6.png)">
					<div class="overlay">
						<h4><?php echo trad("Mesure de la température de la peau","Temperature Measurement") ?></h4>
						<p><small><?php echo trad("Nous allons mesurer la température superficielle de votre peau afin d'évaluer votre niveau de stress","We will measure the surface temperature of your skin to assess your stress level") ?></small></p>
						
					</div>
				</article>
				<article style="background-image: url(./img/test5.png)">
					<div class="overlay">
						<h4><?php echo trad("Mesure du rythme cardiaque","Heart rate monitoring") ?></h4>
						<p><small><?php echo trad("Le principe est simple, vous posez votre doigt sur une LED et cela mesurera votre fréquence, soit votre nombre de battements par minute","The concept is simple, you place your finger on a LED and it will measure your frequency, which is your beats per minute ")?> </small></p>
						
					</div>
				</article>
				<article style="background-image: url(./img/test9.png)">
					<div class="overlay">
						<h4><?php echo trad("Reflexe sonore","Sound reflex") ?></h4>
						<p><small><?php echo trad("Le but est de déterminer le temps que vous mettez à appuyer sur un bouton poussoir à partir du moment où vous entendez un son dans le casque","The goal is to determine how long it takes you to press a push button from the moment you hear a sound in the headphones") ?></small></p>
						
					</div>
				</article>
				<article style="background-image: url(./img/test7.png)">
					<div class="overlay">
						<h4><?php echo trad("Reflexe visuel","Visual reflex") ?></h4>
						<p><small><?php echo trad("L’objectif étant de mesurer votre temps de réaction en appuyant sur un bouton le plus rapidement possible dès que vous voyez une LED s’allumer","The objective is to measure your reaction time by pressing a button as quickly as possible as soon as you see a LED light up") ?></small></p>
						
					</div>
				</article>

				<div class="clear"></div>
			</div>
		</section>

	</body>
</html>
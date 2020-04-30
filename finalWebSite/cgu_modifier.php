<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/access.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/cgu.css" rel="stylesheet">

		
	
		<title>Reflex</title>
	</head>
	<body>

		<?php include("includes/header.php"); ?>

		<?php

		if(isset($access)){
			if(($access == 1) OR ($access == 2)){

				?>


				<section id="cgu">
					<div class="wrapper">
						<h3>Gérer la CGU</h3>
					</div>
				</section>


				<section id="reglement">
					
			<div class="rectangle">Réglement
				
				<input type=button  value=EditerCGU class="button1"/>

				<input type=button  value=AjouterArticle class="button2"/>

				<input type=button  value=SupprimerArticle class="button3"/>

			</div>
			
				</section>

				
				<div class="carré">


				<H5>Article 1.1 :</H5> <H6>L'accès au Site est possible 24 heures sur 24, 7 jours sur 7, sauf en cas d'éventuelles pannes du Site ainsi que des interventions de maintenance nécessaires au bon fonctionnement du Site. </H6>
				<input type="checkbox" >
			
		<br>


			
			
			
				<H5>Article 1.2 :</H5>  <H6>Le service clientèle est disponible par téléphone au 01 42 22 33 44 du lundi au vendredi de 9h00 à 18h00. </H6> 
				<input type="checkbox" >
			
		<br>





				<H5>Article 2 : </H5> <H6>Le compte ouvert par l’Utilisateur est personnel. L’Utilisateur est seul responsable de sa gestion et de son utilisation. Toute connexion effectuée dans le cadre de l’utilisation des Services sera réputée avoir été réalisée par l’Utilisateur et sous sa responsabilité exclusive. </H6>
				<input type="checkbox" >
			
		<br>



				<H5>Article 2.2 : </H5> <H6> L’Utilisateur demeure l’unique responsable de la protection du mot de passe qu’il utilise pour accéder aux Services ainsi que pour l’ensemble des actions nécessitant une authentification avec mot de passe sur le Site. </H6>
				<input type="checkbox" >
			
		<br>
				<H5>Article 3 : </H5> <H6> Les Utilisateurs sont informés que des traceurs (« Cookies ») sont utilisés lors de la consultation du Site. Les Utilisateurs sont invités à prendre connaissance de la Politique dédiée liée à la gestion des cookies. </H6>
				<input type="checkbox" >


		<br>

				<H5>Article 4 : </H5> <H6> Les CGU sont soumises à la loi française.</H6>
				<input type="checkbox" >
						
				



		</div>

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

		
		<?php
			}
		} else {
			header("Location: connexion.php");
		}
		?>


		

		<?php include("includes/footer.php"); ?>

	</body>
</html>







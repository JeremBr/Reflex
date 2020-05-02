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
		<link href="css/cgu.css" rel="stylesheet">
		<link href="css/footer.css" rel="stylesheet">
      	<link href="css/header.css" rel="stylesheet">

		<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
	
		<title>Reflex</title>
	</head>
	<body>

		<?php include("includes/header.php"); ?>



		<section id="cgu">
			<div class="wrapper">
				<h3>CGU</h3>
			</div>
		</section>

		
		<div class="carré"> 

				<h1>Réglement	</h1> <br>
	
			<h5>Article 1.1 :</h5> <h6> <br/> L'accès au Site est possible 24 heures sur 24, 7 jours sur 7, sauf en cas d'éventuelles pannes du Site ainsi que des interventions de maintenance nécessaires au bon fonctionnement du Site. </h6>
		

	<br>
		
		
		
			<h5>Article 1.2 :</h5>  <h6> <br/>Le service clientèle est disponible par téléphone au 01 42 22 33 44 du lundi au vendredi de 9h00 à 18h00. </h6> 
		

	<br>



			<h5>Article 2.1 : </h5> <h6> <br/> Le compte ouvert par l’Utilisateur est personnel. L’Utilisateur est seul responsable de sa gestion et de son utilisation. Toute connexion effectuée dans le cadre de l’utilisation des Services sera réputée avoir été réalisée par l’Utilisateur et sous sa responsabilité exclusive. </h6>
		
	<br>


			<h5>Article 2.2 : </h5> <h6> <br/> L’Utilisateur demeure l’unique responsable de la protection du mot de passe qu’il utilise pour accéder aux Services ainsi que pour l’ensemble des actions nécessitant une authentification avec mot de passe sur le Site. </h6>
		

	<br>
			<h5>Article 3 : </h5> <h6> <br/> Les Utilisateurs sont informés que des traceurs (« Cookies ») sont utilisés lors de la consultation du Site. Les Utilisateurs sont invités à prendre connaissance de la Politique dédiée liée à la gestion des cookies. </h6>


	<br>

			<h5>Article 4 : </h5> <h6> <br/> Les CGU sont soumises à la loi française.</h6>



		</div>
	</div>

	<br>
	<br>
	<br>
	<br>
	<br>
	
		

		<?php include("includes/footer.php"); ?>

	</body>
</html>
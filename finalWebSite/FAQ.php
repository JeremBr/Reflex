<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>FAQ</title>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/footer.css" rel="stylesheet">
      	<link href="css/header.css" rel="stylesheet">
      	<link href="css/styleFAQ.css" rel="stylesheet">
	</head>
	<body>

		<?php include("includes/header.php"); ?>
		
		<div class="faq">
			<p class="question"> Question : Pourquoi Infinite Measures ?  </p>
			<p class="réponse"> Réponse : Infinite Measure s'engage à accompagner chacun de ses clients durant leurs tests.
				Signer chez Infinite Measures, c'est signer pour des tests de confiance.<br/></p>
			<br/>

			<p class="question"> Question : Comment être sûr que les tests ne soient pas faussés ?  </p>
			<p class="réponse"> Réponse : Nos tests ont été élaborés avec soin par des spécialistes pour votre plus grand bien.<br/></p>
			<br/>

			<p class="question"> Question : Mettre une question ici</p>
			<p class="réponse"> Réponse : Mettre une réponse ici <br/></p>
			<br/>

			<p class="question"> Question : Quel est le sens de la vie ? </p>
			<p class="réponse"> Réponse : 42 <br/></p>


		</div>

		<?php include("includes/footer.php"); ?>


	</body>
	</html>
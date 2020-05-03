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
		
		<p> <h2>  Foire aux Questions </h2>
		</p>

		<div class="faq">
			<p class="question1"> Question : Qui Sommes-nous ?  </p>
			<br/><br/>
			<p class="réponse"> Réponse : </p>
			 <p class="suiteréponse">Infinite Measures est un installateur de solutions «clé en main» pour les centres d’évaluation psychotechniques. Nous développons les tests qui prouve que vous êtes capable de conduire!<br/></p>
			<br/>

			<p class="question"> Question : A quoi servent les tests ? </p>
			<br/><br/>
			<p class="réponse"> Réponse : </p>
			 <p class="suiteréponse">Les tests que nous produisons permettent de déterminer l'aptitude ou non d'un conducteur à repasser le code après que ce dernier le lui ait été retiré.<br/></p>
			<br/>

			<p class="question"> Question : Où puis-je consulter mes tests ? </p>
			<br/><br/>
			<p class="réponse"> Réponse :</p>
			 <p class="suiteréponse">Les tests sont disponible dans la rubrique "Mes résultats" dans votre espace personnel.
				<br/><br/>


			<p class="question"> Question : Qui peut voir mes résultats ? </p>
			<br/><br/>
			<p class="réponse"> Réponse :</p>
			 <p class="lastréponse">Les seuls personnes pouvant avoir accès à vos résultats sont vous et les  gestionnaires des tests. Nous tenons à ce que ces infos restent confidentiels pour le  bien de nos clients. <br/></p>


		</div>

		<?php include("includes/footer.php"); ?>


	</body>
	</html>
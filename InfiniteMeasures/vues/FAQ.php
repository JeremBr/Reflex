<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title>FAQ</title>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/footer.css" rel="stylesheet">
      	<link href="css/header.css" rel="stylesheet">
      	<link href="css/styleFAQ.css" rel="stylesheet">
      	<link href="css/titreEtBloc.css" rel="stylesheet">
	</head>
	<body>

		<h2>  Foire aux Questions </h2>

		<section class="conteneur1">
			<section class="conteneur2">
				<div class="conteneur3">

					<?php
						$allFaq = $bdd->query('SELECT * FROM faq');
						while($faq = $allFaq->fetch())
						{
					?>
							
							<p class="question"> Question : <?= $faq['question']; ?> </p>
							<br/><br/>
							<p class="reponse"> Réponse : </p>
							<p> <?= $faq['reponse']; ?> <br/></p>
							<br/>
							
					<?php
						}
					?>
				</div>
			</section>
    	</section>

	</body>
</html>
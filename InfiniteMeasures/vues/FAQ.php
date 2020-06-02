<!DOCTYPE html>
<html>
	<head>
		<base href="/infiniteMeasures/">
		<meta charset="utf-8"/>
		<title>FAQ</title>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/footer.css" rel="stylesheet">
      	<link href="css/header.css" rel="stylesheet">
      	<link href="css/styleFAQ.css" rel="stylesheet">
	</head>
	<body>

		<p> <h2>  Foire aux Questions </h2> </p>

		<div class="faq">

			<?php
				$allFaq = $bdd->query('SELECT * FROM faq');
				while($faq = $allFaq->fetch())
				{
			?>
					
					<p class="question"> Question : <?= $faq['question']; ?> </p>
					<br/><br/>
					<p class="réponse"> Réponse : </p>
					<p class="suiteréponse"> <?= $faq['reponse']; ?> <br/></p>
					<br/>
					
			<?php
				}
			?>
		</div>

	</body>
</html>
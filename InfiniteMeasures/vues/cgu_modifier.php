<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title>CGU</title>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/footer.css" rel="stylesheet">
      	<link href="css/header.css" rel="stylesheet">
      	<link href="css/styleFAQ.css" rel="stylesheet">
	</head>
	<body>

		<p> <h2>  Gérer la CGU </h2> </p>

		<div class="faq">
			<form method="POST" action="utilisateurs/modifierCGU" enctype="multipart/form-data">
				<?php
					$allCgu = $bdd->query('SELECT * FROM cgu');
					while($cgu = $allCgu->fetch())
					{
				?>		


					
					<p><textarea type="text" name="<?= $cgu['numArticle']; ?>" size="20" rows="1" cols="45" ><?= $cgu['article']; ?></textarea> </p><br/>

					
					<p><textarea type="text" name="A<?= $cgu['numArticle']; ?>" size="20" rows="10" cols="45" ><?= $cgu['texte']; ?></textarea> </p>
					<br/>

					<p class="supprime"><a href="utilisateurs/modifierCGU?supprime=<?= $cgu['numArticle'] ?>" style="text-decoration:none">Supprimer</a></p>
					<br/><br/><br/>


					
						
				<?php
					}
				?>

				<p class="ajouter"><a href="utilisateurs/modifierCGU?ajouter=1" style="text-decoration:none">Ajouter</a></p>

				<input type="submit" value="<?php echo trad("Mettre à jour la CGU","Update CGU") ?>" />
            </form>
		</div>

	</body>
</html>







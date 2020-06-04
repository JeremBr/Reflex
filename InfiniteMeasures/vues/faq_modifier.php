<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?php echo trad("Gérer FAQ","Manage FAQ") ?></title>
		<link href="css/footer.css" rel="stylesheet">
      	<link href="css/header.css" rel="stylesheet">
      	<link href="css/StyleGererFaqCgu.css" rel="stylesheet">
      	<link href="css/titreEtBloc.css" rel="stylesheet">
	</head>
	<body>

		<p><h2><?php echo trad("Foire aux Questions","Frequently asked Questions") ?></h2></p>

		<div class="faq">
			<section class="conteneur1">
			<section class="conteneur2">
				<div class="conteneur3">
			<form method="POST" action="utilisateurs/modifierFAQ" enctype="multipart/form-data">
				<?php
					$allFaq = $bdd->query('SELECT * FROM faq');
					while($faq = $allFaq->fetch())
					{
				?>		


					<p class="question"><label for="question">Question : </label></p> <br/><br/>
					<p><textarea type="text" name="<?= $faq['numArticle']; ?>" size="20" rows="1" cols="45" ><?= $faq['question']; ?></textarea> </p><br/>

					<p class="reponse"><label for="reponse"><?php echo trad("Réponse","Answer") ?> : </label></p> <br/>
					<p><textarea type="text" name="A<?= $faq['numArticle']; ?>" size="20" rows="10" cols="45" ><?= $faq['reponse']; ?></textarea> </p>
					<br/>

					<p class="supprime"><a href="utilisateurs/modifierFAQ?supprime=<?= $faq['numArticle'] ?>" style="text-decoration:none"><?php echo trad("Supprimer","Delete") ?></a></p>
					<br/><br/><br/>


					
						
				<?php
					}
				?>

				<p class="ajouter"><a href="utilisateurs/modifierFAQ?ajouter=1" style="text-decoration:none"><?php echo trad("Ajouter","Add") ?></a></p>

				<input type="submit" class="update" value="<?php echo trad("Mettre à jour la FAQ","Update FAQ") ?>" />
            </form>

            </div>
			</section>
    	</section>
		</div>

	</body>
</html>
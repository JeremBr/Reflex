<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?php echo trad("Gérer CGU","Manage CGU") ?></title>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/footer.css" rel="stylesheet">
      	<link href="css/header.css" rel="stylesheet">
      	<link href="css/StyleGererFaqCgu.css" rel="stylesheet">
      	<link href="css/titreEtBloc.css" rel="stylesheet">
	</head>
	<body>

		<p> <h2><?php echo trad("Gérer la CGU","Manage the CGU") ?></h2> </p>

		<div class="faq">
			<section class="conteneur1">
			<section class="conteneur2">
				<div class="conteneur3">
			<form method="POST" action="utilisateurs/modifierCGU" enctype="multipart/form-data">
				<?php
					$allCgu = $bdd->query('SELECT * FROM cgu');
					while($cgu = $allCgu->fetch())
					{
				?>		


					
					<p><textarea type="text" name="<?= $cgu['numArticle']; ?>" size="20" rows="1" cols="45" ><?= $cgu['article']; ?></textarea> </p><br/>

					
					<p><textarea type="text" name="A<?= $cgu['numArticle']; ?>" size="20" rows="10" cols="45" ><?= $cgu['texte']; ?></textarea> </p>
					<br/>

					<p class="supprime"><a href="utilisateurs/modifierCGU?supprime=<?= $cgu['numArticle'] ?>" style="text-decoration:none"><?php echo trad("Supprimer","Delete") ?></a></p>
					<br/><br/><br/>


					
						
				<?php
					}
				?>

				<p class="ajouter"><a href="utilisateurs/modifierCGU?ajouter=1" style="text-decoration:none"><?php echo trad("Ajouter","Add") ?></a></p>

				<input type="submit" class="update" value="<?php echo trad("Mettre à jour la CGU","Update CGU") ?>" />
            </form>
           </div>
			</section>
    	</section>
		</div>

	</body>
</html>







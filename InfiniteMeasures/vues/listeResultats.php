<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?php echo trad("Liste des tests","Test list")?></title>
		<link rel="stylesheet" href="css/styleRechercheGestionnaire.css" />
		<link rel="stylesheet" href="css/titreEtBloc.css" />
	</head>
<body>


	<h2 class="resultat"><?= trad("Tests de l'utilisateur numéro : ","Test of user number : ") . $id ?></h2>

	<?php 
		if (isset($results)) {

		    if($results->rowCount() > 0) {

		                
		        while ($r = $results->fetch()) { 

		            ?>  <div class="contenu">
					    <div class="sousTitre"><?= trad("Test numéro : ","Test number : ") . $r['idTest'] ?></div><br/><br/>
							<div class="resultats">
		                	
		                	</div>
		                	<!-- <div class="type">Type :  </div> -->
							<div class="date">Date : <?= $r['date'] ?></div>
							


							<div class="resultats">

								<form method="POST" action="test/resultats">
            						<div class="bouton"><button class="btn"type="submit" class="results" name="idTest" value="<?= $r['idTest'] ?>"><?= trad("Consulter le test","Consult test") ?></button></div>
        						</form>
								

							</div>
						</div>

							

					<?php 
		        }
		                

		    } else {
		        // echo 'Aucun résultat pour <em>' . $results . '</em>.<br /><br />';
		    }
		} else {
			header("Location: accueil");
		}

	?>



</body>
</html>
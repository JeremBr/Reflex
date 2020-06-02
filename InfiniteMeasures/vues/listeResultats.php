<?php


    //verifie si on a acces, puis qui a acces, utilisateur ne peut consulter que ses tests
    if(isset($access)){

		if(($access == 1) OR ($access == 2)){

			if (isset($_GET['id']) AND !empty($_GET['id'])) {
				$id=$_GET['id'];
				$results = $bdd->prepare('SELECT * FROM test WHERE idUtilisateur = ?');
				$results->execute(array($id)); 
			}else {
				header("Location: index.php");
			}

		} else if ($access == 0){

			if (isset($_GET['id']) AND !empty($_GET['id'])) {
				
				if($_GET['id'] == $_COOKIE['idUtilisateur']){
					$id=$_GET['id'];
					$results = $bdd->prepare('SELECT * FROM test WHERE idUtilisateur = ?');
					$results->execute(array($id)); 
				} else {
					header("Location: monCompte.php");
				}
				
			} else {
				header("Location: index.php");
			}

		} else {
			header("Location: index.php");
		}

	} else {
		header("Location: index.php");
	}
	



?>



<!DOCTYPE html>
<html>
	<head>
		<base href="/infiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?php echo trad("Liste des tests","Test list")?></title>
		<link rel="stylesheet" href="css/styleRechercheGestionnaire.css" />
	</head>
<body>


	<div class="sousTitre"><?= trad("Tests de l'utilisateur numéro : ","Test of user number : ") . $id ?></div>

	<?php 
		if (isset($results)) {

		    if($results->rowCount() > 0) {

		                
		        while ($r = $results->fetch()) { 

		            ?>  <div class="contenu">
					    <div class="sousTitre"><?= trad("Test numéro : ","Test number : ") . $r['idTest'] ?></div><br/><br/>
							<div class="resultats">
		                	
		                	</div>
		                	<!-- <div class="type">Type :  </div> -->
							<div class="Genre">Date : <?= $r['date'] ?></div>
							


							<div class="resultats">

								<form method="POST" action="resultatsTest.php">
            						<button type="submit" class="results" name="idTest" value="<?= $r['idTest'] ?>"><?= trad("Consulter le test","Consult test") ?></button>
        						</form>
								

							</div>
						</div>

							

					<?php 

		                   
		        }
		                

		    } else {
		        // echo 'Aucun résultat pour <em>' . $results . '</em>.<br /><br />';
		    }
		} else {
			header("Location: index.php");
		}

	?>



</body>
</html>
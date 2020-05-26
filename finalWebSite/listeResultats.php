<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/access.php';
    include 'function/numberUserLive.php';


    //verifie si on a acces, puis qui a acces, utilisateur ne peut consulter que ses tests
    if(isset($access)){

		if(($access == 1) OR ($access == 2)){

			if (isset($_GET['userResults']) AND !empty($_GET['userResults'])) {
				$id=$_GET['userResults'];
				$results = $bdd->prepare('SELECT * FROM test WHERE idUtilisateur = ?');
				$results->execute(array($id)); 
			}else {
				header("Location: index.php");
			}

		} else if ($access == 0){

			if (isset($_GET['userResults']) AND !empty($_GET['userResults'])) {
				
				if($_GET['userResults'] == $_COOKIE['idUtilisateur']){
					$id=$_GET['userResults'];
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
		<meta charset="utf-8"/>
		<title><?php echo trad("Liste des tests","Test list")?></title>
		<link rel="stylesheet" href="css/styleRechercheGestionnaire.css" />
	</head>
<body>

	<?php include("includes/header.php"); ?>

	<div class="sousTitre">Tests de l'utilisateur numéro : <?= $id ?></div>

	<?php 
		if (isset($results)) {

		    if($results->rowCount() > 0) {

		                
		        while ($r = $results->fetch()) { 

		            ?>  <div class="contenu">
					    <div class="sousTitre">Test numéro : <?= $r['idTest'] ?></div><br/><br/>
							<div class="resultats">
		                	
		                	</div>
		                	<!-- <div class="type">Type :  </div> -->
							<div class="Genre">Date : <?= $r['date'] ?></div>
							


							<div class="resultats">

								<form method="POST" action="resultatsTest.php">
            						<button type="submit" class="results" name="idTest" value="<?= $r['idTest'] ?>">Consulter le test</button>
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


	<?php include("includes/footer.php"); ?>

</body>
</html>
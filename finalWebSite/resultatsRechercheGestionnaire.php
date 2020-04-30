<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/access.php';



	if (isset($_POST['recherche']) AND !empty($_POST['recherche'])) {
		$research = htmlspecialchars($_POST['recherche']);
		$results = $bdd->query('SELECT * FROM utilisateur WHERE nom LIKE "' . $research . '%" OR prenom LIKE "' . $research . '%"'); 
	}
	



?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Résultats de votre recherche</title>
		<link rel="stylesheet" href="css/styleRechercheGestionnaire.css" />

	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<?php

	if(isset($access)){
		if(($access == 1) OR ($access == 2)){

			?>


			<div class="titre"><h3>Résultats de votre recherche</h3></div>
			<form method="post" action="resultatsRechercheGestionnaire.php">
				<div class="form">
					<label for="user-search">Rechercher un utilisateur : </label>
					<input type="search" id="user-search" name="recherche" aria-label="Search through site content">
					<button>Rechercher</button>
				</div>
				
			</form>

			<?php 
				if (isset($results)) {

				    if($results->rowCount() > 0) {

				                
				        while ($r = $results->fetch()) { 

				            ?>  <div class="contenu">
							    <div class="sousTitre">Informations utilisateur : <?= $r['idUtilisateur'] ?></div><br/><br/>
									<div class="resultats">
				                	
				                	</div>
				                	<div class="type">Type :  </div>
									<div class="Genre">Genre : <?= $r['genre'] ?></div>
									<div class="Nom">Nom : <?= $r['nom'] ?></div>
									<div class="Prénom">Prénom : <?= $r['prenom'] ?></div>
									<div class="Adresse">Adresse : </div>
									<div class="Adresse mail">Adresse mail : <?= $r['mail'] ?></div>


									<div class="resultats">
										<p class="tests">
											<a href="reconnaissanceTonalite.php">Lancement de la série de tests</a>
										</p>

										<p class="envoiMail"><a href="envoyerMail.php">Envoyer un mail</a>
										</p>
										<br/>

									</div>
									</div>

									

							<?php 

				                   
				        }
				                

				    } else {
				        echo 'Aucun résultat pour <em>' . $research . '</em>.<br /><br />';
				    }
				}
		

		} else{
			header("Location: monCompte.php");
		}

	} else {
		header("Location: connexion.php");
	}
	?>

	
		

	<?php include("includes/footer.php"); ?>



	</body>
</html>	
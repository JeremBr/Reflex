<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/access.php';
    include 'function/numberUserLive.php';


    // on recherche seulement les utilisateurs
	if (isset($_POST['recherche']) AND !empty($_POST['recherche'])) {
		$research = htmlspecialchars($_POST['recherche']);
		$results = $bdd->query('SELECT * FROM utilisateur WHERE (permission = 0) AND (nom LIKE "' . $research . '%" OR prenom LIKE "' . $research . '%")'); 
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


			<div class="titre"><h3><?= trad("Résultats de votre recherche","Research results") ?></h3></div>
			<form method="post" action="resultatsRechercheGestionnaire.php">
				<div class="recherche">
					<label for="user-search"><?= trad("Rechercher un utilisateur","Resaerch a user") ?></label>
					<input type="search" id="user-search" name="recherche" aria-label="Search through site content">
					<button>Rechercher</button>
				</div>
				
			</form>

			<?php 
				if (isset($results)) {

				    if($results->rowCount() > 0) {

				                
				        while ($r = $results->fetch()) { 

				            ?>  <div class="contenu">
							    <div class="sousTitre"><?= trad("Informations utilisateur : ","User info : ") ?><?= $r['idUtilisateur'] ?></div><br/><br/>
									<div class="resultats">
				                	
				                	</div>
				                	<!-- <div class="type">Type :  </div> -->
									<div class="Genre"><?= trad("Genre : ","Gender : ") ?><?= $r['genre'] ?></div>
									<div class="Nom"><?= trad("Nom : ","Last name : ") ?><?= $r['nom'] ?></div>
									<div class="Prénom"><?= trad("Prénom : ","First name : ") ?><?= $r['prenom'] ?></div>
									<div class="Adresse"><?= trad("Adresse : ","Address : ") ?><?= $r['adresse'] ?></div>
									<div class="CodePostale">Code Postale : <?= $r['codePostale'] ?></div>
									<div class="Adresse mail"><?= trad("Adresse mail : ","Email address : ") ?><?= $r['mail'] ?></div>


									<div class="resultats">

										<p class="resultats">
											<a href="listeResultats.php?userResults=<?= $r['idUtilisateur'] ?>"><?= trad("Consulter résultats","Look at the results") ?></a>
										</p> 

										<p class="tests">
											<a href="reconnaissanceTonalite.php?userTest=<?= $r['idUtilisateur'] ?>"><?= trad("Lancement de la série de tests","Test launcher") ?></a>
										</p> 

										<!-- <form method="POST" action="listeResultats.php">
                    						<button type="submit" class="results" name="userResults" value="<?= $r['idUtilisateur'] ?>">Consulter résultats</button>
                						</form>
										
										<form method="POST" action="reconnaissanceTonalite.php">
                    						<button type="submit" class="tests" name="userTest" value="<?= $r['idUtilisateur'] ?>">Lancement de la série de tests</button>
                						</form>

                						<form method="POST" action="envoyerMail.php">
                    						<button type="submit" class="envoiMail" name="userMail" value="<?= $r['mail'] ?>">Envoyer un mail</button>
                						</form> -->
                						


										<p class="envoiMail"><a href="envoyerMail.php?userMail=<?= $r['mail'] ?>"><?= trad("Envoyer un mail","Send an email") ?></a></p>
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
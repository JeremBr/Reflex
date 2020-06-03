<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title>Résultats de votre recherche</title>
		<link rel="stylesheet" href="css/styleRechercheGestionnaire.css" />

	</head>

	<body>

		<div class="titre"><h3>Résultats de votre recherche</h3></div>
		<form method="post" action="">
			<div class="recherche">
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
			                	<!-- <div class="type">Type :  </div> -->
								<div class="Genre">Genre : <?= $r['genre'] ?></div>
								<div class="Nom">Nom : <?= $r['nom'] ?></div>
								<div class="Prénom">Prénom : <?= $r['prenom'] ?></div>
								<div class="Adresse">Adresse : <?= $r['adresse'] ?></div>
								<div class="CodePostale">Code Postale : <?= $r['codePostale'] ?></div>
								<div class="Adresse mail">Adresse mail : <?= $r['mail'] ?></div>


								<div class="resultats">

									<p class="resultats">
										<a href="test/listeResultats/<?= $r['idUtilisateur'] ?>">Consulter résultats</a>
									</p> 

									<p class="tests">
										<a href="test/reconnaissanceTonalite/<?= $r['idUtilisateur'] ?>">Lancement de la série de tests</a>
									</p> 

									<p class="envoiMail"><a href="utilisateurs/mail?userMail=<?= $r['mail'] ?>">Envoyer un mail</a></p>
									<br/>

								</div>
							</div>

								

						<?php 

			                   
			        }
			                

			    } else {
			        echo 'Aucun résultat pour <em>' . $research . '</em>.<br /><br />';
			    }
			}
		?>





	</body>
</html>	
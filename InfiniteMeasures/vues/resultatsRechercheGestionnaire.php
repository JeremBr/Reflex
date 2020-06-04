<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?= trad("Résultats de votre recherche","Results of your request") ?></title>
		<link rel="stylesheet" href="css/styleRechercheGestionnaire.css" />
		<link rel="stylesheet" href="css/titreEtBloc.css" />

	</head>

	<body>

		<h2><?= trad("Résultats de votre recherche","Results of your request") ?></h2>

		<section class="conteneur1">
			<section class="conteneur2">
				<section class="conteneur3">
					<form method="post" action="">
						<div class="recherche">
							<label for="user-search"><?= trad("Rechercher un utilisateur :","Search for a user:") ?></label>
							<input type="search" class="inputRecherche" id="user-search" name="recherche" aria-label="Search through site content">
							<button type="submit" class="btn"><?= trad("Rechercher","Search") ?></button>
						</div>
						
					</form>
				</section>

				<?php 
					if (isset($results)) {

						if($results->rowCount() > 0) {

									
							while ($r = $results->fetch()) { 

				?>  
				<div class="contenu">
					<div class="sousTitre"><?= trad("Informations utilisateur","User informations") ?> : <?= $r['idUtilisateur'] ?></div><br/><br/>
						<div class="resultats">
												
							<div class="Genre"><?= trad("Genre","Gender") ?> : <?= $r['genre'] ?></div>
							<div class="Nom"><?= trad("Nom","Name") ?> : <?= $r['nom'] ?></div>
							<div class="Prénom"><?= trad("Prénom","Surname") ?> : <?= $r['prenom'] ?></div>
							<div class="Adresse"><?= trad("Adresse","Address") ?> : <?= $r['adresse'] ?></div>
							<div class="CodePostale"><?= trad("Code Postale","Postal Code") ?> : <?= $r['codePostale'] ?></div>
							<div class="Adresse mail"><?= trad("Adresse mail","Mail address") ?> : <?= $r['mail'] ?></div>



							<div class="resultats">

								<p class="resultats">
									<a href="test/listeResultats/<?= $r['idUtilisateur'] ?>"><?= trad("Consulter résultats","Consult results") ?></a>
								</p> 

								<p class="tests">
									<a href="test/reconnaissanceTonalite/<?= $r['idUtilisateur'] ?>"><?= trad("Lancement de la série de tests","Launch of the test series") ?></a>
								</p> 

								<p class="envoiMail"><a href="utilisateurs/mail?userMail=<?= $r['mail'] ?>"><?= trad("Envoyer un email","Send email") ?></a></p>
								<br/>

							</div>
						</div>

					</div>		
				</div>			
							
				<?php 								
					}							
					} else {
						echo 'Aucun résultat pour <em>' . $research . '</em>.<br /><br />';
					}
					}
				?>

			</section>
		</section>


	</body>
</html>	
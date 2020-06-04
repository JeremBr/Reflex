<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?= trad("Résultats de votre recherche","Results of your request") ?></title>
		<link rel="stylesheet" href="css/styleResultatsAdmin.css" />
		<link rel="stylesheet" href="css/titreEtBloc.css" />
	</head>

	<body>

		<h2><?= trad("Résultats de votre recherche","Results of your request") ?></h2>
				
		
			<?php 
				if (isset($results)) {

		            if($results->rowCount() > 0) {

		                
		                while ($r = $results->fetch()) { 

							?> 

				<section class="conteneur1">
					<section class="conteneur2">
						<div class="contenu">
								<div class="sousTitre"><?= trad("Informations utilisateur","User informations") ?> : <?= $r['idUtilisateur'] ?></div><br/><br/>
								<div class="resultats"></div>
								<div class="type"><?= trad("Type","Type") ?> : </div>
								<div class="Genre"><?= trad("Genre","Gender") ?> : <?= $r['genre'] ?></div>
								<div class="Nom"><?= trad("Nom","Name") ?> : <?= $r['nom'] ?></div>
								<div class="Prénom"><?= trad("Prénom","Surname") ?> : <?= $r['prenom'] ?></div>
								<div class="Adresse"><?= trad("Adresse","Address") ?> : <?= $r['adresse'] ?></div>
								<div class="Adresse mail"><?= trad("Adresse mail","Mail address") ?> : <?= $r['mail'] ?></div>
						<div>

						<div class="options">
								
							<section class="conteneur3">		
							
									<?php 

									if($r['permission'] == 0){
										?>
										<p class="upgrade"><a href="utilisateurs/rechercheAdmin?upgrade=<?= $r['idUtilisateur'] ?>&research=<?= $research ?>" style="text-decoration:none">Upgrade</a></p>
									
										<?php 
									}else if($r['permission'] == 1){
										?>

										<p class="downgrade"><a href="utilisateurs/rechercheAdmin?downgrade=<?= $r['idUtilisateur'] ?>&research=<?= $research ?>" style="text-decoration:none">Downgrade</a></p>

										<?php
									}

										?>
									
									<p class="supprime"><a href="utilisateurs/rechercheAdmin?supprime=<?= $r['idUtilisateur'] ?>&research=<?= $research ?>" style="text-decoration:none"><?= trad("Supprimer","Delete") ?></a></p>

							</section>
						</div>
							
							

					</section>
				</section>

							<?php 

								
								}
								

							} else {
								echo 'Aucun résultat pour <em>' . $research . '</em>.<br /><br />';
							}
						}

		
		
					?>

		
			
	</body>
</html>	
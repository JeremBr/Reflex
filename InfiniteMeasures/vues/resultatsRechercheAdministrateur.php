<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title>Résultats de votre recherche</title>
		<link rel="stylesheet" href="css/styleResultatsAdmin.css" />
	</head>

	<body>

	



	<?php
			

			if (isset($_POST['recherche'])) {
			    $research = htmlspecialchars($_POST['recherche']);
			    $results = $bdd->query('SELECT * FROM utilisateur WHERE nom LIKE "' . $research . '%" OR prenom LIKE "' . $research . '%"'); 
			} else if(isset($_GET['research'])) {
				$research = $_GET['research'];
				$results = $bdd->query('SELECT * FROM utilisateur WHERE nom LIKE "' . $research . '%" OR prenom LIKE "' . $research . '%"'); 
			}

			?>



			<div class="titre"><h3>Résultat(s) de votre recherche</h3></div>
				

					<?php 
						if (isset($results)) {

				            if($results->rowCount() > 0) {

				                
				                while ($r = $results->fetch()) { 

				                	?> <div class="contenu">
											<div class="sousTitre">Informations utilisateur : <?= $r['idUtilisateur'] ?></div><br/><br/>
											<div class="resultats">
				                	
				                	</div>
				                	<div class="type">Type :  </div>
									<div class="Genre">Genre : <?= $r['genre'] ?></div>
									<div class="Nom">Nom : <?= $r['nom'] ?></div>
									<div class="Prénom">Prénom : <?= $r['prenom'] ?></div>
									<div class="Adresse">Adresse : <?= $r['adresse'] ?></div>
									<div class="Adresse mail">Adresse mail : <?= $r['mail'] ?></div>


									<div class="options">
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
										
										<p class="supprime"><a href="utilisateurs/rechercheAdmin?supprime=<?= $r['idUtilisateur'] ?>&research=<?= $research ?>" style="text-decoration:none">Supprimer</a></p>
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
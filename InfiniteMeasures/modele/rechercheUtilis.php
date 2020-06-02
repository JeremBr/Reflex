<?php
	
	//il faut mettre ça sous forme d'une fonction à appeler


    // on recherche seulement les utilisateurs
	if (isset($_POST['recherche']) AND !empty($_POST['recherche'])) {
		$research = htmlspecialchars($_POST['recherche']);
		$results = $bdd->query('SELECT * FROM utilisateur WHERE (permission = 0) AND (nom LIKE "' . $research . '%" OR prenom LIKE "' . $research . '%")'); 
	}
	

?>
<?php

	if (isset($_POST['recherche'])) {
	    $research = htmlspecialchars($_POST['recherche']);
	    $results = $bdd->query('SELECT * FROM utilisateur WHERE nom LIKE "' . $research . '%" OR prenom LIKE "' . $research . '%"'); 
	} else if(isset($_GET['research'])) {
		$research = $_GET['research'];
		$results = $bdd->query('SELECT * FROM utilisateur WHERE nom LIKE "' . $research . '%" OR prenom LIKE "' . $research . '%"'); 
	}

?>
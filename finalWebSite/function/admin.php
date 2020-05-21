<?php

	if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){
		$supprime = (int) $_GET['supprime'];

		$delTest = $bdd->prepare('DELETE FROM test WHERE idUtilisateur = ?');
		$delTest->execute(array($supprime));

		$req = $bdd->prepare('DELETE FROM utilisateur WHERE idUtilisateur = ?');
		$req->execute(array($supprime));
	}

	if(isset($_GET['upgrade']) AND !empty($_GET['upgrade'])){
		$upUser = (int) $_GET['upgrade'];

		$req = $bdd->prepare('UPDATE utilisateur SET permission = 1 WHERE idUtilisateur = ?');
		$req->execute(array($upUser));
	}

	if(isset($_GET['downgrade']) AND !empty($_GET['downgrade'])){
		$downUser = (int) $_GET['downgrade'];

		$req = $bdd->prepare('UPDATE utilisateur SET permission = 0 WHERE idUtilisateur = ?');
		$req->execute(array($downUser));
	}


?>
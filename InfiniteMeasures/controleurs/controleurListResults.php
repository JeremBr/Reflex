<?php


    //verifie si on a acces, puis qui a acces, utilisateur ne peut consulter que ses tests
    if(isset($access)){

		if(($access == 1) OR ($access == 2)){

			if (isset($_GET['id']) AND !empty($_GET['id'])) {
				$id=$_GET['id'];
				$results = $bdd->prepare('SELECT * FROM test WHERE idUtilisateur = ? ORDER BY idTest DESC');
				$results->execute(array($id)); 
			}else {
				header("Location: index.php");
			}

		} else if ($access == 0){

			if (isset($_GET['id']) AND !empty($_GET['id'])) {
				
				if($_GET['id'] == $_COOKIE['idUtilisateur']){
					$id=$_GET['id'];
					$results = $bdd->prepare('SELECT * FROM test WHERE idUtilisateur = ? ORDER BY idTest DESC');
					$results->execute(array($id)); 
				} else {
					header("Location: compte");
				}
				
			} else {
				header("Location: accueil");
			}

		} else {
			header("Location: accueil");
		}

	} else {
		header("Location: accueil");
	}
	



?>
<?php 
	
	

	$allCgu = $bdd->query('SELECT * FROM cgu');
	while($cgu = $allCgu->fetch()){
		

		if(isset($_POST[ "".$cgu['numArticle']."" ])){
			if($_POST["".$cgu['numArticle'].""] != $cgu['article']){
				$newQuest = htmlspecialchars($_POST["".$cgu['numArticle'].""]);
          		$insertQuest = $bdd->prepare("UPDATE cgu SET article = ? WHERE numArticle = ?");
         		$insertQuest->execute(array($newQuest, $cgu['numArticle']));
			}
			
		}

		if(isset($_POST[ "A".$cgu['numArticle']."" ])){
			if($_POST["A".$cgu['numArticle'].""] != $cgu['texte']){
				$newQuest = htmlspecialchars($_POST["A".$cgu['numArticle'].""]);
          		$insertQuest = $bdd->prepare("UPDATE cgu SET texte = ? WHERE numArticle = ?");
         		$insertQuest->execute(array($newQuest, $cgu['numArticle']));
			}
			
		}

	}
	




	if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){
		$supprime = (int) $_GET['supprime'];

		$delQuest = $bdd->prepare('DELETE FROM cgu WHERE numArticle = ?');
		$delQuest->execute(array($supprime));

		
	}

	if(isset($_GET['ajouter']) AND !empty($_GET['ajouter'])){
		

		$addQuest = $bdd->prepare('INSERT INTO cgu() VALUES ()');
		$addQuest->execute();
		
	}




	


?>
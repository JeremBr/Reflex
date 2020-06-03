<?php 
	
	

	$allFaq = $bdd->query('SELECT * FROM faq');
	while($faq = $allFaq->fetch()){
		

		if(isset($_POST[ "".$faq['numArticle']."" ])){
			if($_POST["".$faq['numArticle'].""] != $faq['question']){
				$newQuest = htmlspecialchars($_POST["".$faq['numArticle'].""]);
          		$insertQuest = $bdd->prepare("UPDATE faq SET question = ? WHERE numArticle = ?");
         		$insertQuest->execute(array($newQuest, $faq['numArticle']));
			}
			
		}

		if(isset($_POST[ "A".$faq['numArticle']."" ])){
			if($_POST["A".$faq['numArticle'].""] != $faq['reponse']){
				$newQuest = htmlspecialchars($_POST["A".$faq['numArticle'].""]);
          		$insertQuest = $bdd->prepare("UPDATE faq SET reponse = ? WHERE numArticle = ?");
         		$insertQuest->execute(array($newQuest, $faq['numArticle']));
			}
			
		}

	}
	




	if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){
		$supprime = (int) $_GET['supprime'];

		$delQuest = $bdd->prepare('DELETE FROM faq WHERE numArticle = ?');
		$delQuest->execute(array($supprime));

		
	}

	if(isset($_GET['ajouter']) AND !empty($_GET['ajouter'])){
		

		$addQuest = $bdd->prepare('INSERT INTO faq() VALUES ()');
		$addQuest->execute();
		
	}




	


?>
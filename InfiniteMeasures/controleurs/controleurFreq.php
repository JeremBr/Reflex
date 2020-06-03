<?php
    
    if(isset($_POST['idTest']) AND !empty($_POST['idTest'])){
    	

    	$resultat = rand(40,140); 

    	$idTest = $_POST['idTest'];

    	$insertFreq = $bdd->prepare("UPDATE test SET freqCard = ? WHERE idTest = ?");
        $insertFreq->execute(array($resultat, $idTest));
    	
    } else {
    	header("Location: compte");
    }

?>
<?php
   
    if(isset($_POST['idTest']) AND !empty($_POST['idTest'])){
    	

    	$resultat = rand(40,50); //intervalle à modifier

    	$idTest = $_POST['idTest'];

    	$insertSon = $bdd->prepare("UPDATE test SET refSonore = ? WHERE idTest = ?");
        $insertSon->execute(array($resultat, $idTest));
        
    } else {
    	header("Location: accueil");
    }

?>
<?php

    if(isset($_POST['idTest']) AND !empty($_POST['idTest'])){
    	

    	$resultat = rand(36,42); 

    	$idTest = $_POST['idTest'];

    	$insertTemp = $bdd->prepare("UPDATE test SET temperature = ? WHERE idTest = ?");
        $insertTemp->execute(array($resultat, $idTest));

    } else {
    	header("Location: accueil");
    }

?>
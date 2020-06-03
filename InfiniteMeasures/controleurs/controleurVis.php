<?php

    if(isset($_POST['idTest']) AND !empty($_POST['idTest'])){
    	

    	$resultat = rand(30,50); //intervalle à modifier


    	$idTest = $_POST['idTest'];

    	

    	$insertVis = $bdd->prepare("UPDATE test SET refVisuel = ? WHERE idTest = ?");
        $insertVis->execute(array($resultat, $idTest));
        
    } else {
    	header("Location: index.php");
    }

?>
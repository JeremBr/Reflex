<?php
    

    if(isset($_GET['id']) AND !empty($_GET['id'])){
    	

    	
    	$resultat = rand(80,100); //intervalle à modifier
    	

    	$insertReco = $bdd->prepare("INSERT INTO test(idUtilisateur, RecoTona) VALUES(?, ?)");
        $insertReco->execute(array($_GET['id'], $resultat));


        
        $last_id = $bdd->lastInsertId();

    	//IL FAUT LUI ATTRIBUER DES VALEURS
    } else {
    	header("Location: accueil");
    }

?>
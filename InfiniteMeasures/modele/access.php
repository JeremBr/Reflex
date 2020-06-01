<?php

if(isset($_COOKIE['idUtilisateur']) AND $_COOKIE['idUtilisateur'] > 0) {
    $valid = intval($_COOKIE['idUtilisateur']);
    $reqmdp = $bdd->prepare("SELECT * FROM utilisateur WHERE motDePasse = ? AND idUtilisateur = ?");
    $reqmdp->execute(array($_COOKIE['mdp'], $valid));
    $count = $reqmdp->rowCount();


    if(isset($_COOKIE['mdp']) and ($count == 1)){

    	$userinfo = $reqmdp->fetch();

    	if($userinfo['permission'] == 0){
    		$access = 0;
    	} else if ($userinfo['permission'] == 1){
    		$access = 1;
    	} else if ($userinfo['permission'] == 2){
    		$access = 2;
    	}


    } else {
        echo "Fabriquer des cookies, tu ne feras point.";
    }
}

?>
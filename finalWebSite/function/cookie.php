<?php

if(isset($_COOKIE['idUtilisateur']) AND $_COOKIE['idUtilisateur'] > 0) {
    $valid = intval($_COOKIE['idUtilisateur']);
    $reqmdp = $bdd->prepare("SELECT * FROM utilisateur WHERE motDePasse = ? AND idUtilisateur = ?");
    $reqmdp->execute(array($_COOKIE['mdp'], $valid));
    $count = $reqmdp->rowCount();


    if(isset($_COOKIE['mdp']) and ($count == 1)){

        setcookie('idUtilisateur', $_COOKIE['idUtilisateur'], time() + (60*2));
         
        setcookie('mdp', $_COOKIE['mdp'], time() + (60*2));

    } else {
        echo "Fabriquer des cookies, tu ne feras point.";
    }
}

?>
<?php

//on utilise pas le cookie.php car on veut recup un $userinfo
if(isset($_COOKIE['idUtilisateur']) AND $_COOKIE['idUtilisateur'] > 0) {
    
    // ICI ON VERIFIE QUE CEST BIEN LE BON MDP, POUR PAS QU'UN UTILISATEUR MALVEILLANT SE CONNECTE AVEC SES PROPRES COOKIES

    $valid = intval($_COOKIE['idUtilisateur']);
    $reqmdp = $bdd->prepare("SELECT * FROM utilisateur WHERE motDePasse = ? AND idUtilisateur = ?");
    $reqmdp->execute(array($_COOKIE['mdp'], $valid));
    $count = $reqmdp->rowCount();


    if(isset($_COOKIE['mdp']) and ($count == 1)){ 
        $getid = intval($_COOKIE['idUtilisateur']);
        $requser = $bdd->prepare('SELECT * FROM utilisateur WHERE idUtilisateur = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();

        setcookie('idUtilisateur', $_COOKIE['idUtilisateur'], time() + (60*2));
         
        setcookie('mdp', $_COOKIE['mdp'], time() + (60*2));
    } else {
        echo "Fabriquer des cookies, tu ne feras point.";
    }
} else {
    header("Location: connexion");
}

?>
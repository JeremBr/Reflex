<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
include 'function/numberUserLive.php';

 
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


?>




<html>
    <head>
        <meta charset="utf-8" />
        
        
        
        <link href="css/monCompte.css" rel="stylesheet">
        <title>Mon compte</title>
    </head>

    <body>

        <?php include("includes/header.php"); ?>

        <?php
            if(isset($_COOKIE['idUtilisateur']) AND $userinfo['idUtilisateur'] == $_COOKIE['idUtilisateur']) {

                if($userinfo['permission'] == 2){
                    ?>
        
                    <form method="post" action="resultatsRechercheAdministrateur.php">
                        <div class="form">
                            <label for="user-search"><?php echo trad("Rechercher un utilisateur :","Look up a user :")?></label>
                            <input type="search" id="user-search" name="recherche" aria-label="Search through site content">
                            <button><?php echo trad("Rechercher","Look up")?></button>
                        </div>
                            
                    </form>
                    <?php
                }
            }
        ?>


        <div id="milieuPage">
        
        <!-- check si c'est admin ou autre -->
        <nav class="menuAdmin">
            <div class="menuAdmin">

                <br />

                <ul>
                    <?php
                        if(isset($_COOKIE['idUtilisateur']) AND $userinfo['idUtilisateur'] == $_COOKIE['idUtilisateur']) {

                            if($userinfo['permission'] == 0){
                                ?>
                                <li><a href="listeResultats.php?userResults=<?= $_COOKIE['idUtilisateur'] ?>"><?php echo trad("Mes résulats","My results")?></a></li> <!-- Doit mettre page avec liste des diff resultats-->
                                <li><a href="editionprofil.php"><?php echo trad("Editer mon profil","Edit my profil")?></a></li>
                                

                                <?php

                            } else if($userinfo['permission'] == 1){
                                ?>
                                <li><a href="envoyerMail.php"><?php echo trad("Envoyer un mail","Send an email")?></a></li>
                                <li><a href="inviteUtilisateur.php"><?php echo trad("Inviter un utilisateur","Invite a user")?></a></li>
                                <li><a href="resultatsRechercheGestionnaire.php"><?php echo trad("Rechercher un utilisateur","Look up a user")?></a></li> <!-- Doit pouvoir mettre page avec liste des diff resultats-->
                                <li><a href="editionprofil.php"><?php echo trad("Editer mon profil","Update profil")?></a></li>

                                <?php
                            } else if($userinfo['permission'] ==2){
                                ?>
                                <li><a href="envoyerMail.php"><?php echo trad("Envoyer un mail","Send an email")?></a></li>
                                <li><a href="inviteUtilisateur.php"><?php echo trad("Inviter un utilisateur","Invite a user")?></a></li>
                                <li><a href="faq_modifier.php"><?php echo trad("Gérer la F.A.Q","Change F.A.Q")?></a></li>
                                <li><a href="editionprofil.php"><?php echo trad("Editer mon profil","Update profil")?></a></li>

                                <?php
                            }
                    ?>
                   

                    <li><a href="deconnexion.php"><?php echo trad("Déconnexion","Log out")?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <section class="mesInfos">
            <h1><?php echo trad("Vos informations","Your informations")?></h1>
            </br>
            <ul>
                <li><?php echo trad("Genre :","Gender :")?><?php echo $userinfo['genre']; ?></li><br>
                <li><?php echo trad("Nom :","Last name :")?><?php echo $userinfo['nom']; ?> </li><br>
                <li><?php echo trad("Prénom :","First name :")?><?php echo $userinfo['prenom']; ?></li><br>
                <li><?php echo trad("Adresse :","Address :")?><?php echo $userinfo['adresse']; ?></li><br>
                <li><?php echo trad("Code postale :","Postal code :")?><?php echo $userinfo['codePostale']; ?></li><br>
                <li><?php echo trad("Adresse mail :","Email address :")?><?php echo $userinfo['mail']; ?></li>

            </ul>
        </section>
        </div>

        <?php include("includes/footer.php"); ?>

    </body>
</html>
<?php   
} else {
    header("Location: connexion.php");
}

?>
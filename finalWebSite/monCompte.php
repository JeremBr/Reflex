<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');

 
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
                            <label for="user-search">Rechercher un utilisateur : </label>
                            <input type="search" id="user-search" name="recherche" aria-label="Search through site content">
                            <button>Rechercher</button>
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
                                <li><a href="resultatsTest.php">Mes résultats</a></li>
                                <li><a href="editionprofil.php">Editer mon profil</a></li>
                                

                                <?php

                            } else if($userinfo['permission'] == 1){
                                ?>
                                <li><a href="envoyerMail.php">Envoyer un mail</a></li>
                                <li><a href="inviteUtilisateur.php">Inviter un utilisateur</a></li>
                                <li><a href="resultatsRechercheGestionnaire.php">Rechercher un utilisateur</a></li>
                                <li><a href="editionprofil.php">Editer mon profil</a></li>

                                <?php
                            } else if($userinfo['permission'] ==2){
                                ?>
                                <li><a href="envoyerMail.php">Envoyer un mail</a></li>
                                <li><a href="inviteUtilisateur.php">Inviter un utilisateur</a></li>
                                <li><a href="cgu_modifier.php">Gérer la CGU</a></li>
                                <li><a href="editionprofil.php">Editer mon profil</a></li>

                                <?php
                            }
                    ?>
                   

                    <li><a href="deconnexion.php">Déconnexion</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <section class="mesInfos">
            <h1>Vos informations</h1>
            </br>
            <ul>
                <li>Genre : <?php echo $userinfo['genre']; ?></li><br>
                <li>Nom : <?php echo $userinfo['nom']; ?> </li><br>
                <li>Prénom : <?php echo $userinfo['prenom']; ?></li><br>
                <li>Adresse : <?php echo $userinfo['adresse']; ?></li><br>
                <li>Code Postale : <?php echo $userinfo['codePostale']; ?></li><br>
                <li>Adresse mail : <?php echo $userinfo['mail']; ?></li>

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
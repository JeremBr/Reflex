<!DOCTYPE html>
<html>
    <head>
        <base href="/infiniteMeasures/">
        <meta charset="utf-8" />
        
        <link href="css/monCompte.css" rel="stylesheet">
        <title>Mon compte</title>
    </head>

    <body>

        

        <?php
            if(isset($_COOKIE['idUtilisateur']) AND $userinfo['idUtilisateur'] == $_COOKIE['idUtilisateur']) {

                if($userinfo['permission'] == 2){
                    ?>
        
                    <form method="post" action="rechercheAdmin">
                        <div class="form">
                            <label for="user-search"><?php echo trad("Rechercher un utilisateur :","Find user :")?></label>
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
                                <li><a href="test/listeResultats/<?= $_COOKIE['idUtilisateur'] ?>"><?php echo trad("Mes résulats","My results")?></a></li> <!-- Doit mettre page avec liste des diff resultats-->
                                <li><a href="modifierProfil"><?php echo trad("Editer mon profil","Edit my profil")?></a></li>
                                

                                <?php

                            } else if($userinfo['permission'] == 1){
                                ?>
                                <li><a href="mail"><?php echo trad("Envoyer un mail","Send an email")?></a></li>
                                <li><a href="inviter"><?php echo trad("Inviter un utilisateur","Invite a user")?></a></li>
                                <li><a href="rechercheGestionnaire"><?php echo trad("Rechercher un utilisateur","Find user")?></a></li> <!-- Doit pouvoir mettre page avec liste des diff resultats-->
                                <li><a href="modifierProfil"><?php echo trad("Editer mon profil","Update profil")?></a></li>

                                <?php
                            } else if($userinfo['permission'] == 2){
                                ?>
                                <li><a href="mail"><?php echo trad("Envoyer un mail","Send an email")?></a></li>
                                <li><a href="inviter"><?php echo trad("Inviter un utilisateur","Invite a user")?></a></li>
                                <li><a href="modifierFAQ"><?php echo trad("Gérer la F.A.Q","Change F.A.Q")?></a></li>
                                <li><a href="modifierProfil"><?php echo trad("Editer mon profil","Update profil")?></a></li>

                                <?php
                            }
                    ?>
                   

                    <li><a href="deconnexion"><?php echo trad("Déconnexion","Log out")?></a></li>
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

        

    </body>
</html>
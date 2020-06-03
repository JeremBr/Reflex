<!DOCTYPE html>
<html>
    <head>
        <base href="/InfiniteMeasures/">
        <meta charset="utf-8" />
        <link href="css/titreEtBloc.css" rel="stylesheet">
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
                            <input class="recherche" type="search" id="user-search" name="recherche" aria-label="Search through site content">
                            <button class="btn"><?php echo trad("Rechercher","Look up")?></button>
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
                                <li><a class="caseUtilisateur" href="test/listeResultats/<?= $_COOKIE['idUtilisateur'] ?>"><?php echo trad("Mes résulats","My results")?></a></li>
                                <li><a class="caseUtilisateur" href="modifierProfil"><?php echo trad("Editer mon profil","Edit my profil")?></a></li>
                                <li><a class="caseUtilisateur" href="deconnexion"><?php echo trad("Déconnexion","Log out")?></a></li>                                
                                

                                <?php

                            } else if($userinfo['permission'] == 1){
                                ?>
                                <li><a class="caseGestionnaire" href="mail"><?php echo trad("Envoyer un mail","Send an email")?></a></li>
                                <li><a class="caseGestionnaire" href="inviter"><?php echo trad("Inviter un utilisateur","Invite a user")?></a></li>
                                <li><a class="caseGestionnaire" href="rechercheGestionnaire"><?php echo trad("Rechercher un utilisateur","Find user")?></a></li> <!-- Doit pouvoir mettre page avec liste des diff resultats-->
                                <li><a class="caseGestionnaire" href="modifierProfil"><?php echo trad("Editer mon profil","Update profil")?></a></li>
                                <li><a class="caseGestionnaire" href="deconnexion"><?php echo trad("Déconnexion","Log out")?></a></li> 

                                <?php
                            } else if($userinfo['permission'] == 2){
                                ?>
                                <li><a class="caseAdmin" href="mail"><?php echo trad("Envoyer un mail","Send an email")?></a></li>
                                <li><a class="caseAdmin" href="inviter"><?php echo trad("Inviter un utilisateur","Invite a user")?></a></li>
                                <li><a class="caseAdmin" href="modifierFAQ"><?php echo trad("Gérer la F.A.Q","Change F.A.Q")?></a></li>
                                <li><a class="caseAdmin" href="modifierProfil"><?php echo trad("Editer mon profil","Update profil")?></a></li>
                                <li><a class="caseAdmin" href="deconnexion"><?php echo trad("Déconnexion","Log out")?></a></li> 

                                <?php
                            }
                    ?>
                   


                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>

                  <section class="conteneur1">
                  <section class="conteneur2">
                              <div class="conteneur3">
            <h1><?php echo trad("Mon compte","My account")?></h1>
            </br>
            <ul>
                <li><?php echo trad("Genre : ","Gender : ")?><?php echo $userinfo['genre']; ?></li><br>
                <li><?php echo trad("Nom : ","Last name : ")?><?php echo $userinfo['nom']; ?> </li><br>
                <li><?php echo trad("Prénom : ","First name : ")?><?php echo $userinfo['prenom']; ?></li><br>
                <li><?php echo trad("Adresse : ","Address : ")?><?php echo $userinfo['adresse']; ?></li><br>
                <li><?php echo trad("Code postale : ","Postal code : ")?><?php echo $userinfo['codePostale']; ?></li><br>
                <li><?php echo trad("Adresse mail : ","Email address : ")?><?php echo $userinfo['mail']; ?></li>

            </ul>
         </section>
            </section>
                     </div>

        

    </body>
</html>
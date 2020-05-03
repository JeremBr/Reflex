<?php

   $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
   


   /* ICI ON INSCRIT LUTILISATEUR SI LE FORMULAIRE A ETE CORRECTEMENT REMPLIE */
    
   if(isset($_POST['forminscription'])) {


      if(!empty($_POST['choix']) AND !empty($_POST['nom']) AND!empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {

         $genre = htmlspecialchars($_POST['choix']);
         $prenom = htmlspecialchars($_POST['prenom']);
         $nom = htmlspecialchars($_POST['nom']);
         $mail = htmlspecialchars($_POST['mail']);
         $mail2 = htmlspecialchars($_POST['mail2']);
         $mdp = sha1($_POST['mdp']);
         $mdp2 = sha1($_POST['mdp2']);


         $nomlength = strlen($nom);
         $prenomlength = strlen($prenom);

         if($prenomlength <= 255) {
            if($nomlength <= 255){
               
               if($mail == $mail2) {
                  if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                     //ON REGARDE SI LE MAIL EST INVITER A SINSCRIRE

                     $goodMail = $bdd->prepare("SELECT * FROM invitation WHERE mail = ?");
                     $goodMail->execute(array($mail));

                     if( ($goodMail->rowCount()) > 0) {

                        $timeInvit = $goodMail->fetch();

                        $time = time();
                        if(($time - $timeInvit['temps']) < (24*3600)){

                           $reqmail = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
                           $reqmail->execute(array($mail));
                           $mailexist = $reqmail->rowCount();

                           if($mailexist == 0) {

                              if($mdp == $mdp2) {

                                 $insertmbr = $bdd->prepare("INSERT INTO utilisateur(genre, prenom, nom, mail, motDePasse) VALUES(?, ?, ?, ?, ?)");
                                 $insertmbr->execute(array($genre, $prenom, $nom, $mail, $mdp));


                                 $delUser = $bdd->prepare("DELETE FROM invitation WHERE mail =?");
                                 $delUser->execute(array($mail));


                                 $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                                 
                              } else {
                                 $erreur = "Vos mots de passes ne correspondent pas !";
                              }
                           } else {
                              $erreur = "Adresse mail déjà utilisée !";
                           }



                        } else {
                           $erreur = "Vous n'êtes plus autorisé à vous inscrire !";
                        }



                     } else {
                        $erreur = "L'email saisie n'est pas autorisé à s'inscrire !";
                     }
                            
                     
                  } else {
                     $erreur = "Votre adresse mail n'est pas valide !";
                  }
               } else {
                  $erreur = "Vos adresses mail ne correspondent pas !";
               } 
            } else {
               $erreur = "Votre nom ne doit pas dépasser 255 caractères !";
            }
            
         } else {
            $erreur = "Votre prenom ne doit pas dépasser 255 caractères !";
         }

      } else {
         $erreur = "Tous les champs doivent être complétés !";
      }
   }



   /* ICI ON VERIFIE LACCES A LA PAGE */

   if( ( isset($_GET['inscription']) && !empty($_GET['inscription']) ) ){

      
         
         /* 
            On regarde si le token est bien enregistré, sinon l'utilisateur est redirigé
            car si on redirige pas quand un utilisateur essaie d'usurpater
            alors il peut tenter de faire du bruteForce sur le mail et essayer de s'inscrire avec le mail en question (qui n'est donc pas le sien)
         */

         $reqInscris = $bdd->prepare("SELECT * FROM invitation WHERE token = ?");
         $reqInscris->execute(array($_GET['inscription']));
         $nmbrToken = $reqInscris->rowCount();

         if($nmbrToken == 0){
            header("Location: connexion.php");
         } else {
             //Pour maintenir l'accès quand on POST
         }


      

      // if(isset($_SESSION['inscription'])){
      //    //on regarde, sinon on est rediriger, pour eviter l'usurpation
      //    $keepSession = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
      //    $keepSession->execute(array($_SESSION['inscription']));
      //    $nmbrMail = $keepSession->rowCount();

      //    if($nmbrMail == 0){
      //       header("Location: index.php");
      //    }
      // }

   }else{
      header("Location: index.php");
   }
?>








<!-- CHECK AUSSI QUIL SINSCRIT AVEC LE MAIL DU TOKEN, ET PAS AVEC UN AUTRE COMPTE :) -->


<html>
   <head>
      <title>Reflex</title>
      <meta charset="utf-8">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/header.css" rel="stylesheet">
      <link href="css/footer.css" rel="stylesheet">
      <link href="css/inscription.css" rel="stylesheet">
   </head>
   <body>

      <?php include("includes/header.php"); ?>

      <section id="login-box">

         <h2>Inscription</h2>
         <br /><br />
         <div class="champsRequis">* tous les champs sont requis</div>
         <form method="POST" action="">
            <br /><br />

            <table>

               <div class="textbox">
                  <tr>
                     <td>
                        <p class="genre">Genre : </p>
                        <select name="choix">
                            <option value="Femme">Femme</option>
                            <option value="Homme">Homme</option>
                            <option value="Autre">Autre</option>
                           
                        </select>
                        
                     </td>
                  </tr>
                  <tr>
                     <!-- value="if(isset($variable)){echo}" 
                        permet de laissez les informations qui ont étaient correctement remplies, pour pas que l'utilisateur ait a remettre ses informations-->
                     <td>
                        <input type="text" placeholder="Votre prénom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     
                     <td>
                        <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     
                     <td>
                        <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     
                     <td>
                        <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+)).*$" required>
                        <p class="description">* 8 caractères dont un spécial sont requis</p>
                     </td>
                  </tr>
                  <tr>
                    
                     <td>
                        <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" /><br/><br/>
                        <p class="lien"><a href="cgu.php">Veuillez consulter les conditions générales d'utilisation</a></p><br/>
                        <input type="checkbox" name="cgu" id="cgu"/><label for="cgu"> J'accepte ces conditions générales d'utilisation</label>
                     </td>
                  </tr>
                  
               </div>

               
            </table>
            <tr>
                  
                  <td align="center">
                     <br />
                     <input class="btn" type="submit" name="forminscription" value="Je m'inscris" />
                  </td>
               </tr>
         </form>
         <?php
            if(isset($erreur)) {
               echo '<font color="red">'.$erreur."</font>";
            }
         ?>

      </section>

      <?php include("includes/footer.php"); ?>
   </body>
</html>
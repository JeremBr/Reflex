<?php
   session_start();

   $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
   include 'function/numberUserLive.php';
   include("includes/header.php");


   /* ICI ON INSCRIT LUTILISATEUR SI LE FORMULAIRE A ETE CORRECTEMENT REMPLIE */
    
   if(isset($_POST['forminscription'])) {

      $prenom = htmlspecialchars($_POST['prenom']);
      $nom = htmlspecialchars($_POST['nom']);


      if(!empty($_POST['choix']) AND !empty($_POST['nom']) AND!empty($_POST['prenom']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
         if(isset($_POST['cgu'])){

            $genre = htmlspecialchars($_POST['choix']);
         
            $mdp = sha1($_POST['mdp']);
            $mdp2 = sha1($_POST['mdp2']);


            $nomlength = strlen($nom);
            $prenomlength = strlen($prenom);

            if($prenomlength <= 50) {
               if($nomlength <= 50){

                  
                  $timeInvit = $_SESSION['temps'];
                  $time = time();

                  if( ($time - $timeInvit) < (24*3600) ){

                     if($mdp == $mdp2){

                        $insertmbr = $bdd->prepare("INSERT INTO utilisateur(genre, prenom, nom, mail, motDePasse) VALUES(?,?,?,?,?)");
                        $insertmbr->execute(array($genre,$prenom,$nom,$_SESSION['mail'],$mdp));

                        $delUser = $bdd->prepare("DELETE FROM invitation WHERE mail = ?");
                        $delUser->execute(array($_SESSION['mail']));

                        $erreur = trad("Votre compte a bien été créé ! ","Your account has been ! ") . "<a href=\"connexion.php\">Me connecter</a>";
                     } else {
                        $erreur = trad("Vos mots de passes ne correspondent pas !","Your passwords do not match");
                     }
                  

                  } else {
                     $erreur = trad("Vous n'êtes plus autorisé à vous inscrire !","You cannot sign up anymore !");
                  }
                  
                               
                        
               } else {
                  $erreur = trad("Votre nom ne doit pas dépasser 50 caractères !","Your last name must have 50 characters max !");
               }
               
            } else {
               $erreur = trad("Votre prenom ne doit pas dépasser 50 caractères !","Your first name must have 50 characters max !");
            }

         } else {
            $erreur = trad("Vous n'avez pas accepté les conditions générales d'utilisation","Please accept the general conditions");
         }
         

      } else {
         $erreur = trad("Tous les champs doivent être complétés !","Not all fields have been completed");
      }
   }




   /* ICI ON VERIFIE LACCES A LA PAGE */

   if( ( isset($_GET['inscription']) && !empty($_GET['inscription']) ) ){

      
         
         /* On regarde si le token est bien registré
            Si oui alors on enregistre le mail associé et quand ce token a été crée
         */

         $reqInscris = $bdd->prepare("SELECT * FROM invitation WHERE token = ?");
         $reqInscris->execute(array($_GET['inscription']));
         $nmbrToken = $reqInscris->rowCount();

         if($nmbrToken == 0){
            header("Location: connexion.php");
         } else {
             //Pour maintenir l'accès quand on POST
            $invite = $reqInscris->fetch();
            $_SESSION['mail'] = $invite['mail'];
            $_SESSION['temps'] = $invite['temps'];
         }


      

   }else{
      header("Location: index.php");
   }



?>





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

      <section id="login-box">

         <h2><?php echo trad("Inscription","Sign up")?></h2>
         
         <div class="champsRequis"><?php echo trad("* tous les champs sont requis","* all fields are required")?></div>
         <form method="POST" action="">
            <br /><br />

            <table>

               <div class="textbox">
                  <tr>
                     <td>
                        <p class="genre"><?php echo trad("Genre : ","Gender : ")?></p>
                        <select name="choix">
                            <option value="Femme"><?php echo trad("Femme","Female")?></option>
                            <option value="Homme"><?php echo trad("Homme","Male")?></option>
                            <option value="Autre"><?php echo trad("Autre","Other")?></option>
                           
                        </select>
                        
                     </td>
                  </tr>
                  <tr>
                     
                     <td>
                        <input type="text" placeholder="Prénom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <input type="text" placeholder="Nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                     </td>
                  </tr>
                  
                  <tr>
                     
                     <td>
                        <p class="description"><?php echo trad("* 8 caractères dont un spécial sont requis","* 8 characters including a special one are required")?></p>
                        <input type="password" placeholder="Mot de passe" id="mdp" name="mdp" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+)).*$" required>
                        
                     </td>
                  </tr>
                  <tr>
                    
                     <td>
                        <input type="password" placeholder="Confirmez mot de passe" id="mdp2" name="mdp2" /><br/><br/>
                        <p class="lien"><a href="cgu.php"><?php echo trad("Veuillez consulter les conditions générales d'utilisation","Please accept the general conditions")?></a></p><br/>
                        <input type="checkbox" name="cgu" id="cgu"/><label for="cgu"> <?php echo trad("J'accepte ces conditions générales d'utilisation","I accept the general conditions")?></label>
                     </td>
                  </tr>
                  
               </div>

               
            </table>
            <tr>
                  
                  <td align="center">
                     <br />
                     <input class="btn" type="submit" name="forminscription" value="<?php echo trad("Je m'inscris","Sign up")?>" />
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
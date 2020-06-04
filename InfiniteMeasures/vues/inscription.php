<html>
   <head>
      <base href="/InfiniteMeasures/">
      <title><?php echo trad("Inscription","Sign up")?></title>
      <meta charset="utf-8">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/header.css" rel="stylesheet">
      <link href="css/footer.css" rel="stylesheet">
      <link href="css/titreEtBloc.css" rel="stylesheet">
      <link href="css/inscription.css" rel="stylesheet">
   </head>
   <body>

         <h2><?php echo trad("Inscription","Sign up")?></h2>
         
            <section class="conteneur1">
               <section class="conteneur2">
                  <div class="conteneur3">

         <form method="POST" action="">

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
                        <input type="password" placeholder="Mot de passe" id="mdp" name="mdp" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+)).*$" required>
                        <p class="description"><?php echo trad("* 8 caractères dont un spécial sont requis","* 8 characters including a special one are required")?></p>
                     </td>
                  </tr>
                  <tr>
                    
                     <td>
                        <input type="password" placeholder="Confirmez mot de passe" id="mdp2" name="mdp2" /><br/><br/>
                        <p class="lien"><a href="cgu.php"><?php echo trad("Veuillez consulter les conditions générales d'utilisation","Please accept the general conditions of use")?></a></p><br/>
                        <input type="checkbox" name="cgu" id="cgu"/><label for="cgu"> <?php echo trad("J'accepte ces conditions générales d'utilisation","I accept the general conditions of use")?></label>
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
                  </div>
               </section>
            </section>
      
   </body>
</html>
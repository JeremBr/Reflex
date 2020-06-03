<html>
   <head>
      <base href="/InfiniteMeasures/">
      <title>Reflex</title>
      <meta charset="utf-8">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/header.css" rel="stylesheet">
      <link href="css/footer.css" rel="stylesheet">
      <link href="css/inscription.css" rel="stylesheet">
   </head>
   <body>

      <section id="login-box">

         <h2>Inscription</h2>
         
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
                        <p class="description">* 8 caractères dont un spécial sont requis</p>
                        <input type="password" placeholder="Mot de passe" id="mdp" name="mdp" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+)).*$" required>
                        
                     </td>
                  </tr>
                  <tr>
                    
                     <td>
                        <input type="password" placeholder="Confirmez mot de passe" id="mdp2" name="mdp2" /><br/><br/>
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

      
   </body>
</html>
<!DOCTYPE html>
<html>
   <head>
      <base href="/InfiniteMeasures/">
      <title><?php echo trad("Connexion","Log in")?></title>
      <meta charset="utf-8">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/footer.css" rel="stylesheet">
      <link href="css/header.css" rel="stylesheet">
      <link href="css/titreEtBloc.css" rel="stylesheet">
      <link href="css/login.css" rel="stylesheet">



   </head>
   <body>

               
         <div class="wrapper2">
            <h2><?php echo trad("Connexion","Log in")?></h2>
                  <section class="conteneur1">
                  <section class="conteneur2">
                              <div class="conteneur3">
            <br /><br />
            <form method="POST" action="">
               <br /><br />
               <div class="textbox">
                  <input type="email" name="mailconnect" placeholder="<?php echo trad("Mail","Email address")?>" /> <!-- mettre mail si ya cookie ou autre -->
               </div>
               <div class="textbox">
                  <input type="password" name="mdpconnect" placeholder="<?php echo trad("Mot de passe","Password")?>" />
               </div>

               <br /><br />
               <input class="btn" type="submit" name="formconnexion" value="<?php echo trad("Se connecter !","Log in !")?>" />
            </form>
         </div>


      <div class="test">
         <a href="motDePasseOublie"><?php echo trad("Mot de passe oublié ?","Forgot password ?")?></a>

      </div>
         <?php
            if(isset($erreur)) {
               echo '<font color="red">'.$erreur."</font>";
            }
            
            ?>
         </section>
            </section>
                     </div>

   </body>
</html>
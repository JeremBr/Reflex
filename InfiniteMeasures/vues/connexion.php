<!DOCTYPE html>
<html>
   <head>
      <base href="/infiniteMeasures/">
      <title>Reflex</title>
      <meta charset="utf-8">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/footer.css" rel="stylesheet">
      <link href="css/header.css" rel="stylesheet">
      <link href="css/login.css" rel="stylesheet">


   </head>
   <body>

      
      <section id="login-box">
         
         <div class="wrapper2">
            <h2><?php echo trad("Connexion","Log in")?></h2>
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

            <?php
            if(isset($erreur)) {
               echo '<font color="red">'.$erreur."</font>";
            }
            ?>
         </div>

      </section>

      <div class="test">
      <a href="motDePasseOublié"><?php echo trad("Mot de passe oublié ?","Forgot password")?></a>
      </div>

   </body>
</html>
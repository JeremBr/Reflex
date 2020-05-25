<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
include 'function/numberUserLive.php';
 
if(isset($_POST['formconnexion'])) {

   if(!empty($_POST['mailconnect'])) {
      if(!empty($_POST['mdpconnect'])){

         $mailconnect = htmlspecialchars($_POST['mailconnect']);
         $mdpconnect = hash('sha256', $_POST['mdpconnect']);

         $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ? AND motDePasse = ?");
         $requser->execute(array($mailconnect, $mdpconnect));
         $userexist = $requser->rowCount();
         if($userexist == 1) {
            $userinfo = $requser->fetch();

            //$_SESSION['idUtilisateur'] = $userinfo['idUtilisateur'];
            //$_SESSION['mail'] = $userinfo['mail'];

            setcookie('idUtilisateur', $userinfo['idUtilisateur'], time() + (60*2));
            //setcookie('mail', $userinfo['mail'], time() + (60*2));
            setcookie('mdp', $mdpconnect, time() + (60*2));


            //header("Location: monCompte.php?idUtilisateur=".$_SESSION['idUtilisateur']);
            header("Location: monCompte.php");
         } else {
            $erreur = "Mauvais mail ou mot de passe !";
         }

      } else {
         $erreur = "Veuillez saisir votre mot de passe !";
      }
      
   } else {
      $erreur = "Veuillez saisir votre mail !";
   }
}
?>




<html>
   <head>
      <title>Reflex</title>
      <meta charset="utf-8">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/footer.css" rel="stylesheet">
      <link href="css/header.css" rel="stylesheet">
      <link href="css/login.css" rel="stylesheet">


   </head>
   <body>

      <?php include("includes/header.php"); ?>

      
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
      <a href="motPasseOublie.php"><?php echo trad("Mot de passe oublié ?","Forgot password")?></a>
      </div>

      <?php include("includes/footer.php"); ?>
   </body>
</html>
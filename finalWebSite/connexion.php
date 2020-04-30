<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
 
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
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
      $erreur = "Tous les champs doivent être complétés !";
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
            <h2>Connexion</h2>
            <br /><br />
            <form method="POST" action="">
               <br /><br />
               <div class="textbox">
                  <input type="email" name="mailconnect" placeholder="Mail" />
               </div>
               <div class="textbox">
                  <input type="password" name="mdpconnect" placeholder="Mot de passe" />
               </div>

               <br /><br />
               <input class="btn" type="submit" name="formconnexion" value="Se connecter !" />
            </form>

            <?php
            if(isset($erreur)) {
               echo '<font color="red">'.$erreur."</font>";
            }
            ?>
         </div>

      </section>

      <div class="test">
      <a href="motPasseOublie.php">Mot de passe oublié ? - </a>
      <a href="inscription.php">S'inscrire</a>
      </div>

      <?php include("includes/footer.php"); ?>
   </body>
</html>
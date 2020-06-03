<?php

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

            setcookie('idUtilisateur', $userinfo['idUtilisateur'], time() + (60*2));
            setcookie('mdp', $mdpconnect, time() + (60*2));

            header("Location: compte");
         } else {
            $erreur = trad("Mauvais mail ou mot de passe !","Wrong email or password !");
         }

      } else {
         $erreur = trad("Veuillez saisir votre mot de passe !","Please enter a password !");
      }
      
   } else {
      $erreur = trad("Veuillez saisir votre mail !","Please enter your email address !");
   }
}

?>
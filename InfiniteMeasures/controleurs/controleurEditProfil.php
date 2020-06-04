<?php

include("./modele/cookie.php");

if(isset($_COOKIE['idUtilisateur']) && isset($_COOKIE['mdp'])) {
   $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = ? AND motdepasse = ?");
   $requser->execute(array($_COOKIE['idUtilisateur'], $_COOKIE['mdp']));
   $exist = $requser->rowCount();

   if($exist == 1){


      $user = $requser->fetch();

      if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom']) {
         $newnom = htmlspecialchars($_POST['newnom']);
         $insertpseudo = $bdd->prepare("UPDATE utilisateur SET nom = ? WHERE idUtilisateur = ?");
         $insertpseudo->execute(array($newnom, $_COOKIE['idUtilisateur']));
         header('Location: compte');
      }

      if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom']) {
         $newprenom = htmlspecialchars($_POST['newprenom']);
         $insertpseudo = $bdd->prepare("UPDATE utilisateur SET prenom = ? WHERE idUtilisateur = ?");
         $insertpseudo->execute(array($newprenom, $_COOKIE['idUtilisateur']));
         header('Location: compte');
      }

      if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'] AND filter_var($_POST['newmail'], FILTER_VALIDATE_EMAIL)) {
         $newmail = htmlspecialchars($_POST['newmail']);
         $insertmail = $bdd->prepare("UPDATE utilisateur SET mail = ? WHERE idUtilisateur = ?");
         $insertmail->execute(array($newmail, $_COOKIE['idUtilisateur']));
         header('Location: compte');
      }

      if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $user['adresse']) {
         $newadresse = htmlspecialchars($_POST['newadresse']);
         $insertadresse = $bdd->prepare("UPDATE utilisateur SET adresse = ? WHERE idUtilisateur = ?");
         $insertadresse->execute(array($newadresse, $_COOKIE['idUtilisateur']));
         header('Location: compte');
      }

      if(isset($_POST['newcode']) AND !empty($_POST['newcode']) AND $_POST['newcode'] != $user['codePostale']) {
         $newcode = htmlspecialchars($_POST['newcode']);
         $insertcode = $bdd->prepare("UPDATE utilisateur SET codePostale = ? WHERE idUtilisateur = ?");
         $insertcode->execute(array($newcode, $_COOKIE['idUtilisateur']));
         header('Location: compte');
      }

      if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
         $mdp1 = hash('sha256', $_POST['newmdp1']);
         $mdp2 = hash('sha256', $_POST['newmdp2']);
         if($mdp1 == $mdp2) {
            $insertmdp = $bdd->prepare("UPDATE utilisateur SET motdepasse = ? WHERE idUtilisateur = ?");
            $insertmdp->execute(array($mdp1, $_COOKIE['idUtilisateur']));

            setcookie('mdp', $mdp1, time() + (60*2));

            header('Location: compte');
         } else {
            $msg = trad("Vos deux mots de passe ne correspondent pas !","Your two passwords don't match !");
         }
      }




   } else {
      header('Location: accueil');
   }
   
} else {
   header("Location: connexion");
}
?>
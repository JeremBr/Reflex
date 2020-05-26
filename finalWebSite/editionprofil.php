<?php
include("includes/header.php");
session_start();
 
$bdd = new PDO('mysql:host=localhost;dbname=reflex', 'root', '');

include 'function/cookie.php';
include 'function/numberUserLive.php';

 
if(isset($_COOKIE['idUtilisateur']) && isset($_COOKIE['mdp'])) {
   $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE idUtilisateur = ? AND motdepasse = ?");
   $requser->execute(array($_COOKIE['idUtilisateur'], $_COOKIE['mdp']));
   $exist = $requser->rowCount();

   if($exist == 1){


      $user = $requser->fetch();

      if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['pseudo']) {
         $newnom = htmlspecialchars($_POST['newnom']);
         $insertpseudo = $bdd->prepare("UPDATE utilisateur SET nom = ? WHERE idUtilisateur = ?");
         $insertpseudo->execute(array($newnom, $_COOKIE['idUtilisateur']));
         header('Location: monCompte.php');
      }

      if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['pseudo']) {
         $newprenom = htmlspecialchars($_POST['newprenom']);
         $insertpseudo = $bdd->prepare("UPDATE utilisateur SET nom = ? WHERE idUtilisateur = ?");
         $insertpseudo->execute(array($newprenom, $_COOKIE['idUtilisateur']));
         header('Location: monCompte.php');
      }

      if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
         $newmail = htmlspecialchars($_POST['newmail']);
         $insertmail = $bdd->prepare("UPDATE utilisateur SET mail = ? WHERE idUtilisateur = ?");
         $insertmail->execute(array($newmail, $_COOKIE['idUtilisateur']));
         header('Location: monCompte.php');
      }

      if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $user['adresse']) {
         $newadresse = htmlspecialchars($_POST['newadresse']);
         $insertadresse = $bdd->prepare("UPDATE utilisateur SET adresse = ? WHERE idUtilisateur = ?");
         $insertadresse->execute(array($newadresse, $_COOKIE['idUtilisateur']));
         header('Location: monCompte.php');
      }

      if(isset($_POST['newcode']) AND !empty($_POST['newcode']) AND $_POST['newcode'] != $user['codePostale']) {
         $newcode = htmlspecialchars($_POST['newcode']);
         $insertcode = $bdd->prepare("UPDATE utilisateur SET codePostale = ? WHERE idUtilisateur = ?");
         $insertcode->execute(array($newcode, $_COOKIE['idUtilisateur']));
         header('Location: monCompte.php');
      }

      if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
         $mdp1 = hash('sha256', $_POST['newmdp1']);
         $mdp2 = hash('sha256', $_POST['newmdp2']);
         if($mdp1 == $mdp2) {
            $insertmdp = $bdd->prepare("UPDATE utilisateur SET motdepasse = ? WHERE idUtilisateur = ?");
            $insertmdp->execute(array($mdp1, $_COOKIE['idUtilisateur']));

            setcookie('mdp', $mdp1, time() + (60*2));

            header('Location: monCompte.php');
         } else {
            $msg = trad("Vos deux mots de passe ne correspondent pas !","Your two passwords don't match !");
         }
      }




   } else {
      header('Location: index.php');
   }
   
?>
<html>
   <head>
      <title>Reflex</title>
      <meta charset="utf-8">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/editProfil.css" rel="stylesheet">
      
        
   </head>
   <body>


      <div align="center">
         <h2><?php echo trad("Edition de mon profil","Edit profil")?></h2>
         <div align="left">
            <div class="formulaire">

            <form method="POST" action="" enctype="multipart/form-data">
               <label><?php echo trad("Nom :","Last name :")?></label><br/>
               <input type="text" name="newnom" placeholder="<?php echo trad("Nom","Last name") ?>" value="<?php echo $user['nom']; ?>" /><br /><br />

               <label><?php echo trad("Prénom :","First name :")?></label><br/>
               <input type="text" name="newprenom" placeholder="<?php echo trad("Prénom","First name") ?>" value="<?php echo $user['prenom']; ?>" /><br /><br />

               <label><?php echo trad("Mail :","Email :")?></label><br/>
               <input type="text" name="newmail" placeholder="<?php echo trad("Mail","Email") ?>" value="<?php echo $user['mail']; ?>" /><br /><br />

               <label><?php echo trad("Adresse :","Adress :")?></label><br/>
               <input type="text" name="newadresse" placeholder="<?php echo trad("Votre adresse","Your adress") ?>" value="<?php echo $user['adresse']; ?>" /><br /><br />

               <label><?php echo trad("Code postale :","Postal code :")?></label><br/>
               <input type="text" name="newcode" placeholder="<?php echo trad("Votre code postale","Your postal code") ?>" value="<?php echo $user['codePostale']; ?>" /><br /><br />

               <label><?php echo trad("Nouveau mot de passe :","New password :")?></label><p class="description"><?php echo trad("* 8 caractères dont un spécial","* 8 characters including a special one") ?></p><br/>
               <input type="password" name="newmdp1" placeholder="<?php echo trad("Nouveau mot de passe","New password") ?>"/><br /><br />

               <label><?php echo trad("Confirmation – mot de passe :","Password - confirmation :")?></label><br/>
               <input type="password" name="newmdp2" placeholder="<?php echo trad("Confirmation du nouveau mot de passe","Password confirmation") ?>" /><br /><br />
               
               <input type="submit" value="<?php echo trad("Mettre à jour mon profil","Update profil") ?>" />
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>
   </div>
      <?php include("includes/footer.php"); ?>
      
   </body>
</html>


<?php   
} else {
   header("Location: connexion.php");
}
?>
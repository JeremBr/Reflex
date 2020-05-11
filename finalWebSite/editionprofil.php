<?php
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
         $mdp1 = sha1($_POST['newmdp1']);
         $mdp2 = sha1($_POST['newmdp2']);
         if($mdp1 == $mdp2) {
            $insertmdp = $bdd->prepare("UPDATE utilisateur SET motdepasse = ? WHERE idUtilisateur = ?");
            $insertmdp->execute(array($mdp1, $_COOKIE['idUtilisateur']));
            header('Location: monCompte.php');
         } else {
            $msg = "Vos deux mdp ne correspondent pas !";
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

      <?php include("includes/header.php"); ?>


      <div align="center">
         <h2>Edition de mon profil</h2>
         <div align="left">
            <div class="formulaire">

            <form method="POST" action="" enctype="multipart/form-data">
               <label>Nom :</label><br/>
               <input type="text" name="newnom" placeholder="Nom" value="<?php echo $user['nom']; ?>" /><br /><br />

               <label>Prénom :</label><br/>
               <input type="text" name="newprenom" placeholder="Préom" value="<?php echo $user['prenom']; ?>" /><br /><br />

               <label>Mail :</label><br/>
               <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br /><br />

               <label>Adresse :</label><br/>
               <input type="text" name="newadresse" placeholder="Votre adresse" value="<?php echo $user['adresse']; ?>" /><br /><br />

               <label>Code Postale :</label><br/>
               <input type="text" name="newcode" placeholder="Votre code postale" value="<?php echo $user['codePostale']; ?>" /><br /><br />

               <label>Nouveau mot de passe :</label><p class="description">* 8 caractères dont un spécial</p><br/>
               <input type="password" name="newmdp1" placeholder="Nouveau mot de passe"/><br /><br />

               <label>Confirmation - mot de passe :</label><br/>
               <input type="password" name="newmdp2" placeholder="Confirmation du nouveau mot de passe" /><br /><br />
               
               <input type="submit" value="Mettre à jour mon profil !" />
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
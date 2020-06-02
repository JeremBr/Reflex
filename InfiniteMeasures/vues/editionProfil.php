<!DOCTYPE html>
<html>
   <head>
      <base href="/infiniteMeasures/">
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
      *
      
   </body>
</html>

<?php




   /* ICI ON INSCRIT LUTILISATEUR SI LE FORMULAIRE A ETE CORRECTEMENT REMPLIE */
    
   if(isset($_POST['forminscription'])) {

      $prenom = htmlspecialchars($_POST['prenom']);
      $nom = htmlspecialchars($_POST['nom']);


      if(!empty($_POST['choix']) AND !empty($_POST['nom']) AND!empty($_POST['prenom']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
         if(isset($_POST['cgu'])){

            $genre = htmlspecialchars($_POST['choix']);

            $mdp = hash("sha256", $_POST['mdp']);
            $mdp2 = hash("sha256", $_POST['mdp2']);
         
            // $mdp = sha1($_POST['mdp']);
            // $mdp2 = sha1($_POST['mdp2']);


            $nomlength = strlen($nom);
            $prenomlength = strlen($prenom);

            if($prenomlength <= 50) {
               if($nomlength <= 50){

                  
                  $timeInvit = $_SESSION['temps'];
                  $time = time();

                  if( ($time - $timeInvit) < (24*3600) ){

                     if($mdp == $mdp2){

                        $insertmbr = $bdd->prepare("INSERT INTO utilisateur(genre, prenom, nom, mail, motDePasse) VALUES(?,?,?,?,?)");
                        $insertmbr->execute(array($genre,$prenom,$nom,$_SESSION['mail'],$mdp));

                        $delUser = $bdd->prepare("DELETE FROM invitation WHERE mail = ?");
                        $delUser->execute(array($_SESSION['mail']));

                        $erreur = "Votre compte a bien été créé ! <a href=\"connexion\">Me connecter</a>";
                     } else {
                        $erreur = "Vos mots de passes ne correspondent pas !";
                     }
                  

                  } else {
                     $erreur = "Vous n'êtes plus autorisé à vous inscrire !";
                  }
                  
                               
                        
               } else {
                  $erreur = "Votre nom ne doit pas dépasser 50 caractères !";
               }
               
            } else {
               $erreur = "Votre prenom ne doit pas dépasser 50 caractères !";
            }

         } else {
            $erreur = "Vous n'avez pas accepté les conditions générales d'utilisation";
         }
         

      } else {
         $erreur = "Tous les champs doivent être complétés !";
      }
   }




   /* ICI ON VERIFIE LACCES A LA PAGE */

   if( ( isset($_GET['inscription']) && !empty($_GET['inscription']) ) ){

      
         
         /* On regarde si le token est bien registré
            Si oui alors on enregistre le mail associé et quand ce token a été crée
         */

         $reqInscris = $bdd->prepare("SELECT * FROM invitation WHERE token = ?");
         $reqInscris->execute(array($_GET['inscription']));
         $nmbrToken = $reqInscris->rowCount();

         if($nmbrToken == 0){
            header("Location: connexion");
         } else {
             //Pour maintenir l'accès quand on POST
            $invite = $reqInscris->fetch();
            $_SESSION['mail'] = $invite['mail'];
            $_SESSION['temps'] = $invite['temps'];
         }


      

   }else{
      header("Location: accueil");
   }



?>
<?php
    
    if( isset($_GET['pass']) && !empty($_GET['pass']) ){

	        // on regarde si le token est le bon

	        $reqOublie = $bdd->prepare("SELECT * FROM oublie WHERE token = ?");
	        $reqOublie->execute(array($_GET['pass']));
	        $nmbrToken = $reqOublie->rowCount();

	        if($nmbrToken > 0){

	        	if(isset($_POST['motPasse']) AND !empty($_POST['motPasse']) AND isset($_POST['CmotPasse']) AND !empty($_POST['CmotPasse'])){

		         	$time = time();
		            $invit = $reqOublie->fetch();

		            if(($time - $invit['temps']) < (24*3600)){

						    
						if($_POST['motPasse'] == $_POST['CmotPasse']) {
						    
						    $mdp1 = hash('sha256', $_POST['motPasse']);

						    $delToken = $bdd->prepare('DELETE FROM oublie WHERE token = ?');
							$delToken->execute(array($_GET['pass']));

						    $insertmdp = $bdd->prepare("UPDATE utilisateur SET motDePasse = ? WHERE mail = ?");
						    $insertmdp->execute(array($mdp1, $invit['mail']));
						    header('Location: connexion');
						} else {
						    $msg = "Vos deux mdp ne correspondent pas !";
						}
						


		            } else {
		            	$msg = "Le temps pour la réintialisation de mot de passe a expiré";
		            }
		        }
	            
	        } else {
	         	header("Location: accueil");
	        }


   }else{
      header("Location: accueil");
   }

?>
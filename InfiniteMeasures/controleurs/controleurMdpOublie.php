<?php


    if(isset($_POST['forminscription'])) {

    	if(isset($_POST['mail']) && !empty($_POST['mail'])){

    		$mail = htmlspecialchars($_POST['mail']);

    		if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {

    			$reqmdp = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
                $reqmdp->execute(array($mail));
                $mailexist = $reqmdp->rowCount();

                if($mailexist == 1) {

                	include "./modele/sendPassword.php";
                    $erreur = trad("L'invitation a bien été envoyée !","The invitation has been sent !");

                }else{
                	$erreur = trad("L'adresse mail saisie n'existe pas.","The entered email address does not exist");
                }

    		} else {
    			$erreur = trad("Veuillez saisir une adresse mail valide !","Please enter a valid email address !");
    		}

    	} else {
    		$erreur = trad("Veuillez entrer une adresse mail !","Please enter an email address !");
    	}


    }

?>
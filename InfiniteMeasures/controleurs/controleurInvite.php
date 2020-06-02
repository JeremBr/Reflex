<?php 
	if((isset($access)) && ( ($access == 1) || ($access == 2) ) ){

		if(isset($_POST['forminscription'])) {

			if(!empty($_POST['mail'])){

				$mail = htmlspecialchars($_POST['mail']);

				if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {

					$reqmail = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();

                    if($mailexist == 0) {
                    	
                    	include "modele/sendToken.php";
                    	$erreur = trad("L'invitation a bien été envoyée !","The invitation has been sent !");

                    } else {
                    	$erreur = trad("Adresse mail déjà enregistrée !","Email address already saved !");
                    }


				} else {
					$erreur = trad("L'adresse mail saisie n'est pas valide !","Invalid email address !");
				}


			} else {
				$erreur = trad("Veuillez rentrer une adresse mail !","Please enter an email address !");
			}



		}
	} else {
		header("Location: compte");
	}

	?>
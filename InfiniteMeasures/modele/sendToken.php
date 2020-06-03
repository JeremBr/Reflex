<?php
	
	//REFLECHIR A FAIRE UNE FONCTION A LA PLACE DE TOUT CA?


	//DONC DANS BDD ON A : token, temps, mail
    
    /* DEFINIT VARIABLES */
	$token = bin2hex(random_bytes(64));
	$time = time();

    /* ON REGARDE SI UNE INVITATION A DEJA ETE ENVOYER A CET EMAIL */
    $reqtoken = $bdd->prepare("SELECT * FROM invitation WHERE mail = ?");
    $reqtoken->execute(array($mail));
    $mailToken = $reqtoken->rowCount();

    if($mailToken == 0){

        $insertToken = $bdd->prepare("INSERT INTO invitation(mail, token, temps) VALUES(?, ?, ?)");
        $insertToken->execute(array($mail, $token, $time));
        

    } else { /* DONC SI IL A DEJA UNE INVITATION QUI A ETE ENVOYER, ON UPDATE LE TEMPS ET ON RENVOIE LE MAIL AVEC UN TOKEN DIFFERENT */
        $insertToken = $bdd->prepare("UPDATE invitation SET temps=?, token=? WHERE mail=?");
        $insertToken->execute(array($time, $token, $mail));
        
    }


    /* DEFINIT TEXTE A ENVOYER */
    $object = "Invitation inscription";
    $emailText = "Bienvenue chez Infinite Measures $mail, veuillez cliquer sur le lien ci-dessous dans un délai de 24h pour vous inscrire:\n\nhttp://localhost/infiniteMeasures/inscription.php?inscription=$token";

    $emailTo = "InfiniteMeasures@mail.com";
    $headers = "From: Infinite Measures <{$emailTo}>\r\nReply-To: {$emailTo}";


    /* ENVOIE DU MAIL */
    mail($mail, $object, $emailText, $headers);

    

?>
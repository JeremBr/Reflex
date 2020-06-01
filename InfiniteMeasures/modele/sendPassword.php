<?php


	/* DEFINIT VARIABLES */
	$token = bin2hex(random_bytes(64));
	$time = time();

    /* ON REGARDE SI UNE INVITATION A DEJA ETE ENVOYER A CET EMAIL */
    $reqtoken = $bdd->prepare("SELECT * FROM oublie WHERE mail = ?");
    $reqtoken->execute(array($mail));
    $mailToken = $reqtoken->rowCount();

    if($mailToken == 0){

        $insertToken = $bdd->prepare("INSERT INTO oublie(mail, token, temps) VALUES(?, ?, ?)");
        $insertToken->execute(array($mail, $token, $time));
        

    } else { /* DONC SI MAIL A DEJA ETE ENVOYER, ON UPDATE LE TEMPS ET ON RENVOIE LE MAIL AVEC UN TOKEN DIFFERENT */
        $insertToken = $bdd->prepare("UPDATE oublie SET temps=?, token=? WHERE mail=?");
        $insertToken->execute(array($time, $token, $mail));
        
    }


	/* DEFINIT TEXTE A ENVOYER */
    $object = "Mot de passe oublié ?";
    $emailText = "Veuillez cliquer sur le lien ci-dessous dans un délai de 24h pour récuperez votre mot de passe:\n\nhttp://localhost/finalWebSite/reinitialiserMp.php?pass=$token";

    $emailTo = "InfiniteMeasures@mail.com";
    $headers = "From: Infinite Measures <{$emailTo}>\r\nReply-To: {$emailTo}";


    /* ENVOIE DU MAIL */
    mail($mail, $object, $emailText, $headers);

?>
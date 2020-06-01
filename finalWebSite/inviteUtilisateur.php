<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/access.php';
    include 'function/numberUserLive.php';


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Inviter un utilisateur</title>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/invite.css" rel="stylesheet">
</head>
<body>

	<?php include("includes/header.php"); ?>


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
                    	
                    	include "function/sendToken.php";
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

		?>

		<div class="formulaire">
			<form method="POST" action="">
				<p><label for="mail"><?php echo trad("Adresse mail du destinataire : ","Recipient email address : ")?><strong>*</strong> </label></p>
				<p><input type="mail" name="mail" id="mail" size="50" required/></p>
				<input class="btn" type="submit" name="forminscription" value="Envoyer" />
			</form>
		</div>


		<?php
            if(isset($erreur)) {
               echo '<font color="red">'.$erreur."</font>";
            }
         ?>



		<?php
	} else {
		header("Location: monCompte.php");
	}

	?>



	<?php include("includes/footer.php"); ?>

</body>
</html>
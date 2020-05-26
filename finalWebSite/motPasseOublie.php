<?php
include("includes/header.php");

    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/numberUserLive.php';

    if(isset($_POST['forminscription'])) {

    	if(isset($_POST['mail']) && !empty($_POST['mail'])){

    		$mail = htmlspecialchars($_POST['mail']);

    		if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {

    			$reqmdp = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
                $reqmdp->execute(array($mail));
                $mailexist = $reqmdp->rowCount();

                if($mailexist == 1) {

                	include "function/sendPassword.php";
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


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title><?php echo trad("Mot de passe oublié ? ","Forgot passwsord ? ")?></title>
		
		<link href="css/style.css" rel="stylesheet">
		<link href="css/styleMp.css" rel="stylesheet">
	</head>

	<body>

		<div class="titre"><h3><?php echo trad("Mot de passe oublié ? ","Forgot passwsord ? ")?></h3></div>
		<div class="formu">
			<form method="post" action="motPasseOublie.php">
				
				<div id="mp">

					<p class="champs"><?php echo trad("* champs obligatoires","* Required fields")?></p>
					<p><label for="mail"><?php echo trad("Adresse mail du compte : ","Account email address : ")?><strong>*</strong> </label>  </p><! attribut for doit être le même que l'id du label/input auquel il est rattaché> 
					<?php
			            if(isset($erreur)) {
			               echo '<font color="red">'.$erreur."</font>";
			            }
			         ?>
					<p><input type="email" name="mail" id="mail" size="50" required/> </p>


					

					<input class="envoi" type="submit" name="forminscription" value="Envoyer un mail de récupération"/>

				</div>

			</form>


		</div>



		<?php include("includes/footer.php"); ?>



	</body>
</html>	
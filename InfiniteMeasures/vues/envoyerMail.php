<?php
    

    if(isset($_GET['userMail']) AND !empty($_GET['userMail'])){

    	$userMail = $_GET['userMail'];

    } else {
    	// header("Location: compte");
    }

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title><?php echo trad("Envoyer un mail","Send an email")?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<link rel="stylesheet" href="css/styleE2.css" />

		<script src="js/script.js"></script>
	</head>

	<body>

		

		<?php
		if(isset($access)){
			if(($access == 1) OR ($access == 2)){

				?>
				<h2><?php echo trad("Ecrivez votre mail ","Write your email ")?></h2>
				<div class="formulaire">
					<form id="contact-form" method="post" action="" role="form">
							
						<div id="champsMail">
						

							<div class="corps">

								<!-- <p class="titre">Ecrivez votre mail </p>
								<br/> -->
							
						<p><label for="email"><?php echo trad("Adresse mail du destinataire : ","Recipient email : ")?><strong>*</strong> </label></p>
						<p ><input type="email" name="email" id="email" value="<?php if(isset($userMail)) { echo $userMail; } ?>" size="45" required/>
						</p><p class="comments"></p>

						<p><label for="object"><?php echo trad("Objet du message : ","Message object : ")?><strong>*</strong></label></p>
						<p ><input type="text" name="object" id="object" size="45" required/></p>
						<p class="comments"></p>

						<p><label for="message"><?php echo trad("Votre message : ","Your message : ")?><strong>*</strong></label></p>
						<p ><textarea type="msg" name="message" id="message" size="50" rows="10" cols="45" required></textarea> </p>
						<p class="comments"></p>

						<p class="envoi"><input type="submit" value="Envoyer" /></p>

						
							</div>

							<p class="champs">
								<?php echo trad("* champs obligatoires","* Required fields")?>
							</p>
						
					
						</div>
					</form>
				</div>

				<?php

			} else{
				header("Location: compte");
			}
		} else {
			header("Location: connexion");
		}
		?>

		
	</body>

</html>
<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?php echo trad("Envoyer un mail","Send an email")?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="css/styleEnvoyerMail.css" />
		<link rel="stylesheet" href="css/titreEtBloc.css" />

		
	</head>

	<body>

		
		<h2><?php echo trad("Ecrivez votre mail ","Write your email ")?></h2>


		<section class="conteneur1">
			<section class="conteneur2">
				<form id="contact-form" method="post" action="" role="form">
						
					<div id="champsMail">
					

						<div class="corps">

							<label for="email"><?php echo trad("Adresse mail du destinataire : ","Recipient email : ")?><strong>*</strong> </label>
							<input type="emailTo" name="emailTo" id="emailTo" value="<?php if(isset($userMail)) { echo $userMail; } ?>" size="46" required/>
							<p class="comments"></p>

							<label for="object"><?php echo trad("Objet du message : ","Message object : ")?><strong>*</strong></label>
							<input type="text" name="object" id="object" size="50" required/>
							<p class="comments"></p>

							<label for="message"><?php echo trad("Votre message : ","Your message : ")?><strong>*</strong></label>
							<textarea type="msg" name="message" id="message" size="50" rows="10" cols="45" required></textarea> 
							<p class="comments"></p>

							<p class="envoi"><input type="submit" value="Envoyer" /></p>

						</div>

						<p class="champs">
							<?php echo trad("* champs obligatoires","* Required fields")?>
						</p>
					
					</div>
				</form>
			</section>
		</section>
		
	</body>
</html>
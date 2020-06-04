<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title>Inviter un utilisateur</title>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/titreEtBloc.css" rel="stylesheet">
		<link href="css/invite.css" rel="stylesheet">
	</head>
	
	<body>
	
		<section class="conteneur1">
			<section class="conteneur2">
				<div class="conteneur3">
					
					<form method="POST" action="">
						<p><label for="mail"><?php echo trad("Adresse mail du destinataire : ","Recipient email address : ")?></label></p>
						<input type="mail" class="inputMail" name="mail" id="mail" required/><br/>
						<div class="conteneur4">
							<input class="btn" type="submit" name="forminscription" value="Envoyer" />
						</div>
					</form>


					<?php						
						if(isset($erreur)) {
							?>
							<div class="erreur">
							<?php
						echo '<font color="red">'.$erreur."</font>";
							?>
							</div>
							<?php
						}
					?>
					</p>
				</div>
			</section>
    	</section>
	</body>
</html>
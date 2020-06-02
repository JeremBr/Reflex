
<!DOCTYPE html>
<html>
<head>
	<base href="/infiniteMeasures/">
	<meta charset="utf-8"/>
	<title>Inviter un utilisateur</title>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/invite.css" rel="stylesheet">
</head>
<body>



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


</body>
</html>
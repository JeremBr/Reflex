<!DOCTYPE html>
<html>
	<head>
		<base href="/infiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?php echo trad("Mot de passe oublié ? ","Forgot passwsord ? ")?></title>
		
		<link href="css/style.css" rel="stylesheet">
		<link href="css/styleMp.css" rel="stylesheet">
	</head>

	<body>

		<div class="titre"><h3><?php echo trad("Mot de passe oublié ? ","Forgot passwsord ? ")?></h3></div>
		<div class="formu">
			<form method="post" action="">
				
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


	</body>
</html>	
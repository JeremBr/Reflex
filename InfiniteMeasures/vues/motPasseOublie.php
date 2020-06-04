<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?php echo trad("Mot de passe oublié ? ","Forgot passwsord ? ")?></title>
		
		<link href="css/style.css" rel="stylesheet">
		<link href="css/titreEtBloc.css" rel="stylesheet">
		<link href="css/styleMp.css" rel="stylesheet">
	</head>

	<body>

		<h2><?php echo trad("Mot de passe oublié ? ","Forgot passwsord ? ")?></h2>

		<section class="conteneur1">
			<section class="conteneur2">
				<div class="conteneur3">

			<form method="post" action="">
				
				<div id="mp">

					<p><label for="mail"><?php echo trad("Adresse mail du compte : ","Account email address : ")?> </label>  </p><! attribut for doit être le même que l'id du label/input auquel il est rattaché> 
					<?php
			            if(isset($erreur)) {
			               echo '<font color="red">'.$erreur."</font>";
			            }
			         ?>
					<input class="saisie" type="email" name="mail" id="mail" size="50" required/>


					<input class="btn" type="submit" name="forminscription" value="Envoyer un mail de récupération"/>

				</div>
			</form>

				</div>
			</section>
    	</section>

	</body>
</html>	
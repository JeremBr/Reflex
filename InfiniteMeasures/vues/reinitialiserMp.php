<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?= trad("Réinitialisation de votre mot de passe","Reset password") ?></title>
		<link rel="stylesheet" href="css/styleReMp.css" />
	</head>

	<body>

	<div class="titre"><h3><?= trad("Réinitialisation de votre mot de passe","Reset password") ?></h3></div>
	
	
		<form method="post" action="utilisateurs/reinitialiserMotDePasse?pass=<?php echo $_GET['pass']?>">
			

				<p class="champs"><?= trad(" * champs obligatoires","* Required fields") ?></p>
				<p><label for="mp"><?= trad("Mot de passe : ","Password : ") ?><strong>*</strong> </label>  </p> 
				<p><input type="password" placeholder="Votre nouveau mot de passe" name="motPasse" id="mp" size="50" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+)).*$" required/> </p>
				
				
				<p><label for="Cmp"><?= trad(" Confirmation du mot de passe :"," Password confirmation : ") ?><strong>*</strong> </label>  </p>
				<p><input type="password" placeholder="<?= trad("Confirmez votre mot de passe","Confirm your password") ?>" name="CmotPasse" id="Cmp" size="50" required/> </p>

				<p class="envoi"><input class ="boutton"type="submit"  value="<?= trad("Réinitialiser le mot de passe","Reset password") ?>"/></p>

				<?php if(isset($msg)) { echo $msg; } ?>

			
		
		</form>


	</body>
</html>	
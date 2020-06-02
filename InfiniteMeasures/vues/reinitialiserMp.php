<!DOCTYPE html>
<html>
	<head>
		<base href="/infiniteMeasures/">
		<meta charset="utf-8"/>
		<title>Réinitialisation de votre mot de passe </title>
		<link rel="stylesheet" href="css/styleReMp.css" />
	</head>

	<body>

	<div class="titre"><h3>Réinitialisez votre mot de passe</h3></div>
	
	
		<form method="post" action="reinitialiserMp.php?pass=<?php echo $_GET['pass']?>">
			

				<p class="champs"> * champs obligatoires</p>
				<p><label for="mp">Mot de passe : <strong>*</strong> </label>  </p> 
				<p><input type="password" placeholder="Votre nouveau mot de passe" name="motPasse" id="mp" size="50" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+)).*$" required/> </p>
				
				
				<p><label for="Cmp"> Confirmation du mot de passe : <strong>*</strong> </label>  </p>
				<p><input type="password" placeholder="Confirmez votre mdp" name="CmotPasse" id="Cmp" size="50" required/> </p>

				<p class="envoi"><input class ="boutton"type="submit"  value="Réinitialiser le mot de passe"/></p>

				<?php if(isset($msg)) { echo $msg; } ?>

			
		
		</form>


	</body>
</html>	
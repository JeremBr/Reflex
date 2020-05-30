<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include('function/numberUserLive.php');
    include("includes/header.php");
    

    if( isset($_GET['pass']) && !empty($_GET['pass']) ){

    	


	        // on regarde si le token est le bon

	        $reqOublie = $bdd->prepare("SELECT * FROM oublie WHERE token = ?");
	        $reqOublie->execute(array($_GET['pass']));
	        $nmbrToken = $reqOublie->rowCount();

	        if($nmbrToken > 0){

	        	if(isset($_POST['motPasse']) AND !empty($_POST['motPasse']) AND isset($_POST['CmotPasse']) AND !empty($_POST['CmotPasse'])){

		         	$time = time();
		            $invit = $reqOublie->fetch();

		            if(($time - $invit['temps']) < (24*3600)){

						    
						if($mdp1 == $mdp2) {
						    $mdp1 = sha1($_POST['motPasse']);

						    $insertmdp = $bdd->prepare("UPDATE utilisateur SET motDePasse = ? WHERE mail = ?");
						    $insertmdp->execute(array($mdp1, $invit['mail']));
						    header('Location: monCompte.php');
						} else {
						    $msg = trad("Vos deux mots de passe ne correspondent pas !","Your two passwords do not match !");
						}
						


		            } else {
		            	$msg = trad("Le temps pour la réintialisation de mot de passe a expiré","The time for password reset has expired");
		            }
		        }
	            
	        } else {
	         	header("Location: index.php");
	        }


   }else{
      header("Location: index.php");
   }

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title><?= trad("Réinitialisation de votre mot de passe","Reset password") ?></title>
		<link rel="stylesheet" href="css/styleReMp.css" />
	</head>

	<body>

	<div class="titre"><h3><?= trad("Réinitialisation de votre mot de passe","Reset password") ?></h3></div>
	
	
		<form method="post" action="reinitialiserMp.php?pass=<?php echo $_GET['pass']?>">
			

				<p class="champs"><?= trad(" * champs obligatoires","* Required fields") ?></p>
				<p><label for="mp"><?= trad("Mot de passe : ","Password : ") ?><strong>*</strong> </label>  </p> 
				<p><input type="password" placeholder="<?= trad("Votre nouveau mot de passe : ","Your new password : ") ?>" name="motPasse" id="mp" size="50" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+)).*$" required/> </p>
				
				
				<p><label for="Cmp"><?= trad(" Confirmation du mot de passe :","Password confirmation : ") ?><strong>*</strong> </label>  </p>
				<p><input type="password" placeholder="<?= trad("Confirmez votre mot de passe","Confirm your password") ?>" name="CmotPasse" id="Cmp" size="50" required/> </p>

				<p class="envoi"><input class ="boutton"type="submit"  value="<?= trad("Réinitialiser le mot de passe","Reset password") ?>"/></p>

				<?php if(isset($msg)) { echo $msg; } ?>

			
		
		</form>

	<?php include("includes/footer.php"); ?>

	</body>
</html>	
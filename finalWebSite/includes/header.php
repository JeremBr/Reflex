<!DOCTYPE html>
<html>
	
	<link href="css/header.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

<?php
include('./function/traduction.php');
?>

	<body>
		<header>

			<div class="wrapper">
				<img class="logo" src="img/Infinite Measures.png">
				<h1>Infinite Measures</h1>
				<nav>
					<ul>
						

						<?php if(isset($_COOKIE['idUtilisateur']) AND $_COOKIE['idUtilisateur']>0){
							$valid = intval($_COOKIE['idUtilisateur']);
    						$reqmdp = $bdd->prepare("SELECT * FROM utilisateur WHERE motDePasse = ? AND idUtilisateur = ?");
    						$reqmdp->execute(array($_COOKIE['mdp'], $valid));
   							$count = $reqmdp->rowCount();

   							if(isset($_COOKIE['mdp']) and ($count == 1)){

   								?><img class="logoMonCompte" src="img/USER.png">
   								<li><a href="./index.php"><?php echo trad("Accueil","Home")?></a></li>
   								<li><a href="./monCompte.php"><?php echo trad("Mon compte","Account")?></a></li>

   								<?php
   							}
						} else {
							?> 
							<li><a href="./index.php"><?php echo trad("Accueil","Home")?></a></li>
							<li><a href="./connexion.php"><?php echo trad("Connexion","Sign In")?></a></li>
							<!-- <li><a href="./envoyerMail.php">Contact</a></li> -->

							<?php
						}	


						?>
				
						
					</ul>
				</nav>
				<img class="drapeau" src= '<?php echo getFlag() ?>' onclick="afficher();">
			</div>

			
		</header>
	</body>

</html>
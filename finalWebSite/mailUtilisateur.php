<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/access.php';
    include 'function/numberUserLive.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Envoyer un mail</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<link rel="stylesheet" href="css/styleE2.css" />

		<script src="js/script.js"></script>
	</head>

	<body>

		<?php include("includes/header.php"); ?>


		
		
		
		<div class="formulaire">
			<form id="contact-form" method="post" action="" role="form">
					
				<div id="champsMail">
				

					<div class="corps">

						<p class="titre">Ecrivez votre mail </p>
						<br/>

						<p><label for="email">Adresse mail du destinataire : <strong>*</strong> </label></p>
                        <select name="email">
                            <option value="jeremy.breton34@gmail.com" <?php if($_GET['mailto']=='centre') { echo 'selected'; } ?> >Centre</option>
                            <option value="reflex.admin@gmail.com" <?php if($_GET['mailto']=='admin') { echo 'selected'; } ?> >Administrateurs</option>
                            <option value="reflex.gestio@gmail.com" <?php if($_GET['mailto']=='gestio') { echo 'selected'; } ?> >Gestionnaires</option>
                           
                        </select>
                        <br/><br/>
					
						<!-- <p><label for="email">Adresse mail du destinataire : <strong>*</strong> </label></p>
						<p ><input type="email" name="email" id="email" size="50" value="<?php //if(isset($_GET['mailto'])) { echo $_GET['mailto']; } ?>" required/>
						</p><p class="comments"></p> -->

						<p><label for="email">Votre adresse mail : <strong>*</strong> </label></p>
						<p ><input type="emailTo" name="emailTo" id="emailTo" size="50" required/>
						</p><p class="comments"></p>

						<p><label for="name">Votre nom : <strong>*</strong></label></p>
						<p ><input type="text" name="name" id="nameemail" size="50" required/></p>
						<p class="comments"></p>

						<p><label for="firstname">Votre prénom : <strong>*</strong></label></p>
						<p ><input type="text" name="firstname" id="firstname" size="50" required/></p>
						<p class="comments"></p>

						<p><label for="object">Objet du message : <strong>*</strong></label></p>
						<p ><input type="text" name="object" id="object" size="50" required/></p>
						<p class="comments"></p>

						<p><label for="message"> Votre message : <strong>*</strong></label></p>
						<p ><textarea type="msg" name="message" id="message" size="50" rows="10" cols="50" required></textarea> </p>
						<p class="comments"></p>

						<p class="envoi"><input type="submit" value="Envoyer" /></p>

				
					</div>

					<p class="champs">
						* champs obligatoires
					</p>
				
			
				</div>
			</form>
		</div>

				

		<?php include("includes/footer.php"); ?>
	</body>

</html>
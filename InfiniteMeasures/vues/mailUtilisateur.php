<!DOCTYPE html>
<html>
	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8"/>
		<title><?php echo trad("Envoyer un mail","Send an email")?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="css/styleE2.css" />

	</head>

	<body>


		<div class="formulaire">
			<form id="contact-form" method="post" action="" role="form">
					
				<div id="champsMail">
				

					<div class="corps">

						<p class="titre"><?php echo trad("Ecrivez votre mail","Write your email")?></p>
						<br/>

						<p><label for="email"><?php echo trad("Adresse mail du destinataire : ","Recipient email address : ")?><strong>*</strong> </label></p>
                        <select name="email">
                            <option value="jeremy.breton34@gmail.com" <?php if($_GET['mailto']=='centre') { echo 'selected'; } ?> ><?php echo trad("Centre","Center")?></option>
                            <!-- le mail jeremy.breton c'est juste pour vérifier que ça marche bien -->
                            <option value="reflex.admin@gmail.com" <?php if($_GET['mailto']=='admin') { echo 'selected'; } ?> ><?php echo trad("Administrateurs","Administrators")?></option>
                            <option value="reflex.gestio@gmail.com" <?php if($_GET['mailto']=='gestio') { echo 'selected'; } ?> ><?php echo trad("Gestionnaires","Managers")?></option>
                           
                        </select>
                        <br/><br/>
					
						

						<p><label for="email"><?php echo trad("Votre adresse mail : ","Your email address : ")?><strong>*</strong> </label></p>
						<p ><input type="emailTo" name="emailTo" id="emailTo" size="50" required/>
						</p><p class="comments"></p>

						<p><label for="name"><?php echo trad("Votre nom : ","Your last name : ")?><strong>*</strong></label></p>
						<p ><input type="text" name="name" id="nameemail" size="50" required/></p>
						<p class="comments"></p>

						<p><label for="firstname"><?php echo trad("Votre prénom : ","Your first name : ")?><strong>*</strong></label></p>
						<p ><input type="text" name="firstname" id="firstname" size="50" required/></p>
						<p class="comments"></p>

						<p><label for="object"><?php echo trad("Objet du message : ","Email subject : ")?><strong>*</strong></label></p>
						<p ><input type="text" name="object" id="object" size="50" required/></p>
						<p class="comments"></p>

						<p><label for="message"><?php echo trad("Votre message : ","Your message : ")?><strong>*</strong></label></p>
						<p ><textarea type="msg" name="message" id="message" size="50" rows="10" cols="50" required></textarea> </p>
						<p class="comments"></p>

						<p class="envoi"><input type="submit" value="Envoyer" /></p>

				
					</div>

					<p class="champs">
						<?php echo trad("* champs obligatoires","* required fields")?>
					</p>
				
			
				</div>
			</form>
		</div>

				
	</body>

</html>
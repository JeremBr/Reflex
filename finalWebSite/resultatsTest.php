<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/numberUserLive.php';



    if(isset($_POST['idTest']) AND !empty($_POST['idTest'])){
    	

    	$requser = $bdd->prepare("SELECT * FROM test WHERE idTest=? ");
        $requser->execute(array($_POST['idTest']));
        $yo = $requser->fetch();
        
    } else {
    	header("Location: index.php");
    }

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Résultats de votre test</title>
		<link rel="stylesheet" href="css/styleResultatsTests.css" />
		
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h2>Résultats de votre test</h2></div>

		<table>

			<tr>
				<th>Reconnaissance de tonalité (score)</th>
				<th>Rythme cardiaque (en bpm)</th>
				<th>Température de la peau (en degré)
				<th>Réflexe sonore (temps en )</th>
				<th>Réflexe visuel (temps en )</th>
			</tr>

			<tr>
				<td> <?= $yo['RecoTona']; ?><br/></td>
				<td> <?= $yo['freqCard']; ?><br/></td>
				<td> <?= $yo['temperature']; ?><br/></td>
				<td> <?= $yo['refSonore']; ?><br/></td>
				<td> <?= $yo['refVisuel']; ?><br/></td>


			</tr>

		</table>
		
	<img class="graph" src="radar.php?rec=<?= $yo['RecoTona']; ?>&freq=<?= $yo['freqCard']; ?>&temp=<?= $yo['temperature']; ?>&son=<?= $yo['refSonore']; ?>&vis=<?= $yo['refVisuel']; ?>">

	<!-- <div class="commentaire">
		<p><label for="comGestionnaire"> Commentaires du gestionnaire : </label></p>
			<p ><textarea name="comGestionnaire" id="comGestionnaire" size="50" rows="10" cols="50" ></textarea> </p>
	</div> -->


	<!-- <form method="post" action="">
			
			<textarea type="text" name="message" placeholder="MESSAGE"></textarea>
			<div class="commentaire">
				<p><label for="comGestionnaire"> Commentaires du gestionnaire : </label></p>
				<p ><textarea name="message" id="comGestionnaire" size="50" rows="10" cols="50" ></textarea> </p>
			</div>
			<br/>
			<input type="submit" value="Envoyer" />
	</form> -->


	<!-- Faire un bouton qui mettra le commentaire du test
 -->
	<?php include("includes/footer.php"); ?>


	</body>
</html>	
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
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet">

		<title><?php echo trad("Page Administrateur","Administrator page")?></title>
	</head>

	<body>
		<?php include("includes/header.php"); ?>

		Page 1 - Actuellement <?php echo $user_nbr; ?> utilisateur<?php if($user_nbr != 1) { echo "s"; } ?> en ligne<br />


		<?php include("includes/footer.php"); ?>
	</body>
</html>
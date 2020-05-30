<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet">

		<title><?php echo trad("Page Administrateur","Administrator page")?></title>
	</head>

	<body>
		

		Page 1 - Actuellement <?php echo $user_nbr; ?> utilisateur<?php if($user_nbr != 1) { echo "s"; } ?> en ligne<br />


		
	</body>
</html>
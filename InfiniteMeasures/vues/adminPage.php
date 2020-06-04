<!DOCTYPE html>
<html>

	<head>
		<base href="/InfiniteMeasures/">
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet">

		<title><?php echo trad("Page Administrateur","Administrator page")?></title>
	</head>

	<body>
		

		Page 1 - <?php echo trad("Actuellement","Right now")?> <?php echo $user_nbr; ?> <?php echo trad("utilisateur","users")?><?php if($user_nbr != 1) { echo "s"; } ?> <?php echo trad("en ligne","online")?><br />


		
	</body>
</html>
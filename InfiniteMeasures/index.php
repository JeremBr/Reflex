<?php
	

	include("modele/connexion.php");
	
	ini_set('display_errors', 1);


	include("modele/cookie.php");
	include("modele/numberUserLive.php");
	include('modele/traduction.php');
	include('modele/access.php');

	

	if(isset($_GET['cible']) && !empty($_GET['cible'])) {
	    
	    $cible = $_GET['cible'];
	    
	} else {
	    
	    $cible = 'utilisateurs';
	}

	// On appelle le contrôleur
	include('controleurs/' . $cible . '.php');


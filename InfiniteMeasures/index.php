<?php
	
	// PAS ICI QUIL FAUT APPELER, il faut modifier
	session_start();
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
	
	ini_set('display_errors', 1);

	// $url = '';

	// if(isset($_GET['url'])){
	// 	$url = explode('/', $_GET['url']);
		
	// }

	include("modele/cookie.php");
	include("modele/numberUserLive.php");
	include('modele/traduction.php');
	include('modele/access.php');

	// include("vue/header.php");

	// if($url == ''){
		
	// 	require 'vue/accueil.php';
	// } elseif($url[0] == 'connexion'){
		
	// 	require 'vue/connexion.php';
	// } elseif ($url[0] == 'accueil'){
	// 	require 'vue/accueil.php';
	// } elseif ($url[0] == 'compte'){
	// 	require 'vue/monCompte.php';



	// } elseif($url[0] == 'modifierProfil'){
	// 	require 'vue/editionProfil.php';
	// } elseif($url[0] == 'modifierFAQ'){
	// 	require 'vue/faq_modifier.php';
	// } elseif($url[0] == 'inviter'){
	// 	require 'vue/inviteUtilisateur.php';
	// } elseif($url[0] == 'mail'){
	// 	require 'vue/envoyerMail.php';

	// } elseif($url[0] == 'rechercheAdmin'){
	// 	require 'vue/resultatsRechercheAdministrateur.php';


	// } elseif($url[0] == 'FAQ'){
	// 	require 'vue/FAQ.php';
	// } elseif($url[0] == 'CGU'){
	// 	require 'vue/cgu.php';
	// } elseif($url[0] == 'contacter'){
	// 	require 'vue/nous_contacter.php';
	// } elseif($url[0] == 'A-Propos'){
	// 	require 'vue/APropos.php';
	// } 


	// elseif($url[0] == 'deconnexion'){
	// 	require 'model/deconnexion.php';
	// }

	// else {
	// 	require 'vue/erreur404.php';
	// }

	// include("vue/footer.php");




	if(isset($_GET['url']) && !empty($_GET['url'])) {
	    
	    $url = $_GET['url'];
	    
	} else {
	    
	    $url = 'utilisateurs';
	}

	// On appelle le contrôleur
	include('controleurs/' . $url . '.php');


<?php
session_start();
$_SESSION = array();
setcookie('idUtilisateur','', time());
setcookie('mdp','', time());
session_destroy();
header("Location: connexion.php");
?>
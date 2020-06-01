<?php

	$temps_session = (2*60);
	$temps_actuel = date("U");

	$ipUser = $_SERVER['REMOTE_ADDR'];

	$req_ip_exist = $bdd->prepare('SELECT * FROM online WHERE ipUser = ?');
	$req_ip_exist->execute(array($ipUser));
	$ip_existe = $req_ip_exist->rowCount();

	if($ip_existe == 0) {
	   $add_ip = $bdd->prepare('INSERT INTO online(ipUser,time) VALUES(?,?)');
	   $add_ip->execute(array($ipUser,$temps_actuel));
	} else {
	   $update_ip = $bdd->prepare('UPDATE online SET time = ? WHERE ipUser = ?');
	   $update_ip->execute(array($temps_actuel,$ipUser));
	}

	$session_delete_time = $temps_actuel - $temps_session;
	$del_ip = $bdd->prepare('DELETE FROM online WHERE time < ?');
	$del_ip->execute(array($session_delete_time));

	$show_user_nbr = $bdd->query('SELECT * FROM online');
	$user_nbr = $show_user_nbr->rowCount();


?>
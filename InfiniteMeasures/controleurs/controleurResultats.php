<?php

    if(isset($_POST['idTest']) AND !empty($_POST['idTest'])){
    	

    	$requser = $bdd->prepare("SELECT * FROM test WHERE idTest=? ");
        $requser->execute(array($_POST['idTest']));
        $results = $requser->fetch();

        $_SESSION['idTest'] = $_POST['idTest'];
        
    } else if(isset($_POST['comGestionnaire']) AND !empty($_POST['comGestionnaire']) AND isset($_SESSION['idTest'])) {

    	$comment = $bdd->prepare("UPDATE test SET comment = ? WHERE idTest = ?");
    	$comment->execute(array($_POST['comGestionnaire'], $_SESSION['idTest']));

    	$requser = $bdd->prepare("SELECT * FROM test WHERE idTest=? ");
        $requser->execute(array($_SESSION['idTest']));
        $results = $requser->fetch();

    } else {
    	header("Location: accueil");
    }

?>
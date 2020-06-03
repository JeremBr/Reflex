<?php

// on inclut le fichier modèle contenant les appels à la BDD
// include('./modele/requetes.utilisateurs.php');


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['url']) || empty($_GET['url'])) {
    $function = "accueil";
} else {
    $function = $_GET['url'];
}

switch ($function) {
    

    case 'accueil':
        $vue = "accueil";
        break;


    case 'reconnaissanceTonalite':
    	if(isset($access) && ( ($access == 1) OR ($access == 2) ) ){
            include('controleurReco.php');
            $vue = "reconnaissanceTonalite"; 
        } else {
            header("Location: accueil");
        }
    	break;

    case 'freqCard':
    	if(isset($access) && ( ($access == 1) OR ($access == 2) ) ){
            include('controleurFreq.php');
            $vue = "freqCard"; 
        } else {
            header("Location: accueil");
        }
    	break;

    case 'temp':
    	if(isset($access) && ( ($access == 1) OR ($access == 2) ) ){
            include('controleurTemp.php');
            $vue = "temp"; 
        } else {
            header("Location: accueil");
        }
    	break;

    case 'sonore':
    	if(isset($access) && ( ($access == 1) OR ($access == 2) ) ){
            include('controleurSonore.php');
            $vue = "sonore"; 
        } else {
            header("Location: accueil");
        }
    	break;

    case 'visuel':
    	if(isset($access) && ( ($access == 1) OR ($access == 2) ) ){
            include('controleurVis.php');
            $vue = "visuel"; 
        } else {
            header("Location: accueil");
        }
    	break;



    case 'resultats': //voir si ya pas un soucis daccess
        include('controleurResultats.php');
    	$vue = "resultatsTest";
    	break;


    case 'listeResultats': //voir si ya pas un soucis daccess
        include('controleurListResults.php');
        $vue = "listeResultats";
        break;


   
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
}


include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');

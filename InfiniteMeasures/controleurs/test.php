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
    	$vue = "reconnaissanceTonalite";
    	break;

    case 'freqCard':
    	$vue = "freqCard";
    	break;

    case 'temp':
    	$vue = "temp";
    	break;

    case 'sonore':
    	$vue = "sonore";
    	break;

    case 'visuel':
    	$vue = "visuel";
    	break;






    case 'resultats':
    	$vue = "resultatsTest";
    	break;


    case 'listeResultats':
        $vue = "listeResultats";
        break;


   
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
}


include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');

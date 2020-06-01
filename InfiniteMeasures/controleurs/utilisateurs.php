<?php



// on inclut le fichier modèle contenant les appels à la BDD
// include('./modele/requetes.utilisateurs.php');


// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "accueil";
} else {
    $function = $_GET['fonction'];
}

switch ($function) {
    
    case 'accueil':
        $vue = "accueil";
        break;

    case 'connexion':
        $vue = "connexion";
        include ('controleurConnexion.php');
        break;

    case 'compte':
        $vue = "monCompte";
        include ('controleurCompte.php');
        break;




    case 'modifierProfil':
        $vue = "editionProfil";
        include ('controleurEditProfil.php');
        break;

    case 'modifierFAQ':
        $vue = "faq_modifier";
        break;

    case 'inviter':
        $vue = "inviteUtilisateur";
        break;

    case 'mail':
        $vue = "envoyerMail";
        break;



    case 'rechercheAdmin':
        $vue = "resultatsRechercheAdministrateur";
        break;



    case 'FAQ':
        $vue = "FAQ";
        break;

    case 'CGU':
        $vue = "cgu";
        break;

    case 'contacter':
        $vue = "nous_contacter";
        break;

    case 'A-Propos':
        $vue = "APropos";
        break;


    case 'deconnexion':
        $vue = "deconnexion";
        break;

        
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
}


include ('vues/header.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');

//si on a toujours un probleme au niveau du css sur certaines pages comme "nous_contacter"
// alors on met les include header/footer dans chaque page ...
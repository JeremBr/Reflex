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

    case 'connexion':
        $vue = "connexion";
        include ('controleurConnexion.php');
        break;

    case 'compte':
        $vue = "monCompte";
        include ('controleurCompte.php');
        break;


    case 'inscription':
        $vue = "inscription";
        include ('controleurInscription.php');
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
        include ('controleurInvite.php');
        break;


    case 'motDePasseOublié':
        $vue = "motPasseOublie";
        include('controleurMdpOublie.php');
        break;

    case 'reintialiserMotDePasse':
        $vue = "reintiliaserMp";
        include('controleurReintialiser.php');
        break;








    case 'mail':
        if(isset($_GET['userMail']) AND !empty($_GET['userMail'])){
            $userMail = $_GET['userMail'];
        }
        $vue = "envoyerMail";
        break;

    case 'mailContacter':
        $vue = "mailUtilisateur";
        break;







    case 'administration':
        $vue = "adminPage";
        break;

    case 'rechercheAdmin':
        $vue = "resultatsRechercheAdministrateur";
        break;

    case 'rechercheGestionnaire':
        $vue = "resultatsRechercheGestionnaire";
        include ('./modele/rechercheUtilis.php');
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

    case 'APropos':
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
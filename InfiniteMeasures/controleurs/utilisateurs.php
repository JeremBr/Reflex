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



// si il y a des problemes sur certaines pages ayant un access, voir si il faut pas mettre le break apres le $vue, plutot qu'à la fin
        // mais jpense pas



    case 'modifierProfil':
        $vue = "editionProfil";
        include ('controleurEditProfil.php');
        break;

    case 'modifierFAQ':
        if(isset($access)){
            if(($access == 1) OR ($access == 2)){ //JCROIS QUE CEST JUSTE 2
                $vue = "faq_modifier";
                include ('controleurFAQ.php');
            } else {
                header("Location: compte");
            }
        } else {
            header("Location: connexion");
        }

        break;

    case 'modifierCGU':
        if(isset($access)){
            if(($access == 1) OR ($access == 2)){ //JCROIS QUE CEST JUSTE 2
                $vue = "cgu_modifier";
                include ('controleurCGU.php');
            } else {
                header("Location: compte");
            }
        } else {
            header("Location: connexion");
        }

        break;

    case 'inviter':
        if((isset($access)) && ( ($access == 1) || ($access == 2) ) ){
            $vue = "inviteUtilisateur";
            include ('controleurInvite.php');
        } else {
            header("Location: compte");
        }
        break;

    case 'motDePasseOublie':
        $vue = "motPasseOublie";
        include('controleurMdpOublie.php');
        break;

    case 'reinitialiserMotDePasse':
        $vue = "reinitialiserMp";
        include('controleurReintialiser.php');
        break;








    case 'mail':
        if(isset($access)){
            if(($access == 1) OR ($access == 2)){
                if(isset($_GET['userMail']) AND !empty($_GET['userMail'])){
                    $userMail = $_GET['userMail'];
                }
                $vue = "envoyerMail";
            } else {
                header("Location: compte");
            }
        } else {
            header("Location: connexion");
        }

        break;

    case 'mailContacter':
        $vue = "mailUtilisateur";
        break;







    case 'administration':
        if(isset($access)){
            if($access == 2){
                $vue = "adminPage";
            } else {
                header("Location: compte");
            }
        } else {
            header("Location: accueil");
        }

        break;

    case 'rechercheAdmin':
        if(isset($access)){
            if($access == 2){
                include './modele/admin.php';
                $vue = "resultatsRechercheAdministrateur";
            } else{
                header("Location: compte");
            }
        } else {
            header("Location: connexion");
        }
        break;

    case 'rechercheGestionnaire':
        if(isset($access)){
            if(($access == 1) OR ($access == 2)){
                $vue = "resultatsRechercheGestionnaire";
                include ('./modele/rechercheUtilis.php');
            } else{
                header("Location: compte");
            }
        } else {
            header("Location: connexion");
        }
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
<?php

function recupereEmail($id){
    $query = 'SELECT mail FROM utilisateurs WHERE idUtilisateur=?';
    $reqMail = $bdd->prepare($query);
    $reqMail->execute($id);
    return $reqMail;
}

?>
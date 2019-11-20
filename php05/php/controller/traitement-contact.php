<?php

// POUR SECURITE
// JE NE VAIS RECUPERER QUE LES INFOS ATTENDUES POUR LE FORMULAIRE DE CONTACT
// nom
// email
// message


$nom        = filtrerInput("nom");
$email      = filtrerInput("email");
$message    = filtrerInput("message");

// VALIDER L'EMAIL
// https://www.php.net/manual/fr/function.filter-var.php
if (($nom != "")
    && verifierEmail($email)
    && ($message != "")
) {
    $contenuMessage =
        <<<TEXTEAMOI
===
nom: $nom
email: $email
message: $message

TEXTEAMOI;

    // ON STOCKE LE MESSAGE DANS UN FICHIER php/model/contact.txt
    file_put_contents("php/model/contact.txt", $contenuMessage, FILE_APPEND);
    // J'ENVOIE 
    @mail("webmaster@monsite.fr", "vous avez un nouveau message", $contenuMessage);

    $tabAsso["reponseServeur"]      = "merci pour votre message $nom ($email)";
} else {
    // REPONDRE AVEC UN MESSAGE D'ERREUR
    $tabAsso["reponseServeur"]      = "arrete de hacker mon site";
}

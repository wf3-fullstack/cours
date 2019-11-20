<?php

// TRAITEMENT DU FORMULAIRE DE NEWSLETTER
// TRAITEMENT DU FORMULAIRE DE CONTACT
$nom        = filtrerInput("nom");
$email      = filtrerInput("email");

// VALIDER L'EMAIL
// https://www.php.net/manual/fr/function.filter-var.php
if (($nom != "")
    && verifierEmail($email)
) {
    // CSV Comma Separated Value
    $contenuMessage =
        <<<TEXTEAMOI
$nom,$email

TEXTEAMOI;

    // ON STOCKE LE MESSAGE DANS UN FICHIER php/model/contact.txt
    file_put_contents("php/model/newsletter.csv", $contenuMessage, FILE_APPEND);
    // J'ENVOIE 
    @mail("webmaster@monsite.fr", "vous avez un nouveau inscrit", $contenuMessage);

    $tabAsso["reponseServeur"]      = "merci pour votre inscription $nom ($email)";
} else {
    // REPONDRE AVEC UN MESSAGE D'ERREUR
    $tabAsso["reponseServeur"]      = "arrete de hacker mon site";
}

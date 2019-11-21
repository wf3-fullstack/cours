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
    // file_put_contents("php/model/contact.txt", $contenuMessage, FILE_APPEND);

    // JE COMPLETE LES INFOS MANQUANTES
    $dateMessage = date("Y-m-d H:i:s");     // FORMAT DATETIME SQL
    $ip          = $_SERVER["REMOTE_ADDR"]; // LIRE LA DOC SUR $_SERVER

    // A LA PLACE JE VEUX AJOUTER UNE LIGNE DANS LA TABLE SQL contact
    // CREER LA REQUETE PREPAREE
    // LES VALEURS SONT FOURNIES DANS UN TABLEAU ASSOCIATIF A PART
    // note : les clés sont les tokens (sans les :)
    $tabAssoColonneValeur = [
        "nom"           => $nom,
        "email"         => $email,
        "message"       => $message,
        "dateMessage"   => $dateMessage,
        "ip"            => $ip
    ];

    $requetePrepareeSQL = 
<<<CODESQL

INSERT INTO contact
( nom, email, message, dateMessage, ip )
VALUES
( :nom, :email, :message, :dateMessage, :ip)

CODESQL;


    // ENVOYER LA REQUETE SQL AVEC CES 2 PARAMETRES
    envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);

    // J'ENVOIE UN EMAIL
    // (PB DE PERFORMANCE SI PAS DE SERVEUR EMAIL => 1 seconde d'attente... avant timeout)
    @mail("webmaster@monsite.fr", "vous avez un nouveau message", $contenuMessage);

    $tabAsso["reponseServeur"]      = "merci pour votre message $nom ($email)";
} else {
    // REPONDRE AVEC UN MESSAGE D'ERREUR
    $tabAsso["reponseServeur"]      = "arrete de hacker mon site";
}

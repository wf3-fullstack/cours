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
    // file_put_contents("php/model/newsletter.csv", $contenuMessage, FILE_APPEND);
    // AU LIEU DE STOCKER DANS UN FICHIER, JE VAIS AJOUTER UNE LIGNE DANS LA TABLE SQL newsletter
    // EN PHP
    // JE DOIS CREER LE CODE SQL POUR INSERER UNE LIGNE
    // https://www.php.net/manual/fr/function.date.php
    // note: on pourra paramétrer PHP sur un fuseau horaire
    $dateInscription = date("Y-m-d H:i:s"); // DATETIME SQL 2019-11-21 12:27:00
    /*
    $codeSQL =
<<<CODESQL

INSERT INTO newsletter 
( nom, email, dateInscription ) 
VALUES 
( '$nom', '$email', '$dateInscription');

CODESQL;
*/

    // SQL FERA LE REMPLACEMENT DU TOKEN (JETON) PAR LA VALEUR
    // ET VA BLOQUER LA MODIFICATION DE LA REQUETE
    $tabAssoColonneValeur = [
        "nom"               => $nom,
        "email"             => $email,
        "dateInscription"   => $dateInscription,
    ];

    $requetePrepareeSQL =
<<<CODESQL

INSERT INTO newsletter 
( nom, email, dateInscription ) 
VALUES 
( :nom, :email, :dateInscription );

CODESQL;
    // APPELER LA FONCTION
    envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);


    // J'ENVOIE 
    @mail("webmaster@monsite.fr", "vous avez un nouveau inscrit", $contenuMessage);

    $tabAsso["reponseServeur"]      = "merci pour votre inscription $nom ($email)";
} else {
    // REPONDRE AVEC UN MESSAGE D'ERREUR
    $tabAsso["reponseServeur"]      = "arrete de hacker mon site";
}

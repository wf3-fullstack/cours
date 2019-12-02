<?php

// CONTROLLER
// VERSION EN PARRALLELE

// RECUPERER LES INFOS DU FORMULAIRE (FILTRER POUR SE PROTEGER)
// => CHARGER LE CODE DE MES FONCTIONS
// => UTILISER LA FONCTION filtrerInput
// nom
// email
// message
// SECURITE
// VERIFIER QUE LE nom N'EST PAS VIDE (ET MEME AU MAX 160 CARACTERES)
// VERIFIER QUE L'email EST VALIDE ET PAS VIDE
// VERIFIER QUE LE message N'EST PAS VIDE
// https://www.php.net/manual/fr/function.mb-strlen.php
// https://www.php.net/manual/fr/migration70.new-features.php
// DES FOIS ON PEUT COMPACTER AVEC SPACESHIP <=>

// DETECTION ERREURS
// DANS LE FONCTIONS filtrer... ON VA UTILISER LA VARIABLE GLOBALE $tabErreur
$email      = filtrerEmail("email");
$nom        = filtrerTexte("nom");
$message    = filtrerTexte("message", 1, 10000);

// https://www.php.net/manual/fr/function.count.php
if (count($tabErreur) == 0) {
    // OK JE PEUX CONTINUER
    // SI TOUT EST OK
    // ALORS JE PEUX COMPLETER LES INFOS MANQUANTES
    // dateMessage
    // ip
    $datePublication = date("Y-m-d H:i:s"); // FORMAT DATETIME SQL

    // UTILE POUR DEBUGGUER
    // https://www.php.net/manual/fr/function.var-dump.php
    // var_dump($ip);

    // JE PEUX INSERER UNE LIGNE DANS LA TABLE SQL contact
    $tabAssoColonneValeur = [
        "email"             => $email,
        "nom"               => $nom,
        "message"           => $message,
        "datePublication"   => $datePublication,    // COOL PHP PERMET DE LAISSER LA VIRGULE
    ];
    $nomTable = "contact";

    // JE VAIS APPELER MA FONCTION insererLigneSQL
    insererLigneSQL($nomTable, $tabAssoColonneValeur);
} else {
    // JE PEUX RENVOYER TOUTES LES ERREURS DANS LE TABLEAU $tabErreur
    // debug
    // https://www.php.net/manual/fr/function.var-dump.php
    var_dump($tabErreur);
}

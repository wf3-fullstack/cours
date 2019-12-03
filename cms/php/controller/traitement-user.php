<?php

$email      = filtrerEmail("email", "user");            // UNIQUE DANS user
$login      = filtrerTexte("login", 3, 160, "user");    // UNIQUE DANS user
$password   = filtrerTexte("password");

if (count($tabErreur) == 0) {

    $dateInscription = date("Y-m-d H:i:s"); // FORMAT DATETIME SQL
    $level           = 10;      // PAS REALISTE: COMPTE ACTIVE TOUT DE SUITE

    // PHP NOUS AIDE A HASHER LE MOT DE PASSE
    // https://www.php.net/manual/fr/function.password-hash.php
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $tabAssoColonneValeur = [
        "login"             => $login,
        "email"             => $email,
        "password"          => $passwordHash,       // ATTENTION: ON MEMORISE LE MOT DE PASSE HASHE
        "dateInscription"   => $dateInscription,    // COOL PHP PERMET DE LAISSER LA VIRGULE
        "level"             => $level,
    ];
    $nomTable = "user";

    // JE VAIS APPELER MA FONCTION insererLigneSQL
    insererLigneSQL($nomTable, $tabAssoColonneValeur);

    // SANS AJAX JE RAJOUTE UNE REDIRECTION
    header("Location: inscription.php");
} else {
    // JE PEUX RENVOYER TOUTES LES ERREURS DANS LE TABLEAU $tabErreur
    // debug
    // https://www.php.net/manual/fr/function.var-dump.php
    var_dump($tabErreur);
}

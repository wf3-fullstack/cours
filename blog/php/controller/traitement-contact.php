<?php

// CONTROLLER

// RECUPERER LES INFOS DU FORMULAIRE (FILTRER POUR SE PROTEGER)
// => CHARGER LE CODE DE MES FONCTIONS
// => UTILISER LA FONCTION filtrerInput
// nom
// email
// message
$nom        = filtrerInput("nom");
$email      = filtrerInput("email");
$message    = filtrerInput("message");

// SECURITE
// VERIFIER QUE LE nom N'EST PAS VIDE (ET MEME AU MAX 160 CARACTERES)
// VERIFIER QUE L'email EST VALIDE ET PAS VIDE
// VERIFIER QUE LE message N'EST PAS VIDE
// https://www.php.net/manual/fr/function.mb-strlen.php
$longueurNom        = mb_strlen($nom);
$longueurEmail      = mb_strlen($email);
$longueurMessage    = mb_strlen($message);
// https://www.php.net/manual/fr/migration70.new-features.php
// DES FOIS ON PEUT COMPACTER AVEC SPACESHIP <=>

// VERSION EN PARRALLELE
$tabErreur = [];
// DETECTION ERREURS
if ($longueurNom < 1) {
    $tabErreur[] = "le nom ne doit pas être vide";
}

if ($longueurNom >= 160) 
{
    $tabErreur[] = "le nom ne doit pas dépasser 160 caractères";
}

// ! => NEGATION
if (! verifierEmail($email))
{
    $tabErreur[] = "l'email est incorrect'";
}

if ($longueurMessage < 1) 
{
    $tabErreur[] = "le message ne doit pas être vide";
}

if ($longueurMessage > 10000) 
{
    $tabErreur[] = "le message ne doit pas dépasser 10000 caractères";
}

if (count($tabErreur) == 0)
{
    // OK JE PEUX CONTINUER
    // SI TOUT EST OK
    // ALORS JE PEUX COMPLETER LES INFOS MANQUANTES
    // dateMessage
    // ip
    $dateMessage = date("Y-m-d H:i:s"); // FORMAT DATETIME SQL
    $ip          = $_SERVER["REMOTE_ADDR"];

    // UTILE POUR DEBUGGUER
    // https://www.php.net/manual/fr/function.var-dump.php
    // var_dump($ip);

    // JE PEUX INSERER UNE LIGNE DANS LA TABLE SQL contact
    $tabAssoColonneValeur = [
        "nom"           => $nom,
        "email"         => $email,
        "message"       => $message,
        "dateMessage"   => $dateMessage,
        "ip"            => $ip
    ];
    $nomTable = "contact";

    // JE VAIS APPELER MA FONCTION insererLigneSQL
    insererLigneSQL($nomTable, $tabAssoColonneValeur);

}
else
{
    // JE PEUX RENVOYER TOUTES LES ERREURS DANS LE TABLEAU $tabErreur
}






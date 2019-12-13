<?php

// ERREUR LA SESSION N'EXISTE PAS AU DEPART
// var_dump($_SESSION);

if (!isset($_SESSION)) 
{
    // ON VA DONNER LE DOSSIER DE STOCKAGE DES INFOS DE SESSION
    // https://www.php.net/manual/fr/function.session-save-path.php
    session_save_path("session");
    
    // PHP VA VERIFIER SI IL Y A DEJA UN COOKIE PHPSESSID
    // SI CE COOKIE N'EST PAS PRESENT 
    // ALORS IL CREE UN IDENTIFIANT UNIQUE POUR CE COOKIE
    session_start();
}

// Notice: session_start(): A session had already been started
// session_start();

var_dump($_SESSION);

// 7utvsjqrsnsp0pk1idq08tp8hh	

// ON PEUT STCOKER DES INFOS DE SESSION
$_SESSION["secret"] = "le pere noel n'existe pas";

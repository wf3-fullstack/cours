<?php

// AFFICHER LES ERREURS PHP
// https://www.php.net/manual/fr/function.error-reporting.php
// https://www.php.net/manual/fr/function.ini-set.php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// MAUVAISE NOUVELLE
// PHP FAIT LE CONTRAIRE
// EXPLICATION: PHP EST UN LANGAGE PREVU POUR DE GROS PROGRAMMES
// ET AVEC PLEIN DE DEVELOPPEURS
// DANS CE CONTEXTE, C'EST PLUS PRATIQUE DE RESTREINDRE LA PORTEE DES VARIABLES

$texte = "coucou";

function afficherMessage ()
{
    echo $texte;    // ERREUR
    // Notice: Undefined variable: texte in C:\xampp\htdocs\wf3-fullstack\exos\variables-locale.php on line 19
}

afficherMessage();

echo "<h1>PASSAGE DE VARIABLES EN PARAMETRE</h1>";

$texte = "coucou";  // VARIABLE GLOBALE

function afficherMessage2 ($param)
{   
    //-----------------------------------------------------------------------
    // VARIABLE LOCALE
    // => LA VARIABLE EST CREEE ET DETRUITE A CHAQUE APPEL DE LA FONCTION
    $nombre = 0;

    // $param EST UN PARAMETRE QUI N'EXISTE QU'A L'INTERIEUR DE LA FONCTION
    // $param EST UNE VARIABLE LOCALE DE LA FONCTION
    echo $param;    // ERREUR
    // Notice: Undefined variable: texte in C:\xampp\htdocs\wf3-fullstack\exos\variables-locale.php on line 19
    
    // return PERMET DE TRANSMETTRE UNE VALEUR EN DEHORS DE LA FONCTION
    return $param;
    //-----------------------------------------------------------------------

}

afficherMessage2($texte);

echo $param;
// Notice: Undefined variable: param in C:\xampp\htdocs\wf3-fullstack\exos\variables-locale.php on line 38


$resultat = afficherMessage2($texte);

echo $resultat;
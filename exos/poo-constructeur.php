<?php

class View
{
    // METHODES "MAGIQUES"
    // CONSTRUCTEUR (NOM OBLIGATOIRE __construct)
    // $objetView = new View;
    function __construct()
    {
        echo "<h2>__construct</h2>";
    }

    // DESTRUCTEUR (NOM OBLIGATOIRE __destruct)
    // DECLENCHE QUAND ON DETRUIT LA VARIABLE
    function __destruct()
    {
        echo "<h2>__destruct</h2>";
    }

    // CA MARCHE PAS DE CREER PLUSIEURS METHODES AVEC LE MEME NOM


    // METHODES "CLASSIQUES"
    function afficherPage()
    {
        echo "<h1>TITRE1</h1>";
    }
}

// POUR ACTIVER LE CODE DE LA METHODE
// JE DOIS CREER UN OBJET
// ET ENSUITE AVEC L'OBJET J'APPELLE LA METHODE
echo "<h1>UN</h1>";
$objetView = new View;  // new DECLENCHE L'APPEL AU CONSTRUCTEUR __construct
// ON PEUT UTILISER LA METHODE CONSTRUCTEUR 
// POUR PREPARER DES CHOSES AVANT D'APPELER LES AUTRES METHODES
// $objetView->__construct();

echo "<h1>DEUX</h1>";
// C'EST LE DEVELOPPEUR QUI ECRIT LA LIGNE DE CODE POUR ACTIVER LA METHODE
$objetView->afficherPage();
echo "<h1>TROIS</h1>";
// https://www.php.net/manual/fr/function.unset.php
// unset($objetView);
echo "<h1>QUATRE</h1>";

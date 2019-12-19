<?php

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*

(avant)
(mon contenu)
(apres)

*/

// COMPLETER

// NE PAS MODIFIER LE CODE SUIVANT
// A LA SYMFONY...
// https://symfony.com/doc/current/page_creation.html

class Response
{
    // PROPRIETES
    protected $contenu;

    // METHODES
    function __construct($contenu)
    {
        $this->contenu = $contenu;
    }

    function afficherHTML()
    {
        echo "(avant)";
        echo $this->contenu;
        echo "(apres)";
    }
}


$objetController    = new Controller;
$objetResponse      = $objetController->gererPage();
$objetResponse->afficherHTML();

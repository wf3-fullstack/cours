<?php

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*

(avant)
MON CONTENU
(apres)

*/

// AJOUTER VOTRE CODE ICI

// NE PAS MODIFIER LE CODE SUIVANT

interface MonContrat
{
    function faireA();
    function faireB();
    function faireC();
}

trait Bout2
{
    protected $contenu;
}

class FaitTout
implements MonContrat
{
    use Bout1, Bout2, Bout3;

    function __construct($contenu)
    {
        $this->contenu = $this->filtrer($contenu);
    }
}

$objet = new FaitTout("mon contenu");
$objet->faireA();

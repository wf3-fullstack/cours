<?php

class Enseignant
{
    // METHODE
    function faireCours ()
    {
        echo "(faireCours)";
    }
}

class ProfSki
    extends Enseignant
{
    // LA METHODE ENFANT SPECIALISE LA METHODE PARENTE
    function faireCours ()
    {
        // ECHAUFFEMENT
        echo "(echauffez-vous d'abord)";

        parent::faireCours();

        // RANGER LES SKIS
        echo "(e)tirez-vous...";
    }
}


$profCode = new Enseignant;
$profCode->faireCours();

$profSki = new ProfSki;
$profSki->faireCours();


$tabCours = [
    "math"  => new Enseignant,
    "ski"   => new ProfSki,
];

foreach($tabCours as $prof)
{
    $prof->faireCours();
}

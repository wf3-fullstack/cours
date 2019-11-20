<?php

/*
echo
<<<TEXTEJSON
{
    "propriete1" : "valeur1"
}
TEXTEJSON;
*/

// AVEC PHP
// ON A LA POSSIBILITE DE CONVERTIR UN TABLEAU ASSOCIATIF EN TEXTE JSON
$tabAsso = [];

// JE PEUX AJOUTER LES INFOS A TRANSMETTRE AU NAVIGATEUR
$tabAsso["propriete1"] = "valeur1";
$tabAsso["propriete2"] = "valeur2";

// JE RAJOUTE LE CODE DE TRAITEMENT DES FORMULAIRES
// contact
// newsletter
// ...
// $nom = $_REQUEST["nom"];

// PHP CREE LE BON CODE JS A PARTIR DU TABLEAU ASSOCIATIF
echo json_encode($tabAsso);
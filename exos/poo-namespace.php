<?php

require_once "poo-namespace-declaration.php";
require_once "php/class/MaClasse.php";
require_once "php/class/MaClasse2.php";


// POUR NE PAS REPETER LE CHEMIN DU NAMESPACE A CHAQUE new
// JE PEUX DECLARER UN use
use MonNameSpace\MaClasse;
// ON PEUT CREER DES ALIAS DE NOM DE CLASSE POUR CHANGER LE NOM DES CLASSES DANS NOTRE CODE
// ATTENTION: SI MAL UTILISE, LE CODE EN DEVIENT INCOMPREHENSIBLE...
use MonNameSpace2\MaClasse as Toto;

// COMMENT JE CREE DES OBJETS AVEC LES NAMESPACES ???
// ON DOIT PRECISER LE NAMESPACE DE LA CLASSE QU'ON VEUT UTILISER
$objet  = new MaClasse;
$objet3 = new MaClasse;
$objet4 = new MaClasse;

$objet2 = new Toto;



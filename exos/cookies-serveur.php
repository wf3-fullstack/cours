<?php

// POUR LES FORMULAIRES
// $_REQUEST
// $_GET
// $_POST
// $_FILES

// COMME LES COOKIES SONT DES PAIRES CLE/VALEURS
// PHP VA NOUS LES FOURNIR DANS UN TABLEAU ASSOCIATIF

var_dump($_COOKIE);

$produit1 = $_COOKIE["produit1"] ?? "";

echo "<h1>$produit1</h1>";


setcookie("derniere-visite", date("Y-m-d H:i:s"));
// EST-CE QU'IL A DEJA UN IDENTIFIANT 
// SI OUI JE LE LAISSE
// SINON JE LUI EN CREE UN
$identifiantVisiteur = $_COOKIE["identifiantVisiteur"] ?? "";
if ($identifiantVisiteur == "")
{
    setcookie("identifiantVisiteur", uniqid("visiteur-"));
}


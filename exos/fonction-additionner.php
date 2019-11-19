<?php


// CREER UNE FONCTION QUI PRODUIT LA SOMME DE 2 NOMBRES EN PARAMETRES
function additionner($nombre1, $nombre2)
{
    return $nombre1 + $nombre2;
}

// APPELER LA FONCTION
$somme1 = additionner(10, 12);  // $somme1 = 22

echo "<h2>$somme1</h2>";

$somme2 = additionner(1100, 14.3);  // $somme1 = 22

echo "<h2>$somme2</h2>";

<?php

/*
    * exo2: CREER UNE FONCTION QUI RENVOIE LE PLUS PETIT 
        ENTRE 3 NOMBRES RECUS EN PARAMETRES

        NOTE: VOUS POUVEZ AVOIR BESOIN DES OPERATEURS LOGIQUES: 
            ET:      &&      AND 
            OU:      ||      OR
        
        https://www.php.net/manual/fr/language.operators.logical.php
*/

// ETAPE1: DEFINIR LA FONCTION
// LA MEILLEURE FACON: UTILISER LA FONCTION min DE PHP
// https://www.php.net/manual/fr/function.min.php
function choisirMin3 ($nombre1, $nombre2, $nombre3)
{
    // IL FAUT AJOUTER NOTRE CODE
    $min = $nombre1;
    if (($nombre2 < $nombre1) && ($nombre2 < $nombre3))
    {
        $min = $nombre2;
    }

    if ($nombre3 < $min)
    {
        $min = $nombre3;
    }

    return $min;
}


// ETAPE2: APPELER LA FONCTION
echo "<h2>test1</h2>";
echo choisirMin3(25, 9, 42);

echo "<h2>test2</h2>";
echo choisirMin3(5, 29, 42);

echo "<h2>test3</h2>";
echo choisirMin3(5, 29, -2);

<?php

/*
    * exo7: CREER UNE FONCTION QUI COMPTE LE NOMBRE DE NOMBRES PAIRS 
        DANS UN TABLEAU RECU EN PARAMETRE

*/

function compterPair ($tableauNombre)
{
    $nombrePair = 0;

    // IL FAUT COMPTER LES NOMBRES PAIRS DANS LE TABLEAU
    // IL FAUT PARCOURIR LE TABLEAU
    foreach($tableauNombre as $nombre)
    {
        if (($nombre % 2) == 0)   // pair alors reste est 0
        {
            // PAIR
            $nombrePair++;
        }
    }
    return $nombrePair;
}

echo compterPair([ 7, 5, 12, 338, 10, 15 ]);        // 3
<?php

function trouverMinTableau($tableauNombre)
{
    // COMMENT ON TROUVE $min ?
    // J'INITIALISE AVEC LE PREMIER ELEMENT
    $min = $tableauNombre[0];

    foreach ($tableauNombre as $indice => $nombre) {
        if ($nombre < $min) {
            // ON A TROUVE UN NOUVEAU MINIMUM
            // ON MET A JOUR LA VALEUR DE $min
            $min = $nombre;
        }
    }

    // RENVOYER LE RESULTAT
    return $min;
}


// APPELER LA FONCTION 
$resultat = trouverMinTableau([7, 13, 9, 806]);

echo "<h2>LE PLUS PETIT EST $resultat</h2>";
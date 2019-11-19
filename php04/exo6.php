<?php

/*
    * exo6: CREER UNE FONCTION QUI RENVOIE LA SOMME DES NOMBRES 
        DANS UN TABLEAU EN PARAMETRE
*/

function additionner ($tableauNombre)
{
    // COMMENT JE CODE CE QUE MON CERVEAU FAIT TOUT SEUL ?
    $somme = 0;

    foreach($tableauNombre as $nombre)
    {
        $somme += $nombre;
        // $somme = $somme + $nombre;
    }
    return $somme;
}

echo additionner([ 7, 5, 12, 38 ]);  // 62
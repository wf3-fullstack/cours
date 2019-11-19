<?php


/*
    * exo3: CREER UNE FONCTION QUI RENVOIE LE PLUS PETIT NOMBRE 
                DANS UN TABLEAU (FOURNI EN PARAMETRE)

*/


function trouverMinTableau ($tableauNombre)
{
    // on prend le premier element du tableau comme le plus petit
    $smin = $tableauNombre[0];

    foreach($tableauNombre as $nombre)
    {
        if ($nombre < $smin)
        {
            $smin = $nombre;    // on a trouvé un nouveau plus petit
        }
    }
    return $smin;
}


echo "<h2>test1</h2>";
echo trouverMinTableau([ 987, 133, 90, 55 ]);

echo "<h2>test2</h2>";
// https://www.php.net/manual/fr/function.min.php
echo min([ 987, 133, 90, 55 ]);

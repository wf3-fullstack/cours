<?php


function trouverMin($nombre1, $nombre2)
{
    if ($nombre1 > $nombre2) {
        return $nombre2;
        // ICI ON S'ARRETE
    }
    return $nombre1;
}


echo trouverMin(20, 50);


?>
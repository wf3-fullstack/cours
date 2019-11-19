<?php

/*
    * exo5: CREER UNE FONCTION QUI RENVOIE LA SURFACE DES 4 MURS 
        SI ON DONNE EN PARAMETRES: HAUTEUR, LARGEUR ET LONGUEUR

 */

 function calculerSurfaceMurs ($largeur, $longueur, $hauteur)
 {
    // $surface = ($largeur * $hauteur + $longueur * $hauteur) * 2;
    $surface = 2 * $hauteur * ($largeur + $longueur);

    return $surface; 
 }

// IMPORTANT: BIEN RESPECTER L'ORDRE DES PARAMETRES
 echo calculerSurfaceMurs(3, 4.5, 2.5);

// PHP EST COOL, 
// SI ON NE FERME PAS LA BALISE A LA FIN DU FICHIER C'EST MIEUX
?>
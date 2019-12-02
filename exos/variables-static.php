<?php



function afficherMessage()
{
    // VARIABLE LOCALE
    $compteur = 0;
    // VARIABLE STATIC LOCALE
    static $compteur2 = 0;      
    // AJOUTER static DIT A PHP D'EXECUTER CE CODE SEULEMENT AU PREMIER APPEL
    // ET EN PLUS LA VARIABLE N'EST PAS DETRUITE A LA FIN DE l'APPEL

    echo "<h1>compteur: $compteur</h1>";
    echo "<h1>compteur2: $compteur2</h1>";

    $compteur++;
    $compteur2++;

    return $compteur2;
}


echo $compteur2;
// UNE VARIABLE LOCALE STATIC NE PEUT PAS ETRE UTILISEE EN DEHORS DE LA FONCTION
// Notice: Undefined variable: compteur2 
// in C:\xampp\htdocs\wf3-fullstack\exos\variables-static.php on line 22

afficherMessage();      // 0
afficherMessage();      // 0
afficherMessage();      // 0


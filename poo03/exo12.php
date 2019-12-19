<?php

// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*

(codeA)
(codeB)
(codeC)

(D,E,F)

*/

// COMPLETER


// NE PAS MODIFIER LE CODE SUIVANT

$tabObjet =
    [
        new MaClasseA("codeA", "D"),
        new MaClasseB("codeB", "E"),
        new MaClasseC("codeC", "F"),
    ];

foreach ($tabObjet as $objet) {
    $objet->afficherCode();
}
